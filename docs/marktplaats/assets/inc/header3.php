<div class="text-center" id="header">
<?php if(isset($_SESSION['logged_in'])){?>
	<div class='login'>
		<a href="http://dc-ictwebs.nl/103706/marktplaats/myaccount" class="action-button animate green">Mijn account</a>
		<a href="http://dc-ictwebs.nl/103706/marktplaats/uitloggen" class="action-button animate blue">Uitloggen</a>
	</div>
<?php }else{ ?>
	<div class='login'>
		<a href="http://dc-ictwebs.nl/103706/marktplaats/inloggen" class="action-button animate blue">Inloggen</a>
		<a href="http://dc-ictwebs.nl/103706/marktplaats/registreren" class="action-button animate red">Registreren</a>
	</div>
<?php } ?>
	<h1>Marktplaats</h1>
	<h3>Voor het kopen en verkopen van al uw spullen</h3>
</div>