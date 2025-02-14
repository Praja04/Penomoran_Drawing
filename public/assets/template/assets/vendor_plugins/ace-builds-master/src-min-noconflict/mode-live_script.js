ace.define(
  "ace/mode/live_script_highlight_rules",
  [
    "require",
    "exports",
    "module",
    "ace/lib/oop",
    "ace/mode/text_highlight_rules",
  ],
  function (e, t, n) {
    "use strict";
    var r = e("../lib/oop"),
      i = e("./text_highlight_rules").TextHighlightRules,
      s = function () {
        (this.$rules = {
          start: [
            {
              token: "punctuation.definition.comment.livescript",
              regex: "\\/\\*",
              push: [
                {
                  token: "punctuation.definition.comment.livescript",
                  regex: "\\*\\/",
                  next: "pop",
                },
                {
                  token: "storage.type.annotation.livescriptscript",
                  regex: "@\\w*",
                },
                { defaultToken: "comment.block.livescript" },
              ],
            },
            {
              token: [
                "punctuation.definition.comment.livescript",
                "comment.line.number-sign.livescript",
              ],
              regex: "(#)(?!\\{)(.*$)",
            },
            {
              token: [
                "variable.parameter.function.livescript",
                "meta.inline.function.livescript",
                "storage.type.function.livescript",
                "meta.inline.function.livescript",
                "variable.parameter.function.livescript",
                "meta.inline.function.livescript",
                "storage.type.function.livescript",
              ],
              regex:
                "(\\s*\\!?\\(\\s*[^()]*?\\))(\\s*)(!?[~-]{1,2}>)|(\\s*\\!?)(\\(?[^()]*?\\)?)(\\s*)(<[~-]{1,2}!?)",
              comment: "match stuff like: a -> \u2026 ",
            },
            {
              token: [
                "keyword.operator.new.livescript",
                "meta.class.instance.constructor",
                "entity.name.type.instance.livescript",
              ],
              regex: "(new)(\\s+)(\\w+(?:\\.\\w*)*)",
            },
            {
              token: "keyword.illegal.livescript",
              regex:
                "\\bp(?:ackage|r(?:ivate|otected)|ublic)|interface|enum|static|yield\\b",
            },
            {
              token: "punctuation.definition.string.begin.livescript",
              regex: "'''",
              push: [
                {
                  token: "punctuation.definition.string.end.livescript",
                  regex: "'''",
                  next: "pop",
                },
                { defaultToken: "string.quoted.heredoc.livescript" },
              ],
            },
            {
              token: "punctuation.definition.string.begin.livescript",
              regex: '"""',
              push: [
                {
                  token: "punctuation.definition.string.end.livescript",
                  regex: '"""',
                  next: "pop",
                },
                {
                  token: "constant.character.escape.livescript",
                  regex: "\\\\.",
                },
                { include: "#interpolated_livescript" },
                { defaultToken: "string.quoted.double.heredoc.livescript" },
              ],
            },
            {
              token: "punctuation.definition.string.begin.livescript",
              regex: "``",
              push: [
                {
                  token: "punctuation.definition.string.end.livescript",
                  regex: "``",
                  next: "pop",
                },
                {
                  token: "constant.character.escape.livescript",
                  regex:
                    "\\\\(?:x[\\da-fA-F]{2}|[0-2][0-7]{0,2}|3[0-6][0-7]|37[0-7]?|[4-7][0-7]?|.)",
                },
                { defaultToken: "string.quoted.script.livescript" },
              ],
            },
            {
              token: "string.array-literal.livescript",
              regex: "<\\[",
              push: [
                {
                  token: "string.array-literal.livescript",
                  regex: "\\]>",
                  next: "pop",
                },
                { defaultToken: "string.array-literal.livescript" },
              ],
            },
            {
              token: "string.regexp.livescript",
              regex:
                "/{2}(?![\\s=/*+{}?]).*?[^\\\\]/[igmy]{0,4}(?![a-zA-Z0-9])/{2}",
            },
            {
              token: "string.regexp.livescript",
              regex: "/{2}$",
              push: [
                {
                  token: "string.regexp.livescript",
                  regex: "/{2}[imgy]{0,4}",
                  next: "pop",
                },
                { include: "#embedded_spaced_comment" },
                { include: "#interpolated_livescript" },
                { defaultToken: "string.regexp.livescript" },
              ],
            },
            {
              token: "string.regexp.livescript",
              regex: "/{2}",
              push: [
                {
                  token: "string.regexp.livescript",
                  regex: "/{2}[imgy]{0,4}",
                  next: "pop",
                },
                {
                  token: "constant.character.escape.livescript",
                  regex:
                    "\\\\(?:x[\\da-fA-F]{2}|[0-2][0-7]{0,2}|3[0-6][0-7]|37[0-7]?|[4-7][0-7]?|.)",
                },
                { include: "#interpolated_livescript" },
                { defaultToken: "string.regexp.livescript" },
              ],
            },
            {
              token: "string.regexp.livescript",
              regex: "/(?![\\s=/*+{}?]).*?[^\\\\]/[igmy]{0,4}(?![a-zA-Z0-9])",
            },
            {
              token: "keyword.control.livescript",
              regex:
                "\\b(?<![\\.\\$\\-])(?:t(?:h(?:is|row|en)|ry|ypeof!?|il|o)|c(?:on(?:tinue|st)|a(?:se|tch)|lass)|i(?:n(?:stanceof)?|mp(?:ort(?:\\s+all)?|lements)|[fs])|d(?:e(?:fault|lete|bugger)|o)|f(?:or(?:\\s+own)?|inally|unction|rom|allthrough)|s(?:uper|witch)|e(?:lse|x(?:tends|port)|val)|a(?:nd|rguments)|n(?:ew|ot)|un(?:less|til)|w(?:hile|ith|hen)|o(?:f|r|therwise)|return|break|let|var|loop|match|by)(?!\\-|\\s*:)\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)\n				\\b(?<![\\.\\$\\-])(?:\n		        t(?:h(?:is|row|en)|ry|ypeof!?|il|o)\n		        |c(?:on(?:tinue|st)|a(?:se|tch)|lass)\n		        |i(?:n(?:stanceof)?|mp(?:ort(?:\\s+all)?|lements)|[fs])\n		        |d(?:e(?:fault|lete|bugger)|o)\n		        |f(?:or(?:\\s+own)?|inally|unction|rom|allthrough)\n		        |s(?:uper|witch)\n		        |e(?:lse|x(?:tends|port)|val)\n		        |a(?:nd|rguments)\n		        |n(?:ew|ot)\n		        |un(?:less|til)\n		        |w(?:hile|ith|hen)\n		        |o(?:f|r|therwise)\n		        |return|break|let|var|loop\n		        |match\n		        |by\n				)(?!\\-|\\s*:)\\b\n			",
            },
            {
              token: "keyword.operator.livescript",
              regex:
                "\\b(?<![\\.\\$\\-])(?:instanceof|new|delete|typeof|and|or|is|isnt|not)(?!\\-|\\s*:)\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)\n				\\b(?<![\\.\\$\\-])(\n					instanceof|new|delete|typeof|and|or|is|isnt|not\n				)(?!\\-|\\s*:)\\b\n			",
            },
            {
              token: "keyword.operator.livescript",
              regex:
                "and=|or=|%|&|\\^|\\*|\\/|(?<![a-zA-Z$_])(?:\\-)?\\-(?!\\-?>)|\\+\\+|\\+|~(?!~?>)|==|=|!=|<=|>=|<<=|>>=|>>>=|<>|<(?!\\[)|(?<!\\])>|(?<!\\w)!(?!(?:[~\\-]+)?>)|&&|\\.\\.(?:\\.)?|\\s\\.\\s|\\?|\\||\\|\\||\\:|\\*=|(?<!\\()/=|%=|\\+=|\\-=|\\.=|&=|\\(\\.|\\.\\)|\\^=",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)\n				and=|or=|%|&|\\^|\\*|\\/|(?<![a-zA-Z$_])(\\-)?\\-(?!\\-?>)|\\+\\+|\\+|\n				~(?!~?>)|==|=|!=|<=|>=|<<=|>>=|\n				>>>=|<>|<(?!\\[)|(?<!\\])>|(?<!\\w)!(?!([~\\-]+)?>)|&&|\\.\\.(\\.)?|\\s\\.\\s|\\?|\\||\\|\\||\\:|\\*=|(?<!\\()/=|%=|\\+=|\\-=|\\.=|&=|\\(\\.|\\.\\)|\n				\\^=\n			",
            },
            {
              token: [
                "variable.assignment.livescript",
                "variable.assignment.livescript",
                "variable.assignment.livescript",
                "punctuation.separator.key-value",
                "keyword.operator.livescript",
                "variable.assignment.livescript",
              ],
              regex:
                "([a-zA-Z\\$_])((?:[\\w$.-])*)(\\s*)(?!\\::)(?:(:)|(=))(\\s*)(?!(?:\\s*!?\\s*\\(.*\\))?\\s*!?[~-]{1,2}>)",
            },
            {
              token: "keyword.operator.livescript",
              regex: "(?<=\\s|^)[\\[\\{](?=.*?[\\]\\}]\\s+[:=])",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "(?<=\\s|^)([\\[\\{])(?=.*?[\\]\\}]\\s+[:=])",
              push: [
                {
                  token: "keyword.operator.livescript",
                  regex: "[\\]\\}]\\s*[:=]",
                  next: "pop",
                },
                { include: "#variable_name" },
                { include: "#instance_variable" },
                { include: "#single_quoted_string" },
                { include: "#double_quoted_string" },
                { include: "#numeric" },
                {
                  defaultToken:
                    "meta.variable.assignment.destructured.livescript",
                },
              ],
            },
            {
              token: [
                "meta.function.livescript",
                "entity.name.function.livescript",
                "entity.name.function.livescript",
                "entity.name.function.livescript",
                "entity.name.function.livescript",
                "variable.parameter.function.livescript",
                "entity.name.function.livescript",
                "storage.type.function.livescript",
              ],
              regex:
                "(\\s*)(?=[a-zA-Z\\$_])([a-zA-Z\\$_])((?:[\\w$.:-])*)(\\s*)([:=])((?:\\s*!?\\s*\\(.*\\))?)(\\s*)(!?[~-]{1,2}>)",
            },
            {
              token: "storage.type.function.livescript",
              regex: "!?[~-]{1,2}>",
            },
            {
              token: "constant.language.boolean.true.livescript",
              regex: "\\b(?<!\\.)(?:true|on|yes)(?!\\s*[:=])\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "\\b(?<!\\.)(true|on|yes)(?!\\s*[:=])\\b",
            },
            {
              token: "constant.language.boolean.false.livescript",
              regex: "\\b(?<!\\.)(?:false|off|no)(?!\\s*[:=])\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "\\b(?<!\\.)(false|off|no)(?!\\s*[:=])\\b",
            },
            {
              token: "constant.language.null.livescript",
              regex: "\\b(?<!\\.)(?:null|void)(?!\\s*[:=])\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "\\b(?<!\\.)(null|void)(?!\\s*[:=])\\b",
            },
            {
              token: "variable.language.livescript",
              regex: "\\b(?<!\\.)(?:super|this|extends)(?!\\s*[:=])\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "\\b(?<!\\.)(super|this|extends)(?!\\s*[:=])\\b",
            },
            {
              token: [
                "storage.type.class.livescript",
                "meta.class.livescript",
                "entity.name.type.class.livescript",
                "meta.class.livescript",
                "keyword.control.inheritance.livescript",
                "meta.class.livescript",
                "entity.other.inherited-class.livescript",
              ],
              regex:
                "(class\\b)(\\s+)((?:@?[a-zA-Z$_][\\w$.-]*)?)(?:(\\s+)(extends)(\\s+)(@?[a-zA-Z$_][\\w$.-]*))?",
            },
            {
              token: "keyword.other.livescript",
              regex: "\\b(?:debugger|\\\\)\\b",
            },
            {
              token: "support.class.livescript",
              regex:
                "\\b(?:Array|ArrayBuffer|Blob|Boolean|Date|document|event|Function|Int(?:8|16|32|64)Array|Math|Map|Number|Object|Proxy|RegExp|Set|String|WeakMap|window|Uint(?:8|16|32|64)Array|XMLHttpRequest)\\b",
            },
            {
              token: "entity.name.type.object.livescript",
              regex: "\\bconsole\\b",
            },
            {
              token: "support.function.console.livescript",
              regex:
                "(?<=console\\.)(?:debug|warn|info|log|error|time(?:End|-end)|assert)\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "((?<=console\\.)(debug|warn|info|log|error|time(End|-end)|assert))\\b",
            },
            {
              token: "support.function.livescript",
              regex:
                "\\b(?:decodeURI(?:Component)?|encodeURI(?:Component)?|eval|parse(?:Float|Int)|require)\\b",
            },
            {
              token: "support.function.prelude.livescript",
              regex:
                "(?<![.-])\\b(?:map|filter|reject|partition|find|each|head|tail|last|initial|empty|values|keys|length|cons|append|join|reverse|fold(?:l|r)?1?|unfoldr|and(?:List|-list)|or(?:List|-list)|any|all|unique|sum|product|mean|compact|concat(?:Map|-map)?|maximum|minimum|scan(?:l|r)?1?|replicate|slice|apply|split(?:At|-at)?|take(?:While|-while)?|drop(?:While|-while)?|span|first|break(?:It|-it)|list(?:ToObj|-to-obj)|obj(?:ToFunc|-to-func)|pairs(?:ToObj|-to-obj)|obj(?:ToPairs|-to-pairs|ToLists|-to-lists)|zip(?:All|-all)?(?:With|-with)?|compose|curry|partial|flip|fix|sort(?:With|-with|By|-by)?|group(?:By|-by)|break(?:List|-list|Str|-str)|difference|intersection|union|average|flatten|chars|unchars|repeat|lines|unlines|words|unwords|max|min|negate|abs|signum|quot|rem|div|mod|recip|pi|tau|exp|sqrt|ln|pow|sin|cos|tan|asin|acos|atan|atan2|truncate|round|ceiling|floor|is(?:It|-it)NaN|even|odd|gcd|lcm|disabled__id)\\b(?![.-])",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)(?<![.-])\\b(\n				map|filter|reject|partition|find|each|head|tail|last|initial|empty|\n				values|keys|length|cons|append|join|reverse|fold(l|r)?1?|unfoldr|\n				and(List|-list)|or(List|-list)|any|all|unique|sum|product|mean|compact|\n				concat(Map|-map)?|maximum|minimum|scan(l|r)?1?|replicate|slice|apply|\n				split(At|-at)?|take(While|-while)?|drop(While|-while)?|span|first|\n				break(It|-it)|list(ToObj|-to-obj)|obj(ToFunc|-to-func)|\n				pairs(ToObj|-to-obj)|obj(ToPairs|-to-pairs|ToLists|-to-lists)|\n				zip(All|-all)?(With|-with)?|compose|curry|partial|flip|fix|\n				sort(With|-with|By|-by)?|group(By|-by)|break(List|-list|Str|-str)|\n				difference|intersection|union|average|flatten|chars|unchars|repeat|\n				lines|unlines|words|unwords|max|min|negate|abs|signum|quot|rem|div|mod|\n				recip|pi|tau|exp|sqrt|ln|pow|sin|cos|tan|asin|acos|atan|atan2|truncate|\n				round|ceiling|floor|is(It|-it)NaN|even|odd|gcd|lcm|disabled__id\n			)\\b(?![.-])",
              comment:
                'Generated by DOM query from http://gkz.github.com/prelude-ls/:\n	      [].slice\n	        .call(document.querySelectorAll(".nav-pills li a"))\n	        .map(function(_) {return _.innerText})\n	        .filter(function(_) {return _.trim() !== \'})\n	        .slice(2)\n	        .join("|")\n     		',
            },
            {
              token: "support.function.semireserved.livescript",
              regex: "(?<![.-])\\b(?:that|it|e)\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "(?x)(?<![.-])\\b(that|it|e)\\b",
            },
            {
              token: "support.function.method.array.livescript",
              regex:
                "(?<=(?:\\.|\\]|\\)))(?:apply|call|concat|every|filter|for(?:Each|-each)|from|has(?:Own|-own)(?:Property|-property)|index(?:Of|-of)|is(?:Prototype|-prototype)(?:Of|-of)|join|last(?:Index|-index)(?:Of|-of)|map|of|pop|property(?:Is|-is)(?:Enumerable|-enumerable)|push|reduce(?:Right|-right)?|reverse|shift|slice|some|sort|splice|to(?:Locale|-locale)?(?:String|-string)|unshift|valueOf)\\b(?!-)",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)((?<=(\\.|\\]|\\)))(\n				apply|call|concat|every|filter|for(Each|-each)|\n				from|has(Own|-own)(Property|-property)|index(Of|-of)|\n				is(Prototype|-prototype)(Of|-of)|join|last(Index|-index)(Of|-of)|\n				map|of|pop|property(Is|-is)(Enumerable|-enumerable)|push|\n				reduce(Right|-right)?|reverse|shift|slice|some|sort|\n				splice|to(Locale|-locale)?(String|-string)|unshift|valueOf\n			))\\b(?!-) ",
            },
            {
              token: "support.function.static.array.livescript",
              regex: "(?<=Array\\.)isArray\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "(?x)((?<=Array\\.)(\n				isArray\n			))\\b",
            },
            {
              token: "support.function.static.object.livescript",
              regex:
                "(?<=Object\\.)(?:create|ace.define(?:Propert|-propert)(?:ies|y)|freeze|get(?:Own|-own)(?:Property|-property)(?:Descriptors?|Names)|get(?:Property|-property)(?:Descriptor|Names)|getPrototypeOf|is(?:(?:Extensible|-extensible)|(?:Frozen|-frozen)|(?:Sealed|-sealed))?|keys|prevent(?:Extensions|-extensions)|seal)\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)((?<=Object\\.)(\n				create|ace.define(Propert|-propert)(ies|y)|freeze|\n				get(Own|-own)(Property|-property)(Descriptors?|Names)|\n				get(Property|-property)(Descriptor|Names)|getPrototypeOf|\n				is((Extensible|-extensible)|(Frozen|-frozen)|(Sealed|-sealed))?|\n				keys|prevent(Extensions|-extensions)|seal\n			))\\b",
            },
            {
              token: "support.function.static.math.livescript",
              regex:
                "(?<=Math\\.)(?:abs|acos|acosh|asin|asinh|atan|atan2|atanh|ceil|cos|cosh|exp|expm1|floor|hypot|log|log10|log1p|log2|max|min|pow|random|round|sign|sin|sinh|sqrt|tan|tanh|trunc)\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)((?<=Math\\.)(\n				abs|acos|acosh|asin|asinh|atan|atan2|atanh|ceil|cos|cosh|exp|expm1|floor|\n				hypot|log|log10|log1p|log2|max|min|pow|random|round|sign|sin|sinh|sqrt|\n				tan|tanh|trunc\n			))\\b",
            },
            {
              token: "support.function.static.number.livescript",
              regex:
                "(?<=Number\\.)(?:is(?:Finite|Integer|NaN)|to(?:Integer|-integer))\\b",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?x)((?<=Number\\.)(\n				is(Finite|Integer|NaN)|to(Integer|-integer)\n			))\\b",
            },
            {
              token: "constant.language.livescript",
              regex: "\\b(?:Infinity|NaN|undefined)\\b",
            },
            {
              token: "punctuation.terminator.statement.livescript",
              regex: "\\;",
            },
            {
              token: "meta.delimiter.object.comma.livescript",
              regex: ",[ |\\t]*",
            },
            { token: "meta.delimiter.method.period.livescript", regex: "\\." },
            { token: "meta.brace.curly.livescript", regex: "\\{|\\}" },
            { token: "meta.brace.round.livescript", regex: "\\(|\\)" },
            { token: "meta.brace.square.livescript", regex: "\\[|\\]\\s*" },
            { include: "#instance_variable" },
            { include: "#backslash_string" },
            { include: "#single_quoted_string" },
            { include: "#double_quoted_string" },
            { include: "#numeric" },
          ],
          "#backslash_string": [
            {
              token: "string.quoted.single.livescript",
              regex: "\\\\(?:[\\\\)\\s,\\};\\]])?",
              push: [
                {
                  token: "punctuation.definition.string.end.livescript",
                  regex: "[\\\\)\\s,\\};\\]]",
                  next: "pop",
                },
                { defaultToken: "string.quoted.single.livescript" },
              ],
            },
          ],
          "#double_quoted_string": [
            {
              token: "punctuation.definition.string.begin.livescript",
              regex: '"',
              push: [
                {
                  token: "punctuation.definition.string.end.livescript",
                  regex: '"',
                  next: "pop",
                },
                {
                  token: "constant.character.escape.livescript",
                  regex:
                    "\\\\(?:x[\\da-fA-F]{2}|[0-2][0-7]{0,2}|3[0-6][0-7]|37[0-7]?|[4-7][0-7]?|.)",
                },
                { include: "#interpolated_livescript" },
                { defaultToken: "string.quoted.double.livescript" },
              ],
            },
          ],
          "#embedded_comment": [
            {
              token: [
                "punctuation.definition.comment.livescript",
                "comment.line.number-sign.livescript",
              ],
              regex: "(?<!\\\\)(#)(.*$)",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "(?<!\\\\)(#).*$\\n",
            },
          ],
          "#embedded_spaced_comment": [
            {
              token: [
                "punctuation.definition.comment.livescript",
                "comment.line.number-sign.livescript",
              ],
              regex: "(?<!\\\\)(#\\s)(.*$)",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "(?<!\\\\)(#\\s).*$\\n",
            },
          ],
          "#constructor_variable": [
            {
              token: "variable.other.readwrite.constructor.livescript",
              regex: "[a-zA-Z$_][\\w$-]*@{2}(?:[a-zA-Z$_][\\w$-]*)?",
            },
          ],
          "#instance_variable": [
            {
              token: "variable.other.readwrite.instance.livescript",
              regex: "(?<!\\S)@(?:[a-zA-Z$_][\\w$-]*)?",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex: "(?<!\\S)(@)([a-zA-Z$_][\\w$-]*)?",
            },
          ],
          "#interpolated_livescript": [
            {
              todo: {
                token: "punctuation.section.embedded.livescript",
                regex: "\\#\\{",
                push: [
                  {
                    token: "punctuation.section.embedded.livescript",
                    regex: "\\}",
                    next: "pop",
                  },
                  { include: "$self" },
                  { defaultToken: "source.livescript.embedded.source" },
                ],
              },
            },
            {
              todo: {
                token: "source.livescript.embedded.source.simple",
                regex: "\\#",
                push: [
                  {
                    token: "source.livescript.embedded.source.simple",
                    regex: "",
                    next: "pop",
                  },
                  { include: "$self" },
                  { defaultToken: "source.livescript.embedded.source.simple" },
                ],
              },
            },
          ],
          "#numeric": [
            {
              token: "constant.numeric.livescript",
              regex:
                "(?<![\\$@a-zA-Z_])(?:[0-9]+r[0-9_]+|(?:16r|0[xX])[0-9a-fA-F_]+|[0-9]+(?:\\.[0-9_]+)?(?:e[+\\-]?[0-9_]+)?[_a-zA-Z]*)",
              TODO: "FIXME: regexp doesn't have js equivalent",
              originalRegex:
                "(?<![\\$@a-zA-Z_])(([0-9]+r[0-9_]+)|((16r|0[xX])[0-9a-fA-F_]+)|([0-9]+(\\.[0-9_]+)?(e[+\\-]?[0-9_]+)?)[_a-zA-Z]*)",
            },
          ],
          "#single_quoted_string": [
            {
              token: "punctuation.definition.string.begin.livescript",
              regex: "'",
              push: [
                {
                  token: "punctuation.definition.string.end.livescript",
                  regex: "'",
                  next: "pop",
                },
                {
                  token: "constant.character.escape.livescript",
                  regex:
                    "\\\\(?:x[\\da-fA-F]{2}|[0-2][0-7]{0,2}|3[0-6][0-7]?|37[0-7]?|[4-7][0-7]?|.)",
                },
                { defaultToken: "string.quoted.single.livescript" },
              ],
            },
          ],
          "#variable_name": [
            {
              token: "variable.assignment.livescript",
              regex: "[a-zA-Z\\$_][\\w$-]*(?:\\.\\w+)*(?!\\-)",
            },
          ],
        }),
          this.normalizeRules();
      };
    (s.metaData = {
      comment: "LiveScript Syntax: version 1",
      fileTypes: ["ls", "Slakefile", "ls.erb"],
      firstLineMatch: "^#!.*\\bls",
      foldingStartMarker: "^\\s*class\\s+\\S.*$|.*(->|=>)\\s*$|.*[\\[{]\\s*$",
      foldingStopMarker: "^\\s*$|^\\s*[}\\]]\\s*$",
      keyEquivalent: "^~C",
      name: "LiveScript",
      scopeName: "source.livescript",
    }),
      r.inherits(s, i),
      (t.LiveScriptHighlightRules = s);
  },
),
  ace.define(
    "ace/mode/folding/cstyle",
    [
      "require",
      "exports",
      "module",
      "ace/lib/oop",
      "ace/range",
      "ace/mode/folding/fold_mode",
    ],
    function (e, t, n) {
      "use strict";
      var r = e("../../lib/oop"),
        i = e("../../range").Range,
        s = e("./fold_mode").FoldMode,
        o = (t.FoldMode = function (e) {
          e &&
            ((this.foldingStartMarker = new RegExp(
              this.foldingStartMarker.source.replace(
                /\|[^|]*?$/,
                "|" + e.start,
              ),
            )),
            (this.foldingStopMarker = new RegExp(
              this.foldingStopMarker.source.replace(/\|[^|]*?$/, "|" + e.end),
            )));
        });
      r.inherits(o, s),
        function () {
          (this.foldingStartMarker = /(\{|\[)[^\}\]]*$|^\s*(\/\*)/),
            (this.foldingStopMarker = /^[^\[\{]*(\}|\])|^[\s\*]*(\*\/)/),
            (this.singleLineBlockCommentRe = /^\s*(\/\*).*\*\/\s*$/),
            (this.tripleStarBlockCommentRe = /^\s*(\/\*\*\*).*\*\/\s*$/),
            (this.startRegionRe = /^\s*(\/\*|\/\/)#region\b/),
            (this._getFoldWidgetBase = this.getFoldWidget),
            (this.getFoldWidget = function (e, t, n) {
              var r = e.getLine(n);
              if (
                this.singleLineBlockCommentRe.test(r) &&
                !this.startRegionRe.test(r) &&
                !this.tripleStarBlockCommentRe.test(r)
              )
                return "";
              var i = this._getFoldWidgetBase(e, t, n);
              return !i && this.startRegionRe.test(r) ? "start" : i;
            }),
            (this.getFoldWidgetRange = function (e, t, n, r) {
              var i = e.getLine(n);
              if (this.startRegionRe.test(i))
                return this.getCommentRegionBlock(e, i, n);
              var s = i.match(this.foldingStartMarker);
              if (s) {
                var o = s.index;
                if (s[1]) return this.openingBracketBlock(e, s[1], n, o);
                var u = e.getCommentFoldRange(n, o + s[0].length, 1);
                return (
                  u &&
                    !u.isMultiLine() &&
                    (r
                      ? (u = this.getSectionRange(e, n))
                      : t != "all" && (u = null)),
                  u
                );
              }
              if (t === "markbegin") return;
              var s = i.match(this.foldingStopMarker);
              if (s) {
                var o = s.index + s[0].length;
                return s[1]
                  ? this.closingBracketBlock(e, s[1], n, o)
                  : e.getCommentFoldRange(n, o, -1);
              }
            }),
            (this.getSectionRange = function (e, t) {
              var n = e.getLine(t),
                r = n.search(/\S/),
                s = t,
                o = n.length;
              t += 1;
              var u = t,
                a = e.getLength();
              while (++t < a) {
                n = e.getLine(t);
                var f = n.search(/\S/);
                if (f === -1) continue;
                if (r > f) break;
                var l = this.getFoldWidgetRange(e, "all", t);
                if (l) {
                  if (l.start.row <= s) break;
                  if (l.isMultiLine()) t = l.end.row;
                  else if (r == f) break;
                }
                u = t;
              }
              return new i(s, o, u, e.getLine(u).length);
            }),
            (this.getCommentRegionBlock = function (e, t, n) {
              var r = t.search(/\s*$/),
                s = e.getLength(),
                o = n,
                u = /^\s*(?:\/\*|\/\/)#(end)?region\b/,
                a = 1;
              while (++n < s) {
                t = e.getLine(n);
                var f = u.exec(t);
                if (!f) continue;
                f[1] ? a-- : a++;
                if (!a) break;
              }
              var l = n;
              if (l > o) return new i(o, r, l, t.length);
            });
        }.call(o.prototype);
    },
  ),
  ace.define(
    "ace/mode/live_script",
    [
      "require",
      "exports",
      "module",
      "ace/lib/oop",
      "ace/mode/text",
      "ace/mode/live_script_highlight_rules",
      "ace/mode/folding/cstyle",
    ],
    function (e, t, n) {
      "use strict";
      var r = e("../lib/oop"),
        i = e("./text").Mode,
        s = e("./live_script_highlight_rules").LiveScriptHighlightRules,
        o = e("./folding/cstyle").FoldMode,
        u = function () {
          (this.HighlightRules = s), (this.foldingRules = new o());
        };
      r.inherits(u, i),
        function () {
          this.$id = "ace/mode/live_script";
        }.call(u.prototype),
        (t.Mode = u);
    },
  );
