<?php


function p24_ml_description_ShortCode($atts, $content){
	require_once('description.php');
}

add_shortcode('ml_description', 'p24_ml_description_ShortCode');

function p24_changeToArabic_ajax() {

	require_once('arabic_des.php');

	die();
}
add_action("wp_ajax_p24_changeToArabic_ajax", "p24_changeToArabic_ajax");
add_action("wp_ajax_nopriv_p24_changeToArabic_ajax", "p24_changeToArabic_ajax");

$ajax_url = admin_url( 'admin-ajax.php' ); 
?>

