<?php // se - Admin Menu



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// add top-level administrative menu
function se_add_menus() {

	/*
	add_menu_page(
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = '',
		string   $icon_url = '',
		int      $position = null
	)
	*/

	/*
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);
	*/

// -------------- Add Menus ---------------

// Add Main Menu Page
	add_menu_page(
		'Simple Events Settings',
		'Simple Events',
		'manage_options',
		'se',
		'se_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
add_action( 'admin_menu', 'se_add_menus' );
