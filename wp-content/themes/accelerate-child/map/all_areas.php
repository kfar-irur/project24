<?php


// check if user logged in and valid user
p24_connect();

$areasRes = p24_getAllAreas();

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


<h1 align="center" style="font-weight: bold;">ההרשמה נפתחה!</h1>
<h1 style="display: inline-block" class="entry-title">
<span>עד כה גוייסו </span>
<span style="font-weight: bold;  color: black;
	background-color:<?=p24_getColor(p24_getMapPercent())?>"> <?=p24_getMapPercent()?>%  </span> 
<span> מהשעות הדרושות לניקוי כל רצועת החוף.</span>
<br/>
<span>אז איפה אתה בכל הסיפור הזה?</span>
<br/>
<p>בטבלה הבאה חלוקה לאיזורים ואחוזי השעות שגוייסו עד כה לכל אזור, פשוט חפש את החוף שלך ל 15.5 ותצטרף למסיבה :)</p>
</h1> 
<table border=1 >
	<thead>
		<tr> 
			<td style="vertical-align:middle; width: 33%"><h2 class="comments-title">איפה בארץ?</h2></td>
			<td style="vertical-align:middle; width: 33%"><h2 class="comments-title">כמה כבר סגרנו?</h2></td>
			<td style="vertical-align:middle; width: 33%"><h2 class="comments-title">למה אני עוד לא רשום?</h2></td>
		</tr>
	</thead>
	<tbody>
		<?php while($area = mysql_fetch_array($areasRes)){
		?>
		<tr> 
			<?php $area_id = $area['id']; ?>
			<td style="vertical-align:middle; width: 33%"> <p><?=$area['name']?></p></td>
			<td style="vertical-align:middle; width: 33%"> <p style="font-weight: bold;
				background-color:<?=p24_getColor(p24_getAreaPercent($area_id))?>" ><?=p24_getAreaPercent($area['id'])?>%</p></td>
			<td style="vertical-align:middle; width: 33%"> <button class="brightBlueButton"  onclick="get_area(<?=$area_id?>)">
			<p style="font-weight: bold;">יאללה!</p></button></td>
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