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
    $args_all_the_post = array(
        'numberposts' => -1
    );
    $myposts = get_posts($args_all_the_post);
    foreach($myposts as $post) :
        setup_postdata($post); ?>

        <a href="<?php echo the_permalink()?>">
            <?php if (has_post_thumbnail()) : ?>
                <div class="card" style="background-image:url('<?php echo the_post_thumbnail_url();?>')">
                <?php else: ?>
                <div class="card" style="background-image: url('/wp-content/themes/hestia-child/assets/img/background.jpg')"><?php endif; ?>
                    <span class="card-link">
                        <div <?php if(has_post_thumbnail()) : ?> class="card-content"<?php endif;?> style="padding:5px 15px; text-align: justify">
                            <span class="first-title-color fourth-title titlefont">
                                <?php the_title(); ?>
                            </span>
                            <span class="second-title-color titlefont" style="font-size: 25px; margin-top: 5px" >
                                  <?php $date = get_post_custom_values("date");
                                    echo  $date[0];?>
                             </span>
                            <?php if (has_post_thumbnail()): echo ""; else:?>
                                <span style="font-size:13px ">
                                    <?php the_excerpt()?>
                                </span> <?php endif; ?>
                        </div>
                    </span>
                </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
        </a>
    </div>	<?php get_footer(); ?>