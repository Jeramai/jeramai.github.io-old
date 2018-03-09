<?php
class myfunctions { //Zorgen dat de naam als lowercase word doorgestuurd
	function summoner_info_array_name($summoner_name) {
		$summoner_lower = strtolower($summoner_name);
		$summoner_nospaces = str_replace(' ', '', $summoner_lower);
		return $summoner_nospaces;
	}
	
	function getchampnamebyid($rankedchampionID){
		$ID = $rankedchampionID;
		if($ID == 266)
		{
			$name = "Aatrox";
		}
		else if($ID == 103)
		{
			$name = "Ahri";
			
		}
		else if($ID == 84)
		{
			$name = "Akali";
			
		}
		else if($ID == 12)
		{
			$name = "Alistar";
			
		}
		else if($ID == 32)
		{
			$name = "Amumu";
			
		}
		else if($ID == 34)
		{
			$name = "Anivia";
			
		}
		else if($ID == 1)
		{
			$name = "Annie";
			
		}
		else if($ID == 22)
		{
			$name = "Ashe";
			
		}
		else if($ID == 268)
		{
			$name = "Azir";
			
		}
		else if($ID == 432)
		{
			$name = "Bard";
			
		}
		else if($ID == 53)
		{
			$name = "Blitzcrank";
			
		}
		else if($ID == 63)
		{
			$name = "Brand";
			
		}
		else if($ID == 201)
		{
			$name = "Braum";
			
		}
		else if($ID == 51)
		{
			$name = "Caitlyn";
			
		}
		else if($ID == 69)
		{
			$name = "Cassiopeia";
			
		}
		else if($ID == 31)
		{
			$name = "Chogath";
			
		}
		else if($ID == 42)
		{
			$name = "Corki";
			
		}
		else if($ID == 122)
		{
			$name = "Darius";
			
		}
		else if($ID == 131)
		{
			$name = "Diana";
			
		}
		else if($ID == 36)
		{
			$name = "DrMundo";
			
		}
		else if($ID == 119)
		{
			$name = "Draven";
			
		}
		else if($ID == 245)
		{
			$name = "Ekko";
			
		}
		else if($ID == 60)
		{
			$name = "Elise";
			
		}
		else if($ID == 28)
		{
			$name = "Evelynn";
			
		}
		else if($ID == 81)
		{
			$name = "Ezreal";
			
		}
		else if($ID == 9)
		{
			$name = "Fiddlesticks";
			
		}
		else if($ID == 114)
		{
			$name = "Fiora";
			
		}
		else if($ID == 105)
		{
			$name = "Fizz";
			
		}
		else if($ID == 3)
		{
			$name = "Galio";
			
		}
		else if($ID == 41)
		{
			$name = "Gangplank";
			
		}
		else if($ID == 86)
		{
			$name = "Garen";
			
		}
		else if($ID == 150)
		{
			$name = "Gnar";
			
		}
		else if($ID == 79)
		{
			$name = "Gragas";
			
		}
		else if($ID == 104)
		{
			$name = "Graves";
			
		}
		else if($ID == 120)
		{
			$name = "Hecarim";
			
		}
		else if($ID == 74)
		{
			$name = "Heimerdinger";
			
		}
		else if($ID == 39)
		{
			$name = "Irelia";
			
		}
		else if($ID == 40)
		{
			$name = "Janna";
			
		}
		else if($ID == 59)
		{
			$name = "JarvanIV";
			
		}
		else if($ID == 24)
		{
			$name = "Jax";
			
		}
		else if($ID == 126)
		{
			$name = "Jayce";
			
		}
		else if($ID == 222)
		{
			$name = "Jinx";
			
		}
		else if($ID == 429)
		{
			$name = "Kalista";
			
		}
		else if($ID == 43)
		{
			$name = "Karma";
			
		}
		else if($ID == 30)
		{
			$name = "Karthus";
			
		}
		else if($ID == 38)
		{
			$name = "Kassadin";
			
		}
		else if($ID == 55)
		{
			$name = "Katarina";
			
		}
		else if($ID == 10)
		{
			$name = "Kayle";
			
		}
		else if($ID == 85)
		{
			$name = "Kennen";
			
		}
		else if($ID == 121)
		{
			$name = "KhaZix";
			
		}
		else if($ID == 203)
		{
			$name = "Kindred";
			
		}
		else if($ID == 96)
		{
			$name = "KogMaw";
			
		}
		else if($ID == 7)
		{
			$name = "LeBlanc";
			
		}
		else if($ID == 64)
		{
			$name = "LeeSin";
			
		}
		else if($ID == 89)
		{
			$name = "Leona";
			
		}
		else if($ID == 127)
		{
			$name = "Lissandra";
			
		}
		else if($ID == 236)
		{
			$name = "Lucian";
			
		}
		else if($ID == 117)
		{
			$name = "Lulu";
			
		}
		else if($ID == 99)
		{
			$name = "Lux";
			
		}
		else if($ID == 54)
		{
			$name = "Malphite";
			
		}
		else if($ID == 90)
		{
			$name = "Malzahar";
			
		}
		else if($ID == 57)
		{
			$name = "Maokai";
			
		}
		else if($ID == 11)
		{
			$name = "MasterYi";
			
		}
		else if($ID == 21)
		{
			$name = "MissFortune";
			
		}
		else if($ID == 82)
		{
			$name = "Mordekaiser";
			
		}
		else if($ID == 25)
		{
			$name = "Morgana";
			
		}
		else if($ID == 267)
		{
			$name = "Nami";
			
		}
		else if($ID == 75)
		{
			$name = "Nasus";
			
		}
		else if($ID == 111)
		{
			$name = "Nautilus";
			
		}
		else if($ID == 76)
		{
			$name = "Nidalee";
			
		}
		else if($ID == 56)
		{
			$name = "Nocturne";
			
		}
		else if($ID == 20)
		{
			$name = "Nunu";
			
		}
		else if($ID == 2)
		{
			$name = "Olaf";
			
		}
		else if($ID == 61)
		{
			$name = "Orianna";
			
		}
		else if($ID == 80)
		{
			$name = "Pantheon";
			
		}
		else if($ID == 78)
		{
			$name = "Poppy";
			
		}
		else if($ID == 133)
		{
			$name = "Quinn";
			
		}
		else if($ID == 33)
		{
			$name = "Rammus";
			
		}
		else if($ID == 421)
		{
			$name = "RekSai";
			
		}
		else if($ID == 58)
		{
			$name = "Renekton";
			
		}
		else if($ID == 107)
		{
			$name = "Rengar";
			
		}
		else if($ID == 92)
		{
			$name = "Riven";
			
		}
		else if($ID == 68)
		{
			$name = "Rumble";
			
		}
		else if($ID == 13)
		{
			$name = "Ryze";
			
		}
		else if($ID == 113)
		{
			$name = "Sejuani";
			
		}
		else if($ID == 35)
		{
			$name = "Shaco";
			
		}
		else if($ID == 98)
		{
			$name = "Shen";
			
		}
		else if($ID == 102)
		{
			$name = "Shyvana";
			
		}
		else if($ID == 27)
		{
			$name = "Singed";
			
		}
		else if($ID == 14)
		{
			$name = "Sion";
			
		}
		else if($ID == 15)
		{
			$name = "Sivir";
			
		}
		else if($ID == 72)
		{
			$name = "Skarner";
			
		}
		else if($ID == 37)
		{
			$name = "Sona";
			
		}
		else if($ID == 16)
		{
			$name = "Soraka";
			
		}
		else if($ID == 50)
		{
			$name = "Swain";
			
		}
		else if($ID == 134)
		{
			$name = "Syndra";
			
		}
		else if($ID == 223)
		{
			$name = "TahmKench";
			
		}
		else if($ID == 91)
		{
			$name = "Talon";
			
		}
		else if($ID == 44)
		{
			$name = "Taric";
			
		}
		else if($ID == 17)
		{
			$name = "Teemo";
			
		}
		else if($ID == 412)
		{
			$name = "Thresh";
			
		}
		else if($ID == 18)
		{
			$name = "Tristana";
			
		}
		else if($ID == 48)
		{
			$name = "Trundle";
			
		}
		else if($ID == 23)
		{
			$name = "Tryndamere";
			
		}
		else if($ID == 4)
		{
			$name = "TwistedFate";
			
		}
		else if($ID == 29)
		{
			$name = "Twitch";
			
		}
		else if($ID == 77)
		{
			$name = "Udyr";
			
		}
		else if($ID == 6)
		{
			$name = "Urgot";
			
		}
		else if($ID == 110)
		{
			$name = "Varus";
			
		}
		else if($ID == 67)
		{
			$name = "Vayne";
			
		}
		else if($ID == 45)
		{
			$name = "Veigar";
			
		}
		else if($ID == 161)
		{
			$name = "Velkoz";
			
		}
		else if($ID == 254)
		{
			$name = "Vi";
			
		}
		else if($ID == 112)
		{
			$name = "Viktor";
			
		}
		else if($ID == 8)
		{
			$name = "Vladimir";
			
		}
		else if($ID == 106)
		{
			$name = "Volibear";
			
		}
		else if($ID == 19)
		{
			$name = "Warwick";
			
		}
		else if($ID == 62)
		{
			$name = "Wukong";
			
		}
		else if($ID == 101)
		{
			$name = "Xerath";
			
		}
		else if($ID == 5)
		{
			$name = "XinZhao";
			
		}
		else if($ID == 157)
		{
			$name = "Yasuo";
			
		}
		else if($ID == 83)
		{
			$name = "Yorick";
			
		}
		else if($ID == 154)
		{
			$name = "Zac";
			
		}
		else if($ID == 238)
		{
			$name = "Zed";
			
		}
		else if($ID == 115)
		{
			$name = "Ziggs";
			
		}
		else if($ID == 26)
		{
			$name = "Zilean";
			
		}
		else if($ID == 143)
		{
			$name = "Zyra";
			
		}
		else
		{
			$name = "404";
		}
		
		return "<img class='champion_grid_img' src='pics/champion_grid/".$name.".png' alt='1'>"." <span class='champion_grid_img_name'>".$name."</span>";
	}

