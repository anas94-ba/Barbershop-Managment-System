<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');

    if ((!isset($_SESSION['adminId'])) || ($_SESSION['csrf_token'] - $_GET["token"] !== 0)) {
       header('location:logout.php');
    } 
    $id=$_GET['id'];
    $query=mysqli_query($con,"delete from tblcustomer where  ID = $id ");
    if($query){
        header('location:customer-list.php');
    }else{
        echo "<script>
                alert('ERROR');
                window.location.href='customer-list.php';
             </script>" ;
    }






