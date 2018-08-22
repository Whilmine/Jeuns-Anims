<?php
/**
 * Template Name: Page contact
 *
 *Le template pour la page contact.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

//get_header();
get_header( "pages" );
/**
 * Don't display page header if header layout is set as classic blog.
 */
//do_action( 'hestia_before_single_page_wrapper' ); ?>

<div id="contact" class="<?php echo hestia_layout(); ?>">
    <div class="flex-row flex-wrap">
        <div class="card">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', 'pagecustom' );
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile;
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>

    </div>

    <?php get_footer(); ?>
