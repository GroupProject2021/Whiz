<?php
    class Post_UpvoteDownvote {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // likes
        public function incUp($id) {
            $this->db->query('UPDATE Posts SET ups = ups + 1 WHERE id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getInc($id);
            }
            else {
                return false;
            }
        }

        public function decUp($id) {
            $this->db->query('UPDATE Posts SET ups = ups - 1 WHERE id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getInc($id);
            }
            else {
                return false;
            }
        }

        public function getInc($id) {
            $this->db->query('SELECT ups FROM Posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // dislikes
        public function incDown($id) {
            $this->db->query('UPDATE Posts SET downs = downs + 1 WHERE id = :id');
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

        public function decDown($id) {
            $this->db->query('UPDATE Posts SET downs = downs - 1 WHERE id = :id');
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
            $this->db->query('SELECT downs FROM Posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }


        // like dislike interactions
        public function addPostInteraction($userId, $postId, $interation) {
            $this->db->query('INSERT INTO PostInteractions(user_id, post_id, interaction) VALUES(:user_id, :post_id, :interaction)');
            // bind values
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":post_id", $postId);
            $this->db->bind(":interaction", $interation);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function setPostInteraction($userId, $postId, $interation) {
            $this->db->query('UPDATE PostInteractions SET interaction = :interaction WHERE user_id = :user_id AND post_id = :post_id');
            // bind values
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":post_id", $postId);
            $this->db->bind(":interaction", $interation);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getPostInteration($userId, $postId) {
            $this->db->query('SELECT * FROM PostInteractions WHERE user_id = :user_id AND post_id = :post_id');
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":post_id", $postId);

            $row = $this->db->single();

            return $row;
        }

        public function isPostInterationExist($userId, $postId) {
            $this->db->query('SELECT * FROM PostInteractions WHERE user_id = :user_id AND post_id = :post_id');
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":post_id", $postId);

            $results = $this->db->single();

            $results = $this->db->rowCount();

            if($results > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteInteraction($id) {
            $this->db->query('DELETE FROM PostInteractions WHERE post_id = :id');
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