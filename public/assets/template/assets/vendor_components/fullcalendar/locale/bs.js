!(function (e, a) {
  "object" == typeof exports && "object" == typeof module
    ? (module.exports = a(require("moment"), require("fullcalendar")))
    : "function" == typeof define && define.amd
      ? define(["moment", "fullcalendar"], a)
      : "object" == typeof exports
        ? a(require("moment"), require("fullcalendar"))
        : a(e.moment, e.FullCalendar);
})("undefined" != typeof self ? self : this, function (e, a) {
  return (function (e) {
    function a(r) {
      if (t[r]) return t[r].exports;
      var n = (t[r] = { i: r, l: !1, exports: {} });
      return e[r].call(n.exports, n, n.exports, a), (n.l = !0), n.exports;
    }
    var t = {};
    return (
      (a.m = e),
      (a.c = t),
      (a.d = function (e, t, r) {
        a.o(e, t) ||
          Object.defineProperty(e, t, {
            configurable: !1,
            enumerable: !0,
            get: r,
          });
      }),
      (a.n = function (e) {
        var t =
          e && e.__esModule
            ? function () {
                return e.default;
              }
            : function () {
                return e;
              };
        return a.d(t, "a", t), t;
      }),
      (a.o = function (e, a) {
        return Object.prototype.hasOwnProperty.call(e, a);
      }),
      (a.p = ""),
      a((a.s = 83))
    );
  })({
    0: function (a, t) {
      a.exports = e;
    },
    1: function (e, t) {
      e.exports = a;
    },
    83: function (e, a, t) {
      Object.defineProperty(a, "__esModule", { value: !0 }), t(84);
      var r = t(1);
      r.datepickerLocale("bs", "bs", {
        closeText: "Zatvori",
        prevText: "&#x3C;",
        nextText: "&#x3E;",
        currentText: "Danas",
        monthNames: [
          "Januar",
          "Februar",
          "Mart",
          "April",
          "Maj",
          "Juni",
          "Juli",
          "August",
          "Septembar",
          "Oktobar",
          "Novmbar",
          "Decembar",
        ],
        monthNamesShort: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "Maj",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Okt",
          "Nov",
          "Dec",
        ],
        dayNames: [
          "Nedjelja",
          "Ponedjeljak",
          "Utorak",
          "Srijeda",
          "Četvrtak",
          "Petak",
          "Subota",
        ],
        dayNamesShort: ["Ned", "Pon", "Uto", "Sri", "Čet", "Pet", "Sub"],
        dayNamesMin: ["Ne", "Po", "Ut", "Sr", "Če", "Pe", "Su"],
        weekHeader: "Sed",
        dateFormat: "dd.mm.yy.",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: "",
      }),
        r.locale("bs", {
          buttonText: {
            prev: "Prošli",
            next: "Sljedeći",
            month: "Mjesec",
            week: "Sedmica",
            day: "Dan",
            list: "Raspored",
          },
          allDayText: "Cijeli dan",
          eventLimitText: function (e) {
            return "+ još " + e;
          },
          noEventsMessage: "Nema događaja za prikazivanje",
        });
    },
    84: function (e, a, t) {
      !(function (e, a) {
        a(t(0));
      })(0, function (e) {
        function a(e, a, t) {
          var r = e + " ";
          switch (t) {
            case "ss":
              return (r +=
                1 === e
                  ? "sekunda"
                  : 2 === e || 3 === e || 4 === e
                    ? "sekunde"
                    : "sekundi");
            case "m":
              return a ? "jedna minuta" : "jedne minute";
            case "mm":
              return (r +=
                1 === e
                  ? "minuta"
                  : 2 === e || 3 === e || 4 === e
                    ? "minute"
                    : "minuta");
            case "h":
              return a ? "jedan sat" : "jednog sata";
            case "hh":
              return (r +=
                1 === e
                  ? "sat"
                  : 2 === e || 3 === e || 4 === e
                    ? "sata"
                    : "sati");
            case "dd":
              return (r += 1 === e ? "dan" : "dana");
            case "MM":
              return (r +=
                1 === e
                  ? "mjesec"
                  : 2 === e || 3 === e || 4 === e
                    ? "mjeseca"
                    : "mjeseci");
            case "yy":
              return (r +=
                1 === e
                  ? "godina"
                  : 2 === e || 3 === e || 4 === e
                    ? "godine"
                    : "godina");
          }
        }
        return e.defineLocale("bs", {
          months:
            "januar_februar_mart_april_maj_juni_juli_august_septembar_oktobar_novembar_decembar".split(
              "_",
            ),
          monthsShort:
            "jan._feb._mar._apr._maj._jun._jul._aug._sep._okt._nov._dec.".split(
              "_",
            ),
          monthsParseExact: !0,
          weekdays:
            "nedjelja_ponedjeljak_utorak_srijeda_četvrtak_petak_subota".split(
              "_",
            ),
          weekdaysShort: "ned._pon._uto._sri._čet._pet._sub.".split("_"),
          weekdaysMin: "ne_po_ut_sr_če_pe_su".split("_"),
          weekdaysParseExact: !0,
          longDateFormat: {
            LT: "H:mm",
            LTS: "H:mm:ss",
            L: "DD.MM.YYYY",
            LL: "D. MMMM YYYY",
            LLL: "D. MMMM YYYY H:mm",
            LLLL: "dddd, D. MMMM YYYY H:mm",
          },
          calendar: {
            sameDay: "[danas u] LT",
            nextDay: "[sutra u] LT",
            nextWeek: function () {
              switch (this.day()) {
                case 0:
                  return "[u] [nedjelju] [u] LT";
                case 3:
                  return "[u] [srijedu] [u] LT";
                case 6:
                  return "[u] [subotu] [u] LT";
                case 1:
                case 2:
                case 4:
                case 5:
                  return "[u] dddd [u] LT";
              }
            },
            lastDay: "[jučer u] LT",
            lastWeek: function () {
              switch (this.day()) {
                case 0:
                case 3:
                  return "[prošlu] dddd [u] LT";
                case 6:
                  return "[prošle] [subote] [u] LT";
                case 1:
                case 2:
                case 4:
                case 5:
                  return "[prošli] dddd [u] LT";
              }
            },
            sameElse: "L",
          },
          relativeTime: {
            future: "za %s",
            past: "prije %s",
            s: "par sekundi",
            ss: a,
            m: a,
            mm: a,
            h: a,
            hh: a,
            d: "dan",
            dd: a,
            M: "mjesec",
            MM: a,
            y: "godinu",
            yy: a,
          },
          dayOfMonthOrdinalParse: /\d{1,2}\./,
          ordinal: "%d.",
          week: { dow: 1, doy: 7 },
        });
      });
    },
  });
});
