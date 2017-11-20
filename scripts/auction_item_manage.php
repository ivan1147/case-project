	<body>
  
	<div class="container">
		
		<?php 
			include "head.php";
			include "navigation.php";
		
			if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] ="Admin")
			{
			}
			else
			{
				echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
				exit();
			}
		
		?>

		
		<!--Card-->
		<div class="container mt-5">
			
			<h1>Manage Winter Auction Items</h1>
			
			<ul class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo 'auction_manage.php' ?>">Manage Auction</a></li>
			  <li class="breadcrumb-item active">Manage Winter Auction Items</li>
			</ul>
			
			
			<div class="container">
				
				<div class="table-responsive">          
					<table class="table">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Name</th>
							<th>Description</th>
							<th>Starting Price</th>
							<th>Created On</th>
							<th id="operationHeader">Operation</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>1</td>
							<td>Album Tour November</td>
							<td>This is the pop album</td>
							<td>GBP 35.00</td>
							<td>2017-10-24 15:16:45</td>
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
							<td>Album Tour October</td>
							<td>This is the jazz album</td>
							<td>GBP 35.00</td>
							<td>2017-10-24 15:17:00</td>
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
							<td>Album Tour September</td>
							<td>This is the pop album</td>
							<td>GBP 35.00</td>
							<td>2017-10-24 15:02:40	</td>
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
					<ul class="pagination col-xl-4 mt-3 mx-auto">
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