<?php 

class M_O_C_Cv{

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


    public function getCVList($postId) {
        $this->db->query("SELECT * FROM v_received_cv WHERE post_id = :post_id;");
        // bind values
        $this->db->bind(':post_id', $postId);

        $results = $this->db->resultSet();

        return $results;
    }
    
}


?>