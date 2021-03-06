<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Escape
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!--  ATTENTION remove the noindex for client projects  -->
    <meta name="robots" content="noindex" />
    <!--  ATTENTION remove the noindex for client projects  -->

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>">
