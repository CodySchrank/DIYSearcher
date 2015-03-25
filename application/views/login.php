<!-- Check if logged in -->
<?
if($this->session->userdata('user')) {
	redirect('/browse');
}
?>
<!DOCTYPE html>
<html>
<head>
	<? require('partials/head.php') ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/l_r.css">
	<!-- LOGIN VALIDATION ERRORS -->
	<?
		if($this->session->flashdata('errors')) {
			$errors = $this->session->flashdata('errors');
			foreach ($errors as $error) {
			?>
				<script type="text/javascript">
					$(document).ready(function(){
						$('input[name="<?=$error?>"]').addClass('error');
						$('input').keypress(function(){
							$(this).removeClass('error');
						});
					});
				</script>
			<?
			}
		}
	?>
</head>
<body>
	<? require('partials/header.php') ?>
<div class="container">
	<div class="row">
	<h2>Login</h2>
	<?
		if($this->session->flashdata('unique_login_errors')) {
			echo "<p>".$this->session->flashdata('unique_login_errors')."</p>";
		}
	?>
		<form action="/DIYS/login" method="post">
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