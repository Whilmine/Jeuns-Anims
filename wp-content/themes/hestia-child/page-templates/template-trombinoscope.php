<?php
/**
 * Template Name: Page trombinoscpe
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
    <div class="flex-row">


    <?php
    $loop = new WP_Query( array( 'post_type' => 'members','category_name' =>'membre-du-bureau',  'posts_per_page' => '10' ) ); ?>
  <?php
    while ( $loop->have_posts() ) : $loop->the_post();
        $meta = get_post_meta( $post->ID, 'your_fields', true );
    if ($meta['checkbox'] === 'checkbox'){
        echo "yoooooo";
    };
?>



    <div class="card">
        <img src="<?php echo (get_the_post_thumbnail_url()) ?>">
        <h3 class="titlefont first-title-color"><?php the_title() ?></h3>
        <?php the_content() ?>
    </div>
    <?php endwhile; wp_reset_query(); ?>

        <span class="accentblue titlefont secondary-title">Les membres du bureau</span>
    </div>

    <span class="accentblue titlefont secondary-title">Les bénévoles</span>


    <?php
    $secondloop = new WP_Query( array( 'post_type' => 'members', 'category_name' =>'membre', 'posts_per_page' => '10' ) ); ?>
    <?php while ( $secondloop->have_posts() ) : $secondloop->the_post(); ?>
        <div class="card">
            <img src="<?php echo (get_the_post_thumbnail_url()) ?>">
            <h1><?php the_title() ?></h1>
            <?php the_content() ?>
        </div>
    <?php endwhile; wp_reset_query(); ?>

    </div>

	<?php get_footer(); ?>
