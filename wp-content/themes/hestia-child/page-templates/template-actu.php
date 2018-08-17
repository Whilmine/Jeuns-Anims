<?php
/**
 * Template Name: Page actualites
 *
 *Le template pour la page actu.
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





<div id="actualites" class="<?php echo hestia_layout(); ?>">
    <div class="flex-row flex-wrap justify-content">

    <?php
    $myposts = get_posts('');
    foreach($myposts as $post) :
        setup_postdata($post);
        ?>
    <div class="card" style="background-image: url('<?php the_post_thumbnail_url();?>')">

        <div class="card-content">
            <?php the_title(); ?>
            <?php the_excerpt(); ?>
        </div>


    </div>
    <?php endforeach; wp_reset_postdata(); ?>



	<?php get_footer(); ?>
    </div>
</div>