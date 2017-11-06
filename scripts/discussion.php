	<?php include "head.php"?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		
		<!--Card-->
		<div class="container">
		
			<h1>Discussion Board</h1>
			
			<ul class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Discussion Board</li>
			</ul>
			
			
			<div class="container">
			
				<div class="mt-4" id="accordion">
				  
				  <div class="card">
					<div class="card-header">
					  <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						Imma Megastar Tour Asia
					  </a>
					</div>
					<div id="collapseOne" class="collapse show">
					  <div class="card-body">
						<p class="card-text">Discuss about Asia Concert</p>
						<p class="card-text">Views: 20</p>
						<a href="<?php echo 'discussion_topic.php' ?>" class="btn btn-primary">View</a>
					  </div>
					</div>
				  </div>
				  

				  <div class="card">
					<div class="card-header">
					  <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						Imma Megastar Tour Aussie
					  </a>
					</div>
					<div id="collapseTwo" class="collapse">
					  <div class="card-body">
						<p class="card-text">Discuss about Australia Concert</p>
						<p class="card-text">Views: 10</p>
						<a href="<?php echo '' ?>" class="btn btn-primary">View</a>
					  </div>
					</div>
				  </div>

				  <div class="card">
					<div class="card-header">
					  <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
						Imma Megastar UK Concert
					  </a>
					</div>
					<div id="collapseThree" class="collapse">
					  <div class="card-body">
						<p class="card-text">Discuss about UK Concert</p>
						<p class="card-text">Views: 12</p>
						<a href="<?php echo '' ?>" class="btn btn-primary">View</a>
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