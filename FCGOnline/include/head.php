<!DOCTYPE html>
<html>
<head>
<title>FCGOnline</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/css.css" type="text/css" rel="stylesheet" media="all">
<script src="js/jquery-2.1.1.js"></script>
	<script src="js/lightbox.min.js"></script>
	<link href="css/lightbox.css" rel="stylesheet" />
	<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- //Custom Theme files -->
<!-- js -->

<!-- //js -->
</head>
<body>

	<!--banner-->	
	<div class="banner">		
		<a href="index.php">
			<img class="fcglogo img-responsive" src="images/logo.png" alt='header'>
		</a>
			<img class="slider_img" style="width: 100%;" src="images/bannergro.jpg" alt='header'>  
		
	</div>
	<!--//banner-->
	<!--navigation-->
	<div class="top-nav">
		<span class="menu">MENU <!-- <img style="height: 25px; width: 25px;" src="images/nav.png" alt='header'>--> </span>	<ul class="nav1 cl-effect-16">
		<li><a href="index.php">Home</a></li>
		<li><a href="verslagen.php">Wedstrijdverslagen</a></li>
		<li><a href="selectie.php">Selectie</a></li>
		<li><a href="stand.php">Stand</a></li>
		<li><a href="contact.php">Contact</a></li>

		</ul>				
		<!-- script-for-menu -->
		 <script>
		   $( "span.menu" ).click(function() {
			 $( "ul.nav1" ).slideToggle( 300, function() {
			 // Animation complete.
			  });
			 });
		</script>
		<!-- /script-for-menu -->
	</div>
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
$(function(){
  $('a').each(function() {
    if ($(this).prop('href') == window.location.href) {
      $(this).addClass('current');
    }
  });
});
</script>