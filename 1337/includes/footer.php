<footer>
<?php
$q = basename($_SERVER['PHP_SELF']);
$location = explode(".", $q);

if($location[0] == "index"){
	
} 
else if($location[0] == "r1"){
	echo "	<i>Google is your best friend. <br>
			~ The 1337</i>";
} 
else if($location[0] == "1"){
	echo "	<i class='findmefgt'>Sometimes you just need to find the right beat. <br>
			~ The 1337</i>";
	echo "	<i class='findmescrb'> MCXCV <br>
			~ The 1337</i>";
} 
else if($location[0] == "kfc"){
	echo "	<i>You just hit the jackpot! <br>
			~ The 1337</i>";
} 
else if($location[0] == "penguins"){
	echo "	<i>Hope you can find what you're looking for. <br>
			~ The 1337</i>";
} 
else if($location[0] == "JohnCena"){
	echo "	<i>But how close do you think close is?<br>
			~ The 1337</i>";
} 
else if($location[0] == "close"){
	echo "<i>I am hiding in the dark..<br>
			~ The 1337</i>";
}
else if($location[0] == "lmao"){
	echo "<i>This is it,<br>
			Atleast for now..<br>
			~ The 1337</i>";
}
else if($location[0] == "end"){
	echo "<i>This is it,<br>
			Atleast for now..<br>
			~ The 1337</i>";
}
else {
	echo "<i>You made it this far, why stop now?<br>
			~ The 1337</i>";
}
?>
</footer>