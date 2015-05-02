<?php


function p24_test_mail_ShortCode($atts, $content){
	$mail = 'kfar.irur@gmail.com';
	require_once('email_js.php');
	return '<button class="brightBlueButton"
		onclick="memberJoinEmail(\''.$mail.'\',\''.p24_getUserName(1).'\')"><p style="font-weight: bold;">שלח מייל</p></button>';
}

add_shortcode('test_mail', 'p24_test_mail_ShortCode');

function p24_memberJoinEmail_ajax() {
	$to = 'naorlevi87@gmail.com';
	$memberName = $_POST['memberName'];
		
	$subject = "פרויקט 24";
	
	$message = "אהלן, רצינו לספר לך שעוד חבר הצטרף לחוף שאליו אתה נרשמת. \n\r נתראה בחוף, פרויק 24!";
	
	$headers = "From: כפר הירעור <kfar.irur@gmail.com>";
	
	error_log("to: ".$to." message: ".$message);
	wp_mail($to, $subject, $message, $headers);
}
add_action("wp_ajax_p24_memberJoinEmail_ajax", "p24_memberJoinEmail_ajax");
add_action("wp_ajax_nopriv_p24_memberJoinEmail_ajax", "p24_memberJoinEmail_ajax");

$ajax_url = admin_url( 'admin-ajax.php' ); 

?>