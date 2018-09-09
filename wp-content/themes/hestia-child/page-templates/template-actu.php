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

    if (has_post_thumbnail()) : ?> <div class="card" style="background-image:url('<?php echo the_post_thumbnail_url();?>')">
            <?php else: ?>
            <div class="card" style="background-image: url('/wp-content/themes/hestia-child/assets/img/background.jpg')"><?php endif; ?>
                <a href="<?php echo the_permalink()?>">
                    <div <?php if(has_post_thumbnail()) : ?> class="card-content"><?php endif;?>
                        <span class="first-title-color fourth-title titlefont">
                            <?php the_title(); ?>
                        </span>
                        <span class="second-title-color titlefont">
                              <?php $date = get_post_custom_values("date");
                                echo  $date[0];?>
                         </span>
                        <?php if (has_post_thumbnail()): echo ""; else:?>)
                            <span>
                                <?php the_excerpt()?>
                            </span> <?php endif; ?>
                    </div>
                 </a>
            </div>
    <?php endforeach; wp_reset_postdata(); ?>



	<?php get_footer(); ?>
    </div>
</div>