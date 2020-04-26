<?php // Simple-Events - Display Events Carousel


// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

        exit;

}

//================== Function which outputs html for carousel ===============
function events_carousel(){
// -------------------- Get Data -------------------
    //include wpdb class
    global $wpdb;
// ************* Get Events from Database ***************
    $events = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}simple_events`");

//Only proccess code if there are Events in DB
    if(count($events) > 0){
    //---------------------- Define Vars --------------------
        // String to Hold output data
        $event_count = 0;
        $event_count_a = [];
        $output = '';
        $output .= '<div class="se-carousel-events-container alignfull">';

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

            $output .= '<div class="events fade">';
            $output .= '
                <div class="eventImage" style="background-image:url('.$event_photo_url.');">
                    <div class="content-wrap">
                        <p class="eventTitle">'. $event_title .'</p>
                        <p class="eventDate">'.$event_date.'</p>
                        <p class="eventDescription">'.$event_description.'</p>
                    </div>
                </div></div>';

        }
    // if ($event_count != 0){
        $output .= '
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div><br>
        <div style="text-align:center">';

        foreach($event_count_a as $event_num){
            $output .= '<span class="dot" onclick="currentSlide('.$event_num.')"></span>';
        }
        $output .= '</div>';
    } else {
        //If no results were returned define $output
        $output = '';
    }





    return $output;
}
add_shortcode('events_carousel', 'events_carousel');
