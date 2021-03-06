<?php
class Helper{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Getting page title
    public function title(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
		//$title = str_replace('_', ' ', $title);
		if ($title == 'dashboard') {
				$title = 'Dashboard';
		}elseif ($title == 'edit_profile') {
				$title = 'Edit Profile';
		}elseif ($title == 'profile') {
				$title = 'User Profile';
		}elseif ($title == 'blank') {
				$title = 'Blank Page';
		}elseif ($title == 'form') {
				$title = 'Basic Form';
		}elseif ($title == 'table') {
			$title = 'Basic Table';
		}elseif ($title == 'update_password') {
			$title = 'Update Password';
		}elseif ($title == 'upload_avatar') {
			$title = 'Upload Avatar';
		}elseif ($title == 'setting') {
			$title = 'Site Setting';
		}elseif ($title == 'education') {
			$title = 'All Educations';
		}elseif ($title == 'education_create') {
			$title = 'Create Educations';
		}elseif ($title == 'education_edit') {
			$title = 'Edit Educations';
		}
		
        

		return $title = ucfirst($title);
	}

	//Getting User Avatar
	public function getAvatar($user_id)
	{
		$query = "SELECT * FROM `profiles` WHERE `user_id` = '$user_id'";
		$result = $this->db->select($query);

		if($result)
		{
			$userData = $result->fetch_assoc();
			$avatar = $userData['avatar'];
			return $avatar;
		}else{
			$avatar = 'default.png';
			return $avatar;
		}
	}

	//Get Site Setting
	public function getSetting($key)
	{
		$query = "SELECT * FROM `settings` WHERE `key` = '$key'";
		$result = $this->db->select($query);

		if($result)
		{
			$settingData = $result->fetch_assoc();
			$value = $settingData['value'];
			return $value;
		}else{
			return 'NULL';
		}
	}
}
?>