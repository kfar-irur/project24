<div id="page_top"></div>

<?php

p24_connect();

$area_id = $_POST['area_id'];
$area_name = p24_getAreaName($area_id);
if(empty($area_name)){ ?>
<script> load_error();</script>
<?php die();}
$beachesRes = p24_getAllBeaches($area_id);

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
	
	<?php do_action( 'wordpress_social_login' ); ?> 
	
	<h6 style="display: inline-block;">
		<span>חשוב לציין! כל החופים שבטבלה</span>
		<span style="font-weight: bold;">אינם מוכרזים</span>
		<span>. בחלק מהחופים הרשומים כאן יש גם רצועה קטנה מוכרזת עם אותו שם. אותה אין צורך לנקות מן הסתם אבל את כל שאר החוף כן :)</span>
	</h6>
	
	<table border=1>
		<thead>
			<tr>
				<td style="vertical-align:middle; width: 33%"><h6 style="font-weight: bold;">איזה חוף?</h6></td>
				<td style="vertical-align:middle; width: 33%"><h6 style="font-weight: bold;">כמה כבר סגרנו?</h6></td>
				<td style="vertical-align:middle; width: 33%"><h6 style="font-weight: bold;">למה אני עדיין לא רשום??</h6></td>
			</tr>
		</thead>
		<tbody>
			<?php while($beach = mysql_fetch_array($beachesRes)){
				$beach_id = $beach['id']; ?>
			<tr> 
				<td style="vertical-align:middle; width: 33%"> <p><?=$beach['name']?></p></td>
				<td style=";vertical-align:middle; width: 33%"> <p style="font-weight: bold; 
					background-color:<?=p24_getColor(p24_getBeachPercent($beach_id))?>" ><?=p24_getBeachPercent($beach_id)?>%</p></td>
				<td style="vertical-align:middle; width: 33%"> <button class="brightBlueButton"  onclick="load_beach(<?=$beach_id?>, <?=$area_id?>, 0)">
				<p style="font-weight: bold;">זה החוף שלי</p></button></td>
			</tr>
			<?php } ?>	
		</tbody>
	</table>

</html>

<?php p24_disconnect(); ?>
