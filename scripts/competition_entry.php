	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
		
			<h1>Competition</h1>
			
			<ul class="breadcrumb mb-0	">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Competition</li>
			</ul>
			
			<div id="jumbotronBackground" class="jumbotron mb-0">
				<h1 id="fontWhite" class="display-5 text-center">Competition</h1>
			</div>
			
			<div id="img_container">
				<div class="sm-4">
					<img id="elementWallpaper" class="card-img-top" src="/emax/resources/Competition-at-Work-3-Steps-to-Keep-It-Healthy-and-Motivational-1200x630.png" alt="Card image cap">
				</div>
				<button type="button" class="btn btn-warning" id="buttonCompetition" data-toggle="modal" data-target="#myModal">Participate Now</button>
			</div>
			
			
			
			<div class="modal fade" id="myModal">
					<div class="modal-dialog">
					  <div class="modal-content">
					  
						<!-- Modal Header -->
						<div class="modal-header">
						  <h4 class="modal-title">1st Grade Form</h4>
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<!-- Modal body -->
						<div class="modal-body">
						  <div class="form-group">	  
							<div class="row ml-2">
								<label for="email">Winner Notification Date:</label>
							</div>
							<div class="row ml-2">
								<label for="email"><strong>2017-11-20</strong></label>
							</div>
							<div class="row ml-2 mt-3">
								<label for="email">Note: Competition will be closed 2 days before the winner notification date</label>
							</div>

						  </div>
						</div>
						
						<!-- Modal footer -->
						<div class="modal-footer">
						  <a href="<?php echo 'competition_form.php' ?>" class="btn btn-secondary">Enter</a>
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