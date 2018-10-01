<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 *
 * @package Hestia
 * @since Hestia 1.0
 */
$wrapper_div_classes = 'wrapper ';
if ( is_single() ) {
	$wrapper_div_classes .= join( ' ', get_post_class() );
}

$header_class = '';
$hide_top_bar = get_theme_mod( 'hestia_top_bar_hide', true );
if ( (bool) $hide_top_bar === false ) {
	$header_class .= 'header-with-topbar';
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset='<?php bloginfo( 'charset' ); ?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head();

    $pageId = get_the_ID();
    if ($pageId == 52){?>
        <title> Jeun's Anim's - Page contact </title>
    <? }else if ($pageId == 60){
       ?>  <title> Jeun's Anim's - Page actualités </title>
    <?} else if ($pageId == 16){
        ?><title> Jeun's Anim's - Page équipe </title><? }
    else if ($pageId == 213){
        ?><title> Jeun's Anim's - Page aide </title><? }
    else if ($pageId == 118){
        ?><title> Jeun's Anim's - Page mentions légales </title><? }
    else if ($pageId == 126 ){
        ?><title> Jeun's Anim's - Page politique de confidentialité </title><? }
    ?>

</head>
<?php echo $pageId?>
<body  <?php body_class(); ?>>
<div id="particles-js" class="absolute" style="width: 100%; z-index: -1"></div>
<div class="<?php echo esc_attr( $wrapper_div_classes ); ?> main-template">


    <header>
        <div class=" container header white <?php echo esc_attr( $header_class ); ?>" >
            <h1 class="main-title first-title titlefont"><?php the_title();?></h1>
            <div class="title-logo-wrapper">
                <a class="navbar-brand" ></a>
            </div>
        </div>
        <div style="height: 2px; background-color: #FFffff; width: 80%"></div>
    </header>


        <?php do_action( 'hestia_do_header' ); ?>




    <script type="text/javascript">
        particlesJS("particles-js", {"particles":{"number":{"value":160,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5287372649289357,"random":true,"anim":{"enable":true,"speed":1,"opacity_min":0,"sync":false}},"size":{"value":3.9458004845442964,"random":true,"anim":{"enable":false,"speed":4,"size_min":0.3,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":1,"direction":"right","random":true,"straight":true,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":600}}},"interactivity":{"detect_on":"window","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":250,"size":0,"duration":2,"opacity":0,"speed":3},"repulse":{"distance":76.01351351351346,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;    </script>
