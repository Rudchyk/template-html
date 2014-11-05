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
    sourcePath+"js/tabs.js",
    sourcePath+"js/jquery.scrollbar.min.js",
    sourcePath+"js/jquery.fancybox.pack.js",
    sourcePath+"js/jquery.fancybox-thumbs.js",
    sourcePath+"js/jquery.fancybox-buttons.js",
    sourcePath+"js/jquery.fancybox-media.js",
    sourcePath+"js/jquery.bxslider.min.js",
    // sourcePath+"js/.js",
    // sourcePath+"js/scripts.js",
    sourcePath+"js/example.js",
    function() {
        // fieldJS
        $('.field-box-js').fieldJS();

        // selectJS
        $('.select-box-js').selectJS({
            userScroll: true
        });

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

        /*tabsJS*/
        $('.tabs-js').tabsJS();

        $('.tabs-global-js').tabsJS({
            tabSection : '.tabs-global-section-js',
            tabContent : '.tab-global-content-js',
        });
        $('.tabs-example-js').tabsJS({
            tabSection : '.tabs-example-section-js',
            tabContent : '.tab-example-content-js',
        });

        /*jquery.scrollbar*/
        $('.scroll-js').scrollbar();

        /*fancybox*/
        $('.fancybox-modal').fancybox({
            wrapCSS: 'customClass',
            openEffect: 'elastic'
        });
        $('.fancy-prew-outside-js').fancybox();
        $('.fancy-prew-inside-js').fancybox({
            helpers     : {
                title   : { type : 'inside' }
            }
        });
        $('.fancy-prew-js').fancybox();

        $('.fancybox-thumb-js').fancybox({
            helpers     : {
                title   : { type : 'outside' },
                thumbs  : {
                    width   : 50,
                    height  : 50
                }
            }
        });

        $('.fancybox-button-js').fancybox({
            closeBtn        : false,
            helpers     : {
                title   : { type : 'inside' },
                buttons : {}
            }
        });

        // bxSlider
        $('.bxslider-js').bxSlider();

        $('.bxslider-auto-js').bxSlider({
            auto: true,
            autoControls: true
        });

        $('.bxslider-carousel-js').bxSlider({
            slideWidth: 200,
            minSlides: 2,
            maxSlides: 3,
            slideMargin: 10,
            moveSlides: 1
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

