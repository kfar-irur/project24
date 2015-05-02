<button class="brightBlueButton" style:"width:1000"
		onclick="changeToArabic()"><p>العربية</p></button>

<?php $ajax_url = admin_url( 'admin-ajax.php' ); ?>

<script>
function changeToArabic(){
	jQuery.ajax({
		type: "POST",
		dataType: 'html',
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_changeToArabic_ajax"},
		success: function(output){
		//alert("returned:"+output); 
		jQuery('.entry-content').html(output);
		}
	});
}
</script>