<?php include 'includes/head.php'; //include de head bestanden

if(!isset($_COOKIE['You_cant_turn_back_now'])){
	$function->redirect("404");
}else{
if($_POST['password'] === "Anonymous"){
	
	$cookie_name = "Anonymous";
	$cookie_value = "true";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");

	$function->redirect("1");
}
	?>
	
<div class='wrapper'>
	<div id="content" >
		<img src='pics/lock.png' alt='lock'/>
		<h3>THIS PAGE IS LOCKED.</h3>
		<form method='POST' action="" name='passwordform'>
			<input name='password' type="password" id="password" placeholder='Password' autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  onfocus="this.removeAttribute('readonly');" readonly>
			<p id="button" ></p>
			<?php
			if(isset($_POST['password'])){
				?>
				<div class='passworderror'>
					Please try again.
				</div>
				<?php
			}
			?>
			<input name='submit' type="hidden" id="submit">
		</form>
	</div>
</div>
	<?php
include('includes/footer.php');
}
?>