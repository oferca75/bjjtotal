<?php get_header('archive');
?>
<div id="content" class="cf">
    <?php
    ($post->post_title) ? $post->post_title : '';
    $next_moves = query_posts(array('posts_per_page' => 20,
        'category__in' => array(1)));

    if (have_posts()) :
        get_template_part('loop');
        ?>
        <div class="navigation g3 cf"><p><?php // posts_nav_link(); 
                ?></p></div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
