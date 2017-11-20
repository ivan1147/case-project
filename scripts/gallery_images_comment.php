	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php 
			include "navigation.php";
			include "head.php";
			
			if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']))
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
		
			<h1>Stage 1st Song</h1>
			
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo 'gallery.php' ?>">Gallery</a></li>
				<li class="breadcrumb-item"><a href="<?php echo 'gallery_images.php' ?>">Imma Megastar Tour Asia</a></li>
				<li class="breadcrumb-item active">Stage 1st Song</li>
			</ul>
			
				<div class="xl-4">
					<img id="elementWallpaper" class="card-img-top" src="/emax/resources/gallery-embargoed-until-midnight-on-sunday-4-october-19.jpg" alt="Card image cap">
				</div>
					
				<h3 class="mt-5">Comment Section</h3>
				
				<div class="media mt-4">
				  <img id="triviaImage" class="d-flex mr-3" src="/emax/resources/img_avatar1.png" alt="Generic placeholder image">
				  <div class="media-body">
					<div class="row">
					<h5 class="col-xl-2 mt-0">ivan1147</h5>
					<span class="col-xl-2">2017-07-14</span>
					<div class="dropdown col-sm-1 ml-auto">
					  <button id="dropdownOption" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  </button>
					  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Report</a>
					  </div>
					</div>
					</div>
					She looks stunning and beautiful in her first attempt. However, I feel that her voice is off pitch. Although he she has the talent, but she really needs more practices
					
				  </div>
				</div>
				<hr>
				<div class="media mt-4">
				  <img id="triviaImage" class="d-flex mr-3" src="/emax/resources/img_avatar2.png" alt="Generic placeholder image">
				  <div class="media-body">
					<div class="row">
					<h5 class="col-xl-2 mt-0">simon1147</h5>
					<span class="col-xl-2">2017-07-05</span>
					 <div class="dropdown col-sm-1 ml-auto">
					  <button id="dropdownOption" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  </button>
					  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Report</a>
					  </div>
					</div>
					</div>
					She looks stunning and beautiful in her first attempt. However, I feel that her voice is off pitch. Although he she has the talent, but she really needs more practice.s
					
				  </div>
				</div>
				
				<hr>
				
				<div class="container">
					<div class="row">
						<button id="createItem" type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#myModal">Add Comment</button>
						<ul class="pagination col-xl-4 mt-3 mx-auto">
							<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</div>
				</div>
			
				<div class="modal fade" id="myModal">
					<div class="modal-dialog">
					  <div class="modal-content">
					  
						<!-- Modal Header -->
						<div class="modal-header">
						  <h4 class="modal-title">Add Comment</h4>
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<!-- Modal body -->
						<div class="modal-body">
						  <div class="form-group">	  
							<div class="row ml-2">
								<label for="email">Comment</label>
							</div>
							<div class="row ml-2">
								<textarea id="textArea" rows="4" cols="60">
							</textarea>
							</div>

						  </div>
						</div>
						
						<!-- Modal footer -->
						<div class="modal-footer">
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Submit</button>
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
						
					  </div>
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