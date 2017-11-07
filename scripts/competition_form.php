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
			  <li class="breadcrumb-item"><a href="<?php echo 'competition_entry.php' ?>">Competition</a></li>
			   <li class="breadcrumb-item active">1st Grade Form</li>
			</ul>
			
			<div id="img_container" class="sm-4">
				<img id="elementWallpaper" class="card-img-top" src="/emax/resources/Beauty-and-the-Beast-Emma-Watson-Josh-Gad-Man-Repeller.jpg" alt="Card image cap">
				<li id="listCompetition" class="list-group-item">Who is the main cast of Beauty And The Beast?</li>
			</div>
			
			<ul class="list-group mt-3 mt-3">
			  <a id="list-item-highlight" href="" data-toggle="modal" data-target="#myModal"><li class="list-group-item list-item">First Answer</li></a>
			  <a id="list-item-highlight" href=""><li class="list-group-item list-item">Second Answer</li></a>
			  <a id="list-item-highlight" href=""><li class="list-group-item list-item">Third Answer</li></a>
			  <a id="list-item-highlight" href=""><li class="list-group-item list-item">Forth Answer</li></a>
			</ul>
			
			
			<div class="modal fade" id="myModal">
					<div class="modal-dialog">
					  <div class="modal-content">
					  
						<!-- Modal Header -->
						<div class="modal-header">
						  <h4 class="modal-title">Complete Competition</h4>
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<!-- Modal body -->
						<div class="modal-body">
						  <div class="form-group">	  
							<div class="row ml-2">
								<label for="email">Do you want to submit your form? You may re-enter the competition anytime before the end date</label>
							</div>
						  </div>
						</div>
						
						<!-- Modal footer -->
						<div class="modal-footer">
						  <a href="<?php echo 'competition_form.php' ?>" class="btn btn-secondary">Complete</a>
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
