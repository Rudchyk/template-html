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
    <meta name="description" content="HTML&amp;CSS template">
    <meta name="author" content="Sergii Rudchyk">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <style>
    .theme-container{
        max-width: 940px;
        margin: auto;
    }
    .theme-thumbnail,
    .theme-title{
        text-align: center
    }
    .theme-thumbnail{
        padding: 1em;
    }
    .theme-thumbnail-pic{
        box-shadow: 0 0 15px #ccc;
        max-width: 100%;
    }
    .theme-list{
        max-width: 500px;
        margin: auto;
        padding-bottom: 1em;
    }
    .theme-item-link{
        padding-right: 1.5em;
        background: url(https://dl.dropboxusercontent.com/u/62557375/temp/site/external_link_icon.gif) no-repeat right;
    }
    @media only screen and (max-width: 1024px) {
        .theme-list{
            padding: 0 1em;
        }
    }
    </style>
</head>
<body>
    <div class="theme-container">
        <h1 class="theme-title"><?=$templateName?></h1>
        <ul class="theme-list">
        <?php
            if ($handle = opendir('.')) {
                foreach (glob("*.html") as $filename) {
                    echo "<li class='theme-item'><a href='$filename' target='_blank' class='theme-item-link'>$filename</a></li>";
                }
                closedir($handle);
            }
         ?>
        </ul>
        <div class="theme-thumbnail">
            <img src="screenshot.jpg" alt="<?=$templateName?>" class="theme-thumbnail-pic">
        </div>
    </div>
</body>
</html>