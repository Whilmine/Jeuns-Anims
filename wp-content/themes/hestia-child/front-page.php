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
            <section id="home-actualites">
                <h2 class="titlefont white first-title border-title"> A la une </h2>
                <div class="grid">
                    <div id="home-a-la-une" class="card-wrapper">
                        <div class="card">
                            <!-- on affiche le dernier article de la catégorie "a la une" -->

                            <?php
                                $args=array('posts_per_page' => 1,'post_type' => 'post','category_name' => "a-la-une");
                                $the_query_a_la_une = new WP_Query($args); ?>
                            <?php if ( $the_query_a_la_une -> have_posts() ) : while ( $the_query_a_la_une -> have_posts() ) : $the_query_a_la_une-> the_post(); ?>
                                <img src="<?php echo the_post_thumbnail_url();?>">
                                <a class="titlefont first-title-color third-title" href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                                <p>
                                    <?php the_excerpt() ?>
                                </p>
                            <?php endwhile; else: ?>
                                <!-- si il n'y en a pas, on affiche l'article le plus récent-->
                            <?php
                                $the_query = new WP_Query( 'posts_per_page=1' ); ?>
                                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                                <img src="<?php echo the_post_thumbnail_url();?>">
                                <a class="titlefont first-title-color third-title" href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                                <p>
                                    <?php the_excerpt() ?>
                                </p>
                            <?php
                            endwhile;  endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>

                    <?php
                    $recentarticles_full = new WP_Query( array('posts_per_page=3', 'cat' => 4 ) );
                    $recentarticles = new WP_Query( array('posts_per_page=3', 'cat' => 4, 'offset' => 1 ) );
                    $count = $recentarticles->post_count;
                    $count_full = $recentarticles_full->post_count;
                    $other_recentarticles_full = new WP_Query(array('posts_per_page' => $restofthearticles, 'category__not_in' => array( 4 )));
                    $countothersfull = $other_recentarticles_full->post_count;


                     if ($count < 3):
                         $restofthearticles = (3- $count);
                     endif;
                     if ($count_full == 0):
                        $offset_rest_of_the_articles=1;
                     else: $offset_rest_of_the_articles=0;
                     endif;
                     echo $count_full;
                    echo $countothersfull;
                    $other_recentarticles = new WP_Query(array('posts_per_page' => $restofthearticles, 'category__not_in' => array( 4 ), 'offset' => $offset_rest_of_the_articles));

                   if ($count_full + $countothersfull > 1){
                    ?>
                    <div id="home-otherevents">
                        <h3 class="secondary-title titlefont accentblue border-title">Les autres événements</h3>
                        <ul>
                            <?php
                            while ($recentarticles -> have_posts()) :  $recentarticles -> the_post();
                                $has_thumbnail = has_post_thumbnail();
                                if ($has_thumbnail == false){ $style = "150px;";} else {$style="0px";}?>
                                <li style="margin-left:<?php echo $style?>">
                                    <?php if ( has_post_thumbnail()) : ?>
                                        <span class="featured-img" style="background-image: url('<?php echo the_post_thumbnail_url()?>')"></span>
                                    <?php endif; ?>
                                    <span class="flex-column">
                                        <a class="titlefont white link-title" style="margin-left:-<?php  echo $style?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                            <span style="margin-left: -<?php  echo $style?> padding-right:<?php  echo $style?> ">
                                                <p style="margin-left:-<?php echo $style?>"> <?php the_excerpt() ?></p>
                                            </span>
                                       <a href="<?php echo the_permalink();?>"> <span class="btn-shape">Lire la suite</span></a>
                                    </span>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata();

                            while ( $other_recentarticles -> have_posts()) : $other_recentarticles-> the_post();
                                $has_thumbnail = has_post_thumbnail();
                                if ($has_thumbnail == false){ $style = "150px;";} else {$style="0px";}?>
                                <li style="margin-left:<?php echo $style?>">
                                    <?php if ( has_post_thumbnail()) : ?>
                                        <span class="featured-img" style="background-image: url('<?php echo the_post_thumbnail_url()?>')"></span>
                                    <?php endif; ?>
                                    <span class="flex-column">
                                        <a class="titlefont white link-title" style="margin-left:-<?php  echo $style?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                            <span style="margin-left: -<?php  echo $style?> padding-right:<?php  echo $style?> ">
                                                <p style="margin-left:-<?php echo $style?>"> <?php the_excerpt() ?></p>
                                            </span>
                                       <a href="<?php echo the_permalink();?>"> <span class="btn-shape">Lire la suite</span></a>
                                    </span>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </ul>
                        <a href="<?php echo get_page_link(60)?>"><div class="white border-title link-title">  Voir tout</div></a>
                    </div>
                    <? } ?>
                </div>
            </section>


            <?php // On revoie la de la page équipe
            $post_id = 16;
            $post = get_post( $post_id );
            $name = $post->post_title;
            $img = get_the_post_thumbnail_url($post_id);
            ?>
            <section id="home-team">
            <div>
                <h2 class="titlefont white first-title border-title"><?php echo $name;?></h2>
                <div class="card auto-width">
                    <div class="flex-row">
                        <div class="featured-img">
                            <img src="<?php echo $img ?>">
                        </div>
                        <div class="flex-column text-container">
                            <h3 class="first-title-color titlefont secondary-title">Jeun's Anims</h3>
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
                        </div>
                    </div>
                </div>
            </div>
            </section>
                <?php
                $post_id = 52;
                $post = get_post( $post_id );
                $name = $post->post_title;
                $img = get_the_post_thumbnail_url($post_id);?>
            <section id="home-contact">
                <div>
                    <h2 class="titlefont white first-title border-title">Contactez-nous</h2>
                    <div class="card">
                        <div class="flex-row">
                            <div class="featured-img">
                                <img src="<?php echo $img ?>">
                            </div>
                            <div class="flex-column text-container">
                                <h3 class="first-title-color titlefont secondary-title">Contact & Questions</h3>

                                <span class="titlefont third-title">Des questions pour nous ?</span>
                                <span class="btn-shape">Envoyer un message</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



<?php

    $loop = new WP_Query( array( 'post_type' => 'members','category_name' =>'membre-du-bureau',  'posts_per_page' => '10' ) ); ?>
        <?php

		get_footer();

} else {
	include( get_page_template() );
} ?>
