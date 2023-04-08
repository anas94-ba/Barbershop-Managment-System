<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_POST["token"] !== 0)) {
    header('location:logout.php');
} 

$id=$_POST['id'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$query=mysqli_query($con,"UPDATE tblcustomer SET phone = '$phone', Email= '$email' WHERE ID= $id ");
if($query){
    header('location:customer-list.php');
}else{
    echo "<script>
                alert('ERROR');
                window.location.href='customer-list.php';
             </script>" ;
}
?>