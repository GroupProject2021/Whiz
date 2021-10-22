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

        $row = $this->db->single();

        return $row;
    }
}


?>