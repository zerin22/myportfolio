<?php 
  include_once('inc/header.php'); 
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateProfile']))
  {
    $updateProfile = $user->updateProfile($_POST);
  }
?>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include_once('inc/navbar.php'); ?>
    <!-- Sidebar menu-->
    <?php include_once('inc/sidebar.php'); ?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Profile Edit</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Profile Edit</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                <?php
                if(isset($updateProfile))
                {
                  echo $updateProfile;
                }
                
                $getProfile = $user->getProfile();

                if($getProfile != false)
                {
                    $profileData = $getProfile->fetch_assoc();
                ?>
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="userPhone">Phone</label>
                        <input class="form-control" name="user_phone" id="userPhone" type="text" value="<?php echo $profileData['phone']; ?>" placeholder="Phone">
                    </div>

                    <div class="form-group">
                        <label for="userAddress">Address</label>
                        <input class="form-control" name="user_address" id="userAddress" type="text" value="<?php echo $profileData['address']; ?>" placeholder="Address">
                    </div>

                    <div class="form-group">
                        <label for="userAbout">About</label>
                        <textarea class="form-control" name="user_about" id="userAbout" cols="30" rows="5" placeholder="About"><?php echo $profileData['about']; ?></textarea>
                    </div>

                    <div class="form-group btn-container">
                        <input type="submit" class="btn btn-primary float-right" name="updateProfile" value="Update" >
                    </div>
                    </form>
                <?php
                }else{
                ?>
                    <div class="alert alert-danger text-center">
                        Profile is not created yet! Please <a href="create_profile.php">click here</a> to create your profile.
                    </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <?php
      include_once('inc/footer.php');
    ?>
  </body>
</html>