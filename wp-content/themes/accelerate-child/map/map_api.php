<?php 

//require_once("../wp-load.php");

/*
 * Cons & des 
 */
function p24_connect() {
	$myconn = mysql_connect("localhost","root","zzuullaa") or die("Unable to connect to MySQL");
	if($myconn)
    {
        $seldb = mysql_select_db("project24", $myconn) or die('Could not select database');
	}
}

function p24_disconnect() {
   mysql_close();
}
 


/*
 * User Getters
 */
 function p24_getCurrentUserId(){
	return get_current_user_id();
}

 function p24_getUserPic($user_id = null)
{
	if($user_id == -1){
		return "http://project24.co.il/media/gavatar.gif";
	}
	if(!$user_id || $user_id == 0){
		//error_log("inside if");
		$user_id = get_current_user_id();
	}

	$q = "SELECT photourl FROM wp_wslusersprofiles WHERE user_id = '$user_id'";

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
           
    if(strlen($row["photourl"]) != 0){
            return $row["photourl"];
    } else {
        return "http://project24.co.il/media/gavatar.gif";
    }
}

 function p24_getUserProfile($user_id = null)
{
	if(!$user_id || $user_id == 0){
		//error_log("inside if");
		$user_id = get_current_user_id();
	}

	$q = "SELECT profileurl FROM wp_wslusersprofiles WHERE user_id = '$user_id'";

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
     
    return $row["profileurl"];
}

 function p24_getUserName($user_id = null)
{
	if(!$user_id || $user_id == 0){
		//error_log("inside if");
		$user_id = get_current_user_id();
	}

	$q = "SELECT displayname FROM wp_wslusersprofiles WHERE user_id = '$user_id'";

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
           
    if(strlen($row["displayname"]) != 0){
    	return $row["displayname"];
    } else {
        return "ללא שם";
    }
}

 function p24_getUserPhone($user_id = null)
{
	if(!$user_id || $user_id == 0){
		//error_log("inside if");
		$user_id = get_current_user_id();
	}

	$q = "SELECT phone FROM wp_wslusersprofiles WHERE user_id = '$user_id'";

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);

    return $row["phone"];
}

function p24_setUserPhoneEmail($phone, $email, $user_id = null)
{
	if(!$user_id || $user_id == 0){
		//error_log("inside if");
		$user_id = get_current_user_id();
	}

	$q = "UPDATE wp_wslusersprofiles SET phone = '$phone' , email_manual = '$email'  WHERE user_id = '$user_id'";

    mysql_query($q) or die('Query failed: ' . mysql_error());
}

 function p24_getUserMail($user_id = null)
{
	if(!$user_id || $user_id == 0){
		//error_log("inside if");
		$user_id = get_current_user_id();
	}

	$q = "SELECT email, email_manual FROM wp_wslusersprofiles WHERE user_id = '$user_id'";

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
	if(strpos($row["email_manual"], '@')) return $row["email_manual"];
    return $row["email"];
}



/*
 * Map Getters
 */ 
 function p24_getMapNeeded()
{
	$q = "SELECT SUM(needed) AS needed FROM m_areas";
    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
    return $row["needed"];       
}


//$added is for calculating predicted percentage
 function p24_getMapPercent($added = null)
{
	
    $q1 = "SELECT SUM(hours) AS sum_given FROM m_listings WHERE job_id = 1" ;
	$q2	= "SELECT SUM(needed) AS sum_needed FROM m_areas";

    $result = mysql_query($q1) or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $sum_given = $row["sum_given"];
    
	$result = mysql_query($q2) or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $sum_needed = $row["sum_needed"]; 
	if(added != null){
		$sum_given = $sum_given+ $added;
	}	
	return sprintf("%.2f",$sum_given / $sum_needed * 100);
}

function p24_getAllAreas()
{
    $q1 = "SELECT * FROM m_areas ORDER BY id" ;

    $result = mysql_query($q1) or die('Query failed: ' . mysql_error());
    
	return $result;
}


