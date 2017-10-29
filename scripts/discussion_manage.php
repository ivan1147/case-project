	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
			
			<h1> Manage Thread</h1>
			
			<ul class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Manage Thread</li>
			</ul>
			
			
			<div class="container">
				
				<div class="table-responsive">          
					<table class="table">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Title</th>
							<th>Description</th>
							<th>SubCategory</th>
							<th>View</th>
							<th>Created On</th>
							<th id="operationHeader">Operation</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>1</td>
							<td>Emma Megastar Tour Asia</td>
							<td>Discuss about Asia Concert</td>
							<td>Concert</td>
							<td>8</td>
							<td>2017-10-25 23:00:00</td>
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
							<td>Discuss about Australia Concert</td>
							<td>Concert</td>
							<td>10</td>
							<td>2017-10-15 23:15:49</td>
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
							<td>Discuss about UK Concert</td>
							<td>Concert</td>
							<td>16</td>
							<td>2017-10-14 14:00:02</td>
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
						<a id="createItem" href="<?php echo 'discussion_create.php' ?>" class="btn btn-info mt-3">Create Thread</a>
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