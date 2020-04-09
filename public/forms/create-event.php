<?php // Simple-Events - Front End Create Event Form

//disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function se_create_event_form() {
// Form Vars
	$form_action = esc_url( admin_url( 'admin-post.php' ) );
	$form_nonce = wp_create_nonce( 'se-nonce' );
	$redirect_url = strtok($_SERVER["REQUEST_URI"],'?');


//TODO: Add Image Field
// Output Code
	$output = '<div class="wrap">
				<form action="'. $form_action .'" method="post" enctype="multipart/form-data">
					<h3>Add New Event</h3>
					<p>
						<label for="event_title">Title</label>
						<input class="regular-text" type="text" size="40" name="event_title" placeholder="Title" id="event_title" required>
					</p>
					<p>
						<label for="event_date">Date</label>
						<input class="regular-text" type="text" size="40" name="event_date" placeholder="Date" id="event_date" required>
					</p>

					<p>
						<label for="event_description">Description</label>
						<textarea style="height: 10em; min-width:20em; min-height:5em;" class="regular-text" type="text" name="event_description" placeholder="Description" id="event_description" required></textarea>
					</p>
					<p>	<label for="event_image">Upload Image</label>
						<input type="file" name="event_image" id="event_image" placeholder="Upload Image" required>
					</p>
					<input type="hidden" name="action" value="se_create_event_form_response">
					<input type="hidden" name="front-back-end" value="frontend">
					<input type="hidden" name="redirect-url" value="'. $redirect_url .'">
					<input type="hidden" name="se-nonce" value="'. $form_nonce .'">
					<input type="submit" name="submit" class="button button-primary" value="Add Event">
				</form>
			</div>';
		return $output;
 }
add_shortcode('create-event', 'se_create_event_form');
