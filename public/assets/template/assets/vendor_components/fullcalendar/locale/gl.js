!(function (e, o) {
  "object" == typeof exports && "object" == typeof module
    ? (module.exports = o(require("moment"), require("fullcalendar")))
    : "function" == typeof define && define.amd
      ? define(["moment", "fullcalendar"], o)
      : "object" == typeof exports
        ? o(require("moment"), require("fullcalendar"))
        : o(e.moment, e.FullCalendar);
})("undefined" != typeof self ? self : this, function (e, o) {
  return (function (e) {
    function o(n) {
      if (t[n]) return t[n].exports;
      var r = (t[n] = { i: n, l: !1, exports: {} });
      return e[n].call(r.exports, r, r.exports, o), (r.l = !0), r.exports;
    }
    var t = {};
    return (
      (o.m = e),
      (o.c = t),
      (o.d = function (e, t, n) {
        o.o(e, t) ||
          Object.defineProperty(e, t, {
            configurable: !1,
            enumerable: !0,
            get: n,
          });
      }),
      (o.n = function (e) {
        var t =
          e && e.__esModule
            ? function () {
                return e.default;
              }
            : function () {
                return e;
              };
        return o.d(t, "a", t), t;
      }),
      (o.o = function (e, o) {
        return Object.prototype.hasOwnProperty.call(e, o);
      }),
      (o.p = ""),
      o((o.s = 129))
    );
  })({
    0: function (o, t) {
      o.exports = e;
    },
    1: function (e, t) {
      e.exports = o;
    },
    129: function (e, o, t) {
      Object.defineProperty(o, "__esModule", { value: !0 }), t(130);
      var n = t(1);
      n.datepickerLocale("gl", "gl", {
        closeText: "Pechar",
        prevText: "&#x3C;Ant",
        nextText: "Seg&#x3E;",
        currentText: "Hoxe",
        monthNames: [
          "Xaneiro",
          "Febreiro",
          "Marzo",
          "Abril",
          "Maio",
          "Xuño",
          "Xullo",
          "Agosto",
          "Setembro",
          "Outubro",
          "Novembro",
          "Decembro",
        ],
        monthNamesShort: [
          "Xan",
          "Feb",
          "Mar",
          "Abr",
          "Mai",
          "Xuñ",
          "Xul",
          "Ago",
          "Set",
          "Out",
          "Nov",
          "Dec",
        ],
        dayNames: [
          "Domingo",
          "Luns",
          "Martes",
          "Mércores",
          "Xoves",
          "Venres",
          "Sábado",
        ],
        dayNamesShort: ["Dom", "Lun", "Mar", "Mér", "Xov", "Ven", "Sáb"],
        dayNamesMin: ["Do", "Lu", "Ma", "Mé", "Xo", "Ve", "Sá"],
        weekHeader: "Sm",
        dateFormat: "dd/mm/yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: "",
      }),
        n.locale("gl", {
          buttonText: {
            month: "Mes",
            week: "Semana",
            day: "Día",
            list: "Axenda",
          },
          allDayHtml: "Todo<br/>o día",
          eventLimitText: "máis",
          noEventsMessage: "Non hai eventos para amosar",
        });
    },
    130: function (e, o, t) {
      !(function (e, o) {
        o(t(0));
      })(0, function (e) {
        return e.defineLocale("gl", {
          months:
            "xaneiro_febreiro_marzo_abril_maio_xuño_xullo_agosto_setembro_outubro_novembro_decembro".split(
              "_",
            ),
          monthsShort:
            "xan._feb._mar._abr._mai._xuñ._xul._ago._set._out._nov._dec.".split(
              "_",
            ),
          monthsParseExact: !0,
          weekdays: "domingo_luns_martes_mércores_xoves_venres_sábado".split(
            "_",
          ),
          weekdaysShort: "dom._lun._mar._mér._xov._ven._sáb.".split("_"),
          weekdaysMin: "do_lu_ma_mé_xo_ve_sá".split("_"),
          weekdaysParseExact: !0,
          longDateFormat: {
            LT: "H:mm",
            LTS: "H:mm:ss",
            L: "DD/MM/YYYY",
            LL: "D [de] MMMM [de] YYYY",
            LLL: "D [de] MMMM [de] YYYY H:mm",
            LLLL: "dddd, D [de] MMMM [de] YYYY H:mm",
          },
          calendar: {
            sameDay: function () {
              return "[hoxe " + (1 !== this.hours() ? "ás" : "á") + "] LT";
            },
            nextDay: function () {
              return "[mañá " + (1 !== this.hours() ? "ás" : "á") + "] LT";
            },
            nextWeek: function () {
              return "dddd [" + (1 !== this.hours() ? "ás" : "a") + "] LT";
            },
            lastDay: function () {
              return "[onte " + (1 !== this.hours() ? "á" : "a") + "] LT";
            },
            lastWeek: function () {
              return (
                "[o] dddd [pasado " + (1 !== this.hours() ? "ás" : "a") + "] LT"
              );
            },
            sameElse: "L",
          },
          relativeTime: {
            future: function (e) {
              return 0 === e.indexOf("un") ? "n" + e : "en " + e;
            },
            past: "hai %s",
            s: "uns segundos",
            ss: "%d segundos",
            m: "un minuto",
            mm: "%d minutos",
            h: "unha hora",
            hh: "%d horas",
            d: "un día",
            dd: "%d días",
            M: "un mes",
            MM: "%d meses",
            y: "un ano",
            yy: "%d anos",
          },
          dayOfMonthOrdinalParse: /\d{1,2}º/,
          ordinal: "%dº",
          week: { dow: 1, doy: 4 },
        });
      });
    },
  });
});
