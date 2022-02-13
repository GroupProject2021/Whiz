<?php
    class M_O_U_Notice {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts($userid) {
            // OLD QUERY
            // $this->db->query("SELECT *, 
            //                     posts.id AS postId,
            //                     users.id AS userId,
            //                     posts.created_at as postCreated
            //                     FROM posts
            //                     INNER JOIN users  
            //                     ON posts.user_id = users.id 
            //                     ORDER BY posts.created_at DESC");

            $this->db->query("SELECT * FROM v_posts_notices WHERE private_uni_id = $userid ORDER BY post_id DESC;");
            

            $results = $this->db->resultSet();

            return $results;
        }

        public function getIntakeNoticesAmount() {
            $this->db->query('SELECT * FROM v_posts_notices WHERE private_uni_id = :id'); // this is a prepared statement
            $this->db->bind(":id", $_SESSION['user_id']);
    
            $row = $this->db->single();
    
            // Check row - return true if email exists. Because then rowCount is not 0
            $amount = $this->db->rowCount();
            if($amount > 0) {
                return $amount;
            }
            else {
                return false;
            }
        }

        // to dahsboard analytics
        public function filterAndGetPosts($criteria, $order) {
            switch($criteria) {
                case "ups":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY ups ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY ups DESC LIMIT 10");
                    }                    
                    break;

                case "downs":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY downs ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY downs DESC LIMIT 10");
                    }
                    break;

                case "comments":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY comment_count ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY comment_count DESC LIMIT 10");
                    }
                    break;

                case "reviews":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY review_count ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY review_count DESC LIMIT 10");
                    }
                    break;
            }

            $results = $this->db->resultSet();

            return $results;
        }


        public function addPost($data) {
            $this->db->query('INSERT INTO Posts(image, title, user_id, body, ups, downs, shares, views, type, applied, capacity) VALUES(:image, :title, :user_id, :body, :ups, :downs, :shares, :views, :type, :applied, :capacity)');
            // bind values
            $this->db->bind(":image", $data['image_name']);
            $this->db->bind(":title", $data['notice_name']);
            $this->db->bind(":user_id", $data['private_uni_id']);
            $this->db->bind(":body", $data['notice_content']);
            $this->db->bind(":ups", $data['ups']);
            $this->db->bind(":downs", $data['downs']);
            $this->db->bind(":shares", $data['shares']);
            $this->db->bind(":views", $data['views']);
            $this->db->bind(":type", $data['type']);
            $this->db->bind(":applied", NULL);
            $this->db->bind(":capacity", NULL);

            $this->db->execute();

            $postId = $this->getPostIdByContent($data['notice_name'], $data['private_uni_id'], $data['notice_content']);

            $this->db->query('INSERT INTO IntakeNotices(private_uni_id, post_id) VALUES(:private_uni_id, :post_id)');
            // bind values           
            $this->db->bind(":private_uni_id", $data['private_uni_id']); 
            $this->db->bind(":post_id", $postId);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getPostIdByContent($title, $userId, $body) {
            $this->db->query('SELECT id FROM Posts WHERE title = :title AND user_id = :user_id AND body = :body');
            // bind values
            $this->db->bind(":title", $title);
            $this->db->bind(":user_id", $userId);
            $this->db->bind(":body", $body);

            $row = $this->db->single();

            return $row->id;
        }

        public function addAdvertisement($data) {
            $this->db->query('INSERT INTO Advertisements(ad_id, ad_applied, ad_capacity) VALUES(:id, :applied, :capacity)');
            // bind values
            $this->db->bind(":id", $data['image_name']);
            $this->db->bind(":applied", $data['title']);
            $this->db->bind(":capacity", $data['user_id']);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function updatePost($data) {
            $this->db->query('UPDATE Posts SET image = :image, title = :notice_name, body = :notice_content WHERE id = :id');
            // bind values
            $this->db->bind(":image", $data['image_name']);            
            $this->db->bind(":id", $data['postid']);
            $this->db->bind(":notice_name", $data['notice_name']);
            $this->db->bind(":notice_content", $data['notice_content']);
 

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getPostById($id) {
            $this->db->query('SELECT * FROM v_posts_notices WHERE post_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deletePost($id) {
            $this->db->query('DELETE FROM Posts WHERE id = :id');
            // bind values
            $this->db->bind(":id", $id);

            $this->db->execute();

            $this->db->query('DELETE FROM Privatecourses WHERE post_id = :id');
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

        public function isPostExist($postId) {
            $this->db->query('SELECT * FROM Posts WHERE id = :post_id');
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