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






<?php //else : ?>
<!--    --><?php //get_template_part('no-results', 'index'); ?>
<?php //endif; ?>

<?php get_footer(); ?>
