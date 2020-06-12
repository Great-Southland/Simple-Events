# Simple Events For WordPress

A plugin for creating and deleting events and displaying them as a carousel.

### How to install

Upload this repository to your Wordpress plugins directory and activat it in your admin panel.

### How to use it
This plugin comes with 3 shortcodes
1. to display events as a carousel: [se_events_carousel]
2. to View/Create/Edit/Delete Events: [se_events_manager]
3. to Form to Create/Edit and Delete Events: [se_event_form]

The page where you put your [se_event_form] shortcode needs to be specified in Admin > Simple Events admin page, So the [se_events_manager] can link to it

The plugin creates a database table called wp_simple_events this is where the events will be stored.
It also creates a option in the wp_options table to store the [se_event_form] page url.
Files will be uploaded to wp-content > uploads > "current-year" > "current-month".