/*
 * Area Getters
 */
 function p24_getAreaName($area_id)
{
	$q = "SELECT name FROM m_areas WHERE id = '$area_id'";

    $result = mysql_query($q) or die('Query getAreaName failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
    return $row["name"];       

}

 function p24_getAreaNeeded($area_id)
{
	$q = "SELECT needed FROM m_areas WHERE id = '$area_id'";
    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
    return $row["needed"];       
}

 function p24_getAreaGiven($area_id)
{
    $q = "SELECT SUM(hours) AS sum_given FROM m_listings INNER JOIN m_beaches 
    			ON m_listings.job_id = 1 and m_listings.beach_id = m_beaches.id and m_beaches.area_id='$area_id'" ;
    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
    return $row["sum_given"];       
}
//$added is for calculating predicted percentage
 function p24_getAreaPercent($area_id, $added = null)
{
    $q1 = "SELECT SUM(hours) AS sum_given FROM m_listings INNER JOIN m_beaches 
    			ON m_listings.job_id = 1 and m_listings.beach_id = m_beaches.id and m_beaches.area_id='$area_id'" ;
	$q2	= "SELECT SUM(needed) AS sum_needed FROM m_areas WHERE Id = '$area_id'";

    $result = mysql_query($q1) or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $sum_given = $row["sum_given"];
    
	$result = mysql_query($q2) or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $sum_needed = $row["sum_needed"]; 
	if(added != null){
		$sum_given = $sum_given+ $added;
	}	
	return sprintf("%.2f",$sum_given / $sum_needed * 100);
}


 function p24_getAllBeaches($area_id)
{
    $q1 = "SELECT * FROM m_beaches WHERE area_id = '$area_id' and declared=0 ORDER BY id" ;

    $result = mysql_query($q1) or die('Query failed: ' . mysql_error());
    
	return $result;
}


/*
 * Beach Getters
 */
 function p24_getBeachName($beach_id)
{
	$q = "SELECT name FROM m_beaches WHERE id = '$beach_id'";
    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
    return $row["name"];       
}

 function p24_getBeachAreaId($beach_id)
{
	$q = "SELECT area_id FROM m_beaches WHERE id = '$beach_id'";
    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
    return $row["area_id"];       
}

 function p24_getBeachNeeded($beach_id)
{
	$q = "SELECT needed FROM m_beaches WHERE id = '$beach_id'";
    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
    return $row["needed"];       
}

//$added is for calculating predicted percentage
 function p24_getBeachPercent($beach_id, $added = null)
{
    $q1 = "SELECT SUM(hours) AS sum_given FROM m_listings WHERE job_id = 1 and beach_id = '$beach_id'" ;
	$q2	= "SELECT SUM(needed) AS sum_needed FROM m_beaches WHERE Id = '$beach_id'";

    $result = mysql_query($q1) or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $sum_given = $row["sum_given"];
    
	$result = mysql_query($q2) or die('Query failed: ' . mysql_error());
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $sum_needed = $row["sum_needed"]; 
	if(added != null){
		$sum_given = $sum_given+ $added;
	}	
	return sprintf("%.2f",$sum_given / $sum_needed * 100);		
}

 function p24_getBeachWorkers($beach_id, $job_id)
{
    $q1 = "SELECT user_id, hours FROM m_listings WHERE job_id = '$job_id' and beach_id = '$beach_id'" ;
    $result = mysql_query($q1) or die('Query failed: ' . mysql_error());
    
	return $result;
}




/*
 * Listing functions
 */
function p24_addListing($user_id, $beach_id, $job_id, $hours, $push_join, $push_closed)
{
	$q = "INSERT INTO m_listings (user_id, beach_id, job_id, hours, push_join, push_closed) 
			VALUES ('$user_id', '$beach_id', '$job_id', '$hours', '$push_join', '$push_closed')";
	mysql_query($q) or die('Query editListing failed: ' . mysql_error());
	return true;
}
function p24_addListing_ajax(){
	$beach_id = $_POST['beach_id'];
	$job_id = $_POST['job_id'];
	$hours = $_POST['hours'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$push_join = $_POST['push_join'];
	$push_join == "true" ? $push_join = TRUE : $push_join = FALSE;
	$push_closed = $_POST['push_closed'];
	$push_closed == "true" ? $push_closed = TRUE : $push_closed = FALSE;
	error_log("inside p24_addListing_ajax with" .print_r($_POST,1));
	p24_setUserPhoneEmail($phone, $email);	
	p24_addListing(p24_getCurrentUserId(), $beach_id, $job_id, $hours, $push_join, $push_closed);

	die();
}
add_action("wp_ajax_p24_addListing_ajax", "p24_addListing_ajax");
add_action("wp_ajax_nopriv_p24_addListing_ajax", "p24_addListing_ajax");



function p24_editListing($user_id, $beach_id, $job_id, $hours)
{
	$q = "UPDATE m_listings SET hours = '$hours' WHERE job_id = '$job_id' and beach_id = '$beach_id' and user_id = $user_id";
    $result = mysql_query($q) or die('Query editListing failed: ' . mysql_error());
	return true;
}
function p24_editListing_ajax(){
	$beach_id = $_POST['beach_id'];
	$job_id = $_POST['job_id'];
	$hours = $_POST['hours'];
	//error_log("inside p24_editListing_ajax with" .print_r($_POST,1));
	if( p24_editListing(p24_getCurrentUserId(), $beach_id, $job_id, $hours)){
		echo "OK";	
	}
	die();
}
add_action("wp_ajax_p24_editListing_ajax", "p24_editListing_ajax");
add_action("wp_ajax_nopriv_p24_editListing_ajax", "p24_editListing_ajax");


function p24_delListing($user_id, $beach_id, $job_id)
{
	$q = "DELETE FROM m_listings WHERE job_id = '$job_id' and beach_id = '$beach_id' and user_id = $user_id";
    $result = mysql_query($q) or die('Query editListing failed: ' . mysql_error());
	return true;
}
function p24_delListing_ajax(){
	$beach_id = $_POST['beach_id'];
	$job_id = $_POST['job_id'];
	//error_log("inside p24_delListing_ajax with" .print_r($_POST,1));
	if( p24_delListing(p24_getCurrentUserId(), $beach_id, $job_id)){
		echo "OK";	
	}
	die();
}
add_action("wp_ajax_p24_delListing_ajax", "p24_delListing_ajax");
add_action("wp_ajax_nopriv_p24_delListing_ajax", "p24_delListing_ajax");

function p24_UserListedHours($user_id, $beach_id){

    $q = "SELECT hours FROM m_listings WHERE job_id = 1 and beach_id = '$beach_id' and user_id = '$user_id'" ;
	$result = mysql_query($q) or die('Query isUserListed failed: ' . mysql_error());
	
    if($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		return $row['hours'];
	} else {
		return 0;
	}	
}

function p24_UserIsSuperviser($user_id){

    $q = "SELECT * FROM m_listings WHERE job_id = 2 and user_id = '$user_id'" ;
	$result = mysql_query($q) or die('Query isUserListed failed: ' . mysql_error());
	
    if($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		return true;
	} else {
		return false;
	}	
}
	
	
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

function p24_getMessages(){
    $q = "SELECT * FROM m_messages ORDER BY id" ;

    $result = mysql_query($q) or die('Query failed: ' . mysql_error());
    
	return $result;
}

?>

