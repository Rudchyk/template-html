<?php

    //Название страницы
    $pageTitle = "Обратная связь";

    //Счетчик перезагрузки страницы
    $refreshCounter = 5;

    // Адрес страницы, с которой посетитель пришёл на данную страницу
    $referer = $_SERVER['HTTP_REFERER'];

    // Content-Type:
    $contenttype = 'text/html; charset=utf-8';

    // Куда отправлять сообщения
    $address = "viking_r@mail.ru";

    // Адрес с которого отправляются сообщения
    $siteEmail = "info@mysite.com";

    // Тема сообщения
    $sub = "Обратная связь";

    // Данные для передачи письма
    $headers = array(
        'MIME-Version: 1.0',
        'From: ' . $siteEmail,
        'Reply-To: ' . $siteEmail,
        'Content-Type: '. $contenttype
    );

?>
<!DOCTYPE HTML>
<html lang="<?=$_SERVER['HTTP_ACCEPT_LANGUAGE']?>">
<head>
    <meta http-equiv="Content-Type" content="<?=$contenttype?>">
    <title><?=$pageTitle?></title>
    <?php echo "<meta http-equiv='refresh' content='".$refreshCounter.";url=".$referer."'>"; ?>
    <style>
        .mywindow{ padding: 50px; text-align: center }
    </style>
</head>
<body>
    <div class="mywindow">
        <?php
            // Принимаем данные с формы
            if (isset($_POST['name'])) {$name = $_POST['name'];}
            if (isset($_POST['email'])) {$email = $_POST['email'];}
            if (isset($_POST['area'])) {$text = $_POST['area'];}

            // Формируем текст письма
            $msg .= "<p><strong>Имя:</strong> $name</p>";
            $msg .= "<p><strong>E-mail:</strong> $email</p>";
            $msg .= "<p><strong>Сообщение:</strong> $text</p>";

            // Сообщение об успешной отправке
            $mess= "Уважаемый $name, ваше сообщение было успешно отправленно.";

            // Сообщение об не успешной отправке
            $error= "Уважаемый $name, ваше сообщение не было отправлено, возможно какие-то проблемы с сервером. Попробуйте через некоторое время.";

            // Отправляем письмо
            $send = mail ($address,$sub,$msg, implode("\r\n", $headers));

            // Проверка на успешность отправки сообщения
            if ($send) { echo $mess; }
            else { echo $error; }
        ?>
    </div>
</body>
</html>