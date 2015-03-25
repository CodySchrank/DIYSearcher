<!DOCTYPE html>
<html>
<head>
	<?php require("partials/head.php") ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/add_project3.css">
	<script type="text/javascript">

	var lol = '<div class="row"><div class="two columns step"><h2>STEP 1</h2></div><div class="seven columns"><label for="name">Name</label><input class="u-full-width" name="name" type="text"></div><div class="three columns step"><label for="image">Picture for Step</label><input type="file" name="image"></div></div><div class="row"><div class="twelve columns"><label for="description">Step Description</label><textarea class="description u-full-width"></textarea></div></div><div class="sad-div"></div>';
	$(document).ready(function(){
		$(".add-step").click(function(){
			$(".add-step").before(lol);
		});
	});
	</script>
</head>
<body>
	<?php require("partials/header.php") ?>
<div class="container">
	<div class="row">
		<div class="twelve columns progress-holder">
			<div class="progress">1</div>
			<div class="progress middle">2</div>
			<div class="progress-selected right">3</div>	
		</div>
	</div>
	<div class="row">
		<div class="twelve columns">
			<h1>YOU DID IT!!</h1>
		</div>
	</div>
	<div class="row">
		<div class="twelve columns">
			<a class="link u-full-width" href=""><h6>Here's the URL to your project &#9829</h6></a>
		</div>
	</div>
</div>
</body>
</html>