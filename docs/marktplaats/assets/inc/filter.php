					<ul class="sort_nav">
						
   <div class="filterkopje left">
    Filter resultaten
   </div>
						<?php 
						if(isset($_POST['search_select'])){
							$realtype = "type_".$_POST['search_select'];
							$realtype2 = $_POST['search_select'];
						}
						else if(isset($_GET['s'])){
							$realtype = "type_".$_GET['s'];
							$realtype2 = $_GET['s'];
						}
						else{
							$realtype = "type_".$_GET['cat'];
							$realtype2 = $_GET['cat'];
						}
						
						
						?> 
						
<div class='left sidebar '>
   <div class="filtercontent left">
    Prijs (Euro's) <br>
    <form method="post" action="" class="prijsform" style="margin-left:1px;">
     <input type="hidden" name="type_type" value="<?php echo $realtype2; ?>" > 

     <input class="left prijsminmax" type="text" name="prijsa" placeholder="Van" required>
     tot
     <input class="left prijsminmax" type="text" name="prijsb" placeholder="tot" required> 
     <input type="submit" value="Ga" class="prijsga" />
    </form>
    
	
    <!-- filter checkboxen -->
    <form method="post" action="" class="left">
     <input type="hidden" name="type_type" value="<?php echo $realtype2; ?>" > 
     <br>Merk<br>
     <?php
     $query = 'SELECT Merk
       FROM '.$realtype.' 
       GROUP BY Merk
       ';
      
	  $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $merken     = $row["Merk"];
		if(!empty($merken)){
      ?>
      <input class="checkboxfilter" type="checkbox" name="merk[]" value="<?php echo $merken; ?>" > 
      <span class="weight400"><?php echo $merken; ?></span><br>
      <?php
		}
     }
     ?>
     <br>Type<br>
     <?php
     $query = 'SELECT Type
       FROM '.$realtype.'  
       GROUP BY Type 
       ';
      
     $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $RAM     = $row["Type"];
		if(!empty($RAM)){
      ?>
      <input class="checkboxfilter" type="checkbox" name="RAM[]" value="<?php echo $RAM; ?>" > 
      <span class="weight400"><?php echo $RAM; ?> </span><br>
      <?php
		}
     }
     ?>
     <?php if($realtype === "type_auto"){?>
	 <br>Kilometerstand<br>
     <?php
     $query = 'SELECT Kilometerstand
       FROM '.$realtype.' 
       GROUP BY Kilometerstand 
       ';
       
     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $schermgrootte     = $row["Kilometerstand"];
      
		if(!empty($schermgrootte)){
		  if($schermgrootte <= 15000){
		   $a++;
		  }
		  else if($schermgrootte >= 15001 && $schermgrootte <= 50000){
		   $b++;
		  }
		  else if($schermgrootte >= 50001 && $schermgrootte <= 100000){
		   $c++;
		  }
		  else if($schermgrootte >= 100001){
		   $d++;
		  }
      }
     }
     if($a !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="1" > 
      <span class="weight400"> < 15.000KM </span><br>
      <?php
     }
     if($b !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="2" > 
      <span class="weight400"> 15.000KM - 50.000KM </span><br>
      <?php
     }
     if($c !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="3" > 
      <span class="weight400"> 50.000KM - 100.000KM </span><br>
      <?php
     }
     if($d !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="4" > 
      <span class="weight400"> > 100.000KM </span><br>
      <?php
     }
     ?>	
	 <br>Bouwjaar<br>
     <?php
     $query = 'SELECT Bouwjaar
       FROM '.$realtype.' 
       GROUP BY Bouwjaar 
       ';
       
     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $Bouwjaar     = $row["Bouwjaar"];
      
		if(!empty($Bouwjaar)){
		  if($Bouwjaar <= 1960){
		   $a++;
		  }
		  else if($Bouwjaar >= 1961 && $Bouwjaar <= 1980){
		   $b++;
		  }
		  else if($Bouwjaar >= 1981 && $Bouwjaar <= 2000){
		   $c++;
		  }
		  else if($Bouwjaar >= 2001){
		   $d++;
		  }
      }
     }
     if($a !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="1" > 
      <span class="weight400"> < 1960 </span><br>
      <?php
     }
     if($b !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="2" > 
      <span class="weight400"> 1961 - 1980 </span><br>
      <?php
     }
     if($c !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="3" > 
      <span class="weight400"> 1981 - 2000 </span><br>
      <?php
     }
     if($d !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="4" > 
      <span class="weight400"> > 2001 </span><br>
      <?php
     }
     ?>	
     <br>Kleur<br>
     <?php
     $query = 'SELECT Kleur
       FROM '.$realtype.' 
       GROUP BY Kleur
       ';
      
	  $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $merken     = $row["Kleur"];
		if(!empty($merken)){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="<?php echo $merken; ?>" > 
      <span class="weight400"><?php echo $merken; ?></span><br>
      <?php
		}
     }
     ?>		
     <br>Brandstof<br>
     <?php
     $query = 'SELECT Brandstof
       FROM '.$realtype.' 
       GROUP BY Brandstof
       ';
      
	  $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $merken     = $row["Brandstof"];
		if(!empty($merken)){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="<?php echo $merken; ?>" > 
      <span class="weight400"><?php echo $merken; ?></span><br>
      <?php
		}
     }
     }
	 else if($realtype === "type_pc"){
     ?>	
	 <br>RAM<br>
     <?php
     $query = 'SELECT RAM
       FROM '.$realtype.' 
       GROUP BY RAM 
       ';
       
     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $schermgrootte     = $row["RAM"];
      
		if(!empty($schermgrootte)){
		  if($schermgrootte === 1){
		   $a++;
		  }
		  else if($schermgrootte == 2){
		   $b++;
		  }
		  else if($schermgrootte == 3){
		   $c++;
		  }
		  else if($schermgrootte >= 4){
		   $d++;
		  }
      }
     }
     if($a !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="1" > 
      <span class="weight400"> 1GB </span><br>
      <?php
     }
     if($b !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="2" > 
      <span class="weight400"> 2GB </span><br>
      <?php
     }
     if($c !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="3" > 
      <span class="weight400"> 3GB </span><br>
      <?php
     }
     if($d !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="4" > 
      <span class="weight400"> > 4GB </span><br>
      <?php
     }
	 
     ?>	
	 <br>Opslagcapaciteit<br>
     <?php
     $query = 'SELECT Opslagcapaciteit
       FROM '.$realtype.' 
       GROUP BY Opslagcapaciteit 
       ';
       
     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $schermgrootte     = $row["Opslagcapaciteit"];
      
		if(!empty($schermgrootte)){
		  if($schermgrootte < 8){
		   $a++;
		  }
		  else if($schermgrootte == 8){
		   $b++;
		  }
		  else if($schermgrootte == 16){
		   $c++;
		  }
		  else if($schermgrootte == 32){
		   $d++;
		  }
		  else if($schermgrootte >= 64){
		   $e++;
		  }
      }
     }
     if($a !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="1" > 
      <span class="weight400"> > 8GB </span><br>
      <?php
     }
     if($b !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="2" > 
      <span class="weight400"> 8GB </span><br>
      <?php
     }
     if($c !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="3" > 
      <span class="weight400"> 16GB </span><br>
      <?php
     }
     if($d !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="4" > 
      <span class="weight400"> 32GB </span><br>
      <?php
     }
     if($e !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="5" > 
      <span class="weight400"> 64GB + </span><br>
      <?php
     }
     ?>	
     <br>Processor<br>
     <?php
     $query = 'SELECT Processor
       FROM '.$realtype.' 
       GROUP BY Processor
       ';
      
	  $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $merken     = $row["Processor"];
		if(!empty($merken)){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="<?php echo $merken; ?>" > 
      <span class="weight400"><?php echo $merken; ?></span><br>
      <?php
		}
     }
	 ?>
     <br>Display<br>
	 <?php

     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $query = 'SELECT Display
       FROM '.$realtype.' 
       GROUP BY Display
       ';
      
	  $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $schermgrootte     = $row["Display"];
      
      if($schermgrootte <= 15){
       $a++;
      }
      else if($schermgrootte >= 15.1 && $schermgrootte <= 17){
       $b++;
      }
      else if($schermgrootte >= 17.1 && $schermgrootte <= 21){
       $c++;
      }
      else if($schermgrootte >= 21.1){
       $d++;
      }
     }
     if($a !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="1" > 
      <span class="weight400"> < 15" </span><br>
      <?php
     }
     if($b !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="2" > 
      <span class="weight400"> 15.1" - 17" </span><br>
      <?php
     }
     if($c !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="3" > 
      <span class="weight400"> 17.1" - 21" </span><br>
      <?php
     }
     if($d !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="4" > 
      <span class="weight400"> > 21.1" </span><br>
      <?php
     }
	 }
	 else if($realtype === "type_smartphone" || $realtype === "type_tablet"){ 
     ?>	
     <br>Besturingssysteem<br>
     <?php
     $query = 'SELECT Besturingssysteem
       FROM '.$realtype.' 
       GROUP BY Besturingssysteem
       ';
      
	  $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $merken     = $row["Besturingssysteem"];
		if(!empty($merken)){
      ?>
      <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="<?php echo $merken; ?>" > 
      <span class="weight400"><?php echo $merken; ?></span><br>
      <?php
		}
     }
	 ?>  
	 <br>Opslagcapaciteit<br>
     <?php
     $query = 'SELECT Opslagcapaciteit
       FROM '.$realtype.' 
       GROUP BY Opslagcapaciteit 
       ';
       
     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $schermgrootte     = $row["Opslagcapaciteit"];
      
		if(!empty($schermgrootte)){
		  if($schermgrootte < 8){
		   $a++;
		  }
		  else if($schermgrootte == 8){
		   $b++;
		  }
		  else if($schermgrootte == 16){
		   $c++;
		  }
		  else if($schermgrootte == 32){
		   $d++;
		  }
		  else if($schermgrootte >= 64){
		   $e++;
		  }
      }
     }
     if($a !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="1" > 
      <span class="weight400"> > 8GB </span><br>
      <?php
     }
     if($b !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="2" > 
      <span class="weight400"> 8GB </span><br>
      <?php
     }
     if($c !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="3" > 
      <span class="weight400"> 16GB </span><br>
      <?php
     }
     if($d !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="4" > 
      <span class="weight400"> 32GB </span><br>
      <?php
     }
     if($e !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="5" > 
      <span class="weight400"> 64GB + </span><br>
      <?php
     }
	 ?>
	 <br>Camera<br>
     <?php
     $query = 'SELECT Camera
       FROM '.$realtype.' 
       GROUP BY Camera 
       ';
       
     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $stmt = $conn->query($query);
 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Sla veldwaarden voor leesbaarheid op in variabelen 
      $schermgrootte     = $row["Camera"];
      
		if(!empty($schermgrootte)){
		  if($schermgrootte < 3){
		   $a++;
		  }
		  else if($schermgrootte >= 3 && $schermgrootte <=6){
		   $b++;
		  }
		  else if($schermgrootte >= 6 && $schermgrootte <=12){
		   $c++;
		  }
		  else if($schermgrootte >= 12){
		   $d++;
		  }
      }
     }
     if($a !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="1" > 
      <span class="weight400"> < 3MP </span><br>
      <?php
     }
     if($b !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="2" > 
      <span class="weight400"> 3MP - 6MP </span><br>
      <?php
     }
     if($c !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="3" > 
      <span class="weight400"> 6MP - 12MP </span><br>
      <?php
	 }
     if($d !== 0){
      ?>
      <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="4" > 
      <span class="weight400"> 12MP + </span><br>
      <?php
	 }
	 ?>
	  <br>Display<br>
	 <?php

     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $query = 'SELECT Display
       FROM '.$realtype.' 
       GROUP BY Display
       ';
      
	  $stmt = $conn->query($query);
 
	if($realtype === "type_smartphone"){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $schermgrootte     = $row["Display"];
		  
		  if($schermgrootte <= 3){
		   $a++;
		  }
		  else if($schermgrootte >= 3 && $schermgrootte <= 4){
		   $b++;
		  }
		  else if($schermgrootte >= 4 && $schermgrootte <= 5){
		   $c++;
		  }
		  else if($schermgrootte >= 5){
		   $d++;
		  }
		 }
		 if($a !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="1" > 
		  <span class="weight400"> < 3" </span><br>
		  <?php
		 }
		 if($b !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="2" > 
		  <span class="weight400"> 3" - 4" </span><br>
		  <?php
		 }
		 if($c !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="3" > 
		  <span class="weight400"> 4" - 5" </span><br>
		  <?php
		 }
		 if($d !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Brandstof[]" value="4" > 
		  <span class="weight400"> > 5" </span><br>
		  <?php
		 }
     }
	 else if($realtype === "type_tablet"){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $schermgrootte     = $row["Display"];
		  
		  if($schermgrootte <= 7){
		   $a++;
		  }
		  else if($schermgrootte >= 7 && $schermgrootte <= 8){
		   $b++;
		  }
		  else if($schermgrootte >= 8 && $schermgrootte <= 9){
		   $c++;
		  }
		  else if($schermgrootte >= 10){
		   $d++;
		  }
		 }
		 if($a !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="1" > 
		  <span class="weight400"> < 7" </span><br>
		  <?php
		 }
		 if($b !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="2" > 
		  <span class="weight400"> 7" - 8" </span><br>
		  <?php
		 }
		 if($c !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="3" > 
		  <span class="weight400"> 8" - 9" </span><br>
		  <?php
		 }
		 if($d !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="4" > 
		  <span class="weight400"> > 10" </span><br>
		  <?php
		 }
		 
	 }
	 ?>
	 <?php
	 }
	 else if($realtype === "type_tv"){
	 ?>
	  <br>HD<br>
	 <?php

     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $query = 'SELECT HD
       FROM '.$realtype.' 
       GROUP BY HD
       ';
      
	  $stmt = $conn->query($query);
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $schermgrootte     = $row["HD"];
		  
		  if($schermgrootte == 720){
		   $a++;
		  }
		  else if($schermgrootte == 1080){
		   $b++;
		  }
		  else if($schermgrootte == "4k"){
		   $c++;
		  }
		  else if($schermgrootte == "8k"){
		   $d++;
		  }
		 }
		 if($a !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="720" > 
		  <span class="weight400"> 720p </span><br>
		  <?php
		 }
		 if($b !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="1080" > 
		  <span class="weight400"> 1080p </span><br>
		  <?php
		 }
		 if($c !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="4k" > 
		  <span class="weight400"> 4k </span><br>
		  <?php
		 }
		 if($d !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="8k" > 
		  <span class="weight400"> 8k </span><br>
		  <?php
		 }
		 
     ?>	
     <br>LED<br>
     <?php
		 $query = 'SELECT LED
		   FROM '.$realtype.' 
		   GROUP BY LED
		   ';
		  
		  $stmt = $conn->query($query);
	 
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $merken     = $row["LED"];
			if(!empty($merken)){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="<?php echo $merken; ?>" > 
		  <span class="weight400"><?php echo $merken; ?></span><br>
		  <?php
			}
		 }
		 
		 
	 ?>
	  <br>Display<br>
	 <?php

     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $query = 'SELECT Display
       FROM '.$realtype.' 
       GROUP BY Display
       ';
      
	  $stmt = $conn->query($query);
 
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $schermgrootte     = $row["Display"];
		  
		  if($schermgrootte <= 40){
		   $a++;
		  }
		  else if($schermgrootte >= 40 && $schermgrootte <= 50){
		   $b++;
		  }
		  else if($schermgrootte >= 50 && $schermgrootte <= 60){
		   $c++;
		  }
		  else if($schermgrootte >= 60){
		   $d++;
		  }
		 }
		 if($a !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="1" > 
		  <span class="weight400"> < 40" </span><br>
		  <?php
		 }
		 if($b !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="2" > 
		  <span class="weight400"> 40" - 50" </span><br>
		  <?php
		 }
		 if($c !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="3" > 
		  <span class="weight400"> 50" - 60" </span><br>
		  <?php
		 }
		 if($d !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="4" > 
		  <span class="weight400"> > 60" </span><br>
		  <?php
		 }
	 }
	 else if($realtype === "type_wasmachine"){
		 
		 
	 ?>
	  <br>Inhoud<br>
	 <?php

     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $query = 'SELECT Inhoud
       FROM '.$realtype.' 
       GROUP BY Inhoud
       ';
      
	  $stmt = $conn->query($query);
 
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $schermgrootte     = $row["Inhoud"];
		  
		  if($schermgrootte <= 10){
		   $a++;
		  }
		  else if($schermgrootte >= 10 && $schermgrootte <= 15){
		   $b++;
		  }
		  else if($schermgrootte >= 15 && $schermgrootte <= 20){
		   $c++;
		  }
		  else if($schermgrootte > 20){
		   $d++;
		  }
		 }
		 if($a !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="1" > 
		  <span class="weight400"> < 10kg </span><br>
		  <?php
		 }
		 if($b !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="2" > 
		  <span class="weight400"> 10kg - 15kg </span><br>
		  <?php
		 }
		 if($c !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="3" > 
		  <span class="weight400"> 15kg - 20kg </span><br>
		  <?php
		 }
		 if($d !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="schermgrootte[]" value="4" > 
		  <span class="weight400"> > 20kg </span><br>
		  <?php
		 }
		 
	 ?>
	  <br>Hoogte<br>
	 <?php

     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $query = 'SELECT Hoogte
       FROM '.$realtype.' 
       GROUP BY Hoogte
       ';
      
	  $stmt = $conn->query($query);
 
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $schermgrootte     = $row["Hoogte"];
		  
		  if($schermgrootte <= 10){
		   $a++;
		  }
		  else if($schermgrootte >= 10 && $schermgrootte <= 15){
		   $b++;
		  }
		  else if($schermgrootte >= 15 && $schermgrootte <= 20){
		   $c++;
		  }
		  else if($schermgrootte > 20){
		   $d++;
		  }
		 }
		 if($a !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="1" > 
		  <span class="weight400"> < 10cm </span><br>
		  <?php
		 }
		 if($b !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="2" > 
		  <span class="weight400"> 10cm - 15cm </span><br>
		  <?php
		 }
		 if($c !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="3" > 
		  <span class="weight400"> 15cm - 20cm </span><br>
		  <?php
		 }
		 if($d !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Bouwjaar[]" value="4" > 
		  <span class="weight400"> > 20cm </span><br>
		  <?php
		 }
		 
	 ?>
	  <br>Toeren<br>
	 <?php

     $a = 0; $b = 0; $c = 0; $d = 0; $e = 0;

     $query = 'SELECT Toeren
       FROM '.$realtype.' 
       GROUP BY Toeren
       ';
      
	  $stmt = $conn->query($query);
 
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  // Sla veldwaarden voor leesbaarheid op in variabelen 
		  $schermgrootte     = $row["Toeren"];
		  
		  if($schermgrootte <= 10){
		   $a++;
		  }
		  else if($schermgrootte >= 10 && $schermgrootte <= 15){
		   $b++;
		  }
		  else if($schermgrootte >= 15 && $schermgrootte <= 20){
		   $c++;
		  }
		  else if($schermgrootte > 20){
		   $d++;
		  }
		 }
		 if($a !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="1" > 
		  <span class="weight400"> < 10 </span><br>
		  <?php
		 }
		 if($b !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="2" > 
		  <span class="weight400"> 10 - 15 </span><br>
		  <?php
		 }
		 if($c !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="3" > 
		  <span class="weight400"> 15 - 20 </span><br>
		  <?php
		 }
		 if($d !== 0){
		  ?>
		  <input class="checkboxfilter" type="checkbox" name="Kleur[]" value="4" > 
		  <span class="weight400"> > 20 </span><br>
		  <?php
		 }
		 
	 ?>
	  <br>Energieklasse<br>
		<input type="radio" name="Brandstof" value="Goed"> <span class="weight400">Good</span><br>
		<input type="radio" name="Brandstof" value="Meh"> <span class="weight400">Meh</span><br>
		<input type="radio" name="Brandstof" value="Overig"> <span class="weight400">Overig</span><br>	
		<?php
		 
		 
	 }
     ?>	<br>
     <input type="submit" value="Ga" class="prijsga" name="verzondenknopfilter"><br>
    </form>
   </div>
  </div> 
					</ul>