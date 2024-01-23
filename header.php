<?php
/**
 * Header Template.
 * 
 * @package fresherszone
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div id="post" class="site">
            <header id="mastheader" class="site-header" role="banner">
                <?php get_template_part('template-parts/header/nav'); ?>
            </header>
            <div id="content" class="site-content">