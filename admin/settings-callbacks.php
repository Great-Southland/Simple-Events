<?php // se - Settings Callbacks

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// -------------- callback NextCloud Settings section ---------------
function se_callback_section_nextcloud_settings() {

	echo '<p>These settings enable you to customize the Simple Events settings.</p>';

}

// -------------- callback NextCloud Settings Fields --------------

// callback: text field
function se_callback_field_text( $args ) {

	$options = get_option( 'se_options', se_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$placeholder = isset( $args['placeholder'] ) ? $args['placeholder'] : '';

	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

	echo '<input id="se_options_'. $id .'" name="se_options['. $id .']" type="text" size="40" placeholder="'. $placeholder .'"value="'. $value .'"><br />';
	echo '<label for="se_options_'. $id .'">'. $label .'</label>';

}
