	<body>
  
	<div class="container">
		
		<?php 
			include "head.php";
			include "navigation.php";
			
			if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
			{
				$sql = "SELECT * FROM user";
				
				$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			}
			else
			{
				echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
				exit();
			}
		?>

		
		<!--Card-->
		<div class="container mt-5">
			
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