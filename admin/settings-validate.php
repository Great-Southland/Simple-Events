<?php // se - Validate Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// callback: validate options
function se_callback_validate_options( $input ) {

	// custom url
	if ( isset( $input['se_event_control_url'] ) ) {

		$input['se_event_control_url'] = $input['se_event_control_url'];

	}

	return $input;

}
