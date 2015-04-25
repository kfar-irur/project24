
<?php
p24_connect();
// check if user logged in and valid user

$beach_id = $_POST['beach_id'];
$area_id = p24_getBeachAreaId($beach_id);
//error_log("LoadBeach - id:".$beach_id."ccc");
$beachCleaners = p24_getBeachWorkers($beach_id, 1);
$beachSupervisers = p24_getBeachWorkers($beach_id, 2);
$isListed = p24_UserListedHours(p24_getCurrentUserId(), $beach_id) > 0;
?>

<!--
<link rel="stylesheet" href="/wp-content/themes/accelerate-child/loader/css/introLoader.min.css"> 
<script src="/wp-content/themes/accelerate-child/loader/jquery.introLoader.pack.min.js"></script> 
<div id="element" class="introLoading"></div>
-->
<div id="page_top"></div>

<table style="border-style: hidden"><tr>
<td align="center" style=" border-style: hidden height: 20px; width:7%">100%</td>
<?php 
$colors = p24_getColor("-1");
foreach(array_reverse($colors) as $color){?>
	<td align="center" style=" border-style: hidden height: 20px; width:<?=count($colors)/90?>; background-color:#<?=$color?>"> </td>
<?php } ?>
<td align="center" style=" border-style: hidden height: 20px; width:3%">0%</td>
</tr></table>

<h1 class="entry-title" style="font-weight: bold;"><span><?=p24_getBeachName($beach_id)?></span>
<span style="color: black; background-color:<?=p24_getColor(p24_getBeachPercent($beach_id))?>"> <?=p24_getBeachPercent($beach_id)?>%</span> </h1>


<?php if(p24_getCurrentUserId() == 0){ ?> 
<?php do_action( 'wordpress_social_login' ); ?> 

<?php } elseif ($isListed == false){ ?>

<p style="display: inline-block;"><span>אם אתה נכנס ב </span>
	<select id="hoursSelect" onChange="updateHours(this, <?=$beach_id?>, <?=$area_id?>)">
			<option value="0">בחר</option>
			<?php for($i=1;$i<25;$i++){?>
				<option value="<?=$i?>"><?=$i?></option>
			<?php } ?></select>
<span>שעות אז...</span></br>
<span>החוף עולה ל - </span><span style="font-weight: bold; background-color:<?=p24_getColor(p24_getBeachPercent($beach_id))?>"
 		id="new_beach_percent"><?=p24_getBeachPercent($beach_id,1)."%"?></span>
<span>, האזור עולה ל - </span><span style="font-weight: bold; background-color:<?=p24_getColor(p24_getAreaPercent($area_id))?>"
		id="new_area_percent"><?=p24_getAreaPercent($area_id,1)."%"?></span>
<span>,  רצועת החוף כולה מטפסת ל - </span><span style="font-weight: bold; background-color:<?=p24_getColor(p24_getMapPercent())?>"
		id="new_map_percent"><?=p24_getMapPercent(1)."%"?></span>
<span> וכל זה בזכותך!</span>
</p>
<br/>
<button class="brightBlueButton" id="submitListing" onclick="loadListingPage( <?=$beach_id?>, 1 )"><p style="font-weight: bold;">הנה אני בא...</p></button>

<?php } else { ?>
<p style="display: inline-block;"> אתה רשום לחוף זה</p>
<button class="brightBlueButton" id="deleteListing" onclick="deleteListing(<?=$beach_id?>, 1 )"><p style="font-weight: bold;">הסר</p></button>
<button class="brightBlueButton" id="changeListing" onclick="changeListing(<?=$beach_id?>, 1 )"><p style="font-weight: bold;">שנה</p></button>
<select id="changeHoursSelect"><?php for($i=1;$i<25-$isListed;$i++){?><option value="<?=$i?>"><?=$i?></option><?php } ?></select>
<br> <br>
<?php } ?>

<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 2px;"/>

<table border=1 style="table-layout: fixed;">
	<tbody>
		<tr>
			<h1 class="entry-title"><span>סליחה, אפשר לדבר עם האחראי פה?</span></h1>
		</tr>
		<tr> 
			<?php 
			$i=0;
			while($user = mysql_fetch_array($beachSupervisers)){
				$i++;	
				$picUrl= p24_getUserPic($user['user_id']);?>
				<td align="center" style="width: 33%">
				<a href="<?=p24_getUserProfile($user['user_id'])?>" target="_blank">
				<img style="float:center;" src=<?=$picUrl?> class="avatar" 
							height="70" width="70"><br/><?=p24_getUserName($user['user_id'])?><br/></a>
				<?php if($user['user_id'] == p24_getCurrentUserId()) { ?>
					<button class="brightBlueButton"  onclick='deleteListing(<?=$beach_id?>, 2 )'>
						<p style="font-weight: bold;">הסר אחריות</p></button>
				<?php }?>
				</td>
				<?if($i%3 == 0) {?>
					</tr>
					<tr>
				<?php } ?>	
			<?php } 
			if($i<2){
				$picUrl= p24_getUserPic("-1");
				for(;$i<2 ; $i++){?>
					<td align="center" style="width: 33%"><img style="float:center;" src=<?=$picUrl?> class="avatar" 
						height="70" width="70"><br>
						<?php if(!p24_UserIsSuperviser(p24_getCurrentUserId()) && is_user_logged_in()){ ?>
							<button class="brightBlueButton"  onclick='loadListingPage(<?=$beach_id?>, 2 )'>
								<p style="font-weight: bold;">אחראי? הרשם!</p></button>
						<?php } else if(is_user_logged_in()) {?>
							<button class="brightBlueButton"  onclick='inviteFriendToBeach( <?=$beach_id?>, 2 )'>
								<p style="font-weight: bold;">הזמן חבר! (בקרוב)</p></button>
						<?php } ?>		
					</td>	
				<?php } ?>	
			<?php } ?>	
		</tr>
	</tbody>
