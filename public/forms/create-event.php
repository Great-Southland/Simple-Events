<?php // Simple-Events - Front End Create Event Form

function se_create_event_form() {
// Form Vars
	$form_action = esc_url( admin_url( 'admin-post.php' ) );
	$form_nonce = wp_create_nonce( 'wnus-nonce' );
	$redirect_url = strtok($_SERVER["REQUEST_URI"],'?');



// Output Code
	$output = '<div class="wrap">
				<form action="'. $form_action .'" method="post">
					<h3>Add New Event</h3>
					<p>
						<label for="title">Title</label><br />
						<input class="regular-text" type="text" size="40" name="title" placeholder="title" id="title">
					</p>
					<p>
						<label for="date-start">Start Datw</label><br />
						<input class="regular-text" type="text" size="40" name=""date-start" placeholder="Start Date" id=""date-start">
					</p>
					<p>
						<label for="date-end">End Date</label><br />
						<input class="regular-text" type="text" size="40" name="date-end" placeholder="End Date" id="date-end">
					</p>
					<p>
						<label for="location">Location</label><br />
						<input class="regular-text" type="text" size="40" name="location" placeholder="Location" id="location">
					</p>
					<p>
						<label for="description">Description</label><br />
						<input class="regular-text" type="text" size="40" name="description" placeholder="Description" id="description">
					</p>
					<p>The user will receive this information via email.</p>
					<input type="hidden" name="action" value="se_create_event_form_response">
					<input type="hidden" name="front-back-end" value="frontend">
					<input type="hidden" name="redirect-url" value="'. $redirect_url .'">
					<input type="hidden" name="wnus-nonce" value="'. $form_nonce .'">
					<input type="submit" class="button button-primary" value="Add Event">
				</form>
			</div>';
		return $output;
 }
add_shortcode('create-event', 'se_create_event_form');
