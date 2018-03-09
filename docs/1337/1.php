<?php include 'includes/head.php'; //include de head bestanden 

if(!isset($_COOKIE['Anonymous'])){
	$function->redirect("404");
}else{
	?>
	<div class='wrapper'>
		<div class='gj'>
			Good job. <br>Please continue..
		</div>
		<div class='riddle2'>
			<div id='area'></div>
		</div>
	</div>
	<?php
include('includes/footer.php');
}
?>