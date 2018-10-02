<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Hestia
 * @since Hestia 1.0
 * @modified 1.1.30
 */


$hestia_blog_sidebar_layout = get_theme_mod( 'hestia_blog_sidebar_layout', 'sidebar-right' );
$wrap_class                 = apply_filters( 'hestia_filter_index_search_content_classes', 'col-md-8 blog-posts-wrap' );
get_header("search");


?>

<div class="<?php echo hestia_layout(); ?>">
	<div class="hestia-blogs">
		<div class="container search">
			<div class="row">
				<?php
				if ( $hestia_blog_sidebar_layout === 'sidebar-left' ) {
					get_sidebar();
				}
				?>
				<div class="<?php echo esc_attr( $wrap_class ); ?>">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content' );
						endwhile;
						the_posts_pagination();
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</div>
				<?php
				if ( $hestia_blog_sidebar_layout === 'sidebar-right' ) {
					get_sidebar();
				}
				?>
			</div>
		</div>
	</div>
</div>
	<?php get_footer(); ?>
