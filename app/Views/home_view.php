<!doctype html>
<html lang="en">

<head>
    <script id="debugbar_loader" data-time="1679696197.547842" src="http://localhost:8080/index.php?debugbar"></script>
    <script id="debugbar_dynamic_script"></script>
    <style id="debugbar_dynamic_style"></style>
    <script class="kint-rich-script">
        void 0 === window.kintShared && (window.kintShared = function() {
            "use strict";
            var e = {
                dedupe: function(e, n) {
                    return [].forEach.call(document.querySelectorAll(e), function(e) {
                        e !== (n = n && n.ownerDocument.contains(n) ? n : e) && e.parentNode.removeChild(e)
                    }), n
                },
                runOnce: function(e) {
                    "complete" === document.readyState ? e() : window.addEventListener("load", e)
                }
            };
            return window.addEventListener("click", function(e) {
                var n;
                e.target.classList.contains("kint-ide-link") && ((n = new XMLHttpRequest).open("GET", e.target.href), n.send(null), e.preventDefault())
            }), e
        }());
        void 0 === window.kintRich && (window.kintRich = function() {
            "use strict";
            var l = {
                selectText: function(e) {
                    var t = window.getSelection(),
                        a = document.createRange();
                    a.selectNodeContents(e), t.removeAllRanges(), t.addRange(a)
                },
                toggle: function(e, t) {
                    var a = l.getChildren(e);
                    a && (e.classList.toggle("kint-show", t), 1 === a.childNodes.length) && (a = a.childNodes[0].childNodes[0]) && a.classList && a.classList.contains("kint-parent") && l.toggle(a, t)
                },
                toggleChildren: function(e, t) {
                    var a = l.getChildren(e);
                    if (a) {
                        var o = a.getElementsByClassName("kint-parent"),
                            s = o.length;
                        for (void 0 === t && (t = e.classList.contains("kint-show")); s--;) l.toggle(o[s], t)
                    }
                },
                switchTab: function(e) {
                    var t = e.previousSibling,
                        a = 0;
                    for (e.parentNode.getElementsByClassName("kint-active-tab")[0].classList.remove("kint-active-tab"), e.classList.add("kint-active-tab"); t;) 1 === t.nodeType && a++, t = t.previousSibling;
                    for (var o = e.parentNode.nextSibling.childNodes, s = 0; s < o.length; s++) s === a ? (o[s].classList.add("kint-show"), 1 === o[s].childNodes.length && (t = o[s].childNodes[0].childNodes[0]) && t.classList && t.classList.contains("kint-parent") && l.toggle(t, !0)) : o[s].classList.remove("kint-show")
                },
                mktag: function(e) {
                    return "<" + e + ">"
                },
                openInNewWindow: function(e) {
                    var t = window.open();
                    t && (t.document.open(), t.document.write(l.mktag("html") + l.mktag("head") + l.mktag("title") + "Kint (" + (new Date).toISOString() + ")" + l.mktag("/title") + l.mktag('meta charset="utf-8"') + l.mktag('script class="kint-rich-script" nonce="' + l.script.nonce + '"') + l.script.innerHTML + l.mktag("/script") + l.mktag('style class="kint-rich-style" nonce="' + l.style.nonce + '"') + l.style.innerHTML + l.mktag("/style") + l.mktag("/head") + l.mktag("body") + '<input class="kint-note-input" placeholder="Take some notes!"><div class="kint-rich">' + e.parentNode.outerHTML + "</div>" + l.mktag("/body")), t.document.close())
                },
                sortTable: function(e, a) {
                    var t = e.tBodies[0];
                    [].slice.call(e.tBodies[0].rows).sort(function(e, t) {
                        if (e = e.cells[a].textContent.trim().toLocaleLowerCase(), t = t.cells[a].textContent.trim().toLocaleLowerCase(), isNaN(e) || isNaN(t)) {
                            if (isNaN(e) && !isNaN(t)) return 1;
                            if (isNaN(t) && !isNaN(e)) return -1
                        } else e = parseFloat(e), t = parseFloat(t);
                        return e < t ? -1 : t < e ? 1 : 0
                    }).forEach(function(e) {
                        t.appendChild(e)
                    })
                },
                showAccessPath: function(e) {
                    for (var t = e.childNodes, a = 0; a < t.length; a++)
                        if (t[a].classList && t[a].classList.contains("access-path")) return t[a].classList.toggle("kint-show"), void(t[a].classList.contains("kint-show") && l.selectText(t[a]))
                },
                showSearchBox: function(e) {
                    var t = e.querySelector(".kint-search");
                    t && (t.classList.toggle("kint-show"), t.classList.contains("kint-show") ? (e.classList.add("kint-show"), t.focus(), t.select(), l.search(e.parentNode, t.value)) : e.parentNode.classList.remove("kint-search-root"))
                },
                search: function(e, t) {
                    e.querySelectorAll(".kint-search-match").forEach(function(e) {
                        e.classList.remove("kint-search-match")
                    }), e.classList.remove("kint-search-match"), e.classList.toggle("kint-search-root", t.length), t.length && l.findMatches(e, t)
                },
                findMatches: function(e, t) {
                    var a, o, s, n = e.cloneNode(!0);
                    if (n.querySelectorAll(".access-path").forEach(function(e) {
                            e.remove()
                        }), -1 != n.textContent.toUpperCase().indexOf(t.toUpperCase())) {
                        for (r in e.classList.add("kint-search-match"), e.childNodes)
                            if ("DD" == e.childNodes[r].tagName) {
                                a = e.childNodes[r];
                                break
                            } if (a)
                            if ([].forEach.call(a.childNodes, function(e) {
                                    "DL" == e.tagName ? l.findMatches(e, t) : "UL" == e.tagName && (e.classList.contains("kint-tabs") ? o = e.childNodes : e.classList.contains("kint-tab-contents") && (s = e.childNodes))
                                }), o && s && o.length == s.length)
                                for (var r = 0; r < o.length; r++) {
                                    var i = !1;
                                    (i = -1 != o[r].textContent.toUpperCase().indexOf(t.toUpperCase()) || ((n = s[r].cloneNode(!0)).querySelectorAll(".access-path").forEach(function(e) {
                                        e.remove()
                                    }), -1 != n.textContent.toUpperCase().indexOf(t.toUpperCase())) ? !0 : i) && (o[r].classList.add("kint-search-match"), [].forEach.call(s[r].childNodes, function(e) {
                                        "DL" == e.tagName && l.findMatches(e, t)
                                    }))
                                }
                    }
                },
                getParentByClass: function(e, t) {
                    for (;
                        (e = e.parentNode) && e.classList && !e.classList.contains(t););
                    return e
                },
                getParentHeader: function(e, t) {
                    for (var a = e.nodeName.toLowerCase();
                        "dd" !== a && "dt" !== a && l.getParentByClass(e, "kint-rich");) a = (e = e.parentNode).nodeName.toLowerCase();
                    return l.getParentByClass(e, "kint-rich") ? (e = "dd" === a && t ? e.previousElementSibling : e) && "dt" === e.nodeName.toLowerCase() && e.classList.contains("kint-parent") ? e : void 0 : null
                },
                getChildren: function(e) {
                    for (;
                        (e = e.nextElementSibling) && "dd" !== e.nodeName.toLowerCase(););
                    return e
                },
                isFolderOpen: function() {
                    if (l.folder && l.folder.querySelector("dd.kint-foldout")) return l.folder.querySelector("dd.kint-foldout").previousSibling.classList.contains("kint-show")
                },
                initLoad: function() {
                    l.style = window.kintShared.dedupe("style.kint-rich-style", l.style), l.script = window.kintShared.dedupe("script.kint-rich-script", l.script), l.folder = window.kintShared.dedupe(".kint-rich.kint-folder", l.folder);
                    var t, e = document.querySelectorAll("input.kint-search");
                    [].forEach.call(e, function(t) {
                        function e(e) {
                            window.clearTimeout(a), t.value !== o && (a = window.setTimeout(function() {
                                o = t.value, l.search(t.parentNode.parentNode, o)
                            }, 500))
                        }
                        var a = null,
                            o = null;
                        t.removeEventListener("keyup", e), t.addEventListener("keyup", e)
                    }), l.folder && (t = l.folder.querySelector("dd"), [].forEach.call(document.querySelectorAll(".kint-rich.kint-file"), function(e) {
                        e.parentNode !== l.folder && t.appendChild(e)
                    }), document.body.appendChild(l.folder), l.folder.classList.add("kint-show"))
                },
                keyboardNav: {
                    targets: [],
                    target: 0,
                    active: !1,
                    fetchTargets: function() {
                        var e = l.keyboardNav.targets[l.keyboardNav.target];
                        l.keyboardNav.targets = [], document.querySelectorAll(".kint-rich nav, .kint-tabs>li:not(.kint-active-tab)").forEach(function(e) {
                            l.isFolderOpen() && !l.folder.contains(e) || 0 === e.offsetWidth && 0 === e.offsetHeight || l.keyboardNav.targets.push(e)
                        }), e && -1 !== l.keyboardNav.targets.indexOf(e) && (l.keyboardNav.target = l.keyboardNav.targets.indexOf(e))
                    },
                    sync: function(e) {
                        var t = document.querySelector(".kint-focused");
                        t && t.classList.remove("kint-focused"), l.keyboardNav.active && ((t = l.keyboardNav.targets[l.keyboardNav.target]).classList.add("kint-focused"), e || l.keyboardNav.scroll(t))
                    },
                    scroll: function(e) {
                        var t, a;
                        e !== l.folder.querySelector("dt > nav") && (e = (t = function(e) {
                            return e.offsetTop + (e.offsetParent ? t(e.offsetParent) : 0)
                        })(e), l.isFolderOpen() ? (a = l.folder.querySelector("dd.kint-foldout")).scrollTo(0, e - a.clientHeight / 2) : window.scrollTo(0, e - window.innerHeight / 2))
                    },
                    moveCursor: function(e) {
                        for (l.keyboardNav.target += e; l.keyboardNav.target < 0;) l.keyboardNav.target += l.keyboardNav.targets.length;
                        for (; l.keyboardNav.target >= l.keyboardNav.targets.length;) l.keyboardNav.target -= l.keyboardNav.targets.length;
                        l.keyboardNav.sync()
                    },
                    setCursor: function(e) {
                        if (!l.isFolderOpen() || l.folder.contains(e)) {
                            l.keyboardNav.fetchTargets();
                            for (var t = 0; t < l.keyboardNav.targets.length; t++)
                                if (e === l.keyboardNav.targets[t]) return l.keyboardNav.target = t, !0
                        }
                        return !1
                    }
                },
                mouseNav: {
                    lastClickTarget: null,
                    lastClickTimer: null,
                    lastClickCount: 0,
                    renewLastClick: function() {
                        window.clearTimeout(l.mouseNav.lastClickTimer), l.mouseNav.lastClickTimer = window.setTimeout(function() {
                            l.mouseNav.lastClickTarget = null, l.mouseNav.lastClickTimer = null, l.mouseNav.lastClickCount = 0
                        }, 250)
                    }
                },
                style: null,
                script: null,
                folder: null
            };
            return window.addEventListener("click", function(e) {
                var t = e.target;
                if (l.mouseNav.lastClickTarget && l.mouseNav.lastClickTimer && l.mouseNav.lastClickCount)
                    if (t = l.mouseNav.lastClickTarget, 1 === l.mouseNav.lastClickCount) l.toggleChildren(t.parentNode), l.keyboardNav.setCursor(t), l.keyboardNav.sync(!0), l.mouseNav.lastClickCount++, l.mouseNav.renewLastClick();
                    else {
                        for (var a = t.parentNode.classList.contains("kint-show"), o = document.getElementsByClassName("kint-parent"), s = o.length; s--;) l.toggle(o[s], a);
                        l.keyboardNav.setCursor(t), l.keyboardNav.sync(!0), l.keyboardNav.scroll(t), window.clearTimeout(l.mouseNav.lastClickTimer), l.mouseNav.lastClickTarget = null, l.mouseNav.lastClickTarget = null, l.mouseNav.lastClickCount = 0
                    }
                else if (l.getParentByClass(t, "kint-rich")) {
                    var n = t.nodeName.toLowerCase();
                    if ("dfn" === n && l.selectText(t), "th" === n) e.ctrlKey || l.sortTable(t.parentNode.parentNode.parentNode, t.cellIndex);
                    else if ((t = l.getParentHeader(t)) && (l.keyboardNav.setCursor(t.querySelector("nav")), l.keyboardNav.sync(!0)), t = e.target, "li" === n && "kint-tabs" === t.parentNode.className) "kint-active-tab" !== t.className && l.switchTab(t), (t = l.getParentHeader(t, !0)) && (l.keyboardNav.setCursor(t.querySelector("nav")), l.keyboardNav.sync(!0));
                    else if ("nav" === n) "footer" === t.parentNode.nodeName.toLowerCase() ? (l.keyboardNav.setCursor(t), l.keyboardNav.sync(!0), (t = t.parentNode).classList.toggle("kint-show")) : (l.toggle(t.parentNode), l.keyboardNav.fetchTargets(), l.mouseNav.lastClickCount = 1, l.mouseNav.lastClickTarget = t, l.mouseNav.renewLastClick());
                    else if (t.classList.contains("kint-popup-trigger")) {
                        var r = t.parentNode;
                        if ("footer" === r.nodeName.toLowerCase()) r = r.previousSibling;
                        else
                            for (; r && !r.classList.contains("kint-parent");) r = r.parentNode;
                        l.openInNewWindow(r)
                    } else t.classList.contains("kint-access-path-trigger") ? l.showAccessPath(t.parentNode) : t.classList.contains("kint-search-trigger") ? l.showSearchBox(t.parentNode) : t.classList.contains("kint-search") || ("pre" === n && 3 === e.detail ? l.selectText(t) : l.getParentByClass(t, "kint-source") && 3 === e.detail ? l.selectText(l.getParentByClass(t, "kint-source")) : t.classList.contains("access-path") ? l.selectText(t) : "a" !== n && (t = l.getParentHeader(t)) && (l.toggle(t), l.keyboardNav.fetchTargets()))
                }
            }, !0), window.addEventListener("keydown", function(e) {
                if (e.target === document.body && !e.altKey && !e.ctrlKey)
                    if (68 === e.keyCode) {
                        if (l.keyboardNav.active) l.keyboardNav.active = !1;
                        else if (l.keyboardNav.active = !0, l.keyboardNav.fetchTargets(), 0 === l.keyboardNav.targets.length) return void(l.keyboardNav.active = !1);
                        l.keyboardNav.sync(), e.preventDefault()
                    } else if (l.keyboardNav.active)
                    if (9 === e.keyCode) l.keyboardNav.moveCursor(e.shiftKey ? -1 : 1), e.preventDefault();
                    else if (38 === e.keyCode || 75 === e.keyCode) l.keyboardNav.moveCursor(-1), e.preventDefault();
                else if (40 === e.keyCode || 74 === e.keyCode) l.keyboardNav.moveCursor(1), e.preventDefault();
                else {
                    var t, a, o = l.keyboardNav.targets[l.keyboardNav.target];
                    if ("li" === o.nodeName.toLowerCase()) {
                        if (32 === e.keyCode || 13 === e.keyCode) return l.switchTab(o), l.keyboardNav.fetchTargets(), l.keyboardNav.sync(), void e.preventDefault();
                        if (39 === e.keyCode || 76 === e.keyCode) return l.keyboardNav.moveCursor(1), void e.preventDefault();
                        if (37 === e.keyCode || 72 === e.keyCode) return l.keyboardNav.moveCursor(-1), void e.preventDefault()
                    }
                    o = o.parentNode, 65 === e.keyCode ? (l.showAccessPath(o), e.preventDefault()) : "footer" === o.nodeName.toLowerCase() && o.parentNode.classList.contains("kint-rich") ? 32 === e.keyCode || 13 === e.keyCode ? (o.classList.toggle("kint-show"), e.preventDefault()) : 37 === e.keyCode || 72 === e.keyCode ? (o.classList.remove("kint-show"), e.preventDefault()) : 39 !== e.keyCode && 76 !== e.keyCode || (o.classList.add("kint-show"), e.preventDefault()) : 32 === e.keyCode || 13 === e.keyCode ? (l.toggle(o), l.keyboardNav.fetchTargets(), e.preventDefault()) : 39 !== e.keyCode && 76 !== e.keyCode && 37 !== e.keyCode && 72 !== e.keyCode || (t = 39 === e.keyCode || 76 === e.keyCode, o.classList.contains("kint-show") ? l.toggleChildren(o, t) : t || (a = l.getParentHeader(o.parentNode.parentNode, !0)) && (l.keyboardNav.setCursor((o = a).querySelector("nav")), l.keyboardNav.sync()), l.toggle(o, t), l.keyboardNav.fetchTargets(), e.preventDefault())
                }
            }, !0), l
        }()), window.kintShared.runOnce(window.kintRich.initLoad);
        void 0 === window.kintMicrotimeInitialized && (window.kintMicrotimeInitialized = 1, window.addEventListener("load", function() {
            "use strict";
            var a = {},
                t = Array.prototype.slice.call(document.querySelectorAll("[data-kint-microtime-group]"), 0);
            t.forEach(function(t) {
                var i, e;
                t.querySelector(".kint-microtime-lap") && (i = t.getAttribute("data-kint-microtime-group"), e = parseFloat(t.querySelector(".kint-microtime-lap").innerHTML), t = parseFloat(t.querySelector(".kint-microtime-avg").innerHTML), void 0 === a[i] && (a[i] = {}), (void 0 === a[i].min || a[i].min > e) && (a[i].min = e), (void 0 === a[i].max || a[i].max < e) && (a[i].max = e), a[i].avg = t)
            }), t.forEach(function(t) {
                var i, e, r, o, n = t.querySelector(".kint-microtime-lap");
                null !== n && (i = parseFloat(n.textContent), o = t.dataset.kintMicrotimeGroup, e = a[o].avg, r = a[o].max, o = a[o].min, i !== (t.querySelector(".kint-microtime-avg").textContent = e) || i !== o || i !== r) && (n.style.background = e < i ? "hsl(" + (40 - 40 * ((i - e) / (r - e))) + ", 100%, 65%)" : "hsl(" + (40 + 80 * (e === o ? 0 : (e - i) / (e - o))) + ", 100%, 65%)")
            })
        }));
    </script>
    <style class="kint-rich-style">
        .kint-rich {
            font-size: 13px;
            overflow-x: auto;
            white-space: nowrap;
            background: rgba(255, 255, 255, 0.9)
        }

        .kint-rich.kint-folder {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 999999;
            width: 100%;
            margin: 0;
            display: block
        }

        .kint-rich.kint-folder dd.kint-foldout {
            max-height: calc(100vh - 100px);
            padding-right: 8px;
            overflow-y: scroll;
            display: none
        }

        .kint-rich.kint-folder dd.kint-foldout.kint-show {
            display: block
        }

        .kint-rich::selection,
        .kint-rich::-moz-selection,
        .kint-rich::-webkit-selection {
            background: #aaa;
            color: #1d1e1e
        }

        .kint-rich .kint-focused {
            box-shadow: 0 0 3px 2px red
        }

        .kint-rich,
        .kint-rich::before,
        .kint-rich::after,
        .kint-rich *,
        .kint-rich *::before,
        .kint-rich *::after {
            box-sizing: border-box;
            border-radius: 0;
            color: #1d1e1e;
            float: none !important;
            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
            line-height: 15px;
            margin: 0;
            padding: 0;
            text-align: left
        }

        .kint-rich {
            margin: 8px 0
        }

        .kint-rich dt,
        .kint-rich dl {
            width: auto
        }

        .kint-rich dt,
        .kint-rich div.access-path {
            background: #f8f8f8;
            border: 1px solid #d7d7d7;
            color: #1d1e1e;
            display: block;
            font-weight: bold;
            list-style: none outside none;
            overflow: auto;
            padding: 4px
        }

        .kint-rich dt:hover,
        .kint-rich div.access-path:hover {
            border-color: #aaa
        }

        .kint-rich>dl dl {
            padding: 0 0 0 12px
        }

        .kint-rich dt.kint-parent>nav,
        .kint-rich>footer>nav {
            background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMCAxNTAiPjxwYXRoIGQ9Ik02IDdoMThsLTkgMTV6bTAgMzBoMThsLTkgMTV6bTAgNDVoMThsLTktMTV6bTAgMzBoMThsLTktMTV6bTAgMTJsMTggMThtLTE4IDBsMTgtMTgiIGZpbGw9IiM1NTUiLz48cGF0aCBkPSJNNiAxMjZsMTggMThtLTE4IDBsMTgtMTgiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlPSIjNTU1Ii8+PC9zdmc+") no-repeat scroll 0 0/15px 75px transparent;
            cursor: pointer;
            display: inline-block;
            height: 15px;
            width: 15px;
            margin-right: 3px;
            vertical-align: middle
        }

        .kint-rich dt.kint-parent:hover>nav,
        .kint-rich>footer>nav:hover {
            background-position: 0 25%
        }

        .kint-rich dt.kint-parent.kint-show>nav,
        .kint-rich>footer.kint-show>nav {
            background-position: 0 50%
        }

        .kint-rich dt.kint-parent.kint-show:hover>nav,
        .kint-rich>footer.kint-show>nav:hover {
            background-position: 0 75%
        }

        .kint-rich dt.kint-parent.kint-locked>nav {
            background-position: 0 100%
        }

        .kint-rich dt.kint-parent+dd {
            display: none;
            border-left: 1px dashed #d7d7d7
        }

        .kint-rich dt.kint-parent.kint-show+dd {
            display: block
        }

        .kint-rich var,
        .kint-rich var a {
            color: #06f;
            font-style: normal
        }

        .kint-rich dt:hover var,
        .kint-rich dt:hover var a {
            color: red
        }

        .kint-rich dfn {
            font-style: normal;
            font-family: monospace;
            color: #1d1e1e
        }

        .kint-rich pre {
            color: #1d1e1e;
            margin: 0 0 0 12px;
            padding: 5px;
            overflow-y: hidden;
            border-top: 0;
            border: 1px solid #d7d7d7;
            background: #f8f8f8;
            display: block;
            word-break: normal
        }

        .kint-rich .kint-popup-trigger,
        .kint-rich .kint-access-path-trigger,
        .kint-rich .kint-search-trigger {
            background: rgba(29, 30, 30, 0.8);
            border-radius: 3px;
            height: 16px;
            font-size: 16px;
            margin-left: 5px;
            font-weight: bold;
            width: 16px;
            text-align: center;
            float: right !important;
            cursor: pointer;
            color: #f8f8f8;
            position: relative;
            overflow: hidden;
            line-height: 17.6px
        }

        .kint-rich .kint-popup-trigger:hover,
        .kint-rich .kint-access-path-trigger:hover,
        .kint-rich .kint-search-trigger:hover {
            color: #1d1e1e;
            background: #f8f8f8
        }

        .kint-rich dt.kint-parent>.kint-popup-trigger {
            line-height: 19.2px
        }

        .kint-rich .kint-search-trigger {
            font-size: 20px
        }

        .kint-rich input.kint-search {
            display: none;
            border: 1px solid #d7d7d7;
            border-top-width: 0;
            border-bottom-width: 0;
            padding: 4px;
            float: right !important;
            margin: -4px 0;
            color: #1d1e1e;
            background: #f8f8f8;
            height: 24px;
            width: 160px;
            position: relative;
            z-index: 100
        }

        .kint-rich input.kint-search.kint-show {
            display: block
        }

        .kint-rich .kint-search-root ul.kint-tabs>li:not(.kint-search-match) {
            background: #f8f8f8;
            opacity: 0.5
        }

        .kint-rich .kint-search-root dl:not(.kint-search-match) {
            opacity: 0.5
        }

        .kint-rich .kint-search-root dl:not(.kint-search-match)>dt {
            background: #f8f8f8
        }

        .kint-rich .kint-search-root dl:not(.kint-search-match) dl,
        .kint-rich .kint-search-root dl:not(.kint-search-match) ul.kint-tabs>li:not(.kint-search-match) {
            opacity: 1
        }

        .kint-rich div.access-path {
            background: #f8f8f8;
            display: none;
            margin-top: 5px;
            padding: 4px;
            white-space: pre
        }

        .kint-rich div.access-path.kint-show {
            display: block
        }

        .kint-rich footer {
            padding: 0 3px 3px;
            font-size: 9px;
            background: transparent
        }

        .kint-rich footer>.kint-popup-trigger {
            background: transparent;
            color: #1d1e1e
        }

        .kint-rich footer nav {
            height: 10px;
            width: 10px;
            background-size: 10px 50px
        }

        .kint-rich footer>ol {
            display: none;
            margin-left: 32px
        }

        .kint-rich footer.kint-show>ol {
            display: block
        }

        .kint-rich a {
            color: #1d1e1e;
            text-shadow: none;
            text-decoration: underline
        }

        .kint-rich a:hover {
            color: #1d1e1e;
            border-bottom: 1px dotted #1d1e1e
        }

        .kint-rich ul {
            list-style: none;
            padding-left: 12px
        }

        .kint-rich ul:not(.kint-tabs) li {
            border-left: 1px dashed #d7d7d7
        }

        .kint-rich ul:not(.kint-tabs) li>dl {
            border-left: none
        }

        .kint-rich ul.kint-tabs {
            margin: 0 0 0 12px;
            padding-left: 0;
            background: #f8f8f8;
            border: 1px solid #d7d7d7;
            border-top: 0
        }

        .kint-rich ul.kint-tabs>li {
            background: #f8f8f8;
            border: 1px solid #d7d7d7;
            cursor: pointer;
            display: inline-block;
            height: 24px;
            margin: 2px;
            padding: 0 12px;
            vertical-align: top
        }

        .kint-rich ul.kint-tabs>li:hover,
        .kint-rich ul.kint-tabs>li.kint-active-tab:hover {
            border-color: #aaa;
            color: red
        }

        .kint-rich ul.kint-tabs>li.kint-active-tab {
            background: #f8f8f8;
            border-top: 0;
            margin-top: -1px;
            height: 27px;
            line-height: 24px
        }

        .kint-rich ul.kint-tabs>li:not(.kint-active-tab) {
            line-height: 20px
        }

        .kint-rich ul.kint-tabs li+li {
            margin-left: 0
        }

        .kint-rich ul.kint-tab-contents>li {
            display: none
        }

        .kint-rich ul.kint-tab-contents>li.kint-show {
            display: block
        }

        .kint-rich dt:hover+dd>ul>li.kint-active-tab {
            border-color: #aaa;
            color: red
        }

        .kint-rich dt>.kint-color-preview {
            width: 16px;
            height: 16px;
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
            border: 1px solid #d7d7d7;
            background-color: #ccc;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2 2"><path fill="%23FFF" d="M0 0h1v2h1V1H0z"/></svg>');
            background-size: 100%
        }

        .kint-rich dt>.kint-color-preview:hover {
            border-color: #aaa
        }

        .kint-rich dt>.kint-color-preview>div {
            width: 100%;
            height: 100%
        }

        .kint-rich table {
            border-collapse: collapse;
            empty-cells: show;
            border-spacing: 0
        }

        .kint-rich table * {
            font-size: 12px
        }

        .kint-rich table dt {
            background: none;
            padding: 2px
        }

        .kint-rich table dt .kint-parent {
            min-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .kint-rich table td,
        .kint-rich table th {
            border: 1px solid #d7d7d7;
            padding: 2px;
            vertical-align: center
        }

        .kint-rich table th {
            cursor: alias
        }

        .kint-rich table td:first-child,
        .kint-rich table th {
            font-weight: bold;
            background: #f8f8f8;
            color: #1d1e1e
        }

        .kint-rich table td {
            background: #f8f8f8;
            white-space: pre
        }

        .kint-rich table td>dl {
            padding: 0
        }

        .kint-rich table pre {
            border-top: 0;
            border-right: 0
        }

        .kint-rich table thead th:first-child {
            background: none;
            border: 0
        }

        .kint-rich table tr:hover>td {
            box-shadow: 0 0 1px 0 #aaa inset
        }

        .kint-rich table tr:hover var {
            color: red
        }

        .kint-rich table ul.kint-tabs li.kint-active-tab {
            height: 20px;
            line-height: 17px
        }

        .kint-rich pre.kint-source {
            margin-left: -1px
        }

        .kint-rich pre.kint-source[data-kint-filename]:before {
            display: block;
            content: attr(data-kint-filename);
            margin-bottom: 4px;
            padding-bottom: 4px;
            border-bottom: 1px solid #f8f8f8
        }

        .kint-rich pre.kint-source>div:before {
            display: inline-block;
            content: counter(kint-l);
            counter-increment: kint-l;
            border-right: 1px solid #aaa;
            padding-right: 8px;
            margin-right: 8px
        }

        .kint-rich pre.kint-source>div.kint-highlight {
            background: #f8f8f8
        }

        .kint-rich .kint-microtime-lap {
            text-shadow: -1px 0 #aaa, 0 1px #aaa, 1px 0 #aaa, 0 -1px #aaa;
            color: #f8f8f8;
            font-weight: bold
        }

        input.kint-note-input {
            width: 100%
        }

        .kint-rich .kint-focused {
            box-shadow: 0 0 3px 2px red
        }

        .kint-rich dt {
            font-weight: normal
        }

        .kint-rich dt.kint-parent {
            margin-top: 4px
        }

        .kint-rich dl dl {
            margin-top: 4px;
            padding-left: 25px;
            border-left: none
        }

        .kint-rich>dl>dt {
            background: #f8f8f8
        }

        .kint-rich ul {
            margin: 0;
            padding-left: 0
        }

        .kint-rich ul:not(.kint-tabs)>li {
            border-left: 0
        }

        .kint-rich ul.kint-tabs {
            background: #f8f8f8;
            border: 1px solid #d7d7d7;
            border-width: 0 1px 1px 1px;
            padding: 4px 0 0 12px;
            margin-left: -1px;
            margin-top: -1px
        }

        .kint-rich ul.kint-tabs li,
        .kint-rich ul.kint-tabs li+li {
            margin: 0 0 0 4px
        }

        .kint-rich ul.kint-tabs li {
            border-bottom-width: 0;
            height: 25px
        }

        .kint-rich ul.kint-tabs li:first-child {
            margin-left: 0
        }

        .kint-rich ul.kint-tabs li.kint-active-tab {
            border-top: 1px solid #d7d7d7;
            background: #fff;
            font-weight: bold;
            padding-top: 0;
            border-bottom: 1px solid #fff !important;
            margin-bottom: -1px
        }

        .kint-rich ul.kint-tabs li.kint-active-tab:hover {
            border-bottom: 1px solid #fff
        }

        .kint-rich ul>li>pre {
            border: 1px solid #d7d7d7
        }

        .kint-rich dt:hover+dd>ul {
            border-color: #aaa
        }

        .kint-rich pre {
            background: #fff;
            margin-top: 4px;
            margin-left: 25px
        }

        .kint-rich .kint-source {
            margin-left: -1px
        }

        .kint-rich .kint-source .kint-highlight {
            background: #cfc
        }

        .kint-rich .kint-parent.kint-show>.kint-search {
            border-bottom-width: 1px
        }

        .kint-rich table td {
            background: #fff
        }

        .kint-rich table td>dl {
            padding: 0;
            margin: 0
        }

        .kint-rich table td>dl>dt.kint-parent {
            margin: 0
        }

        .kint-rich table td:first-child,
        .kint-rich table td,
        .kint-rich table th {
            padding: 2px 4px
        }

        .kint-rich table dd,
        .kint-rich table dt {
            background: #fff
        }

        .kint-rich table tr:hover>td {
            box-shadow: none;
            background: #cfc
        }
    </style>

    <script id="debugbar_loader" data-time="1679695904.612468" src="http://localhost:8080/index.php?debugbar"></script>
    <script id="debugbar_dynamic_script">
        /*
         * Functionality for the CodeIgniter Debug Toolbar.
         */

        var ciDebugBar = {

            toolbarContainer: null,
            toolbar: null,
            icon: null,

            init: function() {
                this.toolbarContainer = document.getElementById('toolbarContainer');
                this.toolbar = document.getElementById('debug-bar');
                this.icon = document.getElementById('debug-icon');

                ciDebugBar.createListeners();
                ciDebugBar.setToolbarState();
                ciDebugBar.setToolbarPosition();
                ciDebugBar.setToolbarTheme();
                ciDebugBar.toggleViewsHints();
                ciDebugBar.routerLink();

                document.getElementById('debug-bar-link').addEventListener('click', ciDebugBar.toggleToolbar, true);
                document.getElementById('debug-icon-link').addEventListener('click', ciDebugBar.toggleToolbar, true);

                // Allows to highlight the row of the current history request
                var btn = this.toolbar.querySelector('button[data-time="' + localStorage.getItem('debugbar-time') + '"]');
                ciDebugBar.addClass(btn.parentNode.parentNode, 'current');

                historyLoad = this.toolbar.getElementsByClassName('ci-history-load');

                for (var i = 0; i < historyLoad.length; i++) {
                    historyLoad[i].addEventListener('click', function() {
                        loadDoc(this.getAttribute('data-time'));
                    }, true);
                }

                // Display the active Tab on page load
                var tab = ciDebugBar.readCookie('debug-bar-tab');
                if (document.getElementById(tab)) {
                    var el = document.getElementById(tab);
                    el.style.display = 'block';
                    ciDebugBar.addClass(el, 'active');
                    tab = document.querySelector('[data-tab=' + tab + ']');
                    if (tab) {
                        ciDebugBar.addClass(tab.parentNode, 'active');
                    }
                }
            },

            createListeners: function() {
                var buttons = [].slice.call(this.toolbar.querySelectorAll('.ci-label a'));

                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].addEventListener('click', ciDebugBar.showTab, true);
                }

                // Hook up generic toggle via data attributes `data-toggle="foo"`
                var links = this.toolbar.querySelectorAll('[data-toggle]');
                for (var i = 0; i < links.length; i++) {
                    links[i].addEventListener('click', ciDebugBar.toggleRows, true);
                }
            },

            showTab: function() {
                // Get the target tab, if any
                var tab = document.getElementById(this.getAttribute('data-tab'));

                // If the label have not a tab stops here
                if (!tab) {
                    return;
                }

                // Remove debug-bar-tab cookie
                ciDebugBar.createCookie('debug-bar-tab', '', -1);

                // Check our current state.
                var state = tab.style.display;

                // Hide all tabs
                var tabs = document.querySelectorAll('#debug-bar .tab');

                for (var i = 0; i < tabs.length; i++) {
                    tabs[i].style.display = 'none';
                }

                // Mark all labels as inactive
                var labels = document.querySelectorAll('#debug-bar .ci-label');

                for (var i = 0; i < labels.length; i++) {
                    ciDebugBar.removeClass(labels[i], 'active');
                }

                // Show/hide the selected tab
                if (state != 'block') {
                    tab.style.display = 'block';
                    ciDebugBar.addClass(this.parentNode, 'active');
                    // Create debug-bar-tab cookie to persistent state
                    ciDebugBar.createCookie('debug-bar-tab', this.getAttribute('data-tab'), 365);
                }
            },

            addClass: function(el, className) {
                if (el.classList) {
                    el.classList.add(className);
                } else {
                    el.className += ' ' + className;
                }
            },

            removeClass: function(el, className) {
                if (el.classList) {
                    el.classList.remove(className);
                } else {
                    el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
                }
            },

            /**
             * Toggle display of another object based on
             * the data-toggle value of this object
             *
             * @param event
             */
            toggleRows: function(event) {
                if (event.target) {
                    let row = event.target.closest('tr');
                    let target = document.getElementById(row.getAttribute('data-toggle'));
                    target.style.display = target.style.display === 'none' ? 'table-row' : 'none';
                }
            },

            /**
             * Toggle display of a data table
             *
             * @param obj
             */
            toggleDataTable: function(obj) {
                if (typeof obj == 'string') {
                    obj = document.getElementById(obj + '_table');
                }

                if (obj) {
                    obj.style.display = obj.style.display === 'none' ? 'block' : 'none';
                }
            },

            /**
             * Toggle display of timeline child elements
             *
             * @param obj
             */
            toggleChildRows: function(obj) {
                if (typeof obj == 'string') {
                    par = document.getElementById(obj + '_parent')
                    obj = document.getElementById(obj + '_children');
                }

                if (par && obj) {
                    obj.style.display = obj.style.display === 'none' ? '' : 'none';
                    par.classList.toggle('timeline-parent-open');
                }
            },


            //--------------------------------------------------------------------

            /**
             *   Toggle tool bar from full to icon and icon to full
             */
            toggleToolbar: function() {
                var open = ciDebugBar.toolbar.style.display != 'none';

                ciDebugBar.icon.style.display = open == true ? 'inline-block' : 'none';
                ciDebugBar.toolbar.style.display = open == false ? 'inline-block' : 'none';

                // Remember it for other page loads on this site
                ciDebugBar.createCookie('debug-bar-state', '', -1);
                ciDebugBar.createCookie('debug-bar-state', open == true ? 'minimized' : 'open', 365);
            },

            /**
             * Sets the initial state of the toolbar (open or minimized) when
             * the page is first loaded to allow it to remember the state between refreshes.
             */
            setToolbarState: function() {
                var open = ciDebugBar.readCookie('debug-bar-state');

                ciDebugBar.icon.style.display = open != 'open' ? 'inline-block' : 'none';
                ciDebugBar.toolbar.style.display = open == 'open' ? 'inline-block' : 'none';
            },

            toggleViewsHints: function() {
                // Avoid toggle hints on history requests that are not the initial
                if (localStorage.getItem('debugbar-time') != localStorage.getItem('debugbar-time-new')) {
                    var a = document.querySelector('a[data-tab="ci-views"]');
                    a.href = '#';
                    return;
                }

                var nodeList = []; // [ Element, NewElement( 1 )/OldElement( 0 ) ]
                var sortedComments = [];
                var comments = [];

                var getComments = function() {
                    var nodes = [];
                    var result = [];
                    var xpathResults = document.evaluate("//comment()[starts-with(., ' DEBUG-VIEW')]", document, null, XPathResult.ANY_TYPE, null);
                    var nextNode = xpathResults.iterateNext();
                    while (nextNode) {
                        nodes.push(nextNode);
                        nextNode = xpathResults.iterateNext();
                    }

                    // sort comment by opening and closing tags
                    for (var i = 0; i < nodes.length; ++i) {
                        // get file path + name to use as key
                        var path = nodes[i].nodeValue.substring(18, nodes[i].nodeValue.length - 1);

                        if (nodes[i].nodeValue[12] === 'S') // simple check for start comment
                        {
                            // create new entry
                            result[path] = [nodes[i], null];
                        } else if (result[path]) {
                            // add to existing entry
                            result[path][1] = nodes[i];
                        }
                    }

                    return result;
                };

                // find node that has TargetNode as parentNode
                var getParentNode = function(node, targetNode) {
                    if (node.parentNode === null) {
                        return null;
                    }

                    if (node.parentNode !== targetNode) {
                        return getParentNode(node.parentNode, targetNode);
                    }

                    return node;
                };

                // define invalid & outer ( also invalid ) elements
                const INVALID_ELEMENTS = ['NOSCRIPT', 'SCRIPT', 'STYLE'];
                const OUTER_ELEMENTS = ['HTML', 'BODY', 'HEAD'];

                var getValidElementInner = function(node, reverse) {
                    // handle invalid tags
                    if (OUTER_ELEMENTS.indexOf(node.nodeName) !== -1) {
                        for (var i = 0; i < document.body.children.length; ++i) {
                            var index = reverse ? document.body.children.length - (i + 1) : i;
                            var element = document.body.children[index];

                            // skip invalid tags
                            if (INVALID_ELEMENTS.indexOf(element.nodeName) !== -1) {
                                continue;
                            }

                            return [element, reverse];
                        }

                        return null;
                    }

                    // get to next valid element
                    while (node !== null && INVALID_ELEMENTS.indexOf(node.nodeName) !== -1) {
                        node = reverse ? node.previousElementSibling : node.nextElementSibling;
                    }

                    // return non array if we couldnt find something
                    if (node === null) {
                        return null;
                    }

                    return [node, reverse];
                };

                // get next valid element ( to be safe to add divs )
                // @return [ element, skip element ] or null if we couldnt find a valid place
                var getValidElement = function(nodeElement) {
                    if (nodeElement) {
                        if (nodeElement.nextElementSibling !== null) {
                            return getValidElementInner(nodeElement.nextElementSibling, false) ||
                                getValidElementInner(nodeElement.previousElementSibling, true);
                        }
                        if (nodeElement.previousElementSibling !== null) {
                            return getValidElementInner(nodeElement.previousElementSibling, true);
                        }
                    }

                    // something went wrong! -> element is not in DOM
                    return null;
                };

                function showHints() {
                    // Had AJAX? Reset view blocks
                    sortedComments = getComments();

                    for (var key in sortedComments) {
                        var startElement = getValidElement(sortedComments[key][0]);
                        var endElement = getValidElement(sortedComments[key][1]);

                        // skip if we couldnt get a valid element
                        if (startElement === null || endElement === null) {
                            continue;
                        }

                        // find element which has same parent as startelement
                        var jointParent = getParentNode(endElement[0], startElement[0].parentNode);
                        if (jointParent === null) {
                            // find element which has same parent as endelement
                            jointParent = getParentNode(startElement[0], endElement[0].parentNode);
                            if (jointParent === null) {
                                // both tries failed
                                continue;
                            } else {
                                startElement[0] = jointParent;
                            }
                        } else {
                            endElement[0] = jointParent;
                        }

                        var debugDiv = document.createElement('div'); // holder
                        var debugPath = document.createElement('div'); // path
                        var childArray = startElement[0].parentNode.childNodes; // target child array
                        var parent = startElement[0].parentNode;
                        var start, end;

                        // setup container
                        debugDiv.classList.add('debug-view');
                        debugDiv.classList.add('show-view');
                        debugPath.classList.add('debug-view-path');
                        debugPath.innerText = key;
                        debugDiv.appendChild(debugPath);

                        // calc distance between them
                        // start
                        for (var i = 0; i < childArray.length; ++i) {
                            // check for comment ( start & end ) -> if its before valid start element
                            if (childArray[i] === sortedComments[key][1] ||
                                childArray[i] === sortedComments[key][0] ||
                                childArray[i] === startElement[0]) {
                                start = i;
                                if (childArray[i] === sortedComments[key][0]) {
                                    start++; // increase to skip the start comment
                                }
                                break;
                            }
                        }
                        // adjust if we want to skip the start element
                        if (startElement[1]) {
                            start++;
                        }

                        // end
                        for (var i = start; i < childArray.length; ++i) {
                            if (childArray[i] === endElement[0]) {
                                end = i;
                                // dont break to check for end comment after end valid element
                            } else if (childArray[i] === sortedComments[key][1]) {
                                // if we found the end comment, we can break
                                end = i;
                                break;
                            }
                        }

                        // move elements
                        var number = end - start;
                        if (endElement[1]) {
                            number++;
                        }
                        for (var i = 0; i < number; ++i) {
                            if (INVALID_ELEMENTS.indexOf(childArray[start]) !== -1) {
                                // skip invalid childs that can cause problems if moved
                                start++;
                                continue;
                            }
                            debugDiv.appendChild(childArray[start]);
                        }

                        // add container to DOM
                        nodeList.push(parent.insertBefore(debugDiv, childArray[start]));
                    }

                    ciDebugBar.createCookie('debug-view', 'show', 365);
                    ciDebugBar.addClass(btn, 'active');
                }

                function hideHints() {
                    for (var i = 0; i < nodeList.length; ++i) {
                        var index;

                        // find index
                        for (var j = 0; j < nodeList[i].parentNode.childNodes.length; ++j) {
                            if (nodeList[i].parentNode.childNodes[j] === nodeList[i]) {
                                index = j;
                                break;
                            }
                        }

                        // move child back
                        while (nodeList[i].childNodes.length !== 1) {
                            nodeList[i].parentNode.insertBefore(nodeList[i].childNodes[1], nodeList[i].parentNode.childNodes[index].nextSibling);
                            index++;
                        }

                        nodeList[i].parentNode.removeChild(nodeList[i]);
                    }
                    nodeList.length = 0;

                    ciDebugBar.createCookie('debug-view', '', -1);
                    ciDebugBar.removeClass(btn, 'active');
                }

                var btn = document.querySelector('[data-tab=ci-views]');

                // If the Views Collector is inactive stops here
                if (!btn) {
                    return;
                }

                btn.parentNode.onclick = function() {
                    if (ciDebugBar.readCookie('debug-view')) {
                        hideHints();
                    } else {
                        showHints();
                    }
                };

                // Determine Hints state on page load
                if (ciDebugBar.readCookie('debug-view')) {
                    showHints();
                }
            },

            setToolbarPosition: function() {
                var btnPosition = this.toolbar.querySelector('#toolbar-position');

                if (ciDebugBar.readCookie('debug-bar-position') === 'top') {
                    ciDebugBar.addClass(ciDebugBar.icon, 'fixed-top');
                    ciDebugBar.addClass(ciDebugBar.toolbar, 'fixed-top');
                }

                btnPosition.addEventListener('click', function() {
                    var position = ciDebugBar.readCookie('debug-bar-position');

                    ciDebugBar.createCookie('debug-bar-position', '', -1);

                    if (!position || position === 'bottom') {
                        ciDebugBar.createCookie('debug-bar-position', 'top', 365);
                        ciDebugBar.addClass(ciDebugBar.icon, 'fixed-top');
                        ciDebugBar.addClass(ciDebugBar.toolbar, 'fixed-top');
                    } else {
                        ciDebugBar.createCookie('debug-bar-position', 'bottom', 365);
                        ciDebugBar.removeClass(ciDebugBar.icon, 'fixed-top');
                        ciDebugBar.removeClass(ciDebugBar.toolbar, 'fixed-top');
                    }
                }, true);
            },

            setToolbarTheme: function() {
                var btnTheme = this.toolbar.querySelector('#toolbar-theme');
                var isDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
                var isLightMode = window.matchMedia("(prefers-color-scheme: light)").matches;

                // If a cookie is set with a value, we force the color scheme
                if (ciDebugBar.readCookie('debug-bar-theme') === 'dark') {
                    ciDebugBar.removeClass(ciDebugBar.toolbarContainer, 'light');
                    ciDebugBar.addClass(ciDebugBar.toolbarContainer, 'dark');
                } else if (ciDebugBar.readCookie('debug-bar-theme') === 'light') {
                    ciDebugBar.removeClass(ciDebugBar.toolbarContainer, 'dark');
                    ciDebugBar.addClass(ciDebugBar.toolbarContainer, 'light');
                }

                btnTheme.addEventListener('click', function() {
                    var theme = ciDebugBar.readCookie('debug-bar-theme');

                    if (!theme && window.matchMedia("(prefers-color-scheme: dark)").matches) {
                        // If there is no cookie, and "prefers-color-scheme" is set to "dark"
                        // It means that the user wants to switch to light mode
                        ciDebugBar.createCookie('debug-bar-theme', 'light', 365);
                        ciDebugBar.removeClass(ciDebugBar.toolbarContainer, 'dark');
                        ciDebugBar.addClass(ciDebugBar.toolbarContainer, 'light');
                    } else {
                        if (theme === 'dark') {
                            ciDebugBar.createCookie('debug-bar-theme', 'light', 365);
                            ciDebugBar.removeClass(ciDebugBar.toolbarContainer, 'dark');
                            ciDebugBar.addClass(ciDebugBar.toolbarContainer, 'light');
                        } else {
                            // In any other cases: if there is no cookie, or the cookie is set to
                            // "light", or the "prefers-color-scheme" is "light"...
                            ciDebugBar.createCookie('debug-bar-theme', 'dark', 365);
                            ciDebugBar.removeClass(ciDebugBar.toolbarContainer, 'light');
                            ciDebugBar.addClass(ciDebugBar.toolbarContainer, 'dark');
                        }
                    }
                }, true);
            },

            /**
             * Helper to create a cookie.
             *
             * @param name
             * @param value
             * @param days
             */
            createCookie: function(name, value, days) {
                if (days) {
                    var date = new Date();

                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));

                    var expires = "; expires=" + date.toGMTString();
                } else {
                    var expires = "";
                }

                document.cookie = name + "=" + value + expires + "; path=/; samesite=Lax";
            },

            readCookie: function(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');

                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1, c.length);
                    }
                    if (c.indexOf(nameEQ) == 0) {
                        return c.substring(nameEQ.length, c.length);
                    }
                }
                return null;
            },

            trimSlash: function(text) {
                return text.replace(/^\/|\/$/g, '');
            },

            routerLink: function() {
                var row, _location;
                var rowGet = this.toolbar.querySelectorAll('td[data-debugbar-route="GET"]');
                var patt = /\((?:[^)(]+|\((?:[^)(]+|\([^)(]*\))*\))*\)/;

                for (var i = 0; i < rowGet.length; i++) {
                    row = rowGet[i];
                    if (!/\/\(.+?\)/.test(rowGet[i].innerText)) {
                        row.style = 'cursor: pointer;';
                        row.setAttribute('title', location.origin + '/' + ciDebugBar.trimSlash(row.innerText));
                        row.addEventListener('click', function(ev) {
                            _location = location.origin + '/' + ciDebugBar.trimSlash(ev.target.innerText);
                            var redirectWindow = window.open(_location, '_blank');
                            redirectWindow.location;
                        });
                    } else {
                        row.innerHTML = '<div>' + row.innerText + '</div>' +
                            '<form data-debugbar-route-tpl="' + ciDebugBar.trimSlash(row.innerText.replace(patt, '?')) + '">' +
                            row.innerText.replace(patt, '<input type="text" placeholder="$1">') +
                            '<input type="submit" value="Go" style="margin-left: 4px;">' +
                            '</form>';
                    }
                }

                rowGet = this.toolbar.querySelectorAll('td[data-debugbar-route="GET"] form');
                for (var i = 0; i < rowGet.length; i++) {
                    row = rowGet[i];

                    row.addEventListener('submit', function(event) {
                        event.preventDefault()
                        var inputArray = [],
                            t = 0;
                        var input = event.target.querySelectorAll('input[type=text]');
                        var tpl = event.target.getAttribute('data-debugbar-route-tpl');

                        for (var n = 0; n < input.length; n++) {
                            if (input[n].value.length > 0) {
                                inputArray.push(input[n].value);
                            }
                        }

                        if (inputArray.length > 0) {
                            _location = location.origin + '/' + tpl.replace(/\?/g, function() {
                                return inputArray[t++]
                            });

                            var redirectWindow = window.open(_location, '_blank');
                            redirectWindow.location;
                        }
                    })
                }
            }
        };
    </script>
    <style id="debugbar_dynamic_style">
        /** * This file is part of the CodeIgniter 4 framework. * * (c) CodeIgniter Foundation <admin@codeigniter.com> * * For the full copyright and license information, please view the LICENSE * file that was distributed with this source code. */
        #debug-icon {
            bottom: 0;
            position: fixed;
            right: 0;
            z-index: 10000;
            height: 36px;
            width: 36px;
            margin: 0px;
            padding: 0px;
            clear: both;
            text-align: center;
        }

        #debug-icon a svg {
            margin: 8px;
            max-width: 20px;
            max-height: 20px;
        }

        #debug-icon.fixed-top {
            bottom: auto;
            top: 0;
        }

        #debug-icon .debug-bar-ndisplay {
            display: none;
        }

        #debug-bar {
            bottom: 0;
            left: 0;
            position: fixed;
            right: 0;
            z-index: 10000;
            height: 36px;
            line-height: 36px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            font-weight: 400;
        }

        #debug-bar h1 {
            display: flex;
            font-weight: normal;
            margin: 0 0 0 auto;
        }

        #debug-bar h1 svg {
            width: 16px;
            margin-right: 5px;
        }

        #debug-bar h2 {
            font-size: 16px;
            margin: 0;
            padding: 5px 0 10px 0;
        }

        #debug-bar h2 span {
            font-size: 13px;
        }

        #debug-bar h3 {
            font-size: 12px;
            font-weight: 200;
            margin: 0 0 0 10px;
            padding: 0;
            text-transform: uppercase;
        }

        #debug-bar p {
            font-size: 12px;
            margin: 0 0 0 15px;
            padding: 0;
        }

        #debug-bar a {
            text-decoration: none;
        }

        #debug-bar a:hover {
            text-decoration: underline;
        }

        #debug-bar button {
            border: 1px solid;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            cursor: pointer;
            line-height: 15px;
        }

        #debug-bar button:hover {
            text-decoration: underline;
        }

        #debug-bar table {
            border-collapse: collapse;
            font-size: 14px;
            line-height: normal;
            margin: 5px 10px 15px 10px;
            width: calc(100% - 10px);
        }

        #debug-bar table strong {
            font-weight: 500;
        }

        #debug-bar table th {
            display: table-cell;
            font-weight: 600;
            padding-bottom: 0.7em;
            text-align: left;
        }

        #debug-bar table tr {
            border: none;
        }

        #debug-bar table td {
            border: none;
            display: table-cell;
            margin: 0;
            text-align: left;
        }

        #debug-bar table td:first-child {
            max-width: 20%;
        }

        #debug-bar table td:first-child.narrow {
            width: 7em;
        }

        #debug-bar td[data-debugbar-route] form {
            display: none;
        }

        #debug-bar td[data-debugbar-route]:hover form {
            display: block;
        }

        #debug-bar td[data-debugbar-route]:hover>div {
            display: none;
        }

        #debug-bar td[data-debugbar-route] input[type=text] {
            padding: 2px;
        }

        #debug-bar .toolbar {
            display: flex;
            overflow: hidden;
            overflow-y: auto;
            padding: 0 12px 0 12px;
            white-space: nowrap;
            z-index: 10000;
        }

        #debug-bar.fixed-top {
            bottom: auto;
            top: 0;
        }

        #debug-bar.fixed-top .tab {
            bottom: auto;
            top: 36px;
        }

        #debug-bar #toolbar-position a,
        #debug-bar #toolbar-theme a {
            padding: 0 6px;
            display: inline-flex;
            vertical-align: top;
        }

        #debug-bar #toolbar-position a:hover,
        #debug-bar #toolbar-theme a:hover {
            text-decoration: none;
        }

        #debug-bar #debug-bar-link {
            display: flex;
            padding: 6px;
        }

        #debug-bar .ci-label {
            display: inline-flex;
            font-size: 14px;
        }

        #debug-bar .ci-label:hover {
            cursor: pointer;
        }

        #debug-bar .ci-label a {
            color: inherit;
            display: flex;
            letter-spacing: normal;
            padding: 0 10px;
            text-decoration: none;
            align-items: center;
        }

        #debug-bar .ci-label img {
            margin: 6px 3px 6px 0;
            width: 16px !important;
        }

        #debug-bar .ci-label .badge {
            border-radius: 12px;
            -moz-border-radius: 12px;
            -webkit-border-radius: 12px;
            display: inline-block;
            font-size: 75%;
            font-weight: bold;
            line-height: 12px;
            margin-left: 5px;
            padding: 2px 5px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap;
        }

        #debug-bar .tab {
            bottom: 35px;
            display: none;
            left: 0;
            max-height: 62%;
            overflow: hidden;
            overflow-y: auto;
            padding: 1em 2em;
            position: fixed;
            right: 0;
            z-index: 9999;
        }

        #debug-bar .timeline {
            margin-left: 0;
            width: 100%;
        }

        #debug-bar .timeline th {
            border-left: 1px solid;
            font-size: 12px;
            font-weight: 200;
            padding: 5px 5px 10px 5px;
            position: relative;
            text-align: left;
        }

        #debug-bar .timeline th:first-child {
            border-left: 0;
        }

        #debug-bar .timeline td {
            border-left: 1px solid;
            padding: 5px;
            position: relative;
        }

        #debug-bar .timeline td:first-child {
            border-left: 0;
            max-width: none;
        }

        #debug-bar .timeline td.child-container {
            padding: 0px;
        }

        #debug-bar .timeline td.child-container .timeline {
            margin: 0px;
        }

        #debug-bar .timeline td.child-container .timeline td:first-child:not(.child-container) {
            padding-left: calc(5px + 10px * var(--level));
        }

        #debug-bar .timeline .timer {
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            display: inline-block;
            padding: 5px;
            position: absolute;
            top: 30%;
        }

        #debug-bar .timeline .timeline-parent {
            cursor: pointer;
        }

        #debug-bar .timeline .timeline-parent td:first-child nav {
            background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMCAxNTAiPjxwYXRoIGQ9Ik02IDdoMThsLTkgMTV6bTAgMzBoMThsLTkgMTV6bTAgNDVoMThsLTktMTV6bTAgMzBoMThsLTktMTV6bTAgMTJsMTggMThtLTE4IDBsMTgtMTgiIGZpbGw9IiM1NTUiLz48cGF0aCBkPSJNNiAxMjZsMTggMThtLTE4IDBsMTgtMTgiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlPSIjNTU1Ii8+PC9zdmc+") no-repeat scroll 0 0/15px 75px transparent;
            background-position: 0 25%;
            display: inline-block;
            height: 15px;
            width: 15px;
            margin-right: 3px;
            vertical-align: middle;
        }

        #debug-bar .timeline .timeline-parent-open {
            background-color: #DFDFDF;
        }

        #debug-bar .timeline .timeline-parent-open td:first-child nav {
            background-position: 0 75%;
        }

        #debug-bar .timeline .child-row:hover {
            background: transparent;
        }

        #debug-bar .route-params,
        #debug-bar .route-params-item {
            vertical-align: top;
        }

        #debug-bar .route-params td:first-child,
        #debug-bar .route-params-item td:first-child {
            font-style: italic;
            padding-left: 1em;
            text-align: right;
        }

        .debug-view.show-view {
            border: 1px solid;
            margin: 4px;
        }

        .debug-view-path {
            font-family: monospace;
            font-size: 12px;
            letter-spacing: normal;
            min-height: 16px;
            padding: 2px;
            text-align: left;
        }

        .show-view .debug-view-path {
            display: block !important;
        }

        @media screen and (max-width: 1024px) {
            #debug-bar .ci-label img {
                margin: unset;
            }

            .hide-sm {
                display: none !important;
            }
        }

        #debug-icon {
            background-color: #FFFFFF;
            box-shadow: 0 0 4px #DFDFDF;
            -moz-box-shadow: 0 0 4px #DFDFDF;
            -webkit-box-shadow: 0 0 4px #DFDFDF;
        }

        #debug-icon a:active,
        #debug-icon a:link,
        #debug-icon a:visited {
            color: #DD8615;
        }

        #debug-bar {
            background-color: #FFFFFF;
            color: #434343;
        }

        #debug-bar h1,
        #debug-bar h2,
        #debug-bar h3,
        #debug-bar p,
        #debug-bar a,
        #debug-bar button,
        #debug-bar table,
        #debug-bar thead,
        #debug-bar tr,
        #debug-bar td,
        #debug-bar button,
        #debug-bar .toolbar {
            background-color: transparent;
            color: #434343;
        }

        #debug-bar button {
            background-color: #FFFFFF;
        }

        #debug-bar table strong {
            color: #DD8615;
        }

        #debug-bar table tbody tr:hover {
            background-color: #DFDFDF;
        }

        #debug-bar table tbody tr.current {
            background-color: #FDC894;
        }

        #debug-bar table tbody tr.current:hover td {
            background-color: #DD4814;
            color: #FFFFFF;
        }

        #debug-bar .toolbar {
            background-color: #FFFFFF;
            box-shadow: 0 0 4px #DFDFDF;
            -moz-box-shadow: 0 0 4px #DFDFDF;
            -webkit-box-shadow: 0 0 4px #DFDFDF;
        }

        #debug-bar .toolbar img {
            filter: brightness(0) invert(0.4);
        }

        #debug-bar.fixed-top .toolbar {
            box-shadow: 0 0 4px #DFDFDF;
            -moz-box-shadow: 0 0 4px #DFDFDF;
            -webkit-box-shadow: 0 0 4px #DFDFDF;
        }

        #debug-bar.fixed-top .tab {
            box-shadow: 0 1px 4px #DFDFDF;
            -moz-box-shadow: 0 1px 4px #DFDFDF;
            -webkit-box-shadow: 0 1px 4px #DFDFDF;
        }

        #debug-bar .muted {
            color: #434343;
        }

        #debug-bar .muted td {
            color: #DFDFDF;
        }

        #debug-bar .muted:hover td {
            color: #434343;
        }

        #debug-bar #toolbar-position,
        #debug-bar #toolbar-theme {
            filter: brightness(0) invert(0.6);
        }

        #debug-bar .ci-label.active {
            background-color: #DFDFDF;
        }

        #debug-bar .ci-label:hover {
            background-color: #DFDFDF;
        }

        #debug-bar .ci-label .badge {
            background-color: #DD4814;
            color: #FFFFFF;
        }

        #debug-bar .tab {
            background-color: #FFFFFF;
            box-shadow: 0 -1px 4px #DFDFDF;
            -moz-box-shadow: 0 -1px 4px #DFDFDF;
            -webkit-box-shadow: 0 -1px 4px #DFDFDF;
        }

        #debug-bar .timeline th,
        #debug-bar .timeline td {
            border-color: #DFDFDF;
        }

        #debug-bar .timeline .timer {
            background-color: #DD8615;
        }

        .debug-view.show-view {
            border-color: #DD8615;
        }

        .debug-view-path {
            background-color: #FDC894;
            color: #434343;
        }

        @media (prefers-color-scheme: dark) {
            #debug-icon {
                background-color: #252525;
                box-shadow: 0 0 4px #DFDFDF;
                -moz-box-shadow: 0 0 4px #DFDFDF;
                -webkit-box-shadow: 0 0 4px #DFDFDF;
            }

            #debug-icon a:active,
            #debug-icon a:link,
            #debug-icon a:visited {
                color: #DD8615;
            }

            #debug-bar {
                background-color: #252525;
                color: #DFDFDF;
            }

            #debug-bar h1,
            #debug-bar h2,
            #debug-bar h3,
            #debug-bar p,
            #debug-bar a,
            #debug-bar button,
            #debug-bar table,
            #debug-bar thead,
            #debug-bar tr,
            #debug-bar td,
            #debug-bar button,
            #debug-bar .toolbar {
                background-color: transparent;
                color: #DFDFDF;
            }

            #debug-bar button {
                background-color: #252525;
            }

            #debug-bar table strong {
                color: #DD8615;
            }

            #debug-bar table tbody tr:hover {
                background-color: #434343;
            }

            #debug-bar table tbody tr.current {
                background-color: #FDC894;
            }

            #debug-bar table tbody tr.current td {
                color: #252525;
            }

            #debug-bar table tbody tr.current:hover td {
                background-color: #DD4814;
                color: #FFFFFF;
            }

            #debug-bar .toolbar {
                background-color: #434343;
                box-shadow: 0 0 4px #434343;
                -moz-box-shadow: 0 0 4px #434343;
                -webkit-box-shadow: 0 0 4px #434343;
            }

            #debug-bar .toolbar img {
                filter: brightness(0) invert(1);
            }

            #debug-bar.fixed-top .toolbar {
                box-shadow: 0 0 4px #434343;
                -moz-box-shadow: 0 0 4px #434343;
                -webkit-box-shadow: 0 0 4px #434343;
            }

            #debug-bar.fixed-top .tab {
                box-shadow: 0 1px 4px #434343;
                -moz-box-shadow: 0 1px 4px #434343;
                -webkit-box-shadow: 0 1px 4px #434343;
            }

            #debug-bar .muted {
                color: #DFDFDF;
            }

            #debug-bar .muted td {
                color: #434343;
            }

            #debug-bar .muted:hover td {
                color: #DFDFDF;
            }

            #debug-bar #toolbar-position,
            #debug-bar #toolbar-theme {
                filter: brightness(0) invert(0.6);
            }

            #debug-bar .ci-label.active {
                background-color: #252525;
            }

            #debug-bar .ci-label:hover {
                background-color: #252525;
            }

            #debug-bar .ci-label .badge {
                background-color: #DD4814;
                color: #FFFFFF;
            }

            #debug-bar .tab {
                background-color: #252525;
                box-shadow: 0 -1px 4px #434343;
                -moz-box-shadow: 0 -1px 4px #434343;
                -webkit-box-shadow: 0 -1px 4px #434343;
            }

            #debug-bar .timeline th,
            #debug-bar .timeline td {
                border-color: #434343;
            }

            #debug-bar .timeline .timer {
                background-color: #DD8615;
            }

            .debug-view.show-view {
                border-color: #DD8615;
            }

            .debug-view-path {
                background-color: #FDC894;
                color: #434343;
            }
        }

        #toolbarContainer.dark #debug-icon {
            background-color: #252525;
            box-shadow: 0 0 4px #DFDFDF;
            -moz-box-shadow: 0 0 4px #DFDFDF;
            -webkit-box-shadow: 0 0 4px #DFDFDF;
        }

        #toolbarContainer.dark #debug-icon a:active,
        #toolbarContainer.dark #debug-icon a:link,
        #toolbarContainer.dark #debug-icon a:visited {
            color: #DD8615;
        }

        #toolbarContainer.dark #debug-bar {
            background-color: #252525;
            color: #DFDFDF;
        }

        #toolbarContainer.dark #debug-bar h1,
        #toolbarContainer.dark #debug-bar h2,
        #toolbarContainer.dark #debug-bar h3,
        #toolbarContainer.dark #debug-bar p,
        #toolbarContainer.dark #debug-bar a,
        #toolbarContainer.dark #debug-bar button,
        #toolbarContainer.dark #debug-bar table,
        #toolbarContainer.dark #debug-bar thead,
        #toolbarContainer.dark #debug-bar tr,
        #toolbarContainer.dark #debug-bar td,
        #toolbarContainer.dark #debug-bar button,
        #toolbarContainer.dark #debug-bar .toolbar {
            background-color: transparent;
            color: #DFDFDF;
        }

        #toolbarContainer.dark #debug-bar button {
            background-color: #252525;
        }

        #toolbarContainer.dark #debug-bar table strong {
            color: #DD8615;
        }

        #toolbarContainer.dark #debug-bar table tbody tr:hover {
            background-color: #434343;
        }

        #toolbarContainer.dark #debug-bar table tbody tr.current {
            background-color: #FDC894;
        }

        #toolbarContainer.dark #debug-bar table tbody tr.current td {
            color: #252525;
        }

        #toolbarContainer.dark #debug-bar table tbody tr.current:hover td {
            background-color: #DD4814;
            color: #FFFFFF;
        }

        #toolbarContainer.dark #debug-bar .toolbar {
            background-color: #434343;
            box-shadow: 0 0 4px #434343;
            -moz-box-shadow: 0 0 4px #434343;
            -webkit-box-shadow: 0 0 4px #434343;
        }

        #toolbarContainer.dark #debug-bar .toolbar img {
            filter: brightness(0) invert(1);
        }

        #toolbarContainer.dark #debug-bar.fixed-top .toolbar {
            box-shadow: 0 0 4px #434343;
            -moz-box-shadow: 0 0 4px #434343;
            -webkit-box-shadow: 0 0 4px #434343;
        }

        #toolbarContainer.dark #debug-bar.fixed-top .tab {
            box-shadow: 0 1px 4px #434343;
            -moz-box-shadow: 0 1px 4px #434343;
            -webkit-box-shadow: 0 1px 4px #434343;
        }

        #toolbarContainer.dark #debug-bar .muted {
            color: #DFDFDF;
        }

        #toolbarContainer.dark #debug-bar .muted td {
            color: #434343;
        }

        #toolbarContainer.dark #debug-bar .muted:hover td {
            color: #DFDFDF;
        }

        #toolbarContainer.dark #debug-bar #toolbar-position,
        #toolbarContainer.dark #debug-bar #toolbar-theme {
            filter: brightness(0) invert(0.6);
        }

        #toolbarContainer.dark #debug-bar .ci-label.active {
            background-color: #252525;
        }

        #toolbarContainer.dark #debug-bar .ci-label:hover {
            background-color: #252525;
        }

        #toolbarContainer.dark #debug-bar .ci-label .badge {
            background-color: #DD4814;
            color: #FFFFFF;
        }

        #toolbarContainer.dark #debug-bar .tab {
            background-color: #252525;
            box-shadow: 0 -1px 4px #434343;
            -moz-box-shadow: 0 -1px 4px #434343;
            -webkit-box-shadow: 0 -1px 4px #434343;
        }

        #toolbarContainer.dark #debug-bar .timeline th,
        #toolbarContainer.dark #debug-bar .timeline td {
            border-color: #434343;
        }

        #toolbarContainer.dark #debug-bar .timeline .timer {
            background-color: #DD8615;
        }

        #toolbarContainer.dark .debug-view.show-view {
            border-color: #DD8615;
        }

        #toolbarContainer.dark .debug-view-path {
            background-color: #FDC894;
            color: #434343;
        }

        #toolbarContainer.dark td[data-debugbar-route] input[type=text] {
            background: #000;
            color: #fff;
        }

        #toolbarContainer.light #debug-icon {
            background-color: #FFFFFF;
            box-shadow: 0 0 4px #DFDFDF;
            -moz-box-shadow: 0 0 4px #DFDFDF;
            -webkit-box-shadow: 0 0 4px #DFDFDF;
        }

        #toolbarContainer.light #debug-icon a:active,
        #toolbarContainer.light #debug-icon a:link,
        #toolbarContainer.light #debug-icon a:visited {
            color: #DD8615;
        }

        #toolbarContainer.light #debug-bar {
            background-color: #FFFFFF;
            color: #434343;
        }

        #toolbarContainer.light #debug-bar h1,
        #toolbarContainer.light #debug-bar h2,
        #toolbarContainer.light #debug-bar h3,
        #toolbarContainer.light #debug-bar p,
        #toolbarContainer.light #debug-bar a,
        #toolbarContainer.light #debug-bar button,
        #toolbarContainer.light #debug-bar table,
        #toolbarContainer.light #debug-bar thead,
        #toolbarContainer.light #debug-bar tr,
        #toolbarContainer.light #debug-bar td,
        #toolbarContainer.light #debug-bar button,
        #toolbarContainer.light #debug-bar .toolbar {
            background-color: transparent;
            color: #434343;
        }

        #toolbarContainer.light #debug-bar button {
            background-color: #FFFFFF;
        }

        #toolbarContainer.light #debug-bar table strong {
            color: #DD8615;
        }

        #toolbarContainer.light #debug-bar table tbody tr:hover {
            background-color: #DFDFDF;
        }

        #toolbarContainer.light #debug-bar table tbody tr.current {
            background-color: #FDC894;
        }

        #toolbarContainer.light #debug-bar table tbody tr.current:hover td {
            background-color: #DD4814;
            color: #FFFFFF;
        }

        #toolbarContainer.light #debug-bar .toolbar {
            background-color: #FFFFFF;
            box-shadow: 0 0 4px #DFDFDF;
            -moz-box-shadow: 0 0 4px #DFDFDF;
            -webkit-box-shadow: 0 0 4px #DFDFDF;
        }

        #toolbarContainer.light #debug-bar .toolbar img {
            filter: brightness(0) invert(0.4);
        }

        #toolbarContainer.light #debug-bar.fixed-top .toolbar {
            box-shadow: 0 0 4px #DFDFDF;
            -moz-box-shadow: 0 0 4px #DFDFDF;
            -webkit-box-shadow: 0 0 4px #DFDFDF;
        }

        #toolbarContainer.light #debug-bar.fixed-top .tab {
            box-shadow: 0 1px 4px #DFDFDF;
            -moz-box-shadow: 0 1px 4px #DFDFDF;
            -webkit-box-shadow: 0 1px 4px #DFDFDF;
        }

        #toolbarContainer.light #debug-bar .muted {
            color: #434343;
        }

        #toolbarContainer.light #debug-bar .muted td {
            color: #DFDFDF;
        }

        #toolbarContainer.light #debug-bar .muted:hover td {
            color: #434343;
        }

        #toolbarContainer.light #debug-bar #toolbar-position,
        #toolbarContainer.light #debug-bar #toolbar-theme {
            filter: brightness(0) invert(0.6);
        }

        #toolbarContainer.light #debug-bar .ci-label.active {
            background-color: #DFDFDF;
        }

        #toolbarContainer.light #debug-bar .ci-label:hover {
            background-color: #DFDFDF;
        }

        #toolbarContainer.light #debug-bar .ci-label .badge {
            background-color: #DD4814;
            color: #FFFFFF;
        }

        #toolbarContainer.light #debug-bar .tab {
            background-color: #FFFFFF;
            box-shadow: 0 -1px 4px #DFDFDF;
            -moz-box-shadow: 0 -1px 4px #DFDFDF;
            -webkit-box-shadow: 0 -1px 4px #DFDFDF;
        }

        #toolbarContainer.light #debug-bar .timeline th,
        #toolbarContainer.light #debug-bar .timeline td {
            border-color: #DFDFDF;
        }

        #toolbarContainer.light #debug-bar .timeline .timer {
            background-color: #DD8615;
        }

        #toolbarContainer.light .debug-view.show-view {
            border-color: #DD8615;
        }

        #toolbarContainer.light .debug-view-path {
            background-color: #FDC894;
            color: #434343;
        }

        .debug-bar-width30 {
            width: 30%;
        }

        .debug-bar-width10 {
            width: 10%;
        }

        .debug-bar-width70p {
            width: 70px;
        }

        .debug-bar-width190p {
            width: 190px;
        }

        .debug-bar-width20e {
            width: 20em;
        }

        .debug-bar-width6r {
            width: 6rem;
        }

        .debug-bar-ndisplay {
            display: none;
        }

        .debug-bar-alignRight {
            text-align: right;
        }

        .debug-bar-alignLeft {
            text-align: left;
        }

        .debug-bar-noverflow {
            overflow: hidden;
        }

        .debug-bar-timeline-0 {
            left: 36.414861679077%;
            width: 44.753551483154%;
        }

        .debug-bar-timeline-1 {
            left: 38.946866989136%;
            width: 8.5914134979248%;
        }

        .debug-bar-timeline-2 {
            left: 81.173181533813%;
            width: 0.14344851175944%;
        }

        .debug-bar-timeline-3 {
            left: 86.091756820679%;
            width: 0.14662742614746%;
        }

        .debug-bar-timeline-4 {
            left: 86.251894632975%;
            width: 11.651515960693%;
        }

        .debug-bar-timeline-5 {
            left: 86.258252461751%;
            width: 1.9617875417074%;
        }

        .debug-bar-timeline-6 {
            left: 94.345013300578%;
            width: 3.4034252166748%;
        }

        .debug-bar-timeline-7 {
            left: 98.003546396891%;
            width: 1.7646948496501%;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FileHub | Responsive Bootstrap 4 Admin Dashboard Template</title>
    <link rel="stylesheet" href="css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="vendor/remixicon/fonts/remixicon.css">
</head>

<body class="  " cz-shortcut-listen="true">
    <!-- loader Start -->
    <div class="debug-view show-view">
        <div class="debug-view-path">1 APPPATH/Views/home_view.php</div>
        <div id="loading" style="display: none;">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">

            <div class="iq-sidebar  sidebar-default ">
                <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                    <a href="index.html" class="header-logo">
                        <img src="images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                    </a>
                    <div class="iq-menu-bt-sidebar">
                        <i class="las la-bars wrapper-menu"></i>
                    </div>
                </div>
                <div class="data-scrollbar" data-scroll="1" data-scrollbar="true" tabindex="-1" style="overflow: hidden; outline: none;">
                    <div class="scroll-content">
                        <div class="new-create select-dropdown input-prepend input-append">
                            <div class="btn-group">
                                <div data-toggle="dropdown">
                                    <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Create New</div><span class="search-replace"></span>
                                    <span class="caret"><!--icon--></span>
                                </div>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="item"><i class="ri-folder-add-line pr-3"></i>New Folder</div>
                                    </li>
                                    <li>
                                        <div class="item"><i class="ri-file-upload-line pr-3"></i>Upload Files</div>
                                    </li>
                                    <li>
                                        <div class="item"><i class="ri-folder-upload-line pr-3"></i>Upload Folders</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <nav class="iq-sidebar-menu">
                            <ul id="iq-sidebar-toggle" class="iq-menu">
                                <li class="active">
                                    <a href="../backend/index.html" class="">
                                        <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                                    </a>
                                    <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="#mydrive" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                        <i class="las la-hdd"></i><span>My Drive</span>
                                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                    </a>
                                    <ul id="mydrive" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                        <li class=" ">
                                            <a href="../backend/page-alexa.html">
                                                <i class="lab la-blogger-b"></i><span>Alexa Workshop</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../backend/page-android.html">
                                                <i class="las la-share-alt"></i><span>Android</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../backend/page-brightspot.html">
                                                <i class="las la-icons"></i><span>Brightspot</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../backend/page-ionic.html">
                                                <i class="las la-icons"></i><span>Ionic Chat App</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="../backend/page-files.html" class="">
                                        <i class="lar la-file-alt iq-arrow-left"></i><span>Files</span>
                                    </a>
                                    <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="../backend/page-folders.html" class="">
                                        <i class="las la-stopwatch iq-arrow-left"></i><span>Recent</span>
                                    </a>
                                    <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="../backend/page-favourite.html" class="">
                                        <i class="lar la-star"></i><span>Favourite</span>
                                    </a>
                                    <ul id="page-fevourite" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="../backend/page-delete.html" class="">
                                        <i class="las la-trash-alt iq-arrow-left"></i><span>Trash</span>
                                    </a>
                                    <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                        <i class="lab la-wpforms iq-arrow-left"></i><span>other page</span>
                                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                    </a>
                                    <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                        <li class=" ">
                                            <a href="#user" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                                <i class="las la-user-cog"></i><span>User Details</span>
                                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                            </a>
                                            <ul id="user" class="iq-submenu collapse" data-parent="#otherpage">
                                                <li class=" ">
                                                    <a href="../app/user-profile.html">
                                                        <i class="las la-id-card"></i><span>User Profile</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../app/user-add.html">
                                                        <i class="las la-user-plus"></i><span>User Add</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../app/user-list.html">
                                                        <i class="las la-list-alt"></i><span>User List</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="#ui" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                                <i class="lab la-uikit iq-arrow-left"></i><span>UI Elements</span>
                                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                            </a>
                                            <ul id="ui" class="iq-submenu collapse" data-parent="#otherpage">
                                                <li class=" ">
                                                    <a href="../backend/ui-avatars.html">
                                                        <i class="las la-user-tie"></i><span>Avatars</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-alerts.html">
                                                        <i class="las la-exclamation-triangle"></i><span>Alerts</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-badges.html">
                                                        <i class="las la-id-badge"></i><span>Badges</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-breadcrumb.html">
                                                        <i class="las la-ellipsis-h"></i><span>Breadcrumb</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-buttons.html">
                                                        <i class="las la-ticket-alt"></i><span>Buttons</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-buttons-group.html">
                                                        <i class="las la-object-group"></i><span>Buttons Group</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-boxshadow.html">
                                                        <i class="las la-boxes"></i><span>Box Shadow</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-colors.html">
                                                        <i class="las la-brush"></i><span>Colors</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-cards.html">
                                                        <i class="las la-credit-card"></i><span>Cards</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-carousel.html">
                                                        <i class="las la-sliders-h"></i><span>Carousel</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-grid.html">
                                                        <i class="las la-th-large"></i><span>Grid</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-helper-classes.html">
                                                        <i class="las la-hands-helping"></i><span>Helper classes</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-images.html">
                                                        <i class="las la-image"></i><span>Images</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-list-group.html">
                                                        <i class="las la-list-alt"></i><span>list Group</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-media-object.html">
                                                        <i class="las la-photo-video"></i><span>Media</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-modal.html">
                                                        <i class="las la-columns"></i><span>Modal</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-notifications.html">
                                                        <i class="las la-bell"></i><span>Notifications</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-pagination.html">
                                                        <i class="las la-ellipsis-h"></i><span>Pagination</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-popovers.html">
                                                        <i class="las la-spinner"></i><span>Popovers</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-progressbars.html">
                                                        <i class="las la-heading"></i><span>Progressbars</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-typography.html">
                                                        <i class="las la-tablet"></i><span>Typography</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-tabs.html">
                                                        <i class="las la-tablet"></i><span>Tabs</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-tooltips.html">
                                                        <i class="las la-magnet"></i><span>Tooltips</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/ui-embed-video.html">
                                                        <i class="las la-play-circle"></i><span>Video</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="#auth" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                                <i class="las la-torah iq-arrow-left"></i><span>Authentication</span>
                                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                            </a>
                                            <ul id="auth" class="iq-submenu collapse" data-parent="#otherpage">
                                                <li class=" ">
                                                    <a href="../backend/auth-sign-in.html">
                                                        <i class="las la-sign-in-alt"></i><span>Login</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/auth-sign-up.html">
                                                        <i class="las la-registered"></i><span>Register</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/auth-recoverpw.html">
                                                        <i class="las la-unlock-alt"></i><span>Recover Password</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/auth-confirm-mail.html">
                                                        <i class="las la-envelope-square"></i><span>Confirm Mail</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/auth-lock-screen.html">
                                                        <i class="las la-lock"></i><span>Lock Screen</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="#pricing" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                                <i class="las la-coins"></i><span>Pricing</span>
                                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                            </a>
                                            <ul id="pricing" class="iq-submenu collapse" data-parent="#otherpage">
                                                <li class=" ">
                                                    <a href="../backend/pricing.html">
                                                        <i class="las la-weight"></i><span>Pricing 1</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/pricing-2.html">
                                                        <i class="las la-dna"></i><span>Pricing 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="#pages-error" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                                <i class="las la-exclamation-triangle"></i><span>Error</span>
                                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                            </a>
                                            <ul id="pages-error" class="iq-submenu collapse" data-parent="#otherpage">
                                                <li class=" ">
                                                    <a href="../backend/pages-error.html">
                                                        <i class="las la-bomb"></i><span>Error 404</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="../backend/pages-error-500.html">
                                                        <i class="las la-exclamation-circle"></i><span>Error 500</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="../backend/pages-blank-page.html">
                                                <i class="las la-pager"></i><span>Blank Page</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="../backend/pages-maintenance.html">
                                                <i class="las la-cubes"></i><span>Maintenance</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="sidebar-bottom">
                            <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Storage</h4>
                            <p>17.1 / 20 GB Used</p>
                            <div class="iq-progress-bar mb-3">
                                <span class="bg-primary iq-progress progress-1" data-percent="67" style="transition: width 2s ease 0s; width: 67%;">
                                </span>
                            </div>
                            <p>75% Full - 3.9 GB Free</p>
                            <a href="#" class="btn btn-outline-primary view-more mt-4">Buy Storage</a>
                        </div>
                        <div class="p-3"></div>
                    </div>
                    <div class="scrollbar-track scrollbar-track-x" style="display: none;">
                        <div class="scrollbar-thumb scrollbar-thumb-x" style="width: 260px; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                    <div class="scrollbar-track scrollbar-track-y" style="display: none;">
                        <div class="scrollbar-thumb scrollbar-thumb-y" style="height: 937px; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                </div>
            </div>
            <div class="iq-top-navbar fixed">
                <div class="iq-navbar-custom">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                            <i class="ri-menu-line wrapper-menu"></i>
                            <a href="index.html" class="header-logo">
                                <img src="images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                            </a>
                        </div>
                        <div class="iq-search-bar device-search">

                            <form>
                                <div class="input-prepend input-append">
                                    <div class="btn-group">
                                        <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                            <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Type here to search..."><span class="search-replace"></span>
                                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                            <span class="caret"><!--icon--></span>
                                        </label>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">
                                                    <div class="item"><i class="far fa-file-pdf bg-info"></i>PDFs</div>
                                                </a></li>
                                            <li><a href="#">
                                                    <div class="item"><i class="far fa-file-alt bg-primary"></i>Documents</div>
                                                </a></li>
                                            <li><a href="#">
                                                    <div class="item"><i class="far fa-file-excel bg-success"></i>Spreadsheet</div>
                                                </a></li>
                                            <li><a href="#">
                                                    <div class="item"><i class="far fa-file-powerpoint bg-danger"></i>Presentation</div>
                                                </a></li>
                                            <li><a href="#">
                                                    <div class="item"><i class="far fa-file-image bg-warning"></i>Photos &amp; Images</div>
                                                </a></li>
                                            <li><a href="#">
                                                    <div class="item"><i class="far fa-file-video bg-info"></i>Videos</div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="d-flex align-items-center">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                                <i class="ri-menu-3-line"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                    <li class="nav-item nav-icon search-content">
                                        <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-search-line"></i>
                                        </a>
                                        <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                            <form action="#" class="searchbox p-2">
                                                <div class="form-group mb-0 position-relative">
                                                    <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                    <a href="#" class="search-link"><i class="las la-search"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon dropdown">
                                        <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-question-line"></i>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton01">
                                            <div class="card shadow-none m-0">
                                                <div class="card-body p-0 ">
                                                    <div class="p-3">
                                                        <a href="#" class="iq-sub-card pt-0"><i class="ri-questionnaire-line"></i>Help</a>
                                                        <a href="#" class="iq-sub-card"><i class="ri-recycle-line"></i>Training</a>
                                                        <a href="#" class="iq-sub-card"><i class="ri-refresh-line"></i>Updates</a>
                                                        <a href="#" class="iq-sub-card"><i class="ri-service-line"></i>Terms and Policy</a>
                                                        <a href="#" class="iq-sub-card"><i class="ri-feedback-line"></i>Send Feedback</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon dropdown">
                                        <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-settings-3-line"></i>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton02">
                                            <div class="card shadow-none m-0">
                                                <div class="card-body p-0 ">
                                                    <div class="p-3">
                                                        <a href="#" class="iq-sub-card pt-0"><i class="ri-settings-3-line"></i> Settings</a>
                                                        <a href="#" class="iq-sub-card"><i class="ri-hard-drive-line"></i> Get Drive for desktop</a>
                                                        <a href="#" class="iq-sub-card"><i class="ri-keyboard-line"></i> Keyboard Shortcuts</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon dropdown caption-content">
                                        <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="caption bg-primary line-height">P</div>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                            <div class="card mb-0">
                                                <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                                    <div class="header-title">
                                                        <h4 class="card-title mb-0">Profile</h4>
                                                    </div>
                                                    <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i></div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="profile-header">
                                                        <div class="cover-container text-center">
                                                            <div class="rounded-circle profile-icon bg-primary mx-auto d-block">
                                                                P
                                                                <a href="">

                                                                </a>
                                                            </div>
                                                            <div class="profile-detail mt-3">
                                                                <h5><a href="../app/user-profile-edit.html">Panny Marco</a></h5>
                                                                <p>pannymarco@gmail.com</p>
                                                            </div>
                                                            <a href="auth-sign-in.html" class="btn btn-primary">Sign Out</a>
                                                        </div>
                                                        <div class="profile-details mt-4 pt-4 border-top">
                                                            <div class="media align-items-center mb-3">
                                                                <div class="rounded-circle iq-card-icon-small bg-primary">
                                                                    A
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <div class="media justify-content-between">
                                                                        <h6 class="mb-0">Anna Mull</h6>
                                                                        <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                                    </div>
                                                                    <p class="mb-0 font-size-12">annamull@gmail.com</p>
                                                                </div>
                                                            </div>
                                                            <div class="media align-items-center mb-3">
                                                                <div class="rounded-circle iq-card-icon-small bg-success">
                                                                    K
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <div class="media justify-content-between">
                                                                        <h6 class="mb-0">King Poilin</h6>
                                                                        <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                                    </div>
                                                                    <p class="mb-0 font-size-12">kingpoilin@gmail.com</p>
                                                                </div>
                                                            </div>
                                                            <div class="media align-items-center">
                                                                <div class="rounded-circle iq-card-icon-small bg-danger">
                                                                    D
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <div class="media justify-content-between">
                                                                        <h6 class="mb-0">Devid Worner</h6>
                                                                        <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                                    </div>
                                                                    <p class="mb-0 font-size-12">devidworner@gmail.com</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="content-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-transparent card-block card-stretch card-height mb-3">
                                <div class="d-flex justify-content-between">
                                    <div class="select-dropdown input-prepend input-append">
                                        <div class="btn-group">
                                            <div data-toggle="dropdown">
                                                <div class="dropdown-toggle search-query">My Drive<i class="las la-angle-down ml-3"></i></div><span class="search-replace"></span>
                                                <span class="caret"><!--icon--></span>
                                            </div>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="item"><i class="ri-folder-add-line pr-3"></i>New Folder</div>
                                                </li>
                                                <li>
                                                    <div class="item"><i class="ri-file-upload-line pr-3"></i>Upload Files</div>
                                                </li>
                                                <li>
                                                    <div class="item"><i class="ri-folder-upload-line pr-3"></i>Upload Folders</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard1-dropdown d-flex align-items-center">
                                        <div class="dashboard1-info">
                                            <a href="#calander" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                                <i class="ri-arrow-down-s-line"></i>
                                            </a>
                                            <ul id="calander" class="iq-dropdown collapse list-inline m-0 p-0 mt-2">
                                                <li class="mb-2">
                                                    <a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Calander"><i class="las la-calendar iq-arrow-left"></i></a>
                                                </li>
                                                <li class="mb-2">
                                                    <a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Keep"><i class="las la-lightbulb iq-arrow-left"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tasks"><i class="las la-tasks iq-arrow-left"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="card card-block card-stretch card-transparent ">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <div class="header-title">
                                        <h4 class="card-title">Documents</h4>
                                    </div>
                                    <div class="card-header-toolbar d-flex align-items-center">
                                        <a href="./page-folders.html" class=" view-more">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body image-thumb">
                                    <a href="#" data-title="Terms.pdf" data-load-file="file" data-load-target="#resolte-contaniner" data-url="vendor/doc-viewer/files/demo.pdf" data-toggle="modal" data-target="#exampleModal">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <div class="iq-image-overlay"></div>
                                            <img src="images/layouts/page-1/pdf.png" class="img-fluid" alt="image1">
                                        </div>
                                        <h6>Terms.pdf</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body image-thumb">
                                    <a href="#" data-title="New-one.docx" data-load-file="file" data-load-target="#resolte-contaniner" data-url="vendor/doc-viewer/files/demo.docx" data-toggle="modal" data-target="#exampleModal">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <div class="iq-image-overlay"></div>
                                            <img src="images/layouts/page-1/doc.png" class="img-fluid" alt="image1">
                                        </div>
                                        <h6>New-one.docx</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body image-thumb">
                                    <a href="#" data-title="Woo-box.xlsx" data-load-file="file" data-load-target="#resolte-contaniner" data-url="vendor/doc-viewer/files/demo.xlsx" data-toggle="modal" data-target="#exampleModal">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <div class="iq-image-overlay"></div>
                                            <img src="images/layouts/page-1/xlsx.png" class="img-fluid" alt="image1">
                                        </div>
                                        <h6>Woo-box.xlsx</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body image-thumb doc-text">
                                    <a href="#" data-title="IOS-content.pptx" data-load-file="file" data-load-target="#resolte-contaniner" data-url="vendor/doc-viewer/files/demo.pptx" data-toggle="modal" data-target="#exampleModal">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <div class="iq-image-overlay"></div>
                                            <img src="images/layouts/page-1/ppt.png" class="img-fluid" alt="image1">
                                        </div>
                                        <h6>IOS-content.pptx</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch card-transparent">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <div class="header-title">
                                        <h4 class="card-title">Folders</h4>
                                    </div>
                                    <div class="card-header-toolbar d-flex align-items-center">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle dropdown-bg btn bg-white" id="dropdownMenuButton1" data-toggle="dropdown">
                                                Name<i class="ri-arrow-down-s-line ml-1"></i>
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton1">
                                                <a class="dropdown-item" href="#">Last modified</a>
                                                <a class="dropdown-item" href="#">Last modifiedby me</a>
                                                <a class="dropdown-item" href="#">Last opened by me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="./page-alexa.html" class="folder">
                                            <div class="icon-small bg-danger rounded mb-4">
                                                <i class="ri-file-copy-line"></i>
                                            </div>
                                        </a>
                                        <div class="card-header-toolbar">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown">
                                                    <i class="ri-more-2-fill"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="./page-alexa.html" class="folder">
                                        <h5 class="mb-2">Alexa Workshop</h5>
                                        <p class="mb-2"><i class="lar la-clock text-danger mr-2 font-size-20"></i> 10 Dec, 2020</p>
                                        <p class="mb-0"><i class="las la-file-alt text-danger mr-2 font-size-20"></i> 08 Files</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="./page-android.html" class="folder">
                                            <div class="icon-small bg-primary rounded mb-4">
                                                <i class="ri-file-copy-line"></i>
                                            </div>
                                        </a>
                                        <div class="card-header-toolbar">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton3" data-toggle="dropdown">
                                                    <i class="ri-more-2-fill"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton3">
                                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="./page-android.html" class="folder">
                                        <h5 class="mb-2">Android</h5>
                                        <p class="mb-2"><i class="lar la-clock text-primary mr-2 font-size-20"></i> 09 Dec, 2020</p>
                                        <p class="mb-0"><i class="las la-file-alt text-primary mr-2 font-size-20"></i> 08 Files</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="./page-brightspot.html" class="folder">
                                            <div class="icon-small bg-info rounded mb-4">
                                                <i class="ri-file-copy-line"></i>
                                            </div>
                                        </a>
                                        <div class="card-header-toolbar">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton4" data-toggle="dropdown">
                                                    <i class="ri-more-2-fill"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="./page-brightspot.html" class="folder">
                                        <h5 class="mb-2">Brightspot</h5>
                                        <p class="mb-2"><i class="lar la-clock text-info mr-2 font-size-20"></i> 07 Dec, 2020</p>
                                        <p class="mb-0"><i class="las la-file-alt text-info mr-2 font-size-20"></i> 08 Files</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="./page-ionic.html" class="folder">
                                            <div class="icon-small bg-success rounded mb-4">
                                                <i class="ri-file-copy-line"></i>
                                            </div>
                                        </a>
                                        <div class="card-header-toolbar">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton5" data-toggle="dropdown">
                                                    <i class="ri-more-2-fill"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="./page-ionic.html" class="folder">
                                        <h5 class="mb-2">Ionic Chat App</h5>
                                        <p class="mb-2"><i class="lar la-clock text-success mr-2 font-size-20"></i> 06 Dec, 2020</p>
                                        <p class="mb-0"><i class="las la-file-alt text-success mr-2 font-size-20"></i> 08 Files</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-block card-stretch card-height files-table">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Files</h4>
                                    </div>
                                    <div class="card-header-toolbar d-flex align-items-center">
                                        <a href="./page-files.html" class=" view-more">View All</a>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-borderless tbl-server-info">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Members</th>
                                                    <th scope="col">Last Edit</th>
                                                    <th scope="col">Size</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-danger rounded mr-3">
                                                                <i class="ri-file-excel-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="vendor/doc-viewer/files/demo.pdf" data-toggle="modal" data-target="#exampleModal" data-title="Weekly-report.pdf" style="cursor: pointer;">Weekly-report.pdf</div>
                                                        </div>
                                                    </td>
                                                    <td>Me</td>
                                                    <td>jan 21, 2020 me</td>
                                                    <td>02 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton6" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="active">
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-primary rounded mr-3">
                                                                <i class="ri-file-download-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.pdf" data-toggle="modal" data-target="#exampleModal" data-title="VueJs.pdf" style="cursor: pointer;">VueJs.pdf</div>
                                                        </div>
                                                    </td>
                                                    <td>Poul Molive</td>
                                                    <td>jan 25, 2020 Poul Molive</td>
                                                    <td>64 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton7" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton7">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-info rounded mr-3">
                                                                <i class="ri-file-excel-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.docx" data-toggle="modal" data-target="#exampleModal" data-title="Milestone.docx" style="cursor: pointer;">Milestone.docx</div>
                                                        </div>
                                                    </td>
                                                    <td>Me</td>
                                                    <td>Mar 30, 2020 Gail Forcewind</td>
                                                    <td>30 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton8" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton8">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-success rounded mr-3">
                                                                <i class="ri-file-excel-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.xlsx" data-toggle="modal" data-target="#exampleModal" data-title="Training center.xlsx" style="cursor: pointer;">Training center.xlsx</div>
                                                        </div>
                                                    </td>
                                                    <td>Me</td>
                                                    <td>Mar 30, 2020 Gail Forcewind</td>
                                                    <td>10 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton09" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton09">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-warning rounded mr-3">
                                                                <i class="ri-file-excel-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.pptx" data-toggle="modal" data-target="#exampleModal" data-title="Flavour.pptx" style="cursor: pointer;">Flavour.pptx</div>
                                                        </div>
                                                    </td>
                                                    <td>Me</td>
                                                    <td>Mar 30, 2020 Gail Forcewind</td>
                                                    <td>10 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton9" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton9">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- Wrapper End-->
        <footer class="iq-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        <span class="mr-1">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>2023©
                        </span> <a href="#" class="">FileHub</a>.
                    </div>
                </div>
            </div>
        </footer>
        <!-- Backend Bundle JavaScript -->





























        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Title</h4>
                        <div>
                            <a class="btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div id="resolte-contaniner" style="height: 500px;" class="overflow-auto">
                            File not found
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div hidden="">
            <div style="width: 100%; height: 100%; position: relative;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="group" style="width: 100%; height: 100%; overflow: visible;">
                    <desc>JavaScript chart by amCharts</desc>
                    <defs>
                        <clipPath id="id-122">
                            <path></path>
                        </clipPath>
                        <filter id="filter-id-127" width="200%" height="200%" x="-50%" y="-50%">
                            <feGaussianBlur result="blurOut" in="SourceGraphic" stdDeviation="1.5"></feGaussianBlur>
                            <feOffset result="offsetBlur" dx="1" dy="1"></feOffset>
                            <feFlood flood-color="#000000" flood-opacity="0.5"></feFlood>
                            <feComposite in2="offsetBlur" operator="in"></feComposite>
                            <feMerge>
                                <feMergeNode></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>
                        </filter>
                    </defs>
                </svg></div>
        </div><svg id="SvgjsSvg1075" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
            <defs id="SvgjsDefs1076"></defs>
            <polyline id="SvgjsPolyline1077" points="0,0"></polyline>
            <path id="SvgjsPath1078" d="M0 0 "></path>
        </svg>




        <div id="toolbarContainer">
            <div id="debug-icon" class="debug-bar-ndisplay" style="display: inline-block;">
                <a id="debug-icon-link" href="javascript:void(0)">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 155 200">
                        <defs></defs>
                        <path fill="#dd4814" d="M73.7 3.7c2.2 7.9-.7 18.5-7.8 29-1.8 2.6-10.7 12.2-19.7 21.3-23.9 24-33.6 37.1-40.3 54.4-7.9 20.6-7.8 40.8.5 58.2C12.8 180 27.6 193 42.5 198l6 2-3-2.2c-21-15.2-22.9-38.7-4.8-58.8 2.5-2.7 4.8-5 5.1-5 .4 0 .7 2.7.7 6.1 0 5.7.2 6.2 3.7 9.5 3 2.7 4.6 3.4 7.8 3.4 5.6 0 9.9-2.4 11.6-6.5 2.9-6.9 1.6-12-5-20.5-10.5-13.4-11.7-23.3-4.3-34.7l3.1-4.8.7 4.7c1.3 8.2 5.8 12.9 25 25.8 20.9 14.1 30.6 26.1 32.8 40.5 1.1 7.2-.1 16.1-3.1 21.8-2.7 5.3-11.2 14.3-16.5 17.4-2.4 1.4-4.3 2.6-4.3 2.8 0 .2 2.4-.4 5.3-1.4 24.1-8.3 42.7-27.1 48.2-48.6 1.9-7.6 1.9-20.2-.1-28.5-3.5-15.2-14.6-30.5-29.9-41.2l-7-4.9-.6 3.3c-.8 4.8-2.6 7.6-5.9 9.3-4.5 2.3-10.3 1.9-13.8-1-6.7-5.7-7.8-14.6-3.7-30.5 3-11.6 3.2-20.6.5-29.1C88.3 18 80.6 6.3 74.8 2.2 73.1.9 73 1 73.7 3.7z"></path>
                    </svg>
                </a>
            </div>
            <div id="debug-bar" style="display: none;">
                <div class="toolbar">
                    <span id="toolbar-position"><a href="javascript: void(0)">↕</a></span>
                    <span id="toolbar-theme"><a href="javascript: void(0)">🔅</a></span>
                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-timeline">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAD7SURBVEhLY6ArSEtLK09NTbWHcvGC9PR0BaDaQiAdUl9fzwQVxg+AFvwHamqHcnGCpKQkeaDa9yD1UD09UCn8AKaBWJySkmIApFehi0ONwwRQBceBLurAh4FqFoHUAtkrgPgREN+ByYEw1DhMANVEMIhAYQ5U1wtU/wmILwLZRlAp/IBYC8gGw88CaFj3A/FnIL4ETDXGUCnyANSC/UC6HIpnQMXAqQXIvo0khxNDjcMEQEmU9AzDuNI7Lgw1DhOAJIEuhQcRKMcC+e+QNHdDpcgD6BaAANSSQqBcENFlDi6AzQKqgkFlwWhxjVI8o2OgmkFaXI8CTMDAAAAxd1O4FzLMaAAAAABJRU5ErkJggg==">
                            <span class="hide-sm">58.8 ms &nbsp; 1.685 MB</span>
                        </a>
                    </span>

                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-logs">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACYSURBVEhLYxgFJIHU1FSjtLS0i0D8AYj7gEKMEBkqAaAFF4D4ERCvAFrwH4gDoFIMKSkpFkB+OTEYqgUTACXfA/GqjIwMQyD9H2hRHlQKJFcBEiMGQ7VgAqCBvUgK32dmZspCpagGGNPT0/1BLqeF4bQHQJePpiIwhmrBBEADR1MRfgB0+WgqAmOoFkwANHA0FY0CUgEDAwCQ0PUpNB3kqwAAAABJRU5ErkJggg==">
                            <span class="hide-sm">
                                Logs </span>
                        </a>
                    </span>
                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-views" class="active">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADeSURBVEhL7ZSxDcIwEEWNYA0YgGmgyAaJLTcUaaBzQQEVjMEabBQxAdw53zTHiThEovGTfnE/9rsoRUxhKLOmaa6Uh7X2+UvguLCzVxN1XW9x4EYHzik033Hp3X0LO+DaQG8MDQcuq6qao4qkHuMgQggLvkPLjqh00ZgFDBacMJYFkuwFlH1mshdkZ5JPJERA9JpI6xNCBESvibQ+IURA9JpI6xNCBESvibQ+IURA9DTsuHTOrVFFxixgB/eUFlU8uKJ0eDBFOu/9EvoeKnlJS2/08Tc8NOwQ8sIfMeYFjqKDjdU2sp4AAAAASUVORK5CYII=">
                            <span class="hide-sm">
                                Views <span class="badge">1</span>
                            </span>
                        </a>
                    </span>
                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-files">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGBSURBVEhL7ZQ9S8NQGIVTBQUncfMfCO4uLgoKbuKQOWg+OkXERRE1IAXrIHbVDrqIDuLiJgj+gro7S3dnpfq88b1FMTE3VZx64HBzzvvZWxKnj15QCcPwCD5HUfSWR+JtzgmtsUcQBEva5IIm9SwSu+95CAWbUuy67qBa32ByZEDpIaZYZSZMjjQuPcQUq8yEyYEb8FSerYeQVGbAFzJkX1PyQWLhgCz0BxTCekC1Wp0hsa6yokzhed4oje6Iz6rlJEkyIKfUEFtITVtQdAibn5rMyaYsMS+a5wTv8qeXMhcU16QZbKgl3hbs+L4/pnpdc87MElZgq10p5DxGdq8I7xrvUWUKvG3NbSK7ubngYzdJwSsF7TiOh9VOgfcEz1UayNe3JUPM1RWC5GXYgTfc75B4NBmXJnAtTfpABX0iPvEd9ezALwkplCFXcr9styiNOKc1RRZpaPM9tcqBwlWzGY1qPL9wjqRBgF5BH6j8HWh2S7MHlX8PrmbK+k/8PzjOOzx1D3i1pKTTAAAAAElFTkSuQmCC">
                            <span class="hide-sm">
                                Files <span class="badge">118</span>
                            </span>
                        </a>
                    </span>
                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-routes">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFDSURBVEhL7ZRNSsNQFIUjVXSiOFEcuQIHDpzpxC0IGYeE/BEInbWlCHEDLsSiuANdhKDjgm6ggtSJ+l25ldrmmTwIgtgDh/t37r1J+16cX0dRFMtpmu5pWAkrvYjjOB7AETzStBFW+inxu3KUJMmhludQpoflS1zXban4LYqiO224h6VLTHr8Z+z8EpIHFF9gG78nDVmW7UgTHKjsCyY98QP+pcq+g8Ku2s8G8X3f3/I8b038WZTp+bO38zxfFd+I6YY6sNUvFlSDk9CRhiAI1jX1I9Cfw7GG1UB8LAuwbU0ZwQnbRDeEN5qqBxZMLtE1ti9LtbREnMIuOXnyIf5rGIb7Wq8HmlZgwYBH7ORTcKH5E4mpjeGt9fBZcHE2GCQ3Vt7oTNPNg+FXLHnSsHkw/FR+Gg2bB8Ptzrst/v6C/wrH+QB+duli6MYJdQAAAABJRU5ErkJggg==">
                            <span class="hide-sm">
                                Routes <span class="badge">3</span>
                            </span>
                        </a>
                    </span>
                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-events">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEASURBVEhL7ZXNDcIwDIVTsRBH1uDQDdquUA6IM1xgCA6MwJUN2hk6AQzAz0vl0ETUxC5VT3zSU5w81/mRMGZysixbFEVR0jSKNt8geQU9aRpFmp/keX6AbjZ5oB74vsaN5lSzA4tLSjpBFxsjeSuRy4d2mDdQTWU7YLbXTNN05mKyovj5KL6B7q3hoy3KwdZxBlT+Ipz+jPHrBqOIynZgcZonoukb/0ckiTHqNvDXtXEAaygRbaB9FvUTjRUHsIYS0QaSp+Dw6wT4hiTmYHOcYZsdLQ2CbXa4ftuuYR4x9vYZgdb4vsFYUdmABMYeukK9/SUme3KMFQ77+Yfzh8eYF8+orDuDWU5LAAAAAElFTkSuQmCC">
                            <span class="hide-sm">
                                Events <span class="badge">1</span>
                            </span>
                        </a>
                    </span>
                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-history">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAJySURBVEhL3ZU7aJNhGIVTpV6i4qCIgkIHxcXLErS4FBwUFNwiCKGhuTYJGaIgnRoo4qRu6iCiiIuIXXTTIkIpuqoFwaGgonUQlC5KafU5ycmNP0lTdPLA4fu+8573/a4/f6hXpFKpwUwmc9fDfweKbk+n07fgEv33TLSbtt/hvwNFT1PsG/zdTE0Gp+GFfD6/2fbVIxqNrqPIRbjg4t/hY8aztcngfDabHXbKyiiXy2vcrcPH8oDCry2FKDrA+Ar6L01E/ypyXzXaARjDGGcoeNxSDZXE0dHRA5VRE5LJ5CFy5jzJuOX2wHRHRnjbklZ6isQ3tIctBaAd4vlK3jLtkOVWqABBXd47jGHLmjTmSScttQV5J+SjfcUweFQEbsjAas5aqoCLXutJl7vtQsAzpRowYqkBinyCC8Vicb2lOih8zoldd0F8RD7qTFiqAnGrAy8stUAvi/hbqDM+YzkAFrLPdR5ZqoLXsd+Bh5YCIH7JniVdquUWxOPxDfboHhrI5XJ7HHhiqQXox+APe/Qk64+gGYVCYZs8cMpSFQj9JOoFzVqqo7k4HIvFYpscCoAjOmLffUsNUGRaQUwDlmofUa34ecsdgXdcXo4wbakBgiUFafXJV8A4DJ/2UrxUKm3E95H8RbjLcgOJRGILhnmCP+FBy5XvwN2uIPcy1AJvWgqC4xm2aU4Xb3lF4I+Tpyf8hRe5w3J7YLymSeA8Z3nSclv4WLRyFdfOjzrUFX0klJUEtZtntCNc+F69cz/FiDzEPtjzmcUMOr83kDQEX6pAJxJfpL3OX22n01YN7SZCoQnaSdoZ+Jz+PZihH3wt/xlCoT9M6nEtmRSPCQAAAABJRU5ErkJggg==">
                            <span class="hide-sm">
                                History <span class="badge">20</span>
                            </span>
                        </a>
                    </span>

                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-vars">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACLSURBVEhLYxgFJIHU1NSraWlp/6H4T0pKSjRUijoAyXAwBlrYDpViAFpmARQrJwZDtWACoCROC4D8CnR5XBiqBRMADfyNprgRKkUdAApzoCUdUNwE5MtApYYIALp6NBWBMVQLJgAaOJqK8AOgq+mSio6DggjEBtLUT0UwQ5HZIADkj6aiUTAggIEBANAEDa/lkCRlAAAAAElFTkSuQmCC">
                            <span class="hide-sm">Vars</span>
                        </a>
                    </span>

                    <h1>
                        <span class="ci-label">
                            <a href="javascript: void(0)" data-tab="ci-config">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 155 200">
                                    <defs></defs>
                                    <path fill="#dd4814" d="M73.7 3.7c2.2 7.9-.7 18.5-7.8 29-1.8 2.6-10.7 12.2-19.7 21.3-23.9 24-33.6 37.1-40.3 54.4-7.9 20.6-7.8 40.8.5 58.2C12.8 180 27.6 193 42.5 198l6 2-3-2.2c-21-15.2-22.9-38.7-4.8-58.8 2.5-2.7 4.8-5 5.1-5 .4 0 .7 2.7.7 6.1 0 5.7.2 6.2 3.7 9.5 3 2.7 4.6 3.4 7.8 3.4 5.6 0 9.9-2.4 11.6-6.5 2.9-6.9 1.6-12-5-20.5-10.5-13.4-11.7-23.3-4.3-34.7l3.1-4.8.7 4.7c1.3 8.2 5.8 12.9 25 25.8 20.9 14.1 30.6 26.1 32.8 40.5 1.1 7.2-.1 16.1-3.1 21.8-2.7 5.3-11.2 14.3-16.5 17.4-2.4 1.4-4.3 2.6-4.3 2.8 0 .2 2.4-.4 5.3-1.4 24.1-8.3 42.7-27.1 48.2-48.6 1.9-7.6 1.9-20.2-.1-28.5-3.5-15.2-14.6-30.5-29.9-41.2l-7-4.9-.6 3.3c-.8 4.8-2.6 7.6-5.9 9.3-4.5 2.3-10.3 1.9-13.8-1-6.7-5.7-7.8-14.6-3.7-30.5 3-11.6 3.2-20.6.5-29.1C88.3 18 80.6 6.3 74.8 2.2 73.1.9 73 1 73.7 3.7z"></path>
                                </svg>
                                4.3.2 </a>
                        </span>
                    </h1>

                    <!-- Open/Close Toggle -->
                    <a id="debug-bar-link" href="javascript:void(0)" title="Open/Close">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEPSURBVEhL7ZVLDoJAEEThRuoGDwSEG+jCuFU34s3AK3APP1VDDSGMqI1xx0s6M/2rnlHEaMZElmWrPM+vsDvsYbQ7+us0TReSC2EBrEHxCevRYuppYLXkQpC8sVCuGfTvqSE3hFdFwUGuGfRvqSE35NUAfKZrbQNQm2jrMA+gOK+M+FmhDsRL5voHMA8gFGecq0JOXLWlQg7E7AMIxZnjOiZOEJ82gFCcedUE4gS56QP8yf8ywItz7e+RituKlkkDBoIOH4Nd4HZD4NsGYJ/Abn1xEVOcuZ8f0zc/tHiYmzTAwscBvDIK/veyQ9K/rnewjdF26q0kF1IUxZIFPAVW98x/a+qp8L2M/+HMhETRE6S8TxpZ7KGXAAAAAElFTkSuQmCC">
                    </a>
                </div>

                <!-- Timeline -->
                <div id="ci-timeline" class="tab">
                    <table class="timeline">
                        <thead>
                            <tr>
                                <th class="debug-bar-width30">NAME</th>
                                <th class="debug-bar-width10">COMPONENT</th>
                                <th class="debug-bar-width10">DURATION</th>
                                <th>0 ms</th>
                                <th>10 ms</th>
                                <th>20 ms</th>
                                <th>30 ms</th>
                                <th>40 ms</th>
                                <th>50 ms</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="timeline-parent" id="timeline-0_parent" onclick="ciDebugBar.toggleChildRows('timeline-0');">
                                <td class="" style="--level: 0;">
                                    <nav></nav>Bootstrap
                                </td>
                                <td class="">Timer</td>
                                <td class="debug-bar-alignRight">26.85 ms</td>
                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-0" title="44.75%"></span></td>
                            </tr>
                            <tr class="child-row" id="timeline-0_children" style="display: none;">
                                <td colspan="9" class="child-container">
                                    <table class="timeline">
                                        <tbody>
                                            <tr>
                                                <td class="debug-bar-width30" style="--level: 1;">Event: pre_system</td>
                                                <td class="debug-bar-width10">Events</td>
                                                <td class="debug-bar-width10 debug-bar-alignRight">5.15 ms</td>
                                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-1" title="8.59%"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="" style="--level: 0;">Routing</td>
                                <td class="">Timer</td>
                                <td class="debug-bar-alignRight">0.09 ms</td>
                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-2" title="0.14%"></span></td>
                            </tr>
                            <tr>
                                <td class="" style="--level: 0;">Before Filters</td>
                                <td class="">Timer</td>
                                <td class="debug-bar-alignRight">0.09 ms</td>
                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-3" title="0.15%"></span></td>
                            </tr>
                            <tr class="timeline-parent timeline-parent-open" id="timeline-4_parent" onclick="ciDebugBar.toggleChildRows('timeline-4');">
                                <td class="" style="--level: 0;">
                                    <nav></nav>Controller
                                </td>
                                <td class="">Timer</td>
                                <td class="debug-bar-alignRight">6.99 ms</td>
                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-4" title="11.65%"></span></td>
                            </tr>
                            <tr class="child-row" id="timeline-4_children" style="">
                                <td colspan="9" class="child-container">
                                    <table class="timeline">
                                        <tbody>
                                            <tr>
                                                <td class="debug-bar-width30" style="--level: 1;">Controller Constructor</td>
                                                <td class="debug-bar-width10">Timer</td>
                                                <td class="debug-bar-width10 debug-bar-alignRight">1.18 ms</td>
                                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-5" title="1.96%"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="debug-bar-width30" style="--level: 1;">View: home_view.php</td>
                                                <td class="debug-bar-width10">Views</td>
                                                <td class="debug-bar-width10 debug-bar-alignRight">2.04 ms</td>
                                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-6" title="3.40%"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="" style="--level: 0;">After Filters</td>
                                <td class="">Timer</td>
                                <td class="debug-bar-alignRight">1.06 ms</td>
                                <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-7" title="1.76%"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Collector-provided Tabs -->
                <div id="ci-logs" class="tab">
                    <h2>Logs <span></span></h2>

                    <table>
                        <thead>
                            <tr>
                                <th>Severity</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>info</td>
                                <td>Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div id="ci-files" class="tab">
                    <h2>Files <span>( 118 )</span></h2>

                    <table>
                        <tbody>

                            <tr>
                                <td>App.php</td>
                                <td>APPPATH/Config/App.php</td>
                            </tr>

                            <tr>
                                <td>Autoload.php</td>
                                <td>APPPATH/Config/Autoload.php</td>
                            </tr>

                            <tr>
                                <td>BaseController.php</td>
                                <td>APPPATH/Controllers/BaseController.php</td>
                            </tr>

                            <tr>
                                <td>Cache.php</td>
                                <td>APPPATH/Config/Cache.php</td>
                            </tr>

                            <tr>
                                <td>Common.php</td>
                                <td>APPPATH/Common.php</td>
                            </tr>

                            <tr>
                                <td>Constants.php</td>
                                <td>APPPATH/Config/Constants.php</td>
                            </tr>

                            <tr>
                                <td>ContentSecurityPolicy.php</td>
                                <td>APPPATH/Config/ContentSecurityPolicy.php</td>
                            </tr>

                            <tr>
                                <td>Cookie.php</td>
                                <td>APPPATH/Config/Cookie.php</td>
                            </tr>

                            <tr>
                                <td>Database.php</td>
                                <td>APPPATH/Config/Database.php</td>
                            </tr>

                            <tr>
                                <td>Events.php</td>
                                <td>APPPATH/Config/Events.php</td>
                            </tr>

                            <tr>
                                <td>Exceptions.php</td>
                                <td>APPPATH/Config/Exceptions.php</td>
                            </tr>

                            <tr>
                                <td>Feature.php</td>
                                <td>APPPATH/Config/Feature.php</td>
                            </tr>

                            <tr>
                                <td>Filters.php</td>
                                <td>APPPATH/Config/Filters.php</td>
                            </tr>

                            <tr>
                                <td>Home.php</td>
                                <td>APPPATH/Controllers/Home.php</td>
                            </tr>

                            <tr>
                                <td>Kint.php</td>
                                <td>APPPATH/Config/Kint.php</td>
                            </tr>

                            <tr>
                                <td>Logger.php</td>
                                <td>APPPATH/Config/Logger.php</td>
                            </tr>

                            <tr>
                                <td>Modules.php</td>
                                <td>APPPATH/Config/Modules.php</td>
                            </tr>

                            <tr>
                                <td>Paths.php</td>
                                <td>APPPATH/Config/Paths.php</td>
                            </tr>

                            <tr>
                                <td>Routes.php</td>
                                <td>APPPATH/Config/Routes.php</td>
                            </tr>

                            <tr>
                                <td>Services.php</td>
                                <td>APPPATH/Config/Services.php</td>
                            </tr>

                            <tr>
                                <td>Session.php</td>
                                <td>APPPATH/Config/Session.php</td>
                            </tr>

                            <tr>
                                <td>Toolbar.php</td>
                                <td>APPPATH/Config/Toolbar.php</td>
                            </tr>

                            <tr>
                                <td>UserAgents.php</td>
                                <td>APPPATH/Config/UserAgents.php</td>
                            </tr>

                            <tr>
                                <td>View.php</td>
                                <td>APPPATH/Config/View.php</td>
                            </tr>

                            <tr>
                                <td>development.php</td>
                                <td>APPPATH/Config/Boot/development.php</td>
                            </tr>

                            <tr>
                                <td>home_view.php</td>
                                <td>APPPATH/Views/home_view.php</td>
                            </tr>

                            <tr>
                                <td>index.php</td>
                                <td>FCPATH/index.php</td>
                            </tr>


                            <tr class="muted">
                                <td class="debug-bar-width20e">AbstractRenderer.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/Renderer/AbstractRenderer.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">AutoloadConfig.php</td>
                                <td>SYSTEMPATH/Config/AutoloadConfig.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Autoloader.php</td>
                                <td>SYSTEMPATH/Autoloader/Autoloader.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">BaseCollector.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/BaseCollector.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">BaseConfig.php</td>
                                <td>SYSTEMPATH/Config/BaseConfig.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">BaseHandler.php</td>
                                <td>SYSTEMPATH/Cache/Handlers/BaseHandler.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">BaseHandler.php</td>
                                <td>SYSTEMPATH/Log/Handlers/BaseHandler.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">BaseHandler.php</td>
                                <td>SYSTEMPATH/Session/Handlers/BaseHandler.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">BaseService.php</td>
                                <td>SYSTEMPATH/Config/BaseService.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">CacheFactory.php</td>
                                <td>SYSTEMPATH/Cache/CacheFactory.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">CacheInterface.php</td>
                                <td>SYSTEMPATH/Cache/CacheInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">CliRenderer.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/Renderer/CliRenderer.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">CloneableCookieInterface.php</td>
                                <td>SYSTEMPATH/Cookie/CloneableCookieInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">CodeIgniter.php</td>
                                <td>SYSTEMPATH/CodeIgniter.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Common.php</td>
                                <td>SYSTEMPATH/Common.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Config.php</td>
                                <td>SYSTEMPATH/Database/Config.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">ContentSecurityPolicy.php</td>
                                <td>SYSTEMPATH/HTTP/ContentSecurityPolicy.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Controller.php</td>
                                <td>SYSTEMPATH/Controller.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Cookie.php</td>
                                <td>SYSTEMPATH/Cookie/Cookie.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">CookieInterface.php</td>
                                <td>SYSTEMPATH/Cookie/CookieInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">CookieStore.php</td>
                                <td>SYSTEMPATH/Cookie/CookieStore.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Database.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/Database.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">DebugToolbar.php</td>
                                <td>SYSTEMPATH/Filters/DebugToolbar.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">DotEnv.php</td>
                                <td>SYSTEMPATH/Config/DotEnv.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Escaper.php</td>
                                <td>SYSTEMPATH/ThirdParty/Escaper/Escaper.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Events.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/Events.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Events.php</td>
                                <td>SYSTEMPATH/Events/Events.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Exceptions.php</td>
                                <td>SYSTEMPATH/Debug/Exceptions.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">FacadeInterface.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/FacadeInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Factories.php</td>
                                <td>SYSTEMPATH/Config/Factories.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Factory.php</td>
                                <td>SYSTEMPATH/Config/Factory.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">FileHandler.php</td>
                                <td>SYSTEMPATH/Cache/Handlers/FileHandler.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">FileHandler.php</td>
                                <td>SYSTEMPATH/Log/Handlers/FileHandler.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">FileHandler.php</td>
                                <td>SYSTEMPATH/Session/Handlers/FileHandler.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">FileLocator.php</td>
                                <td>SYSTEMPATH/Autoloader/FileLocator.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Files.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/Files.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">FilterInterface.php</td>
                                <td>SYSTEMPATH/Filters/FilterInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Filters.php</td>
                                <td>SYSTEMPATH/Filters/Filters.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">FormatRules.php</td>
                                <td>SYSTEMPATH/Validation/FormatRules.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">HandlerInterface.php</td>
                                <td>SYSTEMPATH/Log/Handlers/HandlerInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Header.php</td>
                                <td>SYSTEMPATH/HTTP/Header.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">IncomingRequest.php</td>
                                <td>SYSTEMPATH/HTTP/IncomingRequest.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Kint.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/Kint.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">LogLevel.php</td>
                                <td>SYSTEMPATH/ThirdParty/PSR/Log/LogLevel.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Logger.php</td>
                                <td>SYSTEMPATH/Log/Logger.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">LoggerAwareTrait.php</td>
                                <td>SYSTEMPATH/ThirdParty/PSR/Log/LoggerAwareTrait.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">LoggerInterface.php</td>
                                <td>SYSTEMPATH/ThirdParty/PSR/Log/LoggerInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Logs.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/Logs.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Message.php</td>
                                <td>SYSTEMPATH/HTTP/Message.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">MessageInterface.php</td>
                                <td>SYSTEMPATH/HTTP/MessageInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">MessageTrait.php</td>
                                <td>SYSTEMPATH/HTTP/MessageTrait.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Modules.php</td>
                                <td>SYSTEMPATH/Modules/Modules.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">OutgoingRequest.php</td>
                                <td>SYSTEMPATH/HTTP/OutgoingRequest.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">OutgoingRequestInterface.php</td>
                                <td>SYSTEMPATH/HTTP/OutgoingRequestInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RendererInterface.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/Renderer/RendererInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RendererInterface.php</td>
                                <td>SYSTEMPATH/View/RendererInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Request.php</td>
                                <td>SYSTEMPATH/HTTP/Request.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RequestInterface.php</td>
                                <td>SYSTEMPATH/HTTP/RequestInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RequestTrait.php</td>
                                <td>SYSTEMPATH/HTTP/RequestTrait.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Response.php</td>
                                <td>SYSTEMPATH/HTTP/Response.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">ResponseInterface.php</td>
                                <td>SYSTEMPATH/HTTP/ResponseInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">ResponseTrait.php</td>
                                <td>SYSTEMPATH/API/ResponseTrait.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">ResponseTrait.php</td>
                                <td>SYSTEMPATH/HTTP/ResponseTrait.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RichRenderer.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/Renderer/RichRenderer.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RouteCollection.php</td>
                                <td>SYSTEMPATH/Router/RouteCollection.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RouteCollectionInterface.php</td>
                                <td>SYSTEMPATH/Router/RouteCollectionInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Router.php</td>
                                <td>SYSTEMPATH/Router/Router.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">RouterInterface.php</td>
                                <td>SYSTEMPATH/Router/RouterInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Routes.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/Routes.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Services.php</td>
                                <td>SYSTEMPATH/Config/Services.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Session.php</td>
                                <td>SYSTEMPATH/Session/Session.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">SessionInterface.php</td>
                                <td>SYSTEMPATH/Session/SessionInterface.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">TextRenderer.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/Renderer/TextRenderer.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Time.php</td>
                                <td>SYSTEMPATH/I18n/Time.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">TimeTrait.php</td>
                                <td>SYSTEMPATH/I18n/TimeTrait.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Timer.php</td>
                                <td>SYSTEMPATH/Debug/Timer.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Timers.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/Timers.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Toolbar.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">URI.php</td>
                                <td>SYSTEMPATH/HTTP/URI.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">UserAgent.php</td>
                                <td>SYSTEMPATH/HTTP/UserAgent.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Utils.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/Utils.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">View.php</td>
                                <td>SYSTEMPATH/Config/View.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">View.php</td>
                                <td>SYSTEMPATH/View/View.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">ViewDecoratorTrait.php</td>
                                <td>SYSTEMPATH/View/ViewDecoratorTrait.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">Views.php</td>
                                <td>SYSTEMPATH/Debug/Toolbar/Collectors/Views.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">array_helper.php</td>
                                <td>SYSTEMPATH/Helpers/array_helper.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">bootstrap.php</td>
                                <td>SYSTEMPATH/bootstrap.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">init.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/init.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">init_helpers.php</td>
                                <td>SYSTEMPATH/ThirdParty/Kint/init_helpers.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">kint_helper.php</td>
                                <td>SYSTEMPATH/Helpers/kint_helper.php</td>
                            </tr>

                            <tr class="muted">
                                <td class="debug-bar-width20e">url_helper.php</td>
                                <td>SYSTEMPATH/Helpers/url_helper.php</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div id="ci-routes" class="tab">
                    <h2>Routes <span></span></h2>

                    <h3>Matched Route</h3>

                    <table>
                        <tbody>

                            <tr>
                                <td>Directory:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Controller:</td>
                                <td>\App\Controllers\Home</td>
                            </tr>
                            <tr>
                                <td>Method:</td>
                                <td>index</td>
                            </tr>
                            <tr>
                                <td>Params:</td>
                                <td>0 / 0</td>
                            </tr>


                        </tbody>
                    </table>


                    <h3>Defined Routes</h3>

                    <table>
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Route</th>
                                <th>Handler</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>GET</td>
                                <td data-debugbar-route="GET" title="http://localhost:8080/logout" style="cursor: pointer;">logout</td>
                                <td>\App\Controllers\Login::logout</td>
                            </tr>

                            <tr>
                                <td>GET</td>
                                <td data-debugbar-route="GET" title="http://localhost:8080/" style="cursor: pointer;">/</td>
                                <td>\App\Controllers\Home::index</td>
                            </tr>

                            <tr>
                                <td>GET</td>
                                <td data-debugbar-route="GET" title="http://localhost:8080/register" style="cursor: pointer;">register</td>
                                <td>\App\Controllers\Register::index</td>
                            </tr>

                            <tr>
                                <td>POST</td>
                                <td data-debugbar-route="POST">register</td>
                                <td>\App\Controllers\Register::register</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div id="ci-events" class="tab">
                    <h2>Events <span></span></h2>

                    <table>
                        <thead>
                            <tr>
                                <th class="debug-bar-width6r">Time</th>
                                <th>Event Name</th>
                                <th>Times Called</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="narrow">5.15 ms</td>
                                <td>pre_system</td>
                                <td>1</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div id="ci-history" class="tab">
                    <h2>History <span></span></h2>

                    <table>
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Datetime</th>
                                <th>Status</th>
                                <th>Method</th>
                                <th>URL</th>
                                <th>Content-Type</th>
                                <th>Is AJAX?</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr data-active="1" class="current">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695904.612468">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:11:44.612468</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695716.762031">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:08:36.762031</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695714.581232">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:08:34.581232</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695649.020896">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:07:29.020896</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695571.600297">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:06:11.600297</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695351.391352">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:02:31.391352</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695348.830069">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:02:28.830069</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695217.270012">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 22:00:17.270012</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695182.227425">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 21:59:42.227425</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679695162.119024">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 21:59:22.119024</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/login</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679694558.807085">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 21:49:18.807085</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/register</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679694496.856581">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 21:48:16.856581</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/login</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679694478.473056">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 21:47:58.473056</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/login</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679694475.870045">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 21:47:55.870045</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/login</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679686482.283196">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 19:34:42.283196</td>
                                <td>200</td>
                                <td>POST</td>
                                <td>http://localhost:8080/index.php/login</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679686464.890014">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 19:34:24.890014</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/login</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679686430.349934">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 19:33:50.349934</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/logout</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679686419.663321">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 19:33:39.663321</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679686417.731892">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 19:33:37.731892</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/register</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                            <tr data-active="">
                                <td class="debug-bar-width70p">
                                    <button class="ci-history-load" data-time="1679686266.716431">Load</button>
                                </td>
                                <td class="debug-bar-width190p">2023-03-24 19:31:06.716431</td>
                                <td>200</td>
                                <td>GET</td>
                                <td>http://localhost:8080/index.php/</td>
                                <td>text/html; charset=UTF-8</td>
                                <td>No</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- In & Out -->
                <div id="ci-vars" class="tab">

                    <!-- VarData from Collectors -->

                    <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('view-data'); return false;">
                        <h2>View Data</h2>
                    </a>


                    <table id="view-data_table">
                        <tbody>
                        </tbody>
                    </table>


                    <!-- Session -->
                    <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('session'); return false;">
                        <h2>Session User Data</h2>
                    </a>

                    <table id="session_table">
                        <tbody>
                            <tr>
                                <td>__ci_last_regenerate</td>
                                <td>
                                    <pre>1679695904</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>_ci_previous_url</td>
                                <td>http://localhost:8080/index.php/</td>
                            </tr>
                            <tr>
                                <td>id_usuario</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2>Request <span>( HTTP/1.1 )</span></h2>



                    <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('request_headers'); return false;">
                        <h3>Headers</h3>
                    </a>

                    <table id="request_headers_table">
                        <tbody>
                            <tr>
                                <td>Cookie</td>
                                <td>debug-view=show; debug-bar-state=open; ci_session=13c91fg2hnrduco1khk6o5gc40vlrr9m</td>
                            </tr>
                            <tr>
                                <td>Accept-Language</td>
                                <td>es-ES,es;q=0.9,gl;q=0.8</td>
                            </tr>
                            <tr>
                                <td>Accept-Encoding</td>
                                <td>gzip, deflate, br</td>
                            </tr>
                            <tr>
                                <td>Sec-Fetch-Dest</td>
                                <td>document</td>
                            </tr>
                            <tr>
                                <td>Sec-Fetch-User</td>
                                <td>?1</td>
                            </tr>
                            <tr>
                                <td>Sec-Fetch-Mode</td>
                                <td>navigate</td>
                            </tr>
                            <tr>
                                <td>Sec-Fetch-Site</td>
                                <td>none</td>
                            </tr>
                            <tr>
                                <td>Accept</td>
                                <td>text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7</td>
                            </tr>
                            <tr>
                                <td>User-Agent</td>
                                <td>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36</td>
                            </tr>
                            <tr>
                                <td>Upgrade-Insecure-Requests</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Sec-Ch-Ua-Platform</td>
                                <td>"Windows"</td>
                            </tr>
                            <tr>
                                <td>Sec-Ch-Ua-Mobile</td>
                                <td>?0</td>
                            </tr>
                            <tr>
                                <td>Sec-Ch-Ua</td>
                                <td>"Google Chrome";v="111", "Not(A:Brand";v="8", "Chromium";v="111"</td>
                            </tr>
                            <tr>
                                <td>Cache-Control</td>
                                <td>max-age=0</td>
                            </tr>
                            <tr>
                                <td>Connection</td>
                                <td>keep-alive</td>
                            </tr>
                            <tr>
                                <td>Host</td>
                                <td>localhost:8080</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('cookie'); return false;">
                        <h3>Cookies</h3>
                    </a>

                    <table id="cookie_table">
                        <tbody>
                            <tr>
                                <td>debug-view</td>
                                <td>show</td>
                            </tr>
                            <tr>
                                <td>debug-bar-state</td>
                                <td>open</td>
                            </tr>
                            <tr>
                                <td>ci_session</td>
                                <td>13c91fg2hnrduco1khk6o5gc40vlrr9m</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2>Response
                        <span>( 200 - OK )</span>
                    </h2>

                    <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('response_headers'); return false;">
                        <h3>Headers</h3>
                    </a>

                    <table id="response_headers_table">
                        <tbody>
                            <tr>
                                <td>Cache-control</td>
                                <td>no-store, max-age=0, no-cache</td>
                            </tr>
                            <tr>
                                <td>Content-Type</td>
                                <td>text/html; charset=UTF-8</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Config Values -->
                <div id="ci-config" class="tab">
                    <h2>System Configuration</h2>

                    <p class="debug-bar-alignRight">
                        <a href="https://codeigniter4.github.io/CodeIgniter4/index.html" target="_blank">Read the CodeIgniter docs...</a>
                    </p>

                    <table>
                        <tbody>
                            <tr>
                                <td>CodeIgniter Version:</td>
                                <td>4.3.2</td>
                            </tr>
                            <tr>
                                <td>PHP Version:</td>
                                <td>7.4.33</td>
                            </tr>
                            <tr>
                                <td>PHP SAPI:</td>
                                <td>fpm-fcgi</td>
                            </tr>
                            <tr>
                                <td>Environment:</td>
                                <td>development</td>
                            </tr>
                            <tr>
                                <td>Base URL:</td>
                                <td>
                                    http://localhost:8080/
                                </td>
                            </tr>
                            <tr>
                                <td>Timezone:</td>
                                <td>UTC</td>
                            </tr>
                            <tr>
                                <td>Locale:</td>
                                <td>en</td>
                            </tr>
                            <tr>
                                <td>Content Security Policy Enabled:</td>
                                <td> No </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="gtx-trans" style="position: absolute; left: 1212px; top: 1272.8px;">
        <div class="gtx-trans-icon"></div>
    </div>
</body>

</html>