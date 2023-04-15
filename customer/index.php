<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_COOKIE['customer-email']) && isset($_COOKIE['customer-password'])) {
	$email=$_COOKIE['customer-email'];
    $password=$_COOKIE['customer-password'];
	// Perform login validation using cookie data
	$query=mysqli_query($con,"select ID from tblcustomer where  Email='$email' && Password='$password' ");
	$ret=mysqli_fetch_array($query);
	if($ret>0){
		$_SESSION['customerId']=$ret['ID'];

		// Generate a CSRF token
		$csrf_token = bin2hex(random_bytes(32));;

		// Store the token in a session variable
		$_SESSION['customer-csrf-token'] = $csrf_token;

		header('location:dashboard.php');
	}
	
  }elseif(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tblcustomer where  Email='$email' && Password='$password'  ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['customerId']=$ret['ID'];

	  // Generate a CSRF token
      $csrf_token = bin2hex(random_bytes(32));

      // Store the token in a session variable
      $_SESSION['customer-csrf-token'] = $csrf_token;

	  setcookie('customer-email', $email, time() + (86400 * 30), "/");
      setcookie('customer-password', $password, time() + (86400 * 30), "/");

      header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }

?>
<!DOCTYPE HTML>
<html>
<head>
<title> Admin login  </title>

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
		
		<!-- main content start-->
			<div class="main-page login-page ">
				<h3 class="title1"> login page</h3>
				<div class="widget-shadow">
					<div class="login-top">

						<h4>Welcome to admin page in zain salon </h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="">
							<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
							<input type="email" style="background-position: 11px 11px; background-size: 6%;background: url(../admin/images/user.png)no-repeat 8px 10px #fff;padding: 8px 15px 8px 37px;width:100%; margin-bottom:20px;" name="email" placeholder=" email " required="true">
							<input type="password" name="password" class="lock" placeholder="password  " required="true">
							<input type="submit" name="login" value=" submit">
							<div class="forgot-grid">
								
							<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="customer-forget-password.php">  Do you forget password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
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