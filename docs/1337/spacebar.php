<?php include 'includes/head.php'; //include de head bestanden 

if(!isset($_COOKIE['redrocket'])){
	$function->redirect("404");
}else{
	
$cookie_name = "iceicebaby";
$cookie_value = "0";
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
	?>
	<div class='wrapper'>
		<div class='gj'>
			Impressive.
		</div>
		<div class='riddle3'>
		</div>
	</div>
	<?php
}
?>