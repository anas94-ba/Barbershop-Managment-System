<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['customerId'])) {
    header('location:logout.php');
}

if ($_SESSION['csrf_token'] - $_POST["token"] === 0) {
    if ($_POST['email'] != null) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $_SESSION['customerId'];
        $query = mysqli_query($con, "UPDATE tblcustomer SET Email= '$email' , phone ='$phone' where ID = $id;");
        if ($query) {
        } else {
            $msg = "Enter all fields";
        }
    }
}


?>
<!DOCTYPE HTML>
<html>

<head>
    <title> messages</title>

    <!-- Bootstrap Core CSS -->
    <link href="../admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../admin/css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="../admin/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!-- Metis Menu -->
    <link href="../admin/css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->


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

<body class="cbp-spmenu-push">
    <div class="main-content">

        <!-- header-starts -->
        <?php include_once('includes/header.php'); ?>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper" style="margin:0px">
            <div class="main-page">
                <form method="post" action="">
                    <div class="forms">
                        <h3 class="title1"> Update Information</h3>
                        <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                            <?php
                            $id = $_SESSION['customerId'];
                            $query = mysqli_query($con, "SELECT Email , phone FROM tblcustomer where id ='$id';");
                            $row = mysqli_fetch_array($query);
                            ?>
                            <div class="form-body">
                                <form method="post" action="">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                echo $msg;
                                                                                            }  ?> </p>


                                    <div class="form-group">


                                        <label for="ll">email</label>
                                        <input type="email" value='<?php echo $row["Email"] ?>' class="form-control" id="ll" name="email" placeholder="email" required="true">

                                        <label for="sername1">Phone Number</label>
                                        <input type="text" value='<?php echo $row["phone"] ?>' class="form-control" id="sername1" name="phone" placeholder="phone" required="true">


                                        <input type="hidden" name="token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                        <button type="submit" name="submit" style="margin-top: 20px; margin-bottom: 80px;" class="btn btn-default">update</button>


                                    </div>

                                </form>
                            </div>

                        </div>


                    </div>

            </div>
        </div>
    </div>

    <!--footer-->
    <?php include_once('includes/footer.php'); ?>
    <!--//footer-->
    </div>




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