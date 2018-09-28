<?php
/**
 * The default template for displaying content
 *
 * Used for single posts.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

$sidebar_layout = get_theme_mod( 'hestia_blog_sidebar_layout', 'sidebar_right' );
$wrap_class     = apply_filters( 'hestia_filter_single_post_content_classes', 'single-post-wrap col-md-8' );
?>
<div class="row grid ">

    <div class=" <?php echo esc_attr( $wrap_class ); ?>">
        <?php
        if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
            do_action( 'hestia_before_single_post_article' );
            ?>

            <article id="post-<?php the_ID(); ?>" class="section section-text card">
                <?php

                do_action( 'hestia_before_single_post_content' ); ?>
                <h1> <?php the_title();?> </h1>
                <?php

                the_author();
                the_date();

                the_content();

                hestia_wp_link_pages(
                    array(
                        'before'      => '<div class="text-center"> <ul class="nav pagination pagination-primary">',
                        'after'       => '</ul> </div>',
                        'link_before' => '<li>',
                        'link_after'  => '</li>',
                    )
                );
                ?>
                La galerie
                <?
                the_gallery();
                ?>

            </article>
            <?php
            do_action( 'hestia_after_single_post_article' );
        }
        ?>
    </div>
    <div class="sidebar-blog"> Sidebar

        <?php
        if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
            <ul id="sidebar">
                <?php dynamic_sidebar( 'blog_sidebar' ); ?>
            </ul>
        <?php endif; ?>

    </div>

