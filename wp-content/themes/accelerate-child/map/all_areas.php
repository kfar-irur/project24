

<div id="page_top"></div>

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
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

function load_area(area_id, is_back){
if(is_back == 0) {history.pushState({area_id:area_id}, "אזור:"+ area_id, "?aid="+area_id);} 
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
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

function load_beach(beach_id, area_id, is_back){
//console.log("get_beach- beach_id: "+beach_id);
if(is_back == 0) {history.pushState({beach_id:beach_id}, "אזור:"+ beach_id, "?bid="+beach_id);}
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadBeach_ajax", beach_id:beach_id},
		success: function(output){
			jQuery('.entry-content').html(output);
			window.onpopstate = function(event) {
     			load_area(area_id, 1);
    		}
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

function load_error(){
//console.log("load error ");
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadError_ajax"},
		success: function(output){
			jQuery('.entry-content').html(output);
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

</script>


<?php
p24_connect();

$aid = $_GET['aid'];
$bid = $_GET['bid'];

/*
 * getting users to a direct link
 */
if($aid > 0){ ?>
<script> load_area(<?=$aid?>,0);</script>
<?php die();} 
if($bid > 0){ ?>
<script> load_beach(<?=$bid?>, <?=p24_getBeachAreaId($bid)?>, 0); </script>
<?php die();} 

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


<h1 align="center" style="font-weight: bold;">25.4 - ההרשמה נפתחה!</h1>

<?php do_action( 'wordpress_social_login' ); ?> 

<h4 style="display: inline-block">
<span>עד כה גוייסו </span>
<span style="font-weight: bold;  color: black;
	background-color:<?=p24_getColor(p24_getMapPercent())?>"> <?=p24_getMapPercent()?>%  </span> 
<span> מהשעות הדרושות לניקוי כל רצועת החוף.</span>
<br/>
</h4>
<h5 style="display: inline-block">
<span>שזה אומר שיש כבר  </span>
<span style="font-weight: bold;"> <?=p24_getNumListedUsers()?> </span> 
<span> אנשים יפים ומדהימים שהחליטו לתת</span>
<span style="font-weight: bold;"> <?=p24_getSumHoursListed()?> </span> 
<span> שעות יקרות מזמנם כדי שהקסם הזה יקרה!</span>
<span>אז איפה נראה אותך ב 15.5?</span>
<br/>
</h5> 

<table border=1 >
	<thead>
		<tr> 
			<td style=" width: 33%"><h6 style="font-weight: bold;">איפה בארץ?</h6></td>
			<td style=" width: 33%"><h6 style="font-weight: bold;">כמה כבר סגרנו?</h6></td>
			<td style=" width: 33%"><h6 style="font-weight: bold;">למה אני עוד לא רשום?</h6></td>
		</tr>
	</thead>
	<tbody>
		<?php while($area = mysql_fetch_array($areasRes)){
		?>
		<tr> 
			<?php $area_id = $area['id']; ?>
			<td style="width: 33%"> <p style="font-weight: bold;"><?=$area['name']?></p></td>
			<td style="width: 33%"> <p style="font-weight: bold;
				background-color:<?=p24_getColor(p24_getAreaPercent($area_id))?>" ><?=p24_getAreaPercent($area['id'])?>%</p></td>
			<td style="width: 33%"> <button class="brightBlueButton"  onclick="load_area(<?=$area_id?>,0)">
			<p style="font-weight: bold; color: black;">יאללה!</p></button></td>
		</tr>
		<?php } ?>	
	</tbody>
</table>


<?php p24_disconnect(); ?>

