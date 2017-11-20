	<?php include "head.php"?>
	
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		
		
		<!--Card-->
		<div class="container mt-5">
		
			<h1>Manage Gallery</h1>
			
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
				<li class="breadcrumb-item active">Manage Gallery</li>

			</ul>
			
			<div class="container">
				<div class="table-responsive">          
					<table class="table">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Event</th>
							<th>Description</th>
							<th>Date</th>
							<th>Image Link</th>
							<th id="operationHeader">Operation</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>1</td>
							<td>Emma Megastar Tour Asia</td>
							<td>The X factor winner performed in Singapore</td>
							<td>2017-07-08 19:00:00</td>
							<td>C:\xampp2\htdocs\emax\resources</td>
							<td>
								<a id="viewButton" href="<?php echo '' ?>" class="btn btn-secondary col-xl-4">View</a>
								<a id="updateButton" href="<?php echo '' ?>" class="btn btn-secondary col-xl-4">Update</a>
								<button id="deleteButton" type="button" class="btn btn-secondary col-xl-4">Delete</button>
							</td>
						  </tr>
						</tbody>
						<tbody>
						  <tr>
							<td>2</td>
							<td>Emma Megastar Tour Aussie</td>
							<td>The X factor winner performed in Australia</td>
							<td>2017-06-06 20:00:00</td>
							<td>C:\xampp2\htdocs\emax\resources</td>
							<td>
								<a id="viewButton" href="<?php echo '' ?>" class="btn btn-secondary col-xl-4">View</a>
								<a id="updateButton" href="<?php echo '' ?>" class="btn btn-secondary col-xl-4">Update</a>
								<button id="deleteButton" type="button" class="btn btn-secondary col-xl-4">Delete</button>
							</td>
						  </tr>
						</tbody>
						<tbody>
						  <tr>
							<td>3</td>
							<td>Emma Megastar Concert UK</td>
							<td>The X factor winner performed in UK</td>
							<td>2017-02-15 19:00:00</td>
							<td>C:\xampp2\htdocs\emax\resources</td>
							<td>
								<a id="viewButton" href="<?php echo '' ?>" class="btn btn-secondary col-xl-4">View</a>
								<a id="updateButton" href="<?php echo '' ?>" class="btn btn-secondary col-xl-4">Update</a>
								<button id="deleteButton" type="button" class="btn btn-secondary col-xl-4">Delete</button>
							</td>
						  </tr>
						</tbody>
					</table>
					
				
					
				</div>
				
				<div class="row">		
						<button id="createItem" type="button" class="btn btn-info mt-3">Create Gallery</button>
						<ul class="pagination col-sm-4 mt-3 mx-auto">
							<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
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