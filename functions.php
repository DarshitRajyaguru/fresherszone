<?php
/**
 * Theme Functions here.
 * 
 * @package fresherszone
 */
if(!defined( 'FRESHERSZONE_DIR_PATH' )){
    define( 'FRESHERSZONE_DIR_PATH', untrailingslashit( get_template_directory() ) );
}
if(!defined( 'FRESHERSZONE_DIR_URI' )){
    define( 'FRESHERSZONE_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}
require_once FRESHERSZONE_DIR_PATH. '/inc/helpers/autoloader.php';

function fresherszone_get_theme_instance() {
	// \FRESHERSZONE_THEME\Inc\FRESHERSZONE_THEME::get_instance();
}
fresherszone_get_theme_instance();
function fz_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_style('custom-stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', array(), '1.0.0', 'all');

    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/main.js', array('jquery'), true);
    wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', array('jquery'), true);
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/src/library/js/bootstrap.bundle.min.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'fz_enqueue_scripts');

function setup_theme(){
    /**
     * Get the Site title
     */
    add_theme_support( 'title-tag' );

    /**
     * Add custom logo for the site
     */
    add_theme_support( 'custom-logo' , array(
        'header-text'	=> array('site-tile', 'site-description'),
        'height'		=> '480',
        'width'			=> '720',
        'flex-height'	=> true,
        'flex-width'	=> true
    ));

    /**
     * Adding custom background for the theme
     */
    add_theme_support( 'custom-background' , array(
        'default-color'         => '#e3e3e3',
        'default-background'    => '',
        'default-background-repeat' => 'no-repeat'
    ));

    /**
     * Adding support for post thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'html5', 
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style'
        )  
    );

    /**
     * Adding wp block styles.
     */
    add_theme_support( 'wp-block-styles' );

    /**
     * Adding theme support for alignments wide and full width.
     */
    add_theme_support( 'align-wide' );

    /**
     * Adding content area for the theme.
     */
    global $content_width;
    if( ! isset( $content_width ) ){
        $content_width = 1240;
    }

    register_nav_menus(array(
        'fresherszone-header-menu' => esc_html__('Header Menu', 'fresherszone'),
        'fresherszone-footer-menu' => esc_html__('Footer Menu', 'fresherszone')
    ));

    function get_menu_id( $location ){
        //Get all the locations.
        $locations = get_nav_menu_locations();
        //Get the object ID by location.
        $menu_id = $locations[$location];

        return !empty( $menu_id ) ? $menu_id : '';
    }

    function get_the_child_menu_items($menu_array, $parent_id){
        $child_menus = [];

        if(!empty($menu_array) && is_array($menu_array)){
            foreach ($menu_array as $menu) {
                if(intval($menu->menu_item_parent) === $parent_id){
                    array_push($child_menus,$menu);
                }
            }
        }
        return $child_menus;
    }
}
add_action('after_setup_theme', 'setup_theme');