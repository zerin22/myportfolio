<?php 
  include_once('inc/header.php');  
  if(isset($_GET['id']) && is_numeric($_GET['id']))
  {
    $id = $_GET['id'];
  }

  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['editEducation']))
  {
    $userEducation = $educations->editEducation($id, $_POST);
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
          <h1><i class="fa fa-dashboard"></i>Edit Education</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="education_edit.php">Edit Education</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                <?php
                if(isset($userEducation)){
                  echo $userEducation;
                }

                if(isset($_GET['id']) && is_numeric($_GET['id']))
                {
                    $id = $_GET['id'];
                    $getEducation = $educations->getEducation($id);
                    
                    if($getEducation != NULL)
                    {
                        $data = $getEducation->fetch_assoc();

                ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="educationTitle">Title<span class="text-danger">*</span></label>
                                        <input class="form-control" name="education_title" id="educationTitle" type="text" placeholder="Education Title" valueg="<?php echo $data['title'];?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="educationInstitute">Institute<span class="text-danger">*</span></label>
                                        <input class="form-control" name="education_institute" id="educationInstitute" type="text" placeholder="Education Institute" value="<?php echo $data['institute'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="educationstartDate">Stating Date<span class="text-danger">*</span></label>
                                        <input class="form-control" name="education_start_Date" id="educationstartDate" type="date" placeholder="Start Date" value="<?php echo $data['starting_date']; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="educationEndDate">Ending Date<span class="text-danger">*</span></label>
                                        <input class="form-control" name="education_end_Date" id="educationEndDate" type="date" placeholder="End Date" value="<?php echo $data['ending_date']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="educationGraduationStutas">Graduation Status<span class="text-danger">*</span></label>
                                        <select class="form-control" name="education_graduation_status" id="educationGraduationStatus">
                                          <option value="1" <?php if($data['graduation_status'] == 1){ echo "selected='selected'";} ?>>Graduated</option>
                                          <option value="0" <?php if($data['graduation_status'] == 0){ echo "selected='selected'";} ?>>Stuyding</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="educationActiveStatus">Active Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="education_active_status" id="educationActiveStatus">
                                      <option value="1" <?php if($data['active_status'] == 1){ echo "selected='selected'";} ?>>Active</option>
                                      <option value="0" <?php if($data['active_status'] == 0){ echo "selected='selected'";} ?>>Inactive</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="educationDescription">Description</label>
                                <textarea class="form-control" name="education_description" id="educationDescription" cols="30" rows="5" placeholder="Description"><?php echo $data['description'];?></textarea>
                            </div>

                            <div class="form-group btn-container">
                                <input type="submit" class="btn btn-primary float-right" name="editEducation" value="save" >
                            </div>
                        </form>
                
                <?php
                        }else{
                ?>
                            <div class="alert alert-danger text-center">
                                Education not found!
                            </div>
                
                <?php
                        }
                        }else{
                ?>
                        <div class="alert alert-danger text-center">
                            Something went wrong! Try again later.
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