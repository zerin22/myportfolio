<?php 
  include_once('inc/header.php');  
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['createEducation']))
  {
    $userEducation = $educations->createEducation($_POST);
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
          <h1><i class="fa fa-dashboard"></i>Create Education</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="education_create.php">Create Education</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="action-div clearfix mb-3">
              <a href="education.php" class="float-right" style="text-decoration: none;"><i class="fa fa-graduation-cap" aria-hidden="true"></i> All Educations</a>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <?php
                if(isset($userEducation)){
                  echo $userEducation;
                }
                ?>
                <form action="" method="POST">

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="educationTitle">Title<span class="text-danger">*</span></label>
                        <input class="form-control" name="education_title" id="educationTitle" type="text" placeholder="Education Title">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="educationInstitute">Institute<span class="text-danger">*</span></label>
                        <input class="form-control" name="education_institute" id="educationInstitute" type="text" placeholder="Education Institute">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="educationstartDate">Stating Date<span class="text-danger">*</span></label>
                        <input class="form-control" name="education_start_Date" id="educationstartDate" type="date" placeholder="Education Stating Date">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="educationEndDate">Ending Date<span class="text-danger">*</span></label>
                        <input class="form-control" name="education_end_Date" id="educationEndDate" type="date" placeholder="Education Ending Date">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="educationGraduationStutas">Graduation Status<span class="text-danger">*</span></label>
                        <select class="form-control" name="education_graduation_status" id="educationGraduationStutas">
                          <option value="1">Graduated</option>
                          <option value="0">Studying</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="educationActiveStatus">Active Status<span class="text-danger">*</span></label>
                        <select class="form-control" name="education_active_status" id="educationActiveStatus">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="educationDescription">Description</label>
                    <textarea class="form-control" name="education_description" id="educationDescription" cols="30" rows="5" placeholder="Description"></textarea>
                  </div>

                  <div class="form-group btn-container">
                    <input type="submit" class="btn btn-primary float-right" name="createEducation" value="save" >
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