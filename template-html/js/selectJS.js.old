(function($){

selectJS = function() {

    this._init = function(element, options) {

        var defaults = {
            slctDropClass     : 'slctdrop',         // Класс блока выпадающего списка
            slctDropListClass : 'slctdrop-list',    // Класс выпадающего списка
            slctDropItemClass : 'slctdrop-item',    // Класс пункта выпадающего списка
            fieldBoxClass     : 'field-box',        // Класс родителя селекта
            fakeFieldClass    : 'fake-field',       // Класс фейкового поля селекта
            workSelectClass   : 'hidden-select',    // Класс селекта
            HasValueClass     : 'has-value',        // Класс родителя селекта при условии, что селект имеет значение
            HasActiveClass    : 'has-active',       // Класс родителя селекта в активном состоянии селекта
            HasDisabledClass  : 'has-disabled',     // Класс родителя селекта в отключённом состоянии селекта
            el                : $(element)
        },
        settings = $.extend(defaults, options),
        $elSelect = settings.el.find('select'), // Селект
        $fakeField = settings.el.find('.'+settings.fakeFieldClass), // Фейковое поле селекта
        $elVal = $elSelect.val(), // Значение селекта
        $elText = $elSelect.find('option:selected').text(), // Текстовое значение выбранного пункта селекта
        $options = $elSelect.find('option'), // Найдем все option у данного селекта
        // Элементы
        $slctDrop = $('<div class="'+settings.slctDropClass+' '+settings.slctDropClass+'-js"></div>'), // Блок выпадающего списка
        $list = $('<ul class="'+settings.slctDropListClass+'"></ul>'); // Список выпадающего списка

            $fakeField.text($elText);

            if (!settings.el.hasClass(settings.HasDisabledClass)) { // Проверка не отключено ли поле? Если класса "has-disabled" нету, то:

            if (!$elVal) { // Проверяем есть ли значение у селекта по умолчанию? Если нету то:
                settings.el.removeClass(settings.HasActiveClass); // Удаляем класс активности
            }
            else{ // Проверяем есть ли значение у селекта по умолчанию? Если есть то:
                $fakeField.text($elText) // Присваиваем фейковому полю текст активного элемента
                settings.el.addClass(settings.HasValueClass); // ".field-box" присваиваем класс значения
            }

            if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) { // Проверка не девайс. Если это десктоп, то:

                // Перебираем все Option
                $options.each(function(){
                    var $this = $(this), // Переназначаем $(this)
                        $optionVal = $this.val(), // Берем его значение
                        $optionText = $this.text(), // Берем его текст
                        $optionLi = $('<li class="'+settings.slctDropItemClass+' '+settings.slctDropItemClass+'-js" data-option="'+$optionVal+'">'+$optionText+'</li>'); // Создаем фейковый option

                    if (!$this.is(':disabled')) { // Проверяем есть ли значение у элемента, если есть, то:
                        $list.append($optionLi); // Вставлем в <ul class="slctdrop-list"></ul> все фековые option
                    };
                });

                // Вставляем в <div class="slctdrop slctdrop-js"></div> <ul class="slctdrop-list"></ul>
                $slctDrop.prepend($list);

                // Проводим манипуляции с стандартным селектом
                $elSelect
                    .hide() // Скрываем его
                    .before($slctDrop); // Вставляем после него <div class="slctdrop slctdrop-js"></div>


                // Если нажали на фейковый селект
                settings.el.on('click', '.'+settings.fakeFieldClass, function() {
                    var $fakeEl = $(this),
                        $elParent = $fakeEl.closest('.'+settings.fieldBoxClass);

                    $('.'+settings.slctDropClass+'-js').hide(); // Скрываем все выпадающие списки
                    $('.'+settings.fakeFieldClass).removeClass(settings.HasActiveClass); // Скрываем все выпадающие списки

                    // Проводим манипуляции с ".field-box"
                    $elParent
                        .addClass(settings.HasActiveClass) // ".field-box" присваиваем класс активности
                        .find('.'+settings.slctDropClass+'-js').slideToggle(); // Показываем выпадающий список
                });

                // Если выбрали какойто фейковый option
                settings.el.on('click', '.'+settings.slctDropItemClass+'-js', function() {
                    var $item = $(this), // Переназначаем $(this)
                        $itemel = $item.closest('.'+settings.fieldBoxClass), //
                        $itemField = $itemel.find('.'+settings.fakeFieldClass), //
                        $itemSelect = $itemel.find('select'), //
                        $itemText = $item.text(), // Берем значение фейкового селекта
                        $itemOption = $item.data('option'); // Берем значение его атрибута data-option

                    // Проводим манипуляции с ".field-box"
                    $itemel
                        .removeClass(settings.HasActiveClass) // Удаляем класс активности
                        .addClass(settings.HasValueClass) // Добавляем класс значения
                        .find('.'+settings.slctDropClass+'-js').slideToggle(); // Скрываем выпадающий список

                    $itemField.text($itemText); // Вставляем в фейковое поле выбранное значение
                    $itemSelect.val($itemOption); // Устанавливаем селекту значение
                });

                // Если нажали на любое место кроме выпадающего списка
                $(document).click(function(event) {
                    if (!$(event.target).closest('.'+settings.fieldBoxClass).length) { // Если элемент на который кликнули не является дочерним в ".field-box", то:

                        // Проводим манипуляции с ".field-box"
                        settings.el
                            .removeClass(settings.HasActiveClass) // Удаляем класс активности
                            .find('.'+settings.slctDropClass+'-js').hide(); // Скрываем выпадающий список

                        if (!$elSelect.val()) { // Проверяем есть ли значение у элемента, если нету, то:
                            $elSelect.removeClass(settings.HasValueClass); // ".field-box" удаляем класс значения
                        };
                    };
                });

            }
            else{ // Проверка не девайс. Если это мобильный, то:
                // Если селект был изменен
                $elSelect.on('change', function() {
                    var $thisVal = $(this).val(); // Берем значение выбранного пункта

                    $fakeField.text($thisVal); // Вставляем в фейковое поле выбранное значение
                    settings.el.addClass(settings.HasActiveClass); // Добавляем класс значения ".field-box"
                });
            }

        }
        else{ // Проверка не отключено ли поле? Если клас "has-disabled" есть, то:
            $elSelect.hide(); // Скрываем стандартный селект
        }


    };
};
    // Launch plugin
    $.fn.selectJS = function( options ){

        return this.each(function(){

             $( this ).data( "selectJS", new selectJS()._init( this, options ) );

         });
    };
})(jQuery);