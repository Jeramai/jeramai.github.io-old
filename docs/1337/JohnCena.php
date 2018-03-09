<?php include 'includes/head.php'; //include de head bestanden 

if(!isset($_COOKIE['cantseeme'])){
	$function->redirect("404");
}else{
$cookie_name = "closebruh";
$cookie_value = "0";
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
	?>
	
<div class='wrapper'>
	<div id="content" >
		<img src='pics/lokc.png' alt='lock' class='lokc'/>
		<h1>Close..</h1>
	</div>
</div>
	<?php
include('includes/footer.php');
}
?>