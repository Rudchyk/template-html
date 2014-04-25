<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();?>
        <div class="post" id="post-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <?php the_time('d.m.Y') ?> <?php the_author() ?>
            <?php the_content('Читать далее &raquo;'); ?>
            <?php _e('Теги:', 'kubrick'); ?>&nbsp;<?php the_tags(' ', ', ', '<br />'); ?>
            <?php _e('Добавлено в', 'kubrick'); ?>&nbsp;<?php the_category(', ') ?>
            <?php comments_popup_link( __('Нет комментариев &#187;', 'kubrick'), __('1 комментарий &#187;', 'kubrick'), __('% комментариев &#187;', 'kubrick') ); ?>
            <?php if ( comments_open() && pings_open() ) { // Both Comments and Pings are open ?>
            <?php printf(__('Вы можете <a href="#respond">написать ответ</a>, или просмотреть <a href="%s" rel="trackback">архив</a> сайта.', 'kubrick'), trackback_url(false)); ?>
            <?php } elseif ( !comments_open() && pings_open() ) { // Only Pings are Open ?>
            <?php printf(__('Ответы в настоящее время закрыты, но вы можете посмотреть <a href="%s" rel="trackback">архив</a> сайта.', 'kubrick'), trackback_url(false)); ?>
            <?php } elseif ( comments_open() && !pings_open() ) { // Comments are open, Pings are not ?>
            <?php _e('Вы можете оставить ответ.', 'kubrick'); ?>
            <?php } edit_post_link(__('Изменить эту запись', 'kubrick'),'','.'); ?>
            <?php comments_template(); ?>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <!--error 404 page-->
    <?php include (TEMPLATEPATH . '/include/error.php'); ?>
    <!--end error 404 page-->
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>