<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_GET["token"] !== 0)) {
    header('location:logout.php');
} 


$id=$_GET['id'];
$n=1;

$query=mysqli_query($con,"UPDATE tblbarbermsg SET Status = '$n' WHERE ID= '$id'; ");

if($query){
    header('location:barber-message.php');
}else{
    echo "<script>
          alert('ERROR');
          window.location.href='customer-message.php';
        </script>" ;
}
?>