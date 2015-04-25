<?php


function p24_memberJoinEmail_ajax() {
	$to = $_POST['to '];
	$memberName = $_POST['memberName'];
		
	$subject = "פרויקט 24, ";
	
	$message = "ש יעלחעלחעלחלום ";
	
	$headers = "From: Kfar.Irur@gmail.com";
	
	
	error_log("to: ".$to." message: ".$message);
	wp_mail($to, $subject, $message, $headers);
}


?>
<html>
<button class="brightBlueButton" id="changeListing" 
onclick="memberJoinEmail('kfar.irur@gmail.com',p24_getUserName(1))"><p style="font-weight: bold;">שלח מייל</p></button>
	</html>
<script>
function memberJoinEmail(to , memberName){
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_memberJoinEmail_ajax", to:to , memberName:memberName},
		success: function(output){
		}
	});
}
</script>