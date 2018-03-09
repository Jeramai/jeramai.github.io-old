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

<?php if(empty($_GET)){ ?>
  <div id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-2 xs_hidden ">
			<ul class="sort_nav">
				<h4><b>Groepen</b></h4>
				<?php
				$stmt = $conn->query('show tables where Tables_in_dcictweb_103706 like "type_%"');
				 
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$newfancyname = explode("type_", $row["Tables_in_dcictweb_103706"]);
					
					echo "<a href='categorie/".$newfancyname[1]."'><li class='groepenli'>".$newfancyname[1]."</li></a>";
				}
				?>
			</ul>
		</div>
        <div class="col-md-10 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="h2line">Top advertenties</h2>
				
<?php 
//Ophalen vd prijs en naam vh artikel
$stmt = $conn->query('SELECT Titel, Prijs, AdvertentieID, TypeID FROM advertenties a, users u WHERE Topadvertentie = "Ja" AND a.Actief = "Ja" AND u.Actief = "Ja"  AND u.UserID = a.UserID ORDER BY AdvertentieID DESC LIMIT 4 ');
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<div class="col-md-3 article col-xs-6" style="min-height:250px;">';
	
		if($row['TypeID'] == 1){
			$cat = "auto";
		}
		else if($row['TypeID'] == 2){
			$cat = "pc";
		}
		else if($row['TypeID'] == 3){
			$cat = "smartphone";
		}
		else if($row['TypeID'] == 4){
			$cat = "tablet";
		}
		else if($row['TypeID'] == 5){
			$cat = "tv";
		}
		else if($row['TypeID'] == 6){
			$cat = "wasmachine";
		}
		
		?>
		<a href='categorie/<?php echo $cat."/".$row['AdvertentieID']; ?> '>
		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' LIMIT 1";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="images/no.png" alt="" />
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="images/<?php echo $fotourl; ?>" alt="" />
				<?php
			}
		}
		$realtitle = $function->add3dots($row['Titel'], "...", 12);
		
					if($row["Prijs"] === "0.00"){
						$prijsijspaleis = "Bieden";
					}
					else{
						$prijsijspaleis = "&euro;".$row['Prijs'];
					}
					
		echo '</a><b>'.$realtitle.'</b><br>'.$prijsijspaleis;
	echo '</div>';
}

?>
				
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="h2line">Dagtoppers</h2>
<?php
$stmt = $conn->query('SELECT Titel, Prijs, AdvertentieID, TypeID FROM advertenties a, users u WHERE dagtopper = "Ja" AND a.Actief = "Ja" AND u.Actief = "Ja"  AND u.UserID = a.UserID ORDER BY AdvertentieID DESC LIMIT 4');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<div class="col-md-3 article col-xs-6" style="min-height:250px;">';
	
		if($row['TypeID'] == 1){
			$cat = "auto";
		}
		else if($row['TypeID'] == 2){
			$cat = "pc";
		}
		else if($row['TypeID'] == 3){
			$cat = "smartphone";
		}
		else if($row['TypeID'] == 4){
			$cat = "tablet";
		}
		else if($row['TypeID'] == 5){
			$cat = "tv";
		}
		else if($row['TypeID'] == 6){
			$cat = "wasmachine";
		}
		
		?>
		<a href='categorie/<?php echo $cat."/".$row['AdvertentieID']; ?> '>
		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."'  LIMIT 1 ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="images/no.png" alt="" />
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="images/<?php echo $fotourl; ?>" alt="" />
				<?php
			}
		}
		$realtitle = $function->add3dots($row['Titel'], "...", 12);
		
					if($row["Prijs"] === "0.00"){
						$prijsijspaleis = "Bieden";
					}
					else{
						$prijsijspaleis = "&euro;".$row['Prijs'];
					}
					
		echo '</a><b>'.$realtitle.'</b><br>'.$prijsijspaleis;
echo '</div>';
}

?>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="h2line">Aanbevolen advertenties</h2>
<?php
$stmt = $conn->query('SELECT Titel, Prijs, AdvertentieID, TypeID FROM advertenties a, users u WHERE a.Actief = "Ja" AND u.Actief = "Ja"  AND u.UserID = a.UserID ORDER BY AdvertentieID DESC LIMIT 12');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo '<div class="col-md-3 article col-xs-6" style="min-height:250px; max-height:250px;">';
	
		if($row['TypeID'] == 1){
			$cat = "auto";
		}
		else if($row['TypeID'] == 2){
			$cat = "pc";
		}
		else if($row['TypeID'] == 3){
			$cat = "smartphone";
		}
		else if($row['TypeID'] == 4){
			$cat = "tablet";
		}
		else if($row['TypeID'] == 5){
			$cat = "tv";
		}
		else if($row['TypeID'] == 6){
			$cat = "wasmachine";
		}
		
		?>
		<a href='categorie/<?php echo $cat."/".$row['AdvertentieID']; ?> '>
		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' LIMIT 1 ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="images/no.png" alt="" />
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="images/<?php echo $fotourl; ?>" alt="" height="180" width="250" />
				<?php
			}
		}
		$realtitle = $function->add3dots($row['Titel'], "...", 12);
		
					if($row["Prijs"] === "0.00"){
						$prijsijspaleis = "Bieden";
					}
					else{
						$prijsijspaleis = "&euro;".$row['Prijs'];
					}
					
		echo '</a><b>'.$realtitle.'</b><br>'.$prijsijspaleis;
echo '</div>';
}

?>
			</div>
		</div>
	  </div><!-- /.row-->
      <div class="row" id="bottom">
        
      </div>
    </div>
  </div> <!--/#main-->

