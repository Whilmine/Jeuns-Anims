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
        <link href="/wp-content/themes/hestia-child/assets/css/contact.css" rel="stylesheet">
    <? }else if ($pageId == 60){
       ?> <link href="/wp-content/themes/hestia-child/assets/css/actualites.css" rel="stylesheet">
    <?} else if ($pageId == 16){
        ?><link href="/wp-content/themes/hestia-child/assets/css/team.css" rel="stylesheet"><? }
    else if ($pageId == 213){
        ?><link href="/wp-content/themes/hestia-child/assets/css/aide.css" rel="stylesheet"><? }
    ?>

</head>
<?php echo $pageId?>
<body <?php body_class(); ?>>
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




