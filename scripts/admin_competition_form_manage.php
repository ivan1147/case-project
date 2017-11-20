<body>

<div class="container">

<?php 
include "head.php";
include "navigation.php";	

// if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
// {
// 	$sql = "SELECT * FROM user WHERE role!='Admin'";
	
// 	$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
// }
// else
// {
// 	echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
// 	exit();
// }


//get row id from previous page
if(isset($_GET['id'])){
	$competitionId = $_GET['id'];	

	//Create sql statement
	$queryCompetition = "SELECT * FROM competition WHERE competitionId = $competitionId";
	$queryForm = "SELECT * FROM form INNER JOIN competition ON form.competitionId = competition.competitionId WHERE form.competitionId = $competitionId";
	//execute query
	$queryResultCompetition = mysqli_query($conn, $queryCompetition) or die (mysqli_connect_error());
	$queryResultForm = mysqli_query($conn, $queryForm) or die (mysqli_connect_error());
	//check result rows
	$numResultCompetition = mysqli_num_rows($queryResultCompetition);
	$numResultForm = mysqli_num_rows($queryResultForm);
	
	if ($numResultCompetition > 0 ) {
		if ($row= mysqli_fetch_assoc($queryResultCompetition)){
			$competitionTitle = $row['title']; 
			$status = $row['status']; 
		}

		//Assigning title string
		if ($competitionTitle == "10to13" ){
			$competitionTitle = "Age 10 - 13";
		}
		else if($competitionTitle == "14to16"){
			$competitionTitle = "Age 14 - 16";
		}
		else if($competitionTitle == "17to18"){
			$competitionTitle = "Age 17 - 18";
		}
	?>

	<!--Card-->
	<div class="container mt-5">
		<h1><?php echo $competitionTitle?></h1>

		<ul class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?php echo 'admin_competition_manage.php' ?>">Manage Competition</a></li>
			<li class="breadcrumb-item active"><?php echo $competitionTitle?></li>
		</ul>

		<?php
		//fetch result row
		if($numResultForm > 0) {
			?>
			<!--Table-->
			<div class="table-responsive">          
			<table class="table" id="formTbl">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Title</th>
						<th class="text-center">Display</th>
						<th class="text-center">Number of Questions</th>
						<th class="text-center">Created On</th>
						<th class="text-center" colspan="2" id="operationHeader">Operation</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				//declaring count for index 
				$count = 1;
				while($row = mysqli_fetch_array($queryResultForm)){
					//form data
					$formId = $row[0];
					$title = $row[1];
					$competitionId = $row[2];
					$display = $row[3];
					$createdOn = $row[4];

					//competition data
					$status = $row[10];
											
					//Assign string to status 
					if ($display == 'Y'){
						$display = "Yes";
					}
					else if ($display == 'N'){						
						$display = "No";
					}
															
					//Display table data
					echo "<tr>";
					echo "<td class=\"text-center\">".$count++."</td>";
					echo "<td class=\"text-center\">$title</td>";
					echo "<td class=\"text-center\">$display</td>";
					echo "<td class=\"text-center\">1</td>";
					echo "<td class=\"text-center\">$createdOn</td>";
					echo "<td class=\"text-center\">";
						echo "<a id=\"viewButton\" href=\"\" class=\"btn btn-secondary col-xl-3\">View</a> ";
						echo '<button class="btn btn-secondary " onClick = "new_dialog(\'edit\', '.$formId.', '.$competitionId.')" id="displayBtn">Edit</button> ';
						echo '<button class="btn btn-secondary " id="deleteBtn" onClick="delete_form('.$formId.')" >Delete </button> ';
						echo '<button class="btn btn-secondary col-xl-3" onClick = "display_form('.$formId.','.$competitionId.',\''.$title.'\',\''.$display.'\')" id="displayBtn">Display</button>';
					echo "</td>";
					echo "</tr>";
					?>
				</tbody>
				<?php
				} //end while loop
				?>
			</table>
			</div> <!--Close table div-->
									
			<!--Button and pagination-->
			<div class="row">
				<button class="btn btn-info mt-4" onclick="new_dialog('add','', <?php echo $competitionId; ?>)" >Create Form</button>
				<ul class="pagination col-sm-4 mt-3 mx-auto">
					<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item active"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</div> 

	</div> <!--Close Card div--> 
		<?php
		} //end if numResultForm check 	
		else {
			//Assigning dummy data
			$status = "EMP";
			?>
			<!--Button-->
			<div class="row">		
				<button class="btn btn-info mt-4" onclick="new_dialog('add','', <?php echo $competitionId; ?>)" >Create Form</button>
			</div> 
		<?php
		}	 //end else 

	} //end numResultCompetition check
} //end isset
else{ ?>	
	<div class="text-center">
		<h1 >No Data Available</h1>
		<a href="<?php echo 'admin_competition_manage.php' ?>" class="btn btn-info mt-3">Back</a>
	</div> 
<?php } ?>

