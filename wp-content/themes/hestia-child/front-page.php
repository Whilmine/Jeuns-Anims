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


if (!is_page_template()) {

get_header();
/**
 * Hestia Header hook.
 *
 * @hooked hestia_slider_section
 */
//do_action( 'hestia_header' );

?>

<div id="particles-js" class="absolute" style="width: 100%; z-index: -1"></div>
<div class="title-content">
    <div class="absolute triangle-container" style=" width: 100%; overflow: hidden">
        <img class="absolute" id="triangle08" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle04.png">
        <img class="absolute" id="triangle07" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle07.png">
        <img class="absolute" id="triangle06" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle06.png">
        <img class="absolute" id="triangle01" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle01.png">
        <img class="absolute" id="triangle02" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle02.png">
        <img class="absolute" id="triangle03" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle03.png">
        <img class="absolute" id="triangle04" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle04.png">
        <img class="absolute" id="triangle05" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle05.png">
        <img class="absolute" id="triangle09" alt="motifs triangulaires"
             src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/triangle05.png">
    </div>

    <?php
    if (function_exists('the_custom_logo')) {
        the_custom_logo();    }
    ?>
    <img class="absolute" id="saxo-pic"
         src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/saxo.png"
         alt="une image de saxophone">
    <img class="absolute" id="note-pic"
         src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/note.png"
         alt="une image de clé de sol">
    <img class="absolute" id="guitar-pic"
         src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/guitar.png"
         alt="une image de guitare">
    <img class="absolute" id="tambour-pic"
         src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/tambour.png"
         alt="une image de tambour">
    <img class="absolute" id="trompette-pic"
         src=" <?php echo site_url(); ?>/wp-content/themes/hestia-child/assets/img/trompette.png"
         alt="une image de trompette">
</div>
<div class="<?php echo esc_attr(hestia_layout()); ?>">
    <section id="home-actualites " data-aos="fade-right" ata-aos-easing="ease-in-out">
        <h2 class="titlefont white first-title border-title"> A la une </h2>
        <div class="grid">

            <div id="home-a-la-une" class="card-wrapper">
                <?php
                $args = array('posts_per_page' => 1, 'post_type' => 'post', 'category_name' => "a-la-une");
                $the_query_a_la_une = new WP_Query($args); ?>
                <?php if ($the_query_a_la_une->have_posts()) :
                    while ($the_query_a_la_une->have_posts()) :
                        $the_query_a_la_une->the_post(); ?>


                        <div class="card">
                            <?php $value = get_post_meta($post->ID, 'your_fields', true);
                            $video_mp4 = $value["video"];
                            $video_youtube = $value["youtube"];
                            if ($video_youtube != "") {
                                $youtube_char = "https://www.youtube.com/watch?v=";
                                $youtube_link = str_split($youtube_char);

                                $link_sended = str_split($video_youtube);
                                $lettercount = 0;

                                foreach ($youtube_link as $value01) {
                                    if ($value01 == $link_sended[$lettercount]) {
                                        unset($link_sended[$lettercount]);
                                        $lettercount++;
                                    }}
                                ?>
                                <iframe width="560" height="315" src="<? echo "http://www.youtube.com/embed/";
                                foreach ($link_sended as $element) {
                                    echo $element;
                                } ?>?autoplay=1&loop=1&playlist=<? foreach ($link_sended as $element) {
                                    echo $element;
                                } ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            <?php }

                            else if ($video_mp4 != "") {
                                echo wp_video_shortcode(array('src' => $video_mp4, 'autoplay' => "on", 'height' => '500'));
                                global $wp_embed;
                            }

                            else if (has_post_thumbnail()) {
                                $thumbnail_id = get_post_thumbnail_id($post->ID);
                                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                                <img src="<?php echo the_post_thumbnail_url() ?>" alt="<?php echo $alt ?>"> <? } ?>
                                <div class="text-justify">
                                    <span class="titlefont first-title-color third-title">
                                        <?php the_title(); ?>
                                    </span>
                                    <p style="margin-top: -10px">
                                        <?php the_excerpt() ?>
                                    </p>
                                </div>
                            <?php
                            function force_relative_url ($url)
                            {
                                return preg_replace ('/^(http)?s?:?\/\/[^\/]*(\/?.*)$/i', '$2', '' . $url);
                            }
                            $relative_permalink = force_relative_url (get_permalink ($post->ID));
                            ?>
                            <a href="<? echo $relative_permalink?>"><span class="btn-shape">Lire la suite</span> </a>
                        </div>

                    <?php endwhile;
                else:
                    // si il n'y en a pas, on affiche l'article le plus récent
                    $the_query = new WP_Query('posts_per_page=1'); ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post();
                    $thumbnail_id = get_post_thumbnail_id($post->ID);
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>

                    <a href="<?php the_permalink() ?>">
                        <div class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo the_post_thumbnail_url()?>" alt="<?php echo $alt ?>">
                            <? endif; ?>
                            <div class="text-justify">
                                    <span class="titlefont first-title-color third-title">
                                            <?php the_title(); ?>
                                    </span>
                                <p style="margin-top: -10px">
                                    <?php the_excerpt() ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        function force_relative_url ($url)
                        {
                            return preg_replace ('/^(http)?s?:?\/\/[^\/]*(\/?.*)$/i', '$2', '' . $url);
                        }
                        $relative_permalink = force_relative_url (get_permalink ($post->ID));
                        ;?>
                        <a href="<?php echo $relative_permalink ?>">
                            <span class="btn-shape">Lire la suite</span>
                        </a>
                    </a>
                <?php endwhile; endif;
                wp_reset_postdata(); ?>
            </div>


            <?php
            $recentarticles_full = new WP_Query(array('posts_per_page=3', 'cat' => 4));
            $recentarticles = new WP_Query(array('posts_per_page=3', 'cat' => 4, 'offset' => 1));
            $count = $recentarticles->post_count;
            $count_full = $recentarticles_full->post_count;
            $other_recentarticles_full = new WP_Query(array('posts_per_page' => $restofthearticles, 'category__not_in' => array(4)));
            $countothersfull = $other_recentarticles_full->post_count;


            if ($count < 3):
                $restofthearticles = (3 - $count);
            endif;
            if ($count_full == 0):
                $offset_rest_of_the_articles = 1;
            else: $offset_rest_of_the_articles = 0;
            endif;
            $other_recentarticles = new WP_Query(array('posts_per_page' => $restofthearticles, 'category__not_in' => array(4), 'offset' => $offset_rest_of_the_articles));

            if ($count_full + $countothersfull > 1) {
                ?>
                <div id="home-otherevents">
                    <h3 class="secondary-title titlefont accentblue border-title">Les autres événements</h3>
                    <ul>
                        <?php
                        while ($recentarticles->have_posts()) : $recentarticles->the_post();
                            $has_thumbnail = has_post_thumbnail();
                            if ($has_thumbnail == false) {
                                $style = "150px;";
                            } else {
                                $style = "0px";
                            } ?>
                            <li style="margin-left:<?php echo $style ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <span class="featured-img"
                                          style="background-image: url('<?php echo the_post_thumbnail_url() ?>')"></span>
                                <?php endif; ?>
                                <span class="flex-column">
                                        <a class="titlefont white link-title" style="margin-left:-<?php echo $style ?>"
                                           href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                            <span style="margin-left: -<?php echo $style ?> padding-right:<?php echo $style ?> ">
                                                <p style="margin-left:-<?php echo $style ?>"> <?php the_excerpt() ?></p>
                                            </span>
                                    <?php
                                    function force_relative_url ($url)
                                    {
                                        return preg_replace ('/^(http)?s?:?\/\/[^\/]*(\/?.*)$/i', '$2', '' . $url);
                                    }
                                    $relative_permalink = force_relative_url (get_permalink ($post->ID));
                                    ;?>
                                       <a href="<?php echo $relative_permalink ?>"> <span
                                                   class="btn-shape">Lire la suite</span></a>
                                    </span>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata();

                        while ($other_recentarticles->have_posts()) : $other_recentarticles->the_post();
                            $has_thumbnail = has_post_thumbnail();
                            if ($has_thumbnail == false) {
                                $style = "150px;";
                            } else {
                                $style = "0px";
                            } ?>
                            <li style="margin-left:<?php echo $style ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <span class="featured-img"
                                          style="background-image: url('<?php echo the_post_thumbnail_url() ?>')"></span>
                                <?php endif; ?>
                                <span class="flex-column">
                                        <a class="titlefont white link-title" style="margin-left:-<?php echo $style ?>"
                                           href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                            <span style="margin-left: -<?php echo $style ?> padding-right:<?php echo $style ?> ">
                                                <p style="margin-left:-<?php echo $style ?>"> <?php the_excerpt() ?></p>
                                            </span>

                                       <a href="<?php echo the_permalink(); ?>"> <span
                                                   class="btn-shape">Lire la suite</span></a>
                                    </span>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                    <a href="<?php echo get_page_link(60) ?>">
                        <div class="white border-title link-title"> Voir tout</div>
                    </a>
                </div>
            <? } ?>
        </div>
    </section>


    <?php // On revoie la de la page équipe
    $post_id = 16;
    $post = get_post($post_id);
    $name = $post->post_title;
    $img = get_the_post_thumbnail_url($post_id);
    ?>
    <section id="home-team">
        <div>
            <h2 class="titlefont white first-title border-title" data-aos="fade-right"
                data-aos-easing="ease-in-out"><?php echo $name; ?></h2>
            <div class="card auto-width" data-aos="fade-right" data-aos-easing="ease-in-out">
                <div class="flex-row">
                    <div class="featured-img">
                        <img src="<?php echo $img ?>" alt="L'équipe au complet">
                    </div>
                    <div class="flex-column text-container">
                        <h3 class="first-title-color titlefont secondary-title">Jeun's Anims</h3>
                        <p>
                            <?php echo $post->post_content; ?>
                        </p>

                        <nav class="sub-nav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'association-menu',
                                'menu_class' => 'test-asso-menu',

                            )); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $post_id = 52;
    $post = get_post($post_id);
    $name = $post->post_title;
    $img = get_the_post_thumbnail_url($post_id); ?>
    <section id="home-contact">
        <div>
            <h2 class="titlefont white first-title border-title" data-aos="fade-left" ata-aos-easing="ease-in-out">
                Contactez-nous</h2>
            <div class="card" data-aos="fade-left" ata-aos-easing="ease-in-out">
                <div class="flex-row">
                    <div class="featured-img">
                        <img src="<?php echo $img ?>" alt="Nos locaux">
                    </div>
                    <div class="flex-column text-container">
                        <h3 class="first-title-color titlefont secondary-title">Contact & Questions</h3>

                        <span style="margin-bottom: 15px" class="second-title-color titlefont third-title">Des questions pour nous ?</span>
                        <a href="<? get_site_url() ?>/contact"><span class="btn-shape">Envoyer un message</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 160,
                    "density": {"enable": true, "value_area": 800}
                },
                "color": {"value": "#ffffff"},
                "shape": {
                    "type": "circle",
                    "stroke": {"width": 0, "color": "#000000"},
                    "polygon": {"nb_sides": 5},
                    "image": {"src": "img/github.svg", "width": 100, "height": 100}
                },
                "opacity": {
                    "value": 0.5287372649289357,
                    "random": true,
                    "anim": {"enable": true, "speed": 1, "opacity_min": 0, "sync": false}
                },
                "size": {
                    "value": 3.9458004845442964,
                    "random": true,
                    "anim": {"enable": false, "speed": 4, "size_min": 0.3, "sync": false}
                },
                "line_linked": {"enable": false, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1},
                "move": {
                    "enable": true,
                    "speed": 1,
                    "direction": "right",
                    "random": true,
                    "straight": true,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {"enable": false, "rotateX": 600, "rotateY": 600}
                }
            },
            "interactivity": {
                "detect_on": "window",
                "events": {
                    "onhover": {"enable": true, "mode": "repulse"},
                    "onclick": {"enable": true, "mode": "repulse"},
                    "resize": true
                },
                "modes": {
                    "grab": {"distance": 400, "line_linked": {"opacity": 1}},
                    "bubble": {"distance": 250, "size": 0, "duration": 2, "opacity": 0, "speed": 3},
                    "repulse": {"distance": 76.01351351351346, "duration": 0.4},
                    "push": {"particles_nb": 4},
                    "remove": {"particles_nb": 2}
                }
            },
            "retina_detect": true
        });
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function () {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
        ;            </script>

    <?php

    get_footer();

    } else {
        include(get_page_template());
    } ?>
