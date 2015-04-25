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

<script src="wp-content/themes/accelerate-child/externals/jquery.watermarkinput.js" type="text/javascript"></script>
<html>
<div id="page_top"></div>
<?php if($job_id == 1){ ?>
	<h1 class="entry-title" style="font-weight: bold;"><span>קודם כל מדהים!!</span></h1>
	<p style="display: inline-block;">
		<span>תאמין או לא אתה בעצמך הבאת את החוף ל-</span>
		<span style="display: inline-block; color: black;
		background-color:<?=p24_getColor(p24_getBeachPercent($beach_id, $hours))?>"><?=p24_getBeachPercent($beach_id, $hours)?>%!!  </span>
		<br /><br />
		<span>,השאלה היחידה שנשאר לך לשאול את עצמך היא, האם אתה</span>
		<span>, <?=p24_getUserName(p24_getCurrentUserId())?></span>
		<span>באמת מוכן לקחת על עצמך להגיע ב15.5.15 ל - <?=$hours?></span>
		<span>שעות. ויחד עם כל החבר'ה הטובים של <?=$beach_name?></span>
		<span>ליצור מציאות חדשה.</span>
		<br /><br />
		<span>ההתחייבות היא רק מול עצמך, החבר'ה מהתמונות למטה, ההוא שם למעלה והיקום.</span>
		<br />
		<br />
	</p>
	
<?php } else if($job_id == 2) { ?>
	<h1 class="entry-title" style="font-weight: bold;"><span>רגע לפני שאתה לוקח אחריות על חוף שלם…</span></h1>
	<p style="display: inline-block;">
		<span>אחראי חוף, כמו כל דבר אחר בפרויקט הזה, הוא מושג שמי שיגדיר אותו הוא בעיקר אתה!!<br />
			הדבר הבסיסי שאנחנו כן מבקשים ממך זה להיות איתנו ועם אחראי האזור שלך בקשר רציף ובאופן כללי להיות זמין ונגיש לנו ולמתנדבים בחוף. <br />
			חוץ מזה תעוף עם זה לאן שבא לך, תארגן אנשים תייצר יוזמות תתאם את שעות ההגעה ככה שיהיה הכי יעיל שאפשר ותנסה להפוך את היום שלך ושל כל המתנדבים בחוף ליום שלא תשכחו.
			<br /><br />
			סומכים עליך :)
			<br /><br /></span>
		<span>אז עכשיו רק תשאל את עצמך האם אתה, </span>
		<span> <?=p24_getUserName(p24_getCurrentUserId())?></span>
		<span>באמת מוכן לקחת על עצמך להיות אחראי על <?=$beach_name?></span>
		<span> וליצור שם מציאות חדשה.<br /><br />
			ההתחייבות היא רק מול עצמך, החבר'ה מהתמונות למטה, ההוא שם למעלה והיקום. <br />
		</span>
	</p>
<?php }?>
	<br />
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

<div id="listing_page_buttons">
	<br />
	<p  style="font-weight: bold;">כמה פרטים אחרונים וסיימנו לבנתיים...</p>
	<form action=""><p style="display: inline-block;">	
		<span> תשאיר לנו טלפון למקרה הצורך
		<input id="phone_number" type="tel"/>
		<script type="text/javascript">
			jQuery(function($){
				 $("#phone_number").Watermark("טלפון");
			});
		</script>
		<span><?php if($job_id==1) {?>(אופציונאלי)<?php } else { ?>(חובה לאחראי חוף)<?php } ?></span>
		</span>
		<br />
		<span> ותגיד... זה המייל שקיבלנו בהרשמה, הכל סבבה או שצריך לעדכן? ;)
		<input id="email" type="email"/>
		<script type="text/javascript">
			jQuery(function($){
				 $("#email").Watermark("<?=p24_getUserMail()?>");
			});
		</script>
		</span>
		<p><input type="checkbox" checked="true" <?php if($job_id == 2){ ?>disabled="true" <?php }?> 
		id="push_join"> עדכן אותי במייל כשאנשים יפים מצטרפים לחוף.</p>
		<p><input type="checkbox" checked="true" <?php if($job_id == 2){ ?> disabled="true" <?php }?>
		id="push_closed"> עדכן אותי במייל אם החוף שלי הגיע ל-100%.</p>
		</p>
	</form>
	<br />
	<p  style="font-weight: bold;">אז מה אתה אומר?</p>
	<br />
	<table style="border-style: hidden">
		<tr>
			<td style="border-style: hidden">
				<button id="approveButton" onclick='approveListing(<?=$beach_id?>, <?=$job_id?> , <?=$hours?>)'>
					<p style="font-weight: bold;"><?php if($job_id==1) {?>אני שם!<?php } else { ?>מתי מתחילים?<?php } ?></p></button>
			</td>
			<td style="border-style: hidden">
				<button id="denyButton" onclick='get_beach(<?=$beach_id?>)'>
					<p style="font-weight: bold;"><?php if($job_id==1) {?>רגליים קרות ותירוצים<?php } else { ?>פעם הבאה<?php } ?></p></button>
			</td>
		</tr>
	</table>

		<br />
	</div>
</html>

<?php $ajax_url = admin_url( 'admin-ajax.php' ); ?>
<script>


function load_listing_approved(beach_id, job_id){
	jQuery.ajax({
		type: "POST", 
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadListingApproved_ajax",beach_id:beach_id, job_id:job_id},
		success: function(output){
			jQuery("#listing_page_buttons").html(output);
			window.scrollTo(0, document.getElementById('listing_page_buttons').offsetTop);
			jQuery("#what_you_say").html("");
		}
	});
}

function approveListing(beach_id, job_id, hours){
	//console.log("approveListing hours:"+hours);
	var phone = jQuery('#phone_number').val();
	if (job_id == 2 && (phone.length<9)){
		alert("היי חבר!\nבתור אחראי חוף רצוי שנוכל לתקשר איתך אז תכניס טלפון ושלח שוב ;)");
		return;
	}
	var email = jQuery('#email').val();
	var push_join = document.getElementById('push_join').checked;
	var push_closed = document.getElementById('push_closed').checked;
	if(job_id == 2) hours = 0;
		jQuery.ajax({
			type: "POST",
			dataType: "html",
			url: "<?php echo $ajax_url;?>",
			data: {action: "p24_addListing_ajax", beach_id:beach_id, job_id:job_id, hours:hours, phone:phone, email:email, push_join:push_join, push_closed:push_closed},
			success: function(output){
				load_listing_approved(beach_id, job_id);
		}
	});
}


</script>
<?php p24_disconnect(); ?>
