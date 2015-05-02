

<script>

function memberJoinEmail(to , memberName){
	alert("memberJoinMail");
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
