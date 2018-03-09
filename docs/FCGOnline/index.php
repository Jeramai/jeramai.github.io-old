<!--
Auteur: Misha Dokter
School: Drenthe College
Jaar: 2015
Site naam: FCGOnline

-->
<?php
 include 'include/head.php';
?>

	<!--//navigation-->
	<!--banner-bottom-->
	<div class="bnr-botom">			
		<div class="col-md-5 bnr-botom-left">
			<div class="bnr-botom-info">
				<!-- banner-text Slider starts Here -->
				<script src="js/responsiveslides.min.js"></script>
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
				<div id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li><div class="slidetekst">
							<a href="verslagen.php"><h3 class="laatsteNieuws" >FC Groningen wint thuis van PEC Zwolle</h3>
							<p>FC Groningen heeft vanavond de volle buit behaald tegen PEC Zwolle, dat over grote delen van de wedstrijd het betere van het spel had maar al snel achter de feiten aanliep doordat FC Groningen de score vroeg wist te openen... </p>	</div>
						<img class="slidefotos" src="images/groslide1.jpg" alt=""></a>
						</li>
						<li>	<div class="slidetekst">				
							<a href="verslagen.php"><h3>DEFINITIEF: Alexander Sørloth tekent 4,5 jarig contract met FC Groningen; spits komt in januari</h3>
							<p>FC Groningen heeft vanmiddag op de clubsite gemeld dat het de bijna 20-jarige spits Alexander Sørloth heeft ingelijfd... </p> </div>	
						<img class="slidefotos" src="images/groslide2.jpg" alt=""></a>
						</li>
						<li><div class="slidetekst">					
							<a href="verslagen.php"><h3>Laatste training vóór kraker tegen Liberec: Danny Hoesen en Hans Hateboer weer present</h3>
							<p>De afsluitende training in de aanloop naar de zeer belangrijke thuiswedstrijd tegen Slovan Liberec...</p>	</div>
						<img class="slidefotos" src="images/groslide3.jpg" alt=""></a>
						</li>
					</ul>
				</div>
			</div>
		</div>	
		<div class="col-md-7 bnr-botom-right">
			<img style="visibility: hidden;" src="images/img1.jpg" alt="">
		</div>
		<div class="clearfix"> </div>
	</div>	
	<br><br><br><br>

<!--//banner-bottom-->
	<!--home-about-->
	<div class="home-about">	
		<div class="container">
			<h4 class="title">Overig nieuws</h4><br>
			<div class="row">
				<div class="col-md-4">
					<h5>KNVB-beker: FC Groningen moet tegen FC Utrecht </h5>
					<p>FC Groningen zal in de volgende ronde van het KNVB-bekertoernooi opnieuw met een Eredivisionist moeten zien af te rekenen, namelijk FC Utrecht... </p>
					<a class="more" href="#"> Lees meer >> </a>
				</div>
				<div class="col-md-4">
					<h5>FC Groningen verliest van Olympique Marseille </h5>
					<p>Ook een vergeleken met de vorige competitiewedstrijd drastisch gewijzigd Olympique Marseille is vanavond een maatje te groot gebleken voor FC Groningen... </p>
					<a class="more" href="#">Lees meer >> </a>
				</div>
				<div class="col-md-4">
					<h5>Definitief competitieprogramma seizoen 15-16 </h5>
					<p>De KNVB heeft vandaag het definitieve competitieprogramma voor het nieuwe seizoen 2015-2016 bekendgemaakt... </p>
					<a style="margin-bottom: 50px;" class="more" href="#">Lees meer >> </a>
				</div>
				</div><br>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div><br>
	<!--//home-about-->
	<!--work-->
	
	<!--//work-->
	

<?php
 include 'include/footer.php';
?>

