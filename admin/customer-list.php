<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['adminId'])) {
  header('location:logout.php');
  } 



  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Customers List </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
				<?php
					$query=mysqli_query($con,"select * from  tblcustomer");
					if ($query){
						$cnt=1;
					    if (mysqli_num_rows($query) === 0){  
					
					?>
						<div class="text-center" style="margin: 14rem;">
						   <h1>There isn't customers until now</h1>
						</div>

				<?php	

                        }

					else {
				?>
				<h3 class="title1"> The customers List</h3>
					
					
				
				<div class="table-responsive bs-example widget-shadow">
					<h4>  The Customers  </h4>
					<table class="table table-bordered" style="text-align: center; "> 
						<thead > 
							<tr> 
								<th style="text-align: center; ">#</th> 
								<th style="text-align: center; ">customer name </th> 
								<th style="text-align: center; ">phone number </th> 
								<th style="text-align: center; "> email</th>
								<th style="text-align: center; "> operations</th>
							</tr> 
						</thead> 
						<tbody>
                          <?php

                            while ($row=mysqli_fetch_array($query)) {

                          ?>

						 <tr> 
							<th style="text-align: center; "><?php echo $cnt;?></th> 
							<td><?php  echo $row['Name'];?></td> 
							<td><?php  echo $row['phone'];?></td>
							<td><?php  echo $row['Email'];?></td> 
							<td >
								<a class="btn btn-danger " style="margin-right: 45px;" title="customer_delete.php?id=<?php echo $row['ID']; ?>&token= <?php echo $_SESSION['csrf_token']; ?>">
									Delete
								</a>
								<a class="btn btn-primary" href="customer-update-display.php?id=<?php echo $row['ID']?>&email=<?php echo $row['Email']?>&phone=<?php echo $row['phone']?> ">
								   Edit
							    </a>
							</td>
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


	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}

			const buttons = document.querySelectorAll('.btn-danger');

			for (let i = 0; i < buttons.length; i++) {
				buttons[i].addEventListener('click', function() {
					const confirmed = confirm("Are you sure you want to delete this item?");
				    if (confirmed) {
					    window.location.href=buttons[i].title;
				    } 
				});
			}
			
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>


	

	
</body>
</html>
