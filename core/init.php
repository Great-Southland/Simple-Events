<?php // Simple-Events - Initiate


// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// ================= Create DB Table ==============

global $wpdb;
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE `{$wpdb->prefix}simple_events` (
 event_title varchar(255) NOT NULL,
 event_description varchar(1000) NOT NULL,
 event_photo_url varchar(255) NOT NULL,
 event_date varchar(255) NOT NULL,
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
