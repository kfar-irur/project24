<?php

function p24_getEstismatedPercentColor_ajax(){
	ob_clean();
	$beach_id = $_POST['bid'];
	$added = $_POST['added'];
	$percent = p24_getBeachPercent($beach_id, $added);
	//error_log("p24_getEstismatedPercentColor_ajax: beachPercent=".$percent);
	//ob_clean();
	echo $percent;
	echo " ".p24_getColor($percent);
	$percent = p24_getAreaPercent(p24_getBeachAreaId($beach_id), $added);
	echo " ".$percent;
	echo " ".p24_getColor($percent);
	$percent = p24_getMapPercent($added);
	echo " ".$percent;
	echo " ".p24_getColor($percent);
	die();
}
add_action("wp_ajax_p24_getEstismatedPercentColor_ajax", "p24_getEstismatedPercentColor_ajax");
add_action("wp_ajax_nopriv_p24_getEstismatedPercentColor_ajax", "p24_getEstismatedPercentColor_ajax");



function p24_getColor($percent){
	$colors = array(
	        'ff0000',
	        'ff1100',
	        'ff2200',
	        'ff3300',
	        'ff4400',
	        'ff5500',
	        'ff6600',
	        'ff9900',
	        'ffaa00',
	        'ffbb00',
	        'ffcc00',
	        'ffdd00',
	        'ffee00',
	        'ffff00',
	        'eeff00',
	        'ddff00',
	        'ccff00',
	        'bbff00',
	        'aaff00',
	        '99ff00',
	        '88ff00',
	        '77ff00',
	        '66ff00',
	        '55ff00',
	        '44ff00',
	        '33ff00',
	        '22ff00',
	        '11ff00',
	        '00ff00',
	        '00ff11',
	        '00ff22',
	        '00ff33',
	        '00ff44',
	        '00ff55',
	        '00ff66',
	        '00ff77',
	        '00ff88',
	        '00ff99',
	        '00ffaa',
	        '00ffbb',
	        '00ffcc',
	        '00ffdd',
	        '00ffee',
	        '00ffff',
	        '00eeff',
	        '00ddff',
	        '00ccff',
	        '00bbff',
	        '00aaff',
	        '0099ff',
	        '0088ff',
	        '0077ff',
	        '0066ff',
	        '0055ff',
	        '0044ff',
	        '0033ff',
	        '0022ff',
	        '0011ff',
	        '0000ff',
	        '1100ff',
	        '2200ff',
	        '3300ff',
	        '4400ff',
	        '5500ff',
	        '6600ff',
	        '7700ff',
	        '8800ff',
	        '9900ff',
	        'aa00ff',
	        'bb00ff',
	        'cc00ff',
	        'dd00ff',
	        'ee00ff',
			'ff00ff',
			'ff00ee',
			'ff00dd',
			'ff00cc');
	if($percent == "-1") {return $colors;}
	$numColors = count($colors);
	$res = ($percent)/(100/$numColors);
	$res = intval($res);
	$res = $colors[$res];
		//error_log("newbackColor1 = ". $res);
	
	return "#".$res;	
}


?>