<?php 
	include('assets/inc/header2.php');
?>
				<!-- Main -->
					<article id="main">
						<header>
							<h2>Buy a ticket</h2>
							<p>Buy a ticket and help us get more trees in this world!</p>
						</header>
						<section class="wrapper style3">
							<div class="inner">
								<h2>Order your tree</h2>
								<form method="post" action="#">
									<div class="row uniform">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
										</div>
										<div class="6u$ 12u$(xsmall)">
											<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
										</div>
										<div class="12u$">
											<div class="select-wrapper">
												<select name="demo-category" id="demo-category">
													<option value="">- Tree -</option>
													<option value="1">Normal</option>
													<option value="2">Pink</option>
													<option value="3">Mini</option>
													<option value="4">Rainforrest</option>
												</select>
											</div>
										</div>
										<div class="4u 12u$(small)">
											<input type="radio" id="demo-priority-low" name="demo-priority" checked>
											<label for="demo-priority-low" title='2 to 3 days'>Fast shipment</label>
										</div>
										<div class="4u 12u$(small)">
											<input type="radio" id="demo-priority-normal" name="demo-priority">
											<label for="demo-priority-normal" title='2 to 3 weeks'>Normal shipment</label>
										</div>
										<div class="4u$ 12u$(small)">
											<input type="radio" id="demo-priority-high" name="demo-priority">
											<label for="demo-priority-high" title='2 to 3 months (or years, we dont care)'>'Got all the time' shipment</label>
										</div>
										<div class="12u$">
											<textarea name="demo-message" id="demo-message" placeholder="Got a message you want to give to the tree?" rows="6"></textarea>
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><a href="#" class="button special icon fa-paypal">Pay with PayPal</a></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
						</section>
						
						<section class='wrapper style6'>
							<div class='inner'>
								
							</div>
						</section>
						
					</article>

<?php 
	include('assets/inc/footer.php');
?>