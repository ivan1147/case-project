<div class="container">

<?php 
include "head.php";
include "navigation.php";	

if(empty($_SESSION['loggedIn']))
{
	echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
	exit();
}
elseif($_SESSION['loggedRole'] == "Senior")
{
	echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
	exit();
}
elseif(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']))
{
	$userId = $_SESSION['loggedUserId'];	

	$sqlUser = "SELECT birthDate FROM user WHERE userId = '$userId'";							
	$resultUser  = mysqli_query($conn,$sqlUser) or die(mysqli_error($conn));

	if ($userRow = mysqli_fetch_assoc($resultUser)){
		$userBirthDate = $userRow['birthDate'];
	}

	//Get User Age 
	$currentDate = date("Y-m-d");
	$age = date_diff(date_create($userBirthDate), date_create($currentDate));
	$age = $age->format('%y');

	//Get Participant result
	$sqlParticipant = "SELECT * FROM participant WHERE userId =".$userId." AND competitionId IS NOT null;";					
	$resultParticipant  = mysqli_query($conn,$sqlParticipant);
	
}

//Retrieve all data from competition table
$sql = "SELECT startDate, endDate, status FROM competition WHERE competitionId = 1";
$result = mysqli_query($conn, $sql) or die (mysqli_connect_error());
$row = mysqli_fetch_assoc($result);

$competitionStartDate = $row['startDate']; 
$competitionEndDate = $row['endDate']; 
$competitionStatus = $row['status'];


?>

<!--Card-->
<div class="container">	
	<h1>Competition</h1>
			
	<ul class="breadcrumb mb-0">
		<li class="breadcrumb-item"><a href="<?php echo 'index.php' ?>">Home</a></li>
		<li class="breadcrumb-item active">Competition</li>
	</ul>
			
	<div id="jumbotronBackground" class="jumbotron mb-0">
		<h1 id="fontWhite" class="display-5 text-center">Competition for Junior Members</h1>
		<?php 
		if ($competitionStatus == 'ONG') {
			echo '<h2 id="fontWhite" class="display-5 text-center">Competition is Ongoing Starting From '.$competitionStartDate.' to '.$competitionEndDate.'</h1>';
		}
		else if ($competitionStatus == 'PEN'){
			echo '<h2 id="fontWhite" class="display-5 text-center">Competition Coming Soon Starting From '.$competitionStartDate.' to '.$competitionEndDate.'</h1>';
		}
		else if ($competitionStatus == 'END' || $competitionStatus == 'AVL' || $competitionStatus='UVL') {
			echo '<h2 id="fontWhite" class="display-5 text-center">There is currently no ongoing competition</h1>';
		}
		?>
	</div>
			
	<div id="img_container">
		<div class="col-xl-12">
			<img id="elementWallpaper" class="card-img-top" src="/emax/resources/Competition-at-Work-3-Steps-to-Keep-It-Healthy-and-Motivational-1200x630.png" alt="Card image cap">
		</div>
		<?php 
			if ($competitionStatus == 'ONG') {
				if ($age >= 10 && $age < 19) {
					if (mysqli_num_rows($resultParticipant) > 0) {
						echo '<button onclick="cancel_entry('.$userId.')" class="btn btn-warning">Cancel Entry</button>';					
					}			
					else {
						echo '<button onclick="new_dialog('.$userId.',\''.$competitionEndDate.'\','.$age.')" class="btn btn-warning">Participate Now</button>';					
					}
				}
				else {
					echo '<div class="alert alert-success">
									Sorry, you are not eligible to participate in this competition.
								</div>';
				}	
			}
		?>
	</div>
</div>		

<!--Footer-->
<?php include "footer.php"?>

<!--Dialog Box-->
<form>
	<div id="user_dialog" >
		<div id="user_dialog_result"></div>
	</div>
</form>

<script>


//Open Dialog Box
var myPos = { my: "center top", at: "center top+50", of: window };
function new_dialog(userId, competitionEndDate, age){
	//Open dialog box
	$( "#user_dialog" ).dialog({
		position: myPos,
		autoOpen: false,
		width: 306,
		title: 'Details Confirmation'
	});
	$( "#user_dialog" ).dialog( "open" );
	$.ajax({
		type: "POST",
		url: "competition_entry_ajax.php",
		data: {
			"task":"open_user_dialog",
			"userId": userId,
			"competitionEndDate": competitionEndDate,
			"age": age
		},
		success: function(data){
			$("#user_dialog_result").html(data);
		} 
	});	
}

//Participate Function
function confirm_participate(){
	var data = $("#user_dialog #ajax_user").serialize();
	$.ajax({
		type:"POST",
		url: "competition_entry_ajax.php",
		data: data+"&task=confirm_participate",
		success:function(html){
			//alert (html);
			$( "#user_dialog" ).dialog( "close" );
			//location.reload();
			window.location = "competition_form.php";
		},
		error: function(req, textStatus, errorThrown) {
			alert('Ooops, something happened: ' + textStatus + ' ' +errorThrown);
		}
	});	
}


//Cancel entry Function
function cancel_entry(userId){
	if (confirm("Are you sure you want to cancel your entry?") == true) {
		$.ajax({
			type:"POST",
			url: "competition_entry_ajax.php",
			data: {
				"task":"cancel_entry",
				"userId": userId
			},
			success:function(html){
				alert (html);
				location.reload();
			},
			error: function(req, textStatus, errorThrown) {
				alert('Ooops, something happened: ' + textStatus + ' ' +errorThrown);
			}
		});	
	}
}
</script>
	
</body>
  
</html>