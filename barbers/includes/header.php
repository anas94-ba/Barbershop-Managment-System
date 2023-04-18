<div class="sticky-header header-section ">
  <div class="header-left">
    
    <!--logo -->
    <div class="logo" style="margin-left: 60px;">
      <a href="dashboard.php">
        <h1> Zain Salon</h1>
        <span>The Barbers</span>
      </a>
    </div>
    <!--//logo-->


    <div class="clearfix"> </div>
  </div>
  <div class="header-right">

    <div class="clearfix"> </div>
  </div>
  <!--notification menu end -->
  <div class="profile_details">
    <?php
    $id = $_SESSION['barberId'];
    $ret = mysqli_query($con, "select Name from tblbarber where id =$id");
    $row = mysqli_fetch_array($ret);
    $name = $row['Name'];

    ?>
    <ul>
      <li class="dropdown profile_details_drop">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <div class="profile_img">
            <span class="prfil-img"><img src="images/download (1).png" alt="" width="50" height="60"> </span>
            <div class="user-name">
              <p><?php echo $name; ?></p>
              <span>Barber</span>
            </div>
            <i class="fa fa-angle-down lnr"></i>
            <i class="fa fa-angle-up lnr"></i>
            <div class="clearfix"></div>
          </div>
        </a>
        <ul class="dropdown-menu drp-mnu">
          <li> <a href="email-update.php"><i class="fa fa-cog"></i> update email</a> </li>
          <li> <a href="logout.php"><i class="fa fa-sign-out"></i> logout </a> </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>