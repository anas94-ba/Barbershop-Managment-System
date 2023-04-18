<?php
session_start();
error_reporting(0);
include('../admin/includes/dbconnection.php');

if (!isset($_SESSION['barberId']) ) {
    header('location:logout.php');
} 
if ($_SESSION['barber-csrf-token'] - $_POST["token"] === 0){
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$id =$_SESSION['barberId'];
		$query=mysqli_query($con,"UPDATE tblbarber SET Email= '$email' , Phone='$phone' where ID=$id;");
		if($query){
			$msg = "The updating has been done successfully";
		}else{
			$msg = "The updating failed";
		}
}

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>  information update </title>

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
	<div class="main-content" >
		
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper" style="margin:0px;">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">  Update email</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 

                    <?php 
					    $query = mysqli_query($con, "SELECT Email , Phone FROM tblbarber where ID=$id;;"); 
                        $row = mysqli_fetch_array($query);
					?>	
						<div class="form-body">
							<form method="post" action = "">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>


								<div class="form-group"> 

								    <label for="ll">email</label>
									<input type="email" value='<?php echo $row["Email"]?>' class="form-control" id="ll" name="email" placeholder="email" required="true"> 
								
									<label for="ll2">phone</label>
									<input type="text" value='<?php echo $row["Phone"]?>' class="form-control" id="ll2" name="phone" placeholder="phone" required="true"> 
								
									<input type="hidden" name="token" value="<?php echo $_SESSION['barber-csrf-token'];?>" >
									<button type="submit" name="submit" style="margin-top: 20px; margin-bottom: 80px;" class="btn btn-default">update</button>
								

								</div>
									
                            </form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
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