<?php 
}
else if(isset($_GET['cat'])) 
{
	if(!isset($_GET['AdvertentieID'])){
	?>
	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
<?php include("assets/inc/filter.php"); ?>
				</div>
				<div class="col-md-9">
			<?php		
			
			
		if(isset($_POST['prijsa']) && isset($_POST['prijsb'])){
			$function->OrderByPrice($_POST['prijsa'], $_POST['prijsb'], $_POST['type_type']); 
		}
		elseif(isset($_POST['verzondenknopfilter'])){
$function->filtersearch($_POST['type_type'], $_POST['merk'], $_POST['RAM'], $_POST['schermgrootte'], $_POST['Bouwjaar'], $_POST['Kleur'], $_POST['Brandstof']);
		}
		else{
			
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$type = explode("http://dc-ictwebs.nl/103706/marktplaats/categorie/", $actual_link);
			$realtype = "type_".$type[1];
			
			echo '<h2 class="h2line">'.$type[1].'</h2>';
			
			$query = "SELECT 
			AdvertentieID, a.UserID, TypeID, Prijs, Omschrijving, Bieden, a.Datum, Bekeken, Favorieten, Titel, Conditie, Website, Levering, Topadvertentie, Dagtopper 
			FROM advertenties a, users u ";
			
			if($type[1] === "auto"){
				$query .= "WHERE TypeID = 1 ";
			}
			else if($type[1] === "pc"){
				$query .= "WHERE TypeID = 2 ";
			}
			else if($type[1] === "smartphone"){
				$query .= "WHERE TypeID = 3 ";
			}
			else if($type[1] === "tablet"){
				$query .= "WHERE TypeID = 4 ";
			}
			else if($type[1] === "tv"){
				$query .= "WHERE TypeID = 5 ";
			}
			else if($type[1] === "wasmachine"){
				$query .= "WHERE TypeID = 6 ";
			}
			
			$query .= " AND a.Actief = 'Ja' AND u.Actief = 'Ja' AND u.UserID = a.UserID ORDER BY AdvertentieID DESC";
			
			/*
			if(isset($_GET['p']) && isset($_GET['q'])){
				$query .= ", ".$_GET['p']." ".$_GET['q']." ";
			}
			?>
			<div style="float:right;">
				<a href='?<?php if($_GET['q'] === 'ASC'){ echo "p=Prijs&q=DESC"; } else { echo "p=Prijs&q=ASC"; } ?>'>Prijs</a>
				 - 
				<a href='?<?php if($_GET['q'] === 'ASC'){ echo "p=Datum&q=DESC"; } else { echo "p=Datum&q=ASC"; } ?>'>Datum</a>
			</div>
			<?php
			*/
			
			$stmt = $conn->query($query);

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="col-md-12 article ">';
					?>
					<div class="col-md-3">
		<a href="<?php echo $type[1]."/".$row['AdvertentieID']; ?>">
		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' LIMIT 1 ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="../images/no.png" alt="" height="140"/>
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="../images/<?php echo $fotourl; ?>" alt="" height="140" />
				<?php
			}
		}
		$realtitle = $function->add3dots($row['Titel'], "...", 12);
		?>
		</a>
					</div>
					<div class="col-md-9">
					<?php
					if($row["Prijs"] === "0.00"){
						$prijsijspaleis = "Bieden";
					}
					else{
						$prijsijspaleis = $row['Prijs'];
					}
					
					echo "
					<div class='col-md-6'>
					<b>Prijs: 			</b>".$prijsijspaleis."          <br>
					<b>Omschrijving:  	</b>".$row['Omschrijving']."   <br>
					<b>Bieden:  		</b>".$row['Bieden']."         <br>
					<b>Datum: 			</b>".$row['Datum']."          <br>
					<b>Bekeken:  		</b>".$row['Bekeken']."        <br>
					<b>Favorieten:  	</b>".$row['Favorieten']."     <br>
					</div>
					<div class='col-md-6'>
					<b>Titel: 			</b>".$row['Titel']."          <br>
					<b>Conditie:  		</b>".$row['Conditie']."       <br>
					<b>Levering:  		</b>".$row['Levering']."       <br>
					<b>Topadvertentie:  </b>".$row['Topadvertentie']." <br>
					<b>Dagtopper: 		</b>".$row['Dagtopper']."      <br>
					</div>
					";
					
					echo "</div>";
					echo "</div>";
			}
		}
			
		?>
				
				</div>
			</div>
			</div>
		</div>
	<?php
	}
	else{
	if(isset($_GET['edit'])){
		if(($_SESSION['Admin'] === "1" && ($_SESSION['UserID'] === "3" || $_SESSION['UserID'] === "30")) || $row['UserID'] === $_SESSION['UserID']){
			?>
<div id="main">
	<div class="container">
		<div class="row">
		<?php
	if(isset($_POST['bewerken'])){		
		echo "<div style='color:red;'>";
						
if($_GET['cat'] === 'auto'){
	$function->edit_ad_auto(
	$_POST['Prijs'], $_POST['Omschrijving'], $_POST['Bieden'], $_POST['Datum'], $_POST['Bekeken'], $_POST['Favorieten'], $_POST['Titel'], $_POST['Conditie'], $_POST['Website'], $_POST['Levering'], $_POST['Topadvertentie'], $_POST['Dagtopper'],
	
	$_POST['auto_Merk'], $_POST['auto_Type'], $_POST['auto_Kms'], $_POST['auto_Kleur'], $_POST['auto_Brandstof'], $_POST['auto_Bouwjaar'], $_POST['auto_El'],
	
	$_GET['AdvertentieID']
	);
}
else if($_GET['cat'] === 'pc'){
	$function->edit_ad_pc(
	$_POST['Prijs'], $_POST['Omschrijving'], $_POST['Bieden'], $_POST['Datum'], $_POST['Bekeken'], $_POST['Favorieten'], $_POST['Titel'], $_POST['Conditie'], $_POST['Website'], $_POST['Levering'], $_POST['Topadvertentie'], $_POST['Dagtopper'],
	
	$_POST['pc_Merk'], $_POST['pc_Type'], $_POST['pc_RAM'], $_POST['pc_Opslagcapaciteit'], $_POST['pc_Processor'], $_POST['pc_Display'], 
	
	$_GET['AdvertentieID']
	);
}
else if($_GET['cat'] === 'smartphone'){
	$function->edit_ad_sp(
	$_POST['Prijs'], $_POST['Omschrijving'], $_POST['Bieden'], $_POST['Datum'], $_POST['Bekeken'], $_POST['Favorieten'], $_POST['Titel'], $_POST['Conditie'], $_POST['Website'], $_POST['Levering'], $_POST['Topadvertentie'], $_POST['Dagtopper'],
	
	$_POST['sp_Merk'], $_POST['sp_Type'], $_POST['sp_Besturingssysteem'], $_POST['sp_Opslagcapaciteit'], $_POST['sp_Camera'], $_POST['sp_Display'], 

	$_GET['AdvertentieID']
	);
}
else if($_GET['cat'] === 'tablet'){
	$function->edit_ad_tablet(
	$_POST['Prijs'], $_POST['Omschrijving'], $_POST['Bieden'], $_POST['Datum'], $_POST['Bekeken'], $_POST['Favorieten'], $_POST['Titel'], $_POST['Conditie'], $_POST['Website'], $_POST['Levering'], $_POST['Topadvertentie'], $_POST['Dagtopper'],
	
	$_POST['tablet_Merk'], $_POST['tablet_Type'], $_POST['tablet_Besturingssysteem'], $_POST['tablet_Opslagcapaciteit'], $_POST['tablet_Camera'], $_POST['tablet_Display'], 

	$_GET['AdvertentieID']
	);
}
else if($_GET['cat'] === 'tv'){
	$function->edit_ad_tv(
	$_POST['Prijs'], $_POST['Omschrijving'], $_POST['Bieden'], $_POST['Datum'], $_POST['Bekeken'], $_POST['Favorieten'], $_POST['Titel'], $_POST['Conditie'], $_POST['Website'], $_POST['Levering'], $_POST['Topadvertentie'], $_POST['Dagtopper'],
	
	$_POST['tv_Merk'], $_POST['tv_Type'], $_POST['tv_HD'], $_POST['tv_LED'], $_POST['tv_Display'], 

	$_GET['AdvertentieID']
	);
}
else if($_GET['cat'] === 'wasmachine'){
	$function->edit_ad_wm(
	$_POST['Prijs'], $_POST['Omschrijving'], $_POST['Bieden'], $_POST['Datum'], $_POST['Bekeken'], $_POST['Favorieten'], $_POST['Titel'], $_POST['Conditie'], $_POST['Website'], $_POST['Levering'], $_POST['Topadvertentie'], $_POST['Dagtopper'],
	
	$_POST['wm_Merk'], $_POST['wm_Type'], $_POST['wm_Inhoud'], $_POST['wm_Hoogte'], $_POST['wm_Toeren'],  $_POST['wm_Energieklasse'], 

	$_GET['AdvertentieID']
	);
}
else{
	echo "Vul het juiste type advertentie in! <br>";
}
	
		echo "</div><br>";
	}
		?>
			<form action="" method="post">
						<?php 
						
			$trueID = $_GET['AdvertentieID'];
			
			$query = "SELECT 
			AdvertentieID, UserID, TypeID, Prijs, Omschrijving, Bieden, Datum, Bekeken, Favorieten, Titel, Conditie, Website, Levering, Topadvertentie, Dagtopper 
			FROM advertenties ";
			
			if($_GET['cat'] === "auto"){
				$query .= "WHERE TypeID = 1 ";
			}
			else if($_GET['cat'] === "pc"){
				$query .= "WHERE TypeID = 2 ";
			}
			else if($_GET['cat'] === "smartphone"){
				$query .= "WHERE TypeID = 3 ";
			}
			else if($_GET['cat'] === "tablet"){
				$query .= "WHERE TypeID = 4 ";
			}
			else if($_GET['cat'] === "tv"){
				$query .= "WHERE TypeID = 5 ";
			}
			else if($_GET['cat'] === "wasmachine"){
				$query .= "WHERE TypeID = 6 ";
			}
			
			$query .= " AND AdvertentieID = ".$trueID." ";
			$stmt = $conn->query($query);

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		
				echo '<div class="col-md-4 article col-xs-6">';
					?>
					
		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' LIMIT 1 ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="../../images/no.png" alt="" height="140"/>
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="../../images/<?php echo $fotourl; ?>" alt="" height="140" />
				<?php
			}
		}
		$realtitle = $function->add3dots($row['Titel'], "...", 12);
		?>
					<?php
			echo '<div class="row "><br>';
			echo '<div class="col-md-5 " style="line-height:26px;">';
					echo "
					<b>Prijs: 			</b><br>
					<b>Omschrijving:  	</b><br>
					<b>Bieden:  		</b><br>
					<b>Datum: 			</b><br>
					<b>Titel: 			</b><br>
					<b>Conditie:  		</b><br>
					<b>Website: 		</b><br>
					<b>Levering:  		</b><br>
					<b>Topadvertentie:  </b><br>
					<b>Dagtopper: 		</b><br>
					<br>
					";
			echo '</div>';		
			echo '<div class="col-md-7 ">';
					echo "
					<input type='text' value='".$row['Prijs']."         ' name='Prijs'><br>
					<input type='text' value='".$row['Omschrijving']."  ' name='Omschrijving'><br>
					<input type='text' value='".$row['Bieden']."        ' name='Bieden'><br>
					<input type='text' value='".$row['Datum']."         ' name='Datum' readonly><br>
					<input type='text' value='".$row['Titel']."         ' name='Titel'><br>
					<input type='text' value='".$row['Conditie']."      ' name='Conditie'><br>
					<input type='text' value='".$row['Website']."       ' name='Website' readonly><br>
					<input type='text' value='".$row['Levering']."      ' name='Levering'><br>
					<input type='text' value='".$row['Topadvertentie']."' name='Topadvertentie' readonly><br>
					<input type='text' value='".$row['Dagtopper']."     ' name='Dagtopper' readonly><br>
					<br>
					";
			echo '</div>';		
			echo '</div>';		
				
			$query2 = "SELECT ";
			
			if($_GET['cat']  === "auto"){
				$query2 .= "AutoID,Merk,Type,Kilometerstand,Kleur,Brandstof,Bouwjaar,Energielabel,AdvertentiePrijs,AdvertentieID ";
			}
			else if($_GET['cat'] === "pc"){
				$query2 .= "PCID,Merk,Type,RAM,Opslagcapaciteit,Processor,Display,AdvertentieID ";
			}
			else if($_GET['cat'] === "smartphone"){
				$query2 .= "SmartphoneID,Merk,Type,Besturingssysteem,Opslagcapaciteit,Camera,Display, AdvertentieID ";
			}
			else if($_GET['cat'] === "tablet"){
				$query2 .= "TabletID,Merk,Type,Besturingssysteem,Opslagcapaciteit,Camera,Display,AdvertentieID ";
			}
			else if($_GET['cat'] === "tv"){
				$query2 .= "TVID,Merk,Type,HD,LED,Display,AdvertentieID ";
			}
			else if($_GET['cat'] === "wasmachine"){
				$query2 .= "WasID,Merk,Type,Inhoud,Hoogte,Toeren,Energieklasse,AdvertentieID ";
			}
			else {
				$query2 .= "*";
			}
			
				$query2 .= "
				FROM type_".$_GET['cat'] ." 
				WHERE AdvertentieID = ".$trueID." 
				";
				
				$stmt2 = $conn->query($query2);
				
				while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
if($_GET['cat'] === "auto"){
	echo '<div class="row ">';
	echo '<div class="col-md-5" style="line-height:26px; ">';
	echo "
			<b>Merk:</b> 				<br>
			<b>Type:</b> 				<br>
			<b>Kilometerstand:</b> 		<br>
			<b>Kleur:</b> 				<br>
			<b>Brandstof:</b> 			<br>
			<b>Bouwjaar:</b> 			<br>
			<b>Energielabel:</b> 		<br>
			";
	echo "</div>";
	
	echo '<div class="col-md-7 ">';
	echo "
		<input type='text' value='".$row2['Merk']."' 				name='auto_Merk'><br>
		<input type='text' value='".$row2['Type']."'				name='auto_Type'><br>
		<input type='text' value='".$row2['Kilometerstand']."' 		name='auto_Kms'><br>
		<input type='text' value='".$row2['Kleur']."' 				name='auto_Kleur'><br>
		<input type='text' value='".$row2['Brandstof']."' 			name='auto_Brandstof'><br>
		<input type='text' value='".$row2['Bouwjaar']."' 			name='auto_Bouwjaar'><br>
		<input type='text' value='".$row2['Energielabel']."' 		name='auto_El'><br>";
	echo "</div>";
	echo "</div>";
}
else if($_GET['cat'] === "pc"){
	echo '<div class="row ">';
	echo '<div class="col-md-5" style="line-height:26px; ">';
	echo "	
			<b>Merk:             </b>	<br>
			<b>Type:             </b>	<br>
			<b>RAM:              </b>	<br>
			<b>Opslagcapaciteit: </b>	<br>
			<b>Processor:        </b>	<br>
			<b>Display:          </b>	<br>
			";
	echo "</div>";
	
	echo '<div class="col-md-7 ">';
	echo "	
			<input type='text' value='".$row2['Merk']				."' name='pc_Merk'><br>
			<input type='text' value='".$row2['Type']				."' name='pc_Type'><br>
			<input type='text' value='".$row2['RAM']				."' name='pc_RAM'><br>
			<input type='text' value='".$row2['Opslagcapaciteit']	."' name='pc_Opslagcapaciteit'><br>
			<input type='text' value='".$row2['Processor']			."' name='pc_Processor'><br>
			<input type='text' value='".$row2['Display']			."' name='pc_Display'><br>
			";
	echo "</div>";
	echo "</div>";
}
else if($_GET['cat'] === "smartphone"){
	echo '<div class="row ">';
	echo '<div class="col-md-5" style="line-height:26px; ">';
	echo "	
			<b>Merk:             </b>	<br>
			<b>Type:             </b>	<br>
			<b>Besturingssysteem:</b>	<br>
			<b>Opslagcapaciteit: </b>	<br>
			<b>Camera:    		 </b>	<br>
			<b>Display:    		 </b>	<br>
			";
	echo "</div>";
	
	echo '<div class="col-md-7 ">';
	echo "	
			<input type='text' value='".$row2['Merk']				."' name='sp_Merk'><br>
			<input type='text' value='".$row2['Type']				."' name='sp_Type'><br>
			<input type='text' value='".$row2['Besturingssysteem']	."' name='sp_Besturingssysteem'><br>
			<input type='text' value='".$row2['Opslagcapaciteit']	."' name='sp_Opslagcapaciteit'><br>
			<input type='text' value='".$row2['Camera']				."' name='sp_Camera'><br>
			<input type='text' value='".$row2['Display']			."' name='sp_Display'><br>
			";
	echo "</div>";
	echo "</div>";
}
else if($_GET['cat'] === "tablet"){
	echo '<div class="row ">';
	echo '<div class="col-md-5" style="line-height:26px; ">';
	echo "	
			<b>Merk:             </b>	<br>
			<b>Type:             </b>	<br>
			<b>Besturingssysteem:</b>	<br>
			<b>Opslagcapaciteit: </b>	<br>
			<b>Camera:    		 </b>	<br>
			<b>Display:    		 </b>	<br>
			";
	echo "</div>";
	
	echo '<div class="col-md-7 ">';
	echo "	
			<input type='text' value='".$row2['Merk']				."' name='tablet_Merk'><br>
			<input type='text' value='".$row2['Type']				."' name='tablet_Type'><br>
			<input type='text' value='".$row2['Besturingssysteem']	."' name='tablet_Besturingssysteem'><br>
			<input type='text' value='".$row2['Opslagcapaciteit']	."' name='tablet_Opslagcapaciteit'><br>
			<input type='text' value='".$row2['Camera']				."' name='tablet_Camera'><br>
			<input type='text' value='".$row2['Display']			."' name='tablet_Display'><br>
			";
	echo "</div>";
	echo "</div>";
}
else if($_GET['cat'] === "tv"){
	echo '<div class="row ">';
	echo '<div class="col-md-5" style="line-height:26px; ">';
	echo "	
			<b>Merk:             </b>	<br>
			<b>Type:             </b>	<br>
			<b>HD:				 </b>	<br>
			<b>LED: 			 </b>	<br>
			<b>Display:    		 </b>	<br>
			";
	echo "</div>";
	
	echo '<div class="col-md-7 ">';
	echo "	
			<input type='text' value='".$row2['Merk']				."' name='tv_Merk'><br>
			<input type='text' value='".$row2['Type']				."' name='tv_Type'><br>
			<input type='text' value='".$row2['HD']					."' name='tv_HD'><br>
			<input type='text' value='".$row2['LED']				."' name='tv_LED'><br>
			<input type='text' value='".$row2['Display']			."' name='tv_Display'><br>
			";
	echo "</div>";
	echo "</div>";
}
else if($_GET['cat'] === "wasmachine"){
	echo '<div class="row ">';
	echo '<div class="col-md-5" style="line-height:26px; ">';
	echo "	
			<b>Merk:             </b>	<br>
			<b>Type:             </b>	<br>
			<b>Inhoud:				 </b>	<br>
			<b>Hoogte: 			 </b>	<br>
			<b>Toeren:    		 </b>	<br>
			<b>Energieklasse:    		 </b>	<br>
			";
	echo "</div>";
	
	echo '<div class="col-md-7 ">';
	echo "	
			<input type='text' value='".$row2['Merk']				."' name='wm_Merk'><br>
			<input type='text' value='".$row2['Type']				."' name='wm_Type'><br>
			<input type='text' value='".$row2['Inhoud']				."' name='wm_Inhoud'><br>
			<input type='text' value='".$row2['Hoogte']				."' name='wm_Hoogte'><br>
			<input type='text' value='".$row2['Toeren']				."' name='wm_Toeren'><br>
			<input type='text' value='".$row2['Energieklasse']		."' name='wm_Energieklasse'><br>
			";
	echo "</div>";
	echo "</div>";
}
				}
				
				echo '<br><button type="submit" class="action-button animate red" name="bewerken">Bewerken</button>';
				
				echo '</div>';
			}
			
		?>
			</form>
		</div>
	</div>
