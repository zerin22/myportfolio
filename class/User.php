<?php 
class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    //checking if user profile Created

    public function checkUserProfile()
    {
        //Getting Currently Loged in User id From Session
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM profiles WHERE user_id = '$user_id'";

        $result = $this->db->select($query);

        if($result != false)
        {
            return true;
        }else{
            return false;
        }
    }

    //Creating logged in user's profile
    public function createUserProfile($data){
        $phone = mysqli_real_escape_string($this->db->link, $data['user_phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['user_address']);
        $about = mysqli_real_escape_string($this->db->link, $data['user_about']);

        //Getting currently loged in user id from session
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM profiles WHERE user_id = '$user_id'";

        $result = $this->db->select($query);
        
        if($result == false){
            $query = "INSERT INTO profiles (`user_id`, `phone`, `address`, `about`)
                        VALUES ('$user_id', '$phone', '$address', '$about')";

            $result = $this->db->insert($query);

            if($result){
                $msg = '
                        <div class="alert alert-success text-center">
                            Profile created successfully! Please
                            <a href="dashboard.php">Click Here</a> for Dashboard View.
                        </div>';
                return $msg;
            }else{
                $msg = '
                        <div class="alert alert-danger text-center">
                            Unable to create profile!
                        </div>';
                return $msg;
            }
        }else{
            $msg = '
                    <div class="alert alert-danger text-center">
                        Unable to create profile!
                    </div>';
            return $msg;
        }
    }

    //getting loged in user's profile
    public function getProfile(){
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM profiles WHERE user_id = '$user_id'";

        $result = $this->db->select($query);

        return $result;


    }
}
?>