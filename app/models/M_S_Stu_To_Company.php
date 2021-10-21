<?php

class M_S_Stu_To_Company {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    
    // job applies
    public function incApply($id) {
        $this->db->query('UPDATE Posts SET applied = applied + 1 WHERE id = :id');
        // bind values            
        $this->db->bind(":id", $id);

        // Execute
        if($this->db->execute()) {
            return $this->getApply($id);
        }
        else {
            return false;
        }
    }

    public function decApply($id) {
        $this->db->query('UPDATE Posts SET applied = applied - 1 WHERE id = :id');
        // bind values            
        $this->db->bind(":id", $id);

        // Execute
        if($this->db->execute()) {
            return $this->getApply($id);
        }
        else {
            return false;
        }
    }

    public function getApply($id) {
        $this->db->query('SELECT applied FROM Posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

        // like dislike interactions
    public function addJobApply($userId, $postId, $interation) {
        $this->db->query('INSERT INTO JobApplicants(user_id, post_id, interaction) VALUES(:user_id, :post_id, :interaction)');
        // bind values
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":post_id", $postId);
        $this->db->bind(":interaction", $interation);

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function setJobApply($userId, $postId, $interation) {
        $this->db->query('UPDATE JobApplicants SET interaction = :interaction WHERE user_id = :user_id AND post_id = :post_id');
        // bind values
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":post_id", $postId);
        $this->db->bind(":interaction", $interation);

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getJobApply($userId, $postId) {
        $this->db->query('SELECT * FROM JobApplicants WHERE user_id = :user_id AND post_id = :post_id');
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":post_id", $postId);

        $row = $this->db->single();

        return $row;
    }

    public function isJobApplyExist($userId, $postId) {
        $this->db->query('SELECT * FROM JobApplicants WHERE user_id = :user_id AND post_id = :post_id');
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":post_id", $postId);

        $results = $this->db->single();

        $results = $this->db->rowCount();

        if($results > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function deleteJobApply($id) {
        $this->db->query('DELETE FROM JobApplicants WHERE post_id = :id');
        // bind values
        
        $this->db->bind(":id", $id);

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }   
}

?>