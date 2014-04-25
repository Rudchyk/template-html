#TEMPLATE-HTML

##Styles
Все стили хранятся в css/index.css.<br>
Стили собраны  в один (с помощью SCSS).<br>
Для добавления новых стилей разработчиками создан dev.css (css/dev.css).

##JS
Все библиотеки и скрипты перечислены в js/init.js. В шаблоне они подключены через head.min.js (<a href="http://headjs.com/">источник</a>).<br>
Полный путь к папке со скриптами задается в переменнной "sourcePath" в js/init.js, ст.1.<br>
    Основная библиотека JavaScript - jQuery

##Исключения
* Если у пользователя браузер IE7 и ниже, будет загружаться заглушка (ie7/index.html), с просьбой обновить браузер или загрузить любой другой.
* Если у пользователя браузер IE8, будет загружаться js/html5.js, который призван корректно отображать теги HTML5.
* Если у пользователя браузер IE9, будет загружаться js/placeholder.min, который призван корректно отображать placeholder в полях ввода.
* Если у пользователя браузер opera, будет срабатывать скрипт для стилизации placeholder в полях ввода.
* Каждая html страница может иметь свой уникальный класс в теге <html>. По этому классу можно подгружать отдельные файлы стилей и скриптов, исключительно для этих страниц.

##Images
<table>
    <tr>
        <td>icons</td>
        <td>Папка которую использует compass для создания спрайта</td>
    </tr>
    <tr>
        <td>bg</td>
        <td>Папка с фоновыми изображениями</td>
    </tr>
    <tr>
        <td>required</td>
        <td>Папка с обязательными изображениями</td>
    </tr>
    <tr>
        <td>temp</td>
        <td>Папка с временными изображениями (статическими изображениями постов и т.п.). После интеграции верстки ее можно удалить</td>
    </tr>
</table>

##Fonts
Все сторонние шрифты будут загружены в папку Fonts.

##Validation
<table>
    <tr>
        <td>error</td>
        <td>Этот класс будет добавлен если поле не прошло валидацию</td>
    </tr>
    <tr>
        <td>valid</td>
        <td>Этот класс будет добавлен если поле валидно</td>
    </tr>
</table>

#TEMPLATE-WP

##Styles
<table>
    <tr>
        <td>style.css</td>
        <td>Обязательный файл для темы WP. В нем хранится вся информация о теме. Согласно особенностям CMS WordPress без него тема работать не будет. Файл может не содержать стилей вовсе, то есть являться пустышкой</td>
    </tr>
    <tr>
        <td>temp/css/wp-admin.css</td>
        <td>Свои стили используемые в админ панели</td>
    </tr>
</table>

##Main templates
<table>
    <tr>
        <td>header.php</td>
        <td>Файл шаблона шапки сайта</td>
    </tr>
    <tr>
        <td>footer.php</td>
        <td>Файл шаблона подвала сайта</td>
    </tr>
    <tr>
        <td>index.php</td>
        <td>Файл основного шаблона</td>
    </tr>
    <tr>
        <td>search.php</td>
        <td>Файл шаблона страницы категорий</td>
    </tr>
    <tr>
        <td>category.php</td>
        <td>Файл основного шаблона</td>
    </tr>
    <tr>
        <td>functions.php</td>
        <td>Файл функций</td>
    </tr>
    <tr>
        <td>single.php</td>
        <td>Файл шаблона записи</td>
    </tr>
    <tr>
        <td>page.php</td>
        <td>Файл шаблона страницы</td>
    </tr>
    <tr>
        <td>404.php</td>
        <td>Файл шаблона ошибки 404</td>
    </tr>
    <tr>
        <td>page.php</td>
        <td>Файл основного шаблона</td>
    </tr>
    <tr>
        <td>comments.php</td>
        <td>Файл шаблона комментариев</td>
    </tr>
    <tr>
        <td>sidebar.php</td>
        <td>Файл шаблона сайдбара сайта</td>
    </tr>
</table>

##Secondary templates (folder "temp")
<table>
    <tr>
        <td>sidebar-2.php</td>
        <td>Файл шаблона другого сайдбара сайта</td>
    </tr>
    <tr>
        <td>simple-single.php</td>
        <td>Файл шаблона отдельной записи (плагин "Single Post Template")</td>
    </tr>
    <tr>
        <td>home.php</td>
        <td>Файл шаблона главной страницы</td>
    </tr>
    <tr>
        <td>category-2.php</td>
        <td>Файл шаблона страницы категории с ID 2</td>
    </tr>
    <tr>
        <td>nggallery/gallery-templatename.php</td>
        <td>Файл шаблона вывода галереи (плагин "NextGEN Gallery")</td>
    </tr>
    <tr>
        <td>mail/admin</td>
        <td>Возможность задать данные для отправки почты из админки</td>
    </tr>
    <tr>
        <td>mail/noadmin</td>
        <td>Без возможности задать данные для отправки почты из админки</td>
    </tr>
    <tr>
        <td>../mail.php</td>
        <td>Файл шаблона отправки почты, с переходом на отдельную страницу</td>
    </tr>
    <tr>
        <td>../mail-ajax.php</td>
        <td>Файл шаблона отправки почты, без перехода на отдельную страницу по технологии ajax</td>
    </tr>
</table>

##Includes templates (folder "include")
<table>
    <tr>
        <td>include.php</td>
        <td>Файл будущего шаблона</td>
    </tr>
    <tr>
        <td>error.php</td>
        <td>Файл шаблона ошибки</td>
    </tr>
    <tr>
        <td>searchform.php</td>
        <td>Файл шаблона формы поиска</td>
    </tr>
    <tr>
        <td>pagination.php</td>
        <td>Файл шаблона навигации по постам</td>
    </tr>
</table>

##Other pages templates (folder "pages")
<table>
    <tr>
        <td>simple-page.php</td>
        <td>Файл шаблона отдельной страницы</td>
    </tr>
</table>

##Posts templates (folder "posts")
<table>
    <tr>
        <td>post.php</td>
        <td>Файл шаблона поста</td>
    </tr>
</table>

##readme
<table>
    <tr>
        <td>readme-wp.txt</td>
        <td>Файл описания особенностей ВП</td>
    </tr>
    <tr>
        <td>temp/mail/readme.txt</td>
        <td>Файл описания возможных особенностей работы шаблонов почты</td>
    </tr>
</table>