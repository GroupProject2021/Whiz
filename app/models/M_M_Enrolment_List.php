<?php 

class M_M_Enrolment_List{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        
        $this->db->query("SELECT * FROM v_complete_posts;");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getPostById($id) {
        $this->db->query('SELECT * FROM Posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getStudentListById($post_id) {
        
        $this->db->query('SELECT * FROM v_enrol_student_list WHERE post_id = :post_id ;');
        $this->db->bind(':post_id', $post_id);

        $results = $this->db->resultSet();

        return $results;
    }

    // new
    public function getEnrollmentsForAPostG($post_id) {
        $this->db->query("SELECT * FROM
        ProfGuiderEnrollments INNER JOIN Users 
        ON ProfGuiderEnrollments.user_id = Users.id
        WHERE ProfGuiderEnrollments.post_id = :post_id;");
        $this->db->bind(':post_id', $post_id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getEnrollmentsForAPostT($post_id) {
        $this->db->query("SELECT * FROM
        TeacherEnrollments INNER JOIN Users 
        ON TeacherEnrollments.user_id = Users.id
        WHERE TeacherEnrollments.post_id = :post_id;");
        $this->db->bind(':post_id', $post_id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addLink($data) {
        $this->db->query('INSERT INTO sessionlink( post_id, date, time, body) VALUES(:post_id, :date, :time, :body)');
        // bind values
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(":date", $data['date']);
        $this->db->bind(":time", $data['time']);
        $this->db->bind(":body", $data['body']);
        

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getSessionLink($id) {
        $this->db->query('SELECT * FROM sessionlink WHERE post_id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateLink($data) {
        $this->db->query('UPDATE sessionlink SET body = :body WHERE id = :link_id');
        // bind values
        $this->db->bind(":link_id", $data['id']);
        $this->db->bind(":body", $data['body']);

        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function deleteLink($id) {
        $this->db->query('DELETE FROM sessionlink WHERE post_id = :id');
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