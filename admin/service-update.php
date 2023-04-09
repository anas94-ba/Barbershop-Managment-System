<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_POST["token"] !== 0)) {
    header('location:logout.php');
} 

$id=$_POST['id'];
$price=$_POST['price'];
$name=$_POST["name"];
$time=$_POST['time'];


$query=mysqli_query($con,"UPDATE tblservice SET Price = $price, Name= '$name' , Time = $time WHERE ID= $id ");

if($query){
    header('location:service-list.php');
}else{
    echo "<script>
          alert('ERROR');
          window.location.href='service-list.php';
        </script>" ;
}
?>