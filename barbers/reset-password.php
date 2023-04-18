<?php
session_start();
error_reporting(0);
include('../admin/includes/dbconnection.php');
error_reporting(0);

if (!isset($_SESSION['confirm_state'])){
	header('location:index.php');
}

if(isset($_POST['submit'])) {

    if(!($_POST['newpassword1'] !== $_POST['newpassword2'])){
		$msg = " Two passwords aren't same";
	} 

	else {
		$password=md5($_POST['newpassword1']);
		$id = $_SESSION['reset_barber_id']; 
        $query=mysqli_query($con,"update tblbarber set Password='$password'  where  ID='$id' ");
		if($query)
		{
		  $msg = " The password has been reset";
		  session_destroy();
        }
	}
}  
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>  reset password </title>

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
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="../admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="../admin/js/metisMenu.min.js"></script>
<script src="../admin/js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">

</head> 
<body class="">
	<div class="">
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="login-page ">
				<h3 class="title1">   Reset the password </h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Enter the new password, then repeat it to confirm</h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
							<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
							<input type="password" name="newpassword1" class="lock" placeholder="  New Password" required="true">
							
							<input type="password" name="newpassword1" class="lock" placeholder="  Confirm new password" required="true">
							
							<input type="submit" name="submit" value=" submit">
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="index.php">   Back to admin login page</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
		
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