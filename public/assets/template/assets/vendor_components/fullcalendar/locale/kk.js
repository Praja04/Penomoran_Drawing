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
    function t(r) {
      if (n[r]) return n[r].exports;
      var o = (n[r] = { i: r, l: !1, exports: {} });
      return e[r].call(o.exports, o, o.exports, t), (o.l = !0), o.exports;
    }
    var n = {};
    return (
      (t.m = e),
      (t.c = n),
      (t.d = function (e, n, r) {
        t.o(e, n) ||
          Object.defineProperty(e, n, {
            configurable: !1,
            enumerable: !0,
            get: r,
          });
      }),
      (t.n = function (e) {
        var n =
          e && e.__esModule
            ? function () {
                return e.default;
              }
            : function () {
                return e;
              };
        return t.d(n, "a", n), n;
      }),
      (t.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t);
      }),
      (t.p = ""),
      t((t.s = 149))
    );
  })({
    0: function (t, n) {
      t.exports = e;
    },
    1: function (e, n) {
      e.exports = t;
    },
    149: function (e, t, n) {
      Object.defineProperty(t, "__esModule", { value: !0 }), n(150);
      var r = n(1);
      r.datepickerLocale("kk", "kk", {
        closeText: "Жабу",
        prevText: "&#x3C;Алдыңғы",
        nextText: "Келесі&#x3E;",
        currentText: "Бүгін",
        monthNames: [
          "Қаңтар",
          "Ақпан",
          "Наурыз",
          "Сәуір",
          "Мамыр",
          "Маусым",
          "Шілде",
          "Тамыз",
          "Қыркүйек",
          "Қазан",
          "Қараша",
          "Желтоқсан",
        ],
        monthNamesShort: [
          "Қаң",
          "Ақп",
          "Нау",
          "Сәу",
          "Мам",
          "Мау",
          "Шіл",
          "Там",
          "Қыр",
          "Қаз",
          "Қар",
          "Жел",
        ],
        dayNames: [
          "Жексенбі",
          "Дүйсенбі",
          "Сейсенбі",
          "Сәрсенбі",
          "Бейсенбі",
          "Жұма",
          "Сенбі",
        ],
        dayNamesShort: ["жкс", "дсн", "ссн", "срс", "бсн", "жма", "снб"],
        dayNamesMin: ["Жк", "Дс", "Сс", "Ср", "Бс", "Жм", "Сн"],
        weekHeader: "Не",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: !1,
        showMonthAfterYear: !1,
        yearSuffix: "",
      }),
        r.locale("kk", {
          buttonText: {
            month: "Ай",
            week: "Апта",
            day: "Күн",
            list: "Күн тәртібі",
          },
          allDayText: "Күні бойы",
          eventLimitText: function (e) {
            return "+ тағы " + e;
          },
          noEventsMessage: "Көрсету үшін оқиғалар жоқ",
        });
    },
    150: function (e, t, n) {
      !(function (e, t) {
        t(n(0));
      })(0, function (e) {
        var t = {
          0: "-ші",
          1: "-ші",
          2: "-ші",
          3: "-ші",
          4: "-ші",
          5: "-ші",
          6: "-шы",
          7: "-ші",
          8: "-ші",
          9: "-шы",
          10: "-шы",
          20: "-шы",
          30: "-шы",
          40: "-шы",
          50: "-ші",
          60: "-шы",
          70: "-ші",
          80: "-ші",
          90: "-шы",
          100: "-ші",
        };
        return e.defineLocale("kk", {
          months:
            "қаңтар_ақпан_наурыз_сәуір_мамыр_маусым_шілде_тамыз_қыркүйек_қазан_қараша_желтоқсан".split(
              "_",
            ),
          monthsShort: "қаң_ақп_нау_сәу_мам_мау_шіл_там_қыр_қаз_қар_жел".split(
            "_",
          ),
          weekdays:
            "жексенбі_дүйсенбі_сейсенбі_сәрсенбі_бейсенбі_жұма_сенбі".split(
              "_",
            ),
          weekdaysShort: "жек_дүй_сей_сәр_бей_жұм_сен".split("_"),
          weekdaysMin: "жк_дй_сй_ср_бй_жм_сн".split("_"),
          longDateFormat: {
            LT: "HH:mm",
            LTS: "HH:mm:ss",
            L: "DD.MM.YYYY",
            LL: "D MMMM YYYY",
            LLL: "D MMMM YYYY HH:mm",
            LLLL: "dddd, D MMMM YYYY HH:mm",
          },
          calendar: {
            sameDay: "[Бүгін сағат] LT",
            nextDay: "[Ертең сағат] LT",
            nextWeek: "dddd [сағат] LT",
            lastDay: "[Кеше сағат] LT",
            lastWeek: "[Өткен аптаның] dddd [сағат] LT",
            sameElse: "L",
          },
          relativeTime: {
            future: "%s ішінде",
            past: "%s бұрын",
            s: "бірнеше секунд",
            ss: "%d секунд",
            m: "бір минут",
            mm: "%d минут",
            h: "бір сағат",
            hh: "%d сағат",
            d: "бір күн",
            dd: "%d күн",
            M: "бір ай",
            MM: "%d ай",
            y: "бір жыл",
            yy: "%d жыл",
          },
          dayOfMonthOrdinalParse: /\d{1,2}-(ші|шы)/,
          ordinal: function (e) {
            var n = e % 10,
              r = e >= 100 ? 100 : null;
            return e + (t[e] || t[n] || t[r]);
          },
          week: { dow: 1, doy: 7 },
        });
      });
    },
  });
});