	function getmodebyid($gameMode){
		if($gameMode == "CLASSIC"){
		}
		else if($gameMode == "ODIN"){
			return "Dominion/Crystal Scar game"."<br>";
		}
		else if($gameMode == "ARAM"){
			return "ARAM game"."<br>";
		}
		else if($gameMode == "TUTORIAL"){
			return "Tutorial  game"."<br>";
		}
		else if($gameMode == "ONEFORALL"){
			return "One for All game"."<br>";
		}
		else if($gameMode == "ASCENSION"){
			return "Ascension game"."<br>";
		}
		else if($gameMode == "FIRSTBLOOD"){
			return "Snowdown Showdown game"."<br>";
		}
		else if($gameMode == "KINGPORO"){
			return "King Poro game"."<br>";
		}
		else {
			return "New gamemode"."<br>";
		}
	}
	
	function gettypebyid($gameType){
		if($gameType == "CUSTOM_GAME"){
			return "Type: Custom game<br>";
		}
		else if($gameType == "TUTORIAL_GAME"){
			return "Type: Tutorial game<br>";
		}
		else if($gameType == "MATCHED_GAME"){
		}
		else {
			return "Type: New game<br>";
		}
	}
	
	function getqueuebyid($gameQueueConfigId){
		if($gameQueueConfigId == 0){		return "Custom game                ";}
		else if($gameQueueConfigId == 8){	return "Normal 3v3 game            ";}
		else if($gameQueueConfigId == 2){	return "Normal 5v5 Blind Pick game ";}
		else if($gameQueueConfigId == 14){	return "Normal 5v5 Draft Pick game ";}
		else if($gameQueueConfigId == 4){	return "Ranked Solo 5v5 game       ";}
		else if($gameQueueConfigId == 6){	return "Ranked Premade 5v5 game    ";}
		else if($gameQueueConfigId == 9){	return "Ranked Premade 3v3 game    ";}
		else if($gameQueueConfigId == 41){	return "Ranked Team 3v3 game       ";}
		else if($gameQueueConfigId == 42){	return "Ranked Team 5v5 game       ";}
		else { return "Overige Queue type";}
	}
	
