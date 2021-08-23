<?php
class Organization_university {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function check_user($user_name,$email_id) {
        $result= $this->db->select("SELECT * FROM `user` WHERE user_name = '".$user_name."' OR user_email = '".$email_id."'");
        $count = count($result);
        return $count;
    }
    
    public function insert_user($data) {
        $this->db->insert('user', $data);
    }
}
?>