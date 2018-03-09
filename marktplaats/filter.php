<?php
		if(isset($_GET['r']) && isset($_GET['s']) && isset($_GET['t'])){
			$search_term = $_GET['r'];
			$search_type = $_GET['s'];
			$search_checked = $_GET['t'];
		}
		
		$search_query = "
						SELECT *
						FROM
						";	
		
		$search_query .= " advertenties, type_".$search_type." WHERE ";
		
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
							<a href="categorie/<?php echo $search_type."/".$row['AdvertentieID']; ?>">

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
	
	?>