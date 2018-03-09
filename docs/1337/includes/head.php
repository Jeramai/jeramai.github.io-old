<?php 
ob_start();
session_start(); //Start de sessions 
ini_set('display_errors', true);//Set this display to display  all erros while testing and developing the script
error_reporting( error_reporting() & ~E_NOTICE ); //Hides the "variable not defined" error
//error_reporting(0);// With this no error reporting will be there
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="" >
<meta name="keywords" content="" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

<!-- COLOR -->
<meta name="theme-color" content="#000">
<meta name="msapplication-navbutton-color" content="#000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000">

<!-- FAVICON -->
<link rel="icon" sizes="192x192" href="pics/poro.png">
<link rel="icon" type="image/png" href="pics/poro.png">

<link href="css/style1.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<title>1337</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="java/java.js">  </script>
</head>
<?php include('functions/functions.php'); //include de functions
$function = new myfunctions(); //Aanroepen van de functions class ?>

<div class="pageLoad"></div>






















