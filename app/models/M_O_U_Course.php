<?php 

class M_O_U_Course{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        // $this->db->query("SELECT * FROM posts");
        // $results = $this->db->resultSet();

        // return $results;

        // $this->db->query("SELECT *, 
        //                         posts.id AS postId,
        //                         users.id AS userId,
        //                         posts.created_at as postCreated
        //                         FROM posts
        //                         INNER JOIN users  
        //                         ON posts.user_id = users.id 
        //                         ORDER BY posts.created_at DESC");

        $this->db->query("SELECT * FROM v_complete_posts;");
        $results = $this->db->resultSet();

        return $results;
    }

    
}


?>