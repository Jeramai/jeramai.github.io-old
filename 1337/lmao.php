<?php include 'includes/head.php'; //include de head bestanden

if(!isset($_COOKIE['ayylmao'])){
	$function->redirect("404");
}else{
	?>
	
<div class='wrapper'>
	<div id="content" >
		<h3><a class='riddle_a' href='https://www.youtube.com/watch?v=vXu80NLjv9g'>LMAO</a>, you think you got me?</h3><br>
		<h5 class="glitch glitch2" data-text="We are just getting started..!">We are just getting started..!</h5>
	</div>
</div>
	<?php
include('includes/footer.php');
}
?>