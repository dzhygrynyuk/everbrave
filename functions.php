<?php
/**
 * everbrave functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package everbrave
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.4.9' );
}

if ( ! function_exists( 'everbrave_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function everbrave_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu_header' => esc_html__( 'Header Menu', 'everbrave' ),
                'menu_footer_first' => esc_html__( 'Footer First Menu', 'everbrave' ),
				'menu_footer_second' => esc_html__( 'Footer Second Menu', 'everbrave' ),
                'menu_footer_copy' => esc_html__( 'Footer Copyright Menu', 'everbrave' ),
			)
		);
		
	}
endif;
add_action( 'after_setup_theme', 'everbrave_setup' );

/**
 * Enqueue scripts and styles.
 */
function everbrave_scripts() {
	// styles
	wp_enqueue_style( 'everbrave-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/libs/slick/slick.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/dist/css/app.css', array(), _S_VERSION );
	// scripts
	wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/libs/jquery.min.js', array(), _S_VERSION );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/libs/slick/slick.min.js#asyncload', array(), _S_VERSION);
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/dist/js/main-min.js#asyncload', array(), _S_VERSION );
    wp_enqueue_script( 'main2-js', get_template_directory_uri() . '/assets/src/js/main2.js', array(), _S_VERSION );
    wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/assets/src/js/loadmore.js', array('jquery') );
    wp_enqueue_script( 'blockrain', get_stylesheet_directory_uri() . '/assets/src/js/blockrain.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'everbrave_scripts' );


/**
* Custom posts
*/
//require get_template_directory() . '/inc/template-function-faq.php';

/**
* ACF Theme Options
*/
if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

/**
* Add SVG support to media uploader
*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
* Show Admin panel
*/
show_admin_bar(false);

/**
* Get this year
*/
function func_year( $atts ){
	return date('Y');
}
add_shortcode('year', 'func_year');



if ( ! function_exists( 'everbrave_posted_by' ) ) :
    function everbrave_posted_by() {
        $user_photo_url = get_field('user_custom_photo', 'user_'.get_the_author_ID());
        if(empty($user_photo_url)){
            $user_photo_url = get_template_directory_uri().'/assets/img/no-user-photo.png';
        }
        $byline = sprintf(
            esc_html_x( '@%s', 'post author', 'sodamonk' ),
            '<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
        );
        echo '<span class="byline"> <img src="'.$user_photo_url.'" alt="Image"> ' . $byline . '</span>';
    }
endif;

/**
* Load More Resouces
*/
function loadmore_resouces(){

    $post_ids = unserialize( stripslashes( $_POST['post_ids'] ) );
 
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $args['posts_per_page'] = 6;
    $args['post__not_in'] = $post_ids;

    $loop_ajax_posts = new WP_Query( $args );

    // query_posts( $args );
    // if( have_posts() ) : 
    //     while( have_posts() ): the_post();
    //         get_template_part( 'template-parts/post', 'item' );
    //     endwhile;
    // endif;

    if($loop_ajax_posts->have_posts()):
        while ($loop_ajax_posts->have_posts()): $loop_ajax_posts->the_post();
            if($_POST['topic']){
                set_query_var( 'topic_item', $_POST['topic'] );
            }
            get_template_part( 'template-parts/post', 'item' );
        endwhile;
    endif;

    die();
}
 
add_action('wp_ajax_loadmore_resources', 'loadmore_resouces');
add_action('wp_ajax_nopriv_loadmore_resources', 'loadmore_resouces');


function max_title_length( $title ) {
    $max = 130;
    if( strlen( $title ) > $max ) {
        return substr( $title, 0, $max ). " &hellip;";
    } else {
        return $title;
    }
}
add_filter( 'the_title', 'max_title_length', 10, 1 );

add_action( 'template_redirect', function() {
    if( is_page(2698) ){
        wp_redirect( '/404/', 301 );
        exit;
    }
});

/* Get post link */
function get_post_link($post_id){
    $custom_link = trim( get_post_meta( $post_id, 'post_custom_link', true) );
    if($custom_link){
        return $custom_link;
    }else{
        return get_the_permalink( $post_id );
    }
}

/* Get post target */
function get_post_target($post_id){
    $custom_link = trim( get_post_meta( $post_id, 'post_custom_link', true) );
    if($custom_link){
        return 'target="_blank"';
    }else{
        return '';
    }
}

/* Get nofollow */
function get_post_nofollow($post_id){
    $custom_link = trim( get_post_meta( $post_id, 'post_custom_link', true) );
    if($custom_link){
        return 'rel="nofollow"';
    }else{
        return '';
    }
}