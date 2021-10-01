<?php
    class Review {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getReviews($id) {
            $this->db->query("SELECT *
                                FROM review
                                INNER JOIN users  
                                ON review.user_id = users.id 
                                WHERE review.post_id = :id
                                ORDER BY review.created_at DESC");
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();

            return $results;
        }

        public function getReviewById($id) {
            $this->db->query('SELECT * FROM review WHERE review_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function addReview($data) {
            $this->db->query('INSERT INTO review(post_id, user_id, rate, review) VALUES(:post_id, :user_id, :rate, :review)');
            // bind values
            $this->db->bind(":post_id", $data['post_id']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":rate", $data['rate']);
            $this->db->bind(":review", $data['review_text']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function updateReview($data) {
            $this->db->query('UPDATE review SET rate = :rate, review = :review WHERE review_id = :review_id');
            // bind values
            $this->db->bind(":review_id", $data['review_id']);
            $this->db->bind(":rate", $data['rate']);
            $this->db->bind(":review", $data['review_text']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteReview($id) {
            $this->db->query('DELETE FROM review WHERE review_id = :review_id');
            // bind values
            
            $this->db->bind(":review_id", $id);

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