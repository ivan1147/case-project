<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";	
		
		$sql = "SELECT * FROM user";
		
		$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
		if(isset($_GET['userId']))
		{	
			$userId = $_GET['userId'];
			
			$sql = "DELETE FROM user WHERE userId = '$userId'";
			$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
		}
		
		if(isset($_SESSION['adminMemberSuccess']))
		{
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal10').modal('show');
					});
				</script>";
		}
		
		if(isset($_SESSION['adminMemberRemain']))
		{
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal10').modal('show');
					});
				</script>";
		}
		
		if(isset($_SESSION['adminMemberfailed']))
		{
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal10').modal('show');
					});
				</script>";
		}
	?>
	
	
	
	<!--Card-->
	<div class="container mt-5">
	
		<h1>Manage User</h1>
		
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			<li class="breadcrumb-item active">Manage User</li>

		</ul>
		
		<div class="container">
			<div class="table-responsive">          
				<table class="table" >
					<thead class="text-center">
					  <tr>
						<th>User ID</th>
						<th>Username</th>
						<th>Full Name</th>
						<th>Date of Birth</th>
						<th>Email Address</th>
						<th>Status</th>
						<th>Role</th>
						<th id="operationHeader">Operation</th>
					  </tr>
					</thead>
					<tbody class="text-center">
						<?php
							while ($row = mysqli_fetch_assoc($sql)){
								$userId	= $row["userId"];
								$username = $row["username"];
								$fullName = $row["fullName"];
								$birthDate = $row["birthDate"];
								$emailAddress = $row["emailAddress"];
								$status = $row["status"];
								$role = $row["role"];
								
								echo"<tr>
									<td>$userId</td>
									<td>$username</td>
									<td>$fullName</td>
									<td>$birthDate</td>
									<td>$emailAddress</td>
									<td>$status</td>
									<td>$role</td>
									<td>
										<a id='viewButton' href='user_profile.php?userId=$userId' class='btn btn-secondary col-xl-4'>View</a>
										<a id='updateButton' href='user_update.php?userId=$userId' class='btn btn-secondary col-xl-4'>Update</a>
										<button id='deleteButton' data-href='user_manage.php?userId=$userId' class='btn btn-secondary' name='adminMemberDeleteSub' data-toggle='modal' data-target='#myModal11'>Delete</a>
									
									</td>
								  </tr>";
							}
						
						?>
					 
					</tbody>
				</table>
				
			
				
			</div>
			
			<div class="container">
				<div class="row">		
					<a href="user_create.php" id="createItem" class="btn btn-info mt-3">Create User</a>
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
		
		
		
		
	</div>
	
	<div class="modal fade" id="myModal10">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<?php
						if($_SESSION['adminMemberSuccess'])
						{
							echo "<h4 class='modal-title'>Update Successful</h4>";
							$_SESSION['adminMemberSuccess'] = null;
						}
						
						if($_SESSION['adminMemberRemain'])
						{
							echo "<h4 class='modal-title'>Update No Change</h4>";
							$_SESSION['adminMemberRemain'] = null;
						}
						
						if($_SESSION['adminMemberFailed'])
						{
							echo "<h4 class='modal-title'>Update Failed</h4>";
							$_SESSION['adminMemberFailed'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				  <button class="btn btn-secondary" data-dismiss="modal">OK</button>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal11">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class='modal-title'>Delete this user?</h4>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					
					<a class='btn btn-secondary btn-confirm'>Submit</a>
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
	
	$('#myModal11').on('show.bs.modal', function(e) {
		$(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
	});
</script>

</body>
  
  
</html>