<?php
include_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php';

function filter_where($where) {
    $str = addslashes($_GET['s']);

    $where .= " AND post_title LIKE '%$str%' ";

    return $where;
}

add_filter('posts_where', 'filter_where');

$args = array(
    'post_status' => 'publish',
    'post_type' => array('post','page')
);

$ajax_query = new WP_Query($args);

remove_filter('posts_where', 'filter_where');

/* The LOOP */
echo '<ul id="simple-ajax-search-result-list">';
while ($ajax_query->have_posts()) : $ajax_query->the_post();
    ?>
    <!-- post -->
        <?php include (TEMPLATEPATH . '/include/posts/post.php'); ?>
    <!-- end post -->
    <?php
endwhile;
echo '</ul>';
