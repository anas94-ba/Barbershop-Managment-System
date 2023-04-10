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
<title>  customer message</title>

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
                
					$query=mysqli_query($con,"select tblcustomermsg.ID , Title , Object , Status ,Date ,Name from  tblcustomermsg join tblcustomer on tblcustomermsg.CustomerID = tblcustomer.ID;");
					if ($query){
						$cnt=1;
					    if (mysqli_num_rows($query) === 0){  
					
					?>
						<div class="text-center" style="margin: 14rem;">
						   <h1>There isn't messages from customers until now  </h1>
						</div>

				<?php	

                        }

					else {
				?>
				<h3 class="title1"> customer's messages list </h3>
					
					
				
				<div class="table-responsive bs-example widget-shadow">
					<h4 rtl> The messages </h4>
					<table class="table table-bordered" style="text-align: center; "> 
						<thead > 
							<tr> 
								<th style="text-align: center; ">#</th> 
								<th style="text-align: center; ">Title</th> 
								<th style="text-align: center; ">Object</th> 
								<th style="text-align: center; ">Date </th>
                                <th style="text-align: center; ">Sender </th>
                                <th style="text-align: center; ">Status </th>
							</tr> 
						</thead> 
						<tbody>
                          <?php

                            while ($row=mysqli_fetch_array($query)) {

                          ?>

						 <tr> 
							<th style="text-align: center; "><?php echo $cnt;?></th> 
							<td><?php  echo $row['Title'];?></td> 
							<td ><div style="margin: 100 "><p style="width: 500px; word-wrap: break-word; "><?php  echo $row['Object'];?></p></div></td>
							<td><?php  echo $row['Date'];?></td> 
                            <td><?php  echo $row['Name'];?></td> 
							<td >
                                <?php 
                                  if($row['Status'] == 1){
                                    echo "Old";
                                  }else{ ?>
                                    <a class="btn btn-danger "  href="customer-msg-update.php?id=<?php echo $row['ID']; ?>&token= <?php echo $_SESSION['csrf_token']; ?>">
									New
								    </a>
                                <?php }
                                ?>
								
								
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

			
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>


	

	
</body>
</html>
