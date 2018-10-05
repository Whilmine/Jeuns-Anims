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





<div class="<?php echo hestia_layout(); ?>"  id="team">
    <section  class="flex-row flex-wrap justify-content" >
        <img class="absolute" id="piano-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/piano.png" alt="une image décorative de piano">
        <img class="absolute" id="basse-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/basse.png" alt="une image décorative de basse">
        <div class="card auto"  data-aos-duration="2000">
            <div class="flex-row">
                <div class="featured-img" style="background-image: url('<?php echo  get_the_post_thumbnail_url(16);?>'); border-radius: 10px">
                </div>
                <div class="flex-column  text-container text-justify" >
                    <span class="titlefont second-title-color secondary-title">  L'équipe
                    </span>
                    <span> <?php  echo  get_post_field('post_content', 16); ?></span>
                    <a href="<? get_site_url()?>\trombinoscope" style="margin-left: auto"><span class="btn-shape">Voir le trombinoscope</span></a>
                </div>
            </div>
        </div>
    </section>
    <?php
    $loop = new WP_Query( array( 'post_type' => 'articles-about-us') );
    if ($loop->have_posts()):?>
    <section id="articles-about-us">

        <h2 class="secondary-title titlefont accentblue border-title" style="margin-left: 5%;margin-right: 5%;"> On parle de nous </h2>
        <div>
            <div class="my-slider">
        <?php
            while ( $loop->have_posts() ) : $loop->the_post();
                    $value = get_post_meta($post->ID,'your_fields',true);
                    $thumbnail_id = get_post_thumbnail_id($post->ID);
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                ?>
                <div class="card-wrapper">

                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt ;?>">
                    <div class="text-justify">
                        <img class="absolute quotemark" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/quote-mark.png" alt="un élement décoratif">
                        <img class="absolute quotemark2" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/quote-mark.png" alt="un élement décoratif">
                        <h3 class='titlefont first-title-color'>
                            <?php echo the_title();?>
                        </h3>
                        <?php echo the_content(); ?>

                        <a href="<?php  echo $value["text"];?>" class="btn-shape more-link"> Voir l'article </a>
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
    <section id="photo-gallery" data-aos="fade-right" >
        <div class="card">
            <h2 class="secondary-title titlefont accentblue border-title"> Les photos </h2>
            <div class=" flex-row">
                <div class="grid">
                    <?php
                    $count = 0;
                    foreach ( get_gallery() as $attachment ) :
                        $count ++;
                    ?>
                        <img class="gallery-img" id="gallery_image_<?php echo $count ?>" src="<?php echo $attachment->medium_url?>" onmouseover="bigImg(this)"  alt="<?php echo $attachment->alt ?>">

                        <img  id="gallery_image_<?php echo $count ?>_large" src="<?php echo $attachment->large_url?>" style="display: none;"/>
                    <?php
                    if ($count > 8){ break;}
                    endforeach ?>
                </div>
                <div class="image-container flex-row">
                    <img id="featuredimg">
                    <div class="overlay-content"></div>
                </div>

            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    window.onload = function() {
        document.getElementById("featuredimg").src =  document.getElementById("gallery_image_1_large").src;

    };

    function bigImg(x) {
        document.getElementById("featuredimg").src = document.getElementById(x.id+"_large").src;
    }
</script>
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

