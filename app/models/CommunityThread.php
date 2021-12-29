<?php
    class CommunityThread {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getThreads() {
            $this->db->query("SELECT * FROM v_community;");
            

            $results = $this->db->resultSet();

            return $results;
        }

        public function addThread($data) {
            $this->db->query('INSERT INTO Community(user_id, title, body, views) VALUES(:user_id, :title, :body, :views)');
            // bind values
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":body", $data['body']);
            $this->db->bind(":views", $data['views']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function updateThread($data) {
            $this->db->query('UPDATE Community SET title = :title, body = :body WHERE thread_id = :thread_id');
            // bind values          
            $this->db->bind(":thread_id", $data['thread_id']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":body", $data['body']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteThread($id) {
            $this->db->query('DELETE FROM Community WHERE thread_id = :thread_id');
            // bind values
            
            $this->db->bind(":thread_id", $id);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getThreadById($id) {
            $this->db->query('SELECT * FROM v_community WHERE thread_id = :thread_id');
            $this->db->bind(':thread_id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function incViews($id) {
            $this->db->query('UPDATE Community SET views = views + 1 WHERE thread_id = :id');
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