</div>
						
						
						
					</div>
				</div>
			</div>
			<?php
		}
	}
	else{
?>
<div id="main">
	<div class="container">
		<div class="row">
		<?php		
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$type = explode("http://dc-ictwebs.nl/103706/marktplaats/categorie/", $actual_link);
			$realtype = "type_".$type[1];
			$type1 = explode("/", $realtype);
			$realtype1 = $type1[0];
			$type2 = explode("type_", $realtype1);
			
			$trueID = $_GET['AdvertentieID'];
			
			$query = "SELECT 
			AdvertentieID, UserID, TypeID, Prijs, Omschrijving, Bieden, Datum, Bekeken, Favorieten, Titel, Conditie, Website, Levering, Topadvertentie, Dagtopper 
			FROM advertenties ";
			
			if($type2[1] === "auto"){
				$query .= "WHERE TypeID = 1 ";
			}
			else if($type2[1] === "pc"){
				$query .= "WHERE TypeID = 2 ";
			}
			else if($type2[1] === "smartphone"){
				$query .= "WHERE TypeID = 3 ";
			}
			else if($type2[1] === "tablet"){
				$query .= "WHERE TypeID = 4 ";
			}
			else if($type2[1] === "tv"){
				$query .= "WHERE TypeID = 5 ";
			}
			else if($type2[1] === "wasmachine"){
				$query .= "WHERE TypeID = 6 ";
			}
			
			$query .= "AND AdvertentieID = ".$trueID." ";
			$stmt = $conn->query($query);

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
if(($_SESSION['Admin'] === "1" && ($_SESSION['UserID'] === "3" || $_SESSION['UserID'] === "30")) || $row['UserID'] === $_SESSION['UserID']){
	if(isset($_POST['delete_this_madafaka'])){
	
		$adv = $_GET['cat'];
		
		$sql4 = "DELETE FROM fotos WHERE AdvertentieID= :AdID ";
		$stmt4 = $conn->prepare($sql4);
		$stmt4->bindParam(":AdID", $row['AdvertentieID'], PDO::PARAM_INT);   
		$stmt4->execute();
		
		$sql2 = "DELETE FROM type_".$adv." WHERE AdvertentieID= :AdID ";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->bindParam(":AdID", $row['AdvertentieID'], PDO::PARAM_INT);   
		$stmt2->execute();
		
		$sql5 = "DELETE FROM biedingen WHERE AdvertentieID= :AdID ";
		$stmt5 = $conn->prepare($sql5);
		$stmt5->bindParam(":AdID", $row['AdvertentieID'], PDO::PARAM_INT);   
		$stmt5->execute();
		
		$sql3 = "DELETE FROM advertenties WHERE AdvertentieID= :AdID ";
		$stmt3 = $conn->prepare($sql3);
		$stmt3->bindParam(":AdID", $row['AdvertentieID'], PDO::PARAM_INT);   
		$stmt3->execute();
		
		$function->redirect("http://dc-ictwebs.nl/103706/marktplaats/");
			
	}
	if(isset($_POST['edit_this_madafaka'])){
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$function->redirect($actual_link."&edit");
	}
	?>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Weet u zeker dat u dit item wilt verwijderen?');
}
</script>
<div class="bewerkenenverwijderenvandeartikelenknoppen">
	<form method="post" action="" >
		<button class="delete" name="edit_this_madafaka" >
			<i class="fa fa-edit fa-lg"></i>
		</button>
	</form>
	<form method="post" action="" >
		<button class="delete" name="delete_this_madafaka" onclick="return confirm_delete()">
			<i class="fa fa-trash-o fa-lg"></i>
		</button>
	</form>
</div>
	<?php 
}
		
				echo '<div class="col-md-9 article col-xs-12">';
					?>
		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="../../images/no.png" alt="" height="140"/>
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			$j = 1;
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				if($j === 1){
					?>
						<img src="../../images/<?php echo $fotourl; ?>" alt="" height="140"/>
						<br>
					<?php
				}
				else {
					?>
						<div style='display:inline-block; float:left;'>
							<img src="../../images/<?php echo $fotourl; ?>" alt="" height="70"/>
						</div>
					<?php
				}
				$j++;
			}
			echo "<div style='clear:left;'><br></div>";
		}
		$realtitle = $function->add3dots($row['Titel'], "...", 12);
		?>
					<?php
					//<b>AdvertentieID:   </b>".$row['AdvertentieID']." 	<br>
					//<b>UserID:  		</b>".$row['UserID']."         		<br>
					//<b>TypeID:  		</b>".$row['TypeID']."         		<br>
					//<b>Bekeken:  		</b>".$row['Bekeken']."        		<br>
					//<b>Favorieten:  	</b>".$row['Favorieten']."     		<br>
					//<b>Topadvertentie:  </b>".$row['Topadvertentie']." 	<br>
					//<b>Dagtopper: 		</b>".$row['Dagtopper']."      	<br>
					echo "
					<b>Prijs: 			</b>".$row['Prijs']."          <br>
					<b>Omschrijving:  	</b>".$row['Omschrijving']."   <br>
					<b>Bieden:  		</b>".$row['Bieden']."         <br>
					<b>Datum: 			</b>".$row['Datum']."          <br>
					<b>Titel: 			</b>".$row['Titel']."          <br>
					<b>Conditie:  		</b>".$row['Conditie']."       <br>
					<b>Website: 		</b>".$row['Website']."        <br>
					<b>Levering:  		</b>".$row['Levering']."       <br>
					<br>
					";
					
				
			$query2 = "SELECT ";
			
			if($type2[1] === "auto"){
				$query2 .= "AutoID,Merk,Type,Kilometerstand,Kleur,Brandstof,Bouwjaar,Energielabel,AdvertentiePrijs,AdvertentieID ";
			}
			else if($type2[1] === "pc"){
				$query2 .= "PCID,Merk,Type,RAM,Opslagcapaciteit,Processor,Display,AdvertentieID ";
			}
			else if($type2[1] === "smartphone"){
				$query2 .= "SmartphoneID,Merk,Type,Besturingssysteem,Opslagcapaciteit,Camera,Display, AdvertentieID ";
			}
			else if($type2[1] === "tablet"){
				$query2 .= "TabletID,Merk,Type,Besturingssysteem,Opslagcapaciteit,Camera,Display,AdvertentieID ";
			}
			else if($type2[1] === "tv"){
				$query2 .= "TVID,Merk,Type,HD,LED,Display,AdvertentieID ";
			}
			else if($type2[1] === "wasmachine"){
				$query2 .= "WasID,Merk,Type,Inhoud,Hoogte,Toeren,Energieklasse,AdvertentieID ";
			}
			else {
				$query2 .= "*";
			}
			
				$query2 .= "
				FROM ".$realtype1." 
				WHERE AdvertentieID = ".$trueID." 
				";
				
				$stmt2 = $conn->query($query2);
				
				while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
