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
      var i = (r[n] = { i: n, l: !1, exports: {} });
      return e[n].call(i.exports, i, i.exports, t), (i.l = !0), i.exports;
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
      t((t.s = 173))
    );
  })({
    0: function (t, r) {
      t.exports = e;
    },
    1: function (e, r) {
      e.exports = t;
    },
    173: function (e, t, r) {
      Object.defineProperty(t, "__esModule", { value: !0 }), r(174);
      var n = r(1);
      n.datepickerLocale("pl", "pl", {
        closeText: "Zamknij",
        prevText: "&#x3C;Poprzedni",
        nextText: "Następny&#x3E;",
        currentText: "Dziś",
        monthNames: [
          "Styczeń",
          "Luty",
          "Marzec",
          "Kwiecień",
          "Maj",
          "Czerwiec",
          "Lipiec",
          "Sierpień",
          "Wrzesień",
          "Październik",
          "Listopad",
          "Grudzień",
        ],
        monthNamesShort: [
          "Sty",
          "Lu",
          "Mar",
          "Kw",
          "Maj",
          "Cze",
          "Lip",
          "Sie",
          "Wrz",
          "Pa",
          "Lis",
          "Gru",
        ],
        dayNames: [
          "Niedziela",
          "Poniedziałek",
          "Wtorek",
          "Środa",
          "Czwartek",
          "Piątek",
          "Sobota",
        ],
        dayNamesShort: ["Nie", "Pn", "Wt", "Śr", "Czw", "Pt", "So"],
        dayNamesMin: ["N", "Pn", "Wt", "Śr", "Cz", "Pt", "So"],
        weekHeader: "Tydz",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: "",
      }),
        n.locale("pl", {
          buttonText: {
            month: "Miesiąc",
            week: "Tydzień",
            day: "Dzień",
            list: "Plan dnia",
          },
          allDayText: "Cały dzień",
          eventLimitText: "więcej",
          noEventsMessage: "Brak wydarzeń do wyświetlenia",
        });
    },
    174: function (e, t, r) {
      !(function (e, t) {
        t(r(0));
      })(0, function (e) {
        function t(e) {
          return e % 10 < 5 && e % 10 > 1 && ~~(e / 10) % 10 != 1;
        }
        function r(e, r, n) {
          var i = e + " ";
          switch (n) {
            case "ss":
              return i + (t(e) ? "sekundy" : "sekund");
            case "m":
              return r ? "minuta" : "minutę";
            case "mm":
              return i + (t(e) ? "minuty" : "minut");
            case "h":
              return r ? "godzina" : "godzinę";
            case "hh":
              return i + (t(e) ? "godziny" : "godzin");
            case "MM":
              return i + (t(e) ? "miesiące" : "miesięcy");
            case "yy":
              return i + (t(e) ? "lata" : "lat");
          }
        }
        var n =
            "styczeń_luty_marzec_kwiecień_maj_czerwiec_lipiec_sierpień_wrzesień_październik_listopad_grudzień".split(
              "_",
            ),
          i =
            "stycznia_lutego_marca_kwietnia_maja_czerwca_lipca_sierpnia_września_października_listopada_grudnia".split(
              "_",
            );
        return e.defineLocale("pl", {
          months: function (e, t) {
            return e
              ? "" === t
                ? "(" + i[e.month()] + "|" + n[e.month()] + ")"
                : /D MMMM/.test(t)
                  ? i[e.month()]
                  : n[e.month()]
              : n;
          },
          monthsShort: "sty_lut_mar_kwi_maj_cze_lip_sie_wrz_paź_lis_gru".split(
            "_",
          ),
          weekdays:
            "niedziela_poniedziałek_wtorek_środa_czwartek_piątek_sobota".split(
              "_",
            ),
          weekdaysShort: "ndz_pon_wt_śr_czw_pt_sob".split("_"),
          weekdaysMin: "Nd_Pn_Wt_Śr_Cz_Pt_So".split("_"),
          longDateFormat: {
            LT: "HH:mm",
            LTS: "HH:mm:ss",
            L: "DD.MM.YYYY",
            LL: "D MMMM YYYY",
            LLL: "D MMMM YYYY HH:mm",
            LLLL: "dddd, D MMMM YYYY HH:mm",
          },
          calendar: {
            sameDay: "[Dziś o] LT",
            nextDay: "[Jutro o] LT",
            nextWeek: function () {
              switch (this.day()) {
                case 0:
                  return "[W niedzielę o] LT";
                case 2:
                  return "[We wtorek o] LT";
                case 3:
                  return "[W środę o] LT";
                case 6:
                  return "[W sobotę o] LT";
                default:
                  return "[W] dddd [o] LT";
              }
            },
            lastDay: "[Wczoraj o] LT",
            lastWeek: function () {
              switch (this.day()) {
                case 0:
                  return "[W zeszłą niedzielę o] LT";
                case 3:
                  return "[W zeszłą środę o] LT";
                case 6:
                  return "[W zeszłą sobotę o] LT";
                default:
                  return "[W zeszły] dddd [o] LT";
              }
            },
            sameElse: "L",
          },
          relativeTime: {
            future: "za %s",
            past: "%s temu",
            s: "kilka sekund",
            ss: r,
            m: r,
            mm: r,
            h: r,
            hh: r,
            d: "1 dzień",
            dd: "%d dni",
            M: "miesiąc",
            MM: r,
            y: "rok",
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
