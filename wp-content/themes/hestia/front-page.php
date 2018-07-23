<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hestia
 * @since Hestia 1.0
 */


if ( ! is_page_template() ) {

		get_header();
		/**
		 * Hestia Header hook.
		 *
		 * 
		 */
		do_action( 'hestia_header' ); ?>
	    <div class="<?php echo esc_attr( hestia_layout() ); ?>">

            <?php
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
            ?>

            <h2 class="titlefont white first-title"> A la une </h2>

            <?php // On revoie la page équipe
            $post_id = 54;
            $post = get_post( $post_id );
            $name = $post->post_title;
            ?>
            <div>

                <h2 class="titlefont white first-title"><?php echo $name;?></h2>
                <div class="card">

                    <p><?php echo $post->post_content;?></p>
                </div>
            </div>
            <h2 class="titlefont white first-title"> Contactez-nous</h2>



<?php

    $loop = new WP_Query( array( 'post_type' => 'members','category_name' =>'membre-du-bureau',  'posts_per_page' => '10' ) ); ?>
        <?php

		get_footer();

} else {
	include( get_page_template() );
} ?>
