import { createSourceFile, ScriptTarget, SourceFile } from 'typescript';
import { existsSync, readFileSync } from 'fs';

const sourceFiles: { [key: string]: SourceFile | null } = {};

// Try find d.ts source in typescript folder
function getDtsSourceFile(name: string, target?: ScriptTarget) {
  if (sourceFiles[name] === undefined) {
    let path;
    try {
      path = name.startsWith('/') ? name : require.resolve('typescript/lib/' + name);
    } catch (e) {
      path = require.resolve(name.replace(/^node_modules\//, ''));
    }
    if (existsSync(path)) {
      const input = readFileSync(path, { encoding: 'utf-8' });
      sourceFiles[name] = createSourceFile(name, input, target!);
    } else {
      sourceFiles[name] = null;
    }
  }

  return sourceFiles[name];
}

function getSourceFile(path: string, target?: ScriptTarget) {
  if (sourceFiles[path] === undefined) {
    if (existsSync(path)) {
      const input = readFileSync(path, { encoding: 'utf-8' });
      sourceFiles[path] = createSourceFile(path, input, target!);
    } else {
      sourceFiles[path] = null;
    }
  }

  return sourceFiles[path];
}

export const compilerHostSourceGetter = (scriptTarget?: ScriptTarget) => (fileName: string) => {
  if (fileName.endsWith('.d.ts')) {
    return getDtsSourceFile(fileName, scriptTarget) || undefined;
  }
  return getSourceFile(fileName, scriptTarget) || undefined;
};
