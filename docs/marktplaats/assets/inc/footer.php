				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
<?php
$stmt = $conn->query('SELECT type, url FROM socialmedia');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<li class="footer_li"><a href="'.$row['url'].'" class="fa fa-'.$row['type'].'" target="_blank"><span class="label">'.$row['type'].'</span></a></li>';
}
?>
						</ul>
						<ul class="copyright">
							<li>&copy; Marktplaats.nl</li>
						</ul>
					</footer>


		<!-- Scripts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
		
		<script src="http://dc-ictwebs.nl/103706/marktplaats/assets/js/main.js"></script>

	</body>
</html>