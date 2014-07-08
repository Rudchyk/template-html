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
    sourcePath+"js/jquery.min.js",
    sourcePath+"js/rform.min.js",
    // sourcePath+"js/.js",
    // sourcePath+"js/scripts.js",
    function() {}
);

if (head.browser.ie && head.browser.version < 10 || head.browser.opera) {
    head.js( sourcePath+"js/placeholder.min.js" );
}

// if (hasClass(document.documentElement, 'body_class')) {
//     head.js(
//         sourcePath+"js/.js",
//         function() {}
//     );
// }

