<?php


function p24_memberJoinEmail($to, $memberName){
	
$subject = "פרויקט 24, ";

$message = "ש יעלחעלחעלחלום ";

$headers = "From: Kfar.Irur@gmail.com";


error_log("to: ".$to." message: ".$message);
wp_mail($to, $subject, $message, $headers);

}

?>