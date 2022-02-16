<?php
    class Mentor_dashboard{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // // get mentor details
        public function getPosts() {
            $this->db->query("SELECT * FROM Mentor");
            return $results = $this->db->resultSet();
        }

        // post functions
        // show banner / poster
        public function getBanners() {
            $this->db->query("SELECT *, 
                                Banner.id AS postId,
                                Users.id AS userId,
                                Banner.created_at as postCreated
                                FROM Banner
                                INNER JOIN Users  
                                ON Banner.user_id = Users.id 
                                ORDER BY Banner.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }

        public function getPosters() {
            $this->db->query("SELECT *, 
                                Poster.id AS postId,
                                Users.id AS userId,
                                Poster.created_at as postCreated
                                FROM Poster
                                INNER JOIN Users  
                                ON Poster.user_id = Users.id 
                                ORDER BY Poster.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }

        // add banner / poster
        public function addBanner($data) {
            $this->db->query('INSERT INTO Banner(image, title, user_id, body, ups, downs, shares, views) VALUES(:image, :title, :user_id, :body, :ups, :downs, :shares, :views)');
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
            $this->db->query('INSERT INTO Poster(image, title, user_id, body, ups, downs, shares, views) VALUES(:image, :title, :user_id, :body, :ups, :downs, :shares, :views)');
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
            $this->db->query('UPDATE Banner SET image = :image, title = :title, body = :body WHERE id = :id');
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
            $this->db->query('UPDATE Poster SET image = :image, title = :title, body = :body WHERE id = :id');
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
            $this->db->query('DELETE FROM Banner WHERE id = :id');
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
            $this->db->query('DELETE FROM Poster WHERE id = :id');
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
            $this->db->query('SELECT * FROM Banner WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getPosterById($id) {
            $this->db->query('SELECT * FROM Poster WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
/////////////
        // public function incUpBanner($id) {
        //     $this->db->query('UPDATE Banner SET ups = ups + 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getIncBanner($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function decUpBanner($id) {
        //     $this->db->query('UPDATE Banner SET ups = ups - 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getIncBanner($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function getIncBanner($id) {
        //     $this->db->query('SELECT ups FROM Banner WHERE id = :id');
        //     $this->db->bind(':id', $id);

        //     $row = $this->db->single();

        // return $row;
        // }

        // dislikes
        // public function incDownBanner($id) {
        //     $this->db->query('UPDATE Banner SET downs = downs + 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getDownBanner($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function decDownBanner($id) {
        //     $this->db->query('UPDATE Banner SET downs = downs - 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getDownBanner($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function getDownBanner($id) {
        //     $this->db->query('SELECT downs FROM Banner WHERE id = :id');
        //     $this->db->bind(':id', $id);

        //     $row = $this->db->single();

        //     return $row;
        // }
////////////////
        // public function getIncPoster($id) {
        //     $this->db->query('SELECT ups FROM Poster WHERE id = :id');
        //     $this->db->bind(':id', $id);

        //     $row = $this->db->single();

        //     return $row;
        // }

        // dislikes

        // public function incUpPoster($id) {
        //     $this->db->query('UPDATE Poster SET ups = ups + 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getIncPoster($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function decUpPoster($id) {
        //     $this->db->query('UPDATE Poster SET ups = ups - 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getIncPoster($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }
        // public function incDownPoster($id) {
        //     $this->db->query('UPDATE Poster SET downs = downs + 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getDownPoster($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function decDownPoster($id) {
        //     $this->db->query('UPDATE Poster SET downs = downs - 1 WHERE id = :id');
        //     // bind values            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return $this->getDownPoster($id);
        //     }
        //     else {
        //         return false;
        //     }
        // }
        // public function getDownPoster($id) {
            // $this->db->query('SELECT downs FROM Poster WHERE id = :id');
            // $this->db->bind(':id', $id);

            // $row = $this->db->single();

            // return $row;
        // }

        // comment
        // public function addComment($data) {
        //     $this->db->query('INSERT INTO Comments(post_id, user_id, content) VALUES(:post_id, :user_id, :content)');
        //     // bind values
        //     $this->db->bind(":post_id", $data['post_id']);
        //     $this->db->bind(":user_id", $data['user_id']);
        //     $this->db->bind(":content", $data['content']);

        //     // Execute
        //     if($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function getComments($id) {
        //     // $this->db->query('SELECT * FROM comments WHERE post_id = :post_id');
        //     $this->db->query('SELECT * FROM Comments WHERE post_id = :post_id ORDER BY comments.created_at DESC');
        //     $this->db->bind(':post_id', $id);

        //     $results = $this->db->resultSet();

        //     return $results;
        // }

        public function getUserDetails($id) {
            $this->db->query('SELECT * FROM Users WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // like dislike interactions
        // public function addPostInteraction($userId, $postId, $interation) {
        //     $this->db->query('INSERT INTO PostInteractions(user_id, post_id, interaction) VALUES(:user_id, :post_id, :interaction)');
        //     // bind values
        //     $this->db->bind(":user_id", $userId);
        //     $this->db->bind(":post_id", $postId);
        //     $this->db->bind(":interaction", $interation);

        //     // Execute
        //     if($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function setPostInteraction($userId, $postId, $interation) {
        //     $this->db->query('UPDATE PostInteractions SET interaction = :interaction WHERE user_id = :user_id AND post_id = :post_id');
        //     // bind values
        //     $this->db->bind(":user_id", $userId);
        //     $this->db->bind(":post_id", $postId);
        //     $this->db->bind(":interaction", $interation);

        //     // Execute
        //     if($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function getPostInteration($userId, $postId) {
        //     $this->db->query('SELECT * FROM PostInteractions WHERE user_id = :user_id AND post_id = :post_id');
        //     $this->db->bind(":user_id", $userId);
        //     $this->db->bind(":post_id", $postId);

        //     $row = $this->db->single();

        //     return $row;
        // }

        // public function isPostInterationExist($userId, $postId) {
        //     $this->db->query('SELECT * FROM PostInteractions WHERE user_id = :user_id AND post_id = :post_id');
        //     $this->db->bind(":user_id", $userId);
        //     $this->db->bind(":post_id", $postId);

        //     $results = $this->db->single();

        //     $results = $this->db->rowCount();

        //     if($results > 0) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function deleteInteraction($id) {
        //     $this->db->query('DELETE FROM PostInteractions WHERE post_id = :id');
        //     // bind values
            
        //     $this->db->bind(":id", $id);

        //     // Execute
        //     if($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }   


        // review
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

        // Complaint functions
        public function getComplaints() {
            $this->db->query("SELECT *, 
                                Complaints.id AS postId,
                                Users.id AS userId,
                                Complaints.created_at as postCreated
                                FROM Complaints
                                INNER JOIN Users  
                                ON Complaints.user_id = Users.id 
                                ORDER BY Complaints.created_at DESC");
            $results = $this->db->resultSet();

            return $results;
        }

        public function dashboard($id){
            $this->db->query('SELECT * FROM v_posts_link WHERE user_id = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();

            return $results;
        }
    }
?>