<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>" class="<?=html_class()?>">
<head>
    <?php
        if (is_home()) {
            $title = get_bloginfo('name');
        }
        else{
            $title =  wp_title('', False);
        }
    ?>
    <title><?=$title?></title>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- CSS style -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/index.css?v=1" media="screen">
    <!-- CSS for developers -->
    <!-- <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/dev.css?v=1" media="screen"> -->
    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0', 'kubrick'); ?>" href="<?php bloginfo('rss2_url'); ?>">
    <!-- Scripts -->
    <script data-headjs-load="<?php bloginfo('template_url');?>/js/init.js" src="<?php bloginfo('template_url');?>/js/head.min.js"></script>
    <!--Подключает скрипт comment-reply.js на статической странице или странице поста. Скрипт перемещает форму добавления комментария под комментарий, у которого мы кликнули на ссылку “ответить” -->
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>