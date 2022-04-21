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
    public function createEducation()
    {
        
        
        //Getting logged in user's user_id
        $user_id = SessionUser::getUser('user_id');
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
                header("location:dashboard.php");
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