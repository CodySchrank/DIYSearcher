<!DOCTYPE html>
<html>
<head>
	<? require('partials/head.php');
	// VALIDATION ERRORS
		if($this->session->flashdata('errors')) {
			$errors = $this->session->flashdata('errors');
			foreach ($errors as $error) {
			?>
				<script type="text/javascript">
					$(document).ready(function(){
						$('[name="<?=$error?>"]').addClass('error').change(function(){
							$(this).removeClass('error');
						});
					});
				</script>
			<?
			}
		}
	?>
	<link rel="stylesheet" type="text/css" href="/assets/css/add_kit.css">
</head>
<body>
<? require('partials/header.php') ?>
<div class="container">
	<div class="row">
		<h3>Add Kit</h3>
		<form action="/diys/add_kit" method="post">
			<div>
				<label>Name:</label>				
				<input type="text" name="name">
			</div>
			<div>
				<label>Description:</label>				
				<textarea name="description"></textarea>
			</div>
			<div>
				<label>Price:</label>				
				<input type="number" name="price">
			</div>
			<input type="submit" value="Add Kit">
		</form>
	</div>
</div>
</body>
</html>