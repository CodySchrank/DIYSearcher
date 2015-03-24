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
	<h2>Login</h2>
		<form action="/main/login" method="post">
			<div>
				<label>Email:</label>
				<input type="text" name="email">
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password">
			</div>
			<input type="submit" class="button-primary" value="Login">
		</form>
	</div>
</div>
</body>
</html>