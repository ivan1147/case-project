<body>

<div class="container">

<?php 
include "head.php";
include "navigation.php";	

//get row id from previous page
if(isset($_GET['id'])){
	$formId = $_GET['id'];	
	//Retrieve Session Data
	$competitionIdSession = $_SESSION['competitionId'];
	$competitionTitleSession = $_SESSION['competitionTitle'];

	if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
	{
		//Retrieve formTitle ---> title
		$sqlForm = "SELECT title, display FROM form WHERE formId = $formId";
		$resultForm = mysqli_query($conn, $sqlForm) or die (mysqli_connect_error());
		if ($row = mysqli_fetch_assoc($resultForm)){
			$formTitle = $row['title']; 
			$formDisplay = $row['display']; 
		}

		//Retrieve data for table display
		$sql = "SELECT * FROM question INNER JOIN form ON question.formId = form.formId WHERE question.formId = ".$formId;
		$result = mysqli_query($conn, $sql) or die (mysqli_connect_error());
		$numResult = mysqli_num_rows($result);
	}
	else
	{
		echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
		exit();
	}
	?>

	<!--Card-->
	<div class="container mt-5">
		<div id="message"><p class="text-danger">*Form is currently displayed, no changes are to be made</p></div>
		<h1><?php echo $formTitle?></h1>

		<ul class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?php echo 'admin_competition_manage.php' ?>">Manage Competition</a></li>
			<li class="breadcrumb-item"><a href="<?php echo "admin_competition_form_manage.php?id=$competitionIdSession" ?>"><?php echo $competitionTitleSession?></a></li>
			<li class="breadcrumb-item active"><?php echo $formTitle?></li>
		</ul>

		<?php
		//fetch result row
		if($numResult > 0) {
			?>
			<!--Table-->
			<div class="table-responsive">          
			<table class="table" id="formTbl">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Question</th>
						<th class="text-center">Type</th>
						<th class="text-center">Created On</th>
						<th class="text-center" colspan="2" id="operationHeader">Operation</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				//declaring count for index 
				$count = 1;
				while($row = mysqli_fetch_array($result)){
					//question data
					$questionId = $row[0];
					$question = $row[1];
					$type = $row[2];
					$formId = $row[3];
					$createdOn = $row[4];
					
					//if question more than ? characters display "..."


					//Display table data
					echo "<tr>";
					echo "<td class=\"text-center\">".$count++."</td>";
					echo "<td class=\"text-center\">$question</td>";
					echo "<td class=\"text-center\">$type</td>";
					echo "<td class=\"text-center\">$createdOn</td>";
					echo "<td class=\"text-center\">";
						echo '<button class="btn btn-secondary" id="editBtn">Edit</button> ';
						echo '<button class="btn btn-secondary" id="deleteBtn">Delete </button> ';
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
			?>
			<!--Button-->
			<div class="row">		
				<button class="btn btn-info mt-4" onclick="new_dialog('add','', <?php echo $competitionId; ?>)" >Create Form</button>
			</div> 
		<?php
		}	 //end else 
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
	$( "#message" ).hide();
	var myvar = <?php echo json_encode($formDisplay); ?>;
	if (myvar == "Y") {
		//$('#displayBtn').prop('disabled', true);
		var button = jQuery("#formTbl button");
		$(button).prop('disabled', true);
		$( "#message" ).show();
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
function display_form(formId, competitionId, title, display, numQue){
	$.ajax({
		url: "admin_competition_form_manage_ajax.php",
		type: "POST",
		data: {
			"task":"display_form",
			"formId":formId,
			"competitionId": competitionId,
			"formTitle": title,
			"formDisplay": display,
			"numQue": numQue
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