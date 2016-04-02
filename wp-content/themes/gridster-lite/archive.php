<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gridster
 */

get_header(); ?>
<?php get_sidebar(); ?>

<div id="main">
    <?php if (have_posts()) : ?>
        <header class="page-header">
            <h1 class="page-title">
                <?php
                if (is_category()) :
                    printf(__('Category Archives: %s', 'gridster'), '<span>' . single_cat_title('', false) . '</span>');

                elseif (is_tag()) :
                    printf(__('Tag Archives: %s', 'gridster'), '<span>' . single_tag_title('', false) . '</span>');

                elseif (is_author()) :
                    /* Queue the first post, that way we know
                     * what author we're dealing with (if that is the case).
                    */
                    the_post();
                    printf(__('Author Archives: %s', 'gridster'), '<span class="vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a></span>');
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();

                elseif (is_day()) :
                    printf(__('Daily Archives: %s', 'gridster'), '<span>' . get_the_date() . '</span>');

                elseif (is_month()) :
                    printf(__('Monthly Archives: %s', 'gridster'), '<span>' . get_the_date('F Y') . '</span>');

                elseif (is_year()) :
                    printf(__('Yearly Archives: %s', 'gridster'), '<span>' . get_the_date('Y') . '</span>');

                elseif (is_tax('post_format', 'post-format-aside')) :
                    _e('Asides', 'gridster');

                elseif (is_tax('post_format', 'post-format-image')) :
                    _e('Images', 'gridster');

                elseif (is_tax('post_format', 'post-format-video')) :
                    _e('Videos', 'gridster');

                elseif (is_tax('post_format', 'post-format-quote')) :
                    _e('Quotes', 'gridster');

                elseif (is_tax('post_format', 'post-format-link')) :
                    _e('Links', 'gridster');

                else :
                    _e('Archives', 'gridster');

                endif;
                ?>
            </h1>
            <?php
            if (is_category()) :
                // show an optional category description
                $category_description = category_description();
                if (!empty($category_description)) :
                    echo apply_filters('category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>');
                endif;

            elseif (is_tag()) :
                // show an optional tag description
                $tag_description = tag_description();
                if (!empty($tag_description)) :
                    echo apply_filters('tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>');
                endif;

            endif;
            ?>
        </header>
        <!-- .page-header -->


        <?php


        if (is_category()) {
            $category = get_category(get_query_var('cat'));
            $cat_id = $category->cat_ID;
        }

        $args = array(
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category', //change the taxonomy name here
                    'field' => 'id',
                    'include_children' => false,
                    'terms' => $cat_id //change the term id here
                )
            )
        );//array_search ($category->name,array_column($_query->posts, 'post_title'));   
        $_query = new WP_Query($args);
        $vertexPost = array_filter(
            $_query->posts,
            function ($e) use ($category) {
                return $e->post_title === $category->name;
            }
        );
        if (count($vertexPost) > 0) {
            $filterPostId = $vertexPost[0]->ID;
        }
        if ($_query->have_posts()):
            while ($_query->have_posts()):
                $_query->the_post();
                if (!$filterPostId) {
                    get_template_part('content', $_query->get_post_format());
                } elseif ($filterPostId == $post->ID) {
                    get_template_part('content', 'single');
                }


                //do something here the_title() etc
            endwhile;
        endif;

        wp_reset_query();


        ?>
        <!--        --><?php //while (have_posts()) : the_post(); ?>
        <!--            --><?php
//            /* Include the Post-Format-specific template for the content.
//             * If you want to overload this in a child theme then include a file
//             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
//             */
//            get_template_part('content', get_post_format());
//            ?>
        <!--        --><?php //endwhile; ?>
        <?php gridster_content_nav('nav-below'); ?>
    <?php else : ?>
        <?php get_template_part('no-results', 'archive'); ?>
    <?php endif; ?>
    <?php get_footer(); ?>
