import * as ts from 'typescript';
import { Declaration } from '../../types';
import { getClosestOrigParentOfType, getClosestParentOfAnyType } from '../../utils/ast';
import { Context } from '../context';
import { renderNode, renderNodes } from '../codegen/renderNodes';

/**
 * Top-level functions marked with IC prefix are expected to be functional Isomorphic Components
 *
 * @param context
 * @param node
 */
export function handleComponent(context: Context<Declaration>, node: ts.Expression | ts.FunctionDeclaration): boolean {
  const funcNode = getClosestParentOfAnyType(node, [
    ts.SyntaxKind.FunctionDeclaration,
    ts.SyntaxKind.ArrowFunction,
    ts.SyntaxKind.FunctionExpression
  ], true) as ts.FunctionExpression | ts.FunctionDeclaration | ts.ArrowFunction;

  const isNestedFunc = !!getClosestParentOfAnyType(node, [
    ts.SyntaxKind.FunctionDeclaration,
    ts.SyntaxKind.ArrowFunction,
    ts.SyntaxKind.FunctionExpression
  ]); // note difference: not including self

  const triviaContainer = node.kind === ts.SyntaxKind.FunctionDeclaration
    ? node
    : getClosestOrigParentOfType(node, ts.SyntaxKind.VariableStatement);

  const trivia = triviaContainer?.getFullText().substr(0, triviaContainer?.getLeadingTriviaWidth());
  const isElephizedComponent = trivia?.includes('@elephizeTarget');

  const nodeName = node.kind === ts.SyntaxKind.FunctionDeclaration
    ? (node as ts.FunctionDeclaration).name
    : (getClosestOrigParentOfType(node, ts.SyntaxKind.VariableDeclaration) as ts.VariableDeclaration)?.name;

  if (!isNestedFunc && nodeName && nodeName.kind === ts.SyntaxKind.Identifier && isElephizedComponent) {
    const name = nodeName.escapedText.toString();
    const descriptor = context.registry.deriveReactComponent(name, context.moduleDescriptor);
    if (!descriptor) {
      throw new Error();
    }

    const tmpDescriptor = context.moduleDescriptor;
    context.moduleDescriptor = descriptor;
    context.nodeFlagsStore.upsert(node, { isComponent: true });

    const decl = context.scope.addDeclaration(nodeName.getText(), [], { terminateGlobally: true, dryRun: context.dryRun });

    context.pushScope(nodeName.getText());
    context.scope.ownerNode!.data.isComponent = true;

    let args = renderNodes([...funcNode.parameters], context);
    let block = renderNode(funcNode.body, context);

    if (decl && decl.ownedScope) {
      context.scope.terminateToParentTerminalNode(context.dryRun);
    }
    context.popScope();

    descriptor.setArgs(args.join(', '));
    descriptor.setBlock(block);
    context.moduleDescriptor = tmpDescriptor;
    return true;
  }

  return false;
}