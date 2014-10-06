var sourcePath = "";

function hasClass(elem, className) {
    return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}

if (head.browser.ie && head.browser.version < 8) {
    location.replace(sourcePath+"ie-old/index.html");
}

if (head.browser.ie && head.browser.version < 9) {
    head.js("http://html5shiv.googlecode.com/svn/trunk/html5.js");
}

head.js(
    "https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js",
    sourcePath+"js/rform.js",
    sourcePath+"js/jquery.actual.min.js",
    sourcePath+"js/tip.js",
    sourcePath+"js/modal.js",
    // sourcePath+"js/.js",
    // sourcePath+"js/scripts.js",
    sourcePath+"js/example.js",
    function() {
        // fieldJS
        $('.field-box-js').fieldJS();

        // selectJS
        $('.select-box-js').selectJS();

        // radioJS
        $('.radio-box-js').radioJS();

        /*checkboxJS*/
        $('.check-box-js').checkboxJS();

        /*fileJS*/
        $('.fileload-box-js').fileJS();

        /*modalJS*/
        $('.popup-link-js').modalJS();

        /*tipJS*/
        $('.tip-js').tipJS();
        $('.tip-top-js').tipJS({
            side: 'top'
        });
        $('.tip-fix-js').tipJS({
            fix: true
        });
    }
);

if (head.browser.ie && head.browser.version < 10 || head.browser.opera) {
    head.js( sourcePath+"js/ph.min.js" );
}

// if (hasClass(document.documentElement, 'body_class')) {
//     head.js(
//         sourcePath+"js/.js",
//         function() {}
//     );
// }

