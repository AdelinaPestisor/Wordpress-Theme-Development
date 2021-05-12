<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title(); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body class="body-custom" <?php body_class(); ?>>
<div class="container">
    <?php
    if (function_exists("wp_body_open")) {
        wp_body_open();
    }
    ?>
    <div id="page" class="site">
        <header id="masthead" class="site-header" role="banner">

            <?php get_template_part( "template-parts/navigation/navigation", "top"); ?>
            
        </header>
        <div id="content" class="site-content">