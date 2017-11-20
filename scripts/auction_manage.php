	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
			
			<h1> Manage Auction</h1>
			
			<ul class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Manage Auction</li>
			</ul>
			
			
			<div class="container">
				
				<div class="table-responsive">          
					<table class="table">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Title</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Status</th>
							<th>Created On</th>
							<th id="operationHeader">Operation</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>1</td>
							<td>Winter Auction</td>
							<td>2017-11-01</td>
							<td>2017-12-01</td>
							<td>Ongoing</td>
							<td>2017-10-24 23:11:05</td>
							<td>
								<a id="viewButton" href="<?php echo 'auction_item_manage.php' ?>" class="btn btn-secondary col-xl-4">View</a>
								<a id="updateButton" href="<?php echo '' ?>" class="btn btn-secondary col-xl-4">Update</a>
								<button id="deleteButton" type="button" class="btn btn-secondary col-xl-4">Delete</button>
							</td>
						  </tr>
						</tbody>
						<tbody>
						  <tr>
							<td>2</td>
							<td>Autumn Auction</td>
							<td>2017-10-01</td>
							<td>2017-11-01</td>
							<td>Ended</td>
							<td>2017-09-21 15:16:45</td>
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
							<td>Spring Auction</td>
							<td>2017-09-01</td>
							<td>2017-10-01</td>
							<td>Ended</td>
							<td>2017-09-21 14:00:25</td>

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
					<a id="createItem" href="<?php echo 'discussion_create.php' ?>" class="btn btn-info mt-3">Create Auction</a>
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