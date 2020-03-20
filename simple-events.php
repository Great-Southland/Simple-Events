<?php
/*
Plugin Name:  Simple Events
Description:  Plugin with Front End form which displays events as a carosoul and list via shortcode
Plugin URI:   Simple-Events
Author:       David Forg
Version:      0.1
Text Domain:  Simple-Events
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// ----------------- include plugin dependencies: admin and public ---------------
	require_once plugin_dir_path( __FILE__ ) . 'core/functions.php';
    require_once plugin_dir_path( __FILE__ ) . 'core/public/display/carousel.php';
    require_once plugin_dir_path( __FILE__ ) . 'core/public/display/list.php';
    require_once plugin_dir_path( __FILE__ ) . 'core/public/forms/create-event.php';

// ----------------- include plugin dependencies: admin only ----------------
if ( is_admin() ) {

	require_once plugin_dir_path( __FILE__ ) . 'PATH';
}
