<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_POST["token"] !== 0)) {
    header('location:logout.php');
} 

$id=$_GET['id'];
$num = 1;


$query=mysqli_query($con,"UPDATE tblappointment SET Status= $num WHERE ID= $id ");

if($query){
    header('location:appointments-list.php');
}else{
    echo "<script>
          alert('ERROR');
          window.location.href='service-list.php';
        </script>" ;
}
?>