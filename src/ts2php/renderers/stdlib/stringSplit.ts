import * as ts from 'typescript';
import { ExpressionHook, Declaration } from '../../types';
import { ctx, log, LogSeverity } from '../../utils/log';
import { propNameIs } from './_propName';
import { assertType } from './_assert';
import { Context } from '../../components/context';
import { renderNode, renderNodes } from '../../components/codegen/renderNodes';

/**
 * String.prototype.split support
 *
 * @param node
 * @param context
 */
export const stringSplit: ExpressionHook = (node: ts.CallExpression, context: Context<Declaration>) => {
  if (!propNameIs('split', node)) {
    return undefined;
  }
  if (!assertType(node.expression, context.checker, 'string')) {
    log('Left-hand expression must have string inferred type', LogSeverity.ERROR, ctx(node));
    return 'null';
  }
  context.nodeFlagsStore.upsert(node, { name: 'string_split' });
  const varNameNode = (node.expression as ts.PropertyAccessExpression).expression;
  const [separator, limit] = renderNodes([...node.arguments], context);

  // split can use string or regexp as separator, so we should check inferred type of argument.
  let nd: ts.Node = node.arguments[0];
  let type = context.checker.getTypeAtLocation(nd);
  if (type.isStringLiteral() || context.checker.typeToString(type, nd, ts.TypeFormatFlags.None) === 'string') {
    // string literals as separators
    let varName = renderNode(varNameNode, context);
    if (limit) {
      return `explode(${separator}, ${varName}, ${limit})`;
    } else {
      return `explode(${separator}, ${varName})`;
    }
  } else if (nd.kind === ts.SyntaxKind.RegularExpressionLiteral) {
    // regexp instances as separators
    let varName = renderNode(varNameNode, context);
    if (limit) {
      return `preg_split(${separator}, ${varName}, ${limit})`;
    } else {
      return `preg_split(${separator}, ${varName})`;
    }
  } else {
    log('String.prototype.split: Non-string and non-regexp-literal separators are not supported by transpiler.', LogSeverity.ERROR, ctx(node));
    return 'null';
  }
};