if($type2[1] === "auto"){
	echo "	<b>AutoID:</b> 				".$row2['AutoID']."<br>
			<b>Merk:</b> 				".$row2['Merk']."<br>
			<b>Type:</b> 				".$row2['Type']."<br>
			<b>Kilometerstand:</b> 		".$row2['Kilometerstand']."<br>
			<b>Kleur:</b> 				".$row2['Kleur']."<br>
			<b>Brandstof:</b> 			".$row2['Brandstof']."<br>
			<b>Bouwjaar:</b> 			".$row2['Bouwjaar']."<br>
			<b>Energielabel:</b> 		".$row2['Energielabel']."<br>
			<b>AdvertentiePrijs:</b> 	".$row2['AdvertentiePrijs']."<br>
			<b>AdvertentieID:</b> 		".$row2['AdvertentieID']."<br>
			";
}
else if($type2[1] === "pc"){
	echo		"<b>PCID:             </b> ".$row2['PCID']."<br>
				<b>Merk:             </b> ".$row2['Merk']."<br>
				<b>Type:             </b> ".$row2['Type']."<br>
				<b>RAM:              </b> ".$row2['RAM']."<br>
				<b>Opslagcapaciteit: </b> ".$row2['Opslagcapaciteit']."<br>
				<b>Processor:        </b> ".$row2['Processor']."<br>
				<b>Display:          </b> ".$row2['Display']."<br>
				<b>AdvertentieID:    </b> ".$row2['AdvertentieID']."<br>
				";
}
else if($type2[1] === "smartphone"){
	echo "<b>SmartphoneID:      </b>".$row2['SmartphoneID']."<br>
				<b>Merk:              </b>".$row2['Merk']."<br>
				<b>Type:              </b>".$row2['Type']."<br>
				<b>Besturingssysteem: </b>".$row2['Besturingssysteem']."<br>
				<b>Opslagcapaciteit:  </b>".$row2['Opslagcapaciteit']."<br>
				<b>Camera:    		  </b>".$row2['Camera']."<br>
				<b>Display:    		  </b>".$row2['Display']."<br>
				<b>AdvertentieID:     </b>".$row2['AdvertentieID']."<br>
				";
}
else if($type2[1] === "tablet"){
	echo "<b>TabletID:           </b> ".$row2['TabletID']."<br>
				<b>Merk:               </b> ".$row2['Merk']."<br>
				<b>Type:               </b> ".$row2['Type']."<br>
				<b>Besturingssysteem:  </b> ".$row2['Besturingssysteem']."<br>
				<b>Opslagcapaciteit:   </b> ".$row2['Opslagcapaciteit']."<br>
				<b>Camera:             </b> ".$row2['Camera']."<br>
				<b>Display:            </b> ".$row2['Display']."<br>
				<b>AdvertentieID:      </b> ".$row2['AdvertentieID']."<br>
				";
}
else if($type2[1] === "tv"){
	echo "<b>TVID:              </b> ".$row2['TVID']."<br>
				<b>Merk:              </b> ".$row2['Merk']."<br>
				<b>Type:              </b> ".$row2['Type']."<br>
				<b>HD:                </b> ".$row2['HD']."<br>
				<b>LED:               </b> ".$row2['LED']."<br>
				<b>Display:           </b> ".$row2['Display']."<br>
				<b>AdvertentieID:     </b> ".$row2['AdvertentieID']."<br>
				";
}
else if($type2[1] === "wasmachine"){
	echo "<b>WasID:           </b> ".$row2['WasID']."<br>
				<b>Merk:            </b> ".$row2['Merk']."<br>
				<b>Type:            </b> ".$row2['Type']."<br>
				<b>Inhoud:          </b> ".$row2['Inhoud']."<br>
				<b>Hoogte:          </b> ".$row2['Hoogte']."<br>
				<b>Toeren:          </b> ".$row2['Toeren']."<br>
				<b>Energieklasse:   </b> ".$row2['Energieklasse']."<br>
				<b>AdvertentieID:   </b> ".$row2['AdvertentieID']."<br>
				";
}
				}
				echo '</div>';
			}
		?>
			<div class="col-md-3 article col-xs-12">
			<h4>
				<?php 
