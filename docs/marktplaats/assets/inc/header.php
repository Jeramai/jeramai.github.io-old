<?php

if(isset($_SESSION['UserID']) && !isset($_COOKIE['email'])){
	$cookie_name = "email";
	$cookie_value = $_SESSION['email'];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
}
if(isset($_COOKIE['email']) && isset($_GET['uitloggen'])){
	setcookie("email", "", time()-3600, "/");
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Marktplaats</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://dc-ictwebs.nl/103706/marktplaats/assets/css/main.css" />	
	</head>