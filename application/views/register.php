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
	<!-- LOGIN AND REGISTRATION VALIDATION -->
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
	<h2>Register</h2>
	<?
		if($this->session->flashdata('unique_registration_errors')) {
			echo "<p>".$this->session->flashdata('unique_registration_errors')."</p>";
		}
	?>
	<form action="/DIYS/register" method="post">
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