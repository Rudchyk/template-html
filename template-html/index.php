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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
    body{
        background-color: #fafafa;
        font: 1rem Arial, Helvetica, sans-serif;
    }
    a{
        color: #287fc3;
    }
    a:hover{
        text-decoration: none;
    }
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
    @media only screen and (max-width: 1024px) {
        .theme-list{
            padding: 0 1em;
        }
    }
    .fa{
        font-size: 11px;
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
                    echo "<li class='theme-item'><a href='$filename' target='_blank' class='theme-item-link'>$filename</a> <i class='fa fa-external-link'></i></li>";
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