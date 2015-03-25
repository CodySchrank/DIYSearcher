<header class="row">
	
	<h2>DIYSearcher</h2>

	<a href="/popular">Popular</a>

	<a href="/browse/all">Browse All</a>

	<a href="/browse/new">New Postings</a>
	<div>

	<a href="/checkout" id="checkout"></a>

	<button id="profile">
	<ul style="display: none">
<<<<<<< HEAD
	<?
		if($this->session->userdata('logged_in') == TRUE) {
	?>
=======
		<?
		if($this->session->userdata('logged_in') == TRUE) {
			if($this->session->userdata['user']['permission'] == 9) {
				echo '<li><a href="/dashboard">Dashboard</a></li>';
			}
		?>
>>>>>>> 06e2ffedb831a2ee6efe7d936e39a2958356303c
		<li><a href="/profile">Profile</a></li>
		<li><a href="/DIYS/logoff">Log Out</a></li>
	<?
	} else {
	?>
		<li><a href="/login">Sign In</a></li>
		<li><a href="/register">Register</a></li>
		<li><a href="/diy">Create DIY</a></li>
	<? } ?>
	</ul>
	</button>
	</div>
</header>