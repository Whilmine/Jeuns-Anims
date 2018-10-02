<?php
/*
Template Name: 404
*/

get_header( "pages" );

?>
<h1 class= "titlefont first-title-color third-title">Page Introuvable</h1>
<section class="error-404 not-found card" style="background-image:url('<?php echo the_post_thumbnail_url();?>')">
	<div class="container">
		<div class="row">
			<div class="page-404_content">
				<!-- <span class="page-title page-404--title"> Vous pouvez néanmoins votre bonheur ici...</span>
				<span class="mb-5 page-404--description"> Ou bien revenir sur vos pas  :)</span> -->
				<div class="404-search">
					<?php
					    get_search_form();
					?>
				</div>
                <a href="<?php echo get_site_url();?>" class="cta page-404--button btn-shape">Retour à l'accueil</a>
            </div>
		</div>
	</div>
</section>



<div class="footer-wrapper">
	<?php get_footer(); ?>
