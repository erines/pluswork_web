<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

if ( !isset($_SERVER['HTTP_X_SAKURA_FORWARDED_FOR']) && 
	empty($_SERVER["HTTPS"])) 
{
	header("Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
	exit; 
} 

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/cms/wp-blog-header.php' );
