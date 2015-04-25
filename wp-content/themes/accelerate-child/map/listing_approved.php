<?php

p24_connect();
// check if user logged in and valid user

$beach_id = $_POST['beach_id'];
$job_id = $_POST['job_id'];
$beach_name = p24_getBeachName($beach_id);

?>

<html>
<br /><br />
<?php if($job_id == 1){ ?>
	<h1 class="entry-title" style="font-weight: bold;"><span>משנה מציאות יקר (: </span></h1>
	<p style="display: inline-block;">
		<span>ברוך הבא לקהילת <?=$beach_name?>.</span>
		<span>אתה כבר פה, לא תגיד שלום? <br />
			חזור לדף החוף וספר בתגובות ש<?=p24_getUserName(p24_getCurrentUserId())?>
			 הצטרף למסיבה.
		</span>

		<br />
		<br />
		<span>ספר לפייסבוק על התרומה שלך לפרויקט. שכולם ידעו שבלעדיך זה לא היה קורה</span><br />
		<table style="border-style: hidden">
			<tr>
				<td style="border-style: hidden">
					<button class="brightBlueButton" onclick='inviteFriendToBeach(<?=$beach_id?>, 3 )'>
						<p style="font-weight: bold;">שתף! (בקרוב)</p></button>
				</td>
			</tr>
		</table>
	</p>
	
<?php } else if($job_id == 2) { ?>
	<h1 class="entry-title" style="font-weight: bold;"><span>אחראי חוף יקר :)</span></h1>
	<p style="display: inline-block;">
		<span>בוא תכיר קצת את האנשים שינקו איתך <br />
			חזור לדף החוף וספר בתגובות שיש אחראי חוף חדש.
		</span>
		<br />
		<br />
		<span>ספר לחבריך בפייסבוק על החוף שבאחריותך שגם הם יבואו לחוף שלך לעזור </span>
		<table style="border-style: hidden">
			<tr>
				<td style="border-style: hidden">
					<button class="brightBlueButton" onclick='inviteFriendToBeach(<?=$beach_id?>, 3 )'>
						<p style="font-weight: bold;">שתף! (בקרוב)</p></button>
				</td>
			</tr>
		</table>
		<br />
		<br />
		<span>שמור את המספר ודבר איתנו על כל דבר שעולה לך לראש :)<br />
		נאור לוי - 0508815055 <br />
		שי קניגסברג - 0503222880
		</span>
	</p>
<?php } ?>

<p style="font-weight: bold">נתראה ב 15.5.15 ועד אז תפיץ בן-אדם, תפיץ ;)</p>
<br /><br />
<table style="border-style: hidden">
	<tr>
		<td style="border-style: hidden">
			<button id="backButton" onclick='load_beach(<?=$beach_id?>)'>
				<p style="font-weight: bold;">חזרה לחוף!</p></button>
		</td>

	</tr>
</table>

</html>
<?php p24_disconnect(); ?>
