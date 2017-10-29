

<!DOCTYPE html>
<html lang="en">
	<head>
 
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
		
		
	</head>
  
  <body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		  <a class="navbar-brand" href="#">Emax</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" href="#">Auction</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Gallery</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Competition</a>
			  </li>   
			  <li class="nav-item">
				<a class="nav-link" href="#">Discussion</a>
			  </li>  			  
			</ul>
		  </div>  
		</nav>
		
		<!--Jumbotron-->
		<div class="jumbotron">
			<h1>Bootstrap Tutorial</h1> 
			<p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
			responsive, mobile-first projects on the web.</p> 
		</div>
	
		<!--Carousel-->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
			  <img class="d-block img-fluid" src="/emax/resources/la.jpg" alt="First slide">
			  <div class="carousel-caption d-none d-md-block">
				<h3>Los Angeles</h3>
				<p>We had such a great time in LA!</p>
			  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block img-fluid" src="/emax/resources/ny.jpg" alt="Second slide">
			  <div class="carousel-caption d-none d-md-block">
				<h3>New York</h3>
				<p>We love the Big Apple!</p>
			  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block img-fluid" src="/emax/resources/chicago.jpg" alt="Third slide">
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
		 
  
	  
		
		<div class="well">Basic Well</div>

		<div class="row">
		  <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
		  <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
		  <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
		</div>

		<br>

		<!--Table-->
		<div class="table-responsive">          
		<table class="table">
			<thead>
			  <tr>
				<th>#</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Age</th>
				<th>City</th>
				<th>Country</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>1</td>
				<td>Anna</td>
				<td>Pitt</td>
				<td>35</td>
				<td>New York</td>
				<td>USA</td>
			  </tr>
			</tbody>
		</table>
		</div>
		
		<!--Gallery-->
		<div class="row">
		  <div class="col-md-4">
			<div class="img-thumbnail">
			  <a href="/w3images/lights.jpg" target="_blank">
				<img src="/emax/resources/lights.jpg" alt="Lights" style="width:100%">
				<div class="caption">
				  <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
				</div>
			  </a>
			</div>
		  </div>
		  <div class="col-md-4">
			<div class="img-thumbnail">
			  <a href="/w3images/nature.jpg" target="_blank">
				<img src="/emax/resources/nature.jpg" alt="Nature" style="width:100%">
				<div class="caption">
				  <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
				</div>
			  </a>
			</div>
		  </div>
		  <div class="col-md-4">
			<div class="img-thumbnail">
			  <a href="/w3images/fjords.jpg" target="_blank">
				<img src="/emax/resources/fjords.jpg" alt="Fjords" style="width:100%">
				<div class="caption">
				  <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
				</div>
			  </a>
			</div>
		  </div>
		</div>
		
		<!--Alert-->
		<div class="alert alert-success alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Success!</strong> Indicates a successful or positive action.
		</div>
		
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
		</div>
		
		<!--Normal Button-->
		<a href="#" class="btn btn-info" role="button">Link Button</a>
		  <button type="button" class="btn btn-info">Button</button>
		  <input type="button" class="btn btn-info" value="Input Button">
		  <input type="submit" class="btn btn-info" value="Submit Button">
		<br> <br>
		
		<!--Button Group-->
		<div class="btn-group">
		  <button type="button" class="btn btn-primary">Apple</button>
		  <button type="button" class="btn btn-primary">Samsung</button>
		  <button type="button" class="btn btn-primary">Sony</button>
		</div>
		
		<br>
		<!--Badge-->
		<a href="#">News <span class="badge">5</span></a><br>
		<a href="#">Comments <span class="badge">10</span></a><br>
		<a href="#">Updates <span class="badge">2</span></a>
		
		
		<br>
		<!--Progress Bar-->
		<div class="progress">
		<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:40%"></div>
		</div>

		<br>
		<!--Pagination-->
		<ul class="pagination">
			<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item active"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
		
		<!--List Group-->
		<ul class="list-group">
		  <li class="list-group-item active">Active item</li>
		  <li class="list-group-item">Second item</li>
		  <li class="list-group-item">Third item</li>
		</ul>
		
		<br>
		<!--Bread Crumbs-->
		<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="#">Photos</a></li>
		  <li class="breadcrumb-item"><a href="#">Summer 2017</a></li>
		  <li class="breadcrumb-item"><a href="#">Italy</a></li>
		  <li class="breadcrumb-item active">Rome</li>
		</ul>
		
		<!--Card-->
		<div class="card">
		  <div class="card-header">
			Featured
		  </div>
		  <div class="card-block">
			<h4 class="card-title">Special title treatment</h4>
			<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			<a href="#" class="btn btn-primary">Go somewhere</a>
		  </div>
		</div>
		
		<br>
		<!--Dropdown-->
		<div class="dropdown">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			  Dropdown button
			</button>
			<div class="dropdown-menu">
			  <a class="dropdown-item" href="#">Link 1</a>
			  <a class="dropdown-item" href="#">Link 2</a>
			  <a class="dropdown-item" href="#">Link 3</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Another link</a>
			</div>
		</div>
		
		<br>
		<!--Collapse-->
		<div id="accordion">
		  <div class="card">
			<div class="card-header">
			  <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				Collapsible Group Item #1
			  </a>
			</div>
			<div id="collapseOne" class="collapse show">
			  <div class="card-body">
				Lorem ipsum..
			  </div>
			</div>
		  </div>

		  <div class="card">
			<div class="card-header">
			  <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				Collapsible Group Item #2
			  </a>
			</div>
			<div id="collapseTwo" class="collapse">
			  <div class="card-body">
				Lorem ipsum..
			  </div>
			</div>
		  </div>

		  <div class="card">
			<div class="card-header">
			  <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
				Collapsible Group Item #3
			  </a>
			</div>
			<div id="collapseThree" class="collapse">
			  <div class="card-body">
				Lorem ipsum..
			  </div>
			</div>
		  </div>
		</div>
		
		<br>
		<!--Tabs-->
		<ul class="nav nav-tabs">
		  <li class="nav-item">
			<a class="nav-link active" href="#">Active</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Link</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Link</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link disabled" href="#">Disabled</a>
		  </li>
		</ul>
		
		<br>
		<!--Form-->
		<form>
		  <div class="form-group">
			<label for="email">Email address:</label>
			<input type="email" class="form-control" id="email">
		  </div>
		  <div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd">
		  </div>
		  <div class="form-check">
			<label class="form-check-label">
			  <input class="form-check-input" type="checkbox"> Remember me
			</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		
		<br>
		<!--Media Objects-->
		<div class="media">
		  <img class="d-flex mr-3" src="/emax/resources/img_avatar1.png" alt="Generic placeholder image" style="width:64px; height:64px">
		  <div class="media-body">
			<h5 class="mt-0">Media heading</h5>
			Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

			<div class="media mt-3">
			  <a class="d-flex pr-3" href="#">
				<img class="d-flex mr-3" src="/emax/resources/img_avatar2.png" alt="Generic placeholder image" style="width:64px; height:64px">
			  </a>
			  <div class="media-body">
				<h5 class="mt-0">Media heading</h5>
				Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
			  </div>
			</div>
		  </div>
		</div>
		
		<hr class="w-100 clearfix d-md-none">
		
		<br>
		<!--Modal-->
		<h2>Modal Example</h2>
		<!-- Button to Open the Modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		Open modal
		</button>

		<!-- The Modal -->
		<div class="modal fade" id="myModal">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Modal Heading</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
			  Modal body..
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			
		  </div>
		</div>
		</div>
		
		<br><br>
		<!--Tooltip-->
		<h3>Tooltip Example</h3>
		<p>The data-placement attribute specifies the tooltip position.</p>
		<a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">Top</a>
		<a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!">Bottom</a>
		<a href="#" data-toggle="tooltip" data-placement="left" title="Hooray!">Left</a>
		<a href="#" data-toggle="tooltip" data-placement="right" title="Hooray!">Right</a>
		  

	</div>

	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
	
  </body>
  
  
</html>