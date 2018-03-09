<?php include 'includes/head.php'; //include de head bestanden 

if(!isset($_COOKIE['NOKITTYTHATISMYPOTPIE'])){
	$function->redirect("404");
}else{
	?>
	
<div class='wrapper' id='homepage-flag'>
	<div id="content" >
		<img src='pics/kcol.png' alt='lock'/>
		<h3>THIS PAGE IS LOCKED</h3>
		<br>
		<p>1, 128, 2187, _____</p>
		
		<p id='text'></p>
	</div>
</div>
	<?php
include('includes/footer.php');
}
?>