<?php
    class CommunityThreadComment {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        // comment
        public function addComment($data) {
            $this->db->query('INSERT INTO CommunityComments(thread_id, user_id, content, ups, downs) VALUES(:thread_id, :user_id, :content, :ups, :downs)');
            // bind values
            $this->db->bind(":thread_id", $data['thread_id']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":content", $data['content']);
            $this->db->bind(":ups", $data['ups']);
            $this->db->bind(":downs", $data['downs']);

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
            $this->db->query('SELECT * FROM CommunityComments WHERE thread_id = :thread_id ORDER BY CommunityComments.created_at DESC');
            $this->db->bind(':thread_id', $id);

            $results = $this->db->resultSet();

            return $results;
        }

        public function deleteComment($id) {
            $this->db->query('DELETE FROM CommunityComments WHERE comment_id = :id');
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

         // Find user by email
         public function isCommentExist($id) {
            $this->db->query('SELECT * FROM CommunityComments WHERE thread_id = :id'); // this is a prepared statement
            // bind value
            $this->db->bind(":id", $id);

            $row = $this->db->single();

            // Check row - return true if email exists. Because then rowCount is not 0
            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getUserDetails($id) {
            $this->db->query('SELECT * FROM Users WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }


        // comment like 
        public function incCommentUp($id) {
            $this->db->query('UPDATE CommunityComments SET ups = ups + 1 WHERE comment_id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getCommentInc($id);
            }
            else {
                return false;
            }
        }

        public function decCommentUp($id) {
            $this->db->query('UPDATE CommunityComments SET ups = ups - 1 WHERE comment_id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getCommentInc($id);
            }
            else {
                return false;
            }
        }

        public function getCommentInc($id) {
            $this->db->query('SELECT ups FROM CommunityComments WHERE comment_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }


        // comment dilikes
        public function incCommentDown($id) {
            $this->db->query('UPDATE CommunityComments SET downs = downs + 1 WHERE comment_id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getCommentDown($id);
            }
            else {
                return false;
            }
        }

        public function decCommentDown($id) {
            $this->db->query('UPDATE CommunityComments SET downs = downs - 1 WHERE comment_id = :id');
            // bind values            
            $this->db->bind(":id", $id);

            // Execute
            if($this->db->execute()) {
                return $this->getCommentDown($id);
            }
            else {
                return false;
            }
        }

        public function getCommentDown($id) {
            $this->db->query('SELECT downs FROM CommunityComments WHERE comment_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }


        // comment like dislike interactions
        public function addCommentInteraction($userId, $commentId, $interation) {
            $this->db->query('INSERT INTO CommunityCommentInteractions(user_id, comment_id, comment_interaction) VALUES(:user_id, :comment_id, :interaction)');
            // bind values
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":comment_id", $commentId);
            $this->db->bind(":interaction", $interation);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function setCommentInteraction($userId, $commentId, $interation) {
            $this->db->query('UPDATE CommunityCommentInteractions SET comment_interaction = :interaction WHERE user_id = :user_id AND comment_id = :comment_id');
            // bind values
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":comment_id", $commentId);
            $this->db->bind(":interaction", $interation);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getCommentInteration($userId, $commentId) {
            $this->db->query('SELECT * FROM CommunityCommentInteractions WHERE user_id = :user_id AND comment_id = :comment_id');
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":comment_id", $commentId);

            $row = $this->db->single();

            return $row;
        }

        public function isCommentInterationExist($userId, $commentId) {
            $this->db->query('SELECT * FROM CommunityCommentInteractions WHERE user_id = :user_id AND comment_id = :comment_id');
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":comment_id", $commentId);

            $results = $this->db->single();

            $results = $this->db->rowCount();

            if($results > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        public function deleteCommentInteraction($id) {
            $this->db->query('DELETE FROM CommunityCommentInteractions WHERE comment_id = :id');
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