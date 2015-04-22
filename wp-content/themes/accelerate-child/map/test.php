<?php

include "map_api.php";

//include "../wp-includes/user.php";
//include "../wp-includes/pluggable.php";

require_once("../wp-load.php");

$db = new Database();


/*
 * UserGettersTests
 */
 
 echo "<br>";

$userId = $db->getCurrentUserId();
echo "current user id = $userId";
 
 
echo "<br>";

$res = $db->getUserName();
echo "current user name = $res";
 
 echo "<br>";
 
$res = $db->getUserPic();
echo "current user picUrl = $res";


echo "<br>";

$res = $db->getMapPercent();
echo "Total Map percentage: $res";

echo "<br>";

$res = p24_getAreaPercent(1);
echo "Total ".p24_getAreaName(1)." Percentage: $res";

echo "<br>";

$res = p24_getBeachPercent(1);
echo "$res";


echo "<br>";

$res = p24_getBeachCleaners(1);
while($row = mysql_fetch_array($res)){
	
	$picUrl= p24_getUserPic($row['user_id']);
	echo "<img src='$picUrl'>";	
	echo "Name: ${row['user_name']},  Hours: ${row['hours']} <br>";
	
	}



//INSERT INTO `project24`.`m_candy` (`id`, `phraze`) VALUES ('1', 'מה אתה ילד?'), ('2', 'זורם'), ('3', 'אש'), ('4', 'כפרה עליך'), ('5', 'יאאאא איזה נחמד'), ('6', 'מדהים!'), ('7', 'העפת אותי'), ('8', 'מהמייזינג'),('10', 'מחלד חושים');
?>
