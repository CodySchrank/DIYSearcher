<!DOCTYPE html>
<html>
<head>
	<? require('partials/head.php') ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/admin_dashboard.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$.get('/DIYS/dashboard_info/orders', function(res){
				$("#results").html(res);
			});

			$('button').click(function(){
				$.post($(this).attr('formaction'), function(res){
					$("#results").html(res);
				});
			});

			$('form').submit(function(){
				return false;
			});
		});
	</script>
</head>
<body>
<? require('partials/header.php') ?>
<div class="container">
	<div class="row">
		<h2>Admin Dashboard</h2>
		<form>
			<button formaction="/DIYS/dashboard_info/orders">Orders</button>
			<button formaction="/DIYS/dashboard_info/kits">kits</button>
			<button formaction="/DIYS/dashboard_info/projects">projects</button>		
		</form>
		<div id="results">
		</div>
	</div>
	<div class="row" id="last">
		<h3>Admin Stuff</h3>
		<a href="/add_kit"><button>Add Kit</button></a>
		<a href="/DIYS/add_project"><button>Add Project</button></a>
		<a href="/DIYS/add_user"><button>Add User</button></a>
	</div>
</div>
<? // require('partials/footer.php') ?>
</body>
</html>