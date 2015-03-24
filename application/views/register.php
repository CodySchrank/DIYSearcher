<!DOCTYPE html>
<html>
<head>
	<? require('partials/head.php') ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/l_r.css">
</head>
<body>
	<? require('partials/header.php') ?>
<div class="container">
	<div class="row">
	<h2>Register</h2>
		<form action="/main/register" method="post">
			<div>
				<label>First Name:</label>
				<input type="text" name="first_name">
			</div>
			<div>
				<label>Last Name:</label>
				<input type="text" name="last_name">
			</div>
			<div>
				<label>Email:</label>
				<input type="text" name="email">
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password">
			</div>
			<div>
				<label>Confirm:</label>
				<input type="password" name="confirm">
			</div>
			<input type="submit" class="button-primary" value="Register">
		</form>
	</div>
</div>
</body>
</html>