<?php

class M_S_Stu_To_Notices {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    
    public function getNotices() {
        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                            ON v_posts_notices.private_uni_id = Connections.to_user_id
                            WHERE Connections.from_user_id = :id");
        $this->db->bind(":id", $_SESSION['user_id']);

        $results = $this->db->resultSet();

        return $results;
    }
}

?>