<?php 
    class M_M_Complaints{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getComplaintById($id) {
            $this->db->query('SELECT * FROM Complaints WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getComplaints() {
            $this->db->query("SELECT *, 
                                Complaints.id AS postId,
                                users.id AS userId,
                                Complaints.created_at as postCreated
                                FROM Complaints
                                INNER JOIN users  
                                ON Complaints.user_id = users.id 
                                ORDER BY Complaints.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }

        public function add($data) {
            $this->db->query('INSERT INTO Complaints(user_id, title, content) VALUES(:user_id, :title, :content)');
            // bind values
            // $this->db->bind(":image", $data['image_name']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":content", $data['content']);
            
            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function update($data) {
            $this->db->query('UPDATE Complaints SET title = :title, content = :content WHERE id = :id');
            // bind values
            
            // $this->db->bind(":image", $data['image_name']);            
            $this->db->bind(":id", $data['id']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":content", $data['content']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function delete($id) {
            $this->db->query('DELETE FROM Complaints WHERE id = :id');
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