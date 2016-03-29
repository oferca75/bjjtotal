<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Gridster
 */

get_header(); ?>
<?php get_sidebar(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('content', 'single'); ?>
<?php endwhile; // end of the loop. ?>



<?php
//get all posts for children of category $cata


$post = get_post($post);
$title = isset($post->post_title) ? $post->post_title : '';

query_posts(array('posts_per_page' => 5, 'category__in' => array(get_cat_ID($title))));
while (have_posts()) {
    the_post();
    get_template_part('content', get_post_format($post->ID));
} ?>

<?php
//Reset Query
wp_reset_query();


?>




<?php //else : ?>
<!--    --><?php //get_template_part('no-results', 'index'); ?>
<?php //endif; ?>

<?php get_footer(); ?>
