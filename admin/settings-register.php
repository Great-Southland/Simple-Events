<?php // se - Register Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

function se_register_settings() {

	/*

	register_setting(
		string   $option_group,
		string   $option_name,
		callable $sanitize_callback = ''
	);

	*/

	register_setting(
		'se_options',
		'se_options',
		'se_callback_validate_options'
	);

// ------------ Register Sections ------------
	/*

	add_settings_section(
		string   $id,
		string   $title,
		callable $callback,
		string   $page
	);

	*/

	add_settings_section(
		'se_section_se_settings',
		'Simple Events Settings',
		'se_callback_section_nextcloud_settings',
		'se'
	);

// ----------- Register Fields ----------------

/*

add_settings_field(
		string   $id,
	string   $title,
	callable $callback,
	string   $page,
	string   $section = 'default',
	array    $args = []
);

*/

	add_settings_field(
		'se_event_control_url',
		'Event Control URL (Page where [se_event_form] shortcode is on)',
		'se_callback_field_text',
		'se',
		'se_section_se_settings',
		[ 'id' => 'se_event_control_url', 'label' => 'Simple Events Event Control URL', 'placeholder' => 'https://www/example.com']
	);

}
add_action( 'admin_init', 'se_register_settings' );
