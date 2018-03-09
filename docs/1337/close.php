<?php include 'includes/head.php'; //include de head bestanden 

if(!isset($_COOKIE['closebruh']) || !isset($_COOKIE['RAINBOW'])){
	$function->redirect("404");
}else{
	
	$cookie_name = "ayylmao";
	$cookie_value = "true";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
?>
<div class='wrapper'>
	<div class='welcome'>
		<h2 style='text-align:center;'>You almost got me..</h2>
	</div>
	<div class='riddle1'>
		<div class="comeandgetme"></div>
		<div class="soclose"> </div>
		<div class="glitch" data-text="But you're still not close enough.">But you're still not close enough.</div> 
	</div>
</div>
<?php 
include('includes/footer.php');
} 
?>