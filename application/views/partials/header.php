<header class="row">
	
	<h2>DIYSearcher</h2>

	<a href="/popular">Popular</a>

	<a href="/browse/all">Browse All</a>

	<a href="/browse/new">New Postings</a>
	<div>
	<form action="/search" method="post">
		<input type="text" name="search">
		<a id="search"></a>
	</form>

	<a href="/checkout" id="checkout"></a>

	<button id="profile">
	<ul style="display: none">
		<?
			if($this->session->userdata('logged_in') == TRUE) {
				if($this->session->userdata['user']['permission'] == 9) {
					echo '<li><a href="/dashboard">Dashboard</a></li>';
				}
		?>
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