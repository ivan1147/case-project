	<?php include "head.php"?>
	
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		
		
		<!--Card-->
		<div class="container mt-5">
		
			<h1>Upload Image</h1>
			
			
			
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo 'gallery.php' ?>">Gallery</a></li>
				<li class="breadcrumb-item"><a href="<?php echo 'gallery_images.php' ?>">Imma Mega Tour Asia</a></li>
				<li class="breadcrumb-item active">Upload Image</li>

			</ul>
			
			<div class="container">
				<form>
				  <div class="form-group">
					<label for="email">Title</label>
					<input type="email" class="form-control" id="email">
				  </div>
				  <div class="form-group">
					<label for="pwd">Description</label>
					<input type="password" class="form-control" id="pwd">
				  </div>
				  <div class="form-group">
					<label for="pwd">Choose Image</label>
					<input type="password" class="form-control" id="pwd">
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
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