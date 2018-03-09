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
		<?php
			if(isset($_POST['searchbaby']) || isset($_GET['q'])){
				?>
			<div class="row">
				<div class="col-md-3">
<?php include("assets/inc/filter.php"); ?>
				</div>
				<div class="col-md-9">
					<?php		
					$function->search($_POST['search_input'], $_POST['search_select'], $_POST['search_checkbox'], "", "");
					?>
				</div>
			</div>
			<?php
			}
			else{
				$function->redirect("index");
			}
			?>
		</div>
	</div>
</div><!-- /#body-->
<?php include("assets/inc/footer.php"); ?>