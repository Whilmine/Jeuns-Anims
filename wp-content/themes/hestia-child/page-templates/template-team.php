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

	<?php get_footer(); ?>
