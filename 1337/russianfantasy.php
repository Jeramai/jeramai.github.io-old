<?php include 'includes/head.php'; //include de head bestanden 
 
	if(isset($_POST['data'])){
		$cookie_name = "redrocket";
		$cookie_value = "true";
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
		
		$function->redirect("spacebar");
	}else{
		$function->redirect("404");
	}
?>