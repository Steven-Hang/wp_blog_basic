<?php


/*
*   Load style.css into the web page
*/
function load_theme_stylesheet(){

    wp_register_style('style', get_template_directory_uri() . './style.css', array() , false, 'all'
    );
    wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'load_theme_stylesheet');

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
 
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
 
}

/*
*   Add Theme Support for Menu Links
*/

add_theme_support('menus');

register_nav_menus(
    array(

        'top-menu' => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme')
    )
);

/*
*   Add Theme Support for image thumbnails
*/

add_theme_support('post-thumbnails');
add_image_size('smallest',800, 300, true);
add_image_size('largest', 800, 400, true);

/*
*
*/

function remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'remove_comment_url');