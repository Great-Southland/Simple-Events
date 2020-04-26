<?php // Enqueue admin Styles and Scripts

function se_attach_styles() {
    // Event Delete
    wp_enqueue_style( 'se-delete', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/delete.css', array(), null, 'all' );
    // Event Carousel
    wp_enqueue_style( 'se-carousel', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/carousel.css', array(), null, 'all' );
    wp_enqueue_script( 'se', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/carousel.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'se_attach_styles' );
