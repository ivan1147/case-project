	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php 
			include "navigation.php";
			include "head.php";
			
			if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
			{
				$userId = $_GET['userId'];
				
				$sql = "SELECT * FROM user WHERE userId = '$userId'";
				$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
				
				while($row = mysqli_fetch_assoc($sql))
				{
					$username = $row['username'];
				}
			}
			else
			{
				echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
				exit();
			}
			
			
			
			if(isset($_POST['activityNumber']))
			{
				$activityNumber = $_POST['activityNumber'];

				
				$sql = "SELECT name, COUNT(name) FROM activity WHERE userId = '$userId' AND categoryId = '$activityNumber' GROUP BY name";
				
				$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
				
				
				$activityArr = array();
				
				while($row = mysqli_fetch_assoc($sql)) {
					$activityArr[] = $row;
				}
				
				
				$dataPoints = array();
				foreach ( $activityArr as $activityArr2 ) {
					array_push($dataPoints, array("y" => $activityArr2['COUNT(name)'], "label" => $activityArr2['name']));
				}
				
				$dataPoints2 = array();
				foreach ( $activityArr as $activityArr2 ) {
					array_push($dataPoints2, array("y" => $activityArr2['COUNT(name)'], "name" => $activityArr2['name']));
				}
				

			}

		?>
		
	
		<!--Card-->
		<div class="container mt-5">
		
			<h1>User Statistical Report</h1>

			<ul class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="<?php echo 'index.php' ?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo 'admin_user_manage.php' ?>">User Management</a></li>
				<?php echo"<li class='breadcrumb-item'><a href='admin_user_profile.php?userId=$userId'>User Profile</a></li>
				<li class='breadcrumb-item active'>User Statistical Report</li>";?>
			</ul>
			
			
		
			<div class="dropdown float-right ml-2 mt-2 mr-2">
				<form id="memberReport" method="post">
					<select class="form-control" name="activityNumber" onchange="this.form.submit()">
					<?php 
					
					
					if($activityNumber == 1)
					{						
						echo "<option value='1' selected>Administration</option>";
					}
					else
					{	
						echo "<option value='1'>Administration</option>";
					}
					
					
					if($activityNumber == 2)
					{	
						echo "<option value='2' selected>Gallery</option>";
					}
					else
					{	
						echo "<option value='2'>Gallery</option>";
					}
					
					if($activityNumber == 3)
					{	
						echo "<option value='3' selected>Discussion</option>";
					}
					else
					{	
						echo "<option value='3'>Discussion</option>";
					}
					
					if($activityNumber == 4)
					{	
						echo "<option value='4' selected>Competition</option>";
					}
					else
					{	
						echo "<option value='4'>Competition</option>";
					}
					
					if($activityNumber == 5)
					{	
						echo "<option value='5' selected>Auction</option>";
					}
					else
					{	
						echo "<option value='5'>Auction</option>";

					}
					?>
						<!--echo activityNumber == 1 ? 'selected="selected"':'';-->
					</select>
				</form>
			</div>
			
			<?php
				if(empty($_POST['activityNumber']))
				{
					echo "<script type='text/javascript'>document.getElementById('memberReport').submit()</script>";
				}
			?>
		</div>
	
	<h3 class="mt-2 ml-4 mb-4">Username: <?php echo $username; ?></h3>
	<div id="chartContainer" style="width: 45%; height: 300px;display: inline-block;"></div>
	<div id="chartContainer2" style="width: 45%; height: 300px;display: inline-block;"></div>	
	
	<?php include "footer.php"; ?>
	
	</div>

	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});
		
		 
		$(function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: "Administration"
				},
				data: [
				{
					type: "column",                
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}
				]
			});
			chart.render();
		});
		
		$(function () {
			var chart2 = new CanvasJS.Chart("chartContainer2", {
				animationEnabled: true,
				title: {
					text: "Administration"
				},
				data: [
				{
					type: "pie",
					showInLegend: true,
					toolTipContent: "{name}: <strong>{y}%</strong>",
					indexLabel: "{name} {y}%",
					dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
				}
				]
			});
			chart2.render();
		});
		
	
		
	</script>
	
  </body>
  
  
</html>