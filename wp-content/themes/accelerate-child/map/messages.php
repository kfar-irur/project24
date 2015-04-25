<?php

p24_connect();
// check if user logged in and valid user

$messages = p24_getMessages();
?>


<html>
	<h1 class="entry-title" style="font-weight: bold;"><span>הודעות</span></h1>
	<br />
	<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 2px;"/>
	<?php while($message = mysql_fetch_array($messages)){?>
	<table style="border-style: hidden" border=1>
		<tr> 
			<td  style="text-align:right;  width: 80%;"> 
				<p>
					<h2><?=$message['title']?></h2>
					<p><?=$message['message']?></p>
					<?php
					//error_log("   Message     :" .strlen($message['link_url']));
					if(strlen($message['link_url']) > '0'){ ?>
						<a href="<?php echo $message['link_url']?>"><?=$message['link_text']?></a> 
					<?php } ?>
				</p>
			</td>
			<td  style="text-align:center; vertical-align:middle; width: 20%;"> <img align="middle" height="80" width="100" src="<?=$message['image_url']?>"/></td>
		</tr>
	</table>
	<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 2px;"/>
	<br />
	<?php } ?>	

</html>


<?php p24_disconnect(); ?>
