<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');

    if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_GET["token"] !== 0)) {
       header('location:logout.php');
    } 
    $id=$_GET['id'];
    $id1=$_GET['id1'];
    $num = 1;
    $query=mysqli_query($con,"delete from tblbill  where  ID = $id ");
    $query1=mysqli_query($con,"UPDATE tblappointment SET Status= $num WHERE ID= $id1 ");
    if($query && $query1){
        header('location:bill-list.php');
    }else{
        echo "<script>
          alert('ERROR');
          window.location.href='bill-list.php';
        </script>" ;
    }






