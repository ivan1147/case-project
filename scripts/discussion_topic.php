	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
		
			<h1>Imma Megastar Tour Asia</h1>
			
			<ul class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo 'discussion.php' ?>">Discussion Board</a></li>
			  <li class="breadcrumb-item active">Imma Megastar Tour Asia</li>
			</ul>
			
			
			<div class="container mt-5">
			
			<h4 class="card-text">Discuss about Asia Concert</h4>
			<hr>
			
			<div class="media mt-4">
			  <img id="triviaImage" class="d-flex mr-3" src="/emax/resources/img_avatar1.png" alt="Generic placeholder image">
			  <div class="media-body">
				<div class="row">
					<h5 class="col-sm-2 mt-0">ivan1147</h5>
					<span class="col-sm-2">2017-07-14</span>
					<div class="dropdown col-sm-1 ml-auto">
					  <button id="dropdownOption" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  </button>
					  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" data-toggle="modal" data-target="#myModal2">Reply Comment</a>
						<a class="dropdown-item" href="#">Report</a>
					  </div>
					</div>	
				</div>
				She looks stunning and beautiful in her first attempt. However, I feel that her voice is off pitch. Although he she has the talent, but she really needs more practices
				
				
				<div class="media mt-3">
				  <a class="d-flex pr-3" href="#">
					<img id="triviaImage" class="d-flex mr-3" src="/emax/resources/img_avatar2.png" alt="Generic placeholder image">
				  </a>
				  <div class="media-body">
					<div class="row">
						<h5 class="col-sm-2 mt-0">ivan1147</h5>
						<span class="col-sm-2">2017-07-14</span>
						<div class="dropdown col-sm-1 ml-auto mr-2">
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
				
			  </div>
			</div>
			<hr>
			
			<div class="media mt-4">
			  <img id="triviaImage" class="d-flex mr-3" src="/emax/resources/img_avatar2.png" alt="Generic placeholder image">
			  <div class="media-body">
				<div class="row">
				<h5 class="col-sm-2 mt-0">simon1147</h5>
				<span class="col-sm-2">2017-07-05</span>
				 <div class="dropdown col-sm-1 ml-auto">
				  <button id="dropdownOption" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  </button>
				  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" data-toggle="modal" data-target="#myModal2">Reply Comment</a>
					<a class="dropdown-item" href="#">Report</a>
				  </div>
				</div>
				</div>
				She looks stunning and beautiful in her first attempt. However, I feel that her voice is off pitch. Although he she has the talent, but she really needs more practice.s
				
			  </div>
			</div>
			
			<hr>
			
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Message</button>
			
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Add Message</h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
					  <div class="form-group">	  
						<div class="row ml-2">
							<label for="email">Message</label>
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
			
			<div class="modal fade" id="myModal2">
				<div class="modal-dialog">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Add Response</h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
					  <div class="form-group">	  
						<div class="row ml-2">
							<label for="email">Response</label>
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
			
			
			<ul class="pagination col-sm-4 pt-4 mx-auto">
				<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item active"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
			
		
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