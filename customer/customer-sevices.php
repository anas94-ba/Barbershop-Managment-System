<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if ( !isset($_SESSION['customerId']) ) {
	header('location:logout.php');
}



  ?>
<!DOCTYPE HTML>
<html>
<head>
<title> Services List</title>

<!-- Bootstrap Core CSS -->
<link href="../admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="../admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!-- Metis Menu -->
<link href="../admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

    
<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="css/ionicons.min.css">

<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">


<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/style.css">
<style type="text/css">
            .bg-light{
    text-align:center;
    padding :1%;
    border-radius:10px;
    }

</style>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper" style ="margin:0px">
			<div class="main-page" >
				<div class="tables" >
				<?php
					$query=mysqli_query($con,"select * from  tblservice");
					if ($query){
						$cnt=1;
					    if (mysqli_num_rows($query) === 0){  
					
					?>
						<div class="text-center" style="margin: 14rem;">
						   <h1>    There isn't services until now </h1>
						</div>

				<?php	

                        }

					else {
				?>
				<h3 class="title1"> Services List</h3>
					
					
				
				<div class="table-responsive bs-example widget-shadow">
					<h4 rtl>  Services </h4>
					<table class="table table-bordered" style="text-align: center; "> 
						<thead > 
							<tr> 
								<th style="text-align: center; ">#</th> 
								<th style="text-align: center; ">name</th> 
								<th style="text-align: center; ">price</th> 
								<th style="text-align: center; ">time in minutes </th>
							</tr> 
						</thead> 
						<tbody>
                          <?php

                            while ($row=mysqli_fetch_array($query)) {

                          ?>

						 <tr> 
							<th style="text-align: center; "><?php echo $cnt;?></th> 
							<td><?php  echo $row['Name'];?></td> 
							<td><?php  echo $row['Price'];?></td>
							<td><?php  echo $row['Time'];?></td> 
							</tr>   
							<?php 
                               $cnt=$cnt+1;
                            }
						}?>
						   </tbody> 
						</table> 
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
	</div>

    <?php include_once('includes/footer.php');?>
    
  

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
      
    </body>
  </html>