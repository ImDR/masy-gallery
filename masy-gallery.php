<?php
/*
 * Plugin Name: Masy Gallery
 * Plugin URI:  https://github.com/ImDR/masy-gallery
 * Description: Just an another wordpress plugin
 * Version:     1.5
 * Author:      Dinesh Rawat
 * Author URI:  https://imdr.github.io/
 * Text Domain: masy-gallery
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

define('MASYGAL_PLUGIN',  plugin_dir_url(__FILE__));

add_action( 'wp_enqueue_scripts', 'masygal_add_plugin_scripts' );
function masygal_add_plugin_scripts() {
	wp_enqueue_style( 'fancybox3', MASYGAL_PLUGIN.'css/jquery.fancybox.min.css', array(), '3.2.5' );
	wp_enqueue_style( 'justifiedGallery', MASYGAL_PLUGIN.'css/justifiedGallery.min.css', array(), '3.6.3' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'masy', MASYGAL_PLUGIN.'js/macy.min.js', array('jquery'), '1.5', true );
	wp_enqueue_script( 'fancybox3', MASYGAL_PLUGIN.'js/jquery.fancybox.min.js', array('jquery'), '3.2.5', true );
	wp_enqueue_script( 'justifiedGallery', MASYGAL_PLUGIN.'js/jquery.justifiedGallery.min.js', array('jquery'), '3.6.3', true );
}

add_action( 'admin_enqueue_scripts', 'masygal_add_plugin_admin_scripts' );
function masygal_add_plugin_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script( 'masy-gallery', MASYGAL_PLUGIN.'js/masy-gallery.js', array('jquery', 'jquery-ui-sortable'), '1.5', true );
}

include_once('inc/masygal-post-register.php');
include_once('inc/masygal-gallery-metabox.php');
include_once('inc/masygal-masonry-shortcode.php');
include_once('inc/masygal-justified-shortcode.php');
include_once('inc/masygal-doc-page.php');


?>