<?php
$templateName = themeName();
function themeName(){
    $themeNameDir = dirname(__FILE__);
    $themeNameArr = explode("/", $themeNameDir);
    $themeNameVar = end($themeNameArr);
    return $themeNameVar;
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?=$templateName?></title>

    <style>
    .main{width: 940px;margin: auto;}
    .img, h1{text-align: center}
    .img{padding-bottom: 50px}
    .img img{box-shadow: 0 0 15px #ccc;padding: 2px; max-width: 940px}
    ul{width: 500px;margin: auto;padding-bottom: 30px}
    a{padding-right: 20px;background: url(https://dl.dropboxusercontent.com/u/62557375/temp/site/external_link_icon.gif) no-repeat right}
    </style>

</head>
<body>
    <div class="main">
        <h1><?=$templateName?></h1>
        <ul>
        <?php
            if ($handle = opendir('.')) {
                foreach (glob("*.html") as $filename) {
                    echo "<li><a href='$filename' target='_blank'>$filename</a></li>";
                }
                closedir($handle);
            }
         ?>
        </ul>
        <div class="img">
            <img src="screenshot.jpg" alt="">
        </div>
    </div>
</body>
</html>