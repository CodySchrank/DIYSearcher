<!DOCTYPE html>
<html>
<head>
	<?php require("partials/head.php") ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/add_project2.css">
	<script type="text/javascript">

	var lol = '<div class="row"><div class="two columns step"><h2>STEP</h2></div><div class="seven columns"><label for="name">Name</label><input class="u-full-width" name="name" type="text"></div><div class="three columns step"><label for="image">Picture for Step</label><input type="file" name="image"></div></div><div class="row"><div class="twelve columns"><label for="description">Step Description</label><textarea class="description u-full-width"></textarea></div></div><div class="sad-div"></div>';
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
			<div class="progress-selected middle">2</div>
			<div class="progress right">3</div>	
		</div>
	</div>
	<form enctype="multipart/form-data">
		 <div class="row">
		 	<div class="two columns step">
		 		<h2>STEP</h2>
		 	</div>
		 	<div class="seven columns">
		 		<label for="name">Name</label>
		 		<input class="u-full-width" name="name" type="text">
		 	</div>
		 <div class="three columns step">
			 	<label for="image">Picture for Step</label>
		   		<input type="file" name="image">
	    	</div>
		</div>
			<div class="row">
				<div class="twelve columns">
					<label for="description">Step Description</label>
		    		<textarea class="description u-full-width"></textarea>
		  		</div>
			</div>
			<div class="sad-div">
			</div>
		<div class="row">
				<div class="twelve columns">
					<div class="button u-full-width add-step">Add STEP</div>
		  		</div>
			</div>

		<div class="row">
		    <input class="button-primary" type="submit" value="Submit">
		</div>
	</form>
</div>
</body>
</html>