<?php
class Setting{
    private $db;

    //Autommiti call __construct function when object is created of this class
    public function __construct()
    {
         $this->db = new Database();
    }

    //Updating General Settings
    public function updateGeneralSettings($data)
    {
        $data['site_title'] = mysqli_real_escape_string($this->db->link, $data['site_title']);
        $data['site_slogan'] = mysqli_real_escape_string($this->db->link, $data['site_slogan']);

        foreach($data as $key=>$value)
        {
            if($key != 'generalSettings')
            {
                $query = "SELECT * FROM `settings` WHERE `key` = '$key'";
                $result = $this->db->select($query);
            }

            if($result)
            { 
                $query = "
                            UPDATE `settings`
                            SET
                            `value` = '$value'
                            WHERE `key` = '$key'
                         ";
                $result = $this->db->update($query);
            }else{
                $msg = '       
                        <div class="alert alert-danger text-center">
                            Invalid Setting!
                         </div>
                         ';
                return $msg;
            }
        }
        $msg = '
                    <div class="alert alert-success text-center">
                        General Settings Successfully Updated!!
                    </div>
                ';
        return $msg;
    }

    //Updating SEO settings
    public function updateSeoSettings($data)
    {
        $data['site_author']         = mysqli_real_escape_string($this->db->link, $data['site_author']);
        $data['site_url']            = mysqli_real_escape_string($this->db->link, $data['site_url']);
        $data['site_type']           = mysqli_real_escape_string($this->db->link, $data['site_type']);
        $data['site_robot']          = mysqli_real_escape_string($this->db->link, $data['site_robot']);
        $data['site_app_id']         = mysqli_real_escape_string($this->db->link, $data['site_app_id']);
        $data['site_twitter_author'] = mysqli_real_escape_string($this->db->link, $data['site_twitter_author']);
        $data['site_twitter_card']   = mysqli_real_escape_string($this->db->link, $data['site_twitter_card']);
        $data['site_keywords']       = mysqli_real_escape_string($this->db->link, $data['ssite_keywords']);
        $data['site_description']    =mysqli_real_escape_string($this->db->link, $data['site_description']);

        foreach($data as $key=>$value)
        {
            if($key != 'seoSettings')
            {
                $query = "SELECT * FROM `settings` WHERE `key` = '$key'";
                $result = $this->db->select($query);
            }

            if($result)
            { 
                $query = "
                            UPDATE `settings`
                            SET
                            `value` = '$value'
                            WHERE `key` = '$key'
                         ";
                $result = $this->db->update($query);
            }else{
                $msg = '       
                        <div class="alert alert-danger text-center">
                            Invalid Setting!
                         </div>
                         ';
                return $msg;
            }
        }
        $msg = '
                    <div class="alert alert-success text-center">
                        SEO Settings Successfully Updated!!
                    </div>
                ';
        return $msg;
    }
}
?>