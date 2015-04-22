<?php

p24_connect();
// check if user logged in and valid user

$beach_id = $_POST['beach_id'];
$hours = $_POST['hours'];
$job_id = $_POST['job_id'];
$beachCleaners = p24_getBeachWorkers($beach_id, 1);
$beachSupervisers = p24_getBeachWorkers($beach_id, 2);
$beach_name = p24_getBeachName($beach_id);
//echo "ListingPage: ".$beach_name;
?>


<html>


<h1 class="entry-title" style="font-weight: bold;"><span>קודם כל מדהים!!</span>

<br/>
<br/>
<p style="display: inline-block;">
	<span>תאמין או לא אתה בעצמך הבאת את החוף ל-</span>
	<span style="display: inline-block; color: black;
	background-color:<?=p24_getColor(p24_getBeachPercent())?>"><?=p24_getBeachPercent($beach_id)?>%!!  </span>
	<br /><br />
	<span>השאלה היחידה שנשאר לך לשאול את עצמך היא, האם אתה</span>
	<span> <?=p24_getUserName(p24_getCurrentUserId())?></span>
	<span>באמת מוכן לקחת על עצמך להגיע ב15.5.15 ל - <?=$hours?></span>
	<span>שעות. ויחד עם כל החבר'ה הטובים של <?=$beach_name?></span>
	<span>ליצור מציאות חדשה.</span>
	<br /><br />
	<span>ההתחייבות היא רק מול עצמך, החבר'ה מהתמונות למטה, ההוא שם למעלה והיקום.</span>
	<br />
	<br />
	<span style="font-weight: bold;">אז מה אתה אומר?</span>
	<br /><br />
</p>

<?php 
$i=0;
while(($user = mysql_fetch_array($beachCleaners)) && $i<16){
	$i++;	
	//error_log("cleaner ".$i." id:".$user['user_id']); 
	$picUrl = p24_getUserPic($user['user_id']);?>
	<td align="center" style=" width: 12.5%"><img style="float:center;" src=<?=$picUrl?> class="avatar" 
				height="45" width="45"><!--<br><?=p24_getUserName($user['user_id'])?>--></td>
	<?if($i%8 == 0) {?>
		</tr>
		<tr>
	<?php } ?>	
<?php } ?>


<br /><br />
<table>
	<tr>
		<td>
			<button id="approveButton" onclick='approveListing(<?=$beach_id?>, <?=$job_id?> , <?=$hours?>)'>
				<p style="font-weight: bold;">אני שם!</p></button>
		</td>
		<td>
			<button id="denyButton" onclick='get_beach(<?=$beach_id?>)'>
				<p style="font-weight: bold;">רגליים קרות ותירוצים</p></button>
		</td>
	</tr>
</table>

</html>

<?php $ajax_url = admin_url( 'admin-ajax.php' ); ?>
<script>

function load_listing_approved(beach_id, job_id, hours){
	window.onpopstate = function(event) {
      load_beach(beach_id);
    } 
	jQuery.ajax({
		type: "POST", 
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadListingApproved_ajax",beach_id:beach_id, job_id:job_id, hours:hours},
		success: function(output){
			jQuery('.entry-content').html(output);
				window.onpopstate = function(event) {
     				load_beach(<?=$beach_id?>);
    			}
		}
	});
}

function approveListing(beach_id, job_id, hours){
	console.log("approveListing hours:"+hours);
	if(job_id == 2) hours = 0;
		jQuery.ajax({
			type: "POST",
			dataType: "html",
			url: "<?php echo $ajax_url;?>",
			data: {action: "p24_addListing_ajax", beach_id:beach_id, job_id:job_id, hours:hours},
			success: function(output){
				//if(output == "OK"){
					load_listing_approved(beach_id, job_id, hours);
				//}
		}
	});
}


</script>
<?php p24_disconnect(); ?>
