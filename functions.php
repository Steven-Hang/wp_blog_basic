<?php


/*
*   Load styles onto page
*/
function load_theme_stylesheet(){

    wp_register_style('style', get_template_directory_uri() . './style.css', array() , false, 'all'
    );
    wp_enqueue_style( 'load-fa', '//use.fontawesome.com/releases/v5.7.2/css/all.css' );
    wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'load_theme_stylesheet');

/*
*   Theme Support 
*/

function init(){
    // wp dynamic support page title
    add_theme_support('title-tag');
    // html5 support for areas array
    add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    // add menu page links 
    add_theme_support('menus');
    register_nav_menus(
        array(
            'top-menu' => __('Top Menu', 'theme'),
            'footer-menu' => __('Footer Menu', 'theme')
        )
    );
    // feature image support 
    add_theme_support('post-thumbnails');
    add_image_size('smallest',840, 500, true);
    add_image_size('largest', 840, 500, true);
}
add_action('after_setup_theme', 'init');


/*
*  Comment Section Modifications
*/
function wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
    }
      
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom');
function remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'remove_comment_url');


function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}

function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
	<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'sm-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );


/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );

//modify excerpt read more
function custom_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

require get_template_directory() . '/loop.php';

function wp_infinitepaginate(){
    
    $loopFile = $_POST['loop_file'];
    $paged = $_POST['page_no'];
    $action = $_POST['what'];
    $value = $_POST['value'];

    if($action == 'author_name'){
        $arg = array('author_name' => $value, 'paged' => $paged, 'post_status' => 'publish');
    } elseif ($action == 'category_name'){
        $arg = array('category_name' => $value, 'paged' => $paged, 'post_status' => 'publish' );
    } elseif ($action == 'search'){
        $arg = array('s' => $value, 'paged' => $paged, 'post_status' => 'publish' );
    } else {
        $arg = array('paged' => $paged, 'post_status' => 'publish');
    }
    # Load the posts
    query_posts( $arg );
    get_template_part( $loopFile );

    wp_reset_postdata();
    
    die();
}
add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate'); // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate'); // if user not logged in

