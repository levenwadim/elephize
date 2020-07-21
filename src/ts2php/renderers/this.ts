import * as ts from 'typescript';
import { Declaration } from '../types';
import { Context } from '../components/context';
import { ctx, log, LogSeverity } from '../utils/log';
import { flagParentOfType } from '../utils/ast';

export const tThis = (node: ts.ThisExpression, context: Context<Declaration>) => {
  // Disallow usage of `this`: we don't support classes and scope binding.
  log('Keyword `this` is not supported for transpilation', LogSeverity.ERROR, ctx(node));
  flagParentOfType(node, [
    ts.SyntaxKind.ExpressionStatement,
    ts.SyntaxKind.VariableDeclaration,
    ts.SyntaxKind.IfStatement
  ], { drop: true, dropReplacement: '/* ERROR: `this` keyword used in expression */' }, context.nodeFlagsStore);
  return '';
};
