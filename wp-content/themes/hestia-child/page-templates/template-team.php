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
    <section id="team" class="flex-row flex-wrap">
        <img class="absolute" id="piano-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/piano.png">
        <div class="card auto-width">
            <div class="flex-row">
                <div class="featured-img" style="background-image: url('<?php echo  get_the_post_thumbnail_url(16);?>')">
                </div>
                <div class="flex-column text-container">
                    <span class="titlefont second-title-color secondary-title">    <?php
                    echo get_the_title(16);
                    ?>
                    </span>
                    <span> <?php  echo  get_post_field('post_content', 16); ?></span>

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
                $meta = get_post_meta( $post->ID, 'your_fields', true );
                ?>
                <div class="card-wrapper">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                            <h3 class='titlefont first-title-color'>
                            <?php echo the_title();?>
                            </h3>
                        <?php echo the_content(); ?>
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
        <h2 class="secondary-title titlefont accentblue border-title"> Les photos </h2>

        <?php
        $count = 0;
        foreach ( get_gallery() as $attachment ) :
            $count ++;
        ?>


            <img src="<?php echo $attachment->thumb_url?>"
                 alt="<?php echo $attachment->alt ?>"
            />
        <?php         echo $attachment->url ?>


        <?php if ($count > 8){ break;}
        endforeach ?>
    </section>



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