$query = "	SELECT 
			Bieden, Prijs
			FROM advertenties 
			WHERE AdvertentieID = '".$_GET['AdvertentieID']."' ";

$stmt = $conn->query($query);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$adbied = $row['Bieden'];
	$adprijs = $row['Prijs'];
}

if($adbied === 'Ja'){
	echo "Bieden ";
	if($adprijs !== '0.00'){
		echo "(vanaf &euro;".$adprijs.")";
	}
}
else{
	echo "Kopen voor &euro;".$adprijs." ";
}
echo "</h4><br>";

if(isset($_SESSION['logged_in'])){
	if(isset($_POST['bieden'])){
		$function->biedenbieden($_POST['biedbedrag'], $adprijs, $_GET['AdvertentieID']);
	}
	if(isset($_POST['Kopen'])){
		echo "Er is een bericht verzonden naar de verkoper. Deze neemt spoedig contact op met u.";
	}
if($adbied === "Ja"){
?>
	<form action="" method="post">
		<input id="biedbedrag" name="biedbedrag" type="number" step="0.01" required placeholder="Bieden"><br><br>
		<button type="submit" class="action-button animate blue" name="bieden">Bieden</button>
	</form>
	<div style="float:right;">
	<br><br>
<?php }else{ ?>
	<form action="" method="post">
		<button type="submit" class="action-button animate blue" name="Kopen">Kopen</button>
	</form>
<?php } ?>
	<div style="float:right;">
	<br><br>
	
<script type="text/javascript">
function confirm_delete() {
  return confirm('Weet u zeker dat u dit item wilt verwijderen?');
}
</script>
	
<?php 
}
else{ ?>
		<a class="action-button animate blue" name="Inloggen" href="../../inloggen">Inloggen</a>
<?php }

