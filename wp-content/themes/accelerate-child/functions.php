

<?php 

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

include('map/map_api.php');
include('email.php');

function p24_getMapShortCode($atts, $content){
	ob_start();
	include('map/all_areas.php');
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('get_map', 'p24_getMapShortCode');

function p24_getMessagesShortCode($atts, $content){
	ob_start();
	include('map/messages.php');
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode('get_messages', 'p24_getMessagesShortCode');

function p24_loadMap_ajax(){
	ob_start();
	include('map/all_areas.php');
	$output_string = ob_get_contents();
	ob_end_clean();
	echo $output_string;
	die();
}
add_action("wp_ajax_p24_loadMap_ajax", "p24_loadMap_ajax");
add_action("wp_ajax_nopriv_p24_loadMap_ajax", "p24_loadMap_ajax");

function p24_loadArea_ajax(){
	ob_start();
	include('map/area.php');
	$output_string = ob_get_contents();
	ob_end_clean();
	echo $output_string;
	die();
}
add_action("wp_ajax_p24_loadArea_ajax", "p24_loadArea_ajax");
add_action("wp_ajax_nopriv_p24_loadArea_ajax", "p24_loadArea_ajax");

function p24_loadBeach_ajax(){
	ob_start();
	include('map/beach.php');
	$output_string = ob_get_contents();
	ob_end_clean();
	echo $output_string;
	die();
}
add_action("wp_ajax_p24_loadBeach_ajax", "p24_loadBeach_ajax");
add_action("wp_ajax_nopriv_p24_loadBeach_ajax", "p24_loadBeach_ajax");

function p24_loadListingPage_ajax(){
	ob_start();
	include('map/listing_page.php');
	$output_string = ob_get_contents();
	ob_end_clean();
	echo $output_string;
	die();
}
add_action("wp_ajax_p24_loadListingPage_ajax", "p24_loadListingPage_ajax");
add_action("wp_ajax_nopriv_p24_loadListingPage_ajax", "p24_loadListingPage_ajax");

function p24_loadListingApproved_ajax(){
	ob_start();
	include('map/listing_approved.php');
	$output_string = ob_get_contents();
	ob_end_clean();
	echo $output_string;
	die();
}
add_action("wp_ajax_p24_loadListingApproved_ajax", "p24_loadListingApproved_ajax");
add_action("wp_ajax_nopriv_p24_loadListingApproved_ajax", "p24_loadListingApproved_ajax");


function p24_getEstismatedPercentColor_ajax(){
	$beach_id = $_POST['bid'];
	$added = $_POST['added'];
	$percent = p24_getBeachPercent($beach_id, $added);
	//error_log("p24_getEstismatedPercentColor_ajax: beachPercent=".$percent);
	//ob_clean();
	echo $percent;
	echo " ".p24_getColor($percent);
	$percent = p24_getAreaPercent(p24_getBeachAreaId($beach_id), $added);
	echo " ".$percent;
	echo " ".p24_getColor($percent);
	$percent = p24_getMapPercent($added);
	echo " ".$percent;
	echo " ".p24_getColor($percent);
	die();
}

add_action("wp_ajax_p24_getEstismatedPercentColor_ajax", "p24_getEstismatedPercentColor_ajax");
add_action("wp_ajax_nopriv_p24_getEstismatedPercentColor_ajax", "p24_getEstismatedPercentColor_ajax");


?>