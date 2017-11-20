	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
		
			<h1>Gallery</h1>
			
			<ul class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Gallery</li>
			  <input id="searchEvent" class="col-sm-4 ml-auto" type="email" class="form-control" id="email">
			</ul>
			
			
			<div class="container">
			<div class="row">
	
				<div class="card">
					<div class="row">
					  <div class="col-xl-4">
					  <img id="imageCard" class="card-img-top" src="/emax/resources/x-factor-live-show-1-p2-5.jpg" alt="Card image cap">
					  </div>
					  <div class="col-sm-8 pt-3">
						  <div class="card-block">
							<h4 class="card-title">Tue, OCT 13 2.00 pm</h4>
							<h3 class="card-title">Imma Megastar Tour Asia</h4>
							<p class="card-text">Marina Bay Sands</p>
							<a href="<?php echo 'gallery_images.php' ?>" class="btn btn-primary">View</a>
						  </div>
					  </div>
					</div>
				</div>
				

				<div class="card">
					<div class="row">
					  <div class="col-xl-4">
					  <img id="imageCard" class="card-img-top" src="/emax/resources/x-factor-2015-finalists-small-5.jpg" alt="Card image cap">
					  </div>
					  <div class="col-sm-8 pt-3">
					  
						  <div class="card-block">
							<h4 class="card-title">Wed, Nov 8.00pm</h4>
							<h3 class="card-title">Imma Megastar Tour Aussie</h4>
							<p class="card-text">Sydney Opera</p>
							<a href="#" class="btn btn-primary">View</a>
						  </div>
					  
					  </div>
					</div>
				</div>
			

				<div class="card">
					<div class="row">
					  <div class="col-xl-4">
					  <img id="imageCard" class="card-img-top" src="/emax/resources/2015xfactorwinner_louisajohnson.jpg" alt="Card image cap">
					  </div>
					  <div class="col-sm-8 pt-3">
					  
						  <div class="card-block">
							<h4 class="card-title">Fri, DEC 12 6.00pm</h4>
							<h3 class="card-title">Imma Megastar Concert UK</h4>
							<p class="card-text">Wembley Stadium</p>
							<a href="#" class="btn btn-primary">View</a>
						  </div>
					  
					  </div>
					</div>
				</div>
			</div>
			</div>
			
			
			<ul class="pagination col-sm-4 pt-4 mx-auto">
				<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item active"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
			
		
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