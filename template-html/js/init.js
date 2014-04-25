var sourcePath = "";

function hasClass(elem, className) {
    return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}

if (head.browser.ie && head.browser.version < 8) {
    location.replace(sourcePath+"ie7/ie7.html");
}

if (head.browser.ie && head.browser.version < 9) {
    head.load(sourcePath+"js/html5.js");
}

head.js(
    sourcePath+"js/jquery-1.10.2.min.js",
    sourcePath+"js/rform.min.js",
    // sourcePath+"js/.js",
    // sourcePath+"js/scripts.js",
    function() {}
);

if (head.browser.ie && head.browser.version < 10) {
    head.js(
        sourcePath+"js/placeholder.min.js",
        function() {
            $("input[placeholder], textarea[placeholder]").textPlaceholder();
        }
    );
}

// if (hasClass(document.documentElement, 'body_class')) {
//     head.js(
//         sourcePath+"js/.js",
//         function() {}
//     );
// }

if (head.browser.opera) {
    head.ready(document, function () {
        function removePlaceholder(e) {
            var el = e.target;
            if (!el.placeHolderRemoved) {
                el.placeHolderRemoved = true;
                el.value = "";
                el.removeAttribute("data-operaplaceholder");
            }
        }
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; ++i) {
            var el = inputs[i],
                ph = el.getAttribute("placeholder");
            if (ph && !el.hasAttribute("value")) {
                el.value = ph;
                el.removeAttribute("placeholder");
                el.setAttribute("data-operaplaceholder", "");
                el.addEventListener("click", removePlaceholder, false);
            }
        }
    });
}