$query = "	SELECT 
			UserID, Prijs, BiedingID
			FROM biedingen 
			WHERE AdvertentieID = '".$_GET['AdvertentieID']."' 
			ORDER BY Prijs DESC";

$stmt = $conn->query($query);

$meerdan5 = 0;
while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
	
	$query2 = "	SELECT 
			Naam
			FROM users 
			WHERE UserID = '".$row1['UserID']."' ";

	$stmt2 = $conn->query($query2);

	while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
		echo "<b>".$row2['Naam']."</b> - &euro;";
	}
	
	echo $row1['Prijs'];
	
	if($meerdan5 < 4){
		if($_SESSION['UserID'] === $row1['UserID']){
			if(isset($_POST['delete_this_bieding'])){
				$sql123 = "	DELETE FROM biedingen 
							WHERE AdvertentieID='".$_GET['AdvertentieID']."' AND UserID = '".$_SESSION['UserID']."' AND BiedingID = '".$_POST['BiedingID']."' ";
				$conn->exec($sql123);
			}
		?>		
		<form method="post" action="" style='display:inline-block; color:red; cursor:pointer;'>
			<input type="hidden" name="BiedingID" value="<?php echo $row1['BiedingID']; ?>">
			<button style="background-color:transparent;" name="delete_this_bieding" onclick="return confirm_delete()" title='Verwijder bod'>
				x
			</button>
		</form>
		<?php
		}
	}
	else{
		echo "<br>Lagere biedingen worden niet weergeven.";
		break;
	}
	
	echo "<br>";
	$meerdan5++;
}

