	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
		
			<h1>Auction</h1>
			
			<ul class="breadcrumb mb-0	">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Auction</li>
			</ul>
			
			<div class="sm-4">
				<img id="elementWallpaper" class="card-img-top" src="/emax/resources/VAG-Landon.jpg" alt="Card image cap">
			</div>
			
			<div class="jumbotron mb-0">
				<h1 class="display-5">Choose Category</h1>
			</div>
			
			<div class="container">
			
			<div class="row">
				<a href="<?php echo 'auction_item.php' ?>" id="noDecoration" class="col-sm-4 mt-2">	
					<div class="card">
					  <img id="imageCard" class="card-img-top" src="/emax/resources/wu-album.png" alt="Card image cap">
					  
					  <div class="d-block mx-auto row text-center pt-3 pb-3">
						  <div id="fontBlack" class="card-block">
							<h4 class="card-title">Album</h4>
						  </div>
					  </div>
					  
					</div>
				</a>
				
				<a href="<?php echo 'auction_item.php' ?>" id="noDecoration" class="col-sm-4 mt-2">
					<div class="card">
					  <img id="imageCard" class="card-img-top" src="/emax/resources/download.jpg" alt="Card image cap">
					 
					  <div class="d-block mx-auto row text-center pt-3 pb-3">
						  <div id="fontBlack" class="card-block">
							<h4 class="card-title">Book</h4>
						  </div>
					  </div>
					</div>
				</a>

				<a href="<?php echo 'auction_item.php' ?>" id="noDecoration" class="col-sm-4 mt-2">
					<div>
						<div class="card">
						  <img id="imageCard" class="card-img-top" src="/emax/resources/1._lot_68_nadeau_37200.jpg" alt="Card image cap">
						 
						  <div class="d-block mx-auto row text-center pt-3 pb-3">
							  <div id="fontBlack" class="card-block">
								<h4 class="card-title">Ring</h4>
							  </div>
						  </div>
						</div>
					</div>
				</a>
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