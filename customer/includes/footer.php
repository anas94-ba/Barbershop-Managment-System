<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
 <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md" style="text-align:center;">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 "> About Us </h2>
              <?php

$ret=mysqli_query($con,"SELECT * FROM `tblinformation`");

$row=mysqli_fetch_array($ret);

?>
              <p>Our goal is to satisfy customers with our wonderful services, with a distinguished and specialized staff</p>
            
            </div>
          </div>

          
         
          <div class="col-md" style="padding-left: 150;text-align:center;">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">links</h2>
              <ul class="list-unstyled">
                <li><a href="dashboard.php" class="py-2 d-block">Main page</a></li>
                <li><a href="customer-sevices.php" class="py-2 d-block">Our Services</a></li>
                <li><a href="customer-appointments.php" class="py-2 d-block">Your Appointments</a></li>
                <li><a href="reserved-appointments.php" class="py-2 d-block">ReservedAppointments </a></li>
                <li><a href="customer-messages.php" class="py-2 d-block"> Your Messages</a></li>
                <li><a href="settings.php" class="py-2 d-block"> Account Settings </a></li>
              </ul>
            </div>
          </div>

          <div class="col-md" style="text-align:center;">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Zain Salon</h2>
            	<div class="block-23 mb-3" style="text-align:center;">
	              <ul>
	                <li><span class="icon icon-map-marker" ></span><span class="text"><?php  echo $row['address'];?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php  echo $row['phone'];?></span></a></li>
	                <li><a href="mailto:<?php  echo $row['Email'];?>"><span class="icon icon-envelope"></span><span class="text"><?php  echo $row['Email'];?></span></a></li>
                  <li><a href="<?php  echo $row['facebook'];?>"><span class="icon icon-facebook-official"></span><span class="text"><?php  echo $row['facebook'];?></span></a></li>
                  
                </ul>
	            </div>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>Copyright &copy; 2023 Zain Salon. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </footer>