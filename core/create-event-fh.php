<?php // Simple-Events - Create Event Form Handler

//disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//===================== Create Event Function ======================
function se_create_event(){
    if ( isset( $_POST['se-nonce'] ) && wp_verify_nonce( $_POST['se-nonce'], 'se-nonce' ) ) {
        // --------------------- Get Form Data -------------------
        // ************** Event Data **************
        $event_title = isset($_POST['event_title']) ? $_POST['event_title'] : 'Not Set';
        $event_description = isset($_POST['event_description']) ? $_POST['event_description'] : 'Not Set';
        $event_date = isset($_POST['event_date']) ? $_POST['event_date'] : 'Not Set';
        $event_file = isset($_FILES['event_image']) ? $_FILES['event_image'] : 'Not Set';

        //************* Other Data **************
        $redirect_url = isset($_POST['redirect-url']) ? $_POST['redirect-url'] : 'Not Set';
// ----------------------------- Proccess Data ----------------------
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

// --------------------------- Redirect -------------------------

            // Set redirect url
            $location = $redirect_url;

            //Redirect
            wp_redirect( $location );
    }
}

add_action( 'admin_post_se_create_event_form_response', 'se_create_event' );
