<?php



function p24_getInspiration(){
    $q = "SELECT * FROM m_inspiration ORDER BY id" ;

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
    
	return $result;
}



?>