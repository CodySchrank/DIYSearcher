<!DOCTYPE html>
<html>
<head>
	<?php require("partials/head.php") ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/project.css">
</head>
<body>
<?php require("partials/header.php") ?>
		<div class="project-picture">
			<div class="container">
				<div class="row">
					<div class="two columns author">
						<img class="creator" src="/assets/pics/whale.jpg">
						<h6>By <a href="#">Arash Namvar</a></h6>
					</div>
					<div class="text-background ten columns">
						<h1>VHS video toaster</h1>
					</div>					
				</div>
			</div>
		</div>
	<div class="container">
		<div class="row description">
			<h5>The project was simple: convert a VHS video machine to make toast, and eject it through the cassette slot. semiotics Portland. Ennui organic DIY blog four dollar toast, next level VHS cardigan banh mi bicycle rights fingerstache stumptown butcher. Small batch kogi 3 wolf moon narwhal lomo whatever. Gluten-free four loko Williamsburg, VHS 3 wolf moon McSweeney's Wes Anderson migas fixie Truffaut. DIY kale chips locavore synth.

</h5>
		</div>
		<div class="row ratings">
			<span>Difficulty: </span><span class="bold moderate"> Moderate</span>
			<span>$</span><span class="light-dollar">$$$</span>
			<span >Overall Rating:</span> <span class="bold">10/10</span>
		</div>
		<div class="row kit-video">
			<div class="six columns">
				<embed class="video" src="http://www.youtube.com/v/fqQz_CBQKhw" type="application/x-shockwave-flash" wmode="transparent">
			</div>
			<div class="six columns kit-buy">
			<h4>Buy A VHS video toaster kit</h4>
				<div class="half-buy">
					<ul class="kit-items">
					<span class="bold"> Includes:</span>
						<li>Old VCR</li>
						<li>Cords</li>
						<li>dust</li>
						<li>candy</li>
							<li>Cords</li>
						<li>dust</li>
						<li>candy</li>
					</ul>
				</div>
				<div class="half-buy">
					<span class="bold"> Price:</span><h6>$19.99</h6>
					<form class="purchase-kit" action="/DIYS/BUY" method="POST">
						<select class="buy" name="quantity">
							<option value="1">1 Kit</option>
							<option value="2">2 Kits</option>
							<option value="3">3 Kits</option>
						</select>
						<input class="button-primary buy" type="submit" value="Buy">
					</form>
				</div>
			</div>
		</div>

	</div>

</body>
</html>