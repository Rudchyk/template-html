<div class="post" id="post-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <?php the_time('d.m.Y') ?> <?php the_author() ?>
    <?php the_content('Читать далее &raquo;'); ?>
    <?php _e('Теги:', 'kubrick'); ?>&nbsp;<?php the_tags(' ', ', ', '<br />'); ?>
    <?php _e('Добавлено в', 'kubrick'); ?>&nbsp;<?php the_category(', ') ?>
    <?php comments_popup_link( __('Нет комментариев &#187;', 'kubrick'), __('1 комментарий &#187;', 'kubrick'), __('% комментариев &#187;', 'kubrick') ); ?>
</div>