<?php
/**
 * @package Gridster
 */
?>

<div id="main">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-full', array('class' => 'postimage')); ?>
        </a>
        <div id="content">
            <div id="postheading">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <ul id="meta">
                <li class="datemeta"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></li>
                <li class="categorymeta">
                    <?php _e('Posted in:', 'gridster') ?>
                    <?php the_category(', ') ?>
                </li>
                <li class="commentsmeta"><a href="<?php comments_link(); ?>">
                        <?php comments_number('0', '1', '%'); ?>
                    </a></li>
                <li class="authormeta">
                    <?php _e('Author:', 'gridster') ?>
                    <a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                        <?php the_author(); ?>
                    </a></li>
                <li class="tagmeta">
                    <?php the_tags('Tags:  ', ', ', ''); ?>
                </li>
            </ul>
            <?php the_content(); ?>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'gridster'),
                'after' => '</div>',
            ));
            ?>
            <?php edit_post_link(__('Edit', 'gridster'), '<span class="edit-link">', '</span>'); ?>


            <?php
            //get all posts for children of category $cata


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

            
            
            
            <div id="comments">
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number())
                    comments_template();
                ?>
            </div>
            <!-- #post-## -->
        </div>
        <!-- comments -->
        <?php gridster_content_nav('nav-below'); ?>
    </div>
    <!-- content -->
