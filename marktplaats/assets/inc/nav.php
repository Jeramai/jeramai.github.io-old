  <nav class="navbar navbar-default navbar-static-top">
	  <ul class="search_balk">
		<form class="search" action="http://dc-ictwebs.nl/103706/marktplaats/search" method="post">
			<input name="search_input" class="search_input" type="search" placeholder="Zoeken.." required 
			<?php 
			if(isset($_POST['search_input'])){
				echo "value='".$_POST['search_input']."'";
			}
			?>
			/>
			<select name="search_select" class="search_select">
				<?php
				$stmt = $conn->query('show tables where Tables_in_dcictweb_103706 like "type_%" ');
				 
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$newfancyname = explode("type_", $row["Tables_in_dcictweb_103706"]);
					if(isset($_POST['search_select']) && $_POST['search_select'] == $newfancyname[1]){ 
						$selected_dropdown = 'selected'; 
					}
					else{
						$selected_dropdown = ''; 
					}
					
					echo "<option value=".$newfancyname[1]." ".$selected_dropdown.">".$newfancyname[1]."</option>";
				}
				?>
			</select>
			<input name="search_checkbox" class="search_checkbox" type="checkbox" value="full_search" title="Zoek in titel en beschrijving" <?php if(isset($_POST['search_checkbox'])){echo "checked"; } ?>/>
			<button class="search_button" type="submit" name="searchbaby">Search</button>
		</form>   
	  </ul>
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
	   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="margin-left:15px;" class="navbar-brand" href="http://dc-ictwebs.nl/103706/marktplaats">Marktplaats</a>
      </div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right" id="bs-example-navbar-collapse-1">
			<?php
			$stmt = $conn->query('show tables where Tables_in_dcictweb_103706 like "type_%" ');
			 
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$newfancyname = explode("type_", $row["Tables_in_dcictweb_103706"]);
				
				echo "<li><a href='http://dc-ictwebs.nl/103706/marktplaats/categorie/".$newfancyname[1]."'>".$newfancyname[1]."</a></li>";
			}
			?>
			<li><a>  </a></li>
		  </ul>
		</div>
    </div>
  </nav>
  
  
  
	<?php 
		if(isset($_SESSION['logged_in'])){
			
			$query = "	SELECT 
							*
							FROM advertenties 
							WHERE UserID = '".$_SESSION['UserID']."' 
							AND Actief = 'Ja'";

			$stmt = $conn->query($query);

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$timestamp = $row['Datum'];
				$timestamp = strtotime($timestamp);

				$date = strtotime("+56 day", $timestamp);
				
				$verloopdatum = date('Y-m-d', $date);
				$date2 = date('Y-m-d', time());
				
				$diff = abs(strtotime($date2) - strtotime($verloopdatum))."<br>";
				
				if($verloopdatum < $date2){
					$sql2 = "UPDATE advertenties 
							SET Actief='Nee'
							WHERE UserID=".$_SESSION['UserID']." 
							AND AdvertentieID = ".$row['AdvertentieID']." ";
                    
					$stmt2 = $conn->prepare($sql2);
					$stmt2->execute();
					?>
					<div id="verlopen_artikel">
						<?php echo "Uw artikele genaamd '".$row['Titel']."' is verlopen! <br> Deze is door ons op non-actief gesteld!<br><br>";?>
						<div class="betaalknop" onclick="hideThisThingy()">
							<p class="action-button animate blue"><span class="fa fa-refresh fa-spin"></span> Oke.</p>
						</div>
					</div>
<script>
function hideThisThingy() {
    document.getElementById("verlopen_artikel").style.display = "none";
}
</script>
				<?php
				}
			}
			
		}
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	