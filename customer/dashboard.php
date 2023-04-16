<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['customerId'])) {
	header('location:logout.php');
}
if (($_POST['token'] == $_SESSION['customer-csrf-token'])) {
	$name = $_POST['service']; //$_POST['date'])
	$ret = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tblservice where Name = '$name'")) ;
	$time =$_POST['time'] ;
	$date = $_POST['date'];

	$serviceTime = $ret ['Time'];
	$new_time = date('H:i', strtotime($_POST['time'] . ' + ' . $serviceTime . ' minutes')); // Adds minutes to the time string

	$dateindex = date( "N",  strtotime($_POST['date']) ); //Sunday = 7

	$id=$_SESSION['customerId'];
	$serviceID = $ret['ID'];
    
    if ($dateindex == 1){  //monday
       $msg = "This Day is a holiday";
	}

	else if ($dateindex == 5){  //Friday
		 
		$timestamp1 = strtotime($_POST['time']) ;
		$timestamp2 = strtotime($new_time);

		$timestamp3 = strtotime("8:00") ;
		$timestamp4 = strtotime("10:30");

		if (! ($timestamp1 >= $timestamp3 && $timestamp2 <= $timestamp4 )) { //Out of work hours
			$msg ="This appointment is Out of hours work $time - $new_time on Friday choose another";
		} else{
			$query=mysqli_query($con, "INSERT INTO `tblappointment` (`CustomerID`, `ServiceID`, `Status`, `Date`, `Time`, `end_time`) VALUES ($id, $serviceID, '0', '$date', '$time', '$new_time');");
			if($query){
				$msg = "The appointment $time - $new_time on $date has been successfully booked";
			}else{
				$msg = "This appointment $time - $new_time on $date is reserved choose another";
			}

		}
	 }else{
		$timestamp1 = strtotime($_POST['time']) ;
		$timestamp2 = strtotime($new_time);

		$timestamp3 = strtotime("10:00") ;
		$timestamp4 = strtotime("20:23");
		

		if (! ($timestamp1 >= $timestamp3 && $timestamp2 <= $timestamp4 )) { //Out of work hours
			$msg ="This appointment is Out of hours work $time - $new_time on $date choose another";
		} else{
			$query=mysqli_query($con, "INSERT INTO `tblappointment` (`CustomerID`, `ServiceID`, `Status`, `Date`, `Time`, `end_time`) VALUES ($id, $serviceID, '0', '$date', '$time', '$new_time');");
			if($query){
				$msg = "The appointment $time - $new_time on $date has been successfully booked";
			}else{
				$msg = "This appointment $time - $new_time on $date is reserved choose another";
			}
		}


	 }
	
	
	if ($_POST['date']) {
		//echo mysqli_fetch_array(mysqli_query($con,"SELECT Price FROM tblservice where Name = '$name'"))['Price'];
		//echo $_POST['time'];
		//echo $_POST['date'];
	}
	if (!isset($_POST['submit'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$services = $_POST['services'];
		$adate = $_POST['adate'];
		$atime = $_POST['atime'];
		$phone = $_POST['phone'];
		$aptnumber = mt_rand(100000000, 999999999);

		$query = mysqli_query($con, "insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
		if ($query) {
			$ret = mysqli_query($con, "select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
			$result = mysqli_fetch_array($ret);
			$_SESSION['aptno'] = $result['AptNumber'];
			echo "<script>window.location.href='thank-you.php'</script>";
		} else {
			$msg = "Something Went Wrong. Please try again";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> zain salon</title>

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
		.bg-light {
			text-align: center;
			padding: 1%;
			border-radius: 10px;
		}
	</style>
</head>

<body>
	<?php include_once('includes/header.php'); ?>
	<!-- END nav -->

	<section id="home-section" class="hero" style="background-image: url(images/bg.jpg);" data-stellar-background-ratio="0.5">
		<div class="home-slider owl-carousel">
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/bg_1.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate ">
							
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/bg_2.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }" dir="rtl">
							<div class="text mt-5  bg-light">
								<h1 class="subheading">the natural beauty</h1>
								<h1 class="mb-4"> zain Salon</h1>
								<h2 class="mb-4">All international stories and providing everything new in order to serve you better</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<br>
	<section class="ftco-section ftco-no-pt ftco-booking">
		<div class="container">
			<div class="row">

				<div class="col-6">
					<form action="#form1" method="post" id = "form1"class="appointment-form" dir="rtl">
					<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="row">

							<div class="col-sm-12	">
								<div class="form-group">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="service" id="services" required="true" class="form-control" dir="ltr">
											<option value=""> choose service</option>
											<?php $query = mysqli_query($con, "select * from tblservice");
											while ($row = mysqli_fetch_array($query)) {
											?>
												<option dir="ltr" value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-12	">
								<div class="form-group">
									<input dir="ltr" type="date" class="form-control " placeholder="choose date " name="date" id='date' required="true">
								</div>
							</div>
							<div class="col-sm-12	">
								<div class="form-group">
									<input dir="ltr" type="time" class="form-control " placeholder=" choose time" name="time" id='time' required="true">
								</div>
							</div>



							<input type="hidden" name="token" value="<?php echo $_SESSION['customer-csrf-token']; ?>" />
							<div class="col-sm-12	">
								<div class="form-group">
									<input type="submit" name="submit" value="  apply " class="btn btn-primary">
								</div>
							</div>
						</div>
					</form>

				</div>

				<div class="col-6">
					<img src="images/bg-1.jpg" style="width:120%">

				</div>

			</div>
		</div>
		</div>



	</section>


	<br>


	<?php include_once('includes/footer.php'); ?>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


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