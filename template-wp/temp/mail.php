<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Cообщение</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="refresh" content="3;url=http://wp.viking-r.pp.ua">
    <style>
.mywindow{
    padding: 50px;
    text-align: center;
}
    </style>
</head>
<body>
    <div class="mywindow">
        <?php
            if (isset($_POST['name'])) {$name = $_POST['name'];}
            if (isset($_POST['mail'])) {$mail = $_POST['mail'];}
            if (isset($_POST['area'])) {$body = $_POST['area'];}

            $address = "viking_r@mail.ru";
            $sub = "Mail theme";
            $mes = "Имя: $name \nE-mail: $mail \nТема: $sub \nТекст сообщения: $body";
            $send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nFrom:$email");

            if ($send == 'true'){
                echo "Сообщение отправлено. Спасибо за ваше письмо";
            }
            else{
                echo "Сообщение не было отправлено, возможно какие-то проблемы с сервером. Попробуйте через некоторое время.";
            }
        ?>
    </div>
</body>
</html>