	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
			
			<h1> Create Thread</h1>
			
			<ul class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo 'discussion_manage.php' ?>">Manage Thread</a></li>
			  <li class="breadcrumb-item active">Create Thread</li>
			</ul>
			
			
			<div class="container">
				
				<div class="form-group">	  
					<div class="form-group">
						<label for="email">Title:</label>
						<input type="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="email">Description</label>
						<input type="email" class="form-control" id="email">
					</div>
					<button id="createItem" type="button" class="btn btn-info mt-3">Submit</button>
			    </div>	
			
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