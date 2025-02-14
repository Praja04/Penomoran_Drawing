ace.define(
  "ace/mode/mips_assembler_highlight_rules",
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
              token: "support.function.pseudo.mips",
              regex:
                "\\b(?:mul|abs|div|divu|mulo|mulou|neg|negu|not|rem|remu|rol|ror|li|seq|sge|sgeu|sgt|sgtu|sle|sleu|sne|b|beqz|bge|bgeu|bgt|bgtu|ble|bleu|blt|bltu|bnez|la|ld|ulh|ulhu|ulw|sd|ush|usw|move|mfc1\\.d|l\\.d|l\\.s|s\\.d|s\\.s)\\b",
              comment:
                "ok actually this are instructions, but one also could call them funtions\u2026",
            },
            {
              token: "support.function.mips",
              regex:
                "\\b(?:abs\\.d|abs\\.s|add|add\\.d|add\\.s|addi|addiu|addu|and|andi|bc1f|bc1t|beq|bgez|bgezal|bgtz|blez|bltz|bltzal|bne|break|c\\.eq\\.d|c\\.eq\\.s|c\\.le\\.d|c\\.le\\.s|c\\.lt\\.d|c\\.lt\\.s|ceil\\.w\\.d|ceil\\.w\\.s|clo|clz|cvt\\.d\\.s|cvt\\.d\\.w|cvt\\.s\\.d|cvt\\.s\\.w|cvt\\.w\\.d|cvt\\.w\\.s|div|div\\.d|div\\.s|divu|eret|floor\\.w\\.d|floor\\.w\\.s|j|jal|jalr|jr|lb|lbu|lh|lhu|ll|lui|lw|lwc1|lwl|lwr|madd|maddu|mfc0|mfc1|mfhi|mflo|mov\\.d|mov\\.s|movf|movf\\.d|movf\\.s|movn|movn\\.d|movn\\.s|movt|movt\\.d|movt\\.s|movz|movz\\.d|movz\\.s|msub|mtc0|mtc1|mthi|mtlo|mul|mul\\.d|mul\\.s|mult|multu|neg\\.d|neg\\.s|nop|nor|or|ori|round\\.w\\.d|round\\.w\\.s|sb|sc|sdc1|sh|sll|sllv|slt|slti|sltiu|sltu|sqrt\\.d|sqrt\\.s|sra|srav|srl|srlv|sub|sub\\.d|sub\\.s|subu|sw|swc1|swl|swr|syscall|teq|teqi|tge|tgei|tgeiu|tgeu|tlt|tlti|tltiu|tltu|trunc\\.w\\.d|trunc\\.w\\.s|xor|xori)\\b",
            },
            {
              token: "storage.type.mips",
              regex:
                "\\.(?:ascii|asciiz|byte|data|double|float|half|kdata|ktext|space|text|word|set\\s*(?:noat|at))\\b",
            },
            {
              token: "storage.modifier.mips",
              regex: "\\.(?:align|extern||globl)\\b",
            },
            {
              token: [
                "entity.name.function.label.mips",
                "meta.function.label.mips",
              ],
              regex: "\\b([A-Za-z0-9_]+)(:)",
            },
            {
              token: [
                "punctuation.definition.variable.mips",
                "variable.other.register.usable.by-number.mips",
              ],
              regex: "(\\$)(0|[2-9]|1[0-9]|2[0-5]|2[89]|3[0-1])\\b",
            },
            {
              token: [
                "punctuation.definition.variable.mips",
                "variable.other.register.usable.by-name.mips",
              ],
              regex: "(\\$)(zero|v[01]|a[0-3]|t[0-9]|s[0-7]|gp|sp|fp|ra)\\b",
            },
            {
              token: [
                "punctuation.definition.variable.mips",
                "variable.other.register.reserved.mips",
              ],
              regex: "(\\$)(at|k[01]|1|2[67])\\b",
            },
            {
              token: [
                "punctuation.definition.variable.mips",
                "variable.other.register.usable.floating-point.mips",
                "variable.other.register.usable.floating-point.mips",
              ],
              regex: "(\\$)(f)([0-9]|1[0-9]|2[0-9]|3[0-1])\\b",
            },
            {
              token: "constant.numeric.float.mips",
              regex: "\\b\\d+\\.\\d+\\b",
            },
            {
              token: "constant.numeric.integer.mips",
              regex: "\\b(?:\\d+|0(?:x|X)[a-fA-F0-9]+)\\b",
            },
            {
              token: "punctuation.definition.string.begin.mips",
              regex: '"',
              push: [
                {
                  token: "punctuation.definition.string.end.mips",
                  regex: '"',
                  next: "pop",
                },
                {
                  token: "constant.character.escape.mips",
                  regex: '\\\\[rnt\\\\"]',
                },
                { defaultToken: "string.quoted.double.mips" },
              ],
            },
            {
              token: "punctuation.definition.comment.mips",
              regex: "#",
              push: [
                {
                  token: "comment.line.number-sign.mips",
                  regex: "$",
                  next: "pop",
                },
                { defaultToken: "comment.line.number-sign.mips" },
              ],
            },
          ],
        }),
          this.normalizeRules();
      };
    (s.metaData = {
      fileTypes: ["s", "mips", "spim", "asm"],
      keyEquivalent: "^~M",
      name: "MIPS Assembler",
      scopeName: "source.mips",
    }),
      r.inherits(s, i),
      (t.MIPSAssemblerHighlightRules = s);
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
    "ace/mode/mips_assembler",
    [
      "require",
      "exports",
      "module",
      "ace/lib/oop",
      "ace/mode/text",
      "ace/mode/mips_assembler_highlight_rules",
      "ace/mode/folding/cstyle",
    ],
    function (e, t, n) {
      "use strict";
      var r = e("../lib/oop"),
        i = e("./text").Mode,
        s = e("./mips_assembler_highlight_rules").MIPSAssemblerHighlightRules,
        o = e("./folding/cstyle").FoldMode,
        u = function () {
          (this.HighlightRules = s), (this.foldingRules = new o());
        };
      r.inherits(u, i),
        function () {
          this.$id = "ace/mode/mips_assembler";
        }.call(u.prototype),
        (t.Mode = u);
    },
  );
