<?php
/**
 * Template Name: Page trombinoscope
 *
 *Le template pour la page trombinoscope.
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





<div id="trombinoscope" class="<?php echo hestia_layout(); ?>">
    <div class="flex-row flex-wrap">


    <?php
   $loop = new WP_Query( array( 'post_type' => 'members', 'posts_per_page' => '10' ) ); ?>
  <?php
  $compteur = 0;
    while ( $loop->have_posts() ) : $loop->the_post();

        $meta = get_post_meta( $post->ID, 'your_fields', true );
    if ($meta['checkbox'] === 'checkbox'){
        $compteur = $compteur +1;
         echo "<div class='card-wrapper'><div class='card'><img src='";
         echo (get_the_post_thumbnail_url())."'>";
          echo  "<h3 class='titlefont first-title-color'>";
          echo the_title();
          echo "</h3>";
          echo the_content();
          echo "</div></div>";
    };
?>
    <?php endwhile; wp_reset_query();
    ?>


        <span class="accentblue titlefont secondary-title">Les membres du bureau</span>
    </div>




    <?php
    $secondloop = new WP_Query( array( 'post_type' => 'members', 'posts_per_page' => '10' ) );
    if ($secondloop->have_posts()): ?>
    <span class="accentblue titlefont secondary-title">Les bénévoles</span>
    <?php while ( $secondloop->have_posts() ) : $secondloop->the_post();
    $meta = get_post_meta( $post->ID, 'your_fields', true );
    if ($meta['checkbox'] != 'checkbox'){
        echo "<div class='card'><img src='";
        echo (get_the_post_thumbnail_url())."'>";
        echo  "<h3 class='titlefont first-title-color'>".the_title()."</h3>".the_content()."</div>";
    }
    ?>

    <?php endwhile; wp_reset_query();
    endif;?>

    </div>

	<?php get_footer(); ?>
