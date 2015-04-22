<?php

p24_connect();
// check if user logged in and valid user

$area_id = $_POST['area_id'];
$beachesRes = p24_getAllBeaches($area_id);
$area_name = p24_getAreaName($area_id);
?>


<html>


<h1 class="entry-title" style="font-weight: bold;"><span>אזור <?=$area_name?> </span>
<span style="display: inline-block; color: black;
	background-color:<?=p24_getColor(p24_getAreaPercent($area_id))?>">  <?=p24_getAreaPercent($area_id)?>%  </span></h1>

<br/>
<br/>

<table border=1>
	<thead>
		<tr>
			<td style="width: 33%"><h2 class="comments-title">חוף</h2</td>
			<td style="width: 33%"><h2 class="comments-title">אחוז איוש</h2</td>
			<td style="width: 33%"><h2 class="comments-title">הרשם לחוף</h2</td>
		</tr>
	</thead>
	<tbody>
		<?php while($beach = mysql_fetch_array($beachesRes)){
			$beach_id = $beach['id'];
			
		?>
		<tr> 
			<td style="width: 33%"> <p><?=$beach['name']?></p></td>
			<td style="width: 33%"> <p style="font-weight: bold;
				background-color:<?=p24_getColor(p24_getBeachPercent($beach_id))?>" ><?=p24_getBeachPercent($beach_id)?>%</p></td>
			<td style="width: 33%"> <button class="brightBlueButton"  onclick="get_beach(<?=$beach_id?>, <?=$area_id?>)">
			<p style="font-weight: bold;">לחץ כאן</p></button></td>
		</tr>
		<?php } ?>	
	</tbody>
</table>

</html>




<?php $ajax_url = admin_url( 'admin-ajax.php' ); ?>
<script>

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
