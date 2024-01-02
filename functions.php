<?php
/**
 * Theme Functions here.
 * 
 * @package fresherszone
 */

function fz_enqueue_scripts()
{
    wp_enqueue_style('custom-stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', array(), '1.0.0', 'all');

    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/main.js', array('jquery'), true);
    wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', array('jquery'), true);
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/src/library/js/bootstrap.bundle.min.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'fz_enqueue_scripts');