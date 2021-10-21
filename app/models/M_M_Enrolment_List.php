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

    public function getStudentListById($id) {
        
        $this->db->query("SELECT *
                                FROM ProfGuiderEnrollments
                                INNER JOIN Users  
                                ON ProfGuiderEnrollments.user_id = Users.id 
                                WHERE ProfGuiderEnrollments.post_id = :id
                                ORDER BY ProfGuiderEnrollments.created_at DESC");
        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        return $results;
    }
}


?>