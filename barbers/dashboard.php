<?php
session_start();
error_reporting(0);
include('../admin/includes/dbconnection.php');
if ( !isset($_SESSION['barberId']) ) {
	header('location:logout.php');
}
if ( $_POST['token'] == $_SESSION['barber-csrf-token']) {
    $address=$_POST['address'];
    $object=$_POST["object"];
    $id=$_SESSION['barberId'];
    $status = 0;
    $date = date("Y/m/d");
	$query=mysqli_query($con,"INSERT INTO `tblbarbermsg` (`BarberID`, `Title`, `Object`, `Status`, `Date`) VALUES ('$id', '$address', '$object', '$status', '$date');");
	if($query){
        $msg = "The message has been added successfully";
    }else{
        $msg = "The message adding failed";
    }
}


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>  main page</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="../admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="../admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="../admin/js/jquery-1.11.1.min.js"></script>
<script src="../admin/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="../admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../admin/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="../admin/js/metisMenu.min.js"></script>
<script src="../admin/js/custom.js"></script>
<link href="../admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- header-starts -->
		<?php include_once('includes/header.php'); ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper" style ="margin:0px">
			<div class="main-page">
			<form method="post" action = "">
			<p style="font-size:16px; color:red" align="center"> <?php if($msg){
				echo $msg;
			}  ?> </p>

				<div class="form-group"> 

					<label for="ll">Address</label>
					<input type="text"  name="address" class="form-control" id="ll" name="address" placeholder="address" required="true" > 
					<label for="ll2">Object</label>
                    <textarea rows="4" cols="50" name="object" class="form-control" placeholder="Enter the object here ........." required="true"></textarea>
                    <input type="hidden" name="token" value= "<?php echo $_SESSION['barber-csrf-token'] ?>"/>            
                    <button type="submit" value= "submit" name="submit" style="margin-top: 20px; " class="btn btn-primary">Send</button>		

				</div>
					
			</form> 
				<div class="tables">
					<?php
                    $id=$_SESSION['barberId'];
					$query = mysqli_query($con, "select  Title, Object, Date ,Status from tblbarbermsg where BarberID = '$id' ;");
					if ($query) {
						$cnt = 1;
						if (mysqli_num_rows($query) === 0 ) {

					?>
							<div class="text-center" style="margin: 14rem;">
								<h1> There isn't messages until now </h1>
							</div>

						<?php

						} else {
                            $cnt = 1;
						?>
							<h3 class="title1">Your Messages</h3>



							<div class="table-responsive bs-example widget-shadow">
								<h4 rtl> Messages </h4>
								<table class="table table-bordered" style="text-align: center; ">
									<thead>
										<tr>
                                            <th style="text-align: center; ">#</th>
											<th style="text-align: center; "> Title</th>
											<th style="text-align: center; "> Object</th>
                                            <th style="text-align: center; "> Date</th>
                                            <th style="text-align: center; "> Status</th>
										</tr>
									</thead>
									<tbody>
										<?php

										while ($row = mysqli_fetch_array($query)) {

										?>

											<tr>
												<th style="text-align: center; "><?php echo $cnt; ?></th>
												
												<td><?php echo $row['Title']; ?></td>
												<td><?php echo $row['Object']; ?></td>
                                                <td><?php echo $row['Date']; ?></td>
                                                <td><?php
                                                if ($row['Status'] ==0){
                                                    echo "in progress"; 

                                                } else{
                                                    echo 'finished'; 
                                                }
                                                ?></td>
												
											</tr>
									<?php
											$cnt = $cnt + 1;
										}
									} ?>
									</tbody>
								</table>
							</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!--footer-->
	<?php include_once('includes/footer.php'); ?>
	<!--//footer-->
	</div>

    
  

    <!-- Classie -->
	<script src="../admin/js/classie.js"></script>
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
	<script src="../admin/js/jquery.nicescroll.js"></script>
	<script src="../admin/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="../admin/js/bootstrap.js"> </script>
    </body>
  </html>