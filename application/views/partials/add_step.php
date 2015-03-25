<form method="POST" action="/DIYS/add_basicsteps" enctype="multipart/form-data">
		 <div class="row">
		 	<div class="two columns step">
		 		<h2>STEP 1</h2>
		 	</div>
		 	<div class="seven columns">
		 		<label for="name">Name</label>
		 		<input class="u-full-width" name="name" type="text">
		 	</div>
		 <div class="three columns step">
			 	<label for="image">Picture for Step</label>
		   		<input type="file" name="userfile" multiple="multiple">
	    	</div>
		</div>
			<div class="row">
				<div class="twelve columns">
					<label for="description">Step Description</label>
		    		<textarea name="description" class="description u-full-width"></textarea>
		  		</div>
			</div>
		<div class="row">
			<div class="twelve columns">
		    	<input class="button u-full-width add-step" type="submit" value="Add STEP">
		    </div>
		</div>
	</form>