<?php

class M_A_Admin_Dashboard {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getTotalUserAmount() {
        $this->db->query('SELECT * FROM Users'); // this is a prepared statement

        $row = $this->db->resultSet();

        $count = $this->db->rowCount();

        if($count > 0) {
            return $count;
        }
        else {
            return 0;
        }
    }

    public function getUserAmountBySpecialzedActorType($specialized_actor_type) {
        $this->db->query('SELECT * FROM Users WHERE specialized_actor_type = :specialized_actor_type'); // this is a prepared statement
        // bind value
        $this->db->bind(":specialized_actor_type", $specialized_actor_type);

        $row = $this->db->resultSet();

        $count = $this->db->rowCount();

        if($count > 0) {
            return $count;
        }
        else {
            return 0;
        }
    }

    public function getUserList() {
        $this->db->query("SELECT * FROM Users");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getUserListViaActorType($actor_type) {
        $this->db->query("SELECT * FROM Users WHERE actor_type = :actor_type");
        $this->db->bind(":actor_type", $actor_type);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getUserListViaSpecializedActorType($specialized_actor_type) {
        $this->db->query("SELECT * FROM Users WHERE specialized_actor_type = :specialized_actor_type");
        $this->db->bind(":specialized_actor_type", $specialized_actor_type);

        $results = $this->db->resultSet();

        return $results;
    }
}

?>