</table>

<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 2px;"/> 

<table border=1>
	<tbody>
		<tr>
			<h1 class="entry-title"><span>ואלה המתנדבים מהקהל שיעזרו לקסם הזה לקרות</span></h1>
		</tr>
		<tr> 
			<?php 
			$i=0;
			while($user = mysql_fetch_array($beachCleaners)){
				$i++;	
				$picUrl= p24_getUserPic($user['user_id']);?>
				<td align="center" style=" width: 33%">
				<a href="<?=p24_getUserProfile($user['user_id'])?>" target="_blank">
				<img style="float:center;" src=<?=$picUrl?> class="avatar" 
							height="70" width="70"><br/><?=p24_getUserName($user['user_id'])?><br/></a>
							<?=$user['hours']?> שעות</td>
				<?php if($i%3 == 0) {?>
					</tr>
					<tr>
				<?php } ?>
							<?php } 
			if($i%3 == 0) $i--; 
			$picUrl= p24_getUserPic("-1");
			for(;$i%3 != 0 ; $i++){?>
				<td align="center" style="width: 33%"><img style="float:center;" src=<?=$picUrl?> class="avatar" 
					height="70" width="70"><br>
					<?php if(is_user_logged_in() && $isListed == false ){ ?>
						<button class="brightBlueButton" onclick='loadListingPage(<?=$beach_id?>, 1 )'>
							<p style="font-weight: bold;">הנה אני בא...</p></button>
					<?php } else if(is_user_logged_in()){?>
						<button class="brightBlueButton" onclick='inviteFriendToBeach(<?=$beach_id?>, 1 )'>
							<p style="font-weight: bold;">הזמן חבר! (בקרוב)</p></button>
					<?php } ?>		
				</td>	
			<?php } ?>		
		</tr>
	</tbody>
</table>

<script>
<?php $ajax_url = admin_url( 'admin-ajax.php' ); ?>

//jQuery(document).ready(function() { 
//	jQuery("#element").introLoader(); 
//});

function load_beach(beach_id){
	jQuery.ajax({
		type: "POST", 
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadBeach_ajax", beach_id:beach_id},
		success: function(output){
		    jQuery('.entry-content').html(output);
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
			window.onpopstate = function(event) {
  				load_area(<?=$area_id?>);
  				
			}
		}
	});
}
	
function loadListingPage(beach_id, job_id){
	var hours = 0;
	if(job_id == 1){
		hours = jQuery('#hoursSelect').val();
		if(hours == 0){
      	window.scrollTo(0, document.getElementById('page_top').offsetTop);
      	alert("\n\"בחר\" זה לא מספר... \n\n כדי שנוכל לחשב אחוזים רצוי שנדע מה כמות השעות שנראה אותך בחוף ;)");
      	return;
      }
	}
	//alert("loadListingPage "+ beach_id);
	window.onpopstate = function(event) {
      load_beach(beach_id);
    }
	//history.pushState({beach_id:beach_id}, "אזור:"+ beach_id, "?bid="+beach_id);  
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadListingPage_ajax", beach_id:beach_id, job_id:job_id, hours:hours},
		success: function(output){
			jQuery('.entry-content').html(output);
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

function deleteListing(beach_id, job_id){
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_delListing_ajax", beach_id:beach_id, job_id:job_id},
		success: function(output){
			load_beach(beach_id);
		}
	});
}
	
	
function changeListing(beach_id, job_id){
	var hours = jQuery('#changeHoursSelect').val();
	//console.log("hours:"+hours);
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_editListing_ajax", beach_id:beach_id, job_id:job_id, hours:hours},
		success: function(output){
			load_beach(beach_id);
		}
	});
}

function updateHours(el, beach_id, area_id){
	var hours = jQuery(el).val();
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_getEstismatedPercentColor_ajax", bid:beach_id, added:hours},
		success: function(output){
			var res = output.split(" ");
			//alert("#updateHoursBeach: Percent:" + res[0] + " Color: " + res[1]);
			jQuery('#new_beach_percent').html(res[0]+"%");
			jQuery('#new_beach_percent').css("background-color", res[1]);

			jQuery('#new_area_percent').html(res[2]+"%");
			jQuery('#new_area_percent').css("background-color", res[3]);

			jQuery('#new_map_percent').html(res[4]+"%");
			jQuery('#new_map_percent').css("background-color", res[5]);
		}
	});
}
		
function inviteFriendToBeach( beach_id, job_id){
	if(job_id == 1){
		alert("בקרוב תוכל להזמין חבר לחוף אליו נרשמת ישירות דרך הפייסבוק, בנתיים אתה מוזמן פשוט לשלוח לו הודעה בווטסאפ ;)");
	}
	if(job_id == 2){
		alert("בקרוב תוכל להזמין חבר להיות אחראי חוף ישירות דרך הפייסבוק, בנתיים אתה מוזמן פשוט לשלוח לו הודעה בווטסאפ ;)");
	}
	if(job_id == 3){
		alert("בקרוב תהיה אופציה מגניבה לשתף ישר מכאן ולספר לכולם שנרשמת לחוף, בנתיים אתה מוזמן פשוט להיכנס לפייסבוק ולספר לכולם או פשוט להתקשר ;)");
	}	
	if(job_id == 4){
		alert("בקרוב תהיה אופציה מגניבה לשתף ישר מכאן ולספר לכולם שאתה אחראי חוף, בנתיים אתה מוזמן פשוט להיכנס לפייסבוק ולספר לכולם או פשוט להתקשר ;)");
	}	

}
		
		
</script>			
<?php p24_disconnect(); ?>
