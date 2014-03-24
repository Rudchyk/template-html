<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<h2 class="title"><?php _e('Результаты поиска', 'kubrick'); ?></h2>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?> style="padding:0 0 10px; 0">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, d F Yг.') ?></small><br />
                <small><?php _e('Категория:', 'kubrick'); ?>&nbsp;<?php the_category(', ') ?></small>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Старые записи', 'kubrick')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Новые записи &raquo;', 'kubrick')) ?></div>
		</div>
	<?php else : ?>
	<!--error 404 page-->
    <?php include (TEMPLATEPATH . '/include/error.php'); ?>
    <!--end error 404 page-->
	<?php endif; ?>
<?php get_footer(); ?>