<!--Footer-->
<?php include "footer.php"?>

</div> <!--Close whole page div-->   

<!--Dialog Box-->
<form>
	<div id="add_dialog" >
		<div id="add_dialog_result"></div>
	</div>
	<div id="edit_dialog" >
		<div id="edit_dialog_result"></div>
	</div>
</form>


<script>
$(document).ready(function(){
	var myvar = <?php echo json_encode($status); ?>;
	if (myvar == "ONG") {
		//$('#displayBtn').prop('disabled', true);
		var button = jQuery("#formTbl button");
		$(button).prop('disabled', true);
	}
	
	//setting the size of dialog box
	var myPos = { my: "center top", at: "center top+50", of: window };
	$( "#add_dialog" ).dialog({
		position: myPos,
    	autoOpen: false,
		width: 280,
		title: 'Add New Form'
    });
	$( "#edit_dialog" ).dialog({
		position: myPos,
      	autoOpen: false,
		width: 280,
		title: 'Edit Form'
    });
});

//Open Add & Edit dialogs ajax
function new_dialog(status, formId, competitionId){
	if(status=='add'){
		$( "#add_dialog" ).dialog( "open" );
		var div_result='#add_dialog_result';
	}
	else{
		$( "#edit_dialog" ).dialog( "open" );
		var div_result='#edit_dialog_result';
	}
	$.ajax({
		type:"POST",
		url: "admin_competition_form_manage_ajax.php",
		data: {
			"task":"open_dialog",
			"status":status,
			"formId":formId,
			"competitionId": competitionId
		},
		success: function(data){
			$(div_result).html(data);
			//Add Function
			$("#confirm_add").click(function(){
				var data = $("#add_dialog #ajax_form").serialize();
				var formTitle = $("#formTitle").val();
				if(formTitle == '') {
					alert ("Title is required");
				} 
				else {
					$.ajax({
						type:"POST",
						url: "admin_competition_form_manage_ajax.php",
						data: data+"&task=add_form",
						success: function(html){ 
							alert (html);
							$('#add_dialog').dialog('close');
							location.reload();
						}
					});
				}
				
			});
			$('#close_add_dialog').click(function(){
					$('#add_dialog').dialog('close');
			}); 
			//Edit Function
			$("#confirm_edit").click(function(){
				var data = $("#edit_dialog #ajax_form").serialize();
				var formTitle = $("#formTitle").val();
				if(formTitle == '') {
					alert ("Title is required");
				} else {
					$.ajax({
						type:"POST",
						url: "admin_competition_form_manage_ajax.php",
						data: data+"&task=update_form",
						success: function(html){ 
							alert (html);
							$('#edit_dialog').dialog('close');
							location.reload();
						}
					});
				}
			}); 
			$('#close_edit_dialog').click(function(){
					$('#edit_dialog').dialog('close');
			}); 
		}
	}); //end ajax
}

//Delete Button ajax
function delete_form(formId){
	if (confirm("Are you sure you want to delete this form?") == true) {
	$.ajax({
		url: "admin_competition_form_manage_ajax.php",
		type: "POST",
		data: {
			"task":"form_delete",
			"formId":formId
		},
		success: function (response) {
			alert (response);    
			location.reload();       
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
	}
}	

//Display Button ajax
function display_form(formId, competitionId, $title, $display, $status){
	$.ajax({
		url: "admin_competition_form_manage_ajax.php",
		type: "POST",
		data: {
			"task":"display_form",
			"formId":formId,
			"competitionId": competitionId,
			"formTitle": $title,
			"formDisplay": $display
		},
		success: function (response) {
			alert (response);    
			location.reload();       
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}	
</script>

</body>
</html>