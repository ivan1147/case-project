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
		echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
		exit();
	}
	?>

<body>
	<!--Card-->
	<div class="container mt-5">
		<div id="message"><p class="text-danger">*Form is currently displayed, no changes are to be made</p></div>
		<h1><?php echo $formTitle?></h1>

		<ul class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="<?php echo 'index.php' ?>">Home</a></li>
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
						echo '<button class="btn btn-secondary" id="editBtn"  onClick = "new_dialog(\'edit\', '.$questionId.','.$formId.')" >Edit</button> ';
						echo '<button class="btn btn-secondary" id="deleteBtn" onClick="delete_question('.$questionId.','.$formId.')" >Delete </button> ';
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
				<button class="btn btn-info mt-4" id="createBtn" onclick="new_dialog('add','', <?php echo $formId; ?>)" >Create Question</button>
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
				<button class="btn btn-info mt-4" id="createBtn" onclick="new_dialog('add','', <?php echo $formId; ?>)" >Create Question</button>
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
<div id="dialogBox" >
	<div id='dialogBox_result'>
</div>


<script>
$(document).ready(function(){
	$( "#message" ).hide();
	var myvar = <?php echo json_encode($formDisplay); ?>;
	if (myvar == "Y") {
		$('#createBtn').prop('disabled', true);
		var button = jQuery("#formTbl button");
		$(button).prop('disabled', true);
		$( "#message" ).show();
	}
});

//Open Dialog Box
var myPos = { my: "center top", at: "center top+50", of: window };
function new_dialog(add,questionId,formId){
	if(add == 'add'){
		//Add Dialog
		//setting the size of dialog box
		$( "#dialogBox" ).dialog({
			position: myPos,
			autoOpen: false,
			width: 306,
			title: 'Add New Question'
		});
		$( "#dialogBox" ).dialog( "open" );
		$.ajax({
			type: "POST",
			url: "admin_competition_question_manage_ajax.php",
			data: {
				"task":"open_add_dialog",
				"formId":formId
			},
			success: function(data){
				$("#dialogBox_result").html(data);
			} 
		});	
	}
	else{ 
		//Edit Dialog
		//setting the size of dialog box
		$( "#dialogBox" ).dialog({
			position: myPos,
			autoOpen: false,
			width: 306,
			title: 'Edit Question'
		});
		$( "#dialogBox" ).dialog( "open" );
		$.ajax({
			type: "POST",
			url: "admin_competition_question_manage_ajax.php",
			data: {
				"task":"open_edit_dialog",
				"questionId":questionId,				
				"formId":formId
			},
			success: function(data){
				$("#dialogBox_result").html(data);
			}	
		});	
	}
}	

//Close Dialog Box Function
function close_dialog(){
	$("#dialogBox").dialog("close");
}

//Add Function
function confirm_add(){
	var data = $("#dialogBox #ajax_add").serialize();
	var question =$("#question").val();
	var typeForm = document.getElementById("typeForm");
	var typeMul = document.getElementById("typeMul");
	var answerForm =$("#answerForm").val();
	var answerMul1C =$("#answerMul1C").val();
	var answerMul2 = document.getElementsByName("answerMul2")[0].value;
	var answerMul3 = document.getElementsByName("answerMul3")[0].value;
	var answerMul4 = document.getElementsByName("answerMul4")[0].value;
	if(question == '') {
		alert("Please fill in question");
	}
	else if(typeForm.checked && answerForm == ''){
		alert("Please fill in answer");
		
	}
	else if(typeMul.checked && answerMul1C == '') {
		alert("Please fill in answers");
	}
	else if(typeMul.checked && answerMul2 == '') {
		alert("Please fill in answers");
	}
	else if(typeMul.checked && answerMul3 == '') {
		alert("Please fill in answers");
	}
	else if(typeMul.checked && answerMul4 == '') {
		alert("Please fill in answers");
	}
	else {	
		$.ajax({
			type:"POST",
			url: "admin_competition_question_manage_ajax.php",
			data: data+"&task=add_question",
			success:function(html){
				alert (html);
				$( "#dialogBox" ).dialog( "close" );
				location.reload();
			} 
		});	
	}
}	

//Edit Function
function confirm_update(questionId){
	var data = $("#dialogBox #ajax_edit").serialize();
	$.ajax({
		type:"POST",
		url: "admin_competition_question_manage_ajax.php",
		data: data+"&task=update_question",
		success:function(html){
			alert (html);
			$( "#dialogBox" ).dialog( "close" );
			location.reload();
		} 
	});	
}

//Delete Button ajax
function delete_question(questionId, formId){
	if (confirm("Are you sure you want to delete this question?") == true) {
	$.ajax({
		url: "admin_competition_question_manage_ajax.php",
		type: "POST",
		data: {
			"task":"question_delete",
			"questionId":questionId,
			"formId": formId
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

	
</script>

</body>
</html>