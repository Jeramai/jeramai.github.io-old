<?php include 'includes/head.php'; //include de head bestanden 

if(!isset($_COOKIE['iceicebaby'])){
	$function->redirect("404");
}else{
	if($_POST['password'] == "ROMMELMARKT"){
		$cookie_name = "NOKITTYTHATISMYPOTPIE";
		$cookie_value = "0";
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
		
		$function->redirect("kfc");
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