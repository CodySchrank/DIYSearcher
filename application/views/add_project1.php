<!DOCTYPE html>
<html>
<head>
	<?php require("partials/head.php") ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/add_project1.css">
</head>
<body>
	<?php require("partials/header.php") ?>
<div class="container">
	<div class="row">
		<div class="twelve columns progress-holder">
			<div class="progress-selected">1</div>
			<div class="progress middle">2</div>
			<div class="progress right">3</div>	
		</div>
	</div>
	<form method="POST" action="/DIYS/add_basicproject" enctype="multipart/form-data">
		  <div class="row">
		    <div class="six columns">
		      <label for="title">Project Title</label>
		      <input class="u-full-width" type="text" name="title" placeholder="ex: Space Toaster for Cats">
		    </div>
		    <div class="two columns">
		      <label for="difficulty">Difficulty</label>
		      <select class="u-full-width" name="difficulty">
		      	<option value="1"></option>
		        <option value="1">Easy</option>
		        <option value="2">Moderate</option>
		        <option value="3" >Hard</option>
		      </select>
		    </div>
		   <div class="two columns">
		      <label for="ratings">Rating</label>
		      <select class="u-full-width" name="ratings">
		      	<option value="1"></option>
		        <option value="1">1</option>
		        <option value="2">2</option>
		        <option value="3" >3</option>
		        <option value="4" >4</option>
		        <option value="5" >5</option>
		      </select>
		    </div>
		    <div class="two columns">
		      <label for="expensive">Cost</label>
		      <select class="u-full-width" name="expensive">
		     	<option value="1"></option>
		        <option value="1">1 (Cheapest)</option>
		        <option value="2">2</option>
		        <option value="3" >3</option>
		        <option value="4" >4</option>
		        <option value="5" >5 (Most Expensive)</option>
		      </select>
		    </div>
		  </div>
		  <div class="row">
		 	 <label for="description">Project Description</label>
		 	 <textarea class="u-full-width description" name="description" placeholder="This is a project for if your cat is traveling to outter space and needs help"></textarea>
		  </div>
		<div class="row">
			<div class="four columns">
			 	<label for="userfile">Main Project Picture (at least 200x800)</label>
		    	<input type="file" name="userfile" multiple="multiple">
	    	</div>
			<div class="six columns">
			 	<label  for="video">video URL</label>
		    	<input class="u-full-width" placeholder="YouTube only please" type="text" name="video">
	    	</div>
	    </div> 	
		<div class="row">
			<input type="hidden" value="<?= $this->session->userdata('id')?>" name="user_id">
		    <input class="button-primary" type="submit" value="Submit">
		</div>
	</form>
</div>
</body>
</html>