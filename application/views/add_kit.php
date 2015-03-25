<!DOCTYPE html>
<html>
<head>
	<? require('partials/head.php') ?>
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
				<input type="text" name="description">
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