	function getspellbyid($spell){
		if($spell == 21){		$name = "Barrier ";}
		else if($spell == 13){	$name = "Clairvoyance ";}
		else if($spell == 9){	$name = "Clarity ";}
		else if($spell == 5){	$name = "Cleanse ";}
		else if($spell == 3){	$name = "Exhaust ";}
		else if($spell == 4){	$name = "Flash ";}
		else if($spell == 8){	$name = "Fortify ";}
		else if($spell == 15){	$name = "Garrison ";}
		else if($spell == 6){	$name = "Ghost ";}
		else if($spell == 7){	$name = "Heal ";}
		else if($spell == 14){	$name = "Ignite ";}
		else if($spell == 18){	$name = "Mark/Dash ";}
		else if($spell == 10){	$name = "Promote";}
		else if($spell == 6){	$name = "Rally";}
		else if($spell == 1){	$name = "Revive";}
		else if($spell == 11){	$name = "Smite";}
		else if($spell == 16){	$name = "Surge";}
		else if($spell == 2){	$name = "Teleport";}
		else { $name = "404";}
		
		return "<img class='spell_grid_img' src='pics/spells/".$spell.".png' alt='1' height='25'>";
	}
	
	function getrunesbyid($runeId, $count){		
		//Glyphs --------------------------------------------------
		if($runeId == 5297){ $runename = "Greater Glyph of Ability Power"; $runeplusmin = "+"; $runepower = 1.19; $runetype = "ability power";}
		else if($runeId == 5287){ $runename = "Greater Glyph of Armor"; $runeplusmin = "+"; $runepower = 0.7; $runetype = "armor";}
		else if($runeId == 5275){ $runename = "Greater Glyph of Attack Damage"; $runeplusmin = "+"; $runepower = 0.28; $runetype = "attack damage";}
		else if($runeId == 5277){ $runename = "Greater Glyph of Attack Speed"; $runeplusmin = "+"; $runepower = 0.64; $runetype = "% attack speed";}
		else if($runeId == 5295){ $runename = "Greater Glyph of Cooldown Reduction"; $runeplusmin = "-"; $runepower = 0.83; $runetype = "% cooldowns";}
		else if($runeId == 5281){ $runename = "Greater Glyph of Critical Chance"; $runeplusmin = "+"; $runepower = 0.28; $runetype = "% critical chance";}
		else if($runeId == 5279){ $runename = "Greater Glyph of Critical Damage"; $runeplusmin = "+"; $runepower = 0.56; $runetype = "% critical damage";}
		else if($runeId == 5371){ $runename = "Greater Glyph of Energy"; $runeplusmin = "+"; $runepower = 2.2; $runetype = "Energy";}
		else if($runeId == 5285){ $runename = "Greater Glyph of Health"; $runeplusmin = "+"; $runepower = 2.67; $runetype = "health";}
		else if($runeId == 5291){ $runename = "Greater Glyph of Health Regeneration"; $runeplusmin = "+"; $runepower = 0.27; $runetype = "health regen / 5 sec.";}
		else if($runeId == 5303){ $runename = "Greater Glyph of Magic Penetration"; $runeplusmin = "+"; $runepower = 0.63; $runetype = "magic penetration";}
		else if($runeId == 5289){ $runename = "Greater Glyph of Magic Resist"; $runeplusmin = "+"; $runepower = 1.34; $runetype = "magic resist";}
		else if($runeId == 5299){ $runename = "Greater Glyph of Mana"; $runeplusmin = "+"; $runepower = 11.24; $runetype = "mana";}
		else if($runeId == 5301){ $runename = "Greater Glyph of Mana Regeneration"; $runeplusmin = "+"; $runepower = 0.33; $runetype = "mana regen / 5 sec.";}
		else if($runeId == 5298){ $runename = "Greater Glyph of Scaling Ability Power"; $runeplusmin = "+"; $runepower = 0.17; $runetype = "ability power per level (+3.06 at champion level 18)";}
		else if($runeId == 5276){ $runename = "Greater Glyph of Scaling Attack Damage"; $runeplusmin = "+"; $runepower = 0.04; $runetype = "attack damage per level (+0.73 at champion level 18)";}
		else if($runeId == 5296){ $runename = "Greater Glyph of Scaling Cooldown Reduction"; $runeplusmin = "-"; $runepower = 0.09; $runetype = "% cooldowns per level (-1.67% at champion level 18)";}
		else if($runeId == 5372){ $runename = "Greater Glyph of Scaling Energy"; $runeplusmin = "+"; $runepower = 0.161; $runetype = "Energy/level (+2.89 at level 18)";}
		else if($runeId == 5286){ $runename = "Greater Glyph of Scaling Health"; $runeplusmin = "+"; $runepower = 0.54; $runetype = "health per level (+9.72 at champion level 18)";}
		else if($runeId == 5290){ $runename = "Greater Glyph of Scaling Magic Resist"; $runeplusmin = "+"; $runepower = 0.16; $runetype = "magic resist per level (+3 at champion level 18)";}
		else if($runeId == 5300){ $runename = "Greater Glyph of Scaling Mana"; $runeplusmin = "+"; $runepower = 1.42; $runetype = "mana per level (+25.56 at champion level 18)";}
		else if($runeId == 5302){ $runename = "Greater Glyph of Scaling Mana Regeneration"; $runeplusmin = "+"; $runepower = 0.06; $runetype = "mana regen / 5 sec. per level (+1.2 at champion level 18)";}
		
		//Marks ----------------------------------------------------
		else if($runeId == 5267){ $runename = "Greater Mark of Ability Power"; $runeplusmin = "+"; $runepower = 0.59; $runetype = "ability power";}
		else if($runeId == 5257){ $runename = "Greater Mark of Armor"; $runeplusmin = "+"; $runepower = 0.91; $runetype = "armor";}
		else if($runeId == 5253){ $runename = "Greater Mark of Armor Penetration"; $runeplusmin = "+"; $runepower = 1.28; $runetype = "armor penetration";}
		else if($runeId == 5245){ $runename = "Greater Mark of Attack Damage"; $runeplusmin = "+"; $runepower = 0.95; $runetype = "attack damage";}
		else if($runeId == 5247){ $runename = "Greater Mark of Attack Speed"; $runeplusmin = "+"; $runepower = 1.7; $runetype = "% attack speed";}
		else if($runeId == 5265){ $runename = "Greater Mark of Cooldown Reduction"; $runeplusmin = "-"; $runepower = 0.2; $runetype = "% cooldowns";}
		else if($runeId == 5251){ $runename = "Greater Mark of Critical Chance"; $runeplusmin = "+"; $runepower = 0.93; $runetype = "% critical chance";}
		else if($runeId == 5249){ $runename = "Greater Mark of Critical Damage"; $runeplusmin = "+"; $runepower = 2.23; $runetype = "% critical damage";}
		else if($runeId == 5255){ $runename = "Greater Mark of Health"; $runeplusmin = "+"; $runepower = 3.47; $runetype = "health";}
		else if($runeId == 5402){ $runename = "Greater Mark of Hybrid Penetration"; $runeplusmin = "+"; $runepower = 0.9; $runetype = "Armor Penetration"; $runeplusmin2 = "+"; $runepower2 = 0.62; $runetype2 = "Magic Penetration";}
		else if($runeId == 5273){ $runename = "Greater Mark of Magic Penetration"; $runeplusmin = "+"; $runepower = 0.87; $runetype = "magic penetration";}
		else if($runeId == 5259){ $runename = "Greater Mark of Magic Resist"; $runeplusmin = "+"; $runepower = 0.77; $runetype = "magic resist";}
		else if($runeId == 5269){ $runename = "Greater Mark of Mana"; $runeplusmin = "+"; $runepower = 5.91; $runetype = "mana";}
		else if($runeId == 5271){ $runename = "Greater Mark of Mana Regeneration"; $runeplusmin = "+"; $runepower = 0.26; $runetype = "mana regen / 5 sec.";}
		else if($runeId == 5268){ $runename = "Greater Mark of Scaling Ability Power"; $runeplusmin = "+"; $runepower = 0.1; $runetype = "ability power per level (+1.8 at champion level 18)";}
		else if($runeId == 5246){ $runename = "Greater Mark of Scaling Attack Damage"; $runeplusmin = "+"; $runepower = 0.13; $runetype = "attack damage per level (+2.43 at champion level 18)";}
		else if($runeId == 5256){ $runename = "Greater Mark of Scaling Health"; $runeplusmin = "+"; $runepower = 0.54; $runetype = "health per level (+9.72 at champion level 18)";}
		else if($runeId == 5260){ $runename = "Greater Mark of Scaling Magic Resist"; $runeplusmin = "+"; $runepower = 0.07; $runetype = "magic resist per level (+1.26 at champion level 18)";}
		else if($runeId == 5270){ $runename = "Greater Mark of Scaling Mana"; $runeplusmin = "+"; $runepower = 1.17; $runetype = "mana per level (+21.06 at champion level 18)";}
		
		//Quintessence ---------------------------------------------------
		else if($runeId == 5357){ $runename = "Greater Quintessence of Ability Power"; $runeplusmin = "+"; $runepower = 4.95; $runetype = "ability power";}
		else if($runeId == 5347){ $runename = "Greater Quintessence of Armor"; $runeplusmin = "+"; $runepower = 4.26; $runetype = "armor";}
		else if($runeId == 5343){ $runename = "Greater Quintessence of Armor Penetration"; $runeplusmin = "+"; $runepower = 2.56; $runetype = "armor penetration";}
		else if($runeId == 5335){ $runename = "Greater Quintessence of Attack Damage"; $runeplusmin = "+"; $runepower = 2.25; $runetype = "attack damage";}
		else if($runeId == 5337){ $runename = "Greater Quintessence of Attack Speed"; $runeplusmin = "+"; $runepower = 4.5; $runetype = "% attack speed";}
		else if($runeId == 5355){ $runename = "Greater Quintessence of Cooldown Reduction"; $runeplusmin = "-"; $runepower = 2.5; $runetype = "% cooldowns";}
		else if($runeId == 5341){ $runename = "Greater Quintessence of Critical Chance"; $runeplusmin = "+"; $runepower = 1.86; $runetype = "% critical chance";}
		else if($runeId == 5339){ $runename = "Greater Quintessence of Critical Damage"; $runeplusmin = "+"; $runepower = 4.46; $runetype = "% critical damage";}
		else if($runeId == 5374){ $runename = "Greater Quintessence of Energy"; $runeplusmin = "+"; $runepower = 5.4; $runetype = "Energy";}
		else if($runeId == 5373){ $runename = "Greater Quintessence of Energy Regeneration"; $runeplusmin = "+"; $runepower = 1.575; $runetype = "Energy regen/5 sec";}
		else if($runeId == 5368){ $runename = "Greater Quintessence of Experience"; $runeplusmin = "+"; $runepower = 2; $runetype = "% experience gained";}
		else if($runeId == 5345){ $runename = "Greater Quintessence of Gold"; $runeplusmin = "+"; $runepower = 1; $runetype = "gold / 10 sec.";}
		else if($runeId == 5345){ $runename = "Greater Quintessence of Health"; $runeplusmin = "+"; $runepower = 26; $runetype = "health";}
		else if($runeId == 5351){ $runename = "Greater Quintessence of Health Regeneration"; $runeplusmin = "+"; $runepower = 2.7; $runetype = "health regen / 5 sec.";}
		else if($runeId == 5418){ $runename = "Greater Quintessence of Hybrid Penetration"; $runeplusmin = "+"; $runepower = 1.79; $runetype = "Armor Penetration"; $runeplusmin2 = "+"; $runepower2 = 1.4; $runetype2 = "Magic Penetration";}
		else if($runeId == 5412){ $runename = "Greater Quintessence of Life Steal"; $runeplusmin = "+"; $runepower = 1.5; $runetype = "% Life Steal";}
		else if($runeId == 5363){ $runename = "Greater Quintessence of Magic Penetration"; $runeplusmin = "+"; $runepower = 2.01; $runetype = "magic penetration";}
		else if($runeId == 5349){ $runename = "Greater Quintessence of Magic Resist"; $runeplusmin = "+"; $runepower = 4; $runetype = "magic resist";}
		else if($runeId == 5359){ $runename = "Greater Quintessence of Mana"; $runeplusmin = "+"; $runepower = 37.5; $runetype = "mana";}
		else if($runeId == 5361){ $runename = "Greater Quintessence of Mana Regeneration"; $runeplusmin = "+"; $runepower = 1.25; $runetype = "mana regen / 5 sec.";}
		else if($runeId == 5365){ $runename = "Greater Quintessence of Movement Speed"; $runeplusmin = "+"; $runepower = 1.5; $runetype = "movement speed";}
		else if($runeId == 5406){ $runename = "Greater Quintessence of Percent Health"; $runeplusmin = "+"; $runepower = 1.5; $runetype = "% increased health.";}
		else if($runeId == 5366){ $runename = "Greater Quintessence of Revival"; $runeplusmin = "-"; $runepower = 5; $runetype = "% time dead";}
		else if($runeId == 5358){ $runename = "Greater Quintessence of Scaling Ability Power"; $runeplusmin = "+"; $runepower = 0.43; $runetype = "ability power per level (+7.74 at champion level 18)";}
		else if($runeId == 5348){ $runename = "Greater Quintessence of Scaling Armor"; $runeplusmin = "+"; $runepower = 0.38; $runetype = "armor per level (+6.84 at champion level 18)";}
		else if($runeId == 5336){ $runename = "Greater Quintessence of Scaling Attack Damage"; $runeplusmin = "+"; $runepower = 0.25; $runetype = "attack damage per level (+4.5 at champion level 18)";}
		else if($runeId == 5356){ $runename = "Greater Quintessence of Scaling Cooldown Reduction"; $runeplusmin = "-"; $runepower = 0.28; $runetype = "% cooldowns per level (-5% at champion level 18)";}
		else if($runeId == 5346){ $runename = "Greater Quintessence of Scaling Health"; $runeplusmin = "+"; $runepower = 2.7; $runetype = "health per level (+48.6 at champion level 18)";}
		else if($runeId == 5352){ $runename = "Greater Quintessence of Health Regeneration"; $runeplusmin = "+"; $runepower = 0.28; $runetype = "health regen / 5 sec. per level (+5.04 at champion level 18)";}
		else if($runeId == 5350){ $runename = "Greater Quintessence of Scaling Magic Resist"; $runeplusmin = "+"; $runepower = 0.37; $runetype = "magic resist per level (+6.66 at champion level 18)";}
		else if($runeId == 5360){ $runename = "Greater Quintessence of Scaling Mana"; $runeplusmin = "+"; $runepower = 4.17; $runetype = "mana per level (+75.06 at champion level 18)";}
		else if($runeId == 5362){ $runename = "Greater Quintessence of Scaling Mana Regeneration"; $runeplusmin = "+"; $runepower = 0.24; $runetype = "mana regen / 5 sec. per level (+4.32 at champion level 18)";}
		else if($runeId == 5409){ $runename = "Greater Quintessence of Spell Vamp"; $runeplusmin = "+"; $runepower = 2; $runetype = "Spellvamp";}
		
		//Seals --------------------------------------------------------------
		else if($runeId == 5327){ $runename = "Greater Seal of Ability Power"; $runeplusmin = "+"; $runepower = 0.59; $runetype = "ability power";}
		else if($runeId == 5317){ $runename = "Greater Seal of Armor"; $runeplusmin = "+"; $runepower = 1; $runetype = "armor";}
		else if($runeId == 5305){ $runename = "Greater Seal of Attack Damage"; $runeplusmin = "+"; $runepower = 0.43; $runetype = "attack damage";}
		else if($runeId == 5307){ $runename = "Greater Seal of Attack Speed"; $runeplusmin = "+"; $runepower = 0.76; $runetype = "% attack speed";}
		else if($runeId == 5325){ $runename = "Greater Seal of Cooldown Reduction"; $runeplusmin = "-"; $runepower = 0.36; $runetype = "% cooldowns";}
		else if($runeId == 5311){ $runename = "Greater Seal of Critical Chance"; $runeplusmin = "+"; $runepower = 0.42; $runetype = "% critical chance";}
		else if($runeId == 5309){ $runename = "Greater Seal of Critical Damage"; $runeplusmin = "+"; $runepower = 0.78; $runetype = "% critical damage";}
		else if($runeId == 5369){ $runename = "Greater Seal of Energy Regeneration"; $runeplusmin = "+"; $runepower = 0.63; $runetype = "Energy regen/5 sec";}
		else if($runeId == 5403){ $runename = "Greater Seal of Gold"; $runeplusmin = "+"; $runepower = 0.25; $runetype = "gold / 10 sec.";}
		else if($runeId == 5315){ $runename = "Greater Seal of Health"; $runeplusmin = "+"; $runepower = 8; $runetype = "health";}
		else if($runeId == 5321){ $runename = "Greater Seal of Health Regeneration"; $runeplusmin = "+"; $runepower = 0.56; $runetype = "health regen / 5 sec.";}
		else if($runeId == 5319){ $runename = "Greater Seal of Magic Resist"; $runeplusmin = "+"; $runepower = 0.74; $runetype = "magic resist";}
		else if($runeId == 5329){ $runename = "Greater Seal of Mana"; $runeplusmin = "+"; $runepower = 6.89; $runetype = "mana";}
		else if($runeId == 5331){ $runename = "Greater Seal of Mana Regeneration"; $runeplusmin = "+"; $runepower = 0.41; $runetype = "mana regen / 5 sec.";}
		else if($runeId == 5415){ $runename = "Greater Seal of Percent Health"; $runeplusmin = "+"; $runepower = 0.5; $runetype = "% increased health.";}
		else if($runeId == 5328){ $runename = "Greater Seal of Scaling Ability Power"; $runeplusmin = "+"; $runepower = 0.1; $runetype = "ability power per level (+1.8 at champion level 18)";}
		else if($runeId == 5318){ $runename = "Greater Seal of Scaling Armor"; $runeplusmin = "+"; $runepower = 0.16; $runetype = "armor per level (+3 at champion level 18)";}
		else if($runeId == 5306){ $runename = "Greater Seal of Scaling Attack Damage"; $runeplusmin = "+"; $runepower = 0.06; $runetype = "attack damage per level (+1.09 at champion level 18)";}
		else if($runeId == 5370){ $runename = "Greater Seal of Scaling Energy Regeneration"; $runeplusmin = "+"; $runepower = 0.064; $runetype = "attack damage per level (+1.15 at champion level 18)";}
		else if($runeId == 5316){ $runename = "Greater Seal of Scaling Health"; $runeplusmin = "+"; $runepower = 1.33; $runetype = "health per level (+24 at champion level 18)";}
		else if($runeId == 5322){ $runename = "Greater Seal of Health Regeneration"; $runeplusmin = "+"; $runepower = 0.11; $runetype = "health regen / 5 sec. per level (+1.98 at champion level 18)";}
		else if($runeId == 5320){ $runename = "Greater Seal of Scaling Magic Resist"; $runeplusmin = "+"; $runepower = 0.1; $runetype = "magic resist per level (+1.8 at champion level 18)";}
		else if($runeId == 5330){ $runename = "Greater Seal of Scaling Mana"; $runeplusmin = "+"; $runepower = 1.17; $runetype = "mana per level (+21.06 at champion level 18)";}
		else if($runeId == 5332){ $runename = "Greater Seal of Scaling Mana Regeneration"; $runeplusmin = "+"; $runepower = 0.065; $runetype = "mana regen / 5 sec. per level (+1.17 at champion level 18)";}
		
		else{return "Lesser or normal runes are not supported yet!";}
		
		if(isset($runepower2)){ return $runeplusmin. ($count * $runepower)." ".$runetype."/".$runeplusmin2. ($count * $runepower2)." ".$runetype2; }
		else{ return $runeplusmin. ($count * $runepower)." ".$runetype; }
	}	
	function getmasteriesbyid($rank, $masteryId){		
		if($masteryId == 4242){ $masteryName = "Adaptive Armor"; 			$masterypos = "-96px -144px";	$ml = 275; $mt = 136;}
		else if($masteryId == 4324){ $masteryName = "Alchemist"; 			$masterypos = "-240px -192px";	$ml = 567; $mt = 52;}
		else if($masteryId == 4154){ $masteryName = "Arcane Blade"; 		$masterypos = "-384px -48px";	$ml = 151; $mt = 178;}
		else if($masteryId == 4133){ $masteryName = "Arcane Mastery"; 		$masterypos = "-0px -48px";		$ml = 109; $mt = 94;}
		else if($masteryId == 4143){ $masteryName = "Archmage"; 			$masterypos = "-192px -48px";	$ml = 109; $mt = 136;}
		else if($masteryId == 4352){ $masteryName = "Bandit"; 				$masterypos = "-192px -240px";	$ml = 483; $mt = 178;}
		else if($masteryId == 4141){ $masteryName = "Blade Weaving"; 		$masterypos = "-96px -48px";	$ml = 25; $mt = 136;}
		else if($masteryId == 4224){ $masteryName = "Bladed Armor"; 		$masterypos = "-288px -96px";	$ml = 359; $mt = 52;}
		else if($masteryId == 4211){ $masteryName = "Block"; 				$masterypos = "-0px -96px";		$ml = 233; $mt = 10;} 
		else if($masteryId == 4122){ $masteryName = "Brute Force"; 			$masterypos = "-240px -0px";	$ml = 109; $mt = 52;} 
		else if($masteryId == 4114){ $masteryName = "Butcher"; 				$masterypos = "-144px -0px";	$ml = 151; $mt = 10;}
		else if($masteryId == 4334){ $masteryName = "Culinary Master"; 		$masterypos = "-432px -192px";	$ml = 567; $mt = 94;}
		else if($masteryId == 4144){ $masteryName = "Dangerous Game"; 		$masterypos = "-240px -48px";	$ml = 151; $mt = 136;}
		else if($masteryId == 4152){ $masteryName = "Devastating Strikes"; 	$masterypos = "-336px -48px";	$ml = 67; $mt = 178;}
		else if($masteryId == 4111){ $masteryName = "Double-Edged Sword"; 	$masterypos = "-0px -0px";		$ml = 25; $mt = 10;}
		else if($masteryId == 4252){ $masteryName = "Enchanted Armor"; 		$masterypos = "-288px -144px";	$ml = 275; $mt = 178;}
		else if($masteryId == 4244){ $masteryName = "Evasive"; 				$masterypos = "-192px -144px";	$ml = 359; $mt = 136;}
		else if($masteryId == 4134){ $masteryName = "Executioner"; 			$masterypos = "-48px -48px";	$ml = 151; $mt = 94;}
		else if($masteryId == 4313){ $masteryName = "Expanded Mind"; 		$masterypos = "-48px -192px";	$ml = 525; $mt = 10;}
		else if($masteryId == 4121){ $masteryName = "Expose Weakness"; 		$masterypos = "-192px -0px";	$ml = 25; $mt = 52;}
		else if($masteryId == 4124){ $masteryName = "Feast"; 				$masterypos = "-336px -0px";	$ml = 25; $mt = 10;}
		else if($masteryId == 4312){ $masteryName = "Fleet of Foot"; 		$masterypos = "-0px -192px";	$ml = 483; $mt = 10;}
		else if($masteryId == 4151){ $masteryName = "Frenzy"; 				$masterypos = "-288px -48px";	$ml = 25; $mt = 178;}
		else if($masteryId == 4112){ $masteryName = "Fury"; 				$masterypos = "-48px -0px";		$ml = 67; $mt = 10;} 
		else if($masteryId == 4331){ $masteryName = "Greed"; 				$masterypos = "-288px -192px";	$ml = 441; $mt = 94;}
		else if($masteryId == 4233){ $masteryName = "Hardiness"; 			$masterypos = "-432px -96px";	$ml = 317; $mt = 94;}
		else if($masteryId == 4162){ $masteryName = "Havoc"; 				$masterypos = "-432px -48px";	$ml = 67; $mt = 220;}
		else if($masteryId == 4344){ $masteryName = "Inspiration"; 			$masterypos = "-144px -240px";	$ml = 567; $mt = 136;}
		else if($masteryId == 4353){ $masteryName = "Intelligence"; 		$masterypos = "-240px -240px";	$ml = 525; $mt = 178;}
		else if($masteryId == 4232){ $masteryName = "Juggernaut"; 			$masterypos = "-384px -96px";	$ml = 275; $mt = 94;}
		else if($masteryId == 4262){ $masteryName = "Legendary Guardian"; 	$masterypos = "-384px -144px";	$ml = 275; $mt = 220;}
		else if($masteryId == 4132){ $masteryName = "Martial Mastery"; 		$masterypos = "-432px -0px";	$ml = 67; $mt = 94;}
		else if($masteryId == 4343){ $masteryName = "Meditation"; 			$masterypos = "-96px -240px";	$ml = 525; $mt = 136;}
		else if($masteryId == 4123){ $masteryName = "Mental Force"; 		$masterypos = "-288px -0px";	$ml = 151; $mt = 52;}
		else if($masteryId == 4253){ $masteryName = "Oppression"; 			$masterypos = "-336px -144px";	$ml = 317; $mt = 178;}
		else if($masteryId == 4241){ $masteryName = "Perseverance"; 		$masterypos = "-48px -144px";	$ml = 233; $mt = 136;}
		else if($masteryId == 4311){ $masteryName = "Phasewalker"; 			$masterypos = "-432px -144px";	$ml = 441; $mt = 10;}
		else if($masteryId == 4212){ $masteryName = "Recovery"; 			$masterypos = "-48px -96px";	$ml = 275; $mt = 10;}
		else if($masteryId == 4243){ $masteryName = "Reinforced Armor"; 	$masterypos = "-144px -144px";	$ml = 317; $mt = 136;}
		else if($masteryId == 4234){ $masteryName = "Resistance"; 			$masterypos = "-0px -144px";	$ml = 359; $mt = 94;}
		else if($masteryId == 4332){ $masteryName = "Runic Affinity"; 		$masterypos = "-336px -192px";	$ml = 483; $mt = 94;}
		else if($masteryId == 4341){ $masteryName = "Scavenger"; 			$masterypos = "-0px -240px";	$ml = 441; $mt = 136;}
		else if($masteryId == 4314){ $masteryName = "Scout"; 				$masterypos = "-96px -192px";	$ml = 567; $mt = 10;}
		else if($masteryId == 4251){ $masteryName = "Second Wind"; 			$masterypos = "-240px -144px";	$ml = 233; $mt = 178;}
		else if($masteryId == 4113){ $masteryName = "Sorcery"; 				$masterypos = "-96px -0px";		$ml = 109; $mt = 10;} 
		else if($masteryId == 4131){ $masteryName = "Spell Weaving"; 		$masterypos = "-384px -0px";	$ml = 25; $mt = 94;}
		else if($masteryId == 4323){ $masteryName = "Strength of Spirit"; 	$masterypos = "-192px -192px";	$ml = 525; $mt = 52;}
		else if($masteryId == 4322){ $masteryName = "Summoner's Insight"; 	$masterypos = "-144px -192px";	$ml = 483; $mt = 52;}
		else if($masteryId == 4213){ $masteryName = "Swiftness"; 			$masterypos = "-96px -96px";	$ml = 317; $mt = 10;}
		else if($masteryId == 4231){ $masteryName = "Tenacious"; 			$masterypos = "-336px -96px";	$ml = 233; $mt = 94;}
		else if($masteryId == 4214){ $masteryName = "Tough Skin";			$masterypos = "-144px -96px";	$ml = 359; $mt = 10;}
		else if($masteryId == 4221){ $masteryName = "Unyielding";			$masterypos = "-192px -96px";	$ml = 233; $mt = 52;}
		else if($masteryId == 4333){ $masteryName = "Vampirism"; 			$masterypos = "-384px -192px";	$ml = 525; $mt = 94;}
		else if($masteryId == 4222){ $masteryName = "Veteran's Scars"; 		$masterypos = "-240px -96px";	$ml = 275; $mt = 52;}		
		else if($masteryId == 4362){ $masteryName = "Wanderer";		 		$masterypos = "-288px -240px";	$ml = 483; $mt = 220;}
		else if($masteryId == 4142){ $masteryName = "Warlord";		 		$masterypos = "-144px -48px";	$ml = 67; $mt = 136;}
		else if($masteryId == 4342){ $masteryName = "Wealth"; 				$masterypos = "-48px -240px";	$ml = 483; $mt = 136;}
					
		else{return "";}
		$masteriesurl = "url('pics/masteries/mastery0.png')";
		
		return '<div style="height:48px; width:48px; position:absolute; background: '.$masteriesurl.' '.$masterypos.' no-repeat; margin-left:'.$ml.'px; margin-top:'.$mt.'px;"><span class="masteryrank">'.$rank.'</span></div>';
		//return $masteryName." x".$rank;
	}
	
	function getmapbyid($mapid){
		if($mapid == 1){
			return "Summoner's Rift - Summer Variant";
		}
		else if($mapid == 2){
			return "Summoner's Rift - Autumn Variant";
		}
		else if($mapid == 3){
			return "The Proving Grounds - Tutorial map";
		}
		else if($mapid == 4){
			return "Twisted treeline - Old";
		}
		else if($mapid == 8){
			return "The Crystal Scar - Dominion maps";
		}
		else if($mapid == 10){
			return "Twisted Treeline - Current";
		}
		else if($mapid == 11){
			return "Summoner's Rift";
		}
		else if($mapid == 12){
			return "Howling Abyss - ARAM map";
		}
		else if($mapid == 14){
			return "Butcher's Bridge - ARAM map";
		}
		else{
			return "New map";
		}
	}
}

function cmp($a, $b){ //For each loop laten sorteren
	return $a['stats']['totalSessionsPlayed'] == $b['stats']['totalSessionsPlayed'] ? 0 : ($a['stats']['totalSessionsPlayed'] > $b['stats']['totalSessionsPlayed'] ? -1 : 1);
}
?>