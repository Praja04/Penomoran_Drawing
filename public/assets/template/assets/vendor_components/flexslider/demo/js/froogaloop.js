var Froogaloop = (function () {
  function e(c) {
    return new e.fn.init(c);
  }
  function g(c, b, a) {
    if (!a.contentWindow.postMessage) return !1;
    var d = a.getAttribute("src").split("?")[0],
      c = JSON.stringify({ method: c, value: b });
    a.contentWindow.postMessage(c, d);
  }
  function i(c) {
    var b, a;
    try {
      (b = JSON.parse(c.data)), (a = b.event || b.method);
    } catch (l) {}
    "ready" == a && !h && (h = !0);
    if (c.origin != j) return !1;
    var c = b.value,
      e = b.data,
      f = "" === f ? null : b.player_id;
    b = f ? d[f][a] : d[a];
    a = [];
    if (!b) return !1;
    void 0 !== c && a.push(c);
    e && a.push(e);
    f && a.push(f);
    return 0 < a.length ? b.apply(null, a) : b.call();
  }
  function k(c, b, a) {
    a ? (d[a] || (d[a] = {}), (d[a][c] = b)) : (d[c] = b);
  }
  var d = {},
    h = !1,
    j = "";
  e.fn = e.prototype = {
    element: null,
    init: function (c) {
      "string" === typeof c && (c = document.getElementById(c));
      this.element = c;
      for (
        var c = this.element.getAttribute("src").split("/"),
          b = "",
          a = 0,
          d = c.length;
        a < d;
        a++
      ) {
        if (3 > a) b += c[a];
        else break;
        2 > a && (b += "/");
      }
      j = b;
      return this;
    },
    api: function (c, b) {
      if (!this.element || !c) return !1;
      var a = this.element,
        d = "" !== a.id ? a.id : null,
        e = !b || !b.constructor || !b.call || !b.apply ? b : null,
        f = b && b.constructor && b.call && b.apply ? b : null;
      f && k(c, f, d);
      g(c, e, a);
      return this;
    },
    addEvent: function (c, b) {
      if (!this.element) return !1;
      var a = this.element,
        d = "" !== a.id ? a.id : null;
      k(c, b, d);
      "ready" != c
        ? g("addEventListener", c, a)
        : "ready" == c && h && b.call(null, d);
      return this;
    },
    removeEvent: function (c) {
      if (!this.element) return !1;
      var b = this.element,
        a;
      a: {
        if ((a = "" !== b.id ? b.id : null) && d[a]) {
          if (!d[a][c]) {
            a = !1;
            break a;
          }
          d[a][c] = null;
        } else {
          if (!d[c]) {
            a = !1;
            break a;
          }
          d[c] = null;
        }
        a = !0;
      }
      "ready" != c && a && g("removeEventListener", c, b);
    },
  };
  e.fn.init.prototype = e.fn;
  window.addEventListener
    ? window.addEventListener("message", i, !1)
    : window.attachEvent("onmessage", i, !1);
  return (window.Froogaloop = window.$f = e);
})();
