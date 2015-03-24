<!DOCTYPE html>
<html>
<head>
<? require('partials/head.php') ?>
<link rel="stylesheet" type="text/css" href="/assets/css/index.css">
</head>
<body>
	<? require('partials/header_index.php') ?>
<img id="background" src='/assets/pics/index-background.jpg'>
<div class="container">
<div class="row search">
	<h2>Tagline</h2>
	<form action="/search" method="post">
		<input type="text" name="search">
		<input type="submit" value="Search">
	</form>
</div>
<div class="row">
	<h2>Discover Your Next Project</h2>
</div>
<div class="row discover">
	<div class="five columns">
		<a href="/browse" id="browse-projects"></a>
		<p>Browse Projects</p>
	</div>
	<div class="two columns"><p id="arrow-icon"></p></div>
	<div class="five columns">
		<a id="find-projects"></a>
		<p>Find Projects</p>
	</div>
</div>
<div class="row popular">
	<h3>Popular DIY Projects</h3>
</div>
<div class="row">
	<div class="four columns">
		<h4>Title</h4>
		<p>Description</p>
	</div>
	<div class="four columns">
		<h4>Title</h4>
		<p>Description</p>
	</div>
	<div class="four columns">
		<h4>Title</h4>
		<p>Description</p>
	</div>
</div>
</div>
</body>
</html>