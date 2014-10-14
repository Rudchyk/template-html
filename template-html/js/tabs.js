// tabsJS
(function($){
tabsJS = function() {
    this._init = function(element, options) {
        var defaults = {
            this: $(element),
            tabCurrentClass : 'tab-current',
            tabSection : '.tabs-section-js',
            tabContent : '.tab-content-js',
            inDelay : 150
        },
        settings = $.extend(defaults, options);

        settings.this.delegate('li:not(.'+settings.tabCurrentClass+')', 'click', function() {
            var $el = $(this);
            $el
                .addClass(settings.tabCurrentClass)
                .siblings().removeClass(settings.tabCurrentClass)
                .parents(settings.tabSection).find(settings.tabContent).eq($el.index()).fadeIn(settings.inDelay)
                .siblings(settings.tabContent).hide();
        });
    };
};
    // Launch plugin
    $.fn.tabsJS = function(options){
        return this.each(function(){
             $(this).data( "tabsJS", new tabsJS()._init( this, options ) );
        });
    };
})($);
// end tabsJS