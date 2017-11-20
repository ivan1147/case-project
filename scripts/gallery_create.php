	<?php include "head.php"?>
	
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		
		
		<!--Card-->
		<div class="container mt-5">
		
			<h1>Create Gallery</h1>
			
			
			
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo 'gallery_manage.php' ?>">Manage Gallery</a></li>
				<li class="breadcrumb-item active">Create Gallery</li>

			</ul>
			
			<div class="container">
				<form>
				  <div class="form-group">
					<label for="email">Event</label>
					<input type="email" class="form-control" id="email">
				  </div>
				  <div class="form-group">
					<label for="pwd">Description</label>
					<input type="password" class="form-control" id="pwd">
				  </div>
				  <div class="form-group">
					<label for="pwd">Date & Time</label>
					<input type="password" class="form-control" id="pwd">
				  </div>
				  <div class="form-group">
					<label for="pwd">Image Link</label>
					<input type="password" class="form-control" id="pwd">
				  </div>
				  <button type="submit" class="btn btn-info">Submit</button>
				</form>
			</div>
			
			
			
			
		</div>
		
		
		<!--Footer-->
		<?php include "footer.php"?>
		
	  
	</div>

	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
	
  </body>
  
  
</html>