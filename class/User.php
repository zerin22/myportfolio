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
}
?>