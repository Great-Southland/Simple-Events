<?php // Simple-Events - Create Event Form Handler

//disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//===================== Create Event Function ======================
function se_event(){
    if ( isset( $_POST['se-nonce'] ) && wp_verify_nonce( $_POST['se-nonce'], 'se-nonce' ) ) {
        // --------------------- Get Form Data -------------------
        // ************** Event Data **************
        $event_title = isset($_POST['event_title']) ? $_POST['event_title'] : 'Not Set';
        $event_description = isset($_POST['event_description']) ? $_POST['event_description'] : 'Not Set';
        $event_date = isset($_POST['event_date']) ? $_POST['event_date'] : 'Not Set';
        $event_file = isset($_FILES['event_image']) ? $_FILES['event_image'] : false;
		$event_action = isset($_POST['event_action']) ? $_POST['event_action'] : '';
		$event_id = isset($_POST['event_id']) ? $_POST['event_id'] : '';

        //************* Other Data **************
        $redirect_url = isset($_POST['redirect-url']) ? $_POST['redirect-url'] : 'Not Set';
// ----------------------------- Proccess Data ----------------------
		// ------------ If $event_action is create -------------
		if ($event_action == 'create') {
	        //**************** Uploade File *******************
	        require_once(ABSPATH.'wp-admin/includes/file.php');
	        // Returns File URL
	        $event_photo_url = wp_handle_upload($event_file, array('test_form' => false))['url'];

	        //***************** Add Data To Database ****************
	        //Include wpdb class
	        global $wpdb;
	        //Prepare Table Name
	        // $table_name = $wpdb->prefix . 'simple_events';
	        $wpdb->insert(
	        	'wp_simple_events',
	        	array(
	        		'event_title' => $event_title,
	        		'event_description' => $event_description,
	        		'event_photo_url' => $event_photo_url,
	                'event_date' => $event_date,
	        	)
	        );
		}
		// ------------ If $event_action is edit -------------
		if ($event_action == 'edit') {
			//**************** Uploade File *******************
			// ************ if upload file has updated *************
			if ($event_file != false) {
				require_once(ABSPATH.'wp-admin/includes/file.php');
				// Returns File URL
				$event_photo_url = wp_handle_upload($event_file, array('test_form' => false))['url'];
			}

			//***************** Add Data To Database ****************
			// If an Image is selected Then run code to update photo url
			if (isset($event_photo_url)){
				//Include wpdb class
				global $wpdb;
				//Prepare Table Name
				$table_name = $wpdb->prefix . 'simple_events';
				$wpdb->update(
					$table_name,
					array(
						'event_title' => $event_title,
						'event_description' => $event_description,
						'event_photo_url' => $event_photo_url,
						'event_date' => $event_date,
					),
					array('id' => $event_id)
				);
			// Else Don't update photo url
			} else {
				//Include wpdb class
				global $wpdb;
				//Prepare Table Name
				$table_name = $wpdb->prefix . 'simple_events';
				$wpdb->update(
					$table_name,
					array(
						'event_title' => $event_title,
						'event_description' => $event_description,
						'event_date' => $event_date,
					),
					array('id' => $event_id)
				);
			}
		}
		// ------------ If $event_action is delete -------------
		if ($event_action == 'delete') {
			//Include wpdb class
			global $wpdb;
			//Prepare Table Name
			$table_name = $wpdb->prefix . 'simple_events';
			$wpdb->delete(
				$table_name,
				array('id' => $event_id)
			);
		}

// --------------------------- Redirect -------------------------

            // Set redirect url
            $location = $redirect_url;

            //Redirect
            wp_redirect( $location );
    }
}

add_action( 'admin_post_se_event_form_response', 'se_event' );
