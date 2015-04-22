<?php


// check if user logged in and valid user
p24_connect();

$areasRes = p24_getAllAreas();

?>

<h1 class="entry-title"><span style="font-weight: bold; display: inline-block; color: black;
	background-color:<?=p24_getColor(p24_getMapPercent())?>"> <?=p24_getMapPercent()?>%  </span> 
<span style="display: inline-block; padding-right: 8px;">מכלל רצועת החוף של ישראל אויישה, מה איתך?  </span></h1> 
<table border=1 >
	<thead>
		<tr> 
			<td style="width: 33%"><h2 class="comments-title">אזור</h2></td>
			<td style="width: 33%"><h2 class="comments-title">אחוז איוש</h2></td>
			<td style="width: 33%"><h2 class="comments-title">הרשם לאזור</h2></td>
		</tr>
	</thead>
	<tbody>
		<?php while($area = mysql_fetch_array($areasRes)){
		?>
		<tr> 
			<?php $area_id = $area['id']; ?>
			<td style="width: 33%"> <p><?=$area['name']?></p></td>
			<td style="width: 33%"> <p style="font-weight: bold;
				background-color:<?=p24_getColor(p24_getAreaPercent($area_id))?>" ><?=p24_getAreaPercent($area['id'])?>%</p></td>
			<td style="width: 33%"> <button class="brightBlueButton"  onclick="get_area(<?=$area_id?>)">
			<p style="font-weight: bold;">לחץ כאן</p></button></td>
		</tr>
		<?php } ?>	
	</tbody>
</table>

<?php p24_disconnect(); ?>
<?php $ajax_url = admin_url( 'admin-ajax.php' ); ?>
<script>


function load_map(){
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadMap_ajax"},
		success: function(output){
			jQuery('.entry-content').html(output);
		}
	});
}


function get_area(area_id){
window.onpopstate = function(event) {
      load_map();
    }
history.pushState({area_id:area_id}, "אזור:"+ area_id, "?aid="+area_id); 
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadArea_ajax", area_id:area_id},
		success: function(output){
			jQuery('.entry-content').html(output);
		}
	});
}




</script>