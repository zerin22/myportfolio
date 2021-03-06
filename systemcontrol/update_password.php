<?php 
  include_once('inc/header.php');

  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updatePassword']))
  {
    $updatePassword = $user->updatePassword($_POST);
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
          <h1><i class="fa fa-dashboard"></i>Update Password</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Update Password</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                <?php
                if(isset($updatePassword))
                {
                  if($updatePassword == 'empty_error')
                  {
                    echo "
                            <div class='alert alert-danger text-center' style='text-align:center;'>
                            <h4>Old password & new password can not be empty!</h4>
                            </div>
                         ";
                  }

                  if($updatePassword == 'confirm_error')
                  {
                    echo "
                            <div class='alert alert-danger text-center' style='text-align:center;'>
                            <h4>New password & confrim password must be same!</h4>
                            </div>
                         ";
                  }

                  if($updatePassword == 'failed_error')
                  {
                    echo "
                            <div class='alert alert-danger text-center'>
                                <h4>Failed to Update password!</h4>
                            </div>
                         ";
                  }

                  if($updatePassword == 'not_matched_error')
                  {
                    echo "
                            <div class='alert alert-danger text-center'>
                                <h4>Old password didn't match!</h4>
                            </div>
                         ";
                  }
                  if($updatePassword == 'success')
                  {
                    echo "
                            <div class='alert alert-success text-center'>
                                <h4>Password has been changed successfully!</h4>
                            </div>
                         ";
                    session_destroy();
                ?>
                        <script>
                            setTimeout(function(){
                            window.location.reload(1);
                          }, 3000);
                    </script>
                <?php
                 }
                }
                ?>
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="userOldPassword">Old Password</label>
                        <input class="form-control" name="user_old_password" id="userOldPassword" type="password" placeholder="Old Password">
                    </div>

                    <div class="form-group">
                        <label for="userNewPassword">New Password</label>
                        <input class="form-control" name="user_new_password" id="userNewPassword" type="password" placeholder="New Password">
                    </div>

                    <div class="form-group">
                        <label for="userConfirmNewPassword">Confirm New Password</label>
                        <input class="form-control" name="user_confirm_new_password" id="userConfirmNewPassword" type="password" placeholder="Confirm New Password">
                    </div>
                    <div class="form-group btn-container">
                        <input type="submit" class="btn btn-primary float-right" name="updatePassword" value="Update Password" >
                    </div>
                    </form>
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