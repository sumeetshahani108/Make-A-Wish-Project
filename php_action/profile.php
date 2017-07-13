<?php
		include 'conn.php';
		$sql_all_details = "SELECT * FROM `child` WHERE id=".$_POST['id'];
		$result_all_details = mysqli_query($conn,$sql_all_details); 
		$child_details = mysqli_fetch_assoc($result_all_details);

		$sql_get_address = "SELECT * FROM `address` WHERE id=".$child_details['address_id'];
		$result_get_address = mysqli_query($conn,$sql_get_address);
		$actual_address = mysqli_fetch_assoc($result_get_address);

		$sql_get_disease = "SELECT * FROM `disease` WHERE id=".$child_details['disease_id'];
		$result_get_disease = mysqli_query($conn,$sql_get_disease);
		$actual_disease = mysqli_fetch_assoc($result_get_disease);

		$sql_get_document = "SELECT * FROM `document` WHERE id=".$child_details['document_id'];
		$result_get_document = mysqli_query($conn,$sql_get_document);
		$actual_document = mysqli_fetch_assoc($result_get_document);
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
	<style type="text/css">
		body{
			background-color: #f8f8f8;
			padding:40px 40px 40px 40px;
		}
		.main{
			height:100vh;
			width:90vw;
			background-color: white;
			border-radius: 20px;
			border:2px solid #EEE;
			padding-top: 10vh;
		}
		.profile_image{
			width:100%;
			height:35vh;
			border-radius:15px;
		}
		.image_details{
			border:2px solid #EEE;
			border-radius:15px;
			padding:0px;
		}
		.basic_details{
			padding:5px 20px;
		}
	</style>
</head>
<body>
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-3 image_details">
						<img src="../../furniture/images/slider5.jpg" class="profile_image img-thumbnail">
						
							<h4><?php echo $child_details["first_name"]." ".$child_details["last_name"];?></h4>
						<div class="basic_details">
							<h5><?php echo $actual_address["street"].", ".$actual_address["city"].", ".$actual_address["state"].", "?></h5>
							<h5>Age : <?php echo $child_details["age"];?></h5>
							<h5>Gender : <?php echo $child_details["gender"];?></h5>
							<h5>Email : <?php echo $child_details["email"];?></h5>
							<h5>Disease : <?php echo $actual_disease["type"];?></h5>
						</div>
					</div>
					<div>
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
						<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Modal Header</h4>
						        </div>
						        <div class="modal-body">
						          <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../../furniture/images/slider5.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="../../furniture/images/slider6.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="../../furniture/images/slider7.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						  </div> 
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>