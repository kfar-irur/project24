<?php

p24_connect();
// check if user logged in and valid user

$area_id = $_POST['area_id'];
$beachesRes = p24_getAllBeaches($area_id);
$area_name = p24_getAreaName($area_id);
?>


<html>

<table style="border-style: hidden"><tr>
<td align="center" style=" border-style: hidden height: 20px; width:7%">100%</td>
<?php 
$colors = p24_getColor("-1");
foreach(array_reverse($colors) as $color){?>
	<td align="center" style=" border-style: hidden height: 20px; width:<?=count($colors)/90?>; background-color:#<?=$color?>"> </td>
<?php } ?>
<td align="center" style=" border-style: hidden height: 20px; width:3%">0%</td>
</tr></table>

	<h1 class="entry-title" style="font-weight: bold;"><span>אזור <?=$area_name?> </span>
	<span style="display: inline-block; color: black;
		background-color:<?=p24_getColor(p24_getAreaPercent($area_id))?>">  <?=p24_getAreaPercent($area_id)?>%  </span></h1>
	
	<table border=1>
		<thead>
			<tr>
				<td style="vertical-align:middle; width: 33%"><h2 class="comments-title">איזה חוף?</h2</td>
				<td style="vertical-align:middle; width: 33%"><h2 class="comments-title">כמה כבר סגרנו?</h2</td>
				<td style="vertical-align:middle; width: 33%"><h2 class="comments-title">למה אני עדיין לא רשום??</h2</td>
			</tr>
		</thead>
		<tbody>
			<?php while($beach = mysql_fetch_array($beachesRes)){
				$beach_id = $beach['id']; ?>
			<tr> 
				<td style="vertical-align:middle; width: 33%"> <p><?=$beach['name']?></p></td>
				<td style=";vertical-align:middle; width: 33%"> <p style="font-weight: bold; 
					background-color:<?=p24_getColor(p24_getBeachPercent($beach_id))?>" ><?=p24_getBeachPercent($beach_id)?>%</p></td>
				<td style="vertical-align:middle; width: 33%"> <button class="brightBlueButton"  onclick="get_beach(<?=$beach_id?>, <?=$area_id?>)">
				<p style="font-weight: bold;">זה החוף שלי</p></button></td>
			</tr>
			<?php } ?>	
		</tbody>
	</table>
	<p style="display: inline-block;">
		<span>חשוב לציין! כל החופים שבטבלה</span>
		<span style="font-weight: bold;"> אינם מוכרזים</span>
		<span>. בחלק מהחופים הרשומים כאן יש גם רצועה קטנה מוכרזת עם אותו שם. אותה אין צורך לנקות מן הסתם אבל את כל שאר החוף כן :)</span>
	</p>
</html>

<script>
<?php $ajax_url = admin_url( 'admin-ajax.php' ); ?>
function load_area(area_id){
	
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadArea_ajax", area_id:area_id},
		success: function(output){
			jQuery('.entry-content').html(output);
			window.onpopstate = function(event) {
      			load_map();
    		}
		}
	});
}


function get_beach(beach_id, area_id){
window.onpopstate = function(event) {
      load_area(area_id);
    }
//console.log("get_beach- beach_id: "+beach_id);
history.pushState({beach_id:beach_id}, "אזור:"+ beach_id, "?bid="+beach_id); 
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadBeach_ajax", beach_id:beach_id},
		success: function(output){
			jQuery('.entry-content').html(output);
		}
	});
}

<?php p24_disconnect(); ?>
