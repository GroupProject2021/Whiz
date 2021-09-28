<?php 

class M_M_Enrolment_List{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        // $this->db->query("SELECT * FROM posts");
        // $results = $this->db->resultSet();

        // return $results;

        $this->db->query("SELECT *, 
                                posts.id AS postId,
                                users.id AS userId,
                                posts.created_at as postCreated
                                FROM posts
                                INNER JOIN users  
                                ON posts.user_id = users.id 
                                ORDER BY posts.created_at DESC");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getPostById($id) {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}


?>