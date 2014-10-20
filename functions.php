<?php

// load the theme css
function theme_styles() {
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css' );
    wp_enqueue_style( 'fonts-dot-com', get_template_directory_uri() . '/css/fonts.css' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
    wp_enqueue_style( 'fontello-codes', get_template_directory_uri() . '/css/fontello/css/fontello-codes.css' );
    wp_enqueue_style( 'animation-embedded', get_template_directory_uri() . '/css/fontello/css/fontello-embedded.css' );
    wp_enqueue_style( 'animation-ie7-codes', get_template_directory_uri() . '/css/fontello/css/fontello-ie7-codes.css' );
    wp_enqueue_style( 'animation-ie7', get_template_directory_uri() . '/css/fontello/css/fontello-ie7.css' );
    wp_enqueue_style( 'fontello', get_template_directory_uri() . '/css/fontello/css/fontello.css' );
    wp_register_style( 'fancybox', get_template_directory_uri() . '/css/fancybox.css');
    if ( is_single() || is_page("museum" || is_page("profile")) ) {
        wp_enqueue_style('fancybox');
    }
}

// load the theme js
function theme_js() {
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', '', '', true );
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), '', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );
    wp_enqueue_script( 'powertip', get_template_directory_uri() . '/js/powertip.js', array('jquery'), '', true);
    wp_register_script( 'flexslider', get_template_directory_uri() . '/js/flexslider.js', '', '', true );
    wp_register_script( 'scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'), '', true );
    wp_register_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.js', array('jquery'), '', true );
    wp_register_script( 'home', get_template_directory_uri() . '/js/home.js', array('jquery'), '', true );
    wp_register_script( 'single_projects', get_template_directory_uri() . '/js/single-projects.js', array('jquery','disable_scrolling'), '', true );
    wp_register_script( 'projects', get_template_directory_uri() . '/js/projects.js', array('jquery','disable_scrolling'), '', true );
    wp_register_script( 'disable_scrolling', get_template_directory_uri() . '/js/disable_scrolling.js', array('jquery'), '', true );
    wp_register_script( 'list-sort', get_template_directory_uri() . '/js/list-sort.js', array('jquery'), '', true );
    wp_register_script( 'year-sort', get_template_directory_uri() . '/js/year-sort.js', array('jquery'), '', true );
    wp_register_script( 'awards-year-sort', get_template_directory_uri() . '/js/awards-year-sort.js', array('jquery'), '', true );
    wp_register_script( 'splash-slider', get_template_directory_uri() . '/js/splash.js', array('jquery'), '', true );
    wp_register_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.js', array('jquery'), '', true );
    wp_register_script( 'googlemap', get_template_directory_uri() . '/js/googlemap.js', array('jquery','googleapi'), '', true );
    wp_register_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array('jquery'), '', true );

    if ( is_page('museum') ) {
        wp_enqueue_script( 'googlemap' );
        wp_enqueue_script( 'googleapi' );
    }
    if ( is_front_page('splash-slider') ) {
        wp_enqueue_script( 'home' );
        wp_enqueue_script( 'splash-slider' );
        wp_enqueue_script( 'flexslider' );
    }
    if ( is_page('home') ) {
        wp_enqueue_script( 'home' );
        wp_enqueue_script( 'flexslider' );
    }
    if ( is_page('icons') || is_page('visual') || is_page('architecture') || is_page('products') || is_page('exhibitions') || is_page('civic') || is_page('Commercial') || is_page('hospitality') || is_page('institutional') || is_page('Master Plans') || is_page('performance') || is_page('residential') ){
        wp_enqueue_script( 'projects' );
    }
    if ( is_page('name') || is_page('United States') || is_page('International') ) {
        wp_enqueue_script( "list-sort" );
    }
    if ( is_page('date') || is_page('lectures') ) {
        wp_enqueue_script( "year-sort" );
    }
    if ( is_page('awards') ) {
        wp_enqueue_script( "awards-year-sort" );
    }
    if ( is_single() || is_page("museum") || is_page("Profile")) {
        wp_enqueue_script( 'fancybox' );
        // wp_enqueue_script( 'flexslider' );
        wp_enqueue_script( 'waypoints' );
        wp_enqueue_script( 'scrollto' );
        wp_enqueue_script( 'single_projects' );
        // wp_enqueue_script( 'disable_scrolling' );
    }
}

function sanitize_string($word) {
    $cleanword = strtolower(preg_replace("/[^a-z]+/i", "", $word));
    return $cleanword;
}

function get_image($element, $size) {
    $image = wp_get_attachment_image_src( $element, $size );
    echo $image[0];
}


add_filter( 'request', 'my_request_filter' );
function my_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

function rmp_remove_menus(){
  
  // remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  // remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'rmp_remove_menus' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );
add_action('init', function() {
    if (!isset($_COOKIE['visited_recently'])) {
        setcookie('visited_recently', true, strtotime('1000*60*3'));
    }
});

add_action( 'get_image', 'get_image' );

// Enable custom menus
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );

// Set custom image size
add_image_size( "third", 660, 0, false );
add_image_size( "drawing_thumb", 0, 490 );
add_image_size( "thumb", 320, 240, false );
add_image_size( "project_thumb", 320, 240, true );
add_image_size( "vertical_thumb", 240, 320, false );
add_image_size( "square_thumb", 490, 490, true );

?>