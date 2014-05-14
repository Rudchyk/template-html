<?php get_header(); ?>
<h1><?php single_cat_title(''); ?></h1>
<?php
$args = array(
    'category' => $cat,
    'posts_per_page' => -1 // Display all posts in one page
);
$lastposts = get_posts($args);
foreach($lastposts as $post) : setup_postdata($post);
?>
    <!-- post -->
    <?php include (TEMPLATEPATH . '/include/posts/post.php'); ?>
    <!-- end post -->
<?php endforeach; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>