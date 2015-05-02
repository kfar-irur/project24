<?php

/*
 * Including all exernal files, unique for Project24
 */
include('map/map_api.php');

include('utils/email_api.php');
include('utils/comments.php');

include('pages/messages_api.php');
include('pages/description_api.php');
include('pages/inspiration_api.php');


/*
 * ShortCodes
 */ 
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

add_shortcode('get_messages', 'p24_getMessagesShortCode');
function p24_getMessagesShortCode($atts, $content){
	include('pages/messages.php');
}

add_shortcode('inspiration', 'p24_getInspirationShortCode');
function p24_getInspirationShortCode($atts, $content){
	include('pages/inspiration.php');
}

add_shortcode('get_map', 'p24_getMapShortCode');
function p24_getMapShortCode($atts, $content){
	require_once('map/all_areas.php');
}

function p24_loadMap_ajax(){
	require_once('map/all_areas.php');
	die();
}
add_action("wp_ajax_p24_loadMap_ajax", "p24_loadMap_ajax");
add_action("wp_ajax_nopriv_p24_loadMap_ajax", "p24_loadMap_ajax");

function p24_loadArea_ajax(){
	require_once('map/area.php');
	die();
}
add_action("wp_ajax_p24_loadArea_ajax", "p24_loadArea_ajax");
add_action("wp_ajax_nopriv_p24_loadArea_ajax", "p24_loadArea_ajax");

function p24_loadBeach_ajax(){
	require_once('map/beach.php');
	die();
}
add_action("wp_ajax_p24_loadBeach_ajax", "p24_loadBeach_ajax");
add_action("wp_ajax_nopriv_p24_loadBeach_ajax", "p24_loadBeach_ajax");

function p24_loadListingPage_ajax(){
	require_once('map/listing_page.php');
	die();
}
add_action("wp_ajax_p24_loadListingPage_ajax", "p24_loadListingPage_ajax");
add_action("wp_ajax_nopriv_p24_loadListingPage_ajax", "p24_loadListingPage_ajax");

function p24_loadListingApproved_ajax(){
	require_once('map/listing_approved.php');
	die();
}
add_action("wp_ajax_p24_loadListingApproved_ajax", "p24_loadListingApproved_ajax");
add_action("wp_ajax_nopriv_p24_loadListingApproved_ajax", "p24_loadListingApproved_ajax");

function p24_loadError_ajax(){
	require_once('map/error.php');
	die();
}
add_action("wp_ajax_p24_loadError_ajax", "p24_loadError_ajax");
add_action("wp_ajax_nopriv_p24_loadError_ajax", "p24_loadError_ajax");

?>

