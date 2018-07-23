<?php
//add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
//function theme_enqueue_styles() {
//wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 //   wp_enqueue_style( 'other', get_template_directory_uri() . '/style2.css' );

//}

add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );
function enqueue_my_styles() {
    global $wp_styles;
    // Load the main stylesheet
    wp_enqueue_style( 'my-theme', get_template_directory_uri() . '/style.css' );

}

function wpm_custom_post_type() {

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
        // Le nom au pluriel
        'name'                => _x( "Membres de l'association", 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x( "Membre de l'association ", 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __( "Trombinoscope"),
        // Les différents libellés de l'administration
        'all_items'           => __( "Tout les membres de l'association"),
        'view_item'           => __( "Voir les membres de l'association"),
        'add_new_item'        => __( 'Ajouter un nouveau membre'),
        'add_new'             => __( 'Ajouter'),
        'edit_item'           => __( 'Editer la fiche tombinoscope'),
        'update_item'         => __( 'Modifier la fiche tombinoscope'),
        'search_items'        => __( 'Rechercher un membre'),
        'not_found'           => __( 'Non trouvée'),
        'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $args = array(
        'label'               => __( "Membres de l'association"),
        'description'         => __( 'Tous sur séries TV'),
        'labels'              => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports'            => array( 'title', 'editor','thumbnail','custom-fields', 'revisions' ),
        /*
        * Différentes options supplémentaires
        */
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'			  => array( 'slug' => 'member'),
        'taxonomies'          => array( 'category' ),

    );

    // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
    register_post_type( 'members', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

// Ajout du Menu vers Association

function add_sub_menu() {

// un seul menu
    // register_nav_menus('association-menu', __('Menu Page Association') );

    // add_action( 'init', 'add_sub_menu');

// plusieurs menu
    register_nav_menus(
 array(
'association-menu' => __( 'Menu vers Association' ),
 'test-menu' => __( 'Menu Test Random' ),
 )
 );
}
add_action( 'init', 'add_sub_menu' );

?>
