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
        // show banner / poster
        public function getBanners() {
            $this->db->query("SELECT *, 
                                banner.id AS postId,
                                users.id AS userId,
                                banner.created_at as postCreated
                                FROM banner
                                INNER JOIN users  
                                ON banner.user_id = users.id 
                                ORDER BY banner.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }

        public function getPosters() {
            $this->db->query("SELECT *, 
                                poster.id AS postId,
                                users.id AS userId,
                                poster.created_at as postCreated
                                FROM poster
                                INNER JOIN users  
                                ON poster.user_id = users.id 
                                ORDER BY poster.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }

        // add banner / poster
        public function addBanner($data) {
            $this->db->query('INSERT INTO banner(image, title, user_id, body, ups, downs, shares, views) VALUES(:image, :title, :user_id, :body, :ups, :downs, :shares, :views)');
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

        public function addPoster($data) {
            $this->db->query('INSERT INTO poster(image, title, user_id, body, ups, downs, shares, views) VALUES(:image, :title, :user_id, :body, :ups, :downs, :shares, :views)');
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

        // update banner / poster

        public function updateBanner($data) {
            $this->db->query('UPDATE banner SET image = :image, title = :title, body = :body WHERE id = :id');
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

        public function updatePoster($data) {
            $this->db->query('UPDATE poster SET image = :image, title = :title, body = :body WHERE id = :id');
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

        // delete banner / poster
        public function deleteBanner($id) {
            $this->db->query('DELETE FROM banner WHERE id = :id');
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

        public function deletePoster($id) {
            $this->db->query('DELETE FROM poster WHERE id = :id');
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

        public function getBannerById($id) {
            $this->db->query('SELECT * FROM banner WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getPosterById($id) {
            $this->db->query('SELECT * FROM poster WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
/////////////
        public function getIncBanner($id) {
            $this->db->query('SELECT ups FROM banner WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

        return $row;
        }

        // dislikes
        public function incDownBanner($id) {
            $this->db->query('UPDATE banner SET downs = downs + 1 WHERE id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getDownBanner($id);
            }
            else {
                return false;
            }
        }

        public function getDownBanner($id) {
            $this->db->query('SELECT downs FROM banner WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
////////////////
        public function getIncPoster($id) {
            $this->db->query('SELECT ups FROM poster WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // dislikes
        public function incDownPoster($id) {
            $this->db->query('UPDATE poster SET downs = downs + 1 WHERE id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getDownPoster($id);
            }
            else {
                return false;
            }
        }

        public function getDownPoster($id) {
            $this->db->query('SELECT downs FROM poster WHERE id = :id');
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