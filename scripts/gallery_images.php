	<body>
  
	<div class="container">
		
		<?php 
			include "head.php";
			include "navigation.php";
		
			if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']))
			{
			}
			else
			{
				echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
				exit();
			}
		
		?>
		
		
		<!--Card-->
		<div class="container mt-5">
		
			<h1>Imma Megastar Tour Asia</h1>
			
			<ul class="breadcrumb">
			
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			   <li class="breadcrumb-item"><a href="<?php echo 'gallery.php' ?>">Gallery</a></li>
			  <li class="breadcrumb-item active">Imma Megastar Tour Asia</li>
			</ul>
			
			<div class="container">
				<div class="row">
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="<?php echo 'gallery_images_comment.php' ?>">
								<img id="imageCard" class="card-img-top" src="/emax/resources/gallery-embargoed-until-midnight-on-sunday-4-october-19.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/louisa-johnson.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/maxresdefault.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/xfactor1412a.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-xl-4">

						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/x-factor-2015-final-p2-8.jpg" alt="Card image cap">
							</a>
						</div>
	
					</div>
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/x-factor-2015-final-pictures-9.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/x-factor-2015-final-pictures-15.jpg" alt="Card image cap" >
							</a>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/XFactor-413335.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="img-thumbnail">
							<a href="#" target="_blank">
								<img id="imageCard" class="card-img-top" src="/emax/resources/ad_179166249-e1440760539579.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
				</div>
				
				<div class="container">
					<div class="row">		
					<a  id="createItem" href="<?php echo 'gallery_images_upload.php' ?>" class="btn btn-info mt-3">Upload Image</a>
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