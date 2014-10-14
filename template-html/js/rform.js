(function($){
    var global = {
        activeClass : 'has-active',
        valueClass : 'has-value',
        disabledClass : 'has-disabled'
    };

    /*field function*/
    $.fn.fieldJS = function () {
        return this.each(function(){
            var settings = {
              el : this,
              fieldClass : 'field'
            },
            $field = $(settings.el).find('.'+settings.fieldClass);

            if (!$(settings.el).hasClass(global.disabledClass)) {
                var $fieldVal = $field.val();

                    if ($fieldVal) {
                        $(settings.el).addClass(global.valueClass);
                    };

                    $field
                        .focus(function(event) {
                            $(this).parent().addClass(global.activeClass);
                        })
                        .blur(function(event) {
                            $(this).parent().removeClass(global.activeClass);
                        })
                        .change(function(event) {
                            if (!$fieldVal) {
                                $(settings.el).addClass(global.valueClass);
                            };
                        });
            }
            else{
                $field.attr('disabled', 'disabled');
            }
        });
    };

    /*select function*/
    selectJS = function() {
        this._init = function(element, options) {
            var defaults = {
                slctDropClass     : 'slctdrop',
                slctDropListClass : 'slctdrop-list',
                slctDropItemClass : 'slctdrop-item',
                fieldBoxClass     : 'field-box',
                hideClass         : 'hide',
                fakeFieldClass    : 'field-fake',
                workSelectClass   : 'hidden-select',
                userScrollClass   : 'scroll-simple_inner',
                el                : $(element),
                userBrowser       : /Android|webOS|iPhone|iPad|iPod|BlackBerry/i,
                userScroll        : false
            },
            settings = $.extend(defaults, options),
            $elSelect = settings.el.find('select'),
            $fakeField = settings.el.find('.'+settings.fakeFieldClass),
            $elVal = $elSelect.val(),
            $elText = $elSelect.find('option:selected').text(),
            $options = $elSelect.find('option'),
            $slctDrop = $('<div class="'+settings.slctDropClass+' '+settings.slctDropClass+'-js"></div>'),
            $list = $('<ul class="'+settings.slctDropListClass+'"></ul>');

            $fakeField.text($elText);
            if (!settings.el.hasClass(global.disabledClass)) {

                if (!$elVal) {
                    settings.el.removeClass(global.activeClass);
                }
                else{
                    $fakeField.text($elText);
                    settings.el.addClass(global.valueClass);
                }

                if( !settings.userBrowser.test(navigator.userAgent) ) {
                    $options.each(function(){
                        var $this = $(this),
                            $optionVal = $this.val(),
                            $optionText = $this.text(),
                            $optionLi = $('<li class="'+settings.slctDropItemClass+' '+settings.slctDropItemClass+'-js" data-option="'+$optionVal+'">'+$optionText+'</li>');

                        if (!$this.is(':disabled')) {
                            if ($elText == $optionText) {
                                $optionLi.addClass(settings.hideClass);
                            };
                            $list.append($optionLi);
                        };
                    });
                    $slctDrop.prepend($list);
                    $elSelect
                        .hide()
                        .before($slctDrop);

                    if (settings.userScroll) {
                        $list
                            .addClass(settings.userScrollClass)
                            .scrollbar({
                                "type": "simple"
                            });
                    }
                    else{
                        $list.addClass('default-scroll');
                    }
                    settings.el.on('click', '.'+settings.fakeFieldClass, function() {
                        var $fakeEl = $(this),
                            $elParent = $fakeEl.closest('.'+settings.fieldBoxClass);

                        $('.'+settings.slctDropClass+'-js').hide();
                        $('.'+settings.fakeFieldClass).removeClass(global.activeClass);
                        $elParent
                            .addClass(global.activeClass)
                            .find('.'+settings.slctDropClass+'-js').slideToggle();
                    });
                    settings.el.on('click', '.'+settings.slctDropItemClass+'-js', function() {
                        var $item = $(this),
                            $itemel = $item.closest('.'+settings.fieldBoxClass),
                            $itemField = $itemel.find('.'+settings.fakeFieldClass),
                            $itemSelect = $itemel.find('select'),
                            $itemText = $item.text(),
                            $itemOption = $item.data('option');
                        $itemel
                            .removeClass(global.activeClass)
                            .addClass(global.valueClass)
                            .find('.'+settings.slctDropClass+'-js').slideToggle();
                        $itemField.text($itemText);
                        $itemSelect.val($itemOption);
                        $itemel.find('.'+settings.slctDropItemClass+'-js').removeClass(settings.hideClass);
                        $item.addClass(settings.hideClass);
                    });
                    $(document).click(function(event) {
                        if (!$(event.target).closest('.'+settings.fieldBoxClass).length) {
                            settings.el
                                .removeClass(global.activeClass)
                                .find('.'+settings.slctDropClass+'-js').hide();
                            if (!$elSelect.val()) {
                                $elSelect.removeClass(global.valueClass);
                            };
                        };
                    });
                }
                else{
                    $elSelect.on('change', function() {
                        var $thisVal = $(this).val();
                        $fakeField.text($thisVal);
                        settings.el.addClass(global.activeClass);
                    });
                }
            }
            else{
                $elSelect.hide();
            }
        };
    };
    // Launch plugin
    $.fn.selectJS = function( options ){
        return this.each(function(){
             $( this ).data( "selectJS", new selectJS()._init( this, options ) );
         });
    };

    /*radio function*/
    $.fn.radioJS = function () {
        return this.each(function(){
            var settings = {
              radio : this,
              virtualRadioClass : 'radio',
            }

            if (!$(settings.radio).hasClass(global.disabledClass)) {
                $(settings.radio).on('click', '.'+settings.virtualRadioClass, function() {
                    var radioThis = $(this),
                        valueRadio = radioThis.data('rval');

                    radioThis
                            .parent().find('.'+settings.virtualRadioClass).removeClass(global.activeClass)
                            .end().end().addClass(global.activeClass)
                            .parent().find('input').val(valueRadio);
                });
            };
        });
    };

    /*checkbox function*/
    $.fn.checkboxJS = function () {
        return this.each(function(){
            if (!$(this).hasClass(global.disabledClass)) {
                $(this).on('change', 'input:checkbox', function(){
                    $(this).parent().toggleClass(global.activeClass);
                });
            }
        });
    };

    /*file function*/
    $.fn.fileJS = function () {
        return this.each(function(){
            var settings = {
                file : this,
                fileloadField: '.fileload-field-js',
                fileloadBtn: '.fileload-btn-js'
            };
            if (!$(settings.file).hasClass(global.disabledClass)) {
                $(settings.file)
                    .on('click', settings.fileloadBtn, function(){
                        $(this)
                            .siblings('input').click()
                            .parent().addClass(global.activeClass);
                    })
                    .on('change', 'input:file', function(){
                        var $ThisEl = $(this),
                            $fileResult = $ThisEl.val();
                        $ThisEl
                            .parent()
                                .removeClass(global.activeClass)
                                .addClass(global.valueClass);

                        if ($ThisEl.parent().find(settings.fileloadField).length) {
                            $ThisEl.parent().find(settings.fileloadField).text($fileResult);
                        };
                    });
            };
        });
    };
})($);