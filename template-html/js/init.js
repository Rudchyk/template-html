if (head.browser.ie && head.browser.version < 8) {
    location.replace("ie7/ie7.html");
}

if (head.browser.ie && head.browser.version < 9) {
    head.load("js/html5.js");
}

head.js(
    "js/jquery-1.10.2.min.js",
    "js/rform.min.js",
    // "js/.js",
    // "js/scripts.js",
    function() {}
);

if (head.browser.ie && head.browser.version < 10) {
    head.js(
        "js/placeholder.min.js",
        function() {
            $("input[placeholder], textarea[placeholder]").textPlaceholder();
        }
    );
}

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