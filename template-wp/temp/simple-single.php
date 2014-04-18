<?php
/*
Single Post Template: simple-single
*/
get_header();
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <?php the_time('d.m.Y') ?> <?php the_author() ?>
            <?php the_content('Читать далее &raquo;'); ?>
            <?php _e('Теги:', 'kubrick'); ?>&nbsp;<?php the_tags(' ', ', ', '<br />'); ?>
            <?php _e('Добавлено в', 'kubrick'); ?>&nbsp;<?php the_category(', ') ?>
            <?php comments_popup_link( __('Нет комментариев &#187;', 'kubrick'), __('1 комментарий &#187;', 'kubrick'), __('% комментариев &#187;', 'kubrick') ); ?>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <!--error 404 page-->
    <?php include (TEMPLATEPATH . '/include/error.php'); ?>
    <!--end error 404 page-->
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

