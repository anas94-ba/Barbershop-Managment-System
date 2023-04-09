<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');

    if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_GET["token"] !== 0)) {
       header('location:logout.php');
    } 
    $id=$_GET['id'];
    $query=mysqli_query($con,"delete from tblservice where  ID = $id ");
    if($query){
        header('location:service-list.php');
    }else{
        echo "<script>
          alert('ERROR');
          window.location.href='service-list.php';
        </script>" ;
    }






