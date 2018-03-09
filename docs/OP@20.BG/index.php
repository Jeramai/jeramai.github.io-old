<?php 
session_start(); //Start de sessions 
ini_set('display_errors', true);//Set this display to display  all erros while testing and developing the script
error_reporting( error_reporting() & ~E_NOTICE ); //Hides the "variable not defined" error
//error_reporting(0);// With this no error reporting will be there
?>
<html>
<?php include 'includes/head.php'; //include de head bestanden ?> 
	<body>
<?php 
include 'includes/conn.php'; //include de database connectie 

//include riot api om data op te halen
include('riot/php-riot-api.php'); 
include('riot/FileSystemCache.php');

//include de functions
include('functions/functions.php');
$function = new myfunctions(); //Aanroepen van de functions class
if(!isset($_GET['summoner']))
{
	?>
	<div class="balk1 left"> <!-- INFO BALK 1  -->
		<div class="balk1left">
			<img class="summoner-icon1" src="pics/poro.png" alt="poro">
			<a href='index'>
				<div class="header-riotgames effect3" data-hover="OP@20.BG">OP@20.BG</div>
			</a>
		</div>
		<div class="balk1right">
			<form id="tfnewsearch" method="GET">
				<input name="summoner" type="text" value="<?php echo $_GET['summoner']; ?>" placeholder="Search..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="tftextinput">
				<input type="submit" value="submit" class="tfbutton">
			</form> 	
		</div>
	</div>
	<div class='intropage'>
		<div id="search_intropage">
			<form id="tfnewsearch" method="GET">
				<input name="summoner" type="text" value="<?php echo $_GET['summoner']; ?>" placeholder="Search..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="">
				<ul id="searchResults" class="term-list hidden"></ul>
			</form> 
		</div>
	</div>
	<?php
}
else
{
?>
<div id="paper-back">
	<nav>
		<div class="close"></div>
		<a href="#Summoner">Summoner</a>
		<a href="#Game">Game info</a>
		<a href="#Champions">Champions</a>
		<a href="#Test">Test</a>
	</nav>
</div>
<div id="paper-window"> <!-- WRAPPER -->
	<div >
		<div class="hamburger"><span></span></div>
		<div id="container">
			<section id='Summoner'>

	<div class="row" id="paper-front">
		<div class="balk1 left"> <!-- INFO BALK 1  -->
			<div class="balk1left">
				<img class="summoner-icon1" src="pics/poro.png" alt="poro">
				<a href='index'>
					<div class="header-riotgames effect3" data-hover="OP@20.BG">OP@20.BG</div>
				</a>
			</div>
			<div class="balk1right">
				<form id="tfnewsearch" method="GET">
					<input name="summoner" type="text" value="<?php echo $_GET['summoner']; ?>" placeholder="Zoeken..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="tftextinput">
					<input type="submit" value="submit" class="tfbutton">
				</form> 	
			</div>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-10 wrapper">
			<?php
			if(isset($_GET['summoner']))
			{ //username van degene waar je info van wil zien
				$getname = $_GET['summoner'];
			}
			else
			{ //standaard username
				$getname = "jeramai";
			}
			$summoner_name = $function->summoner_info_array_name($getname); // zorgen dat de username alleen maar lowercase is (verplicht!)
			
			$test = new riotapi('euw'); // server waarop gespeeld word
			
			//$r = $test->getSummonerByName($summoner_name);

			//$r = $test->getSummoner($summoner_id);
			//$r = $test->getSummoner($summoner_id,'masteries');
			//$r = $test->getSummoner($summoner_id,'runes');
			//$r = $test->getSummoner($summoner_id,'name');
			//$r = $test->getStats($summoner_id);
			//$r = $test->getStats($summoner_id,'ranked');
			//$r = $test->getTeam($summoner_id);
			//$r = $test->getLeague($summoner_id);
			//$r = $test->getGame($summoner_id);
			//$r = $test->getChampion();
			try {
			$r = $test->getSummonerByName($summoner_name);
			
			$true_summoner_name = $r[$summoner_name]['name'] ; // Summoner name
			$summoner_id = $r[$summoner_name]['id'] ; // Summoner ID
			$summoner_level = $r[$summoner_name]['summonerLevel'] ; // Summoner level
			?>
			<div class='summonerinfo row' id='Summoner'>
				<div class='sumsoloQinfo1 col-md-6 col-sm-6 col-xs-12'>
					<!-- Afbeelding van de user-->
					<?php if($true_summoner_name == "Jeramai"){
						echo '<img class="summoner-icon" src="pics/challenger.jpg" alt="sumicon">';
						$summonertrueimg = "pics/challenger.jpg";
					}else{
						
						$summonertrueimg = "https://avatar.leagueoflegends.com/euw/".$true_summoner_name.".png";
						?>
					<img height="128" class="summoner-icon" src="https://avatar.leagueoflegends.com/euw/<?php echo $true_summoner_name;?>.png" alt="sumicon">
					<?php
					}
					echo "<div class='suminfoname-lvl'><div class='suminfoname'>".$true_summoner_name."</div><br>";
					echo "<div class='suminfolvl'>Summoner level: ".$summoner_level."</div><br>";
					echo "<div class='suminfolvl'>Summoner ID: ".$summoner_id."</div></div><br>";				
					?>
				</div>
				<div class='sumsoloQinfo2 col-md-3 col-md-push-3 col-sm-3 col-sm-push-3 col-xs-6 col-xs-push-6'>
				<?php
				$s = $test->getLeague($summoner_id);
				
					echo 	$league_name	= $s[$summoner_id][0]['name'] 	."<br>"; // 
							$league_tier 	= $s[$summoner_id][0]['tier']; // 
							$league_queue 	= $s[$summoner_id][0]['queue'] 	."<br>"; // 
					
					$array = $s[$summoner_id][0]['entries'];
						
					$i = 0;
					while($i <= 200){
						if( $array[$i]['playerOrTeamId'] == $summoner_id){
							
							$division = $array[$i]['division'];
							
							if($true_summoner_name == "Jeramai")
							{
								$summonertier123 = 	"CHALLENGER I - 1337 LP";
								$summonertier1232 = 	"CHALLENGER I <br>  1337 LP";
													
								echo $summonertier1232."<br>";
							}
							elseif($true_summoner_name == "Harder She Zed")
							{
								$summonertier123 = 	"BRONZE V - -3 LP";
								$summonertier1232 = 	"BRONZE V <br>  -3 LP";
													
								echo $summonertier1232."<br>";
							}
							else
							{
								$summonertier123 = 	$league_tier." ".$array[$i]['division']	." - " .$array[$i]['leaguePoints']					." LP";
								$summonertier1232 = 	$league_tier." ".$array[$i]['division']	."<br>" .$array[$i]['leaguePoints']." LP";
													
								echo $summonertier1232."<br>";
							}
							echo "<span class='green'>".$array[$i]['wins']	."W</span> - <span class='red'>".$array[$i]['losses']	."L</span><br>";
							
							$winlose100 = $array[$i]['wins'] + $array[$i]['losses'];
							$winlose = ($array[$i]['wins'] / $winlose100) * 100;
							echo "Win-lose ratio: ".$winlose2 = round($winlose, 2)."%<br>";
							
							if(!empty($array[$i]['isHotStreak'])){
								//echo "HotStreak: ".$array[$i]['isHotStreak']	."<br>";
							}
							
							if(!empty($array[$i]['isVeteran'])){
								//echo "Veteran: ".$array[$i]['isVeteran']		."<br>";
							}
							
							if(!empty($array[$i]['isFreshBlood'])){
								//echo "Fresh: ".$array[$i]['isFreshBlood']		."<br>";
							}
							
							if(!empty($array[$i]['isInactive'])){
								//echo "Inactive: ".$array[$i]['isInactive']		."<br>";
							}
							
							if(!empty($array[$i]['miniSeries'])){   
								//echo "Target: ".$array[$i]['miniSeries']['target']			."<br>";
								//echo "Winsinseries: ".$array[$i]['miniSeries']['wins']		."<br>";
								//echo "Losesinseries: ".$array[$i]['miniSeries']['losses']	."<br>";
								echo "Promo status: ".$array[$i]['miniSeries']['progress']		."<br>";
							}
						}
						$i++;
					}
					
				?>
				</div>
				<div class='sumtier col-md-3 col-md-pull-3 col-sm-3 col-sm-pull-3 col-xs-6 col-xs-pull-6'>
				<?php if(!empty($league_tier)){ ?>
					<img src="pics/tier/<?php 
					if($true_summoner_name == "Jeramai")
					{
						echo "CHALLENGER_I";
					}
					elseif($true_summoner_name == "Harder She Zed")
					{
						echo "BRONZE_V";
					}
					else
					{
					echo $league_tier."_".$division; 
					}
					?>.png">
				<?php } ?>
				</div>
			</div>
			
			<div class='left summonerinfo3' id='Game'>
				<h2 class='suminfotitle center'>Ingame information</h2><br>
			<?php 
				try {
					$v = $test->getCurrentGame($summoner_id, 'EUW1');
					/*?><pre><?php print_r($v);?></pre><?php*/
					$mapid 				= $v['mapId'];
					$gameMode 			= $v['gameMode'];
					$gameType 			= $v['gameType'];
					$gameQueueConfigId 	= $v['gameQueueConfigId'];
					$gameId 			= $v['gameId'];
					
					$spectate 			= $v['observers']['encryptionKey'] ;
					
					$participants 		= $v['participants'][0];
					$bannedchampions 	= $v['bannedchampions'][0];
					
					echo $function->getmapbyid($mapid)."<br>";
					echo $function->getmodebyid($gameMode);
					echo $function->gettypebyid($gameType);
					echo $function->getqueuebyid($gameQueueConfigId)."<br>";
					
					if(isset($spectate)){
					?>
					<a class="question" href="#">Spectate live</a>
					<div class="answer">
						Copy the text ->		
						Windows key + R ->
						Paste -> press enter	
						<p></p>
						<p>
"C:\Riot Games\League of Legends\RADS\solutions\lol_game_client_sln\releases\0.0.1.109\deploy\League of Legends.exe" "8394" "LoLLauncher.exe" "" "spectator spectator.euw1.lol.riotgames.com:80 <?php echo $spectate.' '.$gameId; ?> EUW1"
						</p>
					</div>
					<?php } ?>

					<div class='ingameinfo'>
					<?php
					foreach($v['participants'] as $key => $data){
						$championId			= $data['championId']	;
						$spell1Id 			= $data['spell1Id']		;
						$spell2Id 			= $data['spell2Id']		;
						$summonerName 		= $data['summonerName'] ;
						$teamId 			= $data['teamId'] 		;						
						?>
						<div class='ingameinfoplayer <?php if($teamId == 100){ echo "blueside"; }else{ echo "redside";} ?> '>
							<div class='ingameinfoplayerimg'>
								<?php echo $function->getchampnamebyid($championId); ?>
							</div>
							<div class='ingameinfoplayerspells'>
								<?php echo $function->getspellbyid($spell1Id); ?> <br>
								<?php echo $function->getspellbyid($spell2Id); ?> <br>
							</div>
							<div class='ingameinfoplayername'>
								<?php echo $summonerName; ?>
							</div>
							<div class='ingameinfoplayerrunes'>
								<span class='titlerunes'>Runes</span>
								<span class='detailsrunes'>
								<?php
									foreach($data['runes'] as $key => $data2){
										$count		= $data2['count'];
										$runeId		= $data2['runeId'];
										?>
											<?php echo $function->getrunesbyid($runeId, $count)."<br>"; ?>
										<?php
									}
								?>
								</span>
							</div>
							<div class='ingameinfoplayermasteries'>
								<span class='titlerunes'>Masteries</span>
								<span class='detailsmasteries'>
								<?php
									foreach($data['masteries'] as $key => $data3){
										$rank			= $data3['rank'];
										$masteryId		= $data3['masteryId'];
										
										echo $function->getmasteriesbyid($rank, $masteryId); 

									}
								?>
								</span>
							</div>
						</div>
						<!--<pre><?php //print_r($q); ?> </pre>-->
						<?php
					}
					?>
					</div>
					<div class='ingameinfobanned'>
					<?php
					foreach($v['bannedChampions'] as $key => $data){
						$championId				= $data['championId'];
						$teamId 				= $data['teamId'];
						$pickTurn 				= $data['pickTurn'];
						?>
						<span class='<?php if($teamId == 100){ echo "fl-left"; }else{ echo "fl-right";} ?>'>
						<?php
						echo $function->getchampnamebyid($championId);
						echo "</span>";
					}
					?>
					</div>
					<?php
					
				} catch(Exception $e) {
					if($e->getMessage() === "NOT_FOUND")
					{
						echo "Summoner ".$true_summoner_name." is not in an active game!";
					}
					else
					{
						echo "Error: " . $e->getMessage();
					}
				};
			?>
			</div>
			<div class='summonerinfo2' id='Champions'>
			<?php 
			try{
				$t = $test->getStats($summoner_id,'ranked');
			?>
			<h2 class='suminfotitle'>Ranked champions</h2><br>
				<table>
					<tr class='sumtable center'>
						<td>Champion</td>
						<td>Games</td>
						<td>Wins</td>
						<td>Loses</td>
						<td>Winrate			</td>
						
						<td>Kills 		    </td>
						<td>Damage 			</td>
					<!--<td>totalDamageTaken 			</td>-->
						<td>Most kills </td>
					<!--<td>totalMinionKills 			</td>-->
					<!--<td>totalDoubleKills 			</td>-->
					<!--<td>totalTripleKills 			</td>-->
					<!--<td>totalQuadraKills 			</td>-->
						<td class='daspechkleinerweg'>Penta's 			</td>
					<!--<td>totalUnrealKills 			</td>-->
					<!--<td>totalDeathsPerSession 		</td>-->
						<td class='daspechkleinerweg'>Gold 			</td>
					<!--<td>mostSpellsCast 			    </td>-->
					<!--<td>totalTurretsKilled 		    </td>-->
					<!--<td>totalPhysicalDamageDealt 	</td>-->
					<!--<td>totalMagicDamageDealt 		</td>-->
					<!--<td>totalFirstBlood 			</td>-->
						<td class='daspechkleinerweg'>Assists 				</td>
					<!--<td>maxChampionsKilled 		    </td>-->
					<!--<td>maxNumDeaths 				</td>-->
					</tr>
				<?php
				
				usort($t['champions'], "cmp");
				
				foreach($t['champions'] as $key => $data){
					$rankedchampionID 		= $data['id']."<br>";
					$totalSessionsPlayed	= $data['stats']['totalSessionsPlayed'];
					$totalSessionsLost 		= $data['stats']['totalSessionsLost'];
					$totalSessionsWon 		= $data['stats']['totalSessionsWon'];
					
					$winrate = (($totalSessionsWon / $totalSessionsPlayed) * 100);
																								   
					$totalChampionKills 			= $data['stats']['totalChampionKills'];
					$totalDamageDealt 				= $data['stats']['totalDamageDealt'];
					//$totalDamageTaken 			= $data['stats']['totalDamageTaken'];
					$mostChampionKillsPerSession 	= $data['stats']['mostChampionKillsPerSession'];
					//$totalMinionKills 			= $data['stats']['totalMinionKills'];
					//$totalDoubleKills 			= $data['stats']['totalDoubleKills'];
					//$totalTripleKills 			= $data['stats']['totalTripleKills'];
					//$totalQuadraKills 			= $data['stats']['totalQuadraKills'];
					$totalPentaKills 				= $data['stats']['totalPentaKills'];
					//$totalUnrealKills 			= $data['stats']['totalUnrealKills'];
					//$totalDeathsPerSession 		= $data['stats']['totalDeathsPerSession'];
					$totalGoldEarned 				= $data['stats']['totalGoldEarned'];
					//$mostSpellsCast 				= $data['stats']['mostSpellsCast'];
					//$totalTurretsKilled 			= $data['stats']['totalTurretsKilled'];
					//$totalPhysicalDamageDealt 	= $data['stats']['totalPhysicalDamageDealt'];
					//$totalMagicDamageDealt 		= $data['stats']['totalMagicDamageDealt'];
					//$totalFirstBlood 				= $data['stats']['totalFirstBlood'];
					$totalAssists 					= $data['stats']['totalAssists'];
					//$maxChampionsKilled 			= $data['stats']['maxChampionsKilled'];
					//$maxNumDeaths 				= $data['stats']['maxNumDeaths'];
					
					?>
						<tr class='sumtable2 center'>
						<?php if($rankedchampionID != 0){ ?>
							<td class='left'><?php echo $u = $function->getchampnamebyid($rankedchampionID); ?></td>
							<td><?php echo $totalSessionsPlayed				; ?></td>
							<td><?php echo $totalSessionsWon 				; ?></td>
							<td><?php echo $totalSessionsLost 				; ?></td>
							<td><?php echo $winrate = round($winrate, 2)."%";?></td>
							
							<td><?php echo $totalChampionKills 		 		; ?></td>
							<td><?php echo $totalDamageDealt 			 	; ?></td>
						<!--<td><?php //echo $totalDamageTaken 			 	; ?></td>-->
							<td><?php echo $mostChampionKillsPerSession 	; ?></td>
						<!--<td><?php //echo $totalMinionKills 			 	; ?></td>-->
						<!--<td><?php //echo $totalDoubleKills 			 	; ?></td>-->
						<!--<td><?php //echo $totalTripleKills 			 	; ?></td>-->
						<!--<td><?php //echo $totalQuadraKills 			 	; ?></td>-->
							<td class='daspechkleinerweg'><?php echo $totalPentaKills 			 	; ?></td>
						<!--<td><?php //echo $totalUnrealKills 			 	; ?></td>-->
						<!--<td><?php //echo $totalDeathsPerSession 		; ?></td>-->
							<td class='daspechkleinerweg'><?php echo $totalGoldEarned 			 	; ?></td>
						<!--<td><?php //echo $mostSpellsCast 			 	; ?></td>    -->
						<!--<td><?php //echo $totalTurretsKilled 		 	; ?></td>    -->
						<!--<td><?php //echo $totalPhysicalDamageDealt 	 	; ?></td>-->
						<!--<td><?php //echo $totalMagicDamageDealt 		; ?></td>-->
						<!--<td><?php //echo $totalFirstBlood 			 	; ?></td>-->
							<td class='daspechkleinerweg'><?php echo $totalAssists 				 	; ?></td>
						<!--<td><?php //echo $maxChampionsKilled 		 	; ?></td>    -->
						<!--<td><?php //echo $maxNumDeaths 				 	; ?></td>-->
						<?php } ?>
						</tr>
					<?php			
				}
				?>
				</table>
			<?php } catch(Exception $e) {
				?> 
				<div class='summonerinfo2_2'>
						<h2 class='suminfotitle center'>Ranked champions</h2><br> <?php
					if($e->getMessage() === "NOT_FOUND")
					{
						echo "Summoner ".$true_summoner_name." is not ranked yet!";
					}
					else
					{
						echo "Error: " . $e->getMessage();
					}
				?>
				</div>
				<?php
				};
			?>
			</div>
			
			<div class='summonerinfo4' id='Test'>
				<div class="contactcontainer">
				  <h2 class='center'>Live web updates! </h2>
					<input type="hidden" class="js-img" placeholder="Img" value="<?php echo $summonertrueimg; ?>" />
					<input type="hidden" class="js-title" placeholder="Title" value="<?php echo $true_summoner_name; ?>" />
					<input type="hidden" class="js-body" placeholder="Body" value="<?php echo $summonertier123; ?>" />
					<button onclick="push_api()" class='center sum4button js-push-button'>
						Get updates!
					</button>
				  <h5>If you would like to get live updates from this user <br> 
				  <span style='font-size:11px;'>(like when the summoner goes ingame, gets a pentakill, wins/loses etc.),</span><br>
				  click the button above!</h5>
				</div>
			</div>
			<?php 
				} catch(Exception $e) {
						echo "Error: " . $e->getMessage();
			?><!--
			<div class='summonerinfo5'>
				<div class="contactcontainer">
				  <h2 class='center'><span class='red'>4</span>0<span class='red'>4</span> User not found! </h2>
					This summoner is not registered at OP@20.BG. Please check your spelling.
					<br>
					Please notice that we currently only support the EUW region!
				</div>
			</div>-->
			<?php
				};
			?>
		</div>
		<div class="col-md-1">
		</div>
	</div>
	
			</section>
			<section></section>
			<section></section>
			<section></section>
		</div>
	</div>
	
<?php
include('includes/footer.php');
}
?>
</div>