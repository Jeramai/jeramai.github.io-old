<?php include 'includes/head.php'; //include de head bestanden 

$cookie_name = "You_cant_turn_back_now";
$cookie_value = "0";
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
?>
<div class='wrapper'>
	<div class='welcome'>
		<p class="line-1 anim-typewriter">Welcome on 1337. </p>
		<p class="line-2 anim-typewriter2">We hope you can make it till the end;</p>
	</div>
	<div class='riddle1'>
		<p class='riddleh1'>Here is your first riddle:</p>
		<blockquote class='riddlequote'>
			<i>We are doing it for the lulz.</i>
		</blockquote>
		<a href='r1' class='riddle_a'>Who are doing it for the lulz?</a>
	</div>
</div>