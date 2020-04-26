<?php // Simple-Events - Display Events Carousel


// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

        exit;

}

//================== Function which outputs html for carousel ===============
function se_events_manager(){
// -------------------- Get Data -------------------
    //include wpdb class
    global $wpdb;
// ************* Get Events from Database ***************
    $events = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}simple_events`");

    //--------- Output Create Event Code
    // Other
    $event_control_url = get_option( 'se_options');
    $redirect_url = strtok($_SERVER["REQUEST_URI"],'?');
    //Create Output Var
    $output = '';
    $output .= '<p class="se-create-event-btn" ><a class="btn-create" href="'. $event_control_url['se_event_control_url'] .'?redirect='. $redirect_url .'">Create Event</a></p>';
//Only proccess code if there are Events in DB
    if(count($events) > 0){
    //---------------------- Define Vars --------------------
        // String to Hold output data
        $event_count = 0;
        $event_count_a = [];
        $output .= '
                <div class="se-delete-events-container">';

    //------------------------ Proccess Data -----------------------

        foreach($events as $event){
    // **************** Update Counters/Vars ******************
            $event_count ++;
            $event_count_a[$event_count] = $event_count;
    //------------------ Get Event Details ------------------
            $event_title = $event->event_title;
            $event_description = $event->event_description;
            $event_photo_url = $event->event_photo_url;
            $event_date = $event->event_date;
            $event_id = $event->id;

            $output .= '
                    <div class="se-event-container" style="background-image:url('.$event_photo_url.'); background-size: cover;">
                        <div class="se-event-bg" style="background-color: rgba(129,21,32,0.8);">
                            <h2 class="event-title">'. $event_title .'</h2>
                            <h5 class="event-date">'. $event_date .'</h3>
                            <p class="event-description">'. $event_description .'</p>
                            <div class="btn">
                                <a class="btn-edit" href="'. $event_control_url['se_event_control_url'] .'?action=edit&id='. $event_id .'&title='. urlencode($event_title) .'&date='. urlencode($event_date) .'&description='. urlencode($event_description) .'&photo='. $event_photo_url .'&redirect='. $redirect_url .'">Edit</a>
                                <span>|</span>
                                <a class="btn-delete" href="'. $event_control_url['se_event_control_url'] .'?action=delete&id='. $event_id .'&title='. urlencode($event_title) .'&redirect='. $redirect_url .'">Delete</a>
                            </div>
                        </div>
                    </div>
                    ';

        }
        $output .= '</div>';
    }
    return $output;
}
add_shortcode('se_events_manager', 'se_events_manager');
