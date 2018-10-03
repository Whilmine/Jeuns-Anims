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
get_header("pages");
?>


<div id="trombinoscope" class="<?php echo hestia_layout(); ?>">
    <h2 class="accentblue titlefont secondary-title title">Les membres du bureau</h2>
    <div class="flex-row flex-wrap">
        <?php
        $loop = new WP_Query(array('post_type' => 'members', 'posts_per_page' => '0'));
        $instrumentArray = array(array("note-pic", "/wp-content/themes/hestia-child/assets/img/note.png"), array("maracas-pic", "/wp-content/themes/hestia-child/assets/img/maracas.png"),
            array("guitar-pic", "/wp-content/themes/hestia-child/assets/img/guitar.png"), array("saxo-pic", "/wp-content/themes/hestia-child/assets/img/saxo.png"), array("tambour-pic", "/wp-content/themes/hestia-child/assets/img/tambour.png"), array("saxo-pic", "/wp-content/themes/hestia-child/assets/img/saxo.png"), array("fa-pic", "/wp-content/themes/hestia-child/assets/img/fa.png"));
        $i = 0;

        while ($loop->have_posts()) :
        $loop->the_post();
        $meta = get_post_meta($post->ID, 'your_fields', true);
        if ($meta['checkbox'] === 'checkbox'){
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        ?>
        <div class="card-wrapper">
            <div class='card'>
                <img class="absolute" id="<?php echo $instrumentArray[$i][0] ?>" alt="élement décoratif"
                     src="<?php echo site_url() . $instrumentArray[$i][1] ?>">
                <?php $i++;
                if ($i >= 6) {
                    $i = 0;
                } ?>
                <img src="<? echo(get_the_post_thumbnail_url()); ?>" alt="<? echo $alt ?>">
                <?php
                echo "<h3 class='titlefont first-title-color'>";
                echo the_title();
                echo "</h3>";
                echo the_content();
                echo "</div></div>";
                };
                ?>
                <?php endwhile;
                wp_reset_query();
                ?>
            </div>


            <?php
            $testyloop = new WP_Query(array('post_type' => 'members', 'posts_per_page' => '10'));
            if ($testyloop->have_posts()) : while ($testyloop->have_posts()) : $testyloop->the_post();
                $metatety = get_post_meta($post->ID, 'your_fields', true);
                if ($metatety['checkbox'] != 'checkbox') :
                    $othermember = 'yes';
                    echo '<span class="accentblue titlefont secondary-title">Les bénévoles</span>';
                endif;
            endwhile; endif;


            if ($othermember == 'yes') {
                $secondloop = new WP_Query(array('post_type' => 'members', 'posts_per_page' => '10'));
                if ($secondloop->have_posts()) : while ($secondloop->have_posts()) : $secondloop->the_post();
                    $meta = get_post_meta($post->ID, 'your_fields', true);
                    if ($meta['checkbox'] != 'checkbox') {
                        echo "<div class='card-wrapper'><div class='card'><img src='";
                        echo (get_the_post_thumbnail_url()) . "'>";
                        echo "<h3 class='titlefont first-title-color'>";
                        echo the_title();
                        echo "</h3>";
                        echo the_content();
                        echo "</div></div>";
                    }
                endwhile;
                endif;
                wp_reset_query();
            }
            ?>
        </div>


        <?php get_footer(); ?>
