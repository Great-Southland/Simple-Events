<?php // Simple-Events - Front End Create Event Form

//disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function se_event_form() {
	// Only run code If user is logged in
	if(is_user_logged_in()){
		// Form Vars
		$form_action = esc_url( admin_url( 'admin-post.php' ) );
		$form_nonce = wp_create_nonce( 'se-nonce' );
		$redirect_url = strtok($_SERVER["REQUEST_URI"],'?');

		// Get Params from url
		$event_action = isset($_GET['action']) ? $_GET['action'] : 'create';
		$event_id = isset($_GET['id']) ? $_GET['id'] : false;
		$event_title = isset($_GET['title']) ? urldecode($_GET['title']) : '';
		$event_date = isset($_GET['date']) ? urldecode($_GET['date']) : '';
		$event_description = isset($_GET['description']) ? urldecode($_GET['description']) : '';
		$event_photo = isset($_GET['photo']) ? $_GET['photo'] : '';
		$redirect_url = isset($_GET['redirect']) ? $_GET['redirect'] : $redirect_url;

		//--------------- Add Url of current page where shortcode is on -------------------
		update_option('se_settings', [ 'url' => $redirect_url ]);

		// Output Code
		// Display correct form for action specified in url
		if ($event_action == 'delete'){
			$output = '
					<div class="wrapt">
						<form action="'. $form_action .'" method="post" enctype="multipart/form-data">
							<div class="">
								<p>Are You Sure You Want to Delete Event: '. $event_title .'?</p>
							</div>
							<input type="hidden" name="event_action" value="'. $event_action .'">
							<input type="hidden" name="event_id" value="'. $event_id .'">
							<input type="hidden" name="action" value="se_event_form_response">
							<input type="hidden" name="redirect-url" value="'. $redirect_url .'">
							<input type="hidden" name="se-nonce" value="'. $form_nonce .'">
							<input type="submit" name="submit" class="button button-primary" value="Delete Event">
						</form>
					</div>

			';

		} else {
			$output = '<div class="wrap">
						<form action="'. $form_action .'" method="post" enctype="multipart/form-data">
							<h3>Edit/Create Event</h3>
							<p>
								<label for="event_title">Title</label>
								<input class="regular-text" type="text" size="40" name="event_title" placeholder="Title" value="'. $event_title .'" id="event_title" required>
							</p>
							<p>
								<label for="event_date">Date</label>
								<input class="regular-text" type="text" size="40" name="event_date" placeholder="Date" value="'. $event_date .'" id="event_date" required>
							</p>

							<p>
								<label for="event_description">Description</label>
								<textarea id="event_description" class="regular-text" style="height: 10em; min-width:20em; min-height:5em;" type="text" name="event_description" placeholder="Description" required>'. $event_description .'</textarea>
							</p>
							<p>	<label for="event_image">Upload Image</label>
								<input type="file" name="event_image" id="event_image" placeholder="Upload Image"">
							</p>
							<input type="hidden" name="event_action" value="'. $event_action .'">
							<input type="hidden" name="event_id" value="'. $event_id .'">
							<input type="hidden" name="action" value="se_event_form_response">
							<input type="hidden" name="redirect-url" value="'. $redirect_url .'">
							<input type="hidden" name="se-nonce" value="'. $form_nonce .'">
							<input type="submit" name="submit" class="button button-primary" value="Edit/Add Event">
						</form>
					</div>';
		}
	} else {
		//If user is logged out, return empty $output
		$output = '<h2>Please Log In to View This Page</h2>';
	}
	return $output;
 }
add_shortcode('se_event_form', 'se_event_form');
