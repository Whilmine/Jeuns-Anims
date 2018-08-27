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
		 * @hooked hestia_slider_section
		 */
		//do_action( 'hestia_header' ); ?>
<div class="title-content">
    <?php
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
    ?>



    <img class="absolute" id="saxo-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/saxo.png">
    <img class="absolute" id="note-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/note.png">
    <img class="absolute" id="guitar-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/guitar.png">
    <img class="absolute" id="tambour-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/tambour.png">
    <img class="absolute" id="trompette-pic" src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/trompette.png">
</div>
	    <div class="<?php echo esc_attr( hestia_layout() ); ?>">
            <h2 class="titlefont white first-title border-title"> A la une </h2>
            <div class="grid">
                <div  id="a-la-une" class="card">
                    <?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>
                    <!-- Reste à écrire la condition : si un article existe dans la catégorie a la une, on l'affiche a la place -->
                    <!-- dans l'autre cas , on affiche l'article le plus recent -->
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                        <img src="<?php echo the_post_thumbnail_url();?>">
                        <a class="titlefont first-title-color third-title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        <p><?php the_excerpt() ?></p>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

                <div id="otherevents">
                    <span class="secondary-title titlefont accentblue border-title">Les autres événements</span>
                    <ul>
                        <?php $recentarticles = new WP_Query( 'posts_per_page=4' ); ?>
                        <!-- Pour le moment je n'ai pas réussi a dégager le premier post, donc je triche en le dégageant via le css
                        il faut compléter la fonction pour que si il y'a une article a la une on ne dégage pas le premier, et que les articles de catégories a la une soit dégagés -->
                        <?php while ($recentarticles -> have_posts()) : $recentarticles -> the_post(); ?>
                       <li>
                           <!-- j'aimerais bien charger la petite tailles des images  ici  , mais j'y arrive pas momentanément-->
                           <span class="featured-img" style="background-image: url('<?php echo the_post_thumbnail_url()?>')"></span>
                           <span class="flex-column">
                            <a class="titlefont white" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            <p><?php the_excerpt() ?></p>
                           </span>
                       </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>

            <?php // On revoie la de la page équipe
            $post_id = 54;
            $post = get_post( $post_id );
            $name = $post->post_title;
            $img = get_the_post_thumbnail_url($post_id);
            ?>

            <div>
                <h2 class="titlefont white first-title border-title"><?php echo $name;?></h2>
                <div class="card">
                    <div class="flex-row">
                    <img src="<?php echo $img ?>">
                        <div class="flex-column">
                            <span class="first-title-color titlefont">Jeun's Anims</span>
                            <p>
                                <?php echo $post->post_content;?>
                            </p>

                            <nav class="sub-nav">
                                <?php
                                    wp_nav_menu ( array (
                                        'theme_location' => 'association-menu' ,
                                        'menu_class' => 'test-asso-menu',

                                         ) ); ?>
                            </nav>
                            <!-- <span>
                                <btn class="btn btn-primary">Lien 1</btn>
                                <btn class="btn btn-primary">Lien 2</btn>
                            </span> -->
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="titlefont white first-title border-title"> Contactez-nous</h2>
            <div class="card"></div>




<?php

    $loop = new WP_Query( array( 'post_type' => 'members','category_name' =>'membre-du-bureau',  'posts_per_page' => '10' ) ); ?>
        <?php

		get_footer();

} else {
	include( get_page_template() );
} ?>
