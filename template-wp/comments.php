<div class="comments">
<?php if ($comments) : ?>
    <h3 class="comments-title"><?php comments_number( __('Нет комментариев', 'kubrick'), __('1 комментарий', 'kubrick'), __('% комментариев', 'kubrick') ); ?> к <?php the_title(); ?></h3>
    <ol class="comments-list">
        <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
    </ol>
<?php else : // this is displayed if there are no comments so far ?>
    <?php if ('open' == $post->comment_status) : // comments are open, but there are no comments ?>
    <?php else :// comments are closed ?>
        <p class="nocomments"><?php _e('Комментарии закрыты.', 'kubrick'); ?></p>
    <?php endif; ?>
<?php endif; ?>



<?php if ( comments_open() ) : ?>
    <div id="respond" class="respond">
        <h3 class="respond-title"><?php comment_form_title( __('Оставить комментарий', 'kubrick'), __('Оставить комментарий на %s' , 'kubrick') ); ?></h3>
        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link() ?></small>
        </div>
        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <div class="respond-header-nologget"><?php printf(__('Вы должны быть <a href="%s">зарегестрированы</a> чтоб оставить комментарий.', 'kubrick'), wp_login_url( get_permalink() )); ?></div>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="commentform">
                <?php if ( is_user_logged_in() ) : ?>
                    <div class="respond-header-logget"><?php printf(__('Вы вошли как <a href="%1$s">%2$s</a>.', 'kubrick'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Выйти', 'kubrick'); ?>"><?php _e('Выйти &raquo;', 'kubrick'); ?></a></div>
                <?php else : ?>
                    <div class="respond-row">
                        <input type="text" name="author" id="author" class="field respond-field" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
                        <label for="author">
                            <small><?php _e('Имя', 'kubrick'); ?> <?php if ($req) _e("(требуется)", "kubrick"); ?></small>
                        </label>
                    </div>
                    <div class="respond-row">
                        <input type="text" name="email" id="email" class="field respond-field" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
                        <label for="email">
                            <small><?php _e('Mail (не будет опубликован)', 'kubrick'); ?> <?php if ($req) _e("(требуется)", "kubrick"); ?></small>
                        </label>
                    </div>
                    <div class="respond-row">
                        <input type="text" name="url" id="url" class="field respond-field" value="<?php echo  esc_attr($comment_author_url); ?>" tabindex="3">
                        <label for="url">
                            <small><?php _e('Website', 'kubrick'); ?></small>
                        </label>
                    </div>
                <?php endif; ?>
                    <div class="respond-row">
                        <textarea name="comment" id="comment" class="field respond-field" tabindex="4"></textarea>
                    </div>
                    <div class="respond-row">
                        <input name="submit" type="submit" id="submit" class="button respond-button" tabindex="5" value="<?php _e('Оставить', 'kubrick'); ?>">
                        <?php comment_id_fields(); ?>
                    </div>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; // If registration required and not logged in ?>
    </div>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>