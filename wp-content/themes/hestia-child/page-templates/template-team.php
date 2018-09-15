<?php
/**
 * Template Name: Page equipe
 *
 *Le template pour la page equipe.
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





<div class="<?php echo hestia_layout(); ?>">
    <section id="team" class="flex-row flex-wrap justify-content">
        <img class="absolute" id="piano-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/piano.png">
        <img class="absolute" id="basse-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/basse.png">
        <div class="card auto">
            <div class="flex-row">
                <div class="featured-img" style="background-image: url('<?php echo  get_the_post_thumbnail_url(16);?>'); border-radius: 10px">
                </div>
                <div class="flex-column  text-container text-justify">
                    <span class="titlefont second-title-color secondary-title">  L'équipe
                    </span>
                    <span> <?php  echo  get_post_field('post_content', 16); ?></span>
                    <span class="btn-shape">Voir le trombinoscope</span>
                </div>
            </div>
        </div>
    </section>
    <?php
    $loop = new WP_Query( array( 'post_type' => 'articles-about-us') );
    if ($loop->have_posts()):?>
    <section id="articles-about-us" >
        <h2 class="secondary-title titlefont accentblue border-title"> On parle de nous </h2>
        <div 
            <div class="my-slider">
        <?php
            while ( $loop->have_posts() ) : $loop->the_post();
                    $value = get_post_meta($post->ID,'your_fields',true);
                ?>
                <div class="card-wrapper">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                    <div class="text-justify">
                        <h3 class='titlefont first-title-color'>
                            <?php echo the_title();?>
                        </h3>
                        <?php echo the_content(); ?>

                        <a href="<?php  echo $value["text"];?>"> Voir l'article </a>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_query();
            ?>
            </div>
        </div>
    </section>
    <?php endif;?>
    <section id="photo-gallery" >
        <div class="card">
            <h2 class="secondary-title titlefont accentblue border-title"> Les photos </h2>
            <div class=" flex-row">
                <div class="grid">
                    <?php
                    $count = 0;
                    foreach ( get_gallery() as $attachment ) :
                        $count ++;
                    ?>
                        <img class="gallery-img" id="gallery_image_<?php echo $count ?>" src="<?php echo $attachment->medium_url?>" onmouseover="bigImg(this)">

                        <img  id="gallery_image_<?php echo $count ?>_large" src="<?php echo $attachment->large_url?>" style="display: none;"/>
                    <?php
                    if ($count > 8){ break;}
                    endforeach ?>
                </div>
                <div class="image-container flex-row">
                    <img id="featuredimg"/>
                </div>

            </div>
        </div>
    </section>

    <script type="text/javascript" src="/wp-content/themes/hestia-child/assets/js/displaythegallery.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/wp-content/themes/hestia-child/assets/slick/slick.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('.my-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear'
            });
        });
    </script>


	<?php get_footer(); ?>