?>
	</div>
			</div>
		</div>
	</div>
</div>
<?php
	}
	}
}
else if(isset($_GET['inloggen'])) 
{
?>
<div id="main">
<div class='container'>
	<div class='col-md-6 col-sm-12 col-xs-12'>
	<?php
	if(isset($_POST['login'])){
		$query = "SELECT Email FROM users WHERE email = '".$_POST['email']."' ";
		$stmt = $conn->query($query);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(! $row){
			echo "Dit e-mailadres is nog niet geregistreerd!";
		}
		else{
			$password_safe = $function->safepass($_POST['password']);
			
			$query = "SELECT UserID, Admin, Actief FROM users WHERE Email = '".$_POST['email']."' AND Wachtwoord = '".$password_safe."' ";
			$stmt = $conn->query($query);
			$brow = $stmt->fetch(PDO::FETCH_ASSOC);
			if(! $brow){
				echo "Wachtwoord is onjuist!";
			}
			else{
				$stmt2 = $conn->query($query);
				while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {	
					if($row['Actief'] === "Nee"){
						echo "<span style='color:red;'>Uw account is verwijderd. Neem contact op met de beheerder voor meer informatie.</span>";
					}
					else{
						$_SESSION['logged_in'] = true;
						$_SESSION['UserID'] = $row['UserID'];
						$_SESSION['Admin'] = $row['Admin'];
						$_SESSION['email'] = $_POST['email'];
					
						$function->redirect("index");
					}
				}
			}
		}
	}
	?>
		<h2 class="h2line">Inloggen</h2><br>
		<form class="slide-form" id="placeholder-slide" action="" method="post">
			<div class="slide-form-container">
				<input id="email" name="email" type="text" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  onfocus="this.removeAttribute('readonly');" readonly <?php if(isset($_POST['email'])){ echo "value='".$_POST['email']."'";} else if(isset($_COOKIE['email'])){ echo "value='".$_COOKIE['email']."'";} ?>>
				<label for="email">Email</label>
			</div>
			<div class="slide-form-container">
				<input id="password" name="password" type="password" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  onfocus="this.removeAttribute('readonly');" readonly>
				<label for="password">Password</label>
			</div>
			<button type="submit" class="action-button animate blue" name="login">Inloggen</button>
		</form>
	</div>
	<div class='col-md-6 col-sm-12 col-xs-12'>
		<h2 class="h2line">Account aanmaken</h2>
		Om in te loggen heeft u een account nodig voor Mijn Marktplaats. <br><br>U kunt dan voortaan:<br>
		<ul class="bulleted">
			<li class='accountmakenli'><span>Advertenties bewaren</span></li>
			<li class='accountmakenli'><span>Uw biedingen in de gaten houden</span></li>
			<li class='accountmakenli'><span>Eigen advertenties beheren</span></li>
		</ul>
		<br>
		<a href="registreren" class="action-button animate red">Registreren</a>
	</div>
	<div class='Ineedsomespaceyo'></div>
</div>
</div>
<?php
} 
else if(isset($_GET['registreren'])) 
{
?>
<div id="main">
<div class='container'>
	<div class='col-md-12'>
	<?php
	if(isset($_POST['makeaccount'])){
		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])){
			if($_POST['password'] === $_POST['password2']){
				if(strlen($_POST['password']) >= 6){
				
					$query = "SELECT Email FROM users WHERE email = '".$_POST['email']."' ";
				
					$stmt = $conn->query($query);
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
					
					if(! $row){
						
						if($_POST['emailNewsletterOptin'] === "true"){
							$_POST['emailNewsletterOptin'] = "Ja";
						}else{
							$_POST['emailNewsletterOptin'] = "Nee";
						}
						date_default_timezone_set('Europe/Amsterdam');
						$date = date('Y-m-d H:i:s', time());
						
						$password_safe = $function->safepass($_POST['password']);
						
						$statement = $conn->prepare("INSERT INTO users(Naam, Adres, Postcode, Woonplaats, Telefoonnummer, Email, Nieuwsbrief, Datum, Admin, Wachtwoord)
							VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10)");
						$statement->execute(array(
							"n1" => "".$_POST['name']."",
							"n2" => " ",
							"n3" => " ",
							"n4" => " ",
							"n5" => " ",
							"n6" => "".$_POST['email']."",
							"n7" => "".$_POST['emailNewsletterOptin']."",
							"n8" => "".$date."",
							"n9" => "0",
							"n10" => "".$password_safe.""
						));
						echo "Uw account is toegevoegd!";
					}
					else{
						echo "E-mail adres is al geregistreerd!";
					}
				}
				else{
					echo "Wachtwoord is niet lang genoeg!";
				}
			}
			else{
				echo "Wachtwoorden zijn niet gelijk!";
			}
		}
		else{
			echo "Niet alle velden zijn ingevuld!";
		}
	}
	?>
		<h2 class="h2line">Registreren</h2><br>
		<form class="slide-form" id="placeholder-slide" action=" " method="post">
			<div class="slide-form-container">
				<input id="name" name="name" type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  onfocus="this.removeAttribute('readonly');" readonly <?php if(isset($_POST['name'])){ echo "value='".$_POST['name']."'";} ?>>
				<label for="name">Naam op Marktplaats</label>
			</div>
			<div class="slide-form-container">
				<input id="email" name="email" type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  onfocus="this.removeAttribute('readonly');" readonly <?php if(isset($_POST['email'])){ echo "value='".$_POST['email']."'";} ?>>
				<label for="email">E-mailadres</label>
			</div>
			<div class="slide-form-container">
				<input id="password" name="password" type="password" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  onfocus="this.removeAttribute('readonly');" readonly>
				<label for="password">Wachtwoord </label>
			</div>
			<div class="slide-form-container">
				<input id="password2" name="password2" type="password" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"  onfocus="this.removeAttribute('readonly');" readonly>
				<label for="password2">Herhaal wachtwoord </label>
			</div>
			<div class="account-create-checkboxes">
				<div class="checkbox-item">
					<p class='labelcheckbox' for="opt-in-for-newsletter">
					<input id="opt-in-for-newsletter" name="emailNewsletterOptin" type="checkbox" value="true" checked>
					Ja, ik wil op de hoogte blijven van nieuws over Marktplaats, tips voor mijn advertenties en websiteverbeteringen. Ook word ik graag uitgenodigd voor gebruiksonderzoeken.</p>
				</div>
			</div>
			<div class="col-md-3" style="margin-left:-15px;">
				<p style="opacity:0.7;">
				Door te registereren op Marktplaats accepteerd u de <a href="http://www.marktplaats.nl/i/help/over-marktplaats/voorwaarden-en-privacybeleid/algemene-gebruiksvoorwaarden.dot" target="_blank">Gebruiksvoorwaarden</a> en het <a href="http://www.marktplaats.nl/i/help/over-marktplaats/voorwaarden-en-privacybeleid/privacybeleid_okt_2013.dot" target="_blank">Privacybeleid</a>. 
				</p>
			</div>
			<div class="col-md-9" style="margin-top:15px;">
				<button name="makeaccount" type="submit" class="action-button animate red">Maak een account</button>
			</div>
		</form>
	</div>
	<div class='Ineedsomespaceyo'></div>
</div>
</div>
<?php
} 
else if(isset($_GET['uitloggen']))
{
    session_unset();
    session_destroy();
	
	$function->redirect("index");
} 
else 
{ 
	$function->redirect("404");
}
?>
</div><!-- /#body-->
<?php include("assets/inc/footer.php"); ?>