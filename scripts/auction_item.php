	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
		
			<h1>Album</h1>
			
			<ul class="breadcrumb mb-0	">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo 'auction.php' ?>">Auction</a></li>
			  <li class="breadcrumb-item active">Album</li>
			</ul>
			
			
			<div class="container">
			
				<div class="row">
					<a href="<?php echo 'auction_item_detail.php' ?>" id="noDecoration" class="col-xl-4 mt-2">
						
						<div class="card">
						  <img id="imageCard" class="card-img-top" src="/emax/resources/louisa-johnson--a.jpg" alt="Card image cap">
						  
						  <div class="d-block pl-3 pt-3 pb-3">
							  <div id="fontBlack" class="card-block">
								<p class="card-text">Album Tour 2017</p>
								<p class="card-text">Bid: GBP 35.00</p>
								<strong><p>5 bids</p></strong>
							  </div>
						  </div>
						  
						</div>
						
					</a>
					
					<a href="<?php echo 'auction_item_detail.php' ?>" id="noDecoration" class="col-xl-4 mt-2">
						
							<div class="card">
							  <img id="imageCard" class="card-img-top" src="/emax/resources/louisa03.jpg" alt="Card image cap">
							 
							  <div class="d-block pl-3 pt-3 pb-3">
								  <div id="fontBlack" class="card-block">
									<p class="card-text">Album Tour 2016</p>
									<p class="card-text">Bid: GBP 20.00</p>
									<strong><p>1 bids</p></strong>
								  </div>
							  </div>
							</div>
						
					</a>

					<a href="<?php echo 'auction_item_detail.php' ?>" id="noDecoration" class="col-xl-4 mt-2">

						<div class="card">
						  <img id="imageCard" class="card-img-top" src="/emax/resources/IMG_0851.jpg" alt="Card image cap">
						 
						  <div class="d-block pl-3 pt-3 pb-3">
							  <div id="fontBlack" class="card-block">
								<p class="card-text">Album Tour 2015</p>
								<p class="card-text">Bid: GBP 15.00</p>
								<strong><p>9 bids</p></strong>
							  </div>
						  </div>
						</div>
						
					</a>

				</div>
				
				
				<div class="container">
					<div class="row">		
						<ul class="pagination col-xl-4 mt-3 mx-auto">
							<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
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