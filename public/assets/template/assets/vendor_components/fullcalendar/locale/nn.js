!(function (e, n) {
  "object" == typeof exports && "object" == typeof module
    ? (module.exports = n(require("moment"), require("fullcalendar")))
    : "function" == typeof define && define.amd
      ? define(["moment", "fullcalendar"], n)
      : "object" == typeof exports
        ? n(require("moment"), require("fullcalendar"))
        : n(e.moment, e.FullCalendar);
})("undefined" != typeof self ? self : this, function (e, n) {
  return (function (e) {
    function n(a) {
      if (t[a]) return t[a].exports;
      var r = (t[a] = { i: a, l: !1, exports: {} });
      return e[a].call(r.exports, r, r.exports, n), (r.l = !0), r.exports;
    }
    var t = {};
    return (
      (n.m = e),
      (n.c = t),
      (n.d = function (e, t, a) {
        n.o(e, t) ||
          Object.defineProperty(e, t, {
            configurable: !1,
            enumerable: !0,
            get: a,
          });
      }),
      (n.n = function (e) {
        var t =
          e && e.__esModule
            ? function () {
                return e.default;
              }
            : function () {
                return e;
              };
        return n.d(t, "a", t), t;
      }),
      (n.o = function (e, n) {
        return Object.prototype.hasOwnProperty.call(e, n);
      }),
      (n.p = ""),
      n((n.s = 171))
    );
  })({
    0: function (n, t) {
      n.exports = e;
    },
    1: function (e, t) {
      e.exports = n;
    },
    171: function (e, n, t) {
      Object.defineProperty(n, "__esModule", { value: !0 }), t(172);
      var a = t(1);
      a.datepickerLocale("nn", "nn", {
        closeText: "Lukk",
        prevText: "&#xAB;Førre",
        nextText: "Neste&#xBB;",
        currentText: "I dag",
        monthNames: [
          "januar",
          "februar",
          "mars",
          "april",
          "mai",
          "juni",
          "juli",
          "august",
          "september",
          "oktober",
          "november",
          "desember",
        ],
        monthNamesShort: [
          "jan",
          "feb",
          "mar",
          "apr",
          "mai",
          "jun",
          "jul",
          "aug",
          "sep",
          "okt",
          "nov",
          "des",
        ],
        dayNamesShort: ["sun", "mån", "tys", "ons", "tor", "fre", "lau"],
        dayNames: [
          "sundag",
          "måndag",
          "tysdag",
          "onsdag",
          "torsdag",
          "fredag",
          "laurdag",
        ],
        dayNamesMin: ["su", "må", "ty", "on", "to", "fr", "la"],
        weekHeader: "Veke",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: "",
      }),
        a.locale("nn", {
          buttonText: {
            month: "Månad",
            week: "Veke",
            day: "Dag",
            list: "Agenda",
          },
          allDayText: "Heile dagen",
          eventLimitText: "til",
          noEventsMessage: "Ingen hendelser å vise",
        });
    },
    172: function (e, n, t) {
      !(function (e, n) {
        n(t(0));
      })(0, function (e) {
        return e.defineLocale("nn", {
          months:
            "januar_februar_mars_april_mai_juni_juli_august_september_oktober_november_desember".split(
              "_",
            ),
          monthsShort: "jan_feb_mar_apr_mai_jun_jul_aug_sep_okt_nov_des".split(
            "_",
          ),
          weekdays: "sundag_måndag_tysdag_onsdag_torsdag_fredag_laurdag".split(
            "_",
          ),
          weekdaysShort: "sun_mån_tys_ons_tor_fre_lau".split("_"),
          weekdaysMin: "su_må_ty_on_to_fr_lø".split("_"),
          longDateFormat: {
            LT: "HH:mm",
            LTS: "HH:mm:ss",
            L: "DD.MM.YYYY",
            LL: "D. MMMM YYYY",
            LLL: "D. MMMM YYYY [kl.] H:mm",
            LLLL: "dddd D. MMMM YYYY [kl.] HH:mm",
          },
          calendar: {
            sameDay: "[I dag klokka] LT",
            nextDay: "[I morgon klokka] LT",
            nextWeek: "dddd [klokka] LT",
            lastDay: "[I går klokka] LT",
            lastWeek: "[Føregåande] dddd [klokka] LT",
            sameElse: "L",
          },
          relativeTime: {
            future: "om %s",
            past: "%s sidan",
            s: "nokre sekund",
            ss: "%d sekund",
            m: "eit minutt",
            mm: "%d minutt",
            h: "ein time",
            hh: "%d timar",
            d: "ein dag",
            dd: "%d dagar",
            M: "ein månad",
            MM: "%d månader",
            y: "eit år",
            yy: "%d år",
          },
          dayOfMonthOrdinalParse: /\d{1,2}\./,
          ordinal: "%d.",
          week: { dow: 1, doy: 4 },
        });
      });
    },
  });
});
