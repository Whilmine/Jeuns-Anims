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
function slick_slider_styles(){
    wp_enqueue_style( 'slick_css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
}
add_action( 'wp_enqueue_scripts', 'slick_slider_styles' );

//Scripts
function scripts_js(){
    wp_enqueue_script( 'slick_js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true );

    wp_enqueue_script( 'particles.js', "/wp-content/themes/hestia-child/assets/js/particles.js");
}
add_action( 'wp_enqueue_scripts', 'scripts_js' );


function article_about_us() {

    register_post_type(
        'articles-about-us', array(
            'labels' => array('name' => __( 'On parle de nous' ), 'singular_name' => __( 'Article' ),'all_items' =>__('Tout les articles'),'add_new' => __( 'Ajouter un article'), 'add_new_item' => __( 'Ajouter un nouvel article') ),
            'menu_icon'           => 'dashicons-media-text',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );
}
add_action( 'init', 'article_about_us' );


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
        'description'         => __( "Tous les membres de l'association"),
        'menu_icon'           => 'dashicons-admin-users',
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

    // On enregistre notre custom post type qu'on nomme ici "members" et ses arguments
    register_post_type( 'members', $args );
    register_taxonomy_for_object_type( 'category', 'members' );
    register_taxonomy_for_object_type( 'post_tag', 'members' );

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
            'association-menu' => __( 'Menu - Association' ),
            'footer-menu' => __('Menu - Footer'),
            'legals-menu' => __('Menu - Légaux'),
        )
    );
}
add_action( 'init', 'add_sub_menu' );



function Memberfield_box() {
    add_meta_box(
        'member_field', // $id
        'Statut', // $title
        'show_member_meta_box', // $callback
        'members', // $screen
        'normal', // $context
        'high' // $priority
    );
}
function Video_box() {
    add_meta_box(
        'member_field', // $id
        'Vidéo mise en avant', // $title
        'show_video_meta_box', // $callback
        'post', // $screen
        'normal', // $context
        'high' // $priority
    );
}


function link_box() {
    add_meta_box(
        'link box', // $id
        'Lien', // $title
        'show_your_meta_box', // $callback
        'articles-about-us', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'Video_box' );
add_action( 'add_meta_boxes', 'link_box' );
add_action( 'add_meta_boxes', 'Memberfield_box' );

function save_your_fields_meta( $post_id ) {
    // verify nonce
    if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
        return $post_id;
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if ( 'page' === $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }

    $old = get_post_meta( $post_id, 'your_fields', true );
    $new = $_POST['your_fields'];

    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'your_fields', $new );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'your_fields', $old );
    }
}
add_action( 'save_post', 'save_your_fields_meta' );



function show_member_meta_box() {
    global $post;
    $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

    <input type="hidden" name="your_meta_box_nonce"
           value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <p>
        <label for="your_fields[checkbox]">Membre du bureau
            <input type="checkbox" name="your_fields[checkbox]" value="checkbox"
                <?php if ( $meta['checkbox'] === 'checkbox' ) echo 'checked'; ?>>
        </label>
    </p>
<?php }


function show_your_meta_box() {
    global $post;
    $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <p>
        <label for="your_fields[text]">Url du lien</label>
        <br>
        <input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php echo $meta['text']; ?>">
    </p>

<?php }

function show_video_meta_box() {
    global $post;
    $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <p>
        Pour  ajouter une video mise en avant, ajoutez la vidéo dans la <a href=" <?php get_site_url()?>/wp-admin/upload.php" target="_blank"> bibliothèque</a> puis récupérez le lien et collez le dans le champ ci dessous
               <br>
        <input type="text" name="your_fields[video]" id="your_fields[video]" class="regular-text" value="<?php echo $meta['video']; ?>">

       <br>  Ou ajoutez un lien youtube <br>

        <input type="text" name="your_fields[youtube]" id="your_fields[youtube]" class="regular-text" value="<?php echo $meta['youtube']; ?>">


    </p>



<?php }




register_sidebar( array(
    'name' => __( 'Sidebar blog', 'appliance' ),
    'id' => 'blog_sidebar',
    'description' => __( 'La sidebar du blog', 'appliance'),
    'before_widget' => '<div id="sidebar_blog_div">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
) );

function hestia_excerpt_more_new( $more ) {
    global $post;
    if ( ( ( 'page' === get_option( 'show_on_front' ) ) ) || is_single() || is_archive() || is_home() ) {
        return '<a class="moretag" href="' . esc_url( get_permalink( $post->ID ) ) . '"> ' . esc_html__( '...', 'hestia-pro' ) . '</a>';
    }
    return $more;
}
add_filter( 'excerpt_more', 'hestia_excerpt_more_new', 20 );


add_filter('comments_open', 'wpc_comments_closed', 10, 2);

function wpc_comments_closed( $open, $post_id ) {
    $post = get_post( $post_id );
    if ('post' == $post->post_type)
        $open = false;
    return $open;
}
?>