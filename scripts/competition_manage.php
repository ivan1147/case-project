<?php 
include "head.php";
?>
	
<body>
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		<!--Card-->
		<div class="container">
			<?php 
				//define how many results you want per page
				$results_per_page = 10;

				//Retrieve all data from competition table
				$sql = "SELECT * FROM competition";
				$result = mysqli_query($conn, $sql) or die (mysqli_connect_error());
				$numResult = mysqli_num_rows($result);

				//determine which page number visitor is currently on
				$number_of_pages = ceil($numResult/$results_per_page);

				if (!isset($_GET['page'])) {
					$page = 1;
				} else {
					$page = $_GET['page'];
				}

				//determine the sql limit starting number for the result on the displaying page
				$this_page_first_result = ($page-1)*$results_per_page;

				//retreives selected results from database and display them on page
				$sql = 'SELECT * FROM competition LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
				$result = mysqli_query($conn, $sql);

				if(isset($_GET['competitionId']))
				{	
					$competitionId = $_GET['competitionId'];
					
					$sql = "DELETE FROM competition WHERE competitionId = '$competitionId'";
					$sql = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
				}
			?>

			<h1> Manage Competition</h1>
			
			<ul class="breadcrumb mb-0">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Manage Competition</li>
			</ul>
			
			
			<div class="container">
				<div class="table-responsive">          
					<table class="table" id="tableList">
						<thead>
						  <tr>
						  	<th class="text-center">Id</th>
							<th class="text-center">Title</th>
							<th class="text-center">Start Date</th>
							<th class="text-center">End Date</th>
							<th class="text-center">Status</th>
							<th class="text-center">Display</th>
							<th class="text-center">Created On</th>
							<th class="text-center" id="operationHeader">Operation</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
						//fetch result row
						if($numResult > 0) {
							//declaring count for index 
							$count = 1;
							
							//echo $currentDate;
							while($row = mysqli_fetch_assoc($result)){
								$competitionId = $row["competitionId"];
								$title = $row["title"];
								$startDate = $row["startDate"];
								$endDate = $row["endDate"];
								$status = " ";	
								$display = $row["display"];				
								$createdOn = $row["createdOn"];			
								
								//getting current date and change dateTime format
								date_default_timezone_set("Asia/Singapore");
								$currentDate = date('Y-m-d');
								
								//Assigning status based on date
								if ($display == "Y") {
									$display = "Yes";
									if($currentDate < $startDate) {
										$status = "PEN";
									}
									else if(($currentDate >= $startDate) && ($currentDate <= $endDate))
									{
										$status = "ONG";
									}
								}
								else if ($display == 'N'){
									$display = "No";
									if($currentDate < $startDate){
										$status = "AVL";
									}
									else if(($currentDate >= $startDate) && ($currentDate <= $endDate)){
										$status = "UVL";
									}
								}

								// After end date, status and display data will be changed
								if($currentDate > $endDate){
									$display = "N";

									//update display data
									$sqlDisplay = "UPDATE competition SET display = ? WHERE competitionId = ?";
									$stmt = mysqli_prepare($conn, $sqlDisplay);
									mysqli_stmt_bind_param($stmt, "si", $display, $competitionId); 
									mysqli_stmt_execute($stmt);
									mysqli_stmt_close($stmt);

									//assign status and display string									
									$display = "No";
									$status = "END";
								}

								//update status data
								$sqlStatus = "UPDATE competition SET status = ? WHERE competitionId = ?";
								$stmt = mysqli_prepare($conn, $sqlStatus);
								mysqli_stmt_bind_param($stmt, "si", $status, $competitionId); 
								mysqli_stmt_execute($stmt);
								mysqli_stmt_close($stmt);

								//Assigning title string
								if ($title == "10to13" ){
									$title = "Age 10 - 13";
								}
								else if($title == "14to16"){
									$title = "Age 14 - 16";
								}
								else if($title == "17to18"){
									$title = "Age 17 - 18";
								}

								//Assigning status string
								if ($status == "PEN" ){
									$status = "Pending";
								}
								else if($status == "ONG"){
									$status = "Ongoing";
								}
								else if($status == "AVL"){
									$status = "Available";
								}
								else if($status == "UVL"){
									$status = "Unavailable";
								}
								else if($status == "END"){
									$status = "Ended";
								}

								//Display table data
								echo "<tr>";
								//echo "<td>".$count++."</td>";
								echo "<td class=\"text-center\">$competitionId</td>";
								echo "<td class=\"text-center\">$title</td>";
								echo "<td class=\"text-center\">$startDate</td>";
								echo "<td class=\"text-center\">$endDate</td>";
								echo "<td class=\"text-center\">$status </td>";
								echo "<td class=\"text-center\">$display</td>";
								echo "<td class=\"text-center\">$createdOn</td>";
								echo "<td class=\"text-center\">";
									echo "<a id=\"viewButton\" href=\"competition_form_manage.php?id=$competitionId\" class=\"btn btn-secondary col-xl-4 text-center\">View</a> ";
								echo "</td>";
								echo "</tr>";

							}
						 } 
						 ?>
					 </tbody>
					</table>
				</div>
			
				
				<div class="container">		
					<button class="btn btn-info mt-3" id="changeDate"  data-toggle='modal' data-target='#changeDateModel'>Change Competition Date</button>
					<!-- <a id="changeDate" href="competition_update.php" class="btn btn-info mt-3">Change Competition Date</a> onclick="window.location.href='competition_update.php'" -->
					<button class="btn btn-info mt-3 button" onclick= "confirm('Are you sure you want display the competition')" id="displayBtn" name="display" value="display" >Display All Competition</button>
					<!-- <button class="btn btn-info mt-3 button" name="select" value="somethingelse" >select</button> -->
				</div>	
			</div>
		</div>

		<!--Footer-->
		<?php include "footer.php"?>

		<div class="modal fade" id="changeDateModel">
			<div class="modal-dialog"  style="width: 95%">
				<div class="modal-content" style="width: 643px; right:10%;">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class='modal-title'>Change Competition Date?</h4>
					</div>
					<!-- Modal Body -->
					<div class="modal-body">
						<form role="form" id="changeDateForm">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<label for="text">Start Date</label>
										<input type="text" id="from_value" name="from_value" readonly/>
									</div>
									<div class="col-sm-6">
										<label for="text">End Date</label>
										<input type="text" id="to_value" name="to_value" readonly/>
									</div>
								</div>
								<div class="row">
									<div id="from" class="datepicker col-sm-6"></div>
									<div id="to" class="datepicker col-sm-6"></div>
								</div>
							</div>
							<!-- Modal footer -->
					<div class="modal-footer">
						<input class="btn btn-secondary" type="submit" id="saveDate" value="Save">
						<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
						</form>
					</div>
					
				</div>
				
			</div>
		</div>

		
		
	  
	
	<script src="js/jquery.validate.min.js"></script>

						
	<script>
	$(document).ready(function(){
		//disable buttons
		var myvar = <?php echo json_encode($status); ?>;
		if (myvar == "Ongoing" ) {
			$('#displayBtn').prop('disabled', true);
			$('#changeDate').attr("disabled","disabled");
		}
		else if(myvar=="Ended" || myvar=="Pending" || myvar =="Unavailable") {
			$('#displayBtn').prop('disabled', true);
		}

		//show modal for changeDate
		$("#changeDate").click(function(){
			$("#changeDateModel").modal();

		});

		//links to ajax page
		$('.button').click(function(){
        	var clickBtnValue = $(this).val();
			$.ajax({
				url: "competition_manage_ajax.php",
				type: "POST",
				data: {'action': clickBtnValue} ,
				success: function (response) {
					alert (response);    
					location.reload();       
				},
				error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				}
			});
    	});

		//update date ajax
		$("#saveDate").click(function(){
			var data = $("#changeDateModel #changeDateForm").serialize();
			//Validation
			$("#changeDateForm").validate({
				rules: {
					from_value: {
						required: true
					},
					to_value: {
						required: true
					}
				},
				//custom validation messages 
				messages: {
					from_value: {
						required: "*Start Date is required",
					},
					to_value: {
						required: "*End Date is required",
					}
				},    
				submitHandler: function(form) {
					$.ajax({
						url: "competition_manage_ajax.php",
						type: "POST",
						data: data+"&task=changeDate",
						success: function (response) {
							alert (response);    
							location.reload();       
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
				}
			});
		});	

		//DatePicker
		var dateToday = new Date();
		//date picker ui
		var dates = $( "#from, #to" ).datepicker({
			dateFormat: 'yy-mm-dd',
			minDate: dateToday,
			onSelect: function(dateText, inst, selectedDate) {
				//set value
				$("#" + this.id + "_value").val(dateText);
				//set the min or max date
				var option = this.id == "from" ? "minDate" : "maxDate",
				instance = $( this ).data( "datepicker" ),
				date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat, 
					dateText, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});	
	});
	</script>
</body>
  
  
</html>