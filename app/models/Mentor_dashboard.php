<?php
    class Mentor_dashboard{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // // get mentor details
        public function getPosts() {
            $this->db->query("SELECT * FROM mentor");
            return $results = $this->db->resultSet();
        }

        // post functions

        public function getPosters() {
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

        public function addPost($data) {
            $this->db->query('INSERT INTO posts(image, title, user_id, body, ups, downs, shares, views) VALUES(:image, :title, :user_id, :body, :ups, :downs, :shares, :views)');
            // bind values
            $this->db->bind(":image", $data['image_name']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":body", $data['body']);
            $this->db->bind(":ups", $data['ups']);
            $this->db->bind(":downs", $data['downs']);
            $this->db->bind(":shares", $data['shares']);
            $this->db->bind(":views", $data['views']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function updatePost($data) {
            $this->db->query('UPDATE posts SET image = :image, title = :title, body = :body WHERE id = :id');
            // bind values
            
            $this->db->bind(":image", $data['image_name']);            
            $this->db->bind(":id", $data['id']);
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

        public function getPostById($id) {
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deletePost($id) {
            $this->db->query('DELETE FROM posts WHERE id = :id');
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

        public function getInc($id) {
            $this->db->query('SELECT ups FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // dislikes
        public function incDown($id) {
            $this->db->query('UPDATE posts SET downs = downs + 1 WHERE id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getDown($id);
            }
            else {
                return false;
            }
        }

        public function getDown($id) {
            $this->db->query('SELECT downs FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // comment
        public function addComment($data) {
            $this->db->query('INSERT INTO comments(post_id, user_id, content) VALUES(:post_id, :user_id, :content)');
            // bind values
            $this->db->bind(":post_id", $data['post_id']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":content", $data['content']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getComments($id) {
            // $this->db->query('SELECT * FROM comments WHERE post_id = :post_id');
            $this->db->query('SELECT * FROM comments WHERE post_id = :post_id ORDER BY comments.created_at DESC');
            $this->db->bind(':post_id', $id);

            $results = $this->db->resultSet();

            return $results;
        }

        public function getUserDetails($id) {
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // review
        public function getTotalReviewsForAPostById($id) {
            $this->db->query('SELECT * FROM review WHERE post_id = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->single();

            $results = $this->db->rowCount();

            return $results;
        }

        public function getRateAmountsForAPostById($id, $requiredRate) {
            $this->db->query('SELECT * FROM review WHERE post_id = :id AND rate = :rate');
            $this->db->bind(':id', $id);
            $this->db->bind(':rate', $requiredRate);

            $results = $this->db->single();

            $results = $this->db->rowCount();

            return $results;
        }

        // Complaint functions
        public function getComplaints() {
            $this->db->query("SELECT *, 
                                complaints.id AS postId,
                                users.id AS userId,
                                complaints.created_at as postCreated
                                FROM complaints
                                INNER JOIN users  
                                ON complaints.user_id = users.id 
                                ORDER BY complaints.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }
    }
?>