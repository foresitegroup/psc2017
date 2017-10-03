<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title>
    <?php
    if(!is_home() || !is_front_page()) wp_title('-', true, 'right');
    echo get_bloginfo('name');
    ?>
  </title>

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
  
  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>
  
  <link href="//fonts.googleapis.com/css?family=Open+Sans:700i|Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?<?php echo filemtime(get_template_directory() . "/style.css"); ?>">

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $("a[href^='http']").not("[href*='" + window.location.host + "']").prop('target','new');
      $("a[href$='.pdf']").prop('target', 'new');

    	$('#search-button').click(function(){
    		var target = $(this).data('target');
    		$(target).toggleClass("show");
    	});

      $('#menu-button').click(function(){
        var target = $(this).data('target');
        $(target).toggleClass("show");
      });

      $(".tablepress").wrap('<div class="table-wrap"></div>');
    });
  </script>

  <script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-67207277-1', 'auto');
      ga('send', 'pageview');
  </script>
</head>

<body <?php body_class(); ?>>

<div id="header">
	<div class="site-width">
		<a href="<?php echo home_url(); ?>" id="logo"><?php dynamic_sidebar('logo'); ?></a>

    <?php dynamic_sidebar('header_tagline'); ?>

		<?wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header-menu' ) ); ?>

		<a id="search-button" title="Search" data-target="#search-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
		<div id="search-popup"><?php get_search_form(); ?></div>

    <?php dynamic_sidebar('usa'); ?>
	</div>
</div>

<div id="main-menu">
	<?wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'site-width' ) ); ?>
</div>

<a id="menu-button" data-target="#mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
<div id="mobile-menu">
  <?php
  get_search_form();
  wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
  wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
  ?>
</div>