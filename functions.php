<?php
/**
 * Theme Functions here.
 * 
 * @package fresherszone
 */

function fz_enqueue_scripts()
{
    wp_enqueue_style('custom-stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assests/main.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'fz_enqueue_scripts');