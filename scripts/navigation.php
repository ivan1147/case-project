<?php
	include "database_conn.php";
	session_start();
	
	if(isset($_POST['birthSub']))
	{
		 $day = $_POST['userDay'];
		 $month = $_POST['userMonth'];
		 $year = $_POST['userYear'];
		 
		 $month = date('m', strtotime($month));
		 $day = date('d');
		 	 
		 $date = $year.'-'.$month.'-'.$day;
		 
		 $birthDate = $date;
		 $currentDate = date("Y-m-d");
		 
		 if(isset($birthDate))
		 {
			$_SESSION['birthDate'] = $birthDate;
		 }
		 
		 $birthDate2 = new DateTime($birthDate);
		 $currentDate = new DateTime($currentDate);

		 $diff = $birthDate2->diff($currentDate)->format('%y');
		 
		 if($diff<16)
		 {
			$_SESSION['ageRange'] = "Junior";
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal6').modal('show');
					});
				</script>";
		 }
		 elseif($diff=16 && $diff<19)
		 {
			$_SESSION['ageRange'] = "Junior";
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal5').modal('show');
					});
				</script>";
		 }
		 else
		 {
			$_SESSION['ageRange'] = "Senior";
			echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal5').modal('show');
					});
				</script>";

		 }
		 
		 
	}
	
	if(isset($_SESSION['errorMemberEmail']))
	{
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal5').modal('show');
					});
				</script>";
				
	}
	
	if(isset($_SESSION['errorParentEmail']))
	{
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal5').modal('show');
					});
				</script>";
				
	}
	

	
	if(isset($_SESSION['errorMemberUsername']))
	{
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal5').modal('show');
					});
				</script>";
				
	}
	
	if(isset($_SESSION['errorParentUsername']))
	{
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal5').modal('show');
					});
				</script>";
				
	}
	
	if(isset($_SESSION['errorUsername']))
	{
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal3').modal('show');
					});
				</script>";

	}
	
	if(isset($_SESSION['errorPassword']))
	{
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal3').modal('show');
					});
				</script>";

	}
	
	if(isset($_SESSION['errorActivation']))
	{
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal3').modal('show');
					});
				</script>";
	}
	
	if(isset($_SESSION['registerSuccess']))
	{
		$ipAddress = $_SERVER['REMOTE_ADDR'];
		$name = "User Registration";
		$link = "user_profile";
		$sql = "INSERT INTO activity(ipAddress, name, link) VALUES('$ipAddress', '$name', '$link')";
		$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
				
		echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal8').modal('show');
					});
				</script>";
	}
	
	if(isset($_GET['username']) && isset($_GET['activationCode']))
	{
	
		$username = $_GET['username'];
		$activationCode = $_GET['activationCode'];
		
		$sqlTest = "SELECT * FROM user WHERE username = '$username' AND activationCode = '$activationCode'";

		$sqlTest  = mysqli_query($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
		
		if(mysqli_affected_rows($conn) > 0)
		{
			$sqlTest = "UPDATE user SET emailActivation='True' WHERE username='$username'";
			$sqlTest = mysqli_query($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
			
			echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";	
		}
		
	
	}
	

?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	
	<?php
	
	if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
	{
		echo"<a class='navbar-brand' href='index.php'>Emax</a>
		<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
		<span class='navbar-toggler-icon'></span>
		</button>
		<div class='collapse navbar-collapse' id='collapsibleNavbar'>
		<ul class='navbar-nav'>
		  <li class='nav-item'>
			<a class='nav-link' href='auction.php'>Auction</a>
		  </li>
		  <li class='nav-item'>
			<a class='nav-link' href='gallery.php'>Gallery</a>
		  </li>
		  <li class='nav-item'>
			<a class='nav-link' href='competition_entry.php'>Competition</a>
		  </li>   
		  <li class='nav-item'>
			<a class='nav-link' href='discussion.php'>Discussion</a>
		  </li>
		</ul>
		
		<ul class='navbar-nav ml-auto'>	
			<li class='nav-item dropdown'>
				<a class='nav-link dropdown-toggle' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				  Notification
				</a>
				<div class='dropdown-menu dropdown-menu-right pl-2 pr-2' aria-labelledby='navbarDropdownMenuLink' style='width: 300px'>
					<h5>Competition</h5>
					<hr>
					<p>Congratulations! You are the winner of 1st Grade Form</p>
				</div>
			</li>
			<li class='nav-item dropdown'>
				<a class='nav-link dropdown-toggle' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				  Option
				</a>
				<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
					<a class='dropdown-item' href='user_profile.php'>Profile</a>
					<a class='dropdown-item' href='admin_user_manage.php'>User Management</a>
					<a class='dropdown-item' href='admin_user_activity_manage.php'>User Activity Management</a>
					<a class='dropdown-item' href='#'>Auction Management</a>
					<a class='dropdown-item' href='#'>Gallery Management</a>
					<a class='dropdown-item' href='admin_competition_manage.php'>Competition Management</a>
					<a class='dropdown-item' href='#'>Discussion Management</a>
				</div>
			</li>
			<li class='nav-item'>
				<a href='logout.php' class='nav-link'>Log Out</a>
			</li> 
		</ul>

		</div>";
		
	
	}
	elseif(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Senior")
	{
		echo"<a class='navbar-brand' href='index.php'>Emax</a>
		<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
		<span class='navbar-toggler-icon'></span>
		</button>
		<div class='collapse navbar-collapse' id='collapsibleNavbar'>
		<ul class='navbar-nav'>
		  <li class='nav-item'>
			<a class='nav-link' href='auction.php'>Auction</a>
		  </li>
		  <li class='nav-item'>
			<a class='nav-link' href='gallery.php'>Gallery</a>
		  </li>  
		  <li class='nav-item'>
			<a class='nav-link' href='discussion.php'>Discussion</a>
		  </li>
		</ul>
		
		<ul class='navbar-nav ml-auto'>	
			<li class='nav-item dropdown'>
				<a class='nav-link dropdown-toggle' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				  Notification
				</a>
				<div class='dropdown-menu dropdown-menu-right pl-2 pr-2' aria-labelledby='navbarDropdownMenuLink' style='width: 300px'>
					<h5>Competition</h5>
					<hr>
					<p>Congratulations! You are the winner of 1st Grade Form</p>
				</div>
			</li>
			<li class='nav-item dropdown'>
				<a class='nav-link dropdown-toggle' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				  Option
				</a>
				<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
					<a class='dropdown-item' href='user_profile.php'>Profile</a>
				</div>
			</li>
			<li class='nav-item'>
				<a href='logout.php' class='nav-link'>Log Out</a>
			</li> 
		</ul>

		</div>";
	}
	elseif(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Junior")
	{
		echo"<a class='navbar-brand' href='index.php'>Emax</a>
		<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
		<span class='navbar-toggler-icon'></span>
		</button>
		<div class='collapse navbar-collapse' id='collapsibleNavbar'>
		<ul class='navbar-nav'>
		  <li class='nav-item'>
			<a class='nav-link' href='competition_entry.php'>Competition</a>
		  </li>
		  <li class='nav-item'>
			<a class='nav-link' href='gallery.php'>Gallery</a>
		  </li>  
		  <li class='nav-item'>
			<a class='nav-link' href='discussion.php'>Discussion</a>
		  </li>
		</ul>
		
		<ul class='navbar-nav ml-auto'>	
			<li class='nav-item dropdown'>
				<a class='nav-link dropdown-toggle' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				  Notification
				</a>
				<div class='dropdown-menu dropdown-menu-right pl-2 pr-2' aria-labelledby='navbarDropdownMenuLink' style='width: 300px'>
					<h5>Competition</h5>
					<hr>
					<p>Congratulations! You are the winner of 1st Grade Form</p>
				</div>
			</li>
			<li class='nav-item dropdown'>
				<a class='nav-link dropdown-toggle' href='http://example.com' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				  Option
				</a>
				<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
					<a class='dropdown-item' href='user_profile.php'>Profile</a>
				</div>
			</li>
			<li class='nav-item'>
				<a href='logout.php' class='nav-link'>Log Out</a>
			</li> 
		</ul>

		</div>";
		
	
	}
	else
	{
		echo"<a class='navbar-brand' href='index.php'>Emax</a>
		<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
		<span class='navbar-toggler-icon'></span>
		</button>
		<div class='collapse navbar-collapse' id='collapsibleNavbar'>
		<ul class='navbar-nav'>
		  
		</ul>
		<ul class='navbar-nav ml-auto'>	
		  <li class='nav-item'>
			<a class='nav-link' data-toggle='modal' data-target='#myModal3'>Log In</a>
		  </li> 
		  <li class='nav-item'>
			<a class='nav-link' data-toggle='modal' data-target='#myModal4'>Sign Up Free</a>
		  </li> 
		</ul>
		</div>";
	}
	
	?>
	
	
	<!--Login Form-->
	<div class="modal fade" id="myModal3">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Login</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
				<form id="userLogin" method="post" action="loginProcess.php" name="userLogin">
					<?php
					  if(isset($_SESSION['errorUsername']))
					  {
						echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorUsername']."</p>";
						$_SESSION['errorUsername'] = null;
					  }
					  if(isset($_SESSION['errorPassword']))
					  {
						echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorPassword']."</p>";
						$_SESSION['errorPassword'] = null;
					  }
					  if(isset($_SESSION['errorActivation']))
					  {
						echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorActivation']."</p>";
						$_SESSION['errorActivation'] = null;
					  }
					  
					?>
					<input type="text" class="form-control mt-2" placeholder="Username" id="username" name="username" >
					<input type="password" class="form-control mt-4" placeholder="Password" id="password" name="password" >
			
			<!-- Modal footer -->
				<div class="modal-footer">
				  <button type="submit" class="btn btn-secondary" name="loginSub">Submit</button>
				</form>
			    </div>
			</div>
			
		  </div>
		</div>
	</div>
	
	<!--Birth Date Form-->
	<div class="modal fade" id="myModal4">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title mx-auto">Please Enter Your Date of Birth</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
				<form class="form-inline justify-content-center"  method="post" name="userBirth">
				<label for="email">Day</label>
					<div class="dropdown mr-2">
						<select class="form-control" id="exampleSelect1" name="userDay">
							<?php
								for ($x = 1; $x<=31; $x++) 
									echo "<option value='$x' href='#'>$x</option>";
							?>
						</select>
					</div>
					<label for="email">Month</label>
					<div class="dropdown mr-2">
						<select class="form-control" id="exampleSelect1" name="userMonth">
							<option value='January' class='dropdown-item' href='#'>January</option>";
							<option value='February' class='dropdown-item' href='#'>February</option>";
							<option value='March' class='dropdown-item' href='#'>March</option>";
							<option value='April' class='dropdown-item' href='#'>April</option>";
							<option value='May' class='dropdown-item' href='#'>May</option>";
							<option value='June' class='dropdown-item' href='#'>June</option>";
							<option value='July' class='dropdown-item' href='#'>July</option>";
							<option value='August' class='dropdown-item' href='#'>August</option>";
							<option value='September' class='dropdown-item' href='#'>September</option>";
							<option value='October' class='dropdown-item' href='#'>October</option>";
							<option value='November' class='dropdown-item' href='#'>November</option>";
							<option value='December' class='dropdown-item' href='#'>December</option>";
						</select>
					</div>
					<label for="email">Year</label>
						<div class="dropdown mr-2">
							<select class="form-control" id="exampleSelect1" name="userYear">
								<?php
									for ($x = 2016; $x>=1920; $x--) 
										echo "<option value='$x' href='#'>$x</option>";
								?>
							</select>
					</div>
				
				
			</div>
			
			<!-- Modal footer -->
				<div class="modal-footer">
				  <button id="birthBut" type="submit" class="btn btn-secondary" name="birthSub">Continue</button>
				</form>
			</div>
			
			
			
		  </div>
		</div>
	</div>
	

	<!--Member Registration Form-->
	<div class="modal fade" id="myModal5">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Registration</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
				<?php
				  if(isset($_SESSION['errorMemberEmail']))
				  {
					echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorMemberEmail']."</p>";
					$_SESSION['errorMemberEmail'] = null;
				  }
				  
				  if(isset($_SESSION['errorParentEmail']))
				  {
					echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorParentEmail']."</p>";
					$_SESSION['errorParentEmail'] = null;
				  }
				  
				   if(isset($_SESSION['errorMemberUsername']))
				  {
					echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorMemberUsername']."</p>";
					$_SESSION['errorMemberUsername'] = null;
				  }
				  
				   if(isset($_SESSION['errorParentUsername']))
				  {
					echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorParentUsername']."</p>";
					$_SESSION['errorParentUsername'] = null;
				  }
				?>
				<form class="form-row" id="memberDetail"  method="post" action="registration.php" name="memberDetail">
					<input type="text" class="form-control mt-2" id="fullName" placeholder="Full Name" name="fullName">
					<div class="form-row">
						<div class="col mt-4" style="width:300px">
							<input type="text" class="form-control" id="username" placeholder="Username" name="username">
						</div>
						<div class="col mt-4"  style="width:300px">
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						</div>
					</div>
					<input type="email" class="form-control mt-4" id="emailAddress" placeholder="Email Address" name="emailAddress">
			</div>
			

			
			<!-- Modal footer -->
			<div class="modal-footer">
			    <button type="submit" class="btn btn-secondary" name="memberSub">Submit</button>
			    </form>
			</div>
			
			<?php $_POST['birthSub'] = null; ?>
			
		  </div>
		</div>
	
	</div>
	
	<!--Parent Registration Form-->
	<div class="modal fade" id="myModal6">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Registration (Parents Consent)</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
			<?php
				  if(isset($_SESSION['errorParentEmail']))
				  {
					echo "<p class='modal-title' style='color:#af0135'>".$_SESSION['errorParentEmail']."</p>";
					$_SESSION['errorParentEmail'] = null;
				  }
			?>
			<p class="modal-title">You are required to ask parent or guardian to fill the form. <strong> Minors (16 years and below) that register themselves will result in ban of account permanently </strong></p>
				<form class="form-group" id="parentDetail" method="post" action="registration.php" name="parentDetail">
					<input type="text" class="form-control mt-4" id="fullName" placeholder="Full Name" name="fullName">
					<div class="form-row">
						<div class="col">
							<input type="text" class="form-control mt-4" id="username" placeholder="Username" name="username">
						</div>
						<div class="col">
							<input type="password" class="form-control mt-4" id="password" placeholder="Password" name="password">
						</div>
					</div>
					<input type="email" class="form-control mt-4" id="emailAddress" placeholder="Email Address" name="emailAddress">
			</div>
			

			
			<!-- Modal footer -->
			<div class="modal-footer">
			  <button type="submit" class="btn btn-secondary" name="parentSub">Submit</button>
			  </form>
			</div>
			
			<?php $_POST['birthSub'] = null; ?>
			
		  </div>
		</div>
	
	</div>
	
	<!--Registration Successful-->
	<div class="modal fade" id="myModal8">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
				  <h4 class="modal-title">Registration Successful</h4>
				</div>
				<div class="modal-body">
					 <p>Please check your email to fully activate the account</p>
					 <?php $_SESSION['registerSuccess'] = null; ?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				  <button class="btn btn-secondary" data-dismiss="modal">OK</button>
				</div>
			</div>
			
		</div>
	</div>
	
	<!--Activation Successful-->
	<div class="modal fade" id="myModal9">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
				  <h4 class="modal-title">Activation Successful</h4>
				</div>
				<div class="modal-body">
					 <p>You are now able to login</p>
				</div>
				<!-- Modal footer -->
				 <div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
			
		</div>
	</div>
		
		
</nav>

<script>
      $(document).ready(function(){
		  $("#userLogin").validate({
			rules: {
				username: {
					required: true,
				},
				password: {
					required: true,
				},
			},

		  });
		  

		  $("#memberDetail").validate({
			rules: {
				fullName: {
					required: true,
					minlength: 5,
				},
				username: {
					required: true,
					minlength: 8,
				},
				password: {
					required: true,
					minlength: 10,
				},
				emailAddress: {
					required: true,
				},
			},
			

		  });
		  
		  $("#parentDetail").validate({
			rules: {
				fullName: {
					required: true,
					minlength: 5,
				},
				username: {
					required: true,
					minlength: 8,
				},
				password: {
					required: true,
					minlength: 10,
				},
				emailAddress: {
					required: true,
				},
			},
			

		  });
      });
  
	/*$(document).ready(function(){
		$("a#dropYear.dropdown-item").on('click', function(){
			$("button#butYear.btn.btn-default.dropdown-toggle").text($(th*/
			
</script>