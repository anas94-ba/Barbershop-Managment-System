<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_POST["token"] !== 0)) {
    header('location:logout.php');
} 


$price=$_POST['price'];
$name=$_POST["name"];
$time=$_POST['time'];
$query=mysqli_query($con,"INSERT INTO tblservice(Name, Price , Time)VALUES('$name' , $price , $time);");
if($query){
    header('location:service-list.php');
}else{
    echo "<script>
          alert('ERROR');
          window.location.href='service-list.php';
        </script>" ;
}
