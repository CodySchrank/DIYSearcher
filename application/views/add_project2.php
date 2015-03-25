<!DOCTYPE html>
<html>
<head>
	<?php require("partials/head.php") ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/add_project2.css">
	<script type="text/javascript">
	$(document).ready(function(){
		$.get("/DIYS/add_step_partial", function(res) {
			$('.steps').html(res);
		});
		$("form").submit(function(){
			$.POST("/DIYS/add_basicsteps", $(this).serialize(), function(res){
				$(".steps").html(res);
			});
			return false;
		})
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
	<div class="steps">
		
	</div>
	
</div>
</body>
</html>