<?php get_header('archive');
?>
<aside id="sidebar-2">
    <?php if ( !function_exists ( 'dynamic_sidebar' ) || !dynamic_sidebar ( 'sidebar-2' ) ) {
    } ?>
</aside>
<div id="content" style="text-align: center" class="cf">

    <div class="post">
        <h1> Brazilian JiuJitsu Visual</h1>
        <?php
        ($post->post_title) ? $post->post_title : '';
        $next_moves = query_posts(array('posts_per_page' => 20,
            'category__in' => array(1)));
        ?>
        <div class="home-posts"><?php
            if (have_posts()) :
                get_template_part('loop');
                ?>
                <div class="navigation g3 cf"><p><?php // posts_nav_link();
                        ?></p></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
