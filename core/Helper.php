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
		}elseif ($title == 'settings') {
			$title = 'Site Setting';
		}
        

		return $title = ucfirst($title);
	}

	//Getting User Avatar
	
}
?>