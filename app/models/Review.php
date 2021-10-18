<?php
    class Review {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPostsReviewsAndRates() {
            $this->db->query("SELECT COUNT(Review.review_id) AS review_count,
                                IFNULL(sum(Review.rate), 0) AS rate_count
                                FROM Posts LEFT JOIN Review
                                ON Posts.id = Review.post_id
                                GROUP BY Posts.id
                                ORDER BY Posts.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }

        public function getReviews($id) {
            $this->db->query("SELECT *
                                FROM Review
                                INNER JOIN Users  
                                ON Review.user_id = Users.id 
                                WHERE Review.post_id = :id
                                ORDER BY Review.created_at DESC");
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();

            return $results;
        }

        public function getReviewById($id) {
            $this->db->query('SELECT * FROM Review WHERE review_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function addReview($data) {
            $this->db->query('INSERT INTO Review(post_id, user_id, rate, review) VALUES(:post_id, :user_id, :rate, :review)');
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
            $this->db->query('UPDATE Review SET rate = :rate, review = :review WHERE review_id = :review_id');
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
            $this->db->query('DELETE FROM Review WHERE review_id = :review_id');
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

        public function getTotalReviewsForAPostById($id) {
            $this->db->query('SELECT * FROM Review WHERE post_id = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->single();

            $results = $this->db->rowCount();

            return $results;
        }

        public function getRateAmountsForAPostById($id, $requiredRate) {
            $this->db->query('SELECT * FROM Review WHERE post_id = :id AND rate = :rate');
            $this->db->bind(':id', $id);
            $this->db->bind(':rate', $requiredRate);

            $results = $this->db->single();

            $results = $this->db->rowCount();

            return $results;
        }
    }
?>