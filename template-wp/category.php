<?php get_header(); ?> 
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
	<?php next_posts_link('&laquo; Старые записи') ?> 
	<?php previous_posts_link('Новые записи &raquo;') ?> 
<?php else : ?> 
	<!--single & page-->
	<div class="b-post empty-post">
		<!--article-->
		<article class="page">
			<h1 class="title page-title break"><?php _e('Пост не найден', 'kubrick'); ?></h1>
			<div class="data"></div>
			<div class="text page-text break">
				<p></p>
				<p><?php _e('Извините, но того, что вы ищете, здесь нет.', 'kubrick'); ?></p>
				<p></p>
			</div>
		</article>
		<!--end article-->
	</div>
	<!--end single & page-->  
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>