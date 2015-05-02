<?php

p24_connect();
// check if user logged in and valid user

$inspirations = p24_getInspiration();
?>


<html>
	<h1 class="entry-title" style="font-weight: bold;"><span>קצת השראה...</span></h1>
	<br />
	<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 2px;"/>
	<?php while($inspiration = mysql_fetch_array($inspirations)){?>
	<table style="border-style: hidden" border=1>
		<tr> 
			<td  style="text-align:right;  width: 40%;"> 
				<p>
					<h2><?=$inspiration['title']?></h2>
					<p><?=$inspiration['description']?></p>
				</p>
			</td>
			<td  style="text-align:center; vertical-align:middle; width: 60%;"> 
				<?=$inspiration['link']?> 
			</td>
		</tr>
	</table>
	<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 2px;"/>
	<br />
	<?php } ?>	

<h4 class="entry-title" style="font-weight: bold;"><span>מוזמנים להוסיף כאן בתגובות עוד קטעים מעוררי השראה שנגעו בכם, מבטיחים לא לשמור לעצמנו :)</span></h4>

</html>


<?php p24_disconnect(); ?>
