<?php
    class Post_Banners {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            // OLD QUERY
            // $this->db->query("SELECT *, 
            //                     posts.id AS postId,
            //                     users.id AS userId,
            //                     posts.created_at as postCreated
            //                     FROM posts
            //                     INNER JOIN users  
            //                     ON posts.user_id = users.id 
            //                     ORDER BY posts.created_at DESC");

            $this->db->query("SELECT * FROM v_complete_posts WHERE payed = 0  ORDER BY postId DESC");
            

            $results = $this->db->resultSet();

            return $results;
        }

        // at course posts page
        public function filterAndGetPostsToBanners($criteria, $order) {
            switch($criteria) {
                case "all":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY postCreated DESC");
                    }                    
                    break;

                case "ups":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY ups ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY ups DESC");
                    }                    
                    break;

                case "downs":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY downs ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY downs DESC");
                    }
                    break;

                case "comments":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY comment_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY comment_count DESC");
                    }
                    break;

                case "rate0":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate1":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate2":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate3":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate4":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate5":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated DESC");
                    }
                    break;

                case "reviews":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY review_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_banners ORDER BY review_count DESC");
                    }
                    break;
            }

            $results = $this->db->resultSet();

            return $results;
        }

        public function searchAndGetPostsToBanners($search) {
            $this->db->query("SELECT * FROM v_posts_banners WHERE title LIKE '".$search."%' 
            OR body LIKE '".$search."%' 
            OR first_name LIKE '".$search."%'
            OR last_name LIKE '".$search."%'");

            $results = $this->db->resultSet();

            return $results;
        }
    


        public function addPost($data, $type) {
            $this->db->query('INSERT INTO Posts(image, title, user_id, body, ups, downs, shares, views, type, applied, capacity) VALUES(:image, :title, :user_id, :body, :ups, :downs, :shares, :views, :type, :applied, :capacity)');
            // bind values
            $this->db->bind(":image", $data['image_name']);
            $this->db->bind(":title", $data['title']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":body", $data['body']);
            $this->db->bind(":ups", $data['ups']);
            $this->db->bind(":downs", $data['downs']);
            $this->db->bind(":shares", $data['shares']);
            $this->db->bind(":views", $data['views']);
            $this->db->bind(":type", $data['type']);
            $this->db->bind(":applied", $data['applied']);
            $this->db->bind(":capacity", $data['capacity']);

            $this->db->execute();

            $postId = $this->getPostIdByContent($data['title'], $data['user_id'], $data['body']);

            $this->db->query('INSERT INTO Banner(banner_id, session_fee) VALUES(:banner_id, :session_fee)');
            // bind values           
            $this->db->bind(":banner_id", $postId); 
            $this->db->bind(":session_fee", $data['session_fee']);
            
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
            $this->db->query('UPDATE Posts SET image = :image, title = :title, body = :body WHERE id = :id');
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
            $this->db->query('SELECT * FROM Posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deletePost($id) {
            $this->db->query('DELETE FROM Posts WHERE id = :id');
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

        

        
        public function getPostIdByImageTitleAndBody($data) {
            $this->db->query('SELECT id FROM Posts WHERE image = :image AND title = :title AND body = :body');
            $this->db->bind(':image', $data['image_name']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            $row = $this->db->single();

            return $row->id;
        }


    }
?>