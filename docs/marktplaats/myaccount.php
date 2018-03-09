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
			if(isset($_SESSION['logged_in'])){
				?>
			<div class="row">
				<div class="col-md-3">
					<a href="http://dc-ictwebs.nl/103706/marktplaats/myaccount?advertentie" class="action-button animate red">Advertentie plaatsen</a>
				</div>
				<div class="col-md-3">
					<a href="http://dc-ictwebs.nl/103706/marktplaats/myaccount?bewerken" class="action-button animate blue">Mijn gegevens bewerken</a>
				</div>
				<div class="col-md-3">
					<a href="http://dc-ictwebs.nl/103706/marktplaats/myaccount?mijn_advertenties" class="action-button animate blue">Mijn advertenties</a>
				</div>
				<?php
				if($_SESSION['UserID'] === '30' || $_SESSION['UserID'] === '3'){
					echo '
				<div class="col-md-3">
					<a href="http://dc-ictwebs.nl/103706/marktplaats/myaccount?verwijder_een_account" class="action-button animate green">Verwijder een account </a>
				</div>
					';
				}
				?>
			</div>
			<?php
				if(isset($_GET['advertentie'])){
					echo '<h2 class="h2line">Advertentie plaatsen</h2><br>'; 
					
					if(isset($_POST['plaatsad'])){
						
						
						echo "<div style='color:red;'>";

	if($_POST['advertentie_select_type'] === 'auto'){
		$function->plaatsad_auto(
		$_POST['advertentie_select_type'], $_POST['advertentie_titel'], $_POST['advertentie_select_conditie'],
		$_POST['advertentie_auto_merk'], $_POST['advertentie_auto_type'], $_POST['advertentie_auto_kms'], $_POST['advertentie_auto_kleur'], $_POST['advertentie_auto_brandstof'], $_POST['advertentie_auto_bj'], $_POST['advertentie_auto_el'],
		$_POST['advertentie_omschrijving'], $_POST['advertentie_website'], $_POST['advertentie_select_bieden'], $_POST['advertentie_prijs'], $_POST['advertentie_select_verzenden'], $_POST['advertentie_top'], $_POST['advertentie_dagtop'],
		$_POST['advertentie_auto_prijs']		
		);
	}
	else if($_POST['advertentie_select_type'] === 'pc'){
		$function->plaatsad_pc(
		$_POST['advertentie_select_type'], $_POST['advertentie_titel'], $_POST['advertentie_select_conditie'],
		$_POST['advertentie_pc_merk'], $_POST['advertentie_pc_type'], $_POST['advertentie_pc_ram'], $_POST['advertentie_pc_opslag'], $_POST['advertentie_pc_processor'], $_POST['advertentie_pc_display'],
		$_POST['advertentie_omschrijving'], $_POST['advertentie_website'], $_POST['advertentie_select_bieden'], $_POST['advertentie_prijs'], $_POST['advertentie_select_verzenden'], $_POST['advertentie_top'], $_POST['advertentie_dagtop']
		);
	}
	else if($_POST['advertentie_select_type'] === 'smartphone'){
		$function->plaatsad_sp(
		$_POST['advertentie_select_type'], $_POST['advertentie_titel'], $_POST['advertentie_select_conditie'],
		$_POST['advertentie_sp_merk'], $_POST['advertentie_sp_type'], $_POST['advertentie_sp_bs'], $_POST['advertentie_sp_opslag'], $_POST['advertentie_sp_camera'], $_POST['advertentie_sp_display'],
		$_POST['advertentie_omschrijving'], $_POST['advertentie_website'], $_POST['advertentie_select_bieden'], $_POST['advertentie_prijs'], $_POST['advertentie_select_verzenden'], $_POST['advertentie_top'], $_POST['advertentie_dagtop']
		);
	}
	else if($_POST['advertentie_select_type'] === 'tablet'){
		$function->plaatsad_tablet(
		$_POST['advertentie_select_type'], $_POST['advertentie_titel'], $_POST['advertentie_select_conditie'],
		$_POST['advertentie_tablet_merk'], $_POST['advertentie_tablet_type'], $_POST['advertentie_tablet_bs'], $_POST['advertentie_tablet_opslag'], $_POST['advertentie_tablet_camera'], $_POST['advertentie_tablet_display'],
		$_POST['advertentie_omschrijving'], $_POST['advertentie_website'], $_POST['advertentie_select_bieden'], $_POST['advertentie_prijs'], $_POST['advertentie_select_verzenden'], $_POST['advertentie_top'], $_POST['advertentie_dagtop']
		);
	}
	else if($_POST['advertentie_select_type'] === 'tv'){
		$function->plaatsad_tv(
		$_POST['advertentie_select_type'], $_POST['advertentie_titel'], $_POST['advertentie_select_conditie'],
		$_POST['advertentie_tv_merk'], $_POST['advertentie_tv_type'], $_POST['advertentie_tv_hd'], $_POST['advertentie_tv_led'], $_POST['advertentie_tv_display'],
		$_POST['advertentie_omschrijving'], $_POST['advertentie_website'], $_POST['advertentie_select_bieden'], $_POST['advertentie_prijs'], $_POST['advertentie_select_verzenden'], $_POST['advertentie_top'], $_POST['advertentie_dagtop']
		);
	}
	else if($_POST['advertentie_select_type'] === 'wasmachine'){
		$function->plaatsad_wm(
		$_POST['advertentie_select_type'], $_POST['advertentie_titel'], $_POST['advertentie_select_conditie'],
		$_POST['advertentie_wm_merk'], $_POST['advertentie_wm_type'], $_POST['advertentie_wm_inhoud'], $_POST['advertentie_wm_hoogte'], $_POST['advertentie_wm_toeren'], $_POST['advertentie_wm_ek'],
		$_POST['advertentie_omschrijving'], $_POST['advertentie_website'], $_POST['advertentie_select_bieden'], $_POST['advertentie_prijs'], $_POST['advertentie_select_verzenden'], $_POST['advertentie_top'], $_POST['advertentie_dagtop']
		);
	}
	else{
		echo "Vul het juiste type advertentie in! <br>";
	}
	
	if(isset($_FILES['fileToUpload'])){
		$x = 0;
		$counted = count($_FILES['fileToUpload']['name']);
		
		while($x < $counted){
			$function->uploadImage($_FILES["fileToUpload"]["name"][$x], $_FILES["fileToUpload"]["tmp_name"][$x]);
			echo "<br>";
			$x++;
		}			
	}			
						echo "</div><br>";
					}
					?>
<form enctype="multipart/form-data" name="image" method="post" action="">					
	<p>Wat wilt u verkopen?</p>		
	<select name="advertentie_select_type" id="selectthisstuff">
		<option value="-">---</option>
		<?php
		$stmt = $conn->query('show tables where Tables_in_dcictweb_103706 like "type_%" ');
		 
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$newfancyname = explode("type_", $row["Tables_in_dcictweb_103706"]);
			
			if(isset($_POST['advertentie_select_type']) && $_POST['advertentie_select_type'] == $newfancyname[1]){ 
				$selected_dropdown = 'selected'; 
			}
			else{
				$selected_dropdown = ''; 
			}
			
			echo "<option value=".$newfancyname[1]." ".$selected_dropdown.">".$newfancyname[1]."</option>";
		}
		?>
	</select>
	<br>
	<br>
	<p>Titel <span class='hint'>(verplicht)</span></p>
	<input type='text' name='advertentie_titel' placeholder='Titel' <?php if(isset($_POST['advertentie_titel'])){ echo "value='".$_POST['advertentie_titel']."'";} ?>>
	<br>
	<br>				
	<p>Conditie <span class='hint'>(verplicht)</span></p>		
	<select name="advertentie_select_conditie">
		<option value="Nieuw" <?php if(isset($_POST['advertentie_select_conditie']) && $_POST['advertentie_select_conditie'] == 'Nieuw'){ echo 'selected'; }?>>Nieuw</option>
		<option value="Gebruikt" <?php echo (isset($_POST['advertentie_select_conditie']) && $_POST['advertentie_select_conditie'] == 'Gebruikt')?'selected="selected"':''; ?>>Gebruikt</option>
		<option value="Zo goed als nieuw" <?php echo (isset($_POST['advertentie_select_conditie']) && $_POST['advertentie_select_conditie'] == 'Zo goed als nieuw')?'selected="selected"':''; ?>>Zo goed als nieuw</option>
	</select>
	<br>
	<hr> <!-- type -->
	<br>
	<div class='verkoop_auto <?php if($_POST['advertentie_select_type'] !== "auto"){ echo "hidemefgt";} ?> '>
		<p>Merk</p>	
		<input type='text' name='advertentie_auto_merk' placeholder='Merk' <?php if(isset($_POST['advertentie_auto_merk'])){ echo "value='".$_POST['advertentie_auto_merk']."'";} ?>>	
		<br><br>
		<p>Type</p>	
		<input type='text' name='advertentie_auto_type' placeholder='Type' <?php if(isset($_POST['advertentie_auto_type'])){ echo "value='".$_POST['advertentie_auto_type']."'";} ?>>	
		<br><br>
		<p>Kilometerstand</p>	
		<input type='text' name='advertentie_auto_kms' placeholder='Kilometerstand' <?php if(isset($_POST['advertentie_auto_kms'])){ echo "value='".$_POST['advertentie_auto_kms']."'";} ?>>	
		<br><br>
		<p>Kleur</p>	
		<input type='text' name='advertentie_auto_kleur' placeholder='Kleur' <?php if(isset($_POST['advertentie_auto_kleur'])){ echo "value='".$_POST['advertentie_auto_kleur']."'";} ?>>	
		<br><br>
		<p>Brandstof</p>	
		<input type='text' name='advertentie_auto_brandstof' placeholder='Brandstof' <?php if(isset($_POST['advertentie_auto_brandstof'])){ echo "value='".$_POST['advertentie_auto_brandstof']."'";} ?>>	
		<br><br>
		<p>Bouwjaar</p>	
		<input type='text' name='advertentie_auto_bj' placeholder='Bouwjaar' <?php if(isset($_POST['advertentie_auto_bj'])){ echo "value='".$_POST['advertentie_auto_bj']."'";} ?>>	
		<br><br>
		<p>Energie label</p>	
		<input type='text' name='advertentie_auto_el' placeholder='Energie label' <?php if(isset($_POST['advertentie_auto_el'])){ echo "value='".$_POST['advertentie_auto_el']."'";} ?>>	
	</div>
	<div class='verkoop_pc <?php if($_POST['advertentie_select_type'] !== "pc"){ echo "hidemefgt";} ?>'>
		<p>Merk</p>	
		<input type='text' name='advertentie_pc_merk' placeholder='Merk' <?php if(isset($_POST['advertentie_pc_merk'])){ echo "value='".$_POST['advertentie_pc_merk']."'";} ?>>	
		<br><br>
		<p>Type</p>	
		<input type='text' name='advertentie_pc_type' placeholder='Type' <?php if(isset($_POST['advertentie_pc_type'])){ echo "value='".$_POST['advertentie_pc_type']."'";} ?>>	
		<br><br>
		<p>RAM geheugen</p>	
		<input type='text' name='advertentie_pc_ram' placeholder='RAM' <?php if(isset($_POST['advertentie_pc_ram'])){ echo "value='".$_POST['advertentie_pc_ram']."'";} ?>>	
		<br><br>
		<p>Opslagcapaciteit</p>	
		<input type='text' name='advertentie_pc_opslag' placeholder='Opslagcapaciteit' <?php if(isset($_POST['advertentie_pc_opslag'])){ echo "value='".$_POST['advertentie_pc_opslag']."'";} ?>>	
		<br><br>
		<p>Processor</p>	
		<input type='text' name='advertentie_pc_processor' placeholder='Processor' <?php if(isset($_POST['advertentie_pc_processor'])){ echo "value='".$_POST['advertentie_pc_processor']."'";} ?>>	
		<br><br>
		<p>Display</p>	
		<input type='text' name='advertentie_pc_display' placeholder='Display' <?php if(isset($_POST['advertentie_pc_display'])){ echo "value='".$_POST['advertentie_pc_display']."'";} ?>>	
	</div>
	<div class='verkoop_sp <?php if($_POST['advertentie_select_type'] !== "smartphone"){ echo "hidemefgt";} ?>'>
		<p>Merk</p>	
		<input type='text' name='advertentie_sp_merk' placeholder='Merk' <?php if(isset($_POST['advertentie_sp_merk'])){ echo "value='".$_POST['advertentie_sp_merk']."'";} ?>>	
		<br><br>
		<p>Type</p>
		<input type='text' name='advertentie_sp_type' placeholder='Type' <?php if(isset($_POST['advertentie_sp_type'])){ echo "value='".$_POST['advertentie_sp_type']."'";} ?>>	
		<br><br>
		<p>Besturingssysteem</p>
		<input type='text' name='advertentie_sp_bs' placeholder='Besturingssysteem' <?php if(isset($_POST['advertentie_sp_bs'])){ echo "value='".$_POST['advertentie_sp_bs']."'";} ?>>	
		<br><br>
		<p>Opslagcapaciteit</p>
		<input type='text' name='advertentie_sp_opslag' placeholder='Opslagcapaciteit' <?php if(isset($_POST['advertentie_sp_opslag'])){ echo "value='".$_POST['advertentie_sp_opslag']."'";} ?>>	
		<br><br>
		<p>Camera</p>
		<input type='text' name='advertentie_sp_camera' placeholder='Camera' <?php if(isset($_POST['advertentie_sp_camera'])){ echo "value='".$_POST['advertentie_sp_camera']."'";} ?>>	
		<br><br>
		<p>Display</p>
		<input type='text' name='advertentie_sp_display' placeholder='Display' <?php if(isset($_POST['advertentie_sp_display'])){ echo "value='".$_POST['advertentie_sp_display']."'";} ?>>	
	</div>
	<div class='verkoop_tablet <?php if($_POST['advertentie_select_type'] !== "tablet"){ echo "hidemefgt";} ?>'>
		<p>Merk</p>	
		<input type='text' name='advertentie_tablet_merk' placeholder='Merk' <?php if(isset($_POST['advertentie_tablet_merk'])){ echo "value='".$_POST['advertentie_tablet_merk']."'";} ?>>	
		<br><br>
		<p>Type</p>
		<input type='text' name='advertentie_tablet_type' placeholder='Type' <?php if(isset($_POST['advertentie_tablet_type'])){ echo "value='".$_POST['advertentie_tablet_type']."'";} ?>>	
		<br><br>
		<p>Besturingssysteem</p>
		<input type='text' name='advertentie_tablet_bs' placeholder='Besturingssysteem' <?php if(isset($_POST['advertentie_tablet_bs'])){ echo "value='".$_POST['advertentie_tablet_bs']."'";} ?>>	
		<br><br>
		<p>Opslagcapaciteit</p>
		<input type='text' name='advertentie_tablet_opslag' placeholder='Opslagcapaciteit' <?php if(isset($_POST['advertentie_tablet_opslag'])){ echo "value='".$_POST['advertentie_tablet_opslag']."'";} ?>>	
		<br><br>
		<p>Camera</p>
		<input type='text' name='advertentie_tablet_camera' placeholder='Camera' <?php if(isset($_POST['advertentie_tablet_camera'])){ echo "value='".$_POST['advertentie_tablet_camera']."'";} ?>>	
		<br><br>
		<p>Display</p>
		<input type='text' name='advertentie_tablet_display' placeholder='Display' <?php if(isset($_POST['advertentie_tablet_display'])){ echo "value='".$_POST['advertentie_tablet_display']."'";} ?>>	
	</div>
	<div class='verkoop_tv <?php if($_POST['advertentie_select_type'] !== "tv"){ echo "hidemefgt";} ?>'>
		<p>Merk</p>	
		<input type='text' name='advertentie_tv_merk' placeholder='Merk' <?php if(isset($_POST['advertentie_tv_merk'])){ echo "value='".$_POST['advertentie_tv_merk']."'";} ?>>	
		<br><br>
		<p>Type</p>
		<input type='text' name='advertentie_tv_type' placeholder='Type' <?php if(isset($_POST['advertentie_tv_type'])){ echo "value='".$_POST['advertentie_tv_type']."'";} ?>>	
		<br><br>
		<p>HD</p>
		<input type='text' name='advertentie_tv_hd' placeholder='HD' <?php if(isset($_POST['advertentie_tv_hd'])){ echo "value='".$_POST['advertentie_tv_hd']."'";} ?>>	
		<br><br>
		<p>LED</p>
		<input type='text' name='advertentie_tv_led' placeholder='LED' <?php if(isset($_POST['advertentie_tv_led'])){ echo "value='".$_POST['advertentie_tv_led']."'";} ?>>	
		<br><br>
		<p>Display</p>
		<input type='text' name='advertentie_tv_display' placeholder='Display' <?php if(isset($_POST['advertentie_tv_display'])){ echo "value='".$_POST['advertentie_tv_display']."'";} ?>>	
	</div>
	<div class='verkoop_wm <?php if($_POST['advertentie_select_type'] !== "wasmachine"){ echo "hidemefgt";} ?>'>
		<p>Merk</p>	
		<input type='text' name='advertentie_wm_merk' placeholder='Merk' <?php if(isset($_POST['advertentie_wm_merk'])){ echo "value='".$_POST['advertentie_wm_merk']."'";} ?>>	
		<br><br>
		<p>Type</p>
		<input type='text' name='advertentie_wm_type' placeholder='Type' <?php if(isset($_POST['advertentie_wm_type'])){ echo "value='".$_POST['advertentie_wm_type']."'";} ?>>	
		<br><br>
		<p>Inhoud</p>
		<input type='text' name='advertentie_wm_inhoud' placeholder='Inhoud' <?php if(isset($_POST['advertentie_wm_inhoud'])){ echo "value='".$_POST['advertentie_wm_inhoud']."'";} ?>>	
		<br><br>
		<p>Hoogte</p>
		<input type='text' name='advertentie_wm_hoogte' placeholder='Hoogte' <?php if(isset($_POST['advertentie_wm_hoogte'])){ echo "value='".$_POST['advertentie_wm_hoogte']."'";} ?>>	
		<br><br>
		<p>Toeren</p>
		<input type='text' name='advertentie_wm_toeren' placeholder='Toeren' <?php if(isset($_POST['advertentie_wm_toeren'])){ echo "value='".$_POST['advertentie_wm_toeren']."'";} ?>>	
		<br><br>
		<p>Energieklasse</p>
		<input type='text' name='advertentie_wm_ek' placeholder='Energieklasse' <?php if(isset($_POST['advertentie_wm_ek'])){ echo "value='".$_POST['advertentie_wm_ek']."'";} ?>>	
	</div>
	<br>	
	<hr> <!-- afbeeldingen -->
	<br>
	<label for="image">Upoload afbeeldingen: </label>
	<input type="file" name="fileToUpload[]" id="fileToUpload" multiple >
	<br>
	<hr> <!-- omschrijving -->
	<br>
	<p>Omschrijving </p>		
	<textarea name='advertentie_omschrijving' placeholder='Omschrijving'> <?php if(isset($_POST['advertentie_omschrijving'])){ echo $_POST['advertentie_omschrijving'];} ?></textarea>
	<br><br>
	<p>Website toevoegen <span class='hint'>(&euro; 7,00)</span></p>		
	<input type='text' name='advertentie_website' placeholder='Website' <?php if(isset($_POST['advertentie_website'])){ echo "value='".$_POST['advertentie_website']."'";} ?>>
	<br>
	<hr> <!-- prijs -->
	<br>
	<p>Bieden</p>		
	<select name="advertentie_select_bieden" id="biedenjanee">
		<option value='Nee' <?php echo (isset($_POST['advertentie_select_bieden']) && $_POST['advertentie_select_bieden'] == 'Nee')?'selected="selected"':''; ?>>Nee</option>
		<option value='Ja' <?php echo (isset($_POST['advertentie_select_bieden']) && $_POST['advertentie_select_bieden'] == 'Ja')?'selected="selected"':''; ?> selected >Ja</option>
	</select>
	<br>
	<br>
	<p>Prijs <span class='hint hint2 hidemefgt'>(Bieden vanaf dit bedrag mogelijk)</span></p>		
	<input type='text' name='advertentie_prijs' placeholder='Prijs' <?php if(isset($_POST['advertentie_prijs'])){ echo "value='".$_POST['advertentie_prijs']."'";} ?>>
	<br>
	<hr> <!-- levering -->
	<br>			
	<p>Levering</p>		
	<select name="advertentie_select_verzenden">
		<option value="Ophalen" <?php echo (isset($_POST['advertentie_select_verzenden']) && $_POST['advertentie_select_verzenden'] == 'Ophalen')?'selected="selected"':''; ?>>Ophalen</option>
		<option value="Verzenden" <?php echo (isset($_POST['advertentie_select_verzenden']) && $_POST['advertentie_select_verzenden'] == 'Verzenden')?'selected="selected"':''; ?>>Verzenden</option>
		<option value="Ophalen of Verzenden" <?php echo (isset($_POST['advertentie_select_verzenden']) && $_POST['advertentie_select_verzenden'] == 'Ophalen of Verzenden')?'selected="selected"':''; ?>>Ophalen of Verzenden</option>
	</select>
	
	<div class='auto_prijs <?php if($_POST['advertentie_select_type'] !== "auto"){ echo "hidemefgt";} ?>'>
		<br>
		<hr> <!-- Auto betaal bedrag -->
		<br>
		<input type="radio" name="advertentie_auto_prijs" value="12,50"  
		<?php if($_POST['advertentie_auto_prijs'] === '12,50'){ echo 'selected';}else{echo 'selected';} ?>> &euro;12,50 <span class='hint'>(Basis)</span><br>
		<input type="radio" name="advertentie_auto_prijs" value="17,50" 
		<?php if($_POST['advertentie_auto_prijs'] === '17,50'){ echo 'selected';} ?>> &euro;17,50 <span class='hint'>(Standaard)</span><br>
		<input type="radio" name="advertentie_auto_prijs" value="25,00" 
		<?php if($_POST['advertentie_auto_prijs'] === '25,00'){ echo 'selected';} ?>> &euro;25,00 <span class='hint'>(Voordeligst)</span><br>
	</div>
	<br>
	<hr> <!-- top advertentie -->
	<br>
	<input type='checkbox' name='advertentie_top' <?php if(isset($_POST['advertentie_top'])){ echo "checked";} ?>> Top advertentie <span class='hint'>(&euro;15,00 -- 7 Dagen extra zichtbaar)</span>	
	<br><br>
	<input type='checkbox' name='advertentie_dagtop' <?php if(isset($_POST['advertentie_dagtop'])){ echo "checked";} ?>> Dag topper <span class='hint'>(&euro;10,00 -- 24 Uur extra zichtbaar)</span>	
	<br>
	<hr> <!-- --- -->
	<br>
	<button name="plaatsad" type="submit" class="action-button animate red">Plaats advertentie</button>
</form>
					<?php
				}
				else if(isset($_GET['bewerken'])){
					
					echo '<h2 class="h2line">Gegevens bewerken</h2><br>';
					
					if(isset($_POST['editaccount'])){
						echo "<div class='col-md-12' style='margin-bottom:20px; color:red;'>";
						
							$function->editaccount($_POST['Naam'], $_POST['Adres'], $_POST['Postcode'], $_POST['Woonplaats'], $_POST['Telefoonnummer'], $_POST['Email'], $_POST['Nieuwsbrief'], $_POST['EmailOld']);
						
						echo "</div>";
					}
					
					$stmt = $conn->query("SELECT Naam, Adres, Postcode, Woonplaats, Telefoonnummer, Email, Nieuwsbrief, Datum FROM users WHERE UserID = '".$_SESSION['UserID']."' "); 

					while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
						echo "<div class='col-md-2 col-xs-3'>";
							echo "<b style='line-height:26px;'>Naam				</b><br>"; 
							echo "<b style='line-height:26px;'>Adres			</b><br>"; 
							echo "<b style='line-height:26px;'>Postcode			</b><br>"; 
							echo "<b style='line-height:26px;'>Woonplaats		</b><br>"; 
							echo "<b style='line-height:26px;'>Telefoonnummer	</b><br>"; 
							echo "<b style='line-height:26px;'>Email			</b><br>"; 
							echo "<b style='line-height:26px;'>Nieuwsbrief		</b><br>"; 
							echo "<b style='line-height:26px;'>Aanmeld datum	</b><br>";           
						echo "</div>";
						echo "<div class='col-md-2 col-xs-9'>";
							echo "<form action method='post'>";
								echo "<input type='text' name='Naam' value='".$row['Naam']."' maxlength='20'><br>"; 
								echo "<input type='text' name='Adres' value='".$row['Adres']."' maxlength='20'><br>"; 
								echo "<input type='text' name='Postcode' value='".$row['Postcode']."' maxlength='7'><br>"; 
								echo "<input type='text' name='Woonplaats' value='".$row['Woonplaats']."' maxlength='20'><br>"; 
								echo "<input type='text' name='Telefoonnummer' value='".$row['Telefoonnummer']."' maxlength='20'><br>"; 
								echo "<input type='text' name='Email' value='".$row['Email']."' maxlength='50'><br>"; 
								echo "<input type='hidden' name='EmailOld' value='".$row['Email']."' maxlength='50'>"; 
								echo "
								<select style='height:26px;'>
								  <option value='Ja'"; if($row['Nieuwsbrief'] === "Ja"){echo "selected";} echo ">Ja</option>
								  <option value='Nee'"; if($row['Nieuwsbrief'] === "Nee"){echo "selected";} echo ">Nee</option>
								</select><br>
								"; 
								echo "<input type='text' name='Datum' value='".$row['Datum']."' maxlength='20' readonly><br><br>";          
								echo '<button name="editaccount" type="submit" class="action-button animate red">Bijwerken</button><br>';          
							echo "</form>";
						echo "</div>";
					}
				}
				else if(isset($_GET['mijn_advertenties'])){
					echo '<h2 class="h2line">Mijn advertenties</h2><br>'; 
		
//Ophalen vd prijs en naam vh artikel
$stmt = $conn->query('SELECT * FROM advertenties WHERE UserID = "'.$_SESSION['UserID'].'" ORDER BY AdvertentieID DESC ');

$row2 = $stmt->fetch(PDO::FETCH_ASSOC);
if(! $row2){ echo "<h3>Nog geen advertenties geplaatst! </h3>";}


$stmt = $conn->query('SELECT * FROM advertenties WHERE UserID = "'.$_SESSION['UserID'].'" ORDER BY AdvertentieID DESC ');
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
if($row['TypeID'] === "1"){
	$url = 'http://dc-ictwebs.nl/103706/marktplaats/categorie/auto/'.$row['AdvertentieID'];
}
elseif($row['TypeID'] === "2"){
	$url = 'http://dc-ictwebs.nl/103706/marktplaats/categorie/pc/'.$row['AdvertentieID'];
}
elseif($row['TypeID'] === "3"){
	$url = 'http://dc-ictwebs.nl/103706/marktplaats/categorie/smartphone/'.$row['AdvertentieID'];
}
elseif($row['TypeID'] === "4"){
	$url = 'http://dc-ictwebs.nl/103706/marktplaats/categorie/tablet/'.$row['AdvertentieID'];
}
elseif($row['TypeID'] === "5"){
	$url = 'http://dc-ictwebs.nl/103706/marktplaats/categorie/tv/'.$row['AdvertentieID'];
}
elseif($row['TypeID'] === "6"){
	$url = 'http://dc-ictwebs.nl/103706/marktplaats/categorie/wasmachine/'.$row['AdvertentieID'];
}
	
				echo '<div class="col-md-12 article ">';
					?>
					<div class="col-md-3">
						<a href="<?php echo $url; ?>">
							
		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' LIMIT 1 ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="images/no.png" alt="" height="140"/>
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="images/<?php echo $fotourl; ?>" alt="" height="140" />
				<?php
			}
		}
		$realtitle = $function->add3dots($row['Titel'], "...", 12);
		?>
						</a>
					</div>
					<div class="col-md-9">
					<?php
					echo "
					<div class='col-md-6'>
					<b>Titel: 			</b>".$row['Titel']."          <br>
					<b>Prijs: 			</b>".$row['Prijs']."          <br>
					<b>Omschrijving:  	</b>".$row['Omschrijving']."   <br>
					<b>Bieden:  		</b>".$row['Bieden']."         <br>
					<b>Datum: 			</b>".$row['Datum']."          <br>
					</div>
					<div class='col-md-6'>
					<b>Conditie:  		</b>".$row['Conditie']."       <br>
					<b>Levering:  		</b>".$row['Levering']."       <br>
					<b>Topadvertentie:  </b>".$row['Topadvertentie']." <br>
					<b>Dagtopper: 		</b>".$row['Dagtopper']."      <br>
					</div>
					";
					
					if($row['Actief'] === "Nee"){echo "<span style='color:red; float:right; right:10px; top:10px; position:absolute;'> Inactief! </span>"; }
					
					echo "</div>";
					echo "</div>";
}
					
				}
				else if(($_SESSION['UserID'] === '3' || $_SESSION['UserID'] === '30') && isset($_GET['verwijder_een_account'])){
					echo '<h2 class="h2line">Verwijder een account</h2><br>'; 
					$sql321 = "SELECT * FROM users WHERE UserID NOT LIKE '3' and UserID NOT LIKE '30' AND actief = 'Ja' ";
					$stmt321 = $conn->query($sql321);
					
					$weetuzeker = "return confirm('Zeker weten?');";
					while($row = $stmt321->fetch(PDO::FETCH_ASSOC)){
						$linkomteverwijderen = '<a href="http://dc-ictwebs.nl/103706/marktplaats/myaccount?account_is_verwijderd&id='.$row['UserID'].'" style="color:red;" onclick="'.$weetuzeker.'">x</a>';
						echo $row['UserID'].". ".$row['Email']." ".$linkomteverwijderen." <br>";
					}
				}
				else if(($_SESSION['UserID'] === '3' || $_SESSION['UserID'] === '30') && isset($_GET['account_is_verwijderd'])){
					//Verwijder account hier.
		
				$sql = "UPDATE users 
						SET Actief='Nee'
						WHERE UserID=".$_GET['id']." ";

				$stmt = $conn->prepare($sql);
				$stmt->execute();

				echo '<h2 class="h2line">Succesvol verwijderd!</h2><br>'; 
				echo "Account ".$_GET['id']." is verwijderd! <br>";
				echo "<a href='myaccount?verwijder_een_account'>Klik hier om terug te gaan.</a>";
		
					
				}
				else{
					echo "<div class='Ineedsomespaceyo'></div>";
				}
			}
			else{
				$function->redirect("index");
			}
			?>
		</div>
	</div>
</div><!-- /#body-->
<?php include("assets/inc/footer.php"); ?>