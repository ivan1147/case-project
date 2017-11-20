	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
		
			<h1>Album Tour 2017</h1>
			
			<ul class="breadcrumb mb-0">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo 'auction.php' ?>">Auction</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo 'auction_item.php' ?>">Album</a></li>
			  <li class="breadcrumb-item active">Album Tour 2017</li>
			</ul>
			
			
			<div class="container mt-3">
			
				<div class="row">

					<div class="card">
					<div class="row">
					  <div class="col-xl-7">
						<img id="auctionWallpaper" class="card-img-top" src="/emax/resources/louisa-johnson--a.jpg" alt="Card image cap">
					  </div>
					  <div class="col-xl-5 pt-3">
					  
						  <div class="card-block">
							<h3 class="card-title">Album Tour 2017</h3>
							<div class="jumbotron pt-4">
								<table class="table">
								<tr>
								<td>
								<p class="card-text">Start Date</p>
								</td>
								<td>
								<p class="card-text">2017-11-01</p>
								</td>
								</tr>
								
								<tr>
								<td>
								<p class="card-text">End Date</p>
								</td>
								<td>
								<p class="card-text">2017-12-01</p>
								</td>
								</tr>
								
								<tr>
								<td>
								<p class="card-text">Starting Bid</p>
								</td>
								<td>
								<p class="card-text">GBP 10.00</p>
								</td>
								</tr>
								
								<tr>
								<td>
								<p class="card-text"><strong>Current Bid</strong></p>
								</td>
								<td>
								<p class="card-text"><strong>GBP 35.00</strong></p>
								</td>
								</tr>
								
								<tr>
								<td>
								<p class="card-text">Bids</p>
								</td>
								<td>
								<p class="card-text">5</p>
								</td>
								</tr>
								</table>
									
								<button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal">Bid</button>
								<button type="submit" class="btn btn-info">Buy It Now</button>
							</div>
						  </div>
					  
					  </div>
					</div>
				</div>
				</div>
				
				<div class="modal fade" id="myModal">
					<div class="modal-dialog">
					  <div class="modal-content">
					  
						<!-- Modal Header -->
						<div class="modal-header">
						  <h4 class="modal-title">Bid Your Price</h4>
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<!-- Modal body -->
						<div class="modal-body">
							<div class="form-group">
							<p class="card-text">Current Bid: </p>
							<p class="card-text"><strong>GBP 35.00</strong></p>
							<label for="email">Your Price:</label>
							<input type="email" class="form-control" id="email">
							</div>
						</div>
						
						<!-- Modal footer -->
						<div class="modal-footer">
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Submit</button>
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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