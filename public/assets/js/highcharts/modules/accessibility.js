/*
 Highcharts JS v10.3.3 (2023-01-20)

 Accessibility module

 (c) 2010-2021 Highsoft AS
 Author: Oystein Moseng

 License: www.highcharts.com/license
*/
(function (a) {
  "object" === typeof module && module.exports
    ? ((a["default"] = a), (module.exports = a))
    : "function" === typeof define && define.amd
      ? define(
          "highcharts/modules/accessibility",
          ["highcharts"],
          function (A) {
            a(A);
            a.Highcharts = A;
            return a;
          },
        )
      : a("undefined" !== typeof Highcharts ? Highcharts : void 0);
})(function (a) {
  function A(a, h, l, x) {
    a.hasOwnProperty(h) ||
      ((a[h] = x.apply(null, l)),
      "function" === typeof CustomEvent &&
        window.dispatchEvent(
          new CustomEvent("HighchartsModuleLoaded", {
            detail: { path: h, module: a[h] },
          }),
        ));
  }
  a = a ? a._modules : {};
  A(
    a,
    "Accessibility/Utils/HTMLUtilities.js",
    [a["Core/Globals.js"], a["Core/Utilities.js"]],
    function (a, h) {
      function l(a) {
        if ("function" === typeof p.MouseEvent)
          return new p.MouseEvent(a.type, a);
        if (m.createEvent) {
          var g = m.createEvent("MouseEvent");
          if (g.initMouseEvent)
            return (
              g.initMouseEvent(
                a.type,
                a.bubbles,
                a.cancelable,
                a.view || p,
                a.detail,
                a.screenX,
                a.screenY,
                a.clientX,
                a.clientY,
                a.ctrlKey,
                a.altKey,
                a.shiftKey,
                a.metaKey,
                a.button,
                a.relatedTarget,
              ),
              g
            );
        }
        return x(a.type);
      }
      function x(a, k, w) {
        k = k || { x: 0, y: 0 };
        return "function" === typeof p.MouseEvent
          ? new p.MouseEvent(a, {
              bubbles: !0,
              cancelable: !0,
              composed: !0,
              button: 0,
              buttons: 1,
              relatedTarget: w || z,
              view: p,
              detail: "click" === a ? 1 : 0,
              screenX: k.x,
              screenY: k.y,
              clientX: k.x,
              clientY: k.y,
            })
          : m.createEvent &&
              ((w = m.createEvent("MouseEvent")), w.initMouseEvent)
            ? (w.initMouseEvent(
                a,
                !0,
                !0,
                p,
                "click" === a ? 1 : 0,
                k.x,
                k.y,
                k.x,
                k.y,
                !1,
                !1,
                !1,
                !1,
                0,
                null,
              ),
              w)
            : { type: a };
      }
      var m = a.doc,
        p = a.win,
        u = h.css,
        z = (p.EventTarget && new p.EventTarget()) || "none";
      return {
        addClass: function (a, k) {
          a.classList
            ? a.classList.add(k)
            : 0 > a.className.indexOf(k) && (a.className += " " + k);
        },
        cloneMouseEvent: l,
        cloneTouchEvent: function (a) {
          var g = function (a) {
            for (var f = [], d = 0; d < a.length; ++d) {
              var b = a.item(d);
              b && f.push(b);
            }
            return f;
          };
          if ("function" === typeof p.TouchEvent)
            return (
              (g = new p.TouchEvent(a.type, {
                touches: g(a.touches),
                targetTouches: g(a.targetTouches),
                changedTouches: g(a.changedTouches),
                ctrlKey: a.ctrlKey,
                shiftKey: a.shiftKey,
                altKey: a.altKey,
                metaKey: a.metaKey,
                bubbles: a.bubbles,
                cancelable: a.cancelable,
                composed: a.composed,
                detail: a.detail,
                view: a.view,
              })),
              a.defaultPrevented && g.preventDefault(),
              g
            );
          g = l(a);
          g.touches = a.touches;
          g.changedTouches = a.changedTouches;
          g.targetTouches = a.targetTouches;
          return g;
        },
        escapeStringForHTML: function (a) {
          return a
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#x27;")
            .replace(/\//g, "&#x2F;");
        },
        getElement: function (a) {
          return m.getElementById(a);
        },
        getFakeMouseEvent: x,
        getHeadingTagNameForElement: function (a) {
          var g = function (f) {
              f = parseInt(f.slice(1), 10);
              return "h" + Math.min(6, f + 1);
            },
            w = function (f) {
              var d;
              a: {
                for (d = f; (d = d.previousSibling); ) {
                  var b = d.tagName || "";
                  if (/H[1-6]/.test(b)) {
                    d = b;
                    break a;
                  }
                }
                d = "";
              }
              if (d) return g(d);
              f = f.parentElement;
              if (!f) return "p";
              d = f.tagName;
              return /H[1-6]/.test(d) ? g(d) : w(f);
            };
          return w(a);
        },
        removeChildNodes: function (a) {
          for (; a.lastChild; ) a.removeChild(a.lastChild);
        },
        removeClass: function (a, k) {
          a.classList
            ? a.classList.remove(k)
            : (a.className = a.className.replace(new RegExp(k, "g"), ""));
        },
        removeElement: function (a) {
          a && a.parentNode && a.parentNode.removeChild(a);
        },
        reverseChildNodes: function (a) {
          for (var g = a.childNodes.length; g--; )
            a.appendChild(a.childNodes[g]);
        },
        simulatedEventTarget: z,
        stripHTMLTagsFromString: function (a) {
          return "string" === typeof a ? a.replace(/<\/?[^>]+(>|$)/g, "") : a;
        },
        visuallyHideElement: function (a) {
          u(a, {
            position: "absolute",
            width: "1px",
            height: "1px",
            overflow: "hidden",
            whiteSpace: "nowrap",
            clip: "rect(1px, 1px, 1px, 1px)",
            marginTop: "-3px",
            "-ms-filter": "progid:DXImageTransform.Microsoft.Alpha(Opacity=1)",
            filter: "alpha(opacity=1)",
            opacity: 0.01,
          });
        },
      };
    },
  );
  A(
    a,
    "Accessibility/A11yI18n.js",
    [a["Core/FormatUtilities.js"], a["Core/Utilities.js"]],
    function (a, h) {
      var l = a.format,
        x = h.getNestedProperty,
        m = h.pick,
        p;
      (function (a) {
        function z(a, d) {
          var b = a.indexOf("#each("),
            c = a.indexOf("#plural("),
            e = a.indexOf("["),
            r = a.indexOf("]");
          if (-1 < b) {
            r = a.slice(b).indexOf(")") + b;
            c = a.substring(0, b);
            e = a.substring(r + 1);
            r = a.substring(b + 6, r).split(",");
            b = Number(r[1]);
            a = "";
            if ((d = x(r[0], d)))
              for (
                b = isNaN(b) ? d.length : b,
                  b = 0 > b ? d.length + b : Math.min(b, d.length),
                  r = 0;
                r < b;
                ++r
              )
                a += c + d[r] + e;
            return a.length ? a : "";
          }
          if (-1 < c) {
            e = a.slice(c).indexOf(")") + c;
            c = a.substring(c + 8, e).split(",");
            switch (Number(x(c[0], d))) {
              case 0:
                a = m(c[4], c[1]);
                break;
              case 1:
                a = m(c[2], c[1]);
                break;
              case 2:
                a = m(c[3], c[1]);
                break;
              default:
                a = c[1];
            }
            a
              ? ((d = a),
                (d = (d.trim && d.trim()) || d.replace(/^\s+|\s+$/g, "")))
              : (d = "");
            return d;
          }
          return -1 < e
            ? ((c = a.substring(0, e)),
              (e = Number(a.substring(e + 1, r))),
              (a = void 0),
              (d = x(c, d)),
              !isNaN(e) &&
                d &&
                (0 > e
                  ? ((a = d[d.length + e]),
                    "undefined" === typeof a && (a = d[0]))
                  : ((a = d[e]),
                    "undefined" === typeof a && (a = d[d.length - 1]))),
              "undefined" !== typeof a ? a : "")
            : "{" + a + "}";
        }
        function g(a, d, b) {
          var c = function (c, b) {
              c = c.slice(b || 0);
              var e = c.indexOf("{"),
                d = c.indexOf("}");
              if (-1 < e && d > e)
                return {
                  statement: c.substring(e + 1, d),
                  begin: b + e + 1,
                  end: b + d,
                };
            },
            e = [],
            r = 0;
          do {
            var f = c(a, r);
            var g = a.substring(r, f && f.begin - 1);
            g.length && e.push({ value: g, type: "constant" });
            f && e.push({ value: f.statement, type: "statement" });
            r = f ? f.end + 1 : r + 1;
          } while (f);
          e.forEach(function (c) {
            "statement" === c.type && (c.value = z(c.value, d));
          });
          return l(
            e.reduce(function (c, b) {
              return c + b.value;
            }, ""),
            d,
            b,
          );
        }
        function k(a, d) {
          a = a.split(".");
          for (var b = this.options.lang, c = 0; c < a.length; ++c)
            b = b && b[a[c]];
          return "string" === typeof b ? g(b, d, this) : "";
        }
        var w = [];
        a.compose = function (a) {
          -1 === w.indexOf(a) && (w.push(a), (a.prototype.langFormat = k));
          return a;
        };
        a.i18nFormat = g;
      })(p || (p = {}));
      return p;
    },
  );
  A(
    a,
    "Accessibility/Utils/ChartUtilities.js",
    [
      a["Core/Globals.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l) {
      function x(c, e) {
        var d = e.type,
          a = c.hcEvents;
        k.createEvent && (c.dispatchEvent || c.fireEvent)
          ? c.dispatchEvent
            ? c.dispatchEvent(e)
            : c.fireEvent(d, e)
          : a && a[d]
            ? b(c, d, e)
            : c.element && x(c.element, e);
      }
      function m(c) {
        var b = c.chart,
          d = {},
          a = "Seconds";
        d.Seconds =
          ((c.dataMax || c.max || 0) - (c.dataMin || c.min || 0)) / 1e3;
        d.Minutes = d.Seconds / 60;
        d.Hours = d.Minutes / 60;
        d.Days = d.Hours / 24;
        ["Minutes", "Hours", "Days"].forEach(function (c) {
          2 < d[c] && (a = c);
        });
        var f = d[a].toFixed("Seconds" !== a && "Minutes" !== a ? 1 : 0);
        return b.langFormat("accessibility.axis.timeRange" + a, {
          chart: b,
          axis: c,
          range: f.replace(".0", ""),
        });
      }
      function p(c) {
        var b = c.chart,
          d = b.options,
          a =
            (d &&
              d.accessibility &&
              d.accessibility.screenReaderSection.axisRangeDateFormat) ||
            "",
          f = { min: c.dataMin || c.min || 0, max: c.dataMax || c.max || 0 };
        d = function (e) {
          return c.dateTime ? b.time.dateFormat(a, f[e]) : f[e].toString();
        };
        return b.langFormat("accessibility.axis.rangeFromTo", {
          chart: b,
          axis: c,
          rangeFrom: d("min"),
          rangeTo: d("max"),
        });
      }
      function u(c) {
        if (c.points && c.points.length)
          return (
            (c = d(c.points, function (c) {
              return !!c.graphic;
            })) &&
            c.graphic &&
            c.graphic.element
          );
      }
      function z(c) {
        var b = u(c);
        return (
          (b && b.parentNode) ||
          (c.graph && c.graph.element) ||
          (c.group && c.group.element)
        );
      }
      function g(c, b) {
        b.setAttribute("aria-hidden", !1);
        b !== c.renderTo &&
          b.parentNode &&
          b.parentNode !== k.body &&
          (Array.prototype.forEach.call(b.parentNode.childNodes, function (c) {
            c.hasAttribute("aria-hidden") || c.setAttribute("aria-hidden", !0);
          }),
          g(c, b.parentNode));
      }
      var k = a.doc,
        w = h.stripHTMLTagsFromString,
        f = l.defined,
        d = l.find,
        b = l.fireEvent;
      return {
        fireEventOnWrappedOrUnwrappedElement: x,
        getChartTitle: function (c) {
          return w(
            c.options.title.text ||
              c.langFormat("accessibility.defaultChartTitle", { chart: c }),
          );
        },
        getAxisDescription: function (c) {
          return (
            c &&
            ((c.userOptions &&
              c.userOptions.accessibility &&
              c.userOptions.accessibility.description) ||
              (c.axisTitle && c.axisTitle.textStr) ||
              c.options.id ||
              (c.categories && "categories") ||
              (c.dateTime && "Time") ||
              "values")
          );
        },
        getAxisRangeDescription: function (c) {
          var b = c.options || {};
          return b.accessibility &&
            "undefined" !== typeof b.accessibility.rangeDescription
            ? b.accessibility.rangeDescription
            : c.categories
              ? ((b = c.chart),
                (c =
                  c.dataMax && c.dataMin
                    ? b.langFormat("accessibility.axis.rangeCategories", {
                        chart: b,
                        axis: c,
                        numCategories: c.dataMax - c.dataMin + 1,
                      })
                    : ""),
                c)
              : !c.dateTime || (0 !== c.min && 0 !== c.dataMin)
                ? p(c)
                : m(c);
        },
        getPointFromXY: function (c, b, a) {
          for (var e = c.length, r; e--; )
            if (
              (r = d(c[e].points || [], function (c) {
                return c.x === b && c.y === a;
              }))
            )
              return r;
        },
        getSeriesFirstPointElement: u,
        getSeriesFromName: function (c, b) {
          return b
            ? (c.series || []).filter(function (c) {
                return c.name === b;
              })
            : c.series;
        },
        getSeriesA11yElement: z,
        unhideChartElementFromAT: g,
        hideSeriesFromAT: function (c) {
          (c = z(c)) && c.setAttribute("aria-hidden", !0);
        },
        scrollToPoint: function (c) {
          var e = c.series.xAxis,
            d = c.series.yAxis,
            a = e && e.scrollbar ? e : d;
          if ((e = a && a.scrollbar) && f(e.to) && f(e.from)) {
            d = e.to - e.from;
            if (f(a.dataMin) && f(a.dataMax)) {
              var g = a.toPixels(a.dataMin),
                k = a.toPixels(a.dataMax);
              c =
                (a.toPixels(c["xAxis" === a.coll ? "x" : "y"] || 0) - g) /
                (k - g);
            } else c = 0;
            e.updatePosition(c - d / 2, c + d / 2);
            b(e, "changed", {
              from: e.from,
              to: e.to,
              trigger: "scrollbar",
              DOMEvent: null,
            });
          }
        },
      };
    },
  );
  A(
    a,
    "Accessibility/Utils/DOMElementProvider.js",
    [a["Core/Globals.js"], a["Accessibility/Utils/HTMLUtilities.js"]],
    function (a, h) {
      var l = a.doc,
        x = h.removeElement;
      return (function () {
        function a() {
          this.elements = [];
        }
        a.prototype.createElement = function () {
          var a = l.createElement.apply(l, arguments);
          this.elements.push(a);
          return a;
        };
        a.prototype.destroyCreatedElements = function () {
          this.elements.forEach(function (a) {
            x(a);
          });
          this.elements = [];
        };
        return a;
      })();
    },
  );
  A(
    a,
    "Accessibility/Utils/EventProvider.js",
    [a["Core/Globals.js"], a["Core/Utilities.js"]],
    function (a, h) {
      var l = h.addEvent;
      return (function () {
        function h() {
          this.eventRemovers = [];
        }
        h.prototype.addEvent = function () {
          var h = l.apply(a, arguments);
          this.eventRemovers.push(h);
          return h;
        };
        h.prototype.removeAddedEvents = function () {
          this.eventRemovers.forEach(function (a) {
            return a();
          });
          this.eventRemovers = [];
        };
        return h;
      })();
    },
  );
  A(
    a,
    "Accessibility/AccessibilityComponent.js",
    [
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/DOMElementProvider.js"],
      a["Accessibility/Utils/EventProvider.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l, x, m) {
      var p = a.fireEventOnWrappedOrUnwrappedElement,
        u = x.getFakeMouseEvent;
      a = m.extend;
      x = (function () {
        function a() {
          this.proxyProvider =
            this.keyCodes =
            this.eventProvider =
            this.domElementProvider =
            this.chart =
              void 0;
        }
        a.prototype.initBase = function (a, k) {
          this.chart = a;
          this.eventProvider = new l();
          this.domElementProvider = new h();
          this.proxyProvider = k;
          this.keyCodes = {
            left: 37,
            right: 39,
            up: 38,
            down: 40,
            enter: 13,
            space: 32,
            esc: 27,
            tab: 9,
            pageUp: 33,
            pageDown: 34,
            end: 35,
            home: 36,
          };
        };
        a.prototype.addEvent = function (a, k, w, f) {
          return this.eventProvider.addEvent(a, k, w, f);
        };
        a.prototype.createElement = function (a, k) {
          return this.domElementProvider.createElement(a, k);
        };
        a.prototype.fakeClickEvent = function (a) {
          var g = u("click");
          p(a, g);
        };
        a.prototype.destroyBase = function () {
          this.domElementProvider.destroyCreatedElements();
          this.eventProvider.removeAddedEvents();
        };
        return a;
      })();
      a(x.prototype, {
        init: function () {},
        getKeyboardNavigation: function () {},
        onChartUpdate: function () {},
        onChartRender: function () {},
        destroy: function () {},
      });
      return x;
    },
  );
  A(
    a,
    "Accessibility/KeyboardNavigationHandler.js",
    [a["Core/Utilities.js"]],
    function (a) {
      var h = a.find;
      a = (function () {
        function a(a, h) {
          this.chart = a;
          this.keyCodeMap = h.keyCodeMap || [];
          this.validate = h.validate;
          this.init = h.init;
          this.terminate = h.terminate;
          this.response = {
            success: 1,
            prev: 2,
            next: 3,
            noHandler: 4,
            fail: 5,
          };
        }
        a.prototype.run = function (a) {
          var l = a.which || a.keyCode,
            p = this.response.noHandler,
            u = h(this.keyCodeMap, function (a) {
              return -1 < a[0].indexOf(l);
            });
          u
            ? (p = u[1].call(this, l, a))
            : 9 === l && (p = this.response[a.shiftKey ? "prev" : "next"]);
          return p;
        };
        return a;
      })();
      ("");
      return a;
    },
  );
  A(
    a,
    "Accessibility/Components/ContainerComponent.js",
    [
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/KeyboardNavigationHandler.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Core/Globals.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
    ],
    function (a, h, l, x, m) {
      var p =
          (this && this.__extends) ||
          (function () {
            var a = function (f, d) {
              a =
                Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array &&
                  function (b, c) {
                    b.__proto__ = c;
                  }) ||
                function (b, c) {
                  for (var a in c) c.hasOwnProperty(a) && (b[a] = c[a]);
                };
              return a(f, d);
            };
            return function (f, d) {
              function b() {
                this.constructor = f;
              }
              a(f, d);
              f.prototype =
                null === d
                  ? Object.create(d)
                  : ((b.prototype = d.prototype), new b());
            };
          })(),
        u = l.unhideChartElementFromAT,
        z = l.getChartTitle,
        g = x.doc,
        k = m.stripHTMLTagsFromString;
      return (function (a) {
        function f() {
          return (null !== a && a.apply(this, arguments)) || this;
        }
        p(f, a);
        f.prototype.onChartUpdate = function () {
          this.handleSVGTitleElement();
          this.setSVGContainerLabel();
          this.setGraphicContainerAttrs();
          this.setRenderToAttrs();
          this.makeCreditsAccessible();
        };
        f.prototype.handleSVGTitleElement = function () {
          var a = this.chart,
            b = "highcharts-title-" + a.index,
            c = k(
              a.langFormat("accessibility.svgContainerTitle", {
                chartTitle: z(a),
              }),
            );
          if (c.length) {
            var e = (this.svgTitleElement =
              this.svgTitleElement ||
              g.createElementNS("http://www.w3.org/2000/svg", "title"));
            e.textContent = c;
            e.id = b;
            a.renderTo.insertBefore(e, a.renderTo.firstChild);
          }
        };
        f.prototype.setSVGContainerLabel = function () {
          var a = this.chart,
            b = a.langFormat("accessibility.svgContainerLabel", {
              chartTitle: z(a),
            });
          a.renderer.box &&
            b.length &&
            a.renderer.box.setAttribute("aria-label", b);
        };
        f.prototype.setGraphicContainerAttrs = function () {
          var a = this.chart,
            b = a.langFormat("accessibility.graphicContainerLabel", {
              chartTitle: z(a),
            });
          b.length && a.container.setAttribute("aria-label", b);
        };
        f.prototype.setRenderToAttrs = function () {
          var a = this.chart,
            b = "disabled" !== a.options.accessibility.landmarkVerbosity,
            c = a.langFormat("accessibility.chartContainerLabel", {
              title: z(a),
              chart: a,
            });
          c &&
            (a.renderTo.setAttribute("role", b ? "region" : "group"),
            a.renderTo.setAttribute("aria-label", c));
        };
        f.prototype.makeCreditsAccessible = function () {
          var a = this.chart,
            b = a.credits;
          b &&
            (b.textStr &&
              b.element.setAttribute(
                "aria-label",
                a.langFormat("accessibility.credits", {
                  creditsStr: k(b.textStr),
                }),
              ),
            u(a, b.element));
        };
        f.prototype.getKeyboardNavigation = function () {
          var a = this.chart;
          return new h(a, {
            keyCodeMap: [],
            validate: function () {
              return !0;
            },
            init: function () {
              var b = a.accessibility;
              b && b.keyboardNavigation.tabindexContainer.focus();
            },
          });
        };
        f.prototype.destroy = function () {
          this.chart.renderTo.setAttribute("aria-hidden", !0);
        };
        return f;
      })(a);
    },
  );
  A(
    a,
    "Accessibility/FocusBorder.js",
    [a["Core/Renderer/SVG/SVGLabel.js"], a["Core/Utilities.js"]],
    function (a, h) {
      var l = h.addEvent,
        u = h.pick,
        m;
      (function (h) {
        function p() {
          var c = this.focusElement,
            b = this.options.accessibility.keyboardNavigation.focusBorder;
          c &&
            (c.removeFocusBorder(),
            b.enabled &&
              c.addFocusBorder(b.margin, {
                stroke: b.style.color,
                strokeWidth: b.style.lineWidth,
                r: b.style.borderRadius,
              }));
        }
        function z(c, b) {
          var a = this.options.accessibility.keyboardNavigation.focusBorder;
          (b = b || c.element) &&
            b.focus &&
            ((b.hcEvents && b.hcEvents.focusin) ||
              l(b, "focusin", function () {}),
            b.focus(),
            a.hideBrowserFocusOutline && (b.style.outline = "none"));
          this.focusElement && this.focusElement.removeFocusBorder();
          this.focusElement = c;
          this.renderFocusBorder();
        }
        function g(b) {
          if (!b.focusBorderDestroyHook) {
            var c = b.destroy;
            b.destroy = function () {
              b.focusBorder && b.focusBorder.destroy && b.focusBorder.destroy();
              return c.apply(b, arguments);
            };
            b.focusBorderDestroyHook = c;
          }
        }
        function k(b, c) {
          this.focusBorder && this.removeFocusBorder();
          var e = this.getBBox(),
            d = u(b, 3),
            r = this.parentGroup,
            f = this.scaleX || (r && r.scaleX),
            k = this.scaleY || (r && r.scaleY);
          f = (f ? !k : k)
            ? Math.abs(f || k || 1)
            : (Math.abs(f || 1) + Math.abs(k || 1)) / 2;
          e.x += this.translateX ? this.translateX : 0;
          e.y += this.translateY ? this.translateY : 0;
          k = e.x - d;
          var h = e.y - d,
            v = e.width + 2 * d,
            n = e.height + 2 * d,
            q = this instanceof a;
          if ("text" === this.element.nodeName || q) {
            var D = !!this.rotation;
            if (q) var y = { x: D ? 1 : 0, y: 0 };
            else {
              var F = (y = 0);
              "middle" === this.attr("text-anchor")
                ? (y = F = 0.5)
                : this.rotation
                  ? (y = 0.25)
                  : (F = 0.75);
              y = { x: y, y: F };
            }
            F = +this.attr("x");
            var t = +this.attr("y");
            isNaN(F) || (k = F - e.width * y.x - d);
            isNaN(t) || (h = t - e.height * y.y - d);
            q &&
              D &&
              ((q = v),
              (v = n),
              (n = q),
              isNaN(F) || (k = F - e.height * y.x - d),
              isNaN(t) || (h = t - e.width * y.y - d));
          }
          this.focusBorder = this.renderer
            .rect(k, h, v, n, parseInt(((c && c.r) || 0).toString(), 10) / f)
            .addClass("highcharts-focus-border")
            .attr({ zIndex: 99 })
            .add(r);
          this.renderer.styledMode ||
            this.focusBorder.attr({
              stroke: c && c.stroke,
              "stroke-width": ((c && c.strokeWidth) || 0) / f,
            });
          w(this, b, c);
          g(this);
        }
        function w(b) {
          for (var a = [], e = 1; e < arguments.length; e++)
            a[e - 1] = arguments[e];
          b.focusBorderUpdateHooks ||
            ((b.focusBorderUpdateHooks = {}),
            c.forEach(function (c) {
              c += "Setter";
              var e = b[c] || b._defaultSetter;
              b.focusBorderUpdateHooks[c] = e;
              b[c] = function () {
                var c = e.apply(b, arguments);
                b.addFocusBorder.apply(b, a);
                return c;
              };
            }));
        }
        function f() {
          d(this);
          this.focusBorderDestroyHook &&
            ((this.destroy = this.focusBorderDestroyHook),
            delete this.focusBorderDestroyHook);
          this.focusBorder &&
            (this.focusBorder.destroy(), delete this.focusBorder);
        }
        function d(b) {
          b.focusBorderUpdateHooks &&
            (Object.keys(b.focusBorderUpdateHooks).forEach(function (c) {
              var a = b.focusBorderUpdateHooks[c];
              a === b._defaultSetter ? delete b[c] : (b[c] = a);
            }),
            delete b.focusBorderUpdateHooks);
        }
        var b = [],
          c = "x y transform width height r d stroke-width".split(" ");
        h.compose = function (c, a) {
          -1 === b.indexOf(c) &&
            (b.push(c),
            (c = c.prototype),
            (c.renderFocusBorder = p),
            (c.setFocusToElement = z));
          -1 === b.indexOf(a) &&
            (b.push(a),
            (a = a.prototype),
            (a.addFocusBorder = k),
            (a.removeFocusBorder = f));
        };
      })(m || (m = {}));
      return m;
    },
  );
  A(
    a,
    "Accessibility/Utils/Announcer.js",
    [
      a["Core/Renderer/HTML/AST.js"],
      a["Accessibility/Utils/DOMElementProvider.js"],
      a["Core/Globals.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l, x, m) {
      var p = l.doc,
        u = x.addClass,
        z = x.visuallyHideElement,
        g = m.attr;
      return (function () {
        function k(a, f) {
          this.chart = a;
          this.domElementProvider = new h();
          this.announceRegion = this.addAnnounceRegion(f);
        }
        k.prototype.destroy = function () {
          this.domElementProvider.destroyCreatedElements();
        };
        k.prototype.announce = function (g) {
          var f = this;
          a.setElementHTML(this.announceRegion, g);
          this.clearAnnouncementRegionTimer &&
            clearTimeout(this.clearAnnouncementRegionTimer);
          this.clearAnnouncementRegionTimer = setTimeout(function () {
            f.announceRegion.innerHTML = a.emptyHTML;
            delete f.clearAnnouncementRegionTimer;
          }, 1e3);
        };
        k.prototype.addAnnounceRegion = function (a) {
          var f =
              this.chart.announcerContainer || this.createAnnouncerContainer(),
            d = this.domElementProvider.createElement("div");
          g(d, { "aria-hidden": !1, "aria-live": a });
          this.chart.styledMode ? u(d, "highcharts-visually-hidden") : z(d);
          f.appendChild(d);
          return d;
        };
        k.prototype.createAnnouncerContainer = function () {
          var a = this.chart,
            f = p.createElement("div");
          g(f, { "aria-hidden": !1, class: "highcharts-announcer-container" });
          f.style.position = "relative";
          a.renderTo.insertBefore(f, a.renderTo.firstChild);
          return (a.announcerContainer = f);
        };
        return k;
      })();
    },
  );
  A(
    a,
    "Accessibility/Components/AnnotationsA11y.js",
    [a["Accessibility/Utils/HTMLUtilities.js"]],
    function (a) {
      function h(a) {
        return (a.annotations || []).reduce(function (a, k) {
          k.options && !1 !== k.options.visible && (a = a.concat(k.labels));
          return a;
        }, []);
      }
      function l(a) {
        return (
          (a.options &&
            a.options.accessibility &&
            a.options.accessibility.description) ||
          (a.graphic && a.graphic.text && a.graphic.text.textStr) ||
          ""
        );
      }
      function u(a) {
        var g =
          a.options &&
          a.options.accessibility &&
          a.options.accessibility.description;
        if (g) return g;
        g = a.chart;
        var k = l(a),
          h = a.points
            .filter(function (b) {
              return !!b.graphic;
            })
            .map(function (b) {
              var c =
                (b.accessibility && b.accessibility.valueDescription) ||
                (b.graphic &&
                  b.graphic.element &&
                  b.graphic.element.getAttribute("aria-label")) ||
                "";
              b = (b && b.series.name) || "";
              return (b ? b + ", " : "") + "data point " + c;
            })
            .filter(function (b) {
              return !!b;
            }),
          f = h.length,
          d =
            "accessibility.screenReaderSection.annotations.description" +
            (1 < f ? "MultiplePoints" : f ? "SinglePoint" : "NoPoints");
        a = {
          annotationText: k,
          annotation: a,
          numPoints: f,
          annotationPoint: h[0],
          additionalAnnotationPoints: h.slice(1),
        };
        return g.langFormat(d, a);
      }
      function m(a) {
        return h(a).map(function (a) {
          return (a = p(K(u(a)))) ? "<li>".concat(a, "</li>") : "";
        });
      }
      var p = a.escapeStringForHTML,
        K = a.stripHTMLTagsFromString;
      return {
        getAnnotationsInfoHTML: function (a) {
          var g = a.annotations;
          if (!g || !g.length) return "";
          a = m(a);
          return '<ul style="list-style-type: none">'.concat(
            a.join(" "),
            "</ul>",
          );
        },
        getAnnotationLabelDescription: u,
        getAnnotationListItems: m,
        getPointAnnotationTexts: function (a) {
          var g = h(a.series.chart).filter(function (k) {
            return -1 < k.points.indexOf(a);
          });
          return g.length
            ? g.map(function (a) {
                return "".concat(l(a));
              })
            : [];
        },
      };
    },
  );
  A(
    a,
    "Accessibility/Components/InfoRegionsComponent.js",
    [
      a["Accessibility/A11yI18n.js"],
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/Utils/Announcer.js"],
      a["Accessibility/Components/AnnotationsA11y.js"],
      a["Core/Renderer/HTML/AST.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Core/FormatUtilities.js"],
      a["Core/Globals.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l, x, m, p, K, z, g, k) {
      function w(a, b) {
        var c = b[0],
          e = (a.series && a.series[0]) || {};
        e = {
          numSeries: a.series.length,
          numPoints: e.points && e.points.length,
          chart: a,
          mapTitle: a.mapView && a.mapView.geoMap && a.mapView.geoMap.title,
        };
        if (!c) return a.langFormat("accessibility.chartTypes.emptyChart", e);
        if ("map" === c)
          return e.mapTitle
            ? a.langFormat("accessibility.chartTypes.mapTypeDescription", e)
            : a.langFormat("accessibility.chartTypes.unknownMap", e);
        if (1 < a.types.length)
          return a.langFormat("accessibility.chartTypes.combinationChart", e);
        b = b[0];
        c = a.langFormat("accessibility.seriesTypeDescriptions." + b, e);
        var d = a.series && 2 > a.series.length ? "Single" : "Multiple";
        return (
          (a.langFormat("accessibility.chartTypes." + b + d, e) ||
            a.langFormat("accessibility.chartTypes.default" + d, e)) +
          (c ? " " + c : "")
        );
      }
      var f =
          (this && this.__extends) ||
          (function () {
            var a = function (b, c) {
              a =
                Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array &&
                  function (a, b) {
                    a.__proto__ = b;
                  }) ||
                function (a, b) {
                  for (var c in b) b.hasOwnProperty(c) && (a[c] = b[c]);
                };
              return a(b, c);
            };
            return function (b, c) {
              function e() {
                this.constructor = b;
              }
              a(b, c);
              b.prototype =
                null === c
                  ? Object.create(c)
                  : ((e.prototype = c.prototype), new e());
            };
          })(),
        d = x.getAnnotationsInfoHTML,
        b = p.getAxisDescription,
        c = p.getAxisRangeDescription,
        e = p.getChartTitle,
        r = p.unhideChartElementFromAT,
        E = K.format,
        I = z.doc,
        u = g.addClass,
        B = g.getElement,
        H = g.getHeadingTagNameForElement,
        C = g.stripHTMLTagsFromString,
        v = g.visuallyHideElement,
        n = k.attr,
        q = k.pick;
      return (function (D) {
        function y() {
          var a = (null !== D && D.apply(this, arguments)) || this;
          a.announcer = void 0;
          a.screenReaderSections = {};
          return a;
        }
        f(y, D);
        y.prototype.init = function () {
          var a = this.chart,
            b = this;
          this.initRegionsDefinitions();
          this.addEvent(a, "aftergetTableAST", function (a) {
            b.onDataTableCreated(a);
          });
          this.addEvent(a, "afterViewData", function (a) {
            a.wasHidden &&
              ((b.dataTableDiv = a.element),
              setTimeout(function () {
                b.focusDataTable();
              }, 300));
          });
          this.announcer = new l(a, "assertive");
        };
        y.prototype.initRegionsDefinitions = function () {
          var a = this;
          this.screenReaderSections = {
            before: {
              element: null,
              buildContent: function (b) {
                var c =
                  b.options.accessibility.screenReaderSection
                    .beforeChartFormatter;
                return c ? c(b) : a.defaultBeforeChartFormatter(b);
              },
              insertIntoDOM: function (a, b) {
                b.renderTo.insertBefore(a, b.renderTo.firstChild);
              },
              afterInserted: function () {
                "undefined" !== typeof a.sonifyButtonId &&
                  a.initSonifyButton(a.sonifyButtonId);
                "undefined" !== typeof a.dataTableButtonId &&
                  a.initDataTableButton(a.dataTableButtonId);
              },
            },
            after: {
              element: null,
              buildContent: function (b) {
                var c =
                  b.options.accessibility.screenReaderSection
                    .afterChartFormatter;
                return c ? c(b) : a.defaultAfterChartFormatter();
              },
              insertIntoDOM: function (a, b) {
                b.renderTo.insertBefore(a, b.container.nextSibling);
              },
              afterInserted: function () {
                a.chart.accessibility &&
                  a.chart.accessibility.keyboardNavigation.updateExitAnchor();
              },
            },
          };
        };
        y.prototype.onChartRender = function () {
          var a = this;
          this.linkedDescriptionElement = this.getLinkedDescriptionElement();
          this.setLinkedDescriptionAttrs();
          Object.keys(this.screenReaderSections).forEach(function (b) {
            a.updateScreenReaderSection(b);
          });
        };
        y.prototype.getLinkedDescriptionElement = function () {
          var a = this.chart.options.accessibility.linkedDescription;
          if (a) {
            if ("string" !== typeof a) return a;
            a = E(a, this.chart);
            a = I.querySelectorAll(a);
            if (1 === a.length) return a[0];
          }
        };
        y.prototype.setLinkedDescriptionAttrs = function () {
          var a = this.linkedDescriptionElement;
          a &&
            (a.setAttribute("aria-hidden", "true"),
            u(a, "highcharts-linked-description"));
        };
        y.prototype.updateScreenReaderSection = function (a) {
          var b = this.chart,
            c = this.screenReaderSections[a],
            e = c.buildContent(b),
            d = (c.element = c.element || this.createElement("div")),
            n = d.firstChild || this.createElement("div");
          e
            ? (this.setScreenReaderSectionAttribs(d, a),
              m.setElementHTML(n, e),
              d.appendChild(n),
              c.insertIntoDOM(d, b),
              b.styledMode ? u(n, "highcharts-visually-hidden") : v(n),
              r(b, n),
              c.afterInserted && c.afterInserted())
            : (d.parentNode && d.parentNode.removeChild(d), (c.element = null));
        };
        y.prototype.setScreenReaderSectionAttribs = function (a, b) {
          var c = this.chart,
            d = c.langFormat(
              "accessibility.screenReaderSection." + b + "RegionLabel",
              { chart: c, chartTitle: e(c) },
            );
          b = "highcharts-screen-reader-region-".concat(b, "-").concat(c.index);
          n(a, { id: b, "aria-label": d || void 0 });
          a.style.position = "relative";
          d &&
            a.setAttribute(
              "role",
              "all" === c.options.accessibility.landmarkVerbosity
                ? "region"
                : "group",
            );
        };
        y.prototype.defaultBeforeChartFormatter = function () {
          var b = this.chart,
            c = b.options.accessibility.screenReaderSection.beforeChartFormat;
          if (!c) return "";
          var n = this.getAxesDescription(),
            q =
              b.sonify &&
              b.options.sonification &&
              b.options.sonification.enabled,
            y = "highcharts-a11y-sonify-data-btn-" + b.index,
            f = "hc-linkto-highcharts-data-table-" + b.index,
            r = d(b),
            v = b.langFormat(
              "accessibility.screenReaderSection.annotations.heading",
              { chart: b },
            );
          n = {
            headingTagName: H(b.renderTo),
            chartTitle: e(b),
            typeDescription: this.getTypeDescriptionText(),
            chartSubtitle: this.getSubtitleText(),
            chartLongdesc: this.getLongdescText(),
            xAxisDescription: n.xAxis,
            yAxisDescription: n.yAxis,
            playAsSoundButton: q ? this.getSonifyButtonText(y) : "",
            viewTableButton: b.getCSV ? this.getDataTableButtonText(f) : "",
            annotationsTitle: r ? v : "",
            annotationsList: r,
          };
          b = a.i18nFormat(c, n, b);
          this.dataTableButtonId = f;
          this.sonifyButtonId = y;
          return b.replace(/<(\w+)[^>]*?>\s*<\/\1>/g, "");
        };
        y.prototype.defaultAfterChartFormatter = function () {
          var b = this.chart,
            c = b.options.accessibility.screenReaderSection.afterChartFormat;
          if (!c) return "";
          var e = { endOfChartMarker: this.getEndOfChartMarkerText() };
          return a.i18nFormat(c, e, b).replace(/<(\w+)[^>]*?>\s*<\/\1>/g, "");
        };
        y.prototype.getLinkedDescription = function () {
          var a = this.linkedDescriptionElement;
          return C((a && a.innerHTML) || "");
        };
        y.prototype.getLongdescText = function () {
          var a = this.chart.options,
            b = a.caption;
          b = b && b.text;
          var c = this.getLinkedDescription();
          return a.accessibility.description || c || b || "";
        };
        y.prototype.getTypeDescriptionText = function () {
          var a = this.chart;
          return a.types
            ? a.options.accessibility.typeDescription || w(a, a.types)
            : "";
        };
        y.prototype.getDataTableButtonText = function (a) {
          var b = this.chart;
          b = b.langFormat("accessibility.table.viewAsDataTableButtonText", {
            chart: b,
            chartTitle: e(b),
          });
          return '<button id="' + a + '">' + b + "</button>";
        };
        y.prototype.getSonifyButtonText = function (a) {
          var b = this.chart;
          if (b.options.sonification && !1 === b.options.sonification.enabled)
            return "";
          b = b.langFormat("accessibility.sonification.playAsSoundButtonText", {
            chart: b,
            chartTitle: e(b),
          });
          return '<button id="' + a + '">' + b + "</button>";
        };
        y.prototype.getSubtitleText = function () {
          var a = this.chart.options.subtitle;
          return C((a && a.text) || "");
        };
        y.prototype.getEndOfChartMarkerText = function () {
          var a = this.chart,
            b = a.langFormat(
              "accessibility.screenReaderSection.endOfChartMarker",
              { chart: a },
            );
          return (
            '<div id="highcharts-end-of-chart-marker-' +
            a.index +
            '">' +
            b +
            "</div>"
          );
        };
        y.prototype.onDataTableCreated = function (a) {
          var b = this.chart;
          if (b.options.accessibility.enabled) {
            this.viewDataTableButton &&
              this.viewDataTableButton.setAttribute("aria-expanded", "true");
            var c = a.tree.attributes || {};
            c.tabindex = -1;
            c.summary = b.langFormat("accessibility.table.tableSummary", {
              chart: b,
            });
            a.tree.attributes = c;
          }
        };
        y.prototype.focusDataTable = function () {
          var a = this.dataTableDiv;
          (a = a && a.getElementsByTagName("table")[0]) && a.focus && a.focus();
        };
        y.prototype.initSonifyButton = function (a) {
          var b = this,
            c = (this.sonifyButton = B(a)),
            e = this.chart,
            d = function (a) {
              c &&
                (c.setAttribute("aria-hidden", "true"),
                c.setAttribute("aria-label", ""));
              a.preventDefault();
              a.stopPropagation();
              a = e.langFormat(
                "accessibility.sonification.playAsSoundClickAnnouncement",
                { chart: e },
              );
              b.announcer.announce(a);
              setTimeout(function () {
                c &&
                  (c.removeAttribute("aria-hidden"),
                  c.removeAttribute("aria-label"));
                e.sonify && e.sonify();
              }, 1e3);
            };
          c &&
            e &&
            (c.setAttribute("tabindex", -1),
            (c.onclick = function (a) {
              (
                (e.options.accessibility &&
                  e.options.accessibility.screenReaderSection
                    .onPlayAsSoundClick) ||
                d
              ).call(this, a, e);
            }));
        };
        y.prototype.initDataTableButton = function (a) {
          var b = (this.viewDataTableButton = B(a)),
            c = this.chart;
          a = a.replace("hc-linkto-", "");
          b &&
            (n(b, { tabindex: -1, "aria-expanded": !!B(a) }),
            (b.onclick =
              c.options.accessibility.screenReaderSection
                .onViewDataTableClick ||
              function () {
                c.viewData();
              }));
        };
        y.prototype.getAxesDescription = function () {
          var a = this.chart,
            b = function (b, c) {
              b = a[b];
              return (
                1 < b.length ||
                (b[0] &&
                  q(
                    b[0].options.accessibility &&
                      b[0].options.accessibility.enabled,
                    c,
                  ))
              );
            },
            c =
              !!a.types &&
              0 > a.types.indexOf("map") &&
              0 > a.types.indexOf("treemap") &&
              0 > a.types.indexOf("tilemap"),
            e = !!a.hasCartesianSeries,
            d = b("xAxis", !a.angular && e && c);
          b = b("yAxis", e && c);
          c = {};
          d && (c.xAxis = this.getAxisDescriptionText("xAxis"));
          b && (c.yAxis = this.getAxisDescriptionText("yAxis"));
          return c;
        };
        y.prototype.getAxisDescriptionText = function (a) {
          var e = this.chart,
            d = e[a];
          return e.langFormat(
            "accessibility.axis." +
              a +
              "Description" +
              (1 < d.length ? "Plural" : "Singular"),
            {
              chart: e,
              names: d.map(function (a) {
                return b(a);
              }),
              ranges: d.map(function (a) {
                return c(a);
              }),
              numAxes: d.length,
            },
          );
        };
        y.prototype.destroy = function () {
          this.announcer && this.announcer.destroy();
        };
        return y;
      })(h);
    },
  );
  A(
    a,
    "Accessibility/Components/MenuComponent.js",
    [
      a["Core/Chart/Chart.js"],
      a["Core/Utilities.js"],
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/KeyboardNavigationHandler.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
    ],
    function (a, h, l, x, m, p) {
      var u =
          (this && this.__extends) ||
          (function () {
            var a = function (d, b) {
              a =
                Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array &&
                  function (a, b) {
                    a.__proto__ = b;
                  }) ||
                function (a, b) {
                  for (var c in b) b.hasOwnProperty(c) && (a[c] = b[c]);
                };
              return a(d, b);
            };
            return function (d, b) {
              function c() {
                this.constructor = d;
              }
              a(d, b);
              d.prototype =
                null === b
                  ? Object.create(b)
                  : ((c.prototype = b.prototype), new c());
            };
          })(),
        z = h.attr,
        g = m.getChartTitle,
        k = m.unhideChartElementFromAT,
        w = p.getFakeMouseEvent;
      h = (function (a) {
        function d() {
          return (null !== a && a.apply(this, arguments)) || this;
        }
        u(d, a);
        d.prototype.init = function () {
          var a = this.chart,
            c = this;
          this.addEvent(a, "exportMenuShown", function () {
            c.onMenuShown();
          });
          this.addEvent(a, "exportMenuHidden", function () {
            c.onMenuHidden();
          });
          this.createProxyGroup();
        };
        d.prototype.onMenuHidden = function () {
          var a = this.chart.exportContextMenu;
          a && a.setAttribute("aria-hidden", "true");
          this.setExportButtonExpandedState("false");
        };
        d.prototype.onMenuShown = function () {
          var a = this.chart,
            c = a.exportContextMenu;
          c && (this.addAccessibleContextMenuAttribs(), k(a, c));
          this.setExportButtonExpandedState("true");
        };
        d.prototype.setExportButtonExpandedState = function (a) {
          this.exportButtonProxy &&
            this.exportButtonProxy.buttonElement.setAttribute(
              "aria-expanded",
              a,
            );
        };
        d.prototype.onChartRender = function () {
          var a = this.chart,
            c = a.focusElement,
            e = a.accessibility;
          this.proxyProvider.clearGroup("chartMenu");
          this.proxyMenuButton();
          this.exportButtonProxy &&
            c &&
            c === a.exportingGroup &&
            (c.focusBorder
              ? a.setFocusToElement(c, this.exportButtonProxy.buttonElement)
              : e && e.keyboardNavigation.tabindexContainer.focus());
        };
        d.prototype.proxyMenuButton = function () {
          var a = this.chart,
            c = this.proxyProvider,
            e = a.exportSVGElements && a.exportSVGElements[0],
            d = a.options.exporting,
            f = a.exportSVGElements && a.exportSVGElements[0];
          d &&
            !1 !== d.enabled &&
            d.accessibility &&
            d.accessibility.enabled &&
            f &&
            f.element &&
            e &&
            (this.exportButtonProxy = c.addProxyElement(
              "chartMenu",
              { click: e },
              {
                "aria-label": a.langFormat(
                  "accessibility.exporting.menuButtonLabel",
                  { chart: a, chartTitle: g(a) },
                ),
                "aria-expanded": !1,
                title: a.options.lang.contextButtonTitle || null,
              },
            ));
        };
        d.prototype.createProxyGroup = function () {
          this.chart &&
            this.proxyProvider &&
            this.proxyProvider.addGroup("chartMenu", "div");
        };
        d.prototype.addAccessibleContextMenuAttribs = function () {
          var a = this.chart,
            c = a.exportDivElements;
          c &&
            c.length &&
            (c.forEach(function (a) {
              a &&
                ("LI" !== a.tagName || (a.children && a.children.length)
                  ? a.setAttribute("aria-hidden", "true")
                  : a.setAttribute("tabindex", -1));
            }),
            (c = c[0] && c[0].parentNode) &&
              z(c, {
                "aria-hidden": void 0,
                "aria-label": a.langFormat(
                  "accessibility.exporting.chartMenuLabel",
                  { chart: a },
                ),
                role: "list",
              }));
        };
        d.prototype.getKeyboardNavigation = function () {
          var a = this.keyCodes,
            c = this.chart,
            e = this;
          return new x(c, {
            keyCodeMap: [
              [
                [a.left, a.up],
                function () {
                  return e.onKbdPrevious(this);
                },
              ],
              [
                [a.right, a.down],
                function () {
                  return e.onKbdNext(this);
                },
              ],
              [
                [a.enter, a.space],
                function () {
                  return e.onKbdClick(this);
                },
              ],
            ],
            validate: function () {
              return (
                !!c.exporting &&
                !1 !== c.options.exporting.enabled &&
                !1 !== c.options.exporting.accessibility.enabled
              );
            },
            init: function () {
              var a = e.exportButtonProxy,
                b = e.chart.exportingGroup;
              a && b && c.setFocusToElement(b, a.buttonElement);
            },
            terminate: function () {
              c.hideExportMenu();
            },
          });
        };
        d.prototype.onKbdPrevious = function (a) {
          var b = this.chart,
            e = b.options.accessibility;
          a = a.response;
          for (var d = b.highlightedExportItemIx || 0; d--; )
            if (b.highlightExportItem(d)) return a.success;
          return e.keyboardNavigation.wrapAround
            ? (b.highlightLastExportItem(), a.success)
            : a.prev;
        };
        d.prototype.onKbdNext = function (a) {
          var b = this.chart,
            e = b.options.accessibility;
          a = a.response;
          for (
            var d = (b.highlightedExportItemIx || 0) + 1;
            d < b.exportDivElements.length;
            ++d
          )
            if (b.highlightExportItem(d)) return a.success;
          return e.keyboardNavigation.wrapAround
            ? (b.highlightExportItem(0), a.success)
            : a.next;
        };
        d.prototype.onKbdClick = function (a) {
          var b = this.chart,
            e = b.exportDivElements[b.highlightedExportItemIx],
            d = (b.exportSVGElements && b.exportSVGElements[0]).element;
          b.openMenu
            ? this.fakeClickEvent(e)
            : (this.fakeClickEvent(d), b.highlightExportItem(0));
          return a.response.success;
        };
        return d;
      })(l);
      (function (f) {
        function d() {
          var a = this.exportSVGElements && this.exportSVGElements[0];
          if (a && ((a = a.element), a.onclick)) a.onclick(w("click"));
        }
        function b() {
          var a = this.exportDivElements;
          a &&
            this.exportContextMenu &&
            this.openMenu &&
            (a.forEach(function (a) {
              if (a && "highcharts-menu-item" === a.className && a.onmouseout)
                a.onmouseout(w("mouseout"));
            }),
            (this.highlightedExportItemIx = 0),
            this.exportContextMenu.hideMenu(),
            this.container.focus());
        }
        function c(a) {
          var b = this.exportDivElements && this.exportDivElements[a],
            c =
              this.exportDivElements &&
              this.exportDivElements[this.highlightedExportItemIx];
          if (b && "LI" === b.tagName && (!b.children || !b.children.length)) {
            var e = !!(this.renderTo.getElementsByTagName("g")[0] || {}).focus;
            b.focus && e && b.focus();
            if (c && c.onmouseout) c.onmouseout(w("mouseout"));
            if (b.onmouseover) b.onmouseover(w("mouseover"));
            this.highlightedExportItemIx = a;
            return !0;
          }
          return !1;
        }
        function e() {
          if (this.exportDivElements)
            for (var a = this.exportDivElements.length; a--; )
              if (this.highlightExportItem(a)) return !0;
          return !1;
        }
        var r = [];
        f.compose = function (f) {
          -1 === r.indexOf(f) &&
            (r.push(f),
            (f = a.prototype),
            (f.hideExportMenu = b),
            (f.highlightExportItem = c),
            (f.highlightLastExportItem = e),
            (f.showExportMenu = d));
        };
      })(h || (h = {}));
      return h;
    },
  );
  A(
    a,
    "Accessibility/KeyboardNavigation.js",
    [
      a["Core/Globals.js"],
      a["Accessibility/Components/MenuComponent.js"],
      a["Core/Utilities.js"],
      a["Accessibility/Utils/EventProvider.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
    ],
    function (a, h, l, x, m) {
      var p = a.doc,
        u = a.win,
        z = l.addEvent,
        g = l.fireEvent,
        k = m.getElement,
        w = m.simulatedEventTarget;
      l = (function () {
        function a(a, b) {
          this.components = this.chart = void 0;
          this.currentModuleIx = NaN;
          this.exitAnchor = this.eventProvider = void 0;
          this.modules = [];
          this.tabindexContainer = void 0;
          this.init(a, b);
        }
        a.prototype.init = function (a, b) {
          var c = this,
            e = (this.eventProvider = new x());
          this.chart = a;
          this.components = b;
          this.modules = [];
          this.currentModuleIx = 0;
          this.update();
          e.addEvent(this.tabindexContainer, "keydown", function (a) {
            return c.onKeydown(a);
          });
          e.addEvent(this.tabindexContainer, "focus", function (a) {
            return c.onFocus(a);
          });
          ["mouseup", "touchend"].forEach(function (a) {
            return e.addEvent(p, a, function (a) {
              return c.onMouseUp(a);
            });
          });
          ["mousedown", "touchstart"].forEach(function (b) {
            return e.addEvent(a.renderTo, b, function () {
              c.isClickingChart = !0;
            });
          });
          e.addEvent(a.renderTo, "mouseover", function () {
            c.pointerIsOverChart = !0;
          });
          e.addEvent(a.renderTo, "mouseout", function () {
            c.pointerIsOverChart = !1;
          });
        };
        a.prototype.update = function (a) {
          var b = this.chart.options.accessibility;
          b = b && b.keyboardNavigation;
          var c = this.components;
          this.updateContainerTabindex();
          b && b.enabled && a && a.length
            ? ((this.modules = a.reduce(function (a, b) {
                b = c[b].getKeyboardNavigation();
                return a.concat(b);
              }, [])),
              this.updateExitAnchor())
            : ((this.modules = []),
              (this.currentModuleIx = 0),
              this.removeExitAnchor());
        };
        a.prototype.updateExitAnchor = function () {
          var a = "highcharts-end-of-chart-marker-".concat(this.chart.index);
          a = k(a);
          this.removeExitAnchor();
          a
            ? (this.makeElementAnExitAnchor(a), (this.exitAnchor = a))
            : this.createExitAnchor();
        };
        a.prototype.move = function (a) {
          var b = this.modules && this.modules[this.currentModuleIx];
          b && b.terminate && b.terminate(a);
          this.chart.focusElement &&
            this.chart.focusElement.removeFocusBorder();
          this.currentModuleIx += a;
          if ((b = this.modules && this.modules[this.currentModuleIx])) {
            if (b.validate && !b.validate()) return this.move(a);
            if (b.init) return b.init(a), !0;
          }
          this.currentModuleIx = 0;
          this.exiting = !0;
          0 < a
            ? this.exitAnchor && this.exitAnchor.focus()
            : this.tabindexContainer.focus();
          return !1;
        };
        a.prototype.onFocus = function (a) {
          var b = this.chart;
          a = a.relatedTarget && b.container.contains(a.relatedTarget);
          this.exiting ||
            this.tabbingInBackwards ||
            this.isClickingChart ||
            a ||
            ((a = this.getFirstValidModuleIx()),
            null !== a &&
              ((this.currentModuleIx = a), this.modules[a].init(1)));
          this.exiting = !1;
        };
        a.prototype.onMouseUp = function (a) {
          delete this.isClickingChart;
          if (!this.keyboardReset && a.relatedTarget !== w) {
            a = this.chart;
            if (!this.pointerIsOverChart) {
              var b = this.modules && this.modules[this.currentModuleIx || 0];
              b && b.terminate && b.terminate();
              this.currentModuleIx = 0;
            }
            a.focusElement &&
              (a.focusElement.removeFocusBorder(), delete a.focusElement);
            this.keyboardReset = !0;
          }
        };
        a.prototype.onKeydown = function (a) {
          a = a || u.event;
          var b =
              this.modules &&
              this.modules.length &&
              this.modules[this.currentModuleIx],
            c;
          this.exiting = this.keyboardReset = !1;
          if (b) {
            var e = b.run(a);
            e === b.response.success
              ? (c = !0)
              : e === b.response.prev
                ? (c = this.move(-1))
                : e === b.response.next && (c = this.move(1));
            c && (a.preventDefault(), a.stopPropagation());
          }
        };
        a.prototype.updateContainerTabindex = function () {
          var a = this.chart.options.accessibility;
          a = a && a.keyboardNavigation;
          a = !(a && !1 === a.enabled);
          var b = this.chart,
            c = b.container;
          b.renderTo.hasAttribute("tabindex") &&
            (c.removeAttribute("tabindex"), (c = b.renderTo));
          this.tabindexContainer = c;
          var e = c.getAttribute("tabindex");
          a && !e
            ? c.setAttribute("tabindex", "0")
            : a || b.container.removeAttribute("tabindex");
        };
        a.prototype.createExitAnchor = function () {
          var a = this.chart,
            b = (this.exitAnchor = p.createElement("div"));
          a.renderTo.appendChild(b);
          this.makeElementAnExitAnchor(b);
        };
        a.prototype.makeElementAnExitAnchor = function (a) {
          var b = this.tabindexContainer.getAttribute("tabindex") || 0;
          a.setAttribute("class", "highcharts-exit-anchor");
          a.setAttribute("tabindex", b);
          a.setAttribute("aria-hidden", !1);
          this.addExitAnchorEventsToEl(a);
        };
        a.prototype.removeExitAnchor = function () {
          this.exitAnchor &&
            this.exitAnchor.parentNode &&
            (this.exitAnchor.parentNode.removeChild(this.exitAnchor),
            delete this.exitAnchor);
        };
        a.prototype.addExitAnchorEventsToEl = function (a) {
          var b = this.chart,
            c = this;
          this.eventProvider.addEvent(a, "focus", function (a) {
            a = a || u.event;
            var e = !(
              (a.relatedTarget && b.container.contains(a.relatedTarget)) ||
              c.exiting
            );
            b.focusElement && delete b.focusElement;
            e
              ? ((c.tabbingInBackwards = !0),
                c.tabindexContainer.focus(),
                delete c.tabbingInBackwards,
                a.preventDefault(),
                c.modules &&
                  c.modules.length &&
                  ((c.currentModuleIx = c.modules.length - 1),
                  (a = c.modules[c.currentModuleIx]) &&
                  a.validate &&
                  !a.validate()
                    ? c.move(-1)
                    : a && a.init(-1)))
              : (c.exiting = !1);
          });
        };
        a.prototype.getFirstValidModuleIx = function () {
          for (var a = this.modules.length, b = 0; b < a; ++b) {
            var c = this.modules[b];
            if (!c.validate || c.validate()) return b;
          }
          return null;
        };
        a.prototype.destroy = function () {
          this.removeExitAnchor();
          this.eventProvider.removeAddedEvents();
          this.chart.container.removeAttribute("tabindex");
        };
        return a;
      })();
      (function (f) {
        function d() {
          var a = this;
          g(this, "dismissPopupContent", {}, function () {
            a.tooltip && a.tooltip.hide(0);
            a.hideExportMenu();
          });
        }
        function b(b) {
          27 === (b.which || b.keyCode) &&
            a.charts &&
            a.charts.forEach(function (a) {
              a && a.dismissPopupContent && a.dismissPopupContent();
            });
        }
        var c = [];
        f.compose = function (a) {
          h.compose(a);
          -1 === c.indexOf(a) &&
            (c.push(a), (a.prototype.dismissPopupContent = d));
          -1 === c.indexOf(p) && (c.push(p), z(p, "keydown", b));
          return a;
        };
      })(l || (l = {}));
      return l;
    },
  );
  A(
    a,
    "Accessibility/Components/LegendComponent.js",
    [
      a["Core/Animation/AnimationUtilities.js"],
      a["Core/Globals.js"],
      a["Core/Legend/Legend.js"],
      a["Core/Utilities.js"],
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/KeyboardNavigationHandler.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
    ],
    function (a, h, l, x, m, p, K, z) {
      function g(a) {
        var b = a.legend && a.legend.allItems,
          c = a.options.legend.accessibility || {};
        a =
          a.colorAxis &&
          a.colorAxis.some(function (a) {
            return !a.dataClasses || !a.dataClasses.length;
          });
        return !(!b || !b.length || a || !1 === c.enabled);
      }
      function k(a, b) {
        var e = b.legendItem || {};
        b.setState(a ? "hover" : "", !0);
        b = 0;
        for (var d = ["group", "label", "symbol"]; b < d.length; b++) {
          var f = e[d[b]];
          (f = (f && f.element) || f) && c(f, a ? "mouseover" : "mouseout");
        }
      }
      var w =
          (this && this.__extends) ||
          (function () {
            var a = function (b, c) {
              a =
                Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array &&
                  function (a, b) {
                    a.__proto__ = b;
                  }) ||
                function (a, b) {
                  for (var c in b) b.hasOwnProperty(c) && (a[c] = b[c]);
                };
              return a(b, c);
            };
            return function (b, c) {
              function e() {
                this.constructor = b;
              }
              a(b, c);
              b.prototype =
                null === c
                  ? Object.create(c)
                  : ((e.prototype = c.prototype), new e());
            };
          })(),
        f = a.animObject,
        d = h.doc,
        b = x.addEvent,
        c = x.fireEvent,
        e = x.isNumber,
        r = x.pick,
        E = x.syncTimeout,
        u = K.getChartTitle,
        J = z.stripHTMLTagsFromString,
        B = z.addClass,
        H = z.removeClass;
      a = (function (a) {
        function b() {
          var b = (null !== a && a.apply(this, arguments)) || this;
          b.highlightedLegendItemIx = NaN;
          b.proxyGroup = null;
          return b;
        }
        w(b, a);
        b.prototype.init = function () {
          var a = this;
          this.recreateProxies();
          this.addEvent(l, "afterScroll", function () {
            this.chart === a.chart &&
              (a.proxyProvider.updateGroupProxyElementPositions("legend"),
              a.updateLegendItemProxyVisibility(),
              -1 < a.highlightedLegendItemIx &&
                this.chart.highlightLegendItem(a.highlightedLegendItemIx));
          });
          this.addEvent(l, "afterPositionItem", function (b) {
            this.chart === a.chart &&
              this.chart.renderer &&
              a.updateProxyPositionForItem(b.item);
          });
          this.addEvent(l, "afterRender", function () {
            this.chart === a.chart &&
              this.chart.renderer &&
              a.recreateProxies() &&
              E(
                function () {
                  return a.proxyProvider.updateGroupProxyElementPositions(
                    "legend",
                  );
                },
                f(r(this.chart.renderer.globalAnimation, !0)).duration,
              );
          });
        };
        b.prototype.updateLegendItemProxyVisibility = function () {
          var a = this.chart,
            b = a.legend,
            c = b.currentPage || 1,
            e = b.clipHeight || 0,
            d;
          (b.allItems || []).forEach(function (n) {
            if (n.a11yProxyElement) {
              var t = b.pages && b.pages.length,
                y = n.a11yProxyElement.element,
                q = !1;
              d = n.legendItem || {};
              t &&
                ((n = d.pageIx || 0),
                (t = d.y || 0),
                (q = d.label ? Math.round(d.label.getBBox().height) : 0),
                (q = t + q - b.pages[n] > e || n !== c - 1));
              q
                ? a.styledMode
                  ? B(y, "highcharts-a11y-invisible")
                  : (y.style.visibility = "hidden")
                : (H(y, "highcharts-a11y-invisible"),
                  (y.style.visibility = ""));
            }
          });
        };
        b.prototype.onChartRender = function () {
          g(this.chart) || this.removeProxies();
        };
        b.prototype.highlightAdjacentLegendPage = function (a) {
          var b = this.chart,
            c = b.legend;
          a = (c.currentPage || 1) + a;
          var e = c.pages || [];
          if (0 < a && a <= e.length)
            for (var d = (e = 0), n = c.allItems; d < n.length; d++)
              ((n[d].legendItem || {}).pageIx || 0) + 1 === a &&
                (c = b.highlightLegendItem(e)) &&
                (this.highlightedLegendItemIx = e),
                ++e;
        };
        b.prototype.updateProxyPositionForItem = function (a) {
          a.a11yProxyElement && a.a11yProxyElement.refreshPosition();
        };
        b.prototype.recreateProxies = function () {
          var a = d.activeElement,
            b = this.proxyGroup;
          a = a && b && b.contains(a);
          this.removeProxies();
          return g(this.chart)
            ? (this.addLegendProxyGroup(),
              this.proxyLegendItems(),
              this.updateLegendItemProxyVisibility(),
              this.updateLegendTitle(),
              a && this.chart.highlightLegendItem(this.highlightedLegendItemIx),
              !0)
            : !1;
        };
        b.prototype.removeProxies = function () {
          this.proxyProvider.removeGroup("legend");
        };
        b.prototype.updateLegendTitle = function () {
          var a = this.chart,
            b = J(
              (
                (a.legend &&
                  a.legend.options.title &&
                  a.legend.options.title.text) ||
                ""
              ).replace(/<br ?\/?>/g, " "),
            );
          a = a.langFormat(
            "accessibility.legend.legendLabel" + (b ? "" : "NoTitle"),
            { chart: a, legendTitle: b, chartTitle: u(a) },
          );
          this.proxyProvider.updateGroupAttrs("legend", { "aria-label": a });
        };
        b.prototype.addLegendProxyGroup = function () {
          this.proxyGroup = this.proxyProvider.addGroup("legend", "ul", {
            "aria-label": "_placeholder_",
            role:
              "all" === this.chart.options.accessibility.landmarkVerbosity
                ? "region"
                : null,
          });
        };
        b.prototype.proxyLegendItems = function () {
          var a = this,
            b;
          ((this.chart.legend || {}).allItems || []).forEach(function (c) {
            b = c.legendItem || {};
            b.label && b.label.element && a.proxyLegendItem(c);
          });
        };
        b.prototype.proxyLegendItem = function (a) {
          var b = a.legendItem || {};
          if (b.label && b.group) {
            var c = this.chart.langFormat("accessibility.legend.legendItem", {
              chart: this.chart,
              itemName: J(a.name),
              item: a,
            });
            a.a11yProxyElement = this.proxyProvider.addProxyElement(
              "legend",
              {
                click: b.label,
                visual: (b.group.div ? b.label : b.group).element,
              },
              { tabindex: -1, "aria-pressed": a.visible, "aria-label": c },
            );
          }
        };
        b.prototype.getKeyboardNavigation = function () {
          var a = this.keyCodes,
            b = this,
            c = this.chart;
          return new p(c, {
            keyCodeMap: [
              [
                [a.left, a.right, a.up, a.down],
                function (a) {
                  return b.onKbdArrowKey(this, a);
                },
              ],
              [
                [a.enter, a.space],
                function () {
                  return b.onKbdClick(this);
                },
              ],
              [
                [a.pageDown, a.pageUp],
                function (c) {
                  b.highlightAdjacentLegendPage(c === a.pageDown ? 1 : -1);
                  return this.response.success;
                },
              ],
            ],
            validate: function () {
              return b.shouldHaveLegendNavigation();
            },
            init: function () {
              c.highlightLegendItem(0);
              b.highlightedLegendItemIx = 0;
            },
            terminate: function () {
              b.highlightedLegendItemIx = -1;
              c.legend.allItems.forEach(function (a) {
                return k(!1, a);
              });
            },
          });
        };
        b.prototype.onKbdArrowKey = function (a, b) {
          var c = this.keyCodes,
            e = a.response,
            d = this.chart,
            n = d.options.accessibility,
            f = d.legend.allItems.length;
          b = b === c.left || b === c.up ? -1 : 1;
          if (d.highlightLegendItem(this.highlightedLegendItemIx + b))
            return (this.highlightedLegendItemIx += b), e.success;
          1 < f && n.keyboardNavigation.wrapAround && a.init(b);
          return e.success;
        };
        b.prototype.onKbdClick = function (a) {
          var b = this.chart.legend.allItems[this.highlightedLegendItemIx];
          b && b.a11yProxyElement && b.a11yProxyElement.click();
          return a.response.success;
        };
        b.prototype.shouldHaveLegendNavigation = function () {
          if (!g(this.chart)) return !1;
          var a = this.chart,
            b = (a.options.legend || {}).accessibility || {};
          return !!(
            a.legend.display &&
            b.keyboardNavigation &&
            b.keyboardNavigation.enabled
          );
        };
        return b;
      })(m);
      (function (a) {
        function c(a) {
          var b = this.legend.allItems,
            c =
              this.accessibility &&
              this.accessibility.components.legend.highlightedLegendItemIx,
            d = b[a],
            n = d.legendItem || {};
          return d
            ? (e(c) && b[c] && k(!1, b[c]),
              (b = this.legend),
              (a = (b.allItems[a].legendItem || {}).pageIx),
              (c = b.currentPage),
              "undefined" !== typeof a && a + 1 !== c && b.scroll(1 + a - c),
              (n = n.label),
              (a = d.a11yProxyElement && d.a11yProxyElement.buttonElement),
              n && n.element && a && this.setFocusToElement(n, a),
              k(!0, d),
              !0)
            : !1;
        }
        function d(a) {
          var b = a.item;
          this.chart.options.accessibility.enabled &&
            b &&
            b.a11yProxyElement &&
            b.a11yProxyElement.buttonElement.setAttribute(
              "aria-pressed",
              a.visible ? "true" : "false",
            );
        }
        var f = [];
        a.compose = function (a, e) {
          -1 === f.indexOf(a) &&
            (f.push(a), (a.prototype.highlightLegendItem = c));
          -1 === f.indexOf(e) && (f.push(e), b(e, "afterColorizeItem", d));
        };
      })(a || (a = {}));
      return a;
    },
  );
  A(
    a,
    "Accessibility/Components/SeriesComponent/SeriesDescriber.js",
    [
      a["Accessibility/Components/AnnotationsA11y.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Core/FormatUtilities.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l, x, m) {
      function p(a) {
        var b = a.index;
        return a.series && a.series.data && F(b)
          ? q(a.series.data, function (a) {
              return !!(
                a &&
                "undefined" !== typeof a.index &&
                a.index > b &&
                a.graphic &&
                a.graphic.element
              );
            }) || null
          : null;
      }
      function u(a) {
        var b =
          a.chart.options.accessibility.series.pointDescriptionEnabledThreshold;
        return !!(!1 !== b && a.points && a.points.length >= b);
      }
      function z(a) {
        var b = a.options.accessibility || {};
        return !u(a) && !b.exposeAsGroupOnly;
      }
      function g(a) {
        var b =
          a.chart.options.accessibility.keyboardNavigation.seriesNavigation;
        return !(
          !a.points ||
          !(
            a.points.length < b.pointNavigationEnabledThreshold ||
            !1 === b.pointNavigationEnabledThreshold
          )
        );
      }
      function k(a, b) {
        var c = a.series,
          e = c.chart;
        a = e.options.accessibility.point || {};
        var d =
          (c.options.accessibility && c.options.accessibility.point) || {};
        c = c.tooltipOptions || {};
        e = e.options.lang;
        return D(b)
          ? C(
              b,
              d.valueDecimals || a.valueDecimals || c.valueDecimals || -1,
              e.decimalPoint,
              e.accessibility.thousandsSep || e.thousandsSep,
            )
          : b;
      }
      function w(a) {
        var b = (a.options.accessibility || {}).description;
        return (
          (b &&
            a.chart.langFormat("accessibility.series.description", {
              description: b,
              series: a,
            })) ||
          ""
        );
      }
      function f(a, b) {
        return a.chart.langFormat("accessibility.series." + b + "Description", {
          name: E(a[b]),
          series: a,
        });
      }
      function d(a, b, c) {
        var e = b || "",
          d = c || "";
        return a.series.pointArrayMap.reduce(function (b, c) {
          b += b.length ? ", " : "";
          var n = k(a, y(a[c], a.options[c]));
          return b + (c + ": " + e + n + d);
        }, "");
      }
      function b(a) {
        var b = a.series,
          c = 1 < b.chart.series.length || b.options.name,
          e = a.series;
        var n = e.chart;
        var f = e.options.accessibility;
        f =
          (f && f.point && f.point.valueDescriptionFormat) ||
          n.options.accessibility.point.valueDescriptionFormat;
        e = y(
          e.xAxis &&
            e.xAxis.options.accessibility &&
            e.xAxis.options.accessibility.enabled,
          !n.angular,
        );
        if (e) {
          var t = a.series;
          var q = t.chart;
          var v =
              (t.options.accessibility && t.options.accessibility.point) || {},
            D = q.options.accessibility.point || {};
          (t = t.xAxis && t.xAxis.dateTime)
            ? ((t = t.getXDateFormat(
                a.x || 0,
                q.options.tooltip.dateTimeLabelFormats,
              )),
              (v =
                (v.dateFormatter && v.dateFormatter(a)) ||
                (D.dateFormatter && D.dateFormatter(a)) ||
                v.dateFormat ||
                D.dateFormat ||
                t),
              (q = q.time.dateFormat(v, a.x || 0, void 0)))
            : (q = void 0);
          v =
            (a.series.xAxis || {}).categories &&
            F(a.category) &&
            ("" + a.category).replace("<br/>", " ");
          D = F(a.id) && 0 > ("" + a.id).indexOf("highcharts-");
          t = "x, " + a.x;
          q = a.name || q || v || (D ? a.id : t);
        } else q = "";
        v = F(a.index) ? a.index + 1 : "";
        D = a.series;
        var g = D.chart.options.accessibility.point || {},
          E =
            (D.chart.options.accessibility &&
              D.chart.options.accessibility.point) ||
            {},
          h = D.tooltipOptions || {};
        t = E.valuePrefix || g.valuePrefix || h.valuePrefix || "";
        g = E.valueSuffix || g.valueSuffix || h.valueSuffix || "";
        E = k(a, a["undefined" !== typeof a.value ? "value" : "y"]);
        D = a.isNull
          ? D.chart.langFormat("accessibility.series.nullPointValue", {
              point: a,
            })
          : D.pointArrayMap
            ? d(a, t, g)
            : t + E + g;
        n = H(
          f,
          {
            point: a,
            index: v,
            xDescription: q,
            value: D,
            separator: e ? ", " : "",
          },
          n,
        );
        f = (f =
          a.options &&
          a.options.accessibility &&
          a.options.accessibility.description)
          ? " " + f
          : "";
        b = c ? " " + b.name + "." : "";
        c = a.series.chart;
        e = r(a);
        q = { point: a, annotations: e };
        c = e.length
          ? c.langFormat("accessibility.series.pointAnnotationsDescription", q)
          : "";
        a.accessibility = a.accessibility || {};
        a.accessibility.valueDescription = n;
        return n + f + b + (c ? " " + c : "");
      }
      function c(a) {
        var c = z(a),
          e = g(a),
          d = a.chart.options.accessibility.point.describeNull;
        (c || e) &&
          a.points.forEach(function (e) {
            var f;
            if (!(f = e.graphic && e.graphic.element)) {
              var t = e.series;
              f = t && t.chart;
              t = t && t.is("sunburst");
              f = f && f.options.accessibility.point.describeNull;
              if ((f = e.isNull && !t && f)) {
                t = e.series;
                var q = p(e);
                t = (f = q && q.graphic) ? f.parentGroup : t.graph || t.group;
                q = q
                  ? { x: y(e.plotX, q.plotX, 0), y: y(e.plotY, q.plotY, 0) }
                  : { x: y(e.plotX, 0), y: y(e.plotY, 0) };
                q = e.series.chart.renderer.rect(q.x, q.y, 1, 1);
                q.attr({
                  class: "highcharts-a11y-mock-point",
                  fill: "none",
                  opacity: 0,
                  "fill-opacity": 0,
                  "stroke-opacity": 0,
                });
                t && t.element
                  ? ((e.graphic = q),
                    (e.hasMockGraphic = !0),
                    q.add(t),
                    t.element.insertBefore(q.element, f ? f.element : null),
                    (f = q.element))
                  : (f = void 0);
              }
            }
            t =
              e.options &&
              e.options.accessibility &&
              !1 === e.options.accessibility.enabled;
            f &&
              (e.isNull && !d
                ? f.setAttribute("aria-hidden", !0)
                : (f.setAttribute("tabindex", "-1"),
                  a.chart.styledMode || (f.style.outline = "none"),
                  c && !t
                    ? ((q = e.series),
                      (t = q.chart.options.accessibility.point || {}),
                      (q =
                        (q.options.accessibility &&
                          q.options.accessibility.point) ||
                        {}),
                      (e = n(
                        (q.descriptionFormatter && q.descriptionFormatter(e)) ||
                          (t.descriptionFormatter &&
                            t.descriptionFormatter(e)) ||
                          b(e),
                      )),
                      f.setAttribute("role", "img"),
                      f.setAttribute("aria-label", e))
                    : f.setAttribute("aria-hidden", !0)));
          });
      }
      function e(a) {
        var b = a.chart,
          c = b.types || [],
          e = w(a),
          d = function (c) {
            return b[c] && 1 < b[c].length && a[c];
          },
          n = a.index + 1,
          q = f(a, "xAxis"),
          t = f(a, "yAxis"),
          y = { seriesNumber: n, series: a, chart: b };
        c = 1 < c.length ? "Combination" : "";
        y =
          b.langFormat("accessibility.series.summary." + a.type + c, y) ||
          b.langFormat("accessibility.series.summary.default" + c, y);
        d =
          (d("yAxis") ? " " + t + "." : "") + (d("xAxis") ? " " + q + "." : "");
        return H(
          b.options.accessibility.series.descriptionFormat || "",
          {
            seriesDescription: y,
            authorDescription: e ? " " + e : "",
            axisDescription: d,
            series: a,
            chart: b,
            seriesNumber: n,
          },
          void 0,
        );
      }
      var r = a.getPointAnnotationTexts,
        E = h.getAxisDescription,
        I = h.getSeriesFirstPointElement,
        J = h.getSeriesA11yElement,
        B = h.unhideChartElementFromAT,
        H = l.format,
        C = l.numberFormat,
        v = x.reverseChildNodes,
        n = x.stripHTMLTagsFromString,
        q = m.find,
        D = m.isNumber,
        y = m.pick,
        F = m.defined;
      return {
        defaultPointDescriptionFormatter: b,
        defaultSeriesDescriptionFormatter: e,
        describeSeries: function (a) {
          var b = a.chart,
            d = I(a),
            f = J(a),
            q = b.is3d && b.is3d();
          if (f) {
            f.lastChild !== d || q || v(f);
            c(a);
            B(b, f);
            q = a.chart;
            b = q.options.chart;
            d = 1 < q.series.length;
            q = q.options.accessibility.series.describeSingleSeries;
            var y = (a.options.accessibility || {}).exposeAsGroupOnly;
            (b.options3d && b.options3d.enabled && d) || !(d || q || y || u(a))
              ? f.removeAttribute("aria-label")
              : ((b = a.chart.options.accessibility),
                (d = b.landmarkVerbosity),
                (a.options.accessibility || {}).exposeAsGroupOnly
                  ? f.setAttribute("role", "img")
                  : "all" === d
                    ? f.setAttribute("role", "region")
                    : f.setAttribute("role", "group"),
                f.setAttribute("tabindex", "-1"),
                a.chart.styledMode || (f.style.outline = "none"),
                f.setAttribute(
                  "aria-label",
                  n(
                    (b.series.descriptionFormatter &&
                      b.series.descriptionFormatter(a)) ||
                      e(a),
                  ),
                ));
          }
        },
      };
    },
  );
  A(
    a,
    "Accessibility/Components/SeriesComponent/NewDataAnnouncer.js",
    [
      a["Core/Globals.js"],
      a["Core/Utilities.js"],
      a["Accessibility/Utils/Announcer.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/EventProvider.js"],
      a["Accessibility/Components/SeriesComponent/SeriesDescriber.js"],
    ],
    function (a, h, l, x, m, p) {
      function u(a) {
        var b = a.series.data.filter(function (b) {
          return a.x === b.x && a.y === b.y;
        });
        return 1 === b.length ? b[0] : a;
      }
      function z(a, c) {
        var b = (a || []).concat(c || []).reduce(function (a, b) {
          a[b.name + b.index] = b;
          return a;
        }, {});
        return Object.keys(b).map(function (a) {
          return b[a];
        });
      }
      var g = h.addEvent,
        k = h.defined,
        w = x.getChartTitle,
        f = p.defaultPointDescriptionFormatter,
        d = p.defaultSeriesDescriptionFormatter;
      h = (function () {
        function b(a) {
          this.announcer = void 0;
          this.dirty = { allSeries: {} };
          this.eventProvider = void 0;
          this.lastAnnouncementTime = 0;
          this.chart = a;
        }
        b.prototype.init = function () {
          var a = this.chart,
            b = a.options.accessibility.announceNewData.interruptUser
              ? "assertive"
              : "polite";
          this.lastAnnouncementTime = 0;
          this.dirty = { allSeries: {} };
          this.eventProvider = new m();
          this.announcer = new l(a, b);
          this.addEventListeners();
        };
        b.prototype.destroy = function () {
          this.eventProvider.removeAddedEvents();
          this.announcer.destroy();
        };
        b.prototype.addEventListeners = function () {
          var a = this,
            b = this.chart,
            d = this.eventProvider;
          d.addEvent(b, "afterApplyDrilldown", function () {
            a.lastAnnouncementTime = 0;
          });
          d.addEvent(b, "afterAddSeries", function (b) {
            a.onSeriesAdded(b.series);
          });
          d.addEvent(b, "redraw", function () {
            a.announceDirtyData();
          });
        };
        b.prototype.onSeriesAdded = function (a) {
          this.chart.options.accessibility.announceNewData.enabled &&
            ((this.dirty.hasDirty = !0),
            (this.dirty.allSeries[a.name + a.index] = a),
            (this.dirty.newSeries = k(this.dirty.newSeries) ? void 0 : a));
        };
        b.prototype.announceDirtyData = function () {
          var a = this;
          if (
            this.chart.options.accessibility.announceNewData &&
            this.dirty.hasDirty
          ) {
            var b = this.dirty.newPoint;
            b && (b = u(b));
            this.queueAnnouncement(
              Object.keys(this.dirty.allSeries).map(function (b) {
                return a.dirty.allSeries[b];
              }),
              this.dirty.newSeries,
              b,
            );
            this.dirty = { allSeries: {} };
          }
        };
        b.prototype.queueAnnouncement = function (a, b, d) {
          var c = this,
            e = this.chart.options.accessibility.announceNewData;
          if (e.enabled) {
            var f = +new Date();
            e = Math.max(
              0,
              e.minAnnounceInterval - (f - this.lastAnnouncementTime),
            );
            a = z(this.queuedAnnouncement && this.queuedAnnouncement.series, a);
            if ((b = this.buildAnnouncementMessage(a, b, d)))
              this.queuedAnnouncement &&
                clearTimeout(this.queuedAnnouncementTimer),
                (this.queuedAnnouncement = { time: f, message: b, series: a }),
                (this.queuedAnnouncementTimer = setTimeout(function () {
                  c &&
                    c.announcer &&
                    ((c.lastAnnouncementTime = +new Date()),
                    c.announcer.announce(c.queuedAnnouncement.message),
                    delete c.queuedAnnouncement,
                    delete c.queuedAnnouncementTimer);
                }, e));
          }
        };
        b.prototype.buildAnnouncementMessage = function (b, e, r) {
          var c = this.chart,
            g = c.options.accessibility.announceNewData;
          if (
            g.announcementFormatter &&
            ((b = g.announcementFormatter(b, e, r)), !1 !== b)
          )
            return b.length ? b : null;
          b = a.charts && 1 < a.charts.length ? "Multiple" : "Single";
          b = e
            ? "newSeriesAnnounce" + b
            : r
              ? "newPointAnnounce" + b
              : "newDataAnnounce";
          g = w(c);
          return c.langFormat("accessibility.announceNewData." + b, {
            chartTitle: g,
            seriesDesc: e ? d(e) : null,
            pointDesc: r ? f(r) : null,
            point: r,
            series: e,
          });
        };
        return b;
      })();
      (function (a) {
        function b(a) {
          var b = this.chart,
            c = this.newDataAnnouncer;
          c &&
            c.chart === b &&
            b.options.accessibility.announceNewData.enabled &&
            (c.dirty.newPoint = k(c.dirty.newPoint) ? void 0 : a.point);
        }
        function e() {
          var a = this.chart,
            b = this.newDataAnnouncer;
          b &&
            b.chart === a &&
            a.options.accessibility.announceNewData.enabled &&
            ((b.dirty.hasDirty = !0),
            (b.dirty.allSeries[this.name + this.index] = this));
        }
        a.composedClasses = [];
        a.compose = function (c) {
          -1 === a.composedClasses.indexOf(c) &&
            (a.composedClasses.push(c),
            g(c, "addPoint", b),
            g(c, "updatedData", e));
        };
      })(h || (h = {}));
      return h;
    },
  );
  A(
    a,
    "Accessibility/ProxyElement.js",
    [
      a["Core/Globals.js"],
      a["Core/Utilities.js"],
      a["Accessibility/Utils/EventProvider.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
    ],
    function (a, h, l, x, m) {
      var p = a.doc,
        u = h.attr,
        z = h.css,
        g = h.merge,
        k = x.fireEventOnWrappedOrUnwrappedElement,
        w = m.cloneMouseEvent,
        f = m.cloneTouchEvent,
        d = m.getFakeMouseEvent,
        b = m.removeElement;
      return (function () {
        function a(a, b, c, d) {
          this.chart = a;
          this.target = b;
          this.groupType = c;
          c = "ul" === c;
          this.eventProvider = new l();
          var e = c ? p.createElement("li") : null,
            f = (this.buttonElement = p.createElement("button"));
          a.styledMode || this.hideButtonVisually(f);
          e
            ? (c && !a.styledMode && (e.style.listStyle = "none"),
              e.appendChild(f),
              (this.element = e))
            : (this.element = f);
          this.updateTarget(b, d);
        }
        a.prototype.click = function () {
          var a = this.getTargetPosition();
          a.x += a.width / 2;
          a.y += a.height / 2;
          a = d("click", a);
          k(this.target.click, a);
        };
        a.prototype.updateTarget = function (a, b) {
          this.target = a;
          this.updateCSSClassName();
          var c = b || {};
          Object.keys(c).forEach(function (a) {
            null === c[a] && delete c[a];
          });
          u(
            this.buttonElement,
            g({ "aria-label": this.getTargetAttr(a.click, "aria-label") }, c),
          );
          this.eventProvider.removeAddedEvents();
          this.addProxyEventsToButton(this.buttonElement, a.click);
          this.refreshPosition();
        };
        a.prototype.refreshPosition = function () {
          var a = this.getTargetPosition();
          z(this.buttonElement, {
            width: (a.width || 1) + "px",
            height: (a.height || 1) + "px",
            left: (Math.round(a.x) || 0) + "px",
            top: (Math.round(a.y) || 0) + "px",
          });
        };
        a.prototype.remove = function () {
          this.eventProvider.removeAddedEvents();
          b(this.element);
        };
        a.prototype.updateCSSClassName = function () {
          var a = this.chart.legend;
          a = a.group && a.group.div;
          a = -1 < ((a && a.className) || "").indexOf("highcharts-no-tooltip");
          var b =
            -1 <
            (this.getTargetAttr(this.target.click, "class") || "").indexOf(
              "highcharts-no-tooltip",
            );
          this.buttonElement.className =
            a || b
              ? "highcharts-a11y-proxy-button highcharts-no-tooltip"
              : "highcharts-a11y-proxy-button";
        };
        a.prototype.addProxyEventsToButton = function (a, b) {
          var c = this;
          "click touchstart touchend touchcancel touchmove mouseover mouseenter mouseleave mouseout"
            .split(" ")
            .forEach(function (e) {
              var d = 0 === e.indexOf("touch");
              c.eventProvider.addEvent(
                a,
                e,
                function (a) {
                  var c = d ? f(a) : w(a);
                  b && k(b, c);
                  a.stopPropagation();
                  d || a.preventDefault();
                },
                { passive: !1 },
              );
            });
        };
        a.prototype.hideButtonVisually = function (a) {
          z(a, {
            borderWidth: 0,
            backgroundColor: "transparent",
            cursor: "pointer",
            outline: "none",
            opacity: 0.001,
            filter: "alpha(opacity=1)",
            zIndex: 999,
            overflow: "hidden",
            padding: 0,
            margin: 0,
            display: "block",
            position: "absolute",
            "-ms-filter": "progid:DXImageTransform.Microsoft.Alpha(Opacity=1)",
          });
        };
        a.prototype.getTargetPosition = function () {
          var a = this.target.click;
          a = a.element ? a.element : a;
          a = this.target.visual || a;
          if (this.chart.renderTo && a && a.getBoundingClientRect) {
            a = a.getBoundingClientRect();
            var b = this.chart.pointer.getChartPosition();
            return {
              x: (a.left - b.left) / b.scaleX,
              y: (a.top - b.top) / b.scaleY,
              width: a.right / b.scaleX - a.left / b.scaleX,
              height: a.bottom / b.scaleY - a.top / b.scaleY,
            };
          }
          return { x: 0, y: 0, width: 1, height: 1 };
        };
        a.prototype.getTargetAttr = function (a, b) {
          return a.element ? a.element.getAttribute(b) : a.getAttribute(b);
        };
        return a;
      })();
    },
  );
  A(
    a,
    "Accessibility/ProxyProvider.js",
    [
      a["Core/Globals.js"],
      a["Core/Utilities.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/DOMElementProvider.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Accessibility/ProxyElement.js"],
    ],
    function (a, h, l, x, m, p) {
      var u = a.doc,
        z = h.attr,
        g = h.css,
        k = l.unhideChartElementFromAT,
        w = m.removeElement,
        f = m.removeChildNodes;
      return (function () {
        function a(a) {
          this.chart = a;
          this.domElementProvider = new x();
          this.groups = {};
          this.groupOrder = [];
          this.beforeChartProxyPosContainer =
            this.createProxyPosContainer("before");
          this.afterChartProxyPosContainer =
            this.createProxyPosContainer("after");
          this.update();
        }
        a.prototype.addProxyElement = function (a, c, e) {
          var b = this.groups[a];
          if (!b)
            throw Error(
              "ProxyProvider.addProxyElement: Invalid group key " + a,
            );
          a = new p(this.chart, c, b.type, e);
          b.proxyContainerElement.appendChild(a.element);
          b.proxyElements.push(a);
          return a;
        };
        a.prototype.addGroup = function (a, c, e) {
          var b = this.groups[a];
          if (b) return b.groupElement;
          b = this.domElementProvider.createElement(c);
          if (e && e.role && "div" !== c) {
            var d = this.domElementProvider.createElement("div");
            d.appendChild(b);
          } else d = b;
          d.className =
            "highcharts-a11y-proxy-group highcharts-a11y-proxy-group-" +
            a.replace(/\W/g, "-");
          this.groups[a] = {
            proxyContainerElement: b,
            groupElement: d,
            type: c,
            proxyElements: [],
          };
          z(d, e || {});
          "ul" === c && b.setAttribute("role", "list");
          this.afterChartProxyPosContainer.appendChild(d);
          this.updateGroupOrder(this.groupOrder);
          return d;
        };
        a.prototype.updateGroupAttrs = function (a, c) {
          var b = this.groups[a];
          if (!b)
            throw Error(
              "ProxyProvider.updateGroupAttrs: Invalid group key " + a,
            );
          z(b.groupElement, c);
        };
        a.prototype.updateGroupOrder = function (a) {
          var b = this;
          this.groupOrder = a.slice();
          if (!this.isDOMOrderGroupOrder()) {
            var d = a.indexOf("series"),
              g = -1 < d ? a.slice(0, d) : a,
              k = -1 < d ? a.slice(d + 1) : [];
            a = u.activeElement;
            ["before", "after"].forEach(function (a) {
              var c =
                b[
                  "before" === a
                    ? "beforeChartProxyPosContainer"
                    : "afterChartProxyPosContainer"
                ];
              a = "before" === a ? g : k;
              f(c);
              a.forEach(function (a) {
                (a = b.groups[a]) && c.appendChild(a.groupElement);
              });
            });
            (this.beforeChartProxyPosContainer.contains(a) ||
              this.afterChartProxyPosContainer.contains(a)) &&
              a &&
              a.focus &&
              a.focus();
          }
        };
        a.prototype.clearGroup = function (a) {
          var b = this.groups[a];
          if (!b)
            throw Error("ProxyProvider.clearGroup: Invalid group key " + a);
          f(b.proxyContainerElement);
        };
        a.prototype.removeGroup = function (a) {
          var b = this.groups[a];
          b && (w(b.groupElement), delete this.groups[a]);
        };
        a.prototype.update = function () {
          this.updatePosContainerPositions();
          this.updateGroupOrder(this.groupOrder);
          this.updateProxyElementPositions();
        };
        a.prototype.updateProxyElementPositions = function () {
          Object.keys(this.groups).forEach(
            this.updateGroupProxyElementPositions.bind(this),
          );
        };
        a.prototype.updateGroupProxyElementPositions = function (a) {
          (a = this.groups[a]) &&
            a.proxyElements.forEach(function (a) {
              return a.refreshPosition();
            });
        };
        a.prototype.destroy = function () {
          this.domElementProvider.destroyCreatedElements();
        };
        a.prototype.createProxyPosContainer = function (a) {
          var b = this.domElementProvider.createElement("div");
          b.setAttribute("aria-hidden", "false");
          b.className = "highcharts-a11y-proxy-container" + (a ? "-" + a : "");
          g(b, { top: "0", left: "0" });
          this.chart.styledMode ||
            ((b.style.whiteSpace = "nowrap"), (b.style.position = "absolute"));
          return b;
        };
        a.prototype.getCurrentGroupOrderInDOM = function () {
          var a = this,
            c = function (b) {
              var c = [];
              b = b.children;
              for (var d = 0; d < b.length; ++d) {
                a: {
                  var e = b[d];
                  for (var f = Object.keys(a.groups), g = f.length; g--; ) {
                    var k = f[g],
                      v = a.groups[k];
                    if (v && e === v.groupElement) {
                      e = k;
                      break a;
                    }
                  }
                  e = void 0;
                }
                e && c.push(e);
              }
              return c;
            },
            d = c(this.beforeChartProxyPosContainer);
          c = c(this.afterChartProxyPosContainer);
          d.push("series");
          return d.concat(c);
        };
        a.prototype.isDOMOrderGroupOrder = function () {
          var a = this,
            c = this.getCurrentGroupOrderInDOM(),
            d = this.groupOrder.filter(function (b) {
              return "series" === b || !!a.groups[b];
            }),
            f = c.length;
          if (f !== d.length) return !1;
          for (; f--; ) if (c[f] !== d[f]) return !1;
          return !0;
        };
        a.prototype.updatePosContainerPositions = function () {
          var a = this.chart;
          if (!a.renderer.forExport) {
            var c = a.renderer.box;
            a.container.insertBefore(
              this.afterChartProxyPosContainer,
              c.nextSibling,
            );
            a.container.insertBefore(this.beforeChartProxyPosContainer, c);
            k(this.chart, this.afterChartProxyPosContainer);
            k(this.chart, this.beforeChartProxyPosContainer);
          }
        };
        return a;
      })();
    },
  );
  A(a, "Stock/RangeSelector/RangeSelectorDefaults.js", [], function () {
    return {
      lang: {
        rangeSelectorZoom: "Zoom",
        rangeSelectorFrom: "",
        rangeSelectorTo: "\u2192",
      },
      rangeSelector: {
        allButtonsEnabled: !1,
        buttons: void 0,
        buttonSpacing: 5,
        dropdown: "responsive",
        enabled: void 0,
        verticalAlign: "top",
        buttonTheme: { width: 28, height: 18, padding: 2, zIndex: 7 },
        floating: !1,
        x: 0,
        y: 0,
        height: void 0,
        inputBoxBorderColor: "none",
        inputBoxHeight: 17,
        inputBoxWidth: void 0,
        inputDateFormat: "%b %e, %Y",
        inputDateParser: void 0,
        inputEditDateFormat: "%Y-%m-%d",
        inputEnabled: !0,
        inputPosition: { align: "right", x: 0, y: 0 },
        inputSpacing: 5,
        selected: void 0,
        buttonPosition: { align: "left", x: 0, y: 0 },
        inputStyle: { color: "#335cad", cursor: "pointer" },
        labelStyle: { color: "#666666" },
      },
    };
  });
  A(
    a,
    "Stock/RangeSelector/RangeSelectorComposition.js",
    [
      a["Core/Defaults.js"],
      a["Stock/RangeSelector/RangeSelectorDefaults.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l) {
      function x() {
        var a = this.range,
          b = a.type,
          c = this.max,
          d = this.chart.time,
          e = function (a, c) {
            var e = "year" === b ? "FullYear" : "Month",
              n = new d.Date(a),
              f = d.get(e, n);
            d.set(e, n, f + c);
            f === d.get(e, n) && d.set("Date", n, 0);
            return n.getTime() - a;
          };
        if (E(a)) {
          var f = c - a;
          var t = a;
        } else
          a &&
            ((f = c + e(c, -(a.count || 1))),
            this.chart && (this.chart.fixedRange = c - f));
        var g = A(this.dataMin, Number.MIN_VALUE);
        E(f) || (f = g);
        f <= g &&
          ((f = g),
          "undefined" === typeof t && (t = e(f, a.count)),
          (this.newMax = Math.min(f + t, A(this.dataMax, Number.MAX_VALUE))));
        E(c) ? !E(a) && a && a._offsetMin && (f += a._offsetMin) : (f = void 0);
        return f;
      }
      function m() {
        this.options.rangeSelector &&
          this.options.rangeSelector.enabled &&
          (this.rangeSelector = new C(this));
      }
      function p() {
        var a = this.axes,
          b = this.rangeSelector;
        b &&
          (E(b.deferredYTDClick) &&
            (b.clickButton(b.deferredYTDClick), delete b.deferredYTDClick),
          a.forEach(function (a) {
            a.updateNames();
            a.setScale();
          }),
          this.getAxisMargins(),
          b.render(),
          (a = b.options.verticalAlign),
          b.options.floating ||
            ("bottom" === a
              ? (this.extraBottomMargin = !0)
              : "middle" !== a && (this.extraTopMargin = !0)));
      }
      function u(a) {
        var c,
          d,
          e,
          f,
          F = a.rangeSelector,
          t = function () {
            F &&
              ((c = a.xAxis[0].getExtremes()),
              (d = a.legend),
              (f = F && F.options.verticalAlign),
              E(c.min) && F.render(c.min, c.max),
              d.display &&
                "top" === f &&
                f === d.options.verticalAlign &&
                ((e = I(a.spacingBox)),
                (e.y =
                  "vertical" === d.options.layout
                    ? a.plotTop
                    : e.y + F.getHeight()),
                (d.group.placed = !1),
                d.align(e)));
          };
        F &&
          (r(B, function (b) {
            return b[0] === a;
          }) ||
            B.push([
              a,
              [
                b(a.xAxis[0], "afterSetExtremes", function (a) {
                  F && F.render(a.min, a.max);
                }),
                b(a, "redraw", t),
              ],
            ]),
          t());
      }
      function z() {
        for (var a = 0, b = B.length; a < b; ++a) {
          var c = B[a];
          if (c[0] === this) {
            c[1].forEach(function (a) {
              return a();
            });
            B.splice(a, 1);
            break;
          }
        }
      }
      function g() {
        var a = this.rangeSelector;
        a &&
          ((a = a.getHeight()),
          this.extraTopMargin && (this.plotTop += a),
          this.extraBottomMargin && (this.marginBottom += a));
      }
      function k() {
        var a = this.rangeSelector;
        a &&
          !a.options.floating &&
          (a.render(),
          (a = a.options.verticalAlign),
          "bottom" === a
            ? (this.extraBottomMargin = !0)
            : "middle" !== a && (this.extraTopMargin = !0));
      }
      function w(a) {
        var b = a.options.rangeSelector;
        a = this.extraBottomMargin;
        var d = this.extraTopMargin,
          e = this.rangeSelector;
        b &&
          b.enabled &&
          !c(e) &&
          this.options.rangeSelector &&
          ((this.options.rangeSelector.enabled = !0),
          (this.rangeSelector = e = new C(this)));
        this.extraTopMargin = this.extraBottomMargin = !1;
        e &&
          (u(this),
          (b =
            (b && b.verticalAlign) || (e.options && e.options.verticalAlign)),
          e.options.floating ||
            ("bottom" === b
              ? (this.extraBottomMargin = !0)
              : "middle" !== b && (this.extraTopMargin = !0)),
          this.extraBottomMargin !== a || this.extraTopMargin !== d) &&
          (this.isDirtyBox = !0);
      }
      var f = a.defaultOptions,
        d = a.setOptions,
        b = l.addEvent,
        c = l.defined,
        e = l.extend,
        r = l.find,
        E = l.isNumber,
        I = l.merge,
        A = l.pick,
        B = [],
        H = [],
        C;
      return {
        compose: function (a, c, q) {
          C = q;
          -1 === H.indexOf(a) && (H.push(a), (a.prototype.minFromRange = x));
          -1 === H.indexOf(c) &&
            (H.push(c),
            b(c, "afterGetContainer", m),
            b(c, "beforeRender", p),
            b(c, "destroy", z),
            b(c, "getMargins", g),
            b(c, "render", k),
            b(c, "update", w),
            c.prototype.callbacks.push(u));
          -1 === H.indexOf(d) &&
            (e(f, { rangeSelector: h.rangeSelector }), e(f.lang, h.lang));
        },
      };
    },
  );
  A(
    a,
    "Stock/RangeSelector/RangeSelector.js",
    [
      a["Core/Axis/Axis.js"],
      a["Core/Defaults.js"],
      a["Core/Globals.js"],
      a["Stock/RangeSelector/RangeSelectorComposition.js"],
      a["Core/Renderer/SVG/SVGElement.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l, x, m, p) {
      function u(a) {
        if (-1 !== a.indexOf("%L")) return "text";
        var b = "aAdewbBmoyY".split("").some(function (b) {
            return -1 !== a.indexOf("%" + b);
          }),
          c = "HkIlMS".split("").some(function (b) {
            return -1 !== a.indexOf("%" + b);
          });
        return b && c ? "datetime-local" : b ? "date" : c ? "time" : "text";
      }
      var z = h.defaultOptions,
        g = p.addEvent,
        k = p.createElement,
        w = p.css,
        f = p.defined,
        d = p.destroyObjectProperties,
        b = p.discardElement,
        c = p.extend,
        e = p.fireEvent,
        r = p.isNumber,
        E = p.merge,
        I = p.objectEach,
        A = p.pad,
        B = p.pick,
        H = p.pInt,
        C = p.splat;
      h = (function () {
        function v(a) {
          this.buttons = void 0;
          this.buttonOptions = v.prototype.defaultButtons;
          this.initialButtonGroupWidth = 0;
          this.options = void 0;
          this.chart = a;
          this.init(a);
        }
        v.compose = function (a, b) {
          x.compose(a, b, v);
        };
        v.prototype.clickButton = function (b, c) {
          var d = this.chart,
            n = this.buttonOptions[b],
            q = d.xAxis[0],
            t = (d.scroller && d.scroller.getUnionExtremes()) || q || {},
            k = n.type,
            v = n.dataGrouping,
            h = t.dataMin,
            l = t.dataMax,
            G = q && Math.round(Math.min(q.max, B(l, q.max)));
          t = n._range;
          var p,
            w = !0;
          if (null !== h && null !== l) {
            d.fixedRange = t;
            this.setSelected(b);
            v &&
              ((this.forcedDataGrouping = !0),
              a.prototype.setDataGrouping.call(
                q || { chart: this.chart },
                v,
                !1,
              ),
              (this.frozenStates = n.preserveDataGrouping));
            if ("month" === k || "year" === k)
              if (q) {
                k = { range: n, max: G, chart: d, dataMin: h, dataMax: l };
                var m = q.minFromRange.call(k);
                r(k.newMax) && (G = k.newMax);
                w = !1;
              } else t = n;
            else if (t)
              (m = Math.max(G - t, h)), (G = Math.min(m + t, l)), (w = !1);
            else if ("ytd" === k)
              if (q) {
                if ("undefined" === typeof l || "undefined" === typeof h)
                  (h = Number.MAX_VALUE),
                    (l = Number.MIN_VALUE),
                    d.series.forEach(function (a) {
                      if ((a = a.xData))
                        (h = Math.min(a[0], h)),
                          (l = Math.max(a[a.length - 1], l));
                    }),
                    (c = !1);
                k = this.getYTDExtremes(l, h, d.time.useUTC);
                m = p = k.min;
                G = k.max;
              } else {
                this.deferredYTDClick = b;
                return;
              }
            else
              "all" === k &&
                q &&
                (d.navigator &&
                  d.navigator.baseSeries[0] &&
                  (d.navigator.baseSeries[0].xAxis.options.range = void 0),
                (m = h),
                (G = l));
            w && n._offsetMin && f(m) && (m += n._offsetMin);
            n._offsetMax && f(G) && (G += n._offsetMax);
            this.dropdown && (this.dropdown.selectedIndex = b + 1);
            if (q)
              q.setExtremes(m, G, B(c, !0), void 0, {
                trigger: "rangeSelectorButton",
                rangeSelectorButton: n,
              });
            else {
              var u = C(d.options.xAxis)[0];
              var x = u.range;
              u.range = t;
              var E = u.min;
              u.min = p;
              g(d, "load", function () {
                u.range = x;
                u.min = E;
              });
            }
            e(this, "afterBtnClick");
          }
        };
        v.prototype.setSelected = function (a) {
          this.selected = this.options.selected = a;
        };
        v.prototype.init = function (a) {
          var b = this,
            c = a.options.rangeSelector,
            d = c.buttons || b.defaultButtons.slice(),
            f = c.selected,
            n = function () {
              var a = b.minInput,
                c = b.maxInput;
              a && a.blur && e(a, "blur");
              c && c.blur && e(c, "blur");
            };
          b.chart = a;
          b.options = c;
          b.buttons = [];
          b.buttonOptions = d;
          this.eventsToUnbind = [];
          this.eventsToUnbind.push(g(a.container, "mousedown", n));
          this.eventsToUnbind.push(g(a, "resize", n));
          d.forEach(b.computeButtonRange);
          "undefined" !== typeof f && d[f] && this.clickButton(f, !1);
          this.eventsToUnbind.push(
            g(a, "load", function () {
              a.xAxis &&
                a.xAxis[0] &&
                g(a.xAxis[0], "setExtremes", function (c) {
                  this.max - this.min !== a.fixedRange &&
                    "rangeSelectorButton" !== c.trigger &&
                    "updatedData" !== c.trigger &&
                    b.forcedDataGrouping &&
                    !b.frozenStates &&
                    this.setDataGrouping(!1, !1);
                });
            }),
          );
        };
        v.prototype.updateButtonStates = function () {
          var a = this,
            b = this.chart,
            c = this.dropdown,
            d = b.xAxis[0],
            e = Math.round(d.max - d.min),
            f = !d.hasVisibleSeries,
            g = (b.scroller && b.scroller.getUnionExtremes()) || d,
            k = g.dataMin,
            h = g.dataMax;
          b = a.getYTDExtremes(h, k, b.time.useUTC);
          var v = b.min,
            G = b.max,
            l = a.selected,
            p = a.options.allButtonsEnabled,
            m = a.buttons,
            w = r(l);
          a.buttonOptions.forEach(function (b, n) {
            var t = b._range,
              q = b.type,
              y = b.count || 1,
              g = m[n],
              F = b._offsetMax - b._offsetMin,
              D = n === l,
              r = t > h - k,
              L = t < d.minRange;
            b = 0;
            var u = !1,
              C = !1;
            t = t === e;
            ("month" === q || "year" === q) &&
            e + 36e5 >= 864e5 * { month: 28, year: 365 }[q] * y - F &&
            e - 36e5 <= 864e5 * { month: 31, year: 366 }[q] * y + F
              ? (t = !0)
              : "ytd" === q
                ? ((t = G - v + F === e), (u = !D))
                : "all" === q &&
                  ((t = d.max - d.min >= h - k), (C = !D && w && t));
            q = !p && (r || L || C || f);
            y = (D && t) || (t && !w && !u) || (D && a.frozenStates);
            q ? (b = 3) : y && ((w = !0), (b = 2));
            g.state !== b &&
              (g.setState(b),
              c &&
                ((c.options[n + 1].disabled = q),
                2 === b && (c.selectedIndex = n + 1)),
              0 === b && l === n && a.setSelected());
          });
        };
        v.prototype.computeButtonRange = function (a) {
          var b = a.type,
            c = a.count || 1,
            d = {
              millisecond: 1,
              second: 1e3,
              minute: 6e4,
              hour: 36e5,
              day: 864e5,
              week: 6048e5,
            };
          if (d[b]) a._range = d[b] * c;
          else if ("month" === b || "year" === b)
            a._range = 864e5 * { month: 30, year: 365 }[b] * c;
          a._offsetMin = B(a.offsetMin, 0);
          a._offsetMax = B(a.offsetMax, 0);
          a._range += a._offsetMax - a._offsetMin;
        };
        v.prototype.getInputValue = function (a) {
          a = "min" === a ? this.minInput : this.maxInput;
          var b = this.chart.options.rangeSelector,
            c = this.chart.time;
          return a
            ? (
                ("text" === a.type && b.inputDateParser) ||
                this.defaultInputDateParser
              )(a.value, c.useUTC, c)
            : 0;
        };
        v.prototype.setInputValue = function (a, b) {
          var c = this.options,
            d = this.chart.time,
            e = "min" === a ? this.minInput : this.maxInput;
          a = "min" === a ? this.minDateBox : this.maxDateBox;
          if (e) {
            var n = e.getAttribute("data-hc-time");
            n = f(n) ? Number(n) : void 0;
            f(b) &&
              (f(n) && e.setAttribute("data-hc-time-previous", n),
              e.setAttribute("data-hc-time", b),
              (n = b));
            e.value = d.dateFormat(
              this.inputTypeFormats[e.type] || c.inputEditDateFormat,
              n,
            );
            a && a.attr({ text: d.dateFormat(c.inputDateFormat, n) });
          }
        };
        v.prototype.setInputExtremes = function (a, b, c) {
          if ((a = "min" === a ? this.minInput : this.maxInput)) {
            var d = this.inputTypeFormats[a.type],
              e = this.chart.time;
            d &&
              ((b = e.dateFormat(d, b)),
              a.min !== b && (a.min = b),
              (c = e.dateFormat(d, c)),
              a.max !== c && (a.max = c));
          }
        };
        v.prototype.showInput = function (a) {
          var b = "min" === a ? this.minDateBox : this.maxDateBox;
          if (
            (a = "min" === a ? this.minInput : this.maxInput) &&
            b &&
            this.inputGroup
          ) {
            var c = "text" === a.type,
              d = this.inputGroup,
              e = d.translateX;
            d = d.translateY;
            var f = this.options.inputBoxWidth;
            w(a, {
              width: c ? b.width + (f ? -2 : 20) + "px" : "auto",
              height: c ? b.height - 2 + "px" : "auto",
              border: "2px solid silver",
            });
            c && f
              ? w(a, { left: e + b.x + "px", top: d + "px" })
              : w(a, {
                  left:
                    Math.min(
                      Math.round(b.x + e - (a.offsetWidth - b.width) / 2),
                      this.chart.chartWidth - a.offsetWidth,
                    ) + "px",
                  top: d - (a.offsetHeight - b.height) / 2 + "px",
                });
          }
        };
        v.prototype.hideInput = function (a) {
          (a = "min" === a ? this.minInput : this.maxInput) &&
            w(a, { top: "-9999em", border: 0, width: "1px", height: "1px" });
        };
        v.prototype.defaultInputDateParser = function (a, b, c) {
          var d = a.split("/").join("-").split(" ").join("T");
          -1 === d.indexOf("T") && (d += "T00:00");
          if (b) d += "Z";
          else {
            var e;
            if ((e = l.isSafari))
              (e = d),
                (e = !(
                  6 < e.length &&
                  (e.lastIndexOf("-") === e.length - 6 ||
                    e.lastIndexOf("+") === e.length - 6)
                ));
            e &&
              ((e = new Date(d).getTimezoneOffset() / 60),
              (d +=
                0 >= e ? "+".concat(A(-e), ":00") : "-".concat(A(e), ":00")));
          }
          d = Date.parse(d);
          r(d) ||
            ((a = a.split("-")), (d = Date.UTC(H(a[0]), H(a[1]) - 1, H(a[2]))));
          c && b && r(d) && (d += c.getTimezoneOffset(d));
          return d;
        };
        v.prototype.drawInput = function (a) {
          function b() {
            var b = n.maxInput,
              c = n.minInput,
              e = d.xAxis[0],
              f = d.scroller && d.scroller.xAxis ? d.scroller.xAxis : e,
              t = f.dataMin;
            f = f.dataMax;
            var q = n.getInputValue(a);
            q !== Number(m.getAttribute("data-hc-time-previous")) &&
              r(q) &&
              (m.setAttribute("data-hc-time-previous", q),
              p && b && r(t)
                ? q > Number(b.getAttribute("data-hc-time"))
                  ? (q = void 0)
                  : q < t && (q = t)
                : c &&
                  r(f) &&
                  (q < Number(c.getAttribute("data-hc-time"))
                    ? (q = void 0)
                    : q > f && (q = f)),
              "undefined" !== typeof q &&
                e.setExtremes(p ? q : e.min, p ? e.max : q, void 0, void 0, {
                  trigger: "rangeSelectorInput",
                }));
          }
          var d = this.chart,
            e = this.div,
            f = this.inputGroup,
            n = this,
            g = d.renderer.style || {},
            h = d.renderer,
            v = d.options.rangeSelector,
            p = "min" === a,
            G = z.lang[p ? "rangeSelectorFrom" : "rangeSelectorTo"] || "";
          G = h
            .label(G, 0)
            .addClass("highcharts-range-label")
            .attr({ padding: G ? 2 : 0, height: G ? v.inputBoxHeight : 0 })
            .add(f);
          h = h
            .label("", 0)
            .addClass("highcharts-range-input")
            .attr({
              padding: 2,
              width: v.inputBoxWidth,
              height: v.inputBoxHeight,
              "text-align": "center",
            })
            .on("click", function () {
              n.showInput(a);
              n[a + "Input"].focus();
            });
          d.styledMode ||
            h.attr({ stroke: v.inputBoxBorderColor, "stroke-width": 1 });
          h.add(f);
          var m = k(
            "input",
            { name: a, className: "highcharts-range-selector" },
            void 0,
            e,
          );
          m.setAttribute("type", u(v.inputDateFormat || "%b %e, %Y"));
          d.styledMode ||
            (G.css(E(g, v.labelStyle)),
            h.css(E({ color: "#333333" }, g, v.inputStyle)),
            w(
              m,
              c(
                {
                  position: "absolute",
                  border: 0,
                  boxShadow: "0 0 15px rgba(0,0,0,0.3)",
                  width: "1px",
                  height: "1px",
                  padding: 0,
                  textAlign: "center",
                  fontSize: g.fontSize,
                  fontFamily: g.fontFamily,
                  top: "-9999em",
                },
                v.inputStyle,
              ),
            ));
          m.onfocus = function () {
            n.showInput(a);
          };
          m.onblur = function () {
            m === l.doc.activeElement && b();
            n.hideInput(a);
            n.setInputValue(a);
            m.blur();
          };
          var C = !1;
          m.onchange = function () {
            C || (b(), n.hideInput(a), m.blur());
          };
          m.onkeypress = function (a) {
            13 === a.keyCode && b();
          };
          m.onkeydown = function (a) {
            C = !0;
            (38 !== a.keyCode && 40 !== a.keyCode) || b();
          };
          m.onkeyup = function () {
            C = !1;
          };
          return { dateBox: h, input: m, label: G };
        };
        v.prototype.getPosition = function () {
          var a = this.chart,
            b = a.options.rangeSelector;
          a = "top" === b.verticalAlign ? a.plotTop - a.axisOffset[0] : 0;
          return {
            buttonTop: a + b.buttonPosition.y,
            inputTop: a + b.inputPosition.y - 10,
          };
        };
        v.prototype.getYTDExtremes = function (a, b, c) {
          var d = this.chart.time,
            e = new d.Date(a),
            f = d.get("FullYear", e);
          c = c ? d.Date.UTC(f, 0, 1) : +new d.Date(f, 0, 1);
          b = Math.max(b, c);
          e = e.getTime();
          return { max: Math.min(a || e, e), min: b };
        };
        v.prototype.render = function (a, b) {
          var c = this.chart,
            d = c.renderer,
            e = c.container,
            n = c.options,
            q = n.rangeSelector,
            g = B(n.chart.style && n.chart.style.zIndex, 0) + 1;
          n = q.inputEnabled;
          if (!1 !== q.enabled) {
            this.rendered ||
              ((this.group = d
                .g("range-selector-group")
                .attr({ zIndex: 7 })
                .add()),
              (this.div = k("div", void 0, {
                position: "relative",
                height: 0,
                zIndex: g,
              })),
              this.buttonOptions.length && this.renderButtons(),
              e.parentNode && e.parentNode.insertBefore(this.div, e),
              n &&
                ((this.inputGroup = d.g("input-group").add(this.group)),
                (d = this.drawInput("min")),
                (this.minDateBox = d.dateBox),
                (this.minLabel = d.label),
                (this.minInput = d.input),
                (d = this.drawInput("max")),
                (this.maxDateBox = d.dateBox),
                (this.maxLabel = d.label),
                (this.maxInput = d.input)));
            if (
              n &&
              (this.setInputValue("min", a),
              this.setInputValue("max", b),
              (a =
                (c.scroller && c.scroller.getUnionExtremes()) ||
                c.xAxis[0] ||
                {}),
              f(a.dataMin) &&
                f(a.dataMax) &&
                ((c = c.xAxis[0].minRange || 0),
                this.setInputExtremes(
                  "min",
                  a.dataMin,
                  Math.min(a.dataMax, this.getInputValue("max")) - c,
                ),
                this.setInputExtremes(
                  "max",
                  Math.max(a.dataMin, this.getInputValue("min")) + c,
                  a.dataMax,
                )),
              this.inputGroup)
            ) {
              var h = 0;
              [
                this.minLabel,
                this.minDateBox,
                this.maxLabel,
                this.maxDateBox,
              ].forEach(function (a) {
                if (a) {
                  var b = a.getBBox().width;
                  b && (a.attr({ x: h }), (h += b + q.inputSpacing));
                }
              });
            }
            this.alignElements();
            this.rendered = !0;
          }
        };
        v.prototype.renderButtons = function () {
          var a = this,
            b = this.buttons,
            c = this.options,
            d = z.lang,
            f = this.chart.renderer,
            t = E(c.buttonTheme),
            h = t && t.states,
            v = t.width || 28;
          delete t.width;
          delete t.states;
          this.buttonGroup = f.g("range-selector-buttons").add(this.group);
          var r = (this.dropdown = k(
            "select",
            void 0,
            {
              position: "absolute",
              width: "1px",
              height: "1px",
              padding: 0,
              border: 0,
              top: "-9999em",
              cursor: "pointer",
              opacity: 0.0001,
            },
            this.div,
          ));
          g(r, "touchstart", function () {
            r.style.fontSize = "16px";
          });
          [
            [l.isMS ? "mouseover" : "mouseenter"],
            [l.isMS ? "mouseout" : "mouseleave"],
            ["change", "click"],
          ].forEach(function (c) {
            var d = c[0],
              f = c[1];
            g(r, d, function () {
              var c = b[a.currentButtonIndex()];
              c && e(c.element, f || d);
            });
          });
          this.zoomText = f
            .label((d && d.rangeSelectorZoom) || "", 0)
            .attr({
              padding: c.buttonTheme.padding,
              height: c.buttonTheme.height,
              paddingLeft: 0,
              paddingRight: 0,
            })
            .add(this.buttonGroup);
          this.chart.styledMode ||
            (this.zoomText.css(c.labelStyle),
            (t["stroke-width"] = B(t["stroke-width"], 0)));
          k(
            "option",
            { textContent: this.zoomText.textStr, disabled: !0 },
            void 0,
            r,
          );
          this.buttonOptions.forEach(function (c, d) {
            k("option", { textContent: c.title || c.text }, void 0, r);
            b[d] = f
              .button(
                c.text,
                0,
                0,
                function (b) {
                  var e = c.events && c.events.click,
                    f;
                  e && (f = e.call(c, b));
                  !1 !== f && a.clickButton(d);
                  a.isActive = !0;
                },
                t,
                h && h.hover,
                h && h.select,
                h && h.disabled,
              )
              .attr({ "text-align": "center", width: v })
              .add(a.buttonGroup);
            c.title && b[d].attr("title", c.title);
          });
        };
        v.prototype.alignElements = function () {
          var a = this,
            b = this.buttonGroup,
            c = this.buttons,
            d = this.chart,
            e = this.group,
            f = this.inputGroup,
            g = this.options,
            h = this.zoomText,
            k = d.options,
            v =
              k.exporting &&
              !1 !== k.exporting.enabled &&
              k.navigation &&
              k.navigation.buttonOptions;
          k = g.buttonPosition;
          var r = g.inputPosition,
            l = g.verticalAlign,
            m = function (b, c) {
              return v &&
                a.titleCollision(d) &&
                "top" === l &&
                "right" === c.align &&
                c.y - b.getBBox().height - 12 <
                  (v.y || 0) + (v.height || 0) + d.spacing[0]
                ? -40
                : 0;
            },
            p = d.plotLeft;
          if (e && k && r) {
            var w = k.x - d.spacing[3];
            if (b) {
              this.positionButtons();
              if (!this.initialButtonGroupWidth) {
                var C = 0;
                h && (C += h.getBBox().width + 5);
                c.forEach(function (a, b) {
                  C += a.width;
                  b !== c.length - 1 && (C += g.buttonSpacing);
                });
                this.initialButtonGroupWidth = C;
              }
              p -= d.spacing[3];
              this.updateButtonStates();
              h = m(b, k);
              this.alignButtonGroup(h);
              e.placed = b.placed = d.hasLoaded;
            }
            b = 0;
            f &&
              ((b = m(f, r)),
              "left" === r.align
                ? (w = p)
                : "right" === r.align && (w = -Math.max(d.axisOffset[1], -b)),
              f.align(
                {
                  y: r.y,
                  width: f.getBBox().width,
                  align: r.align,
                  x: r.x + w - 2,
                },
                !0,
                d.spacingBox,
              ),
              (f.placed = d.hasLoaded));
            this.handleCollision(b);
            e.align({ verticalAlign: l }, !0, d.spacingBox);
            f = e.alignAttr.translateY;
            b = e.getBBox().height + 20;
            m = 0;
            "bottom" === l &&
              ((m =
                (m = d.legend && d.legend.options) &&
                "bottom" === m.verticalAlign &&
                m.enabled &&
                !m.floating
                  ? d.legend.legendHeight + B(m.margin, 10)
                  : 0),
              (b = b + m - 20),
              (m =
                f -
                b -
                (g.floating ? 0 : g.y) -
                (d.titleOffset ? d.titleOffset[2] : 0) -
                10));
            if ("top" === l)
              g.floating && (m = 0),
                d.titleOffset && d.titleOffset[0] && (m = d.titleOffset[0]),
                (m += d.margin[0] - d.spacing[0] || 0);
            else if ("middle" === l)
              if (r.y === k.y) m = f;
              else if (r.y || k.y)
                m = 0 > r.y || 0 > k.y ? m - Math.min(r.y, k.y) : f - b;
            e.translate(g.x, g.y + Math.floor(m));
            k = this.minInput;
            r = this.maxInput;
            f = this.dropdown;
            g.inputEnabled &&
              k &&
              r &&
              ((k.style.marginTop = e.translateY + "px"),
              (r.style.marginTop = e.translateY + "px"));
            f && (f.style.marginTop = e.translateY + "px");
          }
        };
        v.prototype.alignButtonGroup = function (a, b) {
          var c = this.chart,
            d = this.buttonGroup,
            e = this.options.buttonPosition,
            f = c.plotLeft - c.spacing[3],
            n = e.x - c.spacing[3];
          "right" === e.align
            ? (n += a - f)
            : "center" === e.align && (n -= f / 2);
          d &&
            d.align(
              {
                y: e.y,
                width: B(b, this.initialButtonGroupWidth),
                align: e.align,
                x: n,
              },
              !0,
              c.spacingBox,
            );
        };
        v.prototype.positionButtons = function () {
          var a = this.buttons,
            b = this.chart,
            c = this.options,
            d = this.zoomText,
            e = b.hasLoaded ? "animate" : "attr",
            f = c.buttonPosition,
            g = (b = b.plotLeft);
          d &&
            "hidden" !== d.visibility &&
            (d[e]({ x: B(b + f.x, b) }), (g += f.x + d.getBBox().width + 5));
          d = 0;
          for (f = this.buttonOptions.length; d < f; ++d)
            if ("hidden" !== a[d].visibility)
              a[d][e]({ x: g }), (g += a[d].width + c.buttonSpacing);
            else a[d][e]({ x: b });
        };
        v.prototype.handleCollision = function (a) {
          var b = this,
            c = this.chart,
            d = this.buttonGroup,
            e = this.inputGroup,
            f = this.options,
            n = f.buttonPosition,
            g = f.dropdown,
            k = f.inputPosition;
          f = function () {
            var a = 0;
            b.buttons.forEach(function (b) {
              b = b.getBBox();
              b.width > a && (a = b.width);
            });
            return a;
          };
          var h = function (b) {
              if (e && d) {
                var c =
                    e.alignAttr.translateX +
                    e.alignOptions.x -
                    a +
                    e.getBBox().x +
                    2,
                  f = e.alignOptions.width,
                  g = d.alignAttr.translateX + d.getBBox().x;
                return g + b > c && c + f > g && n.y < k.y + e.getBBox().height;
              }
              return !1;
            },
            r = function () {
              e &&
                d &&
                e.attr({
                  translateX:
                    e.alignAttr.translateX + (c.axisOffset[1] >= -a ? 0 : -a),
                  translateY: e.alignAttr.translateY + d.getBBox().height + 10,
                });
            };
          if (d) {
            if ("always" === g) {
              this.collapseButtons(a);
              h(f()) && r();
              return;
            }
            "never" === g && this.expandButtons();
          }
          e && d
            ? k.align === n.align || h(this.initialButtonGroupWidth + 20)
              ? "responsive" === g
                ? (this.collapseButtons(a), h(f()) && r())
                : r()
              : "responsive" === g && this.expandButtons()
            : d &&
              "responsive" === g &&
              (this.initialButtonGroupWidth > c.plotWidth
                ? this.collapseButtons(a)
                : this.expandButtons());
        };
        v.prototype.collapseButtons = function (a) {
          var b = this.buttons,
            c = this.buttonOptions,
            d = this.chart,
            e = this.dropdown,
            f = this.options,
            n = this.zoomText,
            g =
              (d.userOptions.rangeSelector &&
                d.userOptions.rangeSelector.buttonTheme) ||
              {},
            k = function (a) {
              return {
                text: a ? "" + a + " \u25be" : "\u25be",
                width: "auto",
                paddingLeft: B(f.buttonTheme.paddingLeft, g.padding, 8),
                paddingRight: B(f.buttonTheme.paddingRight, g.padding, 8),
              };
            };
          n && n.hide();
          var h = !1;
          c.forEach(function (a, c) {
            c = b[c];
            2 !== c.state ? c.hide() : (c.show(), c.attr(k(a.text)), (h = !0));
          });
          h ||
            (e && (e.selectedIndex = 0),
            b[0].show(),
            b[0].attr(k(this.zoomText && this.zoomText.textStr)));
          c = f.buttonPosition.align;
          this.positionButtons();
          ("right" !== c && "center" !== c) ||
            this.alignButtonGroup(
              a,
              b[this.currentButtonIndex()].getBBox().width,
            );
          this.showDropdown();
        };
        v.prototype.expandButtons = function () {
          var a = this.buttons,
            b = this.buttonOptions,
            c = this.options,
            d = this.zoomText;
          this.hideDropdown();
          d && d.show();
          b.forEach(function (b, d) {
            d = a[d];
            d.show();
            d.attr({
              text: b.text,
              width: c.buttonTheme.width || 28,
              paddingLeft: B(c.buttonTheme.paddingLeft, "unset"),
              paddingRight: B(c.buttonTheme.paddingRight, "unset"),
            });
            2 > d.state && d.setState(0);
          });
          this.positionButtons();
        };
        v.prototype.currentButtonIndex = function () {
          var a = this.dropdown;
          return a && 0 < a.selectedIndex ? a.selectedIndex - 1 : 0;
        };
        v.prototype.showDropdown = function () {
          var a = this.buttonGroup,
            b = this.buttons,
            c = this.chart,
            d = this.dropdown;
          if (a && d) {
            var e = a.translateX;
            a = a.translateY;
            b = b[this.currentButtonIndex()].getBBox();
            w(d, {
              left: c.plotLeft + e + "px",
              top: a + 0.5 + "px",
              width: b.width + "px",
              height: b.height + "px",
            });
            this.hasVisibleDropdown = !0;
          }
        };
        v.prototype.hideDropdown = function () {
          var a = this.dropdown;
          a &&
            (w(a, { top: "-9999em", width: "1px", height: "1px" }),
            (this.hasVisibleDropdown = !1));
        };
        v.prototype.getHeight = function () {
          var a = this.options,
            b = this.group,
            c = a.y,
            d = a.buttonPosition.y,
            e = a.inputPosition.y;
          if (a.height) return a.height;
          this.alignElements();
          a = b ? b.getBBox(!0).height + 13 + c : 0;
          b = Math.min(e, d);
          if ((0 > e && 0 > d) || (0 < e && 0 < d)) a += Math.abs(b);
          return a;
        };
        v.prototype.titleCollision = function (a) {
          return !(a.options.title.text || a.options.subtitle.text);
        };
        v.prototype.update = function (a) {
          var b = this.chart;
          E(!0, b.options.rangeSelector, a);
          this.destroy();
          this.init(b);
          this.render();
        };
        v.prototype.destroy = function () {
          var a = this,
            c = a.minInput,
            e = a.maxInput;
          a.eventsToUnbind &&
            (a.eventsToUnbind.forEach(function (a) {
              return a();
            }),
            (a.eventsToUnbind = void 0));
          d(a.buttons);
          c && (c.onfocus = c.onblur = c.onchange = null);
          e && (e.onfocus = e.onblur = e.onchange = null);
          I(
            a,
            function (c, d) {
              c &&
                "chart" !== d &&
                (c instanceof m
                  ? c.destroy()
                  : c instanceof window.HTMLElement && b(c));
              c !== v.prototype[d] && (a[d] = null);
            },
            this,
          );
        };
        return v;
      })();
      c(h.prototype, {
        defaultButtons: [
          { type: "month", count: 1, text: "1m", title: "View 1 month" },
          { type: "month", count: 3, text: "3m", title: "View 3 months" },
          { type: "month", count: 6, text: "6m", title: "View 6 months" },
          { type: "ytd", text: "YTD", title: "View year to date" },
          { type: "year", count: 1, text: "1y", title: "View 1 year" },
          { type: "all", text: "All", title: "View all" },
        ],
        inputTypeFormats: {
          "datetime-local": "%Y-%m-%dT%H:%M:%S",
          date: "%Y-%m-%d",
          time: "%H:%M:%S",
        },
      });
      ("");
      return h;
    },
  );
  A(
    a,
    "Accessibility/Components/RangeSelectorComponent.js",
    [
      a["Stock/RangeSelector/RangeSelector.js"],
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/Announcer.js"],
      a["Accessibility/KeyboardNavigationHandler.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l, x, m, p) {
      var u =
          (this && this.__extends) ||
          (function () {
            var a = function (d, b) {
              a =
                Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array &&
                  function (a, b) {
                    a.__proto__ = b;
                  }) ||
                function (a, b) {
                  for (var c in b) b.hasOwnProperty(c) && (a[c] = b[c]);
                };
              return a(d, b);
            };
            return function (d, b) {
              function c() {
                this.constructor = d;
              }
              a(d, b);
              d.prototype =
                null === b
                  ? Object.create(b)
                  : ((c.prototype = b.prototype), new c());
            };
          })(),
        z = l.unhideChartElementFromAT,
        g = l.getAxisRangeDescription,
        k = p.addEvent,
        w = p.attr;
      h = (function (a) {
        function d() {
          var b = (null !== a && a.apply(this, arguments)) || this;
          b.announcer = void 0;
          return b;
        }
        u(d, a);
        d.prototype.init = function () {
          this.announcer = new x(this.chart, "polite");
        };
        d.prototype.onChartUpdate = function () {
          var a = this.chart,
            c = this,
            d = a.rangeSelector;
          d &&
            (this.updateSelectorVisibility(),
            this.setDropdownAttrs(),
            d.buttons &&
              d.buttons.length &&
              d.buttons.forEach(function (a) {
                c.setRangeButtonAttrs(a);
              }),
            d.maxInput &&
              d.minInput &&
              ["minInput", "maxInput"].forEach(function (b, e) {
                if ((b = d[b]))
                  z(a, b),
                    c.setRangeInputAttrs(
                      b,
                      "accessibility.rangeSelector." +
                        (e ? "max" : "min") +
                        "InputLabel",
                    );
              }));
        };
        d.prototype.updateSelectorVisibility = function () {
          var a = this.chart,
            c = a.rangeSelector,
            d = c && c.dropdown,
            f = (c && c.buttons) || [];
          c && c.hasVisibleDropdown && d
            ? (z(a, d),
              f.forEach(function (a) {
                return a.element.setAttribute("aria-hidden", !0);
              }))
            : (d && d.setAttribute("aria-hidden", !0),
              f.forEach(function (b) {
                return z(a, b.element);
              }));
        };
        d.prototype.setDropdownAttrs = function () {
          var a = this.chart,
            c = a.rangeSelector && a.rangeSelector.dropdown;
          c &&
            ((a = a.langFormat("accessibility.rangeSelector.dropdownLabel", {
              rangeTitle: a.options.lang.rangeSelectorZoom,
            })),
            c.setAttribute("aria-label", a),
            c.setAttribute("tabindex", -1));
        };
        d.prototype.setRangeButtonAttrs = function (a) {
          w(a.element, { tabindex: -1, role: "button" });
        };
        d.prototype.setRangeInputAttrs = function (a, c) {
          var b = this.chart;
          w(a, { tabindex: -1, "aria-label": b.langFormat(c, { chart: b }) });
        };
        d.prototype.onButtonNavKbdArrowKey = function (a, c) {
          var b = a.response,
            d = this.keyCodes,
            f = this.chart,
            g = f.options.accessibility.keyboardNavigation.wrapAround;
          c = c === d.left || c === d.up ? -1 : 1;
          return f.highlightRangeSelectorButton(
            f.highlightedRangeSelectorItemIx + c,
          )
            ? b.success
            : g
              ? (a.init(c), b.success)
              : b[0 < c ? "next" : "prev"];
        };
        d.prototype.onButtonNavKbdClick = function (a) {
          a = a.response;
          var b = this.chart;
          3 !== b.oldRangeSelectorItemState &&
            this.fakeClickEvent(
              b.rangeSelector.buttons[b.highlightedRangeSelectorItemIx].element,
            );
          return a.success;
        };
        d.prototype.onAfterBtnClick = function () {
          var a = this.chart,
            c = g(a.xAxis[0]);
          (a = a.langFormat(
            "accessibility.rangeSelector.clickButtonAnnouncement",
            { chart: a, axisRangeDescription: c },
          )) && this.announcer.announce(a);
        };
        d.prototype.onInputKbdMove = function (a) {
          var b = this.chart,
            d = b.rangeSelector,
            f = (b.highlightedInputRangeIx =
              (b.highlightedInputRangeIx || 0) + a);
          1 < f || 0 > f
            ? b.accessibility &&
              (b.accessibility.keyboardNavigation.tabindexContainer.focus(),
              b.accessibility.keyboardNavigation.move(a))
            : d &&
              ((a = d[f ? "maxDateBox" : "minDateBox"]),
              (d = d[f ? "maxInput" : "minInput"]),
              a && d && b.setFocusToElement(a, d));
        };
        d.prototype.onInputNavInit = function (a) {
          var b = this,
            d = this,
            f = this.chart,
            g = 0 < a ? 0 : 1,
            h = f.rangeSelector,
            m = h && h[g ? "maxDateBox" : "minDateBox"];
          a = h && h.minInput;
          h = h && h.maxInput;
          f.highlightedInputRangeIx = g;
          if (m && a && h) {
            f.setFocusToElement(m, g ? h : a);
            this.removeInputKeydownHandler && this.removeInputKeydownHandler();
            f = function (a) {
              (a.which || a.keyCode) === b.keyCodes.tab &&
                (a.preventDefault(),
                a.stopPropagation(),
                d.onInputKbdMove(a.shiftKey ? -1 : 1));
            };
            var l = k(a, "keydown", f),
              p = k(h, "keydown", f);
            this.removeInputKeydownHandler = function () {
              l();
              p();
            };
          }
        };
        d.prototype.onInputNavTerminate = function () {
          var a = this.chart.rangeSelector || {};
          a.maxInput && a.hideInput("max");
          a.minInput && a.hideInput("min");
          this.removeInputKeydownHandler &&
            (this.removeInputKeydownHandler(),
            delete this.removeInputKeydownHandler);
        };
        d.prototype.initDropdownNav = function () {
          var a = this,
            c = this.chart,
            d = c.rangeSelector,
            f = d && d.dropdown;
          d &&
            f &&
            (c.setFocusToElement(d.buttonGroup, f),
            this.removeDropdownKeydownHandler &&
              this.removeDropdownKeydownHandler(),
            (this.removeDropdownKeydownHandler = k(f, "keydown", function (b) {
              var d = c.accessibility;
              (b.which || b.keyCode) === a.keyCodes.tab &&
                (b.preventDefault(),
                b.stopPropagation(),
                d &&
                  (d.keyboardNavigation.tabindexContainer.focus(),
                  d.keyboardNavigation.move(b.shiftKey ? -1 : 1)));
            })));
        };
        d.prototype.getRangeSelectorButtonNavigation = function () {
          var a = this.chart,
            c = this.keyCodes,
            d = this;
          return new m(a, {
            keyCodeMap: [
              [
                [c.left, c.right, c.up, c.down],
                function (a) {
                  return d.onButtonNavKbdArrowKey(this, a);
                },
              ],
              [
                [c.enter, c.space],
                function () {
                  return d.onButtonNavKbdClick(this);
                },
              ],
            ],
            validate: function () {
              return !!(
                a.rangeSelector &&
                a.rangeSelector.buttons &&
                a.rangeSelector.buttons.length
              );
            },
            init: function (b) {
              var c = a.rangeSelector;
              c && c.hasVisibleDropdown
                ? d.initDropdownNav()
                : c &&
                  ((c = c.buttons.length - 1),
                  a.highlightRangeSelectorButton(0 < b ? 0 : c));
            },
            terminate: function () {
              d.removeDropdownKeydownHandler &&
                (d.removeDropdownKeydownHandler(),
                delete d.removeDropdownKeydownHandler);
            },
          });
        };
        d.prototype.getRangeSelectorInputNavigation = function () {
          var a = this.chart,
            c = this;
          return new m(a, {
            keyCodeMap: [],
            validate: function () {
              return !!(
                a.rangeSelector &&
                a.rangeSelector.inputGroup &&
                "hidden" !==
                  a.rangeSelector.inputGroup.element.style.visibility &&
                !1 !== a.options.rangeSelector.inputEnabled &&
                a.rangeSelector.minInput &&
                a.rangeSelector.maxInput
              );
            },
            init: function (a) {
              c.onInputNavInit(a);
            },
            terminate: function () {
              c.onInputNavTerminate();
            },
          });
        };
        d.prototype.getKeyboardNavigation = function () {
          return [
            this.getRangeSelectorButtonNavigation(),
            this.getRangeSelectorInputNavigation(),
          ];
        };
        d.prototype.destroy = function () {
          this.removeDropdownKeydownHandler &&
            this.removeDropdownKeydownHandler();
          this.removeInputKeydownHandler && this.removeInputKeydownHandler();
          this.announcer && this.announcer.destroy();
        };
        return d;
      })(h);
      (function (f) {
        function d(a) {
          var b = (this.rangeSelector && this.rangeSelector.buttons) || [],
            c = this.highlightedRangeSelectorItemIx,
            d = this.rangeSelector && this.rangeSelector.selected;
          "undefined" !== typeof c &&
            b[c] &&
            c !== d &&
            b[c].setState(this.oldRangeSelectorItemState || 0);
          this.highlightedRangeSelectorItemIx = a;
          return b[a]
            ? (this.setFocusToElement(b[a].box, b[a].element),
              a !== d &&
                ((this.oldRangeSelectorItemState = b[a].state),
                b[a].setState(1)),
              !0)
            : !1;
        }
        function b() {
          var a = this.chart.accessibility;
          if (a && a.components.rangeSelector)
            return a.components.rangeSelector.onAfterBtnClick();
        }
        var c = [];
        f.compose = function (e, f) {
          -1 === c.indexOf(e) &&
            (c.push(e), (e.prototype.highlightRangeSelectorButton = d));
          -1 === c.indexOf(f) && (c.push(f), k(a, "afterBtnClick", b));
        };
      })(h || (h = {}));
      return h;
    },
  );
  A(
    a,
    "Accessibility/Components/SeriesComponent/ForcedMarkers.js",
    [a["Core/Utilities.js"]],
    function (a) {
      var h = a.addEvent,
        l = a.merge,
        u;
      (function (a) {
        function m(a) {
          l(!0, a, {
            marker: { enabled: !0, states: { normal: { opacity: 0 } } },
          });
        }
        function u(a) {
          return (
            a.marker.states &&
            a.marker.states.normal &&
            a.marker.states.normal.opacity
          );
        }
        function x() {
          if (this.chart.styledMode) {
            if (this.markerGroup)
              this.markerGroup[
                this.a11yMarkersForced ? "addClass" : "removeClass"
              ]("highcharts-a11y-markers-hidden");
            this._hasPointMarkers &&
              this.points &&
              this.points.length &&
              this.points.forEach(function (a) {
                a.graphic &&
                  (a.graphic[
                    a.hasForcedA11yMarker ? "addClass" : "removeClass"
                  ]("highcharts-a11y-marker-hidden"),
                  a.graphic[
                    !1 === a.hasForcedA11yMarker ? "addClass" : "removeClass"
                  ]("highcharts-a11y-marker-visible"));
              });
          }
        }
        function g(a) {
          this.resetA11yMarkerOptions = l(
            a.options.marker || {},
            this.userOptions.marker || {},
          );
        }
        function k() {
          var a = this.options,
            d =
              !1 !==
              (this.options.accessibility &&
                this.options.accessibility.enabled);
          if ((d = this.chart.options.accessibility.enabled && d))
            (d = this.chart.options.accessibility),
              (d =
                this.points.length <
                  d.series.pointDescriptionEnabledThreshold ||
                !1 === d.series.pointDescriptionEnabledThreshold);
          if (d) {
            if (
              (a.marker &&
                !1 === a.marker.enabled &&
                ((this.a11yMarkersForced = !0), m(this.options)),
              this._hasPointMarkers && this.points && this.points.length)
            )
              for (a = this.points.length; a--; ) {
                d = this.points[a];
                var b = d.options,
                  c = d.hasForcedA11yMarker;
                delete d.hasForcedA11yMarker;
                b.marker &&
                  ((c = c && 0 === u(b)),
                  b.marker.enabled && !c
                    ? (l(!0, b.marker, {
                        states: { normal: { opacity: u(b) || 1 } },
                      }),
                      (d.hasForcedA11yMarker = !1))
                    : !1 === b.marker.enabled &&
                      (m(b), (d.hasForcedA11yMarker = !0)));
              }
          } else
            this.a11yMarkersForced &&
              (delete this.a11yMarkersForced,
              (a = this.resetA11yMarkerOptions) &&
                this.update({
                  marker: {
                    enabled: a.enabled,
                    states: {
                      normal: {
                        opacity:
                          a.states &&
                          a.states.normal &&
                          a.states.normal.opacity,
                      },
                    },
                  },
                }),
              delete this.resetA11yMarkerOptions);
        }
        var w = [];
        a.compose = function (a) {
          -1 === w.indexOf(a) &&
            (w.push(a),
            h(a, "afterSetOptions", g),
            h(a, "render", k),
            h(a, "afterRender", x));
        };
      })(u || (u = {}));
      return u;
    },
  );
  A(
    a,
    "Accessibility/Components/SeriesComponent/SeriesKeyboardNavigation.js",
    [
      a["Core/Series/Point.js"],
      a["Core/Series/Series.js"],
      a["Core/Series/SeriesRegistry.js"],
      a["Core/Globals.js"],
      a["Core/Utilities.js"],
      a["Accessibility/KeyboardNavigationHandler.js"],
      a["Accessibility/Utils/EventProvider.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
    ],
    function (a, h, l, x, m, p, A, z) {
      function g(a) {
        var b = a.index,
          c = a.series.points,
          d = c.length;
        if (c[b] !== a)
          for (; d--; ) {
            if (c[d] === a) return d;
          }
        else return b;
      }
      function k(a) {
        var b =
            a.chart.options.accessibility.keyboardNavigation.seriesNavigation,
          c = a.options.accessibility || {},
          d = c.keyboardNavigation;
        return (
          (d && !1 === d.enabled) ||
          !1 === c.enabled ||
          !1 === a.options.enableMouseTracking ||
          !a.visible ||
          (b.pointNavigationEnabledThreshold &&
            b.pointNavigationEnabledThreshold <= a.points.length)
        );
      }
      function w(a) {
        var b = a.series.chart.options.accessibility,
          c = a.options.accessibility && !1 === a.options.accessibility.enabled;
        return (
          (a.isNull && b.keyboardNavigation.seriesNavigation.skipNullPoints) ||
          !1 === a.visible ||
          !1 === a.isInside ||
          c ||
          k(a.series)
        );
      }
      function f(a) {
        a = a.series || [];
        for (var b = a.length, c = 0; c < b; ++c)
          if (!k(a[c])) {
            a: {
              var d = a[c].points || [];
              for (var e = d.length, f = 0; f < e; ++f)
                if (!w(d[f])) {
                  d = d[f];
                  break a;
                }
              d = null;
            }
            if (d) return d;
          }
        return null;
      }
      function d(a) {
        for (
          var b = a.series.length, c = !1;
          b-- &&
          !((a.highlightedPoint =
            a.series[b].points[a.series[b].points.length - 1]),
          (c = a.series[b].highlightNextValidPoint()));

        );
        return c;
      }
      function b(a) {
        delete a.highlightedPoint;
        return (a = f(a)) ? a.highlight() : !1;
      }
      var c = l.seriesTypes,
        e = x.doc,
        r = m.defined,
        u = m.fireEvent,
        K = z.getPointFromXY,
        J = z.getSeriesFromName,
        B = z.scrollToPoint;
      l = (function () {
        function c(a, b) {
          this.keyCodes = b;
          this.chart = a;
        }
        c.prototype.init = function () {
          var b = this,
            c = this.chart,
            d = (this.eventProvider = new A());
          d.addEvent(h, "destroy", function () {
            return b.onSeriesDestroy(this);
          });
          d.addEvent(c, "afterApplyDrilldown", function () {
            var a = f(this);
            a && a.highlight(!1);
          });
          d.addEvent(c, "drilldown", function (a) {
            a = a.point;
            var c = a.series;
            b.lastDrilledDownPoint = {
              x: a.x,
              y: a.y,
              seriesName: c ? c.name : "",
            };
          });
          d.addEvent(c, "drillupall", function () {
            setTimeout(function () {
              b.onDrillupAll();
            }, 10);
          });
          d.addEvent(a, "afterSetState", function () {
            var a = this.graphic && this.graphic.element,
              b = e.activeElement,
              d = b && b.getAttribute("class");
            d = d && -1 < d.indexOf("highcharts-a11y-proxy-button");
            c.highlightedPoint === this &&
              b !== a &&
              !d &&
              a &&
              a.focus &&
              a.focus();
          });
        };
        c.prototype.onDrillupAll = function () {
          var a = this.lastDrilledDownPoint,
            b = this.chart,
            c = a && J(b, a.seriesName),
            d;
          a && c && r(a.x) && r(a.y) && (d = K(c, a.x, a.y));
          d = d || f(b);
          b.container && b.container.focus();
          d && d.highlight && d.highlight(!1);
        };
        c.prototype.getKeyboardNavigationHandler = function () {
          var a = this,
            c = this.keyCodes,
            e = this.chart,
            g = e.inverted;
          return new p(e, {
            keyCodeMap: [
              [
                g ? [c.up, c.down] : [c.left, c.right],
                function (b) {
                  return a.onKbdSideways(this, b);
                },
              ],
              [
                g ? [c.left, c.right] : [c.up, c.down],
                function (b) {
                  return a.onKbdVertical(this, b);
                },
              ],
              [
                [c.enter, c.space],
                function (a, b) {
                  if ((a = e.highlightedPoint))
                    (b.point = a),
                      u(a.series, "click", b),
                      a.firePointEvent("click");
                  return this.response.success;
                },
              ],
              [
                [c.home],
                function () {
                  b(e);
                  return this.response.success;
                },
              ],
              [
                [c.end],
                function () {
                  d(e);
                  return this.response.success;
                },
              ],
              [
                [c.pageDown, c.pageUp],
                function (a) {
                  e.highlightAdjacentSeries(a === c.pageDown);
                  return this.response.success;
                },
              ],
            ],
            init: function () {
              return a.onHandlerInit(this);
            },
            validate: function () {
              return !!f(e);
            },
            terminate: function () {
              return a.onHandlerTerminate();
            },
          });
        };
        c.prototype.onKbdSideways = function (a, b) {
          var c = this.keyCodes;
          return this.attemptHighlightAdjacentPoint(
            a,
            b === c.right || b === c.down,
          );
        };
        c.prototype.onHandlerInit = function (a) {
          var c = this.chart;
          c.options.accessibility.keyboardNavigation.seriesNavigation
            .rememberPointFocus && c.highlightedPoint
            ? c.highlightedPoint.highlight()
            : b(c);
          return a.response.success;
        };
        c.prototype.onKbdVertical = function (a, b) {
          var c = this.chart,
            d = this.keyCodes;
          b = b === d.down || b === d.right;
          d = c.options.accessibility.keyboardNavigation.seriesNavigation;
          if (d.mode && "serialize" === d.mode)
            return this.attemptHighlightAdjacentPoint(a, b);
          c[
            c.highlightedPoint && c.highlightedPoint.series.keyboardMoveVertical
              ? "highlightAdjacentPointVertical"
              : "highlightAdjacentSeries"
          ](b);
          return a.response.success;
        };
        c.prototype.onHandlerTerminate = function () {
          var a = this.chart,
            b = a.options.accessibility.keyboardNavigation;
          a.tooltip && a.tooltip.hide(0);
          var c = a.highlightedPoint && a.highlightedPoint.series;
          if (c && c.onMouseOut) c.onMouseOut();
          if (a.highlightedPoint && a.highlightedPoint.onMouseOut)
            a.highlightedPoint.onMouseOut();
          b.seriesNavigation.rememberPointFocus || delete a.highlightedPoint;
        };
        c.prototype.attemptHighlightAdjacentPoint = function (a, c) {
          var e = this.chart,
            f = e.options.accessibility.keyboardNavigation.wrapAround;
          return e.highlightAdjacentPoint(c)
            ? a.response.success
            : f && (c ? b(e) : d(e))
              ? a.response.success
              : a.response[c ? "next" : "prev"];
        };
        c.prototype.onSeriesDestroy = function (a) {
          var b = this.chart;
          b.highlightedPoint &&
            b.highlightedPoint.series === a &&
            (delete b.highlightedPoint,
            b.focusElement && b.focusElement.removeFocusBorder());
        };
        c.prototype.destroy = function () {
          this.eventProvider.removeAddedEvents();
        };
        return c;
      })();
      (function (a) {
        function b(a) {
          var b = this.series,
            c = this.highlightedPoint,
            d = (c && g(c)) || 0,
            e = (c && c.series.points) || [],
            f = this.series && this.series[this.series.length - 1];
          f = f && f.points && f.points[f.points.length - 1];
          if (!b[0] || !b[0].points) return !1;
          if (c) {
            if (
              ((b = b[c.series.index + (a ? 1 : -1)]),
              (d = e[d + (a ? 1 : -1)]),
              !d && b && (d = b.points[a ? 0 : b.points.length - 1]),
              !d)
            )
              return !1;
          } else d = a ? b[0].points[0] : f;
          return w(d)
            ? ((b = d.series),
              k(b)
                ? (this.highlightedPoint = a
                    ? b.points[b.points.length - 1]
                    : b.points[0])
                : (this.highlightedPoint = d),
              this.highlightAdjacentPoint(a))
            : d.highlight();
        }
        function d(a) {
          var b = this.highlightedPoint,
            c = Infinity,
            d;
          if (!r(b.plotX) || !r(b.plotY)) return !1;
          this.series.forEach(function (e) {
            k(e) ||
              e.points.forEach(function (f) {
                if (r(f.plotY) && r(f.plotX) && f !== b) {
                  var g = f.plotY - b.plotY,
                    h = Math.abs(f.plotX - b.plotX);
                  h = Math.abs(g) * Math.abs(g) + h * h * 4;
                  e.yAxis && e.yAxis.reversed && (g *= -1);
                  !((0 >= g && a) || (0 <= g && !a) || 5 > h || w(f)) &&
                    h < c &&
                    ((c = h), (d = f));
                }
              });
          });
          return d ? d.highlight() : !1;
        }
        function e(a) {
          var b = this.highlightedPoint,
            c = this.series && this.series[this.series.length - 1],
            d = c && c.points && c.points[c.points.length - 1];
          if (!this.highlightedPoint)
            return (
              (c = a ? this.series && this.series[0] : c),
              (d = a ? c && c.points && c.points[0] : d) ? d.highlight() : !1
            );
          c = this.series[b.series.index + (a ? -1 : 1)];
          if (!c) return !1;
          d = f(b, c, 4);
          if (!d) return !1;
          if (k(c))
            return (
              d.highlight(),
              (a = this.highlightAdjacentSeries(a)),
              a ? a : (b.highlight(), !1)
            );
          d.highlight();
          return d.series.highlightNextValidPoint();
        }
        function f(a, b, c, d) {
          var e = Infinity,
            f = b.points.length,
            g = function (a) {
              return !(r(a.plotX) && r(a.plotY));
            };
          if (!g(a)) {
            for (; f--; ) {
              var h = b.points[f];
              if (
                !g(h) &&
                ((h =
                  (a.plotX - h.plotX) * (a.plotX - h.plotX) * (c || 1) +
                  (a.plotY - h.plotY) * (a.plotY - h.plotY) * (d || 1)),
                h < e)
              ) {
                e = h;
                var k = f;
              }
            }
            return r(k) ? b.points[k] : void 0;
          }
        }
        function h(a) {
          void 0 === a && (a = !0);
          var b = this.series.chart;
          if (!this.isNull && a) this.onMouseOver();
          else b.tooltip && b.tooltip.hide(0);
          B(this);
          this.graphic &&
            (b.setFocusToElement(this.graphic),
            !a && b.focusElement && b.focusElement.removeFocusBorder());
          b.highlightedPoint = this;
          return this;
        }
        function m() {
          var a = this.chart.highlightedPoint,
            b = (a && a.series) === this ? g(a) : 0;
          a = this.points;
          var c = a.length;
          if (a && c) {
            for (var d = b; d < c; ++d) if (!w(a[d])) return a[d].highlight();
            for (; 0 <= b; --b) if (!w(a[b])) return a[b].highlight();
          }
          return !1;
        }
        var l = [];
        a.compose = function (a, f, g) {
          -1 === l.indexOf(a) &&
            (l.push(a),
            (a = a.prototype),
            (a.highlightAdjacentPoint = b),
            (a.highlightAdjacentPointVertical = d),
            (a.highlightAdjacentSeries = e));
          -1 === l.indexOf(f) && (l.push(f), (f.prototype.highlight = h));
          -1 === l.indexOf(g) &&
            (l.push(g),
            (f = g.prototype),
            (f.keyboardMoveVertical = !0),
            ["column", "gantt", "pie"].forEach(function (a) {
              c[a] && (c[a].prototype.keyboardMoveVertical = !1);
            }),
            (f.highlightNextValidPoint = m));
        };
      })(l || (l = {}));
      return l;
    },
  );
  A(
    a,
    "Accessibility/Components/SeriesComponent/SeriesComponent.js",
    [
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Components/SeriesComponent/ForcedMarkers.js"],
      a["Accessibility/Components/SeriesComponent/NewDataAnnouncer.js"],
      a["Accessibility/Components/SeriesComponent/SeriesDescriber.js"],
      a["Accessibility/Components/SeriesComponent/SeriesKeyboardNavigation.js"],
      a["Core/Tooltip.js"],
    ],
    function (a, h, l, x, m, p, A) {
      var u =
          (this && this.__extends) ||
          (function () {
            var a = function (f, d) {
              a =
                Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array &&
                  function (a, c) {
                    a.__proto__ = c;
                  }) ||
                function (a, c) {
                  for (var b in c) c.hasOwnProperty(b) && (a[b] = c[b]);
                };
              return a(f, d);
            };
            return function (f, d) {
              function b() {
                this.constructor = f;
              }
              a(f, d);
              f.prototype =
                null === d
                  ? Object.create(d)
                  : ((b.prototype = d.prototype), new b());
            };
          })(),
        g = h.hideSeriesFromAT,
        k = m.describeSeries;
      return (function (a) {
        function f() {
          return (null !== a && a.apply(this, arguments)) || this;
        }
        u(f, a);
        f.compose = function (a, b, c) {
          x.compose(c);
          l.compose(c);
          p.compose(a, b, c);
        };
        f.prototype.init = function () {
          this.newDataAnnouncer = new x(this.chart);
          this.newDataAnnouncer.init();
          this.keyboardNavigation = new p(this.chart, this.keyCodes);
          this.keyboardNavigation.init();
          this.hideTooltipFromATWhenShown();
          this.hideSeriesLabelsFromATWhenShown();
        };
        f.prototype.hideTooltipFromATWhenShown = function () {
          var a = this;
          this.addEvent(A, "refresh", function () {
            this.chart === a.chart &&
              this.label &&
              this.label.element &&
              this.label.element.setAttribute("aria-hidden", !0);
          });
        };
        f.prototype.hideSeriesLabelsFromATWhenShown = function () {
          this.addEvent(this.chart, "afterDrawSeriesLabels", function () {
            this.series.forEach(function (a) {
              a.labelBySeries && a.labelBySeries.attr("aria-hidden", !0);
            });
          });
        };
        f.prototype.onChartRender = function () {
          this.chart.series.forEach(function (a) {
            !1 !==
              (a.options.accessibility && a.options.accessibility.enabled) &&
            a.visible
              ? k(a)
              : g(a);
          });
        };
        f.prototype.getKeyboardNavigation = function () {
          return this.keyboardNavigation.getKeyboardNavigationHandler();
        };
        f.prototype.destroy = function () {
          this.newDataAnnouncer.destroy();
          this.keyboardNavigation.destroy();
        };
        return f;
      })(a);
    },
  );
  A(
    a,
    "Accessibility/Components/ZoomComponent.js",
    [
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Accessibility/KeyboardNavigationHandler.js"],
      a["Core/Utilities.js"],
    ],
    function (a, h, l, x, m) {
      var p =
          (this && this.__extends) ||
          (function () {
            var a = function (f, d) {
              a =
                Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array &&
                  function (a, c) {
                    a.__proto__ = c;
                  }) ||
                function (a, c) {
                  for (var b in c) c.hasOwnProperty(b) && (a[b] = c[b]);
                };
              return a(f, d);
            };
            return function (f, d) {
              function b() {
                this.constructor = f;
              }
              a(f, d);
              f.prototype =
                null === d
                  ? Object.create(d)
                  : ((b.prototype = d.prototype), new b());
            };
          })(),
        u = h.unhideChartElementFromAT,
        z = l.getFakeMouseEvent,
        g = m.attr,
        k = m.pick;
      return (function (a) {
        function f() {
          var d = (null !== a && a.apply(this, arguments)) || this;
          d.focusedMapNavButtonIx = -1;
          return d;
        }
        p(f, a);
        f.prototype.init = function () {
          var a = this,
            b = this.chart;
          this.proxyProvider.addGroup("zoom", "div");
          ["afterShowResetZoom", "afterApplyDrilldown", "drillupall"].forEach(
            function (c) {
              a.addEvent(b, c, function () {
                a.updateProxyOverlays();
              });
            },
          );
        };
        f.prototype.onChartUpdate = function () {
          var a = this.chart,
            b = this;
          a.mapNavigation &&
            a.mapNavigation.navButtons.forEach(function (c, d) {
              u(a, c.element);
              b.setMapNavButtonAttrs(
                c.element,
                "accessibility.zoom.mapZoom" + (d ? "Out" : "In"),
              );
            });
        };
        f.prototype.setMapNavButtonAttrs = function (a, b) {
          var c = this.chart;
          b = c.langFormat(b, { chart: c });
          g(a, { tabindex: -1, role: "button", "aria-label": b });
        };
        f.prototype.onChartRender = function () {
          this.updateProxyOverlays();
        };
        f.prototype.updateProxyOverlays = function () {
          var a = this.chart;
          this.proxyProvider.clearGroup("zoom");
          a.resetZoomButton &&
            this.createZoomProxyButton(
              a.resetZoomButton,
              "resetZoomProxyButton",
              a.langFormat("accessibility.zoom.resetZoomButton", { chart: a }),
            );
          a.drillUpButton &&
            a.breadcrumbs &&
            a.breadcrumbs.list &&
            this.createZoomProxyButton(
              a.drillUpButton,
              "drillUpProxyButton",
              a.langFormat("accessibility.drillUpButton", {
                chart: a,
                buttonText: a.breadcrumbs.getButtonText(
                  a.breadcrumbs.list[a.breadcrumbs.list.length - 1],
                ),
              }),
            );
        };
        f.prototype.createZoomProxyButton = function (a, b, c) {
          this[b] = this.proxyProvider.addProxyElement(
            "zoom",
            { click: a },
            { "aria-label": c, tabindex: -1 },
          );
        };
        f.prototype.getMapZoomNavigation = function () {
          var a = this.keyCodes,
            b = this.chart,
            c = this;
          return new x(b, {
            keyCodeMap: [
              [
                [a.up, a.down, a.left, a.right],
                function (a) {
                  return c.onMapKbdArrow(this, a);
                },
              ],
              [
                [a.tab],
                function (a, b) {
                  return c.onMapKbdTab(this, b);
                },
              ],
              [
                [a.space, a.enter],
                function () {
                  return c.onMapKbdClick(this);
                },
              ],
            ],
            validate: function () {
              return !!(
                b.mapView &&
                b.mapNavigation &&
                b.mapNavigation.navButtons.length
              );
            },
            init: function (a) {
              return c.onMapNavInit(a);
            },
          });
        };
        f.prototype.onMapKbdArrow = function (a, b) {
          var c = this.chart,
            d = this.keyCodes,
            f = c.container,
            g = b === d.up || b === d.down;
          b =
            ((g ? c.plotHeight : c.plotWidth) / 10) *
            (b === d.left || b === d.up ? 1 : -1);
          d = 10 * Math.random();
          c = {
            x: f.offsetLeft + c.plotLeft + c.plotWidth / 2 + d,
            y: f.offsetTop + c.plotTop + c.plotHeight / 2 + d,
          };
          g = g ? { x: c.x, y: c.y + b } : { x: c.x + b, y: c.y };
          [z("mousedown", c), z("mousemove", g), z("mouseup", g)].forEach(
            function (a) {
              return f.dispatchEvent(a);
            },
          );
          return a.response.success;
        };
        f.prototype.onMapKbdTab = function (a, b) {
          var c = this.chart;
          a = a.response;
          var d =
            ((b = b.shiftKey) && !this.focusedMapNavButtonIx) ||
            (!b && this.focusedMapNavButtonIx);
          c.mapNavigation.navButtons[this.focusedMapNavButtonIx].setState(0);
          if (d) return c.mapView && c.mapView.zoomBy(), a[b ? "prev" : "next"];
          this.focusedMapNavButtonIx += b ? -1 : 1;
          b = c.mapNavigation.navButtons[this.focusedMapNavButtonIx];
          c.setFocusToElement(b.box, b.element);
          b.setState(2);
          return a.success;
        };
        f.prototype.onMapKbdClick = function (a) {
          this.fakeClickEvent(
            this.chart.mapNavigation.navButtons[this.focusedMapNavButtonIx]
              .element,
          );
          return a.response.success;
        };
        f.prototype.onMapNavInit = function (a) {
          var b = this.chart,
            c = b.mapNavigation.navButtons[0],
            d = b.mapNavigation.navButtons[1];
          c = 0 < a ? c : d;
          b.setFocusToElement(c.box, c.element);
          c.setState(2);
          this.focusedMapNavButtonIx = 0 < a ? 0 : 1;
        };
        f.prototype.simpleButtonNavigation = function (a, b, c) {
          var d = this.keyCodes,
            f = this,
            g = this.chart;
          return new x(g, {
            keyCodeMap: [
              [
                [d.tab, d.up, d.down, d.left, d.right],
                function (a, b) {
                  return this.response[
                    (a === d.tab && b.shiftKey) || a === d.left || a === d.up
                      ? "prev"
                      : "next"
                  ];
                },
              ],
              [
                [d.space, d.enter],
                function () {
                  var a = c(this, g);
                  return k(a, this.response.success);
                },
              ],
            ],
            validate: function () {
              return g[a] && g[a].box && f[b].buttonElement;
            },
            init: function () {
              g.setFocusToElement(g[a].box, f[b].buttonElement);
            },
          });
        };
        f.prototype.getKeyboardNavigation = function () {
          return [
            this.simpleButtonNavigation(
              "resetZoomButton",
              "resetZoomProxyButton",
              function (a, b) {
                b.zoomOut();
              },
            ),
            this.simpleButtonNavigation(
              "drillUpButton",
              "drillUpProxyButton",
              function (a, b) {
                b.drillUp();
                return a.response.prev;
              },
            ),
            this.getMapZoomNavigation(),
          ];
        };
        return f;
      })(a);
    },
  );
  A(
    a,
    "Accessibility/HighContrastMode.js",
    [a["Core/Globals.js"]],
    function (a) {
      var h = a.doc,
        l = a.isMS,
        u = a.win;
      return {
        isHighContrastModeActive: function () {
          var a = /(Edg)/.test(u.navigator.userAgent);
          if (u.matchMedia && a)
            return u.matchMedia("(-ms-high-contrast: active)").matches;
          if (l && u.getComputedStyle) {
            a = h.createElement("div");
            a.style.backgroundImage = "url(".concat(
              "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",
              ")",
            );
            h.body.appendChild(a);
            var p = (a.currentStyle || u.getComputedStyle(a)).backgroundImage;
            h.body.removeChild(a);
            return "none" === p;
          }
          return (
            u.matchMedia && u.matchMedia("(forced-colors: active)").matches
          );
        },
        setHighContrastTheme: function (a) {
          a.highContrastModeActive = !0;
          var h = a.options.accessibility.highContrastTheme;
          a.update(h, !1);
          a.series.forEach(function (a) {
            var l = h.plotOptions[a.type] || {};
            a.update({
              color: l.color || "windowText",
              colors: [l.color || "windowText"],
              borderColor: l.borderColor || "window",
            });
            a.points.forEach(function (a) {
              a.options &&
                a.options.color &&
                a.update(
                  {
                    color: l.color || "windowText",
                    borderColor: l.borderColor || "window",
                  },
                  !1,
                );
            });
          });
          a.redraw();
        },
      };
    },
  );
  A(a, "Accessibility/HighContrastTheme.js", [], function () {
    return {
      chart: { backgroundColor: "window" },
      title: { style: { color: "windowText" } },
      subtitle: { style: { color: "windowText" } },
      colorAxis: { minColor: "windowText", maxColor: "windowText", stops: [] },
      colors: ["windowText"],
      xAxis: {
        gridLineColor: "windowText",
        labels: { style: { color: "windowText" } },
        lineColor: "windowText",
        minorGridLineColor: "windowText",
        tickColor: "windowText",
        title: { style: { color: "windowText" } },
      },
      yAxis: {
        gridLineColor: "windowText",
        labels: { style: { color: "windowText" } },
        lineColor: "windowText",
        minorGridLineColor: "windowText",
        tickColor: "windowText",
        title: { style: { color: "windowText" } },
      },
      tooltip: {
        backgroundColor: "window",
        borderColor: "windowText",
        style: { color: "windowText" },
      },
      plotOptions: {
        series: {
          lineColor: "windowText",
          fillColor: "window",
          borderColor: "windowText",
          edgeColor: "windowText",
          borderWidth: 1,
          dataLabels: {
            connectorColor: "windowText",
            color: "windowText",
            style: { color: "windowText", textOutline: "none" },
          },
          marker: { lineColor: "windowText", fillColor: "windowText" },
        },
        pie: {
          color: "window",
          colors: ["window"],
          borderColor: "windowText",
          borderWidth: 1,
        },
        boxplot: { fillColor: "window" },
        candlestick: { lineColor: "windowText", fillColor: "window" },
        errorbar: { fillColor: "window" },
      },
      legend: {
        backgroundColor: "window",
        itemStyle: { color: "windowText" },
        itemHoverStyle: { color: "windowText" },
        itemHiddenStyle: { color: "#555" },
        title: { style: { color: "windowText" } },
      },
      credits: { style: { color: "windowText" } },
      labels: { style: { color: "windowText" } },
      drilldown: {
        activeAxisLabelStyle: { color: "windowText" },
        activeDataLabelStyle: { color: "windowText" },
      },
      navigation: {
        buttonOptions: {
          symbolStroke: "windowText",
          theme: { fill: "window" },
        },
      },
      rangeSelector: {
        buttonTheme: {
          fill: "window",
          stroke: "windowText",
          style: { color: "windowText" },
          states: {
            hover: {
              fill: "window",
              stroke: "windowText",
              style: { color: "windowText" },
            },
            select: {
              fill: "#444",
              stroke: "windowText",
              style: { color: "windowText" },
            },
          },
        },
        inputBoxBorderColor: "windowText",
        inputStyle: { backgroundColor: "window", color: "windowText" },
        labelStyle: { color: "windowText" },
      },
      navigator: {
        handles: { backgroundColor: "window", borderColor: "windowText" },
        outlineColor: "windowText",
        maskFill: "transparent",
        series: { color: "windowText", lineColor: "windowText" },
        xAxis: { gridLineColor: "windowText" },
      },
      scrollbar: {
        barBackgroundColor: "#444",
        barBorderColor: "windowText",
        buttonArrowColor: "windowText",
        buttonBackgroundColor: "window",
        buttonBorderColor: "windowText",
        rifleColor: "windowText",
        trackBackgroundColor: "window",
        trackBorderColor: "windowText",
      },
    };
  });
  A(a, "Accessibility/Options/A11yDefaults.js", [], function () {
    return {
      accessibility: {
        enabled: !0,
        screenReaderSection: {
          beforeChartFormat:
            "<{headingTagName}>{chartTitle}</{headingTagName}><div>{typeDescription}</div><div>{chartSubtitle}</div><div>{chartLongdesc}</div><div>{playAsSoundButton}</div><div>{viewTableButton}</div><div>{xAxisDescription}</div><div>{yAxisDescription}</div><div>{annotationsTitle}{annotationsList}</div>",
          afterChartFormat: "{endOfChartMarker}",
          axisRangeDateFormat: "%Y-%m-%d %H:%M:%S",
        },
        series: {
          descriptionFormat:
            "{seriesDescription}{authorDescription}{axisDescription}",
          describeSingleSeries: !1,
          pointDescriptionEnabledThreshold: 200,
        },
        point: {
          valueDescriptionFormat: "{xDescription}{separator}{value}.",
          describeNull: !0,
        },
        landmarkVerbosity: "all",
        linkedDescription:
          '*[data-highcharts-chart="{index}"] + .highcharts-description',
        keyboardNavigation: {
          enabled: !0,
          focusBorder: {
            enabled: !0,
            hideBrowserFocusOutline: !0,
            style: { color: "#335cad", lineWidth: 2, borderRadius: 3 },
            margin: 2,
          },
          order: ["series", "zoom", "rangeSelector", "legend", "chartMenu"],
          wrapAround: !0,
          seriesNavigation: {
            skipNullPoints: !0,
            pointNavigationEnabledThreshold: !1,
            rememberPointFocus: !1,
          },
        },
        announceNewData: {
          enabled: !1,
          minAnnounceInterval: 5e3,
          interruptUser: !1,
        },
      },
      legend: {
        accessibility: { enabled: !0, keyboardNavigation: { enabled: !0 } },
      },
      exporting: { accessibility: { enabled: !0 } },
    };
  });
  A(a, "Accessibility/Options/LangDefaults.js", [], function () {
    return {
      accessibility: {
        defaultChartTitle: "Chart",
        chartContainerLabel: "{title}. Highcharts interactive chart.",
        svgContainerLabel: "Interactive chart",
        drillUpButton: "{buttonText}",
        credits: "Chart credits: {creditsStr}",
        thousandsSep: ",",
        svgContainerTitle: "",
        graphicContainerLabel: "",
        screenReaderSection: {
          beforeRegionLabel: "",
          afterRegionLabel: "",
          annotations: {
            heading: "Chart annotations summary",
            descriptionSinglePoint:
              "{annotationText}. Related to {annotationPoint}",
            descriptionMultiplePoints:
              "{annotationText}. Related to {annotationPoint}{ Also related to, #each(additionalAnnotationPoints)}",
            descriptionNoPoints: "{annotationText}",
          },
          endOfChartMarker: "End of interactive chart.",
        },
        sonification: {
          playAsSoundButtonText: "Play as sound, {chartTitle}",
          playAsSoundClickAnnouncement: "Play",
        },
        legend: {
          legendLabelNoTitle: "Toggle series visibility, {chartTitle}",
          legendLabel: "Chart legend: {legendTitle}",
          legendItem: "Show {itemName}",
        },
        zoom: {
          mapZoomIn: "Zoom chart",
          mapZoomOut: "Zoom out chart",
          resetZoomButton: "Reset zoom",
        },
        rangeSelector: {
          dropdownLabel: "{rangeTitle}",
          minInputLabel: "Select start date.",
          maxInputLabel: "Select end date.",
          clickButtonAnnouncement: "Viewing {axisRangeDescription}",
        },
        table: {
          viewAsDataTableButtonText: "View as data table, {chartTitle}",
          tableSummary: "Table representation of chart.",
        },
        announceNewData: {
          newDataAnnounce: "Updated data for chart {chartTitle}",
          newSeriesAnnounceSingle: "New data series: {seriesDesc}",
          newPointAnnounceSingle: "New data point: {pointDesc}",
          newSeriesAnnounceMultiple:
            "New data series in chart {chartTitle}: {seriesDesc}",
          newPointAnnounceMultiple:
            "New data point in chart {chartTitle}: {pointDesc}",
        },
        seriesTypeDescriptions: {
          boxplot:
            "Box plot charts are typically used to display groups of statistical data. Each data point in the chart can have up to 5 values: minimum, lower quartile, median, upper quartile, and maximum.",
          arearange:
            "Arearange charts are line charts displaying a range between a lower and higher value for each point.",
          areasplinerange:
            "These charts are line charts displaying a range between a lower and higher value for each point.",
          bubble:
            "Bubble charts are scatter charts where each data point also has a size value.",
          columnrange:
            "Columnrange charts are column charts displaying a range between a lower and higher value for each point.",
          errorbar:
            "Errorbar series are used to display the variability of the data.",
          funnel:
            "Funnel charts are used to display reduction of data in stages.",
          pyramid:
            "Pyramid charts consist of a single pyramid with item heights corresponding to each point value.",
          waterfall:
            "A waterfall chart is a column chart where each column contributes towards a total end value.",
        },
        chartTypes: {
          emptyChart: "Empty chart",
          mapTypeDescription: "Map of {mapTitle} with {numSeries} data series.",
          unknownMap: "Map of unspecified region with {numSeries} data series.",
          combinationChart: "Combination chart with {numSeries} data series.",
          defaultSingle:
            "Chart with {numPoints} data {#plural(numPoints, points, point)}.",
          defaultMultiple: "Chart with {numSeries} data series.",
          splineSingle:
            "Line chart with {numPoints} data {#plural(numPoints, points, point)}.",
          splineMultiple: "Line chart with {numSeries} lines.",
          lineSingle:
            "Line chart with {numPoints} data {#plural(numPoints, points, point)}.",
          lineMultiple: "Line chart with {numSeries} lines.",
          columnSingle:
            "Bar chart with {numPoints} {#plural(numPoints, bars, bar)}.",
          columnMultiple: "Bar chart with {numSeries} data series.",
          barSingle:
            "Bar chart with {numPoints} {#plural(numPoints, bars, bar)}.",
          barMultiple: "Bar chart with {numSeries} data series.",
          pieSingle:
            "Pie chart with {numPoints} {#plural(numPoints, slices, slice)}.",
          pieMultiple: "Pie chart with {numSeries} pies.",
          scatterSingle:
            "Scatter chart with {numPoints} {#plural(numPoints, points, point)}.",
          scatterMultiple: "Scatter chart with {numSeries} data series.",
          boxplotSingle:
            "Boxplot with {numPoints} {#plural(numPoints, boxes, box)}.",
          boxplotMultiple: "Boxplot with {numSeries} data series.",
          bubbleSingle:
            "Bubble chart with {numPoints} {#plural(numPoints, bubbles, bubble)}.",
          bubbleMultiple: "Bubble chart with {numSeries} data series.",
        },
        axis: {
          xAxisDescriptionSingular:
            "The chart has 1 X axis displaying {names[0]}. {ranges[0]}",
          xAxisDescriptionPlural:
            "The chart has {numAxes} X axes displaying {#each(names, -1) }and {names[-1]}.",
          yAxisDescriptionSingular:
            "The chart has 1 Y axis displaying {names[0]}. {ranges[0]}",
          yAxisDescriptionPlural:
            "The chart has {numAxes} Y axes displaying {#each(names, -1) }and {names[-1]}.",
          timeRangeDays: "Data range: {range} days.",
          timeRangeHours: "Data range: {range} hours.",
          timeRangeMinutes: "Data range: {range} minutes.",
          timeRangeSeconds: "Data range: {range} seconds.",
          rangeFromTo: "Data ranges from {rangeFrom} to {rangeTo}.",
          rangeCategories: "Data range: {numCategories} categories.",
        },
        exporting: {
          chartMenuLabel: "Chart menu",
          menuButtonLabel: "View chart menu, {chartTitle}",
        },
        series: {
          summary: {
            default:
              "{series.name}, series {seriesNumber} of {chart.series.length} with {series.points.length} data {#plural(series.points.length, points, point)}.",
            defaultCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length} with {series.points.length} data {#plural(series.points.length, points, point)}.",
            line: "{series.name}, line {seriesNumber} of {chart.series.length} with {series.points.length} data {#plural(series.points.length, points, point)}.",
            lineCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Line with {series.points.length} data {#plural(series.points.length, points, point)}.",
            spline:
              "{series.name}, line {seriesNumber} of {chart.series.length} with {series.points.length} data {#plural(series.points.length, points, point)}.",
            splineCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Line with {series.points.length} data {#plural(series.points.length, points, point)}.",
            column:
              "{series.name}, bar series {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, bars, bar)}.",
            columnCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Bar series with {series.points.length} {#plural(series.points.length, bars, bar)}.",
            bar: "{series.name}, bar series {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, bars, bar)}.",
            barCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Bar series with {series.points.length} {#plural(series.points.length, bars, bar)}.",
            pie: "{series.name}, pie {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, slices, slice)}.",
            pieCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Pie with {series.points.length} {#plural(series.points.length, slices, slice)}.",
            scatter:
              "{series.name}, scatter plot {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, points, point)}.",
            scatterCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}, scatter plot with {series.points.length} {#plural(series.points.length, points, point)}.",
            boxplot:
              "{series.name}, boxplot {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, boxes, box)}.",
            boxplotCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Boxplot with {series.points.length} {#plural(series.points.length, boxes, box)}.",
            bubble:
              "{series.name}, bubble series {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, bubbles, bubble)}.",
            bubbleCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Bubble series with {series.points.length} {#plural(series.points.length, bubbles, bubble)}.",
            map: "{series.name}, map {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, areas, area)}.",
            mapCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Map with {series.points.length} {#plural(series.points.length, areas, area)}.",
            mapline:
              "{series.name}, line {seriesNumber} of {chart.series.length} with {series.points.length} data {#plural(series.points.length, points, point)}.",
            maplineCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Line with {series.points.length} data {#plural(series.points.length, points, point)}.",
            mapbubble:
              "{series.name}, bubble series {seriesNumber} of {chart.series.length} with {series.points.length} {#plural(series.points.length, bubbles, bubble)}.",
            mapbubbleCombination:
              "{series.name}, series {seriesNumber} of {chart.series.length}. Bubble series with {series.points.length} {#plural(series.points.length, bubbles, bubble)}.",
          },
          description: "{description}",
          xAxisDescription: "X axis, {name}",
          yAxisDescription: "Y axis, {name}",
          nullPointValue: "No value",
          pointAnnotationsDescription: "{Annotation: #each(annotations). }",
        },
      },
    };
  });
  A(
    a,
    "Accessibility/Options/DeprecatedOptions.js",
    [a["Core/Utilities.js"]],
    function (a) {
      function h(a, h, l) {
        for (var f, d = 0; d < h.length - 1; ++d)
          (f = h[d]), (a = a[f] = z(a[f], {}));
        a[h[h.length - 1]] = l;
      }
      function l(a, k, l, f) {
        function d(a, b) {
          return b.reduce(function (a, b) {
            return a[b];
          }, a);
        }
        var b = d(a.options, k),
          c = d(a.options, l);
        Object.keys(f).forEach(function (d) {
          var e,
            g = b[d];
          "undefined" !== typeof g &&
            (h(c, f[d], g),
            A(
              32,
              !1,
              a,
              ((e = {}),
              (e[k.join(".") + "." + d] = l.join(".") + "." + f[d].join(".")),
              e),
            ));
        });
      }
      function u(a) {
        var g = a.options.chart,
          h = a.options.accessibility || {};
        ["description", "typeDescription"].forEach(function (f) {
          var d;
          g[f] &&
            ((h[f] = g[f]),
            A(
              32,
              !1,
              a,
              ((d = {}),
              (d["chart.".concat(f)] = "use accessibility.".concat(f)),
              d),
            ));
        });
      }
      function m(a) {
        a.axes.forEach(function (g) {
          (g = g.options) &&
            g.description &&
            ((g.accessibility = g.accessibility || {}),
            (g.accessibility.description = g.description),
            A(32, !1, a, {
              "axis.description": "use axis.accessibility.description",
            }));
        });
      }
      function p(a) {
        var g = {
          description: ["accessibility", "description"],
          exposeElementToA11y: ["accessibility", "exposeAsGroupOnly"],
          pointDescriptionFormatter: [
            "accessibility",
            "point",
            "descriptionFormatter",
          ],
          skipKeyboardNavigation: [
            "accessibility",
            "keyboardNavigation",
            "enabled",
          ],
          "accessibility.pointDescriptionFormatter": [
            "accessibility",
            "point",
            "descriptionFormatter",
          ],
        };
        a.series.forEach(function (k) {
          Object.keys(g).forEach(function (f) {
            var d,
              b = k.options[f];
            "accessibility.pointDescriptionFormatter" === f &&
              (b =
                k.options.accessibility &&
                k.options.accessibility.pointDescriptionFormatter);
            "undefined" !== typeof b &&
              (h(k.options, g[f], "skipKeyboardNavigation" === f ? !b : b),
              A(
                32,
                !1,
                a,
                ((d = {}),
                (d["series.".concat(f)] = "series." + g[f].join(".")),
                d),
              ));
          });
        });
      }
      var A = a.error,
        z = a.pick;
      return function (a) {
        u(a);
        m(a);
        a.series && p(a);
        l(a, ["accessibility"], ["accessibility"], {
          pointDateFormat: ["point", "dateFormat"],
          pointDateFormatter: ["point", "dateFormatter"],
          pointDescriptionFormatter: ["point", "descriptionFormatter"],
          pointDescriptionThreshold: [
            "series",
            "pointDescriptionEnabledThreshold",
          ],
          pointNavigationThreshold: [
            "keyboardNavigation",
            "seriesNavigation",
            "pointNavigationEnabledThreshold",
          ],
          pointValueDecimals: ["point", "valueDecimals"],
          pointValuePrefix: ["point", "valuePrefix"],
          pointValueSuffix: ["point", "valueSuffix"],
          screenReaderSectionFormatter: [
            "screenReaderSection",
            "beforeChartFormatter",
          ],
          describeSingleSeries: ["series", "describeSingleSeries"],
          seriesDescriptionFormatter: ["series", "descriptionFormatter"],
          onTableAnchorClick: ["screenReaderSection", "onViewDataTableClick"],
          axisRangeDateFormat: ["screenReaderSection", "axisRangeDateFormat"],
        });
        l(
          a,
          ["accessibility", "keyboardNavigation"],
          ["accessibility", "keyboardNavigation", "seriesNavigation"],
          { skipNullPoints: ["skipNullPoints"], mode: ["mode"] },
        );
        l(a, ["lang", "accessibility"], ["lang", "accessibility"], {
          legendItem: ["legend", "legendItem"],
          legendLabel: ["legend", "legendLabel"],
          mapZoomIn: ["zoom", "mapZoomIn"],
          mapZoomOut: ["zoom", "mapZoomOut"],
          resetZoomButton: ["zoom", "resetZoomButton"],
          screenReaderRegionLabel: ["screenReaderSection", "beforeRegionLabel"],
          rangeSelectorButton: ["rangeSelector", "buttonText"],
          rangeSelectorMaxInput: ["rangeSelector", "maxInputLabel"],
          rangeSelectorMinInput: ["rangeSelector", "minInputLabel"],
          svgContainerEnd: ["screenReaderSection", "endOfChartMarker"],
          viewAsDataTable: ["table", "viewAsDataTableButtonText"],
          tableSummary: ["table", "tableSummary"],
        });
      };
    },
  );
  A(
    a,
    "Accessibility/Accessibility.js",
    [
      a["Core/Defaults.js"],
      a["Core/Globals.js"],
      a["Core/Utilities.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Accessibility/A11yI18n.js"],
      a["Accessibility/Components/ContainerComponent.js"],
      a["Accessibility/FocusBorder.js"],
      a["Accessibility/Components/InfoRegionsComponent.js"],
      a["Accessibility/KeyboardNavigation.js"],
      a["Accessibility/Components/LegendComponent.js"],
      a["Accessibility/Components/MenuComponent.js"],
      a["Accessibility/Components/SeriesComponent/NewDataAnnouncer.js"],
      a["Accessibility/ProxyProvider.js"],
      a["Accessibility/Components/RangeSelectorComponent.js"],
      a["Accessibility/Components/SeriesComponent/SeriesComponent.js"],
      a["Accessibility/Components/ZoomComponent.js"],
      a["Accessibility/HighContrastMode.js"],
      a["Accessibility/HighContrastTheme.js"],
      a["Accessibility/Options/A11yDefaults.js"],
      a["Accessibility/Options/LangDefaults.js"],
      a["Accessibility/Options/DeprecatedOptions.js"],
    ],
    function (a, h, l, x, m, p, A, z, g, k, w, f, d, b, c, e, r, E, I, J, B) {
      a = a.defaultOptions;
      var u = h.doc,
        C = l.addEvent,
        v = l.extend,
        n = l.fireEvent,
        q = l.merge,
        D = x.removeElement;
      h = (function () {
        function a(a) {
          this.proxyProvider =
            this.keyboardNavigation =
            this.components =
            this.chart =
              void 0;
          this.init(a);
        }
        a.prototype.init = function (a) {
          this.chart = a;
          u.addEventListener && a.renderer.isSVG
            ? (B(a),
              (this.proxyProvider = new d(this.chart)),
              this.initComponents(),
              (this.keyboardNavigation = new g(a, this.components)))
            : ((this.zombie = !0),
              (this.components = {}),
              a.renderTo.setAttribute("aria-hidden", !0));
        };
        a.prototype.initComponents = function () {
          var a = this.chart,
            d = this.proxyProvider,
            f = a.options.accessibility;
          this.components = {
            container: new p(),
            infoRegions: new z(),
            legend: new k(),
            chartMenu: new w(),
            rangeSelector: new b(),
            series: new c(),
            zoom: new e(),
          };
          f.customComponents && v(this.components, f.customComponents);
          var g = this.components;
          this.getComponentOrder().forEach(function (b) {
            g[b].initBase(a, d);
            g[b].init();
          });
        };
        a.prototype.getComponentOrder = function () {
          if (!this.components) return [];
          if (!this.components.series) return Object.keys(this.components);
          var a = Object.keys(this.components).filter(function (a) {
            return "series" !== a;
          });
          return ["series"].concat(a);
        };
        a.prototype.update = function () {
          var a = this.components,
            b = this.chart,
            c = b.options.accessibility;
          n(b, "beforeA11yUpdate");
          b.types = this.getChartTypes();
          c = c.keyboardNavigation.order;
          this.proxyProvider.updateGroupOrder(c);
          this.getComponentOrder().forEach(function (c) {
            a[c].onChartUpdate();
            n(b, "afterA11yComponentUpdate", { name: c, component: a[c] });
          });
          this.keyboardNavigation.update(c);
          !b.highContrastModeActive &&
            r.isHighContrastModeActive() &&
            r.setHighContrastTheme(b);
          n(b, "afterA11yUpdate", { accessibility: this });
        };
        a.prototype.destroy = function () {
          var a = this.chart || {},
            b = this.components;
          Object.keys(b).forEach(function (a) {
            b[a].destroy();
            b[a].destroyBase();
          });
          this.proxyProvider && this.proxyProvider.destroy();
          a.announcerContainer && D(a.announcerContainer);
          this.keyboardNavigation && this.keyboardNavigation.destroy();
          a.renderTo && a.renderTo.setAttribute("aria-hidden", !0);
          a.focusElement && a.focusElement.removeFocusBorder();
        };
        a.prototype.getChartTypes = function () {
          var a = {};
          this.chart.series.forEach(function (b) {
            a[b.type] = 1;
          });
          return Object.keys(a);
        };
        return a;
      })();
      (function (a) {
        function d() {
          this.accessibility && this.accessibility.destroy();
        }
        function e() {
          this.a11yDirty &&
            this.renderTo &&
            (delete this.a11yDirty, this.updateA11yEnabled());
          var a = this.accessibility;
          a &&
            !a.zombie &&
            (a.proxyProvider.updateProxyElementPositions(),
            a.getComponentOrder().forEach(function (b) {
              a.components[b].onChartRender();
            }));
        }
        function h(a) {
          if ((a = a.options.accessibility))
            a.customComponents &&
              ((this.options.accessibility.customComponents =
                a.customComponents),
              delete a.customComponents),
              q(!0, this.options.accessibility, a),
              this.accessibility &&
                this.accessibility.destroy &&
                (this.accessibility.destroy(), delete this.accessibility);
          this.a11yDirty = !0;
        }
        function l() {
          var b = this.accessibility,
            c = this.options.accessibility;
          c && c.enabled
            ? b && !b.zombie
              ? b.update()
              : ((this.accessibility = b = new a(this)), !b.zombie) &&
                b.update()
            : b
              ? (b.destroy && b.destroy(), delete this.accessibility)
              : this.renderTo.setAttribute("aria-hidden", !0);
        }
        function n() {
          this.series.chart.accessibility && (this.series.chart.a11yDirty = !0);
        }
        var p = [];
        a.i18nFormat = m.i18nFormat;
        a.compose = function (a, q, r, u, t, v) {
          g.compose(a);
          f.compose(u);
          k.compose(a, q);
          w.compose(a);
          c.compose(a, r, u);
          m.compose(a);
          A.compose(a, t);
          v && b.compose(a, v);
          -1 === p.indexOf(a) &&
            (p.push(a),
            (a.prototype.updateA11yEnabled = l),
            C(a, "destroy", d),
            C(a, "render", e),
            C(a, "update", h),
            ["addSeries", "init"].forEach(function (b) {
              C(a, b, function () {
                this.a11yDirty = !0;
              });
            }),
            ["afterApplyDrilldown", "drillupall"].forEach(function (b) {
              C(a, b, function () {
                var a = this.accessibility;
                a && !a.zombie && a.update();
              });
            }));
          -1 === p.indexOf(r) && (p.push(r), C(r, "update", n));
          -1 === p.indexOf(u) &&
            (p.push(u),
            ["update", "updatedData", "remove"].forEach(function (a) {
              C(u, a, function () {
                this.chart.accessibility && (this.chart.a11yDirty = !0);
              });
            }));
        };
      })(h || (h = {}));
      q(!0, a, I, { accessibility: { highContrastTheme: E }, lang: J });
      return h;
    },
  );
  A(
    a,
    "masters/modules/accessibility.src.js",
    [
      a["Core/Globals.js"],
      a["Accessibility/Accessibility.js"],
      a["Accessibility/AccessibilityComponent.js"],
      a["Accessibility/Utils/ChartUtilities.js"],
      a["Accessibility/Utils/HTMLUtilities.js"],
      a["Accessibility/KeyboardNavigationHandler.js"],
      a["Accessibility/Components/SeriesComponent/SeriesDescriber.js"],
    ],
    function (a, h, l, x, m, p, A) {
      a.i18nFormat = h.i18nFormat;
      a.A11yChartUtilities = x;
      a.A11yHTMLUtilities = m;
      a.AccessibilityComponent = l;
      a.KeyboardNavigationHandler = p;
      a.SeriesAccessibilityDescriber = A;
      h.compose(
        a.Chart,
        a.Legend,
        a.Point,
        a.Series,
        a.SVGElement,
        a.RangeSelector,
      );
    },
  );
});
//# sourceMappingURL=accessibility.js.map
