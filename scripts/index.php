

	<?php include "head.php"?>
  
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php";?>
		
		
		
		<!--Jumbotron-->
		
		<div class="container">
		
		<div class="row">
			<div class="col-xl-4 pl-0 pr-0">
				<div id="jumbotronHome" class="jumbotron">
					<h1>Imma Megastar : X Voice Factor TV Talent Show</h1> 
					<p>A platform to engage and express your thoughts!</p> 
				</div>
			
			</div>
			
		<!--Carousel-->
		
			
			<div class="col-xl-8 pl-0 pr-0">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
					  <img class="d-block img-fluid" src="/emax/resources/x-factor-louisa1.jpg" alt="First slide" style="width: 740px; height: 337px">
					  <div class="carousel-caption d-none d-md-block">
						<h3>Los Angeles</h3>
						<p>We had such a great time in LA!</p>
					  </div>
					</div>
					<div class="carousel-item">
					  <img class="d-block img-fluid" src="/emax/resources/X-Factor-finalists-Louisa-Johnson.jpg" alt="Second slide" style="width: 740px; height: 337px">
					  <div class="carousel-caption d-none d-md-block">
						<h3>New York</h3>
						<p>We love the Big Apple!</p>
					  </div>
					</div>
					<div class="carousel-item">
					  <img class="d-block img-fluid" src="/emax/resources/Screen_Shot_2015-12-14_at_18.30.45.png" alt="Third slide" style="width: 740px; height: 337px">
					  <div class="carousel-caption d-none d-md-block">
						<h3>Chicago</h3>
						<p>Thank you, Chicago!</p>
					  </div>
					</div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
		
		</div>
		
		<h3>What Can You Do?</h3>
		
		<!--Card-->
		<div class="row">
			<?php 
			if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Junior")
			{
				echo"<div class='col-xl-4'>
					<div class='card'>
					  <img id='imageCard' class='card-img-top' src='/emax/resources/competition_is_good_-1043x1065.png' alt='Card image cap'>
					  
					  <div class='d-block mx-auto row text-center pt-3 pb-3'>
						  <div class='card-block'>
							<h4 class='card-title'>Competition</h4>
							<p class='card-text'>Join a competition to win some prize!</p>
						  </div>
					  </div>
					
					</div>
				</div>";
			}
			else
			{
				echo"<div class='col-xl-4'>
					<div class='card'>
					  <img id='imageCard' class='card-img-top' src='/emax/resources/wordpress-auction.jpg' alt='Card image cap'>
					  
					  <div class='d-block mx-auto row text-center pt-3 pb-3'>
						  <div class='card-block'>
							<h4 class='card-title'>Auction</h4>
							<p class='card-text'>Bid some items!</p>
						  </div>
					  </div>
					
					</div>
				</div>";
			}
			
			?>
			
			
			<div class="col-xl-4">
				<div class="card">
				  <img id="imageCard" class="card-img-top" src="/emax/resources/download.jpg" alt="Card image cap">
				 
				  <div class="d-block mx-auto row text-center pt-3 pb-3">
					  <div class="card-block">
						<h4 class="card-title">Discussion Board</h4>
						<p class="card-text">Talk about any topics now</p>
					  </div>
				  </div>
				</div>
			</div>

			
			<div class="col-xl-4">
				<div class="card">
				  <img id="imageCard" class="card-img-top" src="/emax/resources/dsc0017.jpg" alt="Card image cap">
				 
				  <div class="d-block mx-auto row text-center pt-3 pb-3">
					  <div class="card-block">
						<h4 class="card-title">Gallery</h4>
						<p class="card-text">View your favorite event pictures</p>
					  </div>
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
	</script>
	
  </body>
  
  
</html>