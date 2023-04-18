<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['adminId'])) {
	header('location:logout.php');
}
$currentDate = date("Y/m/d");
?>
<!DOCTYPE HTML>
<html>

<head>
	<title> main page</title>

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
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

		<?php include_once('includes/sidebar.php'); ?>

		<?php include_once('includes/header.php'); ?>
		<!-- main content start-->
		<div id="page-wrapper" class="row calender widget-shadow">
			<div class="main-page">


				<div class="row calender widget-shadow">
					<div class="row-one">
						<div class="col-md-4 widget">
							<?php $query1 = mysqli_query($con, "Select * from tblcustomer");
							$totalCustomer = mysqli_num_rows($query1);
							?>
							<div class="stats-left ">
								<h5>Total</h5>
								<h4>Customers</h4>
							</div>
							<div class="stats-right">
								<label> <?php echo $totalCustomer; ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-4 widget states-mdl">
							<?php
							$query2 = mysqli_query($con, "Select * from tblbarber");
							$totalBarber = mysqli_num_rows($query2);
							?>
							<div class="stats-left">
							    <h5>Total</h5>
								<h4>Barbers</h4>
							</div>
							<div class="stats-right">
								<label> <?php echo $totalBarber; ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-4 widget states-last">
							<?php $query3 = mysqli_query($con, "Select * from tblappointment where Status='0'");
							$newAppointments = mysqli_num_rows($query3);
							?>
							<div class="stats-left">
								<h4>New</h4>
								<h5> Appointments</h5>
							</div>
							<div class="stats-right">
								<label><?php echo $newAppointments; ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>

				</div>

				<div class="row calender widget-shadow">
					<div class="row-one">
						<div class="col-md-4 widget">
							<?php $query5 = mysqli_query($con, "SELECT * FROM `tblbarbermsg` where Status='0'");
							$newBarbersMessages = mysqli_num_rows($query5);
							?>
							<div class="stats-left">
								<h4>New </h4>
								<h5>Barbers </h5>
								<h5>Messages</h5>
							</div>
							<div class="stats-right">
								<label> <?php echo $newBarbersMessages; ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-4 widget states-mdl">
							<?php
							$query6 = mysqli_query($con, "SELECT * FROM `tblcustomermsg` where Status='0'");
							$newCustomersMessages = mysqli_num_rows($query6);
							?>
							<div class="stats-left">
								<h4>New</h4>
								<h5>Customer</h5>
								<h5>Messages</h5>
							</div>
							<div class="stats-right">
								<label> <?php echo $newCustomersMessages; ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="col-md-4 widget states-last">
							<?php
							$query6 = mysqli_query($con, "SELECT * FROM `tblappointment` where Date='$currentDate'");
							$currentAppointments = mysqli_num_rows($query6);
							?>
							<div class="stats-left">
								<h4>Total</h4>
								<h5>Appointments </h5>
								<h5>in this day</h5>
							</div>
							<div class="stats-right">
								<label> <?php echo $currentAppointments; ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>


						</div>

				</div>

				<div class="row calender widget-shadow">
					<div class="row-one">
						<div class="col-md-4 widget">
							<?php $query7 = mysqli_query($con, "SELECT * FROM `tblappointment` where Date='$currentDate' and Status='1'");
							$paidCurrentAppointments = mysqli_num_rows($query7);
							?>
							<div class="stats-left">
							    <h4>Total</h4>
								<h5>Paid </h5>
								<h5>Appointments </h5>
								<h5>in this day</h5>
							</div>
							<div class="stats-right">
								<label> <?php echo $paidCurrentAppointments ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-4 widget states-mdl">
							<?php
							$query8 = mysqli_query($con, "SELECT * FROM `tblappointment` where Date='$currentDate' and Status='1'");
							$currentBills = mysqli_num_rows($query8);
							?>
							<div class="stats-left">
							    <h4>Total</h4>
								<h5>Bills </h5>
								<h5>in this day</h5>
							</div>
							<div class="stats-right">
								<label> <?php echo $currentBills; ?></label>
							</div>
							<div class="clearfix"> </div>
						</div>					

				</div>




			</div>
		</div>
		<!--footer-->
		<?php include_once('includes/footer.php'); ?>
		<!--//footer-->
	</div>
	<!-- Classie -->
	<script src="js/classie.js"></script>
	<script>
		var menuLeft = document.getElementById('cbp-spmenu-s1'),
			showLeftPush = document.getElementById('showLeftPush'),
			body = document.body;

		showLeftPush.onclick = function() {
			classie.toggle(this, 'active');
			classie.toggle(body, 'cbp-spmenu-push-toright');
			classie.toggle(menuLeft, 'cbp-spmenu-open');
			disableOther('showLeftPush');
		};

		function disableOther(button) {
			if (button !== 'showLeftPush') {
				classie.toggle(showLeftPush, 'disabled');
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