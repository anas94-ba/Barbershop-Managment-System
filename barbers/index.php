<?php
session_start();
error_reporting(0);
include('../admin/includes/dbconnection.php');

if (isset($_COOKIE['barber-username']) && isset($_COOKIE['barber-password'])) {
	$name=$_COOKIE['barber-username'];
    $password=$_COOKIE['barber-password'];
	// Perform login validation using cookie data
	$query=mysqli_query($con,"select ID from tblbarber where  Name='$name' && Password='$password' ");
	$ret=mysqli_fetch_array($query);
	if($ret>0){
		$_SESSION['barberId']=$ret['ID'];

		// Generate a CSRF token
		$csrf_token = bin2hex(random_bytes(32));;

		// Store the token in a session variable
		$_SESSION['barber-csrf-token'] = $csrf_token;

		header('location:dashboard.php');
	}
	
  }elseif(isset($_POST['login']))
  {
    $name=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tblbarber where  Name='$name' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['barberId']=$ret['ID'];

	  // Generate a CSRF token
      $csrf_token = bin2hex(random_bytes(32));

      // Store the token in a session variable
      $_SESSION['barber-csrf-token'] = $csrf_token;

	  setcookie('barber-username', $name, time() + (86400 * 30), "/");
      setcookie('barber-password', $password, time() + (86400 * 30), "/");

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
<title> Barber login  </title>

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
		
		<!-- main content start-->
			<div class="main-page login-page ">
				<h3 class="title1"> login page</h3>
				<div class="widget-shadow">
					<div class="login-top">

						<h4>Welcome to barber page in zain salon </h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="">
							<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
							<input type="text" class="user" name="username" placeholder=" username " required="true">
							<input type="password" name="password" class="lock" placeholder="password  " required="true">
							<input type="submit" name="login" value=" submit">
							<div class="forgot-grid">
								
							<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="forget-password.php">  Do you forget password?</a>
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