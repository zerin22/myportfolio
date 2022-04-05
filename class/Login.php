<?php
class Login{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    /*
    * User Login Function & Session Create
    * array type $data variable
    */
    public function userLogin($data){
        $userName = mysqli_real_escape_string($this->db->link, $data['user_name']); //Fron login input field
        $passWord = mysqli_real_escape_string($this->db->link, $data['user_password']);

        if($userName == "" || $passWord == "")
        {
            $msg = "
                        <div class='alert alert-danger text-center'>
                            Username or password can not be empty!
                        </div>
                    ";
                return $msg;
        }

        $passWord = md5($passWord);

        $query = "SELECT * FROM users WHERE user_name = '$userName' AND passWord = '$passWord' ";
        $result= $this->db->select($query);

        if($result != false)
        {
            $userValue = $result->fetch_assoc(); //convarting to associative array

            //Session set for login user
            SessionUser::setUser('userLogin', true);
            SessionUser::setUser('user_id',$userValue['id']);
            SessionUser::setUser('user_fName', $userValue['first_name']);
            SessionUser::setUser('user_lName', $userValue['last_name']);
            SessionUser::setUser('user_email', $userValue['email']);

            //Redirecting to dashboard after login and session set
            header("Location:dashboard.php");
        }else{
            $msg = "
                        <div class='alert alert-danger text-center'>
                            Username or password not found!
                        </div>
                    ";
                return $msg;
        }
    }
}