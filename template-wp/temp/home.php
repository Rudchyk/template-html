<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- post -->
        <?php include (TEMPLATEPATH . '/include/post.php'); ?>
        <!-- end post -->
    <?php endwhile; ?>
    <!-- pagination -->
    <?php include (TEMPLATEPATH . '/include/pagination.php'); ?>
    <!-- end pagination -->
<?php else : ?>
    <!--error 404 page-->
    <?php include (TEMPLATEPATH . '/include/error.php'); ?>
    <!--end error 404 page-->
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>