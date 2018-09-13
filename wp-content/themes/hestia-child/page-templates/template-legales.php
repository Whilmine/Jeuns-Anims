<?php
/**
 * Template Name: Pages Légales
 *
 *Le template pour la page actu.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

get_header("pages");

?>

<div id="mentions-legales">
	
	<div class="top-bg" style="background: linear-gradient(to left, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0.25) 100%), url('http://jeunsanims.fr/wp-content/uploads/2018/09/mentions-legales-1.png') no-repeat center fixed;">
		
		<h1> <?php echo the_title();?> </h1>

	</div>

	<?php if(have_posts()) : while(have_posts()) : the_post() ;?>

				<div class="ml_content">


					<?php the_content(); ?>
					

				</div>


		<?php endwhile;?>

	<?php endif;?>



</div>






<?php

get_footer(); ?>
















