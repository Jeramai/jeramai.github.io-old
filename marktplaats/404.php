<?php
session_start(); //Start de sessions 
ini_set('display_errors', true);//Set this display to display all erros while testing and developing the script
error_reporting( error_reporting() & ~E_NOTICE ); //Hides the "variable not defined" error
//error_reporting(0);// With this, no error reporting will be there

include("assets/inc/header.php"); 
include("assets/inc/conn.php"); 
include("assets/inc/functions.php"); 
$function = new myfunctions();

include("assets/inc/header3.php"); 
?>
<div id="body">

<?php include("assets/inc/nav.php"); ?>
<div id="main">
	<div class='container'>
		<h1 id="content"><i class='glitch glitch3' data-text="404">404</i></h1>
		<br>
		<div id="content2" >
			<p>We couldn't find the page you were looking for. This is either because:</p>
			<ul>
				<li>There is an error in the URL entered into your web browser. Please check the URL and try again.</li>
				<li>The page you are looking for has been moved or deleted.</li>
			</ul>
			<p>You can return to our homepage by <a href="index">clicking here</a>.</p>
		</div>
	</div>
</div>
</div>
<?php include("assets/inc/footer.php"); ?>