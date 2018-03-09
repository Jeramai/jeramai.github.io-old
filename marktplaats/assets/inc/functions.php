<?php
class myfunctions {
	//make safe passwords
	function safepass($password)
	{
		$saltcode = 'aaddgdagknldgnei23141421@@@124132543fdasfasfzsadfbmnqutheothql';	
	
		$password_safe  =  md5($saltcode.sha1($saltcode.$password));
		return $password_safe;
	}
	
	//redirect
	function redirect($url, $statusCode = 303)
	{
	   echo '<meta http-equiv="refresh" content="0;'.$url.'">';
	   die();
	}
	
	//add dots on long lines
	function add3dots($string, $repl, $limit) 
	{
	  if(strlen($string) > $limit) 
	  {
		return substr($string, 0, $limit) . $repl; 
	  }
	  else 
	  {
		return $string;
	  }
	}
	
	//Filter bij prijs
	function OrderByPrice($a, $b, $type)
	{
		if($a >= 0 && $b > $a){
			$this->search("", $type,"", $a, $b);
		}
		else{
			echo "Prijzen niet correct";
		}
	}
	
	//Upload img
	function uploadImage($imgname, $imgtmpname)
	{
		$target_dir = "images/";
		$target_file = $target_dir . basename($imgname);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		$dst_cpl = $target_dir . basename($imgname); //Hele naam path + img + extension
		$dst_name = preg_replace('/\.[^.]*$/', '', $imgname); // Alleen naam img
		$dst_ext = $imageFileType; //Alleen naam extension
		
		$check = getimagesize($imgtmpname);
		if($check !== false) {
			while(file_exists($dst_cpl) == true){
				$i++;
				$imgname = $dst_name . $i . '.' . $dst_ext;
				$dst_cpl = $target_dir . basename($imgname);
			}
			if($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg" || $imageFileType === "gif" ) {

				if (move_uploaded_file($imgtmpname, $dst_cpl)) {
					
	global $conn;
	
	$stmt = $conn->query("SELECT MAX(AdvertentieID) as a FROM advertenties"); 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	$imageadid = $row['a']; }
	
	$statement = $conn->prepare("
	INSERT INTO fotos
	(AdvertentieID,Foto)
	VALUES(:n1, :n2)");
	$statement->execute(array(
	"n1" => "".$imageadid."",
	"n2" => "".$imgname.""
	));
					//echo "Afbeelding geupload!";
				} 
				else {
					echo "Sorry, er was een fout bij het uploaden.";
				}
			}
			else{
				echo "Sorry, alleen JPG, JPEG, PNG & GIF afbeeldingen zijn toegestaan. <br> Afbeelding(en) niet geupload!";
			}
		}
		else {
			echo "Afbeelding(en) niet geupload!";
		}
	}
	
	/*-Biedingen-*/
	function biedenbieden($bedrag, $adprijs, $id)
	{
		global $conn;
		if($bedrag > 0){
			if($bedrag > ($adprijs + 0.49)){
				$query = "	SELECT 
							MAX(Prijs) AS Prijs
							FROM biedingen 
							WHERE AdvertentieID = '".$id."' ";

				$stmt = $conn->query($query);

				while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
					if($bedrag > ($row1['Prijs'] + 0.49)){		
						$statement = $conn->prepare("
						INSERT INTO biedingen
						(AdvertentieID,Prijs,UserID)
						VALUES(:n1, :n2, :n3)");
						$statement->execute(array(
						"n1" => "".$id."",
						"n2" => "".$bedrag."",
						"n3" => "".$_SESSION['UserID'].""
						));
						
						echo "Bod is geplaatst";
					}
					else{
						echo "Het opgegeven bedrag is niet hoog genoeg!";
					}
				}
			}
			else{
				echo "Opgegeven bedrag is niet hoog genoeg!";
			}
		}
		else{
			echo "Opgegeven bedrag is negatief!";
		}
	}
	
	/*-Zoeken-*/
	function search($search_term, $search_type, $search_checked, $a, $b)
	{
		if(isset($_GET['r']) && isset($_GET['s']) && isset($_GET['t'])){
			$search_term = $_GET['r'];
			$search_type = $_GET['s'];
			$search_checked = $_GET['t'];
		}
		
		$search_query = "
						SELECT *
						FROM
						";	
		
		$search_query .= " users u, advertenties, type_".$search_type." WHERE ";
		
		if(!empty($search_term)){
			if($search_type === "auto"){
				$search_query .= "  (
										Merk like '%".$search_term."%' OR 
										Type like '%".$search_term."%' OR 
										Kilometerstand like '%".$search_term."%' OR 
										Kleur like '%".$search_term."%' OR 
										Brandstof like '%".$search_term."%' OR 
										Bouwjaar like '%".$search_term."%' OR 
										Energielabel like '%".$search_term."%' 
										";
			}
			else if($search_type === "pc"){
				$search_query .= "  (
										Merk like '%".$search_term."%' OR 
										Type like '%".$search_term."%' OR 
										RAM like '%".$search_term."%' OR 
										Opslagcapaciteit like '%".$search_term."%' OR 
										Processor like '%".$search_term."%' OR 
										Display like '%".$search_term."%'  
										";
			}
			else if($search_type === "smartphone"){
				$search_query .= "  (
										Merk like '%".$search_term."%' OR 
										Type like '%".$search_term."%' OR 
										Besturingssysteem like '%".$search_term."%' OR 
										Opslagcapaciteit like '%".$search_term."%' OR 
										Camera like '%".$search_term."%' OR 
										Display like '%".$search_term."%'  
										";
			}
			else if($search_type === "tablet"){
				$search_query .= "  (
										Merk like '%".$search_term."%' OR 
										Type like '%".$search_term."%' OR 
										Besturingssysteem like '%".$search_term."%' OR 
										Opslagcapaciteit like '%".$search_term."%' OR 
										Camera like '%".$search_term."%' OR 
										Display like '%".$search_term."%'  
										";
			}
			else if($search_type === "tv"){
				$search_query .= "  (
										Merk like '%".$search_term."%' OR 
										Type like '%".$search_term."%' OR 
										HD like '%".$search_term."%' OR 
										LED like '%".$search_term."%' OR 
										Display like '%".$search_term."%'  
										";
			}
			else if($search_type === "wasmachine"){
				$search_query .= "  (
										Merk like '%".$search_term."%' OR 
										Type like '%".$search_term."%' OR 
										Inhoud like '%".$search_term."%' OR 
										Hoogte like '%".$search_term."%' OR 
										Toeren like '%".$search_term."%' OR 
										Energieklasse like '%".$search_term."%'  
										";
			}
			
			if(!empty($search_checked)){
				$search_query .= "	OR
									Omschrijving like '%".$search_term."%' OR 
									Titel like '%".$search_term."%' 
									";
			}
			
			$search_query .= " )";
		}
		
		if(!empty($a) && !empty($b)){
			$search_query .= " Prijs BETWEEN ".$a." AND ".$b." 
								";
		}
		
		if(!empty($search_checked)){
			if($search_type === "auto"){
				$search_query .= " AND TypeID = 1 ";
			}
			else if($search_type === "pc"){
				$search_query .= " AND TypeID = 2 ";
			}
			else if($search_type === "smartphone"){
				$search_query .= " AND TypeID = 3 ";
			}
			else if($search_type === "tablet"){
				$search_query .= " AND TypeID = 4 ";
			}
			else if($search_type === "tv"){
				$search_query .= " AND TypeID = 5 ";
			}
			else if($search_type === "wasmachine"){
				$search_query .= " AND TypeID = 6 ";
			}
		}
		
		$search_query .= 'AND advertenties.Actief = "Ja" AND u.Actief = "Ja"  AND u.UserID = advertenties.UserID';
		
		if($search_type === "auto"){
			$search_query .= " AND advertenties.AdvertentieID = type_auto.AdvertentieID  GROUP BY AutoID ";
		}
		else if($search_type === "pc"){
			$search_query .= " AND advertenties.AdvertentieID = type_pc.AdvertentieID  GROUP BY PCID ";
		}
		else if($search_type === "smartphone"){
			$search_query .= " AND advertenties.AdvertentieID = type_smartphone.AdvertentieID  GROUP BY SmartphoneID ";
		}
		else if($search_type === "tablet"){
			$search_query .= " AND advertenties.AdvertentieID = type_tablet.AdvertentieID GROUP BY TabletID ";
		}
		else if($search_type === "tv"){
			$search_query .= " AND advertenties.AdvertentieID = type_tv.AdvertentieID GROUP BY TVID ";
		}
		else if($search_type === "wasmachine"){
			$search_query .= "  AND advertenties.AdvertentieID = type_wasmachine.AdvertentieID GROUP BY WasID ";
		}
		
		
		if(isset($_GET['p']) && isset($_GET['q'])){
			$search_query .= " ORDER BY  ".$_GET['p']." ".$_GET['q']." ";
		}
		
		global $conn;
		
		$stmt = $conn->query($search_query);
		
		echo '<h2 class="h2line">'.$search_term.' - '.$search_type.'</h2> ';
		$url = '?r='.$search_term.'&s='.$search_type.'&t='.$search_checked;
		?>
		<div style="float:right;">
			<a href='<?php echo $url; if($_GET['q'] === 'ASC'){ echo "&p=Prijs&q=DESC"; } else { echo "&p=Prijs&q=ASC"; } ?>'>Prijs</a>
			 - 
			<a href='<?php echo $url; if($_GET['q'] === 'ASC'){ echo "&p=Datum&q=DESC"; } else { echo "&p=Datum&q=ASC"; } ?>'>Datum</a>
		</div>
		<?php
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(! $row){
			echo "<br>Geen resultaten gevonden!";
		}
		else{
		$stmt = $conn->query($search_query);
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="col-md-12 article ">';
						?>
						<div class="col-md-3">
							<a href="<?php echo $search_type."/".$row['AdvertentieID']; ?>">

		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' LIMIT 1 ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="http://dc-ictwebs.nl/103706/marktplaats/images/no.png" alt="" height="140"/>
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="http://dc-ictwebs.nl/103706/marktplaats/images/<?php echo $fotourl; ?>" alt="" height="140" />
				<?php
			}
		}
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
		<b>Bekeken:  		</b>".$row['Bekeken']."        <br>
	</div>
	<div class='col-md-6'>
		<b>Favorieten:  	</b>".$row['Favorieten']."     <br>
		<b>Conditie:  		</b>".$row['Conditie']."       <br>
		<b>Website: 		</b>".$row['Website']."        <br>
		<b>Levering:  		</b>".$row['Levering']."       <br>
		<b>Topadvertentie:  </b>".$row['Topadvertentie']." <br>
		<b>Dagtopper: 		</b>".$row['Dagtopper']."      <br>
	</div>
	";

	?></div><?php
				echo "</div>";
			}
		}
	}
	
	/*-filterzoeken-*/
	function filtersearch($a, $merk, $type, $a4, $a5, $a6, $a7)
	{
		if(isset($_GET['r']) && isset($_GET['s']) && isset($_GET['t'])){
			$search_term = $_GET['r'];
			$search_type = $_GET['s'];
			$search_checked = $_GET['t'];
		}
		
		$search_query = " SELECT * FROM advertenties a, type_".$a." t WHERE a.AdvertentieID = t.AdvertentieID ";
	
//Merk sorteren
$arrlength = count($merk);
if(!empty($merk)){
 if($arrlength === 0){
  $search_query .= ' AND t.Merk = "'.$merk[0].'"';
 }
 else{
  $search_query .= ' AND (';
  for($x = 0; $x < $arrlength; $x++) {
   $search_query .= ' t.Merk = "'.$merk[$x].'"';
   if($x < ($arrlength -1)){
    $search_query .= ' || ';
   }
  }
  $search_query .= ' ) ';
 }	
}	

//Type sorteren
$arrlength = count($type);
if(!empty($type)){
 if($arrlength === 0){
  $search_query .= ' AND t.Type = "'.$type[0].'"';
 }
 else{
  $search_query .= ' AND (';
  for($x = 0; $x < $arrlength; $x++) {
   $search_query .= ' t.Type = "'.$type[$x].'"';
   if($x < ($arrlength -1)){
    $search_query .= ' || ';
   }
  }
  $search_query .= ' ) ';
 }
}

if($a === "auto")
{
	//Kilometerstand sorteren
	if(!empty($a4)){
    
    $arrlength = count($a4);
    
    if($arrlength === 1){
     if($a4[0] == 1){
      $search_query .= ' AND t.Kilometerstand < 15000 ';
     }
     else if($a4[0] == 2){
      $search_query .= ' AND t.Kilometerstand BETWEEN 15000 AND 50000 ';
     }
     else if($a4[0] == 3){
      $search_query .= ' AND t.Kilometerstand BETWEEN 50000 AND 100000 ';
     }
     else if($a4[0] == 4){
      $search_query .= ' AND t.Kilometerstand > 100000 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a4[$x] == 1){
       $search_query .= ' t.Kilometerstand < 15000 ';
      }
      else if($a4[$x] == 2){
       $search_query .= ' t.Kilometerstand BETWEEN 15000 AND 50000 ';
      }
      else if($a4[$x] == 3){
       $search_query .= ' t.Kilometerstand BETWEEN 50000 AND 100000 ';
      }
      else if($a4[$x] == 4){
       $search_query .= ' t.Kilometerstand > 100000 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

	//Bouwjaar sorteren
	if(!empty($a5)){
    
    $arrlength = count($a5);
    
    if($arrlength === 1){
     if($a5[0] == 1){
      $search_query .= ' AND t.Bouwjaar < 1960 ';
     }
     else if($a5[0] == 2){
      $search_query .= ' AND t.Bouwjaar BETWEEN 1960 AND 1980 ';
     }
     else if($a5[0] == 3){
      $search_query .= ' AND t.Bouwjaar BETWEEN 1980 AND 2000 ';
     }
     else if($a5[0] == 4){
      $search_query .= ' AND t.Bouwjaar > 2000 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a5[$x] == 1){
       $search_query .= ' t.Bouwjaar < 1960 ';
      }
      else if($a5[$x] == 2){
       $search_query .= ' t.Bouwjaar BETWEEN 1960 AND 1980 ';
      }
      else if($a5[$x] == 3){
       $search_query .= ' t.Bouwjaar BETWEEN 1980 AND 2000 ';
      }
      else if($a5[$x] == 4){
       $search_query .= ' t.Bouwjaar > 2000 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

	//Kleur sorteren
	if(!empty($a6)){
	$arrlength = count($a6);
	 if($arrlength === 0){
	  $search_query .= ' AND t.Kleur = "'.$a6[0].'"';
	 }
	 else{
	  $search_query .= ' AND (';
	  for($x = 0; $x < $arrlength; $x++) {
	   $search_query .= ' t.Kleur = "'.$a6[$x].'"';
	   if($x < ($arrlength -1)){
		$search_query .= ' || ';
	   }
	  }
	  $search_query .= ' ) ';
	 }
	}
	
	//Brandstof sorteren
	if(!empty($a7)){
	$arrlength = count($a7);
	 if($arrlength === 0){
	  $search_query .= ' AND t.Brandstof = "'.$a7[0].'"';
	 }
	 else{
	  $search_query .= ' AND (';
	  for($x = 0; $x < $arrlength; $x++) {
	   $search_query .= ' t.Brandstof = "'.$a7[$x].'"';
	   if($x < ($arrlength -1)){
		$search_query .= ' || ';
	   }
	  }
	  $search_query .= ' ) ';
	 }
	}
   
}
else if($a === "pc")
{
	//RAM sorteren
	if(!empty($a4)){
    
    $arrlength = count($a4);
    
    if($arrlength === 1){
     if($a4[0] == 1){
      $search_query .= ' AND t.RAM <= 1 ';
     }
     else if($a4[0] == 2){
      $search_query .= ' AND t.RAM = 2 ';
     }
     else if($a4[0] == 3){
      $search_query .= ' AND t.RAM = 3 ';
     }
     else if($a4[0] == 4){
      $search_query .= ' AND t.RAM > 3 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a4[$x] == 1){
       $search_query .= ' t.RAM < 1 ';
      }
      else if($a4[$x] == 2){
       $search_query .= ' t.RAM BETWEEN 1 AND 2 ';
      }
      else if($a4[$x] == 3){
       $search_query .= ' t.RAM BETWEEN 2 AND 3 ';
      }
      else if($a4[$x] == 4){
       $search_query .= ' t.RAM > 3 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

	//Opslagcapaciteit sorteren
	if(!empty($a5)){
    
    $arrlength = count($a5);
    
    if($arrlength === 1){
     if($a5[0] == 1){
      $search_query .= ' AND t.Opslagcapaciteit < 8 ';
     }
     else if($a5[0] == 2){
      $search_query .= ' AND t.Opslagcapaciteit = 8 ';
     }
     else if($a5[0] == 3){
      $search_query .= ' AND t.Opslagcapaciteit = 16 ';
     }
     else if($a5[0] == 4){
      $search_query .= ' AND t.Opslagcapaciteit = 32 ';
     }
     else if($a5[0] == 5){
      $search_query .= ' AND t.Opslagcapaciteit >= 64 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a5[$x] == 1){
       $search_query .= ' t.Opslagcapaciteit <= 8 ';
      }
      else if($a5[$x] == 2){
       $search_query .= ' t.Opslagcapaciteit = 8 ';
      }
      else if($a5[$x] == 3){
       $search_query .= ' t.Opslagcapaciteit = 16 ';
      }
      else if($a5[$x] == 4){
       $search_query .= ' t.Opslagcapaciteit = 32 ';
      }
      else if($a5[$x] == 5){
       $search_query .= ' t.Opslagcapaciteit >= 64 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

	//Processor sorteren
	if(!empty($a6)){
	$arrlength = count($a6);
	 if($arrlength === 0){
	  $search_query .= ' AND t.Processor = "'.$a6[0].'"';
	 }
	 else{
	  $search_query .= ' AND (';
	  for($x = 0; $x < $arrlength; $x++) {
	   $search_query .= ' t.Processor = "'.$a6[$x].'"';
	   if($x < ($arrlength -1)){
		$search_query .= ' || ';
	   }
	  }
	  $search_query .= ' ) ';
	 }
	}
	
	//Display sorteren
	if(!empty($a7)){
    
    $arrlength = count($a7);
    
    if($arrlength === 1){
     if($a7[0] == 1){
      $search_query .= ' AND t.Display < 15 ';
     }
     else if($a7[0] == 2){
      $search_query .= ' AND t.Display BETWEEN 15 AND 17 ';
     }
     else if($a7[0] == 3){
      $search_query .= ' AND t.Display BETWEEN 17 AND 21 ';
     }
     else if($a7[0] == 4){
      $search_query .= ' AND t.Display > 21 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a7[$x] == 1){
       $search_query .= ' t.Display < 15';
      }
      else if($a7[$x] == 2){
       $search_query .= ' t.Display BETWEEN 15 AND 17 ';
      }
      else if($a7[$x] == 3){
       $search_query .= ' t.Display BETWEEN 17 AND 21 ';
      }
      else if($a7[$x] == 4){
       $search_query .= ' t.Display > 21 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

}
else if($a === "smartphone" || $a === "tablet")
{
   //Besturingssysteem sorteren
	if(!empty($a4)){
	$arrlength = count($a4);
	 if($arrlength === 0){
	  $search_query .= ' AND t.Besturingssysteem = "'.$a4[0].'"';
	 }
	 else{
	  $search_query .= ' AND (';
	  for($x = 0; $x < $arrlength; $x++) {
	   $search_query .= ' t.Besturingssysteem = "'.$a4[$x].'"';
	   if($x < ($arrlength -1)){
		$search_query .= ' || ';
	   }
	  }
	  $search_query .= ' ) ';
	 }
	}

	//Opslagcapaciteit sorteren
	if(!empty($a5)){
    
    $arrlength = count($a5);
    
    if($arrlength === 1){
     if($a5[0] == 1){
      $search_query .= ' AND t.Opslagcapaciteit < 8 ';
     }
     else if($a5[0] == 2){
      $search_query .= ' AND t.Opslagcapaciteit = 8 ';
     }
     else if($a5[0] == 3){
      $search_query .= ' AND t.Opslagcapaciteit = 16 ';
     }
     else if($a5[0] == 4){
      $search_query .= ' AND t.Opslagcapaciteit = 32 ';
     }
     else if($a5[0] == 5){
      $search_query .= ' AND t.Opslagcapaciteit >= 64 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a5[$x] == 1){
       $search_query .= ' t.Opslagcapaciteit <= 8 ';
      }
      else if($a5[$x] == 2){
       $search_query .= ' t.Opslagcapaciteit = 8 ';
      }
      else if($a5[$x] == 3){
       $search_query .= ' t.Opslagcapaciteit = 16 ';
      }
      else if($a5[$x] == 4){
       $search_query .= ' t.Opslagcapaciteit = 32 ';
      }
      else if($a5[$x] == 5){
       $search_query .= ' t.Opslagcapaciteit >= 64 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

	//Camera sorteren
	if(!empty($a6)){
    
    $arrlength = count($a6);
    
    if($arrlength === 1){
     if($a6[0] == 1){
      $search_query .= ' AND t.Camera < 3 ';
     }
     else if($a6[0] == 2){
      $search_query .= ' AND t.Camera BETWEEN 3 AND 6 ';
     }
     else if($a6[0] == 3){
      $search_query .= ' AND t.Camera BETWEEN 6 AND 12 ';
     }
     else if($a6[0] == 4){
      $search_query .= ' AND t.Camera > 12 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a6[$x] == 1){
       $search_query .= ' t.Camera < 3';
      }
      else if($a6[$x] == 2){
       $search_query .= ' t.Camera BETWEEN 3 AND 6 ';
      }
      else if($a6[$x] == 3){
       $search_query .= ' t.Camera BETWEEN 6 AND 12 ';
      }
      else if($a6[$x] == 4){
       $search_query .= ' t.Camera > 12 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }
	
	//Display sorteren
	if(!empty($a7)){
    
    $arrlength = count($a7);
    
	if($a === "smartphone" ){
		if($arrlength === 1){
		 if($a7[0] == 1){
		  $search_query .= ' AND t.Display < 3 ';
		 }
		 else if($a7[0] == 2){
		  $search_query .= ' AND t.Display BETWEEN 3 AND 4 ';
		 }
		 else if($a7[0] == 3){
		  $search_query .= ' AND t.Display BETWEEN 4 AND 5 ';
		 }
		 else if($a7[0] == 4){
		  $search_query .= ' AND t.Display > 5 ';
		 }
		}
		else{
		 $search_query .= ' AND (';
		 for($x = 0; $x < $arrlength; $x++) {
		  if($a7[$x] == 1){
		   $search_query .= ' t.Display < 3';
		  }
		  else if($a7[$x] == 2){
		   $search_query .= ' t.Display BETWEEN 3 AND 4 ';
		  }
		  else if($a7[$x] == 3){
		   $search_query .= ' t.Display BETWEEN 4 AND 5 ';
		  }
		  else if($a7[$x] == 4){
		   $search_query .= ' t.Display > 5 ';
		  }
		  if($x < ($arrlength -1)){
		   $search_query .= ' || ';
		  }
		 }
		 $search_query .= ' ) ';
		}
    }
	else if($a === "tablet" ){
		if($arrlength === 1){
		 if($a7[0] == 1){
		  $search_query .= ' AND t.Display < 7 ';
		 }
		 else if($a7[0] == 2){
		  $search_query .= ' AND t.Display BETWEEN 7 AND 8 ';
		 }
		 else if($a7[0] == 3){
		  $search_query .= ' AND t.Display BETWEEN 8 AND 9 ';
		 }
		 else if($a7[0] == 4){
		  $search_query .= ' AND t.Display > 10 ';
		 }
		}
		else{
		 $search_query .= ' AND (';
		 for($x = 0; $x < $arrlength; $x++) {
		  if($a7[$x] == 1){
		   $search_query .= ' t.Display < 7';
		  }
		  else if($a7[$x] == 2){
		   $search_query .= ' t.Display BETWEEN 7 AND 8 ';
		  }
		  else if($a7[$x] == 3){
		   $search_query .= ' t.Display BETWEEN 8 AND 9 ';
		  }
		  else if($a7[$x] == 4){
		   $search_query .= ' t.Display > 10 ';
		  }
		  if($x < ($arrlength -1)){
		   $search_query .= ' || ';
		  }
		 }
		 $search_query .= ' ) ';
		}
    }
   }

}
else if($a === "tv")
{
   //HD sorteren
	if(!empty($a4)){
	$arrlength = count($a4);
	 if($arrlength === 0){
	  $search_query .= ' AND t.HD = "'.$a4[0].'"';
	 }
	 else{
	  $search_query .= ' AND (';
	  for($x = 0; $x < $arrlength; $x++) {
	   $search_query .= ' t.HD = "'.$a4[$x].'"';
	   if($x < ($arrlength -1)){
		$search_query .= ' || ';
	   }
	  }
	  $search_query .= ' ) ';
	 }
	}

	//LED sorteren
	if(!empty($a5)){
	$arrlength = count($a5);
	 if($arrlength === 0){
	  $search_query .= ' AND t.LED = "'.$a5[0].'"';
	 }
	 else{
	  $search_query .= ' AND (';
	  for($x = 0; $x < $arrlength; $x++) {
	   $search_query .= ' t.LED = "'.$a5[$x].'"';
	   if($x < ($arrlength -1)){
		$search_query .= ' || ';
	   }
	  }
	  $search_query .= ' ) ';
	 }
	}
	
	//Display sorteren
	if(!empty($a6)){
    
    $arrlength = count($a6);
    
    if($arrlength === 1){
     if($a6[0] == 1){
      $search_query .= ' AND t.Display < 40 ';
     }
     else if($a6[0] == 2){
      $search_query .= ' AND t.Display BETWEEN 40 AND 50 ';
     }
     else if($a6[0] == 3){
      $search_query .= ' AND t.Display BETWEEN 50 AND 60 ';
     }
     else if($a6[0] == 4){
      $search_query .= ' AND t.Display > 60 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a6[$x] == 1){
       $search_query .= ' t.Display < 40';
      }
      else if($a6[$x] == 2){
       $search_query .= ' t.Display BETWEEN 40 AND 50 ';
      }
      else if($a6[$x] == 3){
       $search_query .= ' t.Display BETWEEN 50 AND 60 ';
      }
      else if($a6[$x] == 4){
       $search_query .= ' t.Display > 60 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

}
else if($a === "wasmachine")
{
	//Inhoud sorteren
	if(!empty($a4)){
    
    $arrlength = count($a4);
    
    if($arrlength === 1){
     if($a4[0] == 1){
      $search_query .= ' AND t.Inhoud <= 10 ';
     }
     else if($a4[0] == 2){
      $search_query .= ' AND t.Inhoud BETWEEN 10 AND 15 ';
     }
     else if($a4[0] == 3){
      $search_query .= ' AND t.Inhoud BETWEEN 15 AND 20 ';
     }
     else if($a4[0] == 4){
      $search_query .= ' AND t.Inhoud > 20 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a4[$x] == 1){
       $search_query .= ' t.Inhoud <= 10 ';
      }
      else if($a4[$x] == 2){
       $search_query .= ' t.Inhoud BETWEEN 10 AND 15 ';
      }
      else if($a4[$x] == 3){
       $search_query .= ' t.Inhoud BETWEEN 15 AND 20 ';
      }
      else if($a4[$x] == 4){
       $search_query .= ' t.Inhoud > 20 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

	//Hoogte sorteren
	if(!empty($a5)){
    
    $arrlength = count($a5);
    
    if($arrlength === 1){
     if($a5[0] == 1){
      $search_query .= ' AND t.Hoogte <= 10 ';
     }
     else if($a5[0] == 2){
      $search_query .= ' AND t.Hoogte BETWEEN 10 AND 15 ';
     }
     else if($a5[0] == 3){
      $search_query .= ' AND t.Hoogte BETWEEN 15 AND 20 ';
     }
     else if($a5[0] == 4){
      $search_query .= ' AND t.Hoogte > 20 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a5[$x] == 1){
       $search_query .= ' t.Hoogte <= 10 ';
      }
      else if($a5[$x] == 2){
       $search_query .= ' t.Hoogte BETWEEN 10 AND 15 ';
      }
      else if($a5[$x] == 3){
       $search_query .= ' t.Hoogte BETWEEN 15 AND 20 ';
      }
      else if($a5[$x] == 4){
       $search_query .= ' t.Hoogte > 20 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }

	//Toeren sorteren
	if(!empty($a6)){
	$arrlength = count($a6);
    
    if($arrlength === 1){
     if($a6[0] == 1){
      $search_query .= ' AND t.Toeren <= 10 ';
     }
     else if($a6[0] == 2){
      $search_query .= ' AND t.Toeren BETWEEN 10 AND 15 ';
     }
     else if($a6[0] == 3){
      $search_query .= ' AND t.Toeren BETWEEN 15 AND 20 ';
     }
     else if($a6[0] == 4){
      $search_query .= ' AND t.Toeren > 20 ';
     }
    }
    else{
     $search_query .= ' AND (';
     for($x = 0; $x < $arrlength; $x++) {
      if($a6[$x] == 1){
       $search_query .= ' t.Toeren <= 10 ';
      }
      else if($a6[$x] == 2){
       $search_query .= ' t.Toeren BETWEEN 10 AND 15 ';
      }
      else if($a6[$x] == 3){
       $search_query .= ' t.Toeren BETWEEN 15 AND 20 ';
      }
      else if($a6[$x] == 4){
       $search_query .= ' t.Toeren > 20 ';
      }
      if($x < ($arrlength -1)){
       $search_query .= ' || ';
      }
     }
     $search_query .= ' ) ';
    }
   }
	
	//Energieklasse sorteren
	if(!empty($a7)){
		if($a7 === "Goed"){
		  $search_query .= ' AND (t.Energieklasse LIKE "%A%" OR t.Energieklasse LIKE "%B%") ';
		}
		else if($a7 === "Meh"){
		  $search_query .= ' AND (t.Energieklasse LIKE "%C%" OR t.Energieklasse LIKE "%D%") ';
		}
		else if($a7 === "Overig"){
		  $search_query .= ' AND (t.Energieklasse LIKE "%E%" OR t.Energieklasse LIKE "%F%") ';
		}
   }
}
		
		global $conn;
		
		$stmt = $conn->query($search_query);
		
		echo '<h2 class="h2line">'.$a.'</h2> ';
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(! $row){
			echo "<br>Geen resultaten gevonden!";
		}
		else{
		$stmt = $conn->query($search_query);
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="col-md-12 article ">';
						?>
						<div class="col-md-3">
							<a href="<?php echo $search_type."/".$row['AdvertentieID']; ?>">

		<?php
		$sql321 = "SELECT Foto FROM fotos WHERE AdvertentieID = '".$row['AdvertentieID']."' LIMIT 1 ";
		$stmt321 = $conn->query($sql321);
		$row321 = $stmt321->fetch(PDO::FETCH_ASSOC);
		if(! $row321){
			?>
				<img src="http://dc-ictwebs.nl/103706/marktplaats/images/no.png" alt="" height="140"/>
			<?php
		}
		else{
			$stmt3221 = $conn->query($sql321);
			while($row3221 = $stmt3221->fetch(PDO::FETCH_ASSOC)) { 
				$fotourl = $row3221['Foto'];
				?>
					<img src="http://dc-ictwebs.nl/103706/marktplaats/images/<?php echo $fotourl; ?>" alt="" height="140" />
				<?php
			}
		}
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
		<b>Bekeken:  		</b>".$row['Bekeken']."        <br>
	</div>
	<div class='col-md-6'>
		<b>Favorieten:  	</b>".$row['Favorieten']."     <br>
		<b>Conditie:  		</b>".$row['Conditie']."       <br>
		<b>Website: 		</b>".$row['Website']."        <br>
		<b>Levering:  		</b>".$row['Levering']."       <br>
		<b>Topadvertentie:  </b>".$row['Topadvertentie']." <br>
		<b>Dagtopper: 		</b>".$row['Dagtopper']."      <br>
	</div>
	";

	?></div><?php
				echo "</div>";
			}
		}
	}
	
	/*-Bewerk account-*/
	function editaccount($Naam, $Adres, $Postcode, $Woonplaats, $Telefoonnummer, $Email, $Nieuwsbrief, $EmailOld)
	{         
		global $conn;
		
		if(!empty($Naam) && !empty($Email)){
			if($Email === $EmailOld){
				$row = "";
			}
			else{
				$query = "SELECT Email FROM users WHERE email = '".$Email."' ";
				$stmt = $conn->query($query);
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			
			if(! $row){
				
				$sql = "UPDATE users 
						SET Naam='".$Naam."', 
						Adres='".$Adres."', 
						Postcode='".$Postcode."', 
						Woonplaats='".$Woonplaats."', 
						Telefoonnummer='".$Telefoonnummer."', 
						Email='".$Email."', 
						Nieuwsbrief='".$Nieuwsbrief."'
						WHERE UserID=".$_SESSION['UserID']." ";

				$stmt = $conn->prepare($sql);
				$stmt->execute();

				echo "Uw account is bewerkt!";
			}
			else{
				echo "E-mail adres is al geregistreerd!";
			}
		}
		else{
			echo "U moet een naam en email hebben!";
		}          			
	
	}

	/*-Plaatsen ads-*/
	function plaatsad_auto($type1, $title1, $conditie1, 
	$merk, $type, $kms, $kleur, $bs, $bj, $el,
	$omschrijving2, $website2, $bieden2, $prijs2, $verzenden2, $top2, $dagtop2,
	$auto_prijs)
	{
		//$prijs2 = number_format($prijs2, 2);
		if(!empty($type1) && !empty($title1) && !empty($conditie1)){
			if(!empty($merk) || !empty($type) || !empty($kms) || !empty($kleur) || !empty($bs) || !empty($bj) || !empty($el)){
				if(($bieden2 === "Nee" && !empty($prijs2)) || $bieden2 === "Ja"){
					//if(preg_match('/^\d+\.\d+$/', $prijs2)){
						if($auto_prijs === "12,50" || $auto_prijs === "17,50" || $auto_prijs === "25,00"){
							
							
if(!empty($top2) || !empty($dagtop2) || !empty($website2) || $auto_prijs === "auto"){
	$eindbedragvandeonzin = 0;
	if(!empty($top2)){ $eindbedragvandeonzin += 15; }
	if(!empty($dagtop2)){ $eindbedragvandeonzin += 10; }
	if(!empty($website2)){ $eindbedragvandeonzin += 7; }
	
	if($type1 === "auto"){
		$eindbedragvandeonzin += $auto_prijs;
	}
	
	?>
	<div class="betaalmijgeld">
		<div class="betaalmijgeldinner">
		Uw advertentie kost: <?php echo $eindbedragvandeonzin; ?> euro. <br>
			<div class="betaalknop">
				<p class="action-button animate blue buttonbetaalbutton"><span class="fa fa-paypal"></span> Betalen</p>
			</div>
		</div>
	</div>
	<?php
}
							
							
	if($top2 === "on"){
		$top2 = "Ja";
	} else { $top2 = "Nee"; }
	if($dagtop2 === "on"){
		$dagtop2 = "Ja";
	} else { $dagtop2 = "Nee"; }
							
	global $conn;

	date_default_timezone_set('Europe/Amsterdam');
	$date = date('Y-m-d H:i:s', time());

	$statement = $conn->prepare("
	INSERT INTO advertenties
	(UserID,TypeID,Prijs,Omschrijving,Bieden,Datum,Titel,Conditie,Website,Levering,Topadvertentie,Dagtopper)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, :n12)");
	$statement->execute(array(
	"n1" => "".$_SESSION['UserID']."",
	"n2" => "1",
	"n3" => "".$prijs2."",
	"n4" => "".$omschrijving2."",
	"n5" => "".$bieden2."",
	"n6" => "".$date."",
	"n7" => "".$title1."",
	"n8" => "".$conditie1."",
	"n9" => "".$website2."",
	"n10" => "".$verzenden2."",
	"n11" => "".$top2."",
	"n12" => "".$dagtop2.""
	));
	
	$last_id = $conn->lastInsertId();
	
	$statement2 = $conn->prepare("
	INSERT INTO type_auto
	(Merk,Type,Kilometerstand,Kleur,Brandstof,Bouwjaar,Energielabel,AdvertentiePrijs,AdvertentieID)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9)");
	$statement2->execute(array(
	"n1" => "".$merk."",
	"n2" => "".$type."",
	"n3" => "".$kms."",
	"n4" => "".$kleur."",
	"n5" => "".$bs."",
	"n6" => "".$bj."",
	"n7" => "".$el."",
	"n8" => "".$auto_prijs."",
	"n9" => "".$last_id.""
	));
	
	echo "Uw advertentie is toegevoegd! <br>";
	$aduploaded = "true";
	
						}
						else{
							echo "Geen geldige advertentie prijs opgegeven!  <br>";
						}
					//}
					//else{
					//	echo "Geen geldige prijs opgegeven!  <span class='hint'>(Gebruik een punt, geen komma!)</span><br>";
					//}
				}
				else{
					echo "Er moet een prijs worden ingevuld! <br>";
				}
			}
			else{
				echo "U moet wat informatie over uw auto geven! <br>";
			}
		}
		else{
			echo "U moet een title en conditie hebben! <br>";
		} 
	}
		
	function plaatsad_pc($type1, $title1, $conditie1, 
	$merk, $type, $ram, $opslag, $processor, $display,
	$omschrijving2, $website2, $bieden2, $prijs2, $verzenden2, $top2, $dagtop2)
	{
		//$prijs2 = number_format($prijs2, 2);
		if(!empty($type1) && !empty($title1) && !empty($conditie1)){
			if(!empty($merk) || !empty($type) || !empty($ram) || !empty($opslag) || !empty($processor) || !empty($display)){
				if(($bieden2 === "Nee" && !empty($prijs2)) || $bieden2 === "Ja"){
					//if(preg_match('/[^0-9]/',$prijs2)){
	
	
							
if(!empty($top2) || !empty($dagtop2) || !empty($website2) ){
	$eindbedragvandeonzin = 0;
	if(!empty($top2)){ $eindbedragvandeonzin += 15; }
	if(!empty($dagtop2)){ $eindbedragvandeonzin += 10; }
	if(!empty($website2)){ $eindbedragvandeonzin += 7; }

	?>
	<div class="betaalmijgeld">
		<div class="betaalmijgeldinner">
		Uw advertentie kost: <?php echo $eindbedragvandeonzin; ?> euro. <br>
			<div class="betaalknop">
				<p class="action-button animate blue buttonbetaalbutton"><span class="fa fa-paypal"></span> Betalen</p>
			</div>
		</div>
	</div>
	<?php
}	
	
	if($top2 === "on"){
		$top2 = "Ja";
	} else { $top2 = "Nee"; }
	if($dagtop2 === "on"){
		$dagtop2 = "Ja";
	} else { $dagtop2 = "Nee"; }
							
	global $conn;

	date_default_timezone_set('Europe/Amsterdam');
	$date = date('Y-m-d H:i:s', time());

	$statement = $conn->prepare("
	INSERT INTO advertenties
	(UserID,TypeID,Prijs,Omschrijving,Bieden,Datum,Titel,Conditie,Website,Levering,Topadvertentie,Dagtopper)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, :n12)");
	$statement->execute(array(
	"n1" => "".$_SESSION['UserID']."",
	"n2" => "2",
	"n3" => "".$prijs2."",
	"n4" => "".$omschrijving2."",
	"n5" => "".$bieden2."",
	"n6" => "".$date."",
	"n7" => "".$title1."",
	"n8" => "".$conditie1."",
	"n9" => "".$website2."",
	"n10" => "".$verzenden2."",
	"n11" => "".$top2."",
	"n12" => "".$dagtop2.""
	));
	
	$last_id = $conn->lastInsertId();
	
	$statement2 = $conn->prepare("
	INSERT INTO type_pc
	(Merk,Type,RAM,Opslagcapaciteit,Processor,Display,AdvertentieID)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7)");
	$statement2->execute(array(
	"n1" => "".$merk."",
	"n2" => "".$type."",
	"n3" => "".$ram."",
	"n4" => "".$opslag."",
	"n5" => "".$processor."",
	"n6" => "".$display."",
	"n7" => "".$last_id.""
	));
	
	echo "Uw advertentie is toegevoegd! <br>";
	$aduploaded = "true";
	
					//}
					//else{
					//	echo "Geen geldige prijs opgegeven! <br>";
					//}
				}
				else{
					echo "Er moet een prijs worden ingevuld! <br>";
				}
			}
			else{
				echo "U moet wat informatie over uw auto geven! <br>";
			}
		}
		else{
			echo "U moet een title en conditie hebben! <br>";
		} 
	}		
	
	function plaatsad_sp($type1, $title1, $conditie1, 
	$merk, $type, $bs, $opslag, $camera, $display,
	$omschrijving2, $website2, $bieden2, $prijs2, $verzenden2, $top2, $dagtop2)
	{
		//$prijs2 = number_format($prijs2, 2);
		if(!empty($type1) && !empty($title1) && !empty($conditie1)){
			if(!empty($merk) || !empty($type) || !empty($bs) || !empty($opslag) || !empty($camera) || !empty($display)){
				if(($bieden2 === "Nee" && !empty($prijs2)) || $bieden2 === "Ja"){
					//if(preg_match('/[^0-9]/',$prijs2)){
						
						
							
if(!empty($top2) || !empty($dagtop2) || !empty($website2) ){
	$eindbedragvandeonzin = 0;
	if(!empty($top2)){ $eindbedragvandeonzin += 15; }
	if(!empty($dagtop2)){ $eindbedragvandeonzin += 10; }
	if(!empty($website2)){ $eindbedragvandeonzin += 7; }
	
	?>
	<div class="betaalmijgeld">
		<div class="betaalmijgeldinner">
		Uw advertentie kost: <?php echo $eindbedragvandeonzin; ?> euro. <br>
			<div class="betaalknop">
				<p class="action-button animate blue buttonbetaalbutton"><span class="fa fa-paypal"></span> Betalen</p>
			</div>
		</div>
	</div>
	<?php
}
						
	if($top2 === "on"){
		$top2 = "Ja";
	} else { $top2 = "Nee"; }
	if($dagtop2 === "on"){
		$dagtop2 = "Ja";
	} else { $dagtop2 = "Nee"; }	
							
	global $conn;

	date_default_timezone_set('Europe/Amsterdam');
	$date = date('Y-m-d H:i:s', time());

	$statement = $conn->prepare("
	INSERT INTO advertenties
	(UserID,TypeID,Prijs,Omschrijving,Bieden,Datum,Titel,Conditie,Website,Levering,Topadvertentie,Dagtopper)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, :n12)");
	$statement->execute(array(
	"n1" => "".$_SESSION['UserID']."",
	"n2" => "3",
	"n3" => "".$prijs2."",
	"n4" => "".$omschrijving2."",
	"n5" => "".$bieden2."",
	"n6" => "".$date."",
	"n7" => "".$title1."",
	"n8" => "".$conditie1."",
	"n9" => "".$website2."",
	"n10" => "".$verzenden2."",
	"n11" => "".$top2."",
	"n12" => "".$dagtop2.""
	));
	
	$last_id = $conn->lastInsertId();
	
	$statement2 = $conn->prepare("
	INSERT INTO type_smartphone
	(Merk,Type,Besturingssysteem,Opslagcapaciteit,Camera,Display,AdvertentieID)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7)");
	$statement2->execute(array(
	"n1" => "".$merk."",
	"n2" => "".$type."",
	"n3" => "".$bs."",
	"n4" => "".$opslag."",
	"n5" => "".$camera."",
	"n6" => "".$display."",
	"n7" => "".$last_id.""
	));
	
	echo "Uw advertentie is toegevoegd! <br>";
	$aduploaded = "true";
	
					//}
					//else{
					//	echo "Geen geldige prijs opgegeven! <br>";
					//}
				}
				else{
					echo "Er moet een prijs worden ingevuld! <br>";
				}
			}
			else{
				echo "U moet wat informatie over uw auto geven! <br>";
			}
		}
		else{
			echo "U moet een title en conditie hebben! <br>";
		} 
	}
		
	function plaatsad_tablet($type1, $title1, $conditie1, 
	$merk, $type, $bs, $opslag, $camera, $display,
	$omschrijving2, $website2, $bieden2, $prijs2, $verzenden2, $top2, $dagtop2)
	{
		//$prijs2 = number_format($prijs2, 2);
		if(!empty($type1) && !empty($title1) && !empty($conditie1)){
			if(!empty($merk) || !empty($type) || !empty($bs) || !empty($opslag) || !empty($camera) || !empty($display)){
				if(($bieden2 === "Nee" && !empty($prijs2)) || $bieden2 === "Ja"){
					//if(preg_match('/[^0-9]/',$prijs2)){
						
						
							
if(!empty($top2) || !empty($dagtop2) || !empty($website2) ){
	$eindbedragvandeonzin = 0;
	if(!empty($top2)){ $eindbedragvandeonzin += 15; }
	if(!empty($dagtop2)){ $eindbedragvandeonzin += 10; }
	if(!empty($website2)){ $eindbedragvandeonzin += 7; }
	
	?>
	<div class="betaalmijgeld">
		<div class="betaalmijgeldinner">
		Uw advertentie kost: <?php echo $eindbedragvandeonzin; ?> euro. <br>
			<div class="betaalknop">
				<p class="action-button animate blue buttonbetaalbutton"><span class="fa fa-paypal"></span> Betalen</p>
			</div>
		</div>
	</div>
	<?php
}
						
	if($top2 === "on"){
		$top2 = "Ja";
	} else { $top2 = "Nee"; }
	if($dagtop2 === "on"){
		$dagtop2 = "Ja";
	} else { $dagtop2 = "Nee"; }
							
	global $conn;

	date_default_timezone_set('Europe/Amsterdam');
	$date = date('Y-m-d H:i:s', time());

	$statement = $conn->prepare("
	INSERT INTO advertenties
	(UserID,TypeID,Prijs,Omschrijving,Bieden,Datum,Titel,Conditie,Website,Levering,Topadvertentie,Dagtopper)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, :n12)");
	$statement->execute(array(
	"n1" => "".$_SESSION['UserID']."",
	"n2" => "4",
	"n3" => "".$prijs2."",
	"n4" => "".$omschrijving2."",
	"n5" => "".$bieden2."",
	"n6" => "".$date."",
	"n7" => "".$title1."",
	"n8" => "".$conditie1."",
	"n9" => "".$website2."",
	"n10" => "".$verzenden2."",
	"n11" => "".$top2."",
	"n12" => "".$dagtop2.""
	));
	
	$last_id = $conn->lastInsertId();
	
	$statement2 = $conn->prepare("
	INSERT INTO type_tablet
	(Merk,Type,Besturingssysteem,Opslagcapaciteit,Camera,Display,AdvertentieID)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7)");
	$statement2->execute(array(
	"n1" => "".$merk."",
	"n2" => "".$type."",
	"n3" => "".$bs."",
	"n4" => "".$opslag."",
	"n5" => "".$camera."",
	"n6" => "".$display."",
	"n7" => "".$last_id.""
	));
	
	echo "Uw advertentie is toegevoegd! <br>";
	$aduploaded = "true";
	
					//}
					//else{
					//	echo "Geen geldige prijs opgegeven! <br>";
					//}
				}
				else{
					echo "Er moet een prijs worden ingevuld! <br>";
				}
			}
			else{
				echo "U moet wat informatie over uw auto geven! <br>";
			}
		}
		else{
			echo "U moet een title en conditie hebben! <br>";
		} 
	}
		
	function plaatsad_tv($type1, $title1, $conditie1, 
	$merk, $type, $hd, $led, $display,
	$omschrijving2, $website2, $bieden2, $prijs2, $verzenden2, $top2, $dagtop2)
	{
		//$prijs2 = number_format($prijs2, 2);
		if(!empty($type1) && !empty($title1) && !empty($conditie1)){
			if(!empty($merk) || !empty($type) || !empty($hd) || !empty($led) || !empty($display)){
				if(($bieden2 === "Nee" && !empty($prijs2)) || $bieden2 === "Ja"){
					//if(preg_match('/[^0-9]/',$prijs2)){
						
						
							
if(!empty($top2) || !empty($dagtop2) || !empty($website2) ){
	$eindbedragvandeonzin = 0;
	if(!empty($top2)){ $eindbedragvandeonzin += 15; }
	if(!empty($dagtop2)){ $eindbedragvandeonzin += 10; }
	if(!empty($website2)){ $eindbedragvandeonzin += 7; }
	
	?>
	<div class="betaalmijgeld">
		<div class="betaalmijgeldinner">
		Uw advertentie kost: <?php echo $eindbedragvandeonzin; ?> euro. <br>
			<div class="betaalknop">
				<p class="action-button animate blue buttonbetaalbutton"><span class="fa fa-paypal"></span> Betalen</p>
			</div>
		</div>
	</div>
	<?php
}

						
	if($top2 === "on"){
		$top2 = "Ja";
	} else { $top2 = "Nee"; }
	if($dagtop2 === "on"){
		$dagtop2 = "Ja";
	} else { $dagtop2 = "Nee"; }	
							
	global $conn;

	date_default_timezone_set('Europe/Amsterdam');
	$date = date('Y-m-d H:i:s', time());

	$statement = $conn->prepare("
	INSERT INTO advertenties
	(UserID,TypeID,Prijs,Omschrijving,Bieden,Datum,Titel,Conditie,Website,Levering,Topadvertentie,Dagtopper)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, :n12)");
	$statement->execute(array(
	"n1" => "".$_SESSION['UserID']."",
	"n2" => "5",
	"n3" => "".$prijs2."",
	"n4" => "".$omschrijving2."",
	"n5" => "".$bieden2."",
	"n6" => "".$date."",
	"n7" => "".$title1."",
	"n8" => "".$conditie1."",
	"n9" => "".$website2."",
	"n10" => "".$verzenden2."",
	"n11" => "".$top2."",
	"n12" => "".$dagtop2.""
	));
	
	$last_id = $conn->lastInsertId();
	
	$statement2 = $conn->prepare("
	INSERT INTO type_tv
	(Merk,Type,HD,LED,Display,AdvertentieID)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6)");
	$statement2->execute(array(
	"n1" => "".$merk."",
	"n2" => "".$type."",
	"n3" => "".$hd."",
	"n4" => "".$led."",
	"n5" => "".$display."",
	"n6" => "".$last_id.""
	));
	
	echo "Uw advertentie is toegevoegd! <br>";
	$aduploaded = "true";
	
					//}
					//else{
					//	echo "Geen geldige prijs opgegeven! <br>";
					//}
				}
				else{
					echo "Er moet een prijs worden ingevuld! <br>";
				}
			}
			else{
				echo "U moet wat informatie over uw auto geven! <br>";
			}
		}
		else{
			echo "U moet een title en conditie hebben! <br>";
		} 
	}
		
	function plaatsad_wm($type1, $title1, $conditie1, 
	$merk, $type, $inhoud, $hoogte, $toeren, $ek,
	$omschrijving2, $website2, $bieden2, $prijs2, $verzenden2, $top2, $dagtop2)
	{
		//$prijs2 = number_format($prijs2, 2);
		if(!empty($type1) && !empty($title1) && !empty($conditie1)){
			if(!empty($merk) || !empty($type) || !empty($inhoud) || !empty($hoogte) || !empty($toeren) || !empty($ek)){
				if(($bieden2 === "Nee" && !empty($prijs2)) || $bieden2 === "Ja"){
					//if(preg_match('/[^0-9]/',$prijs2)){
						
						
						
							
if(!empty($top2) || !empty($dagtop2) || !empty($website2) ){
	$eindbedragvandeonzin = 0;
	if(!empty($top2)){ $eindbedragvandeonzin += 15; }
	if(!empty($dagtop2)){ $eindbedragvandeonzin += 10; }
	if(!empty($website2)){ $eindbedragvandeonzin += 7; }
	
	?>
	<div class="betaalmijgeld">
		<div class="betaalmijgeldinner">
		Uw advertentie kost: <?php echo $eindbedragvandeonzin; ?> euro. <br>
			<div class="betaalknop">
				<p class="action-button animate blue buttonbetaalbutton"><span class="fa fa-paypal"></span> Betalen</p>
			</div>
		</div>
	</div>
	<?php
}
						
						
	if($top2 === "on"){
		$top2 = "Ja";
	} else { $top2 = "Nee"; }
	if($dagtop2 === "on"){
		$dagtop2 = "Ja";
	} else { $dagtop2 = "Nee"; }	
							
	global $conn;

	date_default_timezone_set('Europe/Amsterdam');
	$date = date('Y-m-d H:i:s', time());

	$statement = $conn->prepare("
	INSERT INTO advertenties
	(UserID,TypeID,Prijs,Omschrijving,Bieden,Datum,Titel,Conditie,Website,Levering,Topadvertentie,Dagtopper)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, :n9, :n10, :n11, :n12)");
	$statement->execute(array(
	"n1" => "".$_SESSION['UserID']."",
	"n2" => "6",
	"n3" => "".$prijs2."",
	"n4" => "".$omschrijving2."",
	"n5" => "".$bieden2."",
	"n6" => "".$date."",
	"n7" => "".$title1."",
	"n8" => "".$conditie1."",
	"n9" => "".$website2."",
	"n10" => "".$verzenden2."",
	"n11" => "".$top2."",
	"n12" => "".$dagtop2.""
	));
	
	$last_id = $conn->lastInsertId();
	
	$statement2 = $conn->prepare("
	INSERT INTO type_wasmachine
	(Merk,Type,Inhoud,Hoogte,Toeren,Energieklasse,AdvertentieID)
	VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7)");
	$statement2->execute(array(
	"n1" => "".$merk."",
	"n2" => "".$type."",
	"n3" => "".$inhoud."",
	"n4" => "".$hoogte."",
	"n5" => "".$toeren."",
	"n6" => "".$ek."",
	"n7" => "".$last_id.""
	));
	
	echo "Uw advertentie is toegevoegd! <br>";
	$aduploaded = "true";
	
					//}
					//else{
					//	echo "Geen geldige prijs opgegeven! <br>";
					//}
				}
				else{
					echo "Er moet een prijs worden ingevuld! <br>";
				}
			}
			else{
				echo "U moet wat informatie over uw auto geven! <br>";
			}
		}
		else{
			echo "U moet een title en conditie hebben! <br>";
		} 
	}
	
	/*-bewerken ads-*/
	function edit_ad_auto(
	$Prijs, $Omschrijving, $Bieden, $Datum, $Bekeken, $Favorieten, $Titel, $Conditie, $Website, $Levering, $Topadvertentie, $Dagtopper,
	$auto_Merk, $auto_Type, $auto_Kms, $auto_Kleur, $auto_Brandstof, $auto_Bouwjaar, $auto_El,
	$id
	)
	{
		if(!empty($Prijs) && !empty($Omschrijving) && !empty($Bieden) && !empty($Datum) && !empty($Titel) && !empty($Conditie) && !empty($Levering)){
			global $conn;		
			$sql = "UPDATE advertenties 
					SET Prijs='".$Prijs."',
						Omschrijving='".$Omschrijving."',
						Bieden='".$Bieden."',
						Titel='".$Titel."',
						Conditie='".$Conditie."',
						Levering='".$Levering."'
					WHERE AdvertentieID=".$id." ";

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			$sql2 = "UPDATE type_auto 
					SET Merk='".$auto_Merk."',
						Type='".$auto_Type."',
						Kilometerstand='".$auto_Kms."',
						Kleur='".$auto_Kleur."',
						Brandstof='".$auto_Brandstof."',
						Bouwjaar='".$auto_Bouwjaar."',
						Energielabel='".$auto_El."'
					WHERE AdvertentieID=".$id." ";

			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
			
			echo "Gegevens bewerkt!";
		}
		else{
			echo 'Alle basis velden moeten worden ingevuld!';
		}
	}
		
	function edit_ad_pc(
	$Prijs, $Omschrijving, $Bieden, $Datum, $Bekeken, $Favorieten, $Titel, $Conditie, $Website, $Levering, $Topadvertentie, $Dagtopper,
	$pc_Merk, $pc_Type, $pc_RAM, $pc_Opslagcapaciteit, $pc_Processor, $pc_Display, 
	$id
	)
	{
		if(!empty($Prijs) && !empty($Omschrijving) && !empty($Bieden) && !empty($Datum) && !empty($Titel) && !empty($Conditie) && !empty($Levering)){
			global $conn;		
			$sql = "UPDATE advertenties 
					SET Prijs='".$Prijs."',
						Omschrijving='".$Omschrijving."',
						Bieden='".$Bieden."',
						Titel='".$Titel."',
						Conditie='".$Conditie."',
						Levering='".$Levering."'
					WHERE AdvertentieID=".$id." ";

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			$sql2 = "UPDATE type_pc 
					SET Merk='".$pc_Merk."',
						Type='".$pc_Type."',
						RAM='".$pc_RAM."',
						Opslagcapaciteit='".$pc_Opslagcapaciteit."',
						Processor='".$pc_Processor."',
						Display='".$pc_Display."'
					WHERE AdvertentieID=".$id." ";

			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
			
			echo "Gegevens bewerkt!";
		}
		else{
			echo 'Alle basis velden moeten worden ingevuld!';
		}
	}
		
	function edit_ad_sp(
	$Prijs, $Omschrijving, $Bieden, $Datum, $Bekeken, $Favorieten, $Titel, $Conditie, $Website, $Levering, $Topadvertentie, $Dagtopper,
	$sp_Merk, $sp_Type, $sp_Besturingssysteem, $sp_Opslagcapaciteit, $sp_Camera, $sp_Display, 
	$id
	)
	{
		if(!empty($Prijs) && !empty($Omschrijving) && !empty($Bieden) && !empty($Datum) && !empty($Titel) && !empty($Conditie) && !empty($Levering)){
			global $conn;		
			$sql = "UPDATE advertenties 
					SET Prijs='".$Prijs."',
						Omschrijving='".$Omschrijving."',
						Bieden='".$Bieden."',
						Titel='".$Titel."',
						Conditie='".$Conditie."',
						Levering='".$Levering."'
					WHERE AdvertentieID=".$id." ";

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			$sql2 = "UPDATE type_smartphone 
					SET Merk='".$sp_Merk."',
						Type='".$sp_Type."',
						Besturingssysteem='".$sp_Besturingssysteem."',
						Opslagcapaciteit='".$sp_Opslagcapaciteit."',
						Camera='".$sp_Camera."',
						Display='".$sp_Display."'
					WHERE AdvertentieID=".$id." ";

			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
			
			echo "Gegevens bewerkt!";
		}
		else{
			echo 'Alle basis velden moeten worden ingevuld!';
		}
	}
		
	function edit_ad_tablet(
	$Prijs, $Omschrijving, $Bieden, $Datum, $Bekeken, $Favorieten, $Titel, $Conditie, $Website, $Levering, $Topadvertentie, $Dagtopper,
	$tablet_Merk, $tablet_Type, $tablet_Besturingssysteem, $tablet_Opslagcapaciteit, $tablet_Camera, $tablet_Display, 
	$id
	)
	{
		if(!empty($Prijs) && !empty($Omschrijving) && !empty($Bieden) && !empty($Datum) && !empty($Titel) && !empty($Conditie) && !empty($Levering)){
			global $conn;		
			$sql = "UPDATE advertenties 
					SET Prijs='".$Prijs."',
						Omschrijving='".$Omschrijving."',
						Bieden='".$Bieden."',
						Titel='".$Titel."',
						Conditie='".$Conditie."',
						Levering='".$Levering."'
					WHERE AdvertentieID=".$id." ";

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			$sql2 = "UPDATE type_tablet
					SET Merk='".$tablet_Merk."',
						Type='".$tablet_Type."',
						Besturingssysteem='".$tablet_Besturingssysteem."',
						Opslagcapaciteit='".$tablet_Opslagcapaciteit."',
						Camera='".$tablet_Camera."',
						Display='".$tablet_Display."'
					WHERE AdvertentieID=".$id." ";

			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
			
			echo "Gegevens bewerkt!";
		}
		else{
			echo 'Alle basis velden moeten worden ingevuld!';
		}
	}
	
	function edit_ad_tv(
	$Prijs, $Omschrijving, $Bieden, $Datum, $Bekeken, $Favorieten, $Titel, $Conditie, $Website, $Levering, $Topadvertentie, $Dagtopper,
	$tv_Merk, $tv_Type, $tv_HD, $tv_LED, $tv_Display, 
	$id
	)
	{
		if(!empty($Prijs) && !empty($Omschrijving) && !empty($Bieden) && !empty($Datum) && !empty($Titel) && !empty($Conditie) && !empty($Levering)){
			global $conn;		
			$sql = "UPDATE advertenties 
					SET Prijs='".$Prijs."',
						Omschrijving='".$Omschrijving."',
						Bieden='".$Bieden."',
						Titel='".$Titel."',
						Conditie='".$Conditie."',
						Levering='".$Levering."'
					WHERE AdvertentieID=".$id." ";

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			$sql2 = "UPDATE type_tv
					SET Merk='".$tv_Merk."',
						Type='".$tv_Type."',
						HD='".$tv_HD."',
						LED='".$tv_LED."',
						Display='".$tv_Display."'
					WHERE AdvertentieID=".$id." ";

			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
			
			echo "Gegevens bewerkt!";
		}
		else{
			echo 'Alle basis velden moeten worden ingevuld!';
		}
	}
	
	function edit_ad_wm(
	$Prijs, $Omschrijving, $Bieden, $Datum, $Bekeken, $Favorieten, $Titel, $Conditie, $Website, $Levering, $Topadvertentie, $Dagtopper,
	$wm_Merk, $wm_Type, $wm_Inhoud, $wm_Hoogte, $wm_Toeren,  $wm_Energieklasse,
	$id
	)
	{
		if(!empty($Prijs) && !empty($Omschrijving) && !empty($Bieden) && !empty($Datum) && !empty($Titel) && !empty($Conditie) && !empty($Levering)){
			global $conn;		
			$sql = "UPDATE advertenties 
					SET Prijs='".$Prijs."',
						Omschrijving='".$Omschrijving."',
						Bieden='".$Bieden."',
						Titel='".$Titel."',
						Conditie='".$Conditie."',
						Levering='".$Levering."'
					WHERE AdvertentieID=".$id." ";

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			$sql2 = "UPDATE type_wasmachine
					SET Merk='".$wm_Merk."',
						Type='".$wm_Type."',
						Inhoud='".$wm_Inhoud."',
						Hoogte='".$wm_Hoogte."',
						Toeren='".$wm_Toeren."',
						Energieklasse='".$wm_Energieklasse."'
					WHERE AdvertentieID=".$id." ";

			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
			
			echo "Gegevens bewerkt!";
		}
		else{
			echo 'Alle basis velden moeten worden ingevuld!';
		}
	}
	
}
?>