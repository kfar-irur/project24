<?php




function p24_getMessages(){
    $q = "SELECT * FROM m_messages ORDER BY id" ;

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
    
	return $result;
}

?>