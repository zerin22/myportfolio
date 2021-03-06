<?php
class Education{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Getting all education data based on logged in users
    public function getAllEducation()
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');
        
        //Getting education data for the logged in user
        $query = "SELECT * FROM `educations` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";
        $result = $this->db->select($query);
        return $result; 
    }

    //Create education
    public function createEducation($data)
    {
        $title             = mysqli_real_escape_string($this->db->link, $data['education_title']);
        $institute         = mysqli_real_escape_string($this->db->link, $data['education_institute']);
        $starting_date      = mysqli_real_escape_string($this->db->link, $data['education_start_Date']);
        $ending_date       = mysqli_real_escape_string($this->db->link, $data['education_end_Date']);
        $graduation_status = mysqli_real_escape_string($this->db->link, $data['education_graduation_status']);
        $active_status     = mysqli_real_escape_string($this->db->link, $data['education_active_status']);
        $description       = mysqli_real_escape_string($this->db->link, $data['education_description']);
        
        
        //Checking if required fields are empty
        if($title == "" || $institute == "" || $starting_date == "" || $ending_date == "" || $graduation_status == "" || $active_status == "")
        {
            $msg = '<div class="alert alert-danger text-center">
                        Required fields can be empty! 
                    </div>';
            return $msg;
        }
        //Checking if graduation_status & active_status are neumaric
        if(!is_numeric($graduation_status) && !is_numeric($active_status))
        {
            $msg = '<div class="alert alert-danger text-center">
                        Something went wrong! Please try again later. 
                    </div>';
            return $msg;
        }

        //Innserting data to database (education table)
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');
        $query = "INSERT INTO `educations`
                (`title`, `user_id`, `institute`, `starting_date`, `ending_date`, `graduation_status`, `active_status`, `description`)
                VALUES
                ('$title', '$user_id', '$institute', '$starting_date', '$ending_date', '$graduation_status', '$active_status', '$description')
                 ";
        $result = $this->db->insert($query);

        if($result)
        {
            $msg = '<div class="alert alert-success text-center">
                        Education Created Successfully!
                    </div>';
            return $msg;
        }else{
            $msg = '<div class="alert alert-danger text-center">
                        Unable To Create Education.
                    </div>';
            return $msg;
        }
    }

    //Get single education for showing edit data on edit form
    public function getEducation($id)
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM `educations` WHERE `id` = '$id' AND `user_id` = '$user_id'";
        $result = $this->db->select($query);
        return $result;
    }

    //Update Education
    public function editEducation($id, $data)
    {
        
        $title             = mysqli_real_escape_string($this->db->link, $data['education_title']);
        $institute         = mysqli_real_escape_string($this->db->link, $data['education_institute']);
        $starting_date     = mysqli_real_escape_string($this->db->link, $data['education_start_Date']);
        $ending_date       = mysqli_real_escape_string($this->db->link, $data['education_end_Date']);
        $graduation_status = mysqli_real_escape_string($this->db->link, $data['education_graduation_status']);
        $active_status     = mysqli_real_escape_string($this->db->link, $data['education_active_status']);
        $description       = mysqli_real_escape_string($this->db->link, $data['education_description']);
        
           
        //Checking if required fields are empty
        if($title == "" || $institute == "" || $starting_date == "" || $ending_date == "" || $graduation_status == "" || $active_status == "")
        {
            $msg = '<div class="alert alert-danger text-center">
                        Required fields can be empty! 
                    </div>';
            return $msg;
        }
        
        //Checking if graduation_status & active_status are neumaric
        if(!is_numeric($graduation_status) && !is_numeric($active_status))
        {
            $msg = '<div class="alert alert-danger text-center">
                        Something went wrong! Please try again later. 
                    </div>';
            return $msg;
        }

        //Innserting data to database (education table)
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');
        $getQuery = "SELECT * FROM `educations` WHERE `id` = '$id' AND `user_id` = '$user_id'";
        $getResult = $this->db->select($getQuery);

        if($getResult != NULL)
        {
            $updateQuery = " UPDATE `educations`
                            SET 
                            `title`             = '$title',
                            `institute`         = '$institute',
                            `starting_date`     = '$starting_date',
                            `ending_date`       = '$ending_date',
                            `graduation_status` = '$graduation_status',
                            `active_status`     = '$active_status',
                            `description`       = '$description'
                            WHERE `id` = '$id' AND `user_id` = '$user_id'
 
                        ";
            $updateResult = $this->db->update($updateQuery);

            if($updateResult)
            {
                $msg = '<div class = "alert alert-success text-center">
                            Education update successfully!
                        </div>';
                return $msg;
            }else{
                $msg = '<div class = "alert alert-danger text-center">
                            Unable to update education!
                        </div>';
                return $msg;
            }
        }else{
            $msg = '<div class="alert alert-danger text-center">
                        Education not found!
                    </div>';
            return $msg;
        }
       
    }

    //Delete single education
    public function deleteEducation($id)
    {
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');

        //Getting education by id and user_id
        $query = "SELECT * FROM `educations` WHERE `id` = '$id' AND `user_id` = '$user_id'";
        $result = $this->db->select($query);

        if($result->num_rows > 0)
        {
            $deleteQuery = "DELETE FROM `educations` WHERE `id` = '$id' AND `user_id` = '$user_id'";
            $deleteResult = $this->db->delete($deleteQuery);

            if($deleteResult)
            {
                $msg = "
                            <div class='alert alert-success text-center'>
                                Education data deleted successfully.
                            </div>";
                return $msg;
            }else{
                $msg = "
                            <div class='alert alert-danger text-center'>
                                Unable to delete education data.
                            </div>";
                return $msg;
            }
        }else{
            $msg = "
                        <div class='alert alert-danger text-center'>
                            Selected education data not found!
                        </div>";
            return $msg;
        }
    }
}
?>