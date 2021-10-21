<?php

class M_S_Stu_To_Teacher {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    
    // teacher enroll
    public function incEnroll($id) {
        $this->db->query('UPDATE Posts SET applied = applied + 1 WHERE id = :id');
        // bind values            
        $this->db->bind(":id", $id);

        // Execute
        if($this->db->execute()) {
            return $this->getEnroll($id);
        }
        else {
            return false;
        }
    }

    public function decEnroll($id) {
        $this->db->query('UPDATE Posts SET applied = applied - 1 WHERE id = :id');
        // bind values            
        $this->db->bind(":id", $id);

        // Execute
        if($this->db->execute()) {
            return $this->getEnroll($id);
        }
        else {
            return false;
        }
    }

    public function getEnroll($id) {
        $this->db->query('SELECT applied FROM Posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

        // like dislike interactions
    public function addTeacherEnroll($userId, $postId, $interation) {
        $this->db->query('INSERT INTO TeacherEnrollments(user_id, post_id, interaction) VALUES(:user_id, :post_id, :interaction)');
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

    public function setTeacherEnroll($userId, $postId, $interation) {
        $this->db->query('UPDATE TeacherEnrollments SET interaction = :interaction WHERE user_id = :user_id AND post_id = :post_id');
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

    public function getTeacherEnroll($userId, $postId) {
        $this->db->query('SELECT * FROM TeacherEnrollments WHERE user_id = :user_id AND post_id = :post_id');
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":post_id", $postId);

        $row = $this->db->single();

        return $row;
    }

    public function isTeacherEnrollExist($userId, $postId) {
        $this->db->query('SELECT * FROM TeacherEnrollments WHERE user_id = :user_id AND post_id = :post_id');
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

    public function deleteTeacherEnroll($id) {
        $this->db->query('DELETE FROM TeacherEnrollments WHERE post_id = :id');
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