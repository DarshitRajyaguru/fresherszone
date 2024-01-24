<?php
/**
 * Tempalte for the different informations
 */

 function get_the_custom_post_thumbnail( $post_id, $size = 'featured-image',$additional_attributes = []){
    $custom_thumbnail = '';

    if( null === $post_id){
        $post_id = get_the_ID();
    }

    if( has_post_thumbnail($post_id)){
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $custom_thumbnail = wp_get_attachment_image(
            get_the_post_thumbnail($post_id), //post-id
            $size, //size of image
            false, //icon
            $additional_attributes
        );
    }
 }