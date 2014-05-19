<?php
/*
Template Name: custom_page
*/
get_header();
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <?php the_content('Читать далее &raquo;'); ?>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <!--error 404 page-->
    <?php include (TEMPLATEPATH . '/include/error.php'); ?>
    <!--end error 404 page-->
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>