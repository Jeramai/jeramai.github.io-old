<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>FCGOnline</title>
<link href="<?php bloginfo('template_directory');?>/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="<?php bloginfo('template_directory');?>/css/style.css" type="text/css" rel="stylesheet" media="all">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="<?php bloginfo('template_directory');?>/js/jquery-1.11.1.min.js"></script> 
<script src="<?php bloginfo('template_directory');?>/js/modernizr.custom.js"></script>
<!-- //js -->
</head>
<body>
<?php
// Homepage
if( is_page('Home') )
{
echo "Hallo12";
}
elseif( is_page('nieuw') )
{
echo "Hallo1234";
}?>
	<!--banner-->	
	<div class="banner">		
		<div class="banr-info">
			<div class="logo">
				<a href="index.html">FCGOnline</a>
			</div>
			<img class="slider_img" style="width: 100%; height: 100px;" src="<?php bloginfo('stylesheet_directory'); ?>/images/Anonymous-Seal.jpg" alt='header'>  
		</div>
	</div>
	<!--//banner-->
	<!--navigation-->
	<div class="top-nav">
		<span class="menu">MENU</span>		
		<ul class="nav1 cl-effect-16">
		<?php
		wp_list_pages(array(
        'sort_column' => 'menu_order',
        'title_li'    => '',
        'echo'        => 1
    ));
		?>
			
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
	<!--//navigation-->
	<!--banner-bottom-->
	<div class="bnr-botom">			
		<div class="col-md-5 bnr-botom-left">
			<div class="bnr-botom-info">
				<!-- banner-text Slider starts Here -->
				<script src="<?php bloginfo('stylesheet_directory'); ?>/js/responsiveslides.min.js"></script>
				<script>
					// You can also use "$(window).load(function() {"
						$(function () {
						// Slideshow 3
							$("#slider3").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							$('.events').append("<li>before event fired.</li>");
							},
							after: function () {
								$('.events').append("<li>after event fired.</li>");
							}
						});	
					});
				</script>
				<!--//End-slider-script -->
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<h3>WE BULUM <br> ULLAM TRISBULU <span> MENTUM </span></h3>
							<p>Proin eget ipsum ultrices sit amet diam faucibus molestie Mauris sapien odio dignissimos ducimus qui cupiditate auctor viverra aliquam </p>						
						</li>
						<li>					
							<h3>FE RMLAM <br> ULLAM TRISNTUM <span> FAUCIBUS </span></h3>
							<p>Proin eget ipsum ultrices sit amet diam faucibus molestie Mauris sapien odio dignissimos ducimus qui cupiditate auctor viverra aliquam </p>						
						</li>
						<li>					
							<h3>BE LUMLAM <br> ULLAM TRISVESTI <span> MOLESTIE</span></h3>
							<p>Proin eget ipsum ultrices sit amet diam faucibus molestie Mauris sapien odio dignissimos ducimus qui cupiditate auctor viverra aliquam </p>						
						</li>
					</ul>
				</div>
			</div>
		</div>	
		<div class="col-md-7 bnr-botom-right">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img1.jpg" alt="">
		</div>
		<div class="clearfix"> </div>
	</div>			
	<!--//banner-bottom-->
	<!--home-about-->
	<div class="home-about">	
		<div class="container">
			<h4 class="title">About Us</h4>
			<div class="hm-about-grids">
				<div class="col-md-4 hm-grids-info">
					<h5>Suffered alteration have </h5>
					<p>Proin eget ipsum ultrices sit amet diam faucibus molestie Mauris sapien odio dignissimos ducimus qui cupiditate auctor viverra aliquam </p>
					<a class="more" href="#"> >> </a>
				</div>
				<div class="col-md-4 hm-grids-info">
					<h5>Suffered alteration have </h5>
					<p>Proin eget ipsum ultrices sit amet diam faucibus molestie Mauris sapien odio dignissimos ducimus qui cupiditate auctor viverra aliquam </p>
					<a class="more" href="#"> >> </a>
				</div>
				<div class="col-md-4 hm-grids-info">
					<h5>Suffered alteration have </h5>
					<p>Proin eget ipsum ultrices sit amet diam faucibus molestie Mauris sapien odio dignissimos ducimus qui cupiditate auctor viverra aliquam </p>
					<a class="more" href="#"> >> </a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//home-about-->
	<!--work-->
	<div class="work" id="gallery">	
		<div class="container">
			<h4 class="title">Our Works</h4>
		</div>
		<!--light-box-js -->
			<script src="js/jquery.chocolat.js"></script>
			<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="all" charset="utf-8" />
			<!--light-box-files -->
			<script type="text/javascript" charset="utf-8">
			$(function() {
				$('.moments-bottom a').Chocolat();
			});
			</script> 
		<!--//end-gallery js-->
		<div class="work-grids">
			<div class="col-md-4 work-left moments-bottom">
				<a href="<?php bloginfo('stylesheet_directory'); ?>/images/img2a.jpg">
					<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/img2.jpg" alt="">
					<div class="captn">
						<span>OUR WORKS</span>
					</div>
				</a>				
				<a href="<?php bloginfo('stylesheet_directory'); ?>/images/img3a.jpg">
					<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/img3.jpg" alt="">
					<div class="captn">
						<span>OUR WORKS</span>
					</div>
				</a>
			</div>
			<div class="col-md-8 work-right">
				<div class="work-img-left moments-bottom">	
					<a href="<?php bloginfo('stylesheet_directory'); ?>/images/img4a.jpg">
						<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/img4.jpg" alt="">
						<div class="captn">
							<span>OUR WORKS</span>
						</div>
					</a>
				</div>
				<div class="work-img-right moments-bottom">	
					<a href="<?php bloginfo('stylesheet_directory'); ?>/images/img5a.jpg">
						<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/img5.jpg" alt="">
						<div class="captn">
							<span>OUR WORKS</span>
						</div>
					</a>
				</div>				
				<div class="work-img-left2 moments-bottom">	
					<a href="<?php bloginfo('stylesheet_directory'); ?>/images/img6a.jpg">
						<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/img6.jpg" alt="">
						<div class="captn">
							<span>OUR WORKS</span>
						</div>
					</a>
				</div>
				<div class="work-img-right2 moments-bottom">	
					<a href="<?php bloginfo('stylesheet_directory'); ?>/images/img7a.jpg">
						<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/img7.jpg" alt="">
						<div class="captn">
							<span>OUR WORKS</span>
						</div>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//work-->
	<!--testimonial-->
	<div class="testi">		
		<div class="container">
			<h4 class="title">Testimonials</h4>
			<div class="testi-info">
				<div class="col-md-4 testi-grids">
					<span>1</span>
					<p>Vitae, tempor porta lorem. Pellentesque sit amet vestibulum mauris. Proin fringilla risus interdum faucibus fringilla. </p>
					<p>Donec vitae justo magna. Integer sit ametult rit empusmi risus, id consectetur lectus
					  nibhadictum egetves tibulum mauris viverra. Nam acmassaut anteconsequat stie varius vel libero. </p>
					<h5>MAGNA VMITH, CLIENT </h5>
				</div>
				<div class="col-md-4 testi-grids">
					<span>2</span>
					<p>Vitae, tempor porta lorem. Pellentesque sit amet vestibulum mauris. Proin fringilla risus interdum faucibus fringilla. </p>
					<p>Donec vitae justo magna. Integer sit ametult rit empusmi risus, id consectetur lectus
					  nibhadictum egetves tibulum mauris viverra. Nam acmassaut anteconsequat stie varius vel libero. </p>
					<h5>MAGNA VMITH, CLIENT </h5>
				</div>
				<div class="col-md-4 testi-grids">
					<span>3</span>
					<p>Vitae, tempor porta lorem. Pellentesque sit amet vestibulum mauris. Proin fringilla risus interdum faucibus fringilla. </p>
					<p>Donec vitae justo magna. Integer sit ametult rit empusmi risus, id consectetur lectus
					  nibhadictum egetves tibulum mauris viverra. Nam acmassaut anteconsequat stie varius vel libero. </p>
					<h5>MAGNA VMITH, CLIENT </h5>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//testimonial-->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-row">
				<div class="col-md-3 footer-grids">
					<h2><a href="index.html">FCGOnline</a></h2>
					<p><a href="mailto:example@mail.com">mail@example.com</a></p>
					<p>+2 000 222 1111</p>
				</div>
				<div class="col-md-3 footer-grids">
					<h4>Navigation</h4>					
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About us</a></li>
						<li><a href="#gallery" class="scroll">Gallery</a></li>
						<li><a href="typo.html">Typo</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grids">
					<h4>Support</h4>
					<ul>
						<li><a href="services.html">Services</a></li>
						<li><a href="#">Help Center</a></li>
						<li><a href="#">Lemollisollis</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grids">	
					<h4>Newsletter</h4>
					<p>It was popularised in the 1960s with the release Ipsum. <p>
					<form>					 
					    <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
						<input type="submit" value="Go">					 
				 </form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">		
			<p>Copyright © 2015 FCGOnline . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>					
		</div>
	</div>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
	<!--//footer-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"> </script>
</body>
</html>
