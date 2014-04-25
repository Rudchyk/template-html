#TEMPLATE-HTML

##Styles
Все стили хранятся в css/index.css.<br>
Стили собраны  в один (с помощью SCSS).<br>
Для добавления новых стилей разработчиками - dev.css (css/dev.css).

##JS
Все библиотеки и скрипты перечислены в js/init.js. В шаблоне они подключены через head.min.js (http://headjs.com/).<br>
Полный путь к папке со скриптами задается в переменнной "sourcePath" в js/init.js, ст.1.<br>
*Основная библиотека JavaScript - jQuery*

##Исключения
* Если у пользователя браузер IE7 и ниже, будет загружаться заглушка (ie7/index.html), с просьбой обновить браузер или загрузить любой другой.
* Если у пользователя браузер IE8, будет загружаться js/html5.js, который призван корректно отображать теги HTML5.
* Если у пользователя браузер IE9, будет загружаться js/placeholder.min, который призван корректно отображать placeholder в полях ввода.
* Если у пользователя браузер opera, будет срабатывать скрипт для стилизации placeholder в полях ввода.
* Каждая html страница может иметь свой уникальный класс в теге <html>. По этому классу можно подгружать отдельные файлы стилей и скриптов, исключительно для этих страниц.

##Images
* icons - Папка которую использует compass для создания спрайта.
* bg - Папка с фоновыми изображениями.
* required - Папка с обязательными изображениями.
* temp - Папка с временными изображениями (статическими изображениями постов и т.п.). После интеграции верстки ее можно удалить.

##Fonts
Все сторонние шрифты будут загружены в папку Fonts.

##Validation
* error - Этот класс будет добавлен если поле не прошло валидацию.
* valid - Этот класс будет добавлен если поле валидно.

#TEMPLATE-WP

##Styles
* style.css - Обязательный файл для темы WP. В нем хранится вся информация о теме. Согласно особенностям CMS WordPress без него тема работать не будет. Файл может не содержать стилей вовсе, то есть являться пустышкой.
* temp/css/wp-admin.css - Свои стили используемые в админ панели;

##Main templates
* header.php - Файл шаблона шапки сайта;
* footer.php - Файл шаблона подвала сайта;
* index.php - Файл основного шаблона;
* search.php - Файл шаблона результатов поиска;
* category.php - Файл шаблона страницы категорий;
* functions.php - Файл функций;
* single.php - Файл шаблона записи;
* page.php - Файл шаблона страницы;
* 404.php - Файл шаблона ошибки 404;
* comments.php - Файл шаблона комментариев;
* sidebar.php - Файл шаблона сайдбара сайта;
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
</table>

##Secondary templates (folder "temp")
* sidebar-2.php - Файл шаблона другого сайдбара сайта;
* simple-single.php - Файл шаблона отдельной записи (плагин "Single Post Template");
* home.php - Файл шаблона главной страницы
* category-2.php - Файл шаблона страницы категории с ID 2;
* nggallery/gallery-templatename.php - Файл шаблона вывода галереи (плагин "NextGEN Gallery");
* mail/admin - Возможность задать данные для отправки почты из админки;
* mail/noadmin - Без возможности задать данные для отправки почты из админки;
**/mail.php - Файл шаблона отправки почты, с переходом на отдельную страницу;
**/mail-ajax.php - Файл шаблона отправки почты, без перехода на отдельную страницу по технологии ajax;

##Includes templates (folder "include")
* include.php - Файл будущего шаблона;
* error.php - Файл шаблона ошибки;
* searchform.php - Файл шаблона формы поиска;
* pagination.php - Файл шаблона навигации по постам;

##Other pages templates (folder "pages")
* simple-page.php - Файл шаблона отдельной страницы;

##Posts templates (folder "posts")
* post.php - Файл шаблона поста;

##readme
* readme-wp.txt - Файл описания особенностей ВП;
* temp/mail/readme.txt - Файл описания возможных особенностей работы шаблонов почты;