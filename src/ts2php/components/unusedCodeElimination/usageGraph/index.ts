/*

Основная идея:

- Связность объявлений представляем в виде направленного графа. В графе могут быть циклические зависимости.

- Declaration === вершина. Usage === ребро.

- По умолчанию работаем в module scope. Declaration может порождать новый scope, если это функциональное объявление.

- Внутри scope существует список объявленных переменных и функций. Также можно достучаться до списков объявленных
идентификаторов в верхних скоупах.

- Ребро порождается в том случае, если для получения значения переменной или выполнения функции требуется значение из
другой переменной или функции в текущем или одном из верхних скоупов.

- Вводим понятие особой терминальной вершины T. Ребра из вершины Т должны порождаться к тем вершинам, которые передают
свое значение в конструкции:
  - export (function/const)
  - console.log()
  - иные (библиотечные) средства вывода или передачи результата.
  В случае их появления, правила порождения терминальных ребер нужно дополнить!

- Для инструкции return действуют особые правила: ребра, порождаемые в результате использования функции, должны
идти не только к вершине с идентификатором функции, но и ко всем вершинам в порожденном скоупе, используемым
для получения значения (т.е. используемым в return-выражении). Также придется повставлять немного костылей для
однострочных arrow functions.

- Для каждого функционального скоупа вводится понятие локальной терминальной вершины TLocal. Это синтетическая
конструкция для упрощения работы с return-конструкциями (см. предыдущий пункт).

- Алгоритм уничтожения неиспользуемого кода - обыкновенный обход графа в глубину начиная с терминальной вершины Т.
После обхода мы можем достоверно судить используется ли идентификатор по наличию отметки об обходе в ее Declaration.

- Особый случай: объявление происходит ПОСЛЕ использования. Для этого вводится два типа нод в графе - BoundNode
и BindPendingNode. Первая - уже связанная, готовая к использованию. Вторая - может быть создана только при регистрации
использования до объявления. Если нода была использована, но не была объявлена - это явная ошибка компиляции.

 */

export { Scope } from './scope';