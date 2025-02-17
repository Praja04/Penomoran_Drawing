!(function (e, t) {
  "object" == typeof exports && "object" == typeof module
    ? (module.exports = t(require("moment"), require("fullcalendar")))
    : "function" == typeof define && define.amd
      ? define(["moment", "fullcalendar"], t)
      : "object" == typeof exports
        ? t(require("moment"), require("fullcalendar"))
        : t(e.moment, e.FullCalendar);
})("undefined" != typeof self ? self : this, function (e, t) {
  return (function (e) {
    function t(n) {
      if (r[n]) return r[n].exports;
      var o = (r[n] = { i: n, l: !1, exports: {} });
      return e[n].call(o.exports, o, o.exports, t), (o.l = !0), o.exports;
    }
    var r = {};
    return (
      (t.m = e),
      (t.c = r),
      (t.d = function (e, r, n) {
        t.o(e, r) ||
          Object.defineProperty(e, r, {
            configurable: !1,
            enumerable: !0,
            get: n,
          });
      }),
      (t.n = function (e) {
        var r =
          e && e.__esModule
            ? function () {
                return e.default;
              }
            : function () {
                return e;
              };
        return t.d(r, "a", r), r;
      }),
      (t.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t);
      }),
      (t.p = ""),
      t((t.s = 183))
    );
  })({
    0: function (t, r) {
      t.exports = e;
    },
    1: function (e, r) {
      e.exports = t;
    },
    183: function (e, t, r) {
      Object.defineProperty(t, "__esModule", { value: !0 }), r(184);
      var n = r(1);
      n.datepickerLocale("sk", "sk", {
        closeText: "Zavrieť",
        prevText: "&#x3C;Predchádzajúci",
        nextText: "Nasledujúci&#x3E;",
        currentText: "Dnes",
        monthNames: [
          "január",
          "február",
          "marec",
          "apríl",
          "máj",
          "jún",
          "júl",
          "august",
          "september",
          "október",
          "november",
          "december",
        ],
        monthNamesShort: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "Máj",
          "Jún",
          "Júl",
          "Aug",
          "Sep",
          "Okt",
          "Nov",
          "Dec",
        ],
        dayNames: [
          "nedeľa",
          "pondelok",
          "utorok",
          "streda",
          "štvrtok",
          "piatok",
          "sobota",
        ],
        dayNamesShort: ["Ned", "Pon", "Uto", "Str", "Štv", "Pia", "Sob"],
        dayNamesMin: ["Ne", "Po", "Ut", "St", "Št", "Pia", "So"],
        weekHeader: "Ty",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: "",
      }),
        n.locale("sk", {
          buttonText: {
            month: "Mesiac",
            week: "Týždeň",
            day: "Deň",
            list: "Rozvrh",
          },
          allDayText: "Celý deň",
          eventLimitText: function (e) {
            return "+ďalšie: " + e;
          },
          noEventsMessage: "Žiadne akcie na zobrazenie",
        });
    },
    184: function (e, t, r) {
      !(function (e, t) {
        t(r(0));
      })(0, function (e) {
        function t(e) {
          return e > 1 && e < 5;
        }
        function r(e, r, n, o) {
          var a = e + " ";
          switch (n) {
            case "s":
              return r || o ? "pár sekúnd" : "pár sekundami";
            case "ss":
              return r || o
                ? a + (t(e) ? "sekundy" : "sekúnd")
                : a + "sekundami";
            case "m":
              return r ? "minúta" : o ? "minútu" : "minútou";
            case "mm":
              return r || o ? a + (t(e) ? "minúty" : "minút") : a + "minútami";
            case "h":
              return r ? "hodina" : o ? "hodinu" : "hodinou";
            case "hh":
              return r || o ? a + (t(e) ? "hodiny" : "hodín") : a + "hodinami";
            case "d":
              return r || o ? "deň" : "dňom";
            case "dd":
              return r || o ? a + (t(e) ? "dni" : "dní") : a + "dňami";
            case "M":
              return r || o ? "mesiac" : "mesiacom";
            case "MM":
              return r || o
                ? a + (t(e) ? "mesiace" : "mesiacov")
                : a + "mesiacmi";
            case "y":
              return r || o ? "rok" : "rokom";
            case "yy":
              return r || o ? a + (t(e) ? "roky" : "rokov") : a + "rokmi";
          }
        }
        var n =
            "január_február_marec_apríl_máj_jún_júl_august_september_október_november_december".split(
              "_",
            ),
          o = "jan_feb_mar_apr_máj_jún_júl_aug_sep_okt_nov_dec".split("_");
        return e.defineLocale("sk", {
          months: n,
          monthsShort: o,
          weekdays: "nedeľa_pondelok_utorok_streda_štvrtok_piatok_sobota".split(
            "_",
          ),
          weekdaysShort: "ne_po_ut_st_št_pi_so".split("_"),
          weekdaysMin: "ne_po_ut_st_št_pi_so".split("_"),
          longDateFormat: {
            LT: "H:mm",
            LTS: "H:mm:ss",
            L: "DD.MM.YYYY",
            LL: "D. MMMM YYYY",
            LLL: "D. MMMM YYYY H:mm",
            LLLL: "dddd D. MMMM YYYY H:mm",
          },
          calendar: {
            sameDay: "[dnes o] LT",
            nextDay: "[zajtra o] LT",
            nextWeek: function () {
              switch (this.day()) {
                case 0:
                  return "[v nedeľu o] LT";
                case 1:
                case 2:
                  return "[v] dddd [o] LT";
                case 3:
                  return "[v stredu o] LT";
                case 4:
                  return "[vo štvrtok o] LT";
                case 5:
                  return "[v piatok o] LT";
                case 6:
                  return "[v sobotu o] LT";
              }
            },
            lastDay: "[včera o] LT",
            lastWeek: function () {
              switch (this.day()) {
                case 0:
                  return "[minulú nedeľu o] LT";
                case 1:
                case 2:
                  return "[minulý] dddd [o] LT";
                case 3:
                  return "[minulú stredu o] LT";
                case 4:
                case 5:
                  return "[minulý] dddd [o] LT";
                case 6:
                  return "[minulú sobotu o] LT";
              }
            },
            sameElse: "L",
          },
          relativeTime: {
            future: "za %s",
            past: "pred %s",
            s: r,
            ss: r,
            m: r,
            mm: r,
            h: r,
            hh: r,
            d: r,
            dd: r,
            M: r,
            MM: r,
            y: r,
            yy: r,
          },
          dayOfMonthOrdinalParse: /\d{1,2}\./,
          ordinal: "%d.",
          week: { dow: 1, doy: 4 },
        });
      });
    },
  });
});
