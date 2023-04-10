<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_POST["token"] !== 0)) {
    header('location:logout.php');
} 


$id=$_POST['id'];
$num = 2;

$query=mysqli_query($con,"INSERT INTO tblbill(AppointmentID) VALUES ('$id');");
$query1=mysqli_query($con,"UPDATE tblappointment SET Status= $num WHERE ID= $id ");
if($query && $query1){
    header('location:bill-list.php');
}else{
    echo "<script>
          alert('ERROR : This appointment have been paid ');
          window.location.href='bill-list.php';
        </script>" ;
}
