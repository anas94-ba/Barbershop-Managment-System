<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php'; 
require '../phpmailer/src/SMTP.php';

session_start();
error_reporting(0);
include('../admin/includes/dbconnection.php');

include('../load.php');


$env = load_env() ;


if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
    $query=mysqli_query($con,"select ID from tblbarber where  Email='$email' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
		// Generate a CSRF token
		$token = uniqid();
		$_SESSION['confirm_barber_password']=$token;

		$_SESSION['reset_barber_id']=$ret[0]['id'];


		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host = $env["EMAIL_HOST"];
		$mail->SMTPAuth=true;
		$mail->Username =$env["EMAIL_USERNAME"];
		$mail->Password=$env["EMAIL_PASSWORD"];
		$mail->SMTPSecure='ssl';
		$mail->Port=$env["EMAIL_PORT"];
		$mail->setFrom($env["EMAIL_FROM"]);
		$mail->addAddress($_POST['email']);
		$mail->isHTML(true);
		$mail->Subject="Reset the password to zain salon website";
		$mail->Body="The reset token is {$token}";
		if(!$mail->send()){
		  $msg = "please return in another time";
		}else{
			header('location:confirm-password.php');
		}
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>  reset barber password </title>

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
<body class="">
	<div class="main-content">
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Reset the password</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome to recover your password, please enter your email</h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="">
							<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
							<input type="text" name="email" placeholder=" email" required="true">							
							<input type="submit" name="submit" value=" submit">
							
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