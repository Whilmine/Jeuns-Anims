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





<div id="team" class="<?php echo hestia_layout(); ?>">
    <div class="flex-row flex-wrap">
        <div class="card">
            <span class="team-pic" style="background-image: url('<?php echo  get_the_post_thumbnail_url(54);?>')">
            </span>
            <span class="titlefont second-title-color secondary-title">    <?php
            echo get_the_title(54);
            ?>
            </span>


            <?php  echo  get_post_field('post_content', 54); ?>
<?

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

    <section id="articles-about-us" >
        <div class="card">
            <h2> On parle de nous </h2>
            <div class="my-slider">
            <?php
            $loop = new WP_Query( array( 'post_type' => 'articles-about-us') );
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

