<?php

p24_connect();
// check if user logged in and valid user

$beach_id = $_POST['beach_id'];
$hours = $_POST['hours'];
$job_id = $_POST['job_id'];
$beachCleaners = p24_getBeachWorkers($beach_id, 1);
$beachSupervisers = p24_getBeachWorkers($beach_id, 2);
$beach_name = p24_getBeachName($beach_id);

?>


<html>


<h1 class="entry-title" style="font-weight: bold;">נרשמת בהצלחה</h1>

<br/>
<br/>

<table border=1 style="table-layout: fixed;">
	<tbody>
		<tr>
			<h2><span> bla bla </span></h2>
		</tr>
		<tr> 
			<?php 
			$i=0;
			while(($user = mysql_fetch_array($beachCleaners)) && $i<16){
				$i++;	
				//error_log("cleaner ".$i." id:".$user['user_id']); 
				$picUrl = p24_getUserPic($user['user_id']);?>
				<td align="center" style=" width: 12.5%"><img style="float:center;" src=<?=$picUrl?> class="avatar" 
							height="35" width="35"><!--<br><?=p24_getUserName($user['user_id'])?>--></td>
				<?if($i%8 == 0) {?>
					</tr>
					<tr>
				<?php } ?>	
			<?php } ?>
		</tr>
	</tbody>
</table>



<table>
	<tr>
		<td>
			<button id="backButton" onclick='load_beach(<?=$beach_id?>)'>
				<p style="font-weight: bold;">חזרה לחוף!</p></button>
		</td>

	</tr>
</table>

</html>
<?php p24_disconnect(); ?>
