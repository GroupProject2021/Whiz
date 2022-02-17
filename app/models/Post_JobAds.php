<?php
    class Post_JobAds {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM v_posts_jobs ORDER BY post_id DESC;");            

            $results = $this->db->resultSet();

            return $results;
        }

        public function getPostsById($id) {
            $this->db->query("SELECT * FROM v_posts_jobs WHERE company_id = :id ORDER BY post_id DESC;");     
            $this->db->bind(":id", $id);       

            $results = $this->db->resultSet();

            return $results;
        }

        // at course posts page
        public function filterAndGetPostsToJobAds($criteria, $order) {
            switch($criteria) {
                case "all":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY postCreated DESC");
                    }                    
                    break;

                case "ups":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY ups ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY ups DESC");
                    }                    
                    break;

                case "downs":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY downs ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY downs DESC");
                    }
                    break;

                case "comments":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY comment_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY comment_count DESC");
                    }
                    break;

                case "rate0":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate1":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate2":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate3":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate4":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate5":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated DESC");
                    }
                    break;

                case "reviews":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY review_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY review_count DESC");
                    }
                    break;
            }

            $results = $this->db->resultSet();

            return $results;
        }

        public function searchAndGetPostsToJobAds($search) {
            $this->db->query("SELECT * FROM v_posts_jobs WHERE jobName LIKE '".$search."%' 
            OR jobContent LIKE '".$search."%' 
            OR capacity LIKE '".$search."%'
            OR first_name LIKE '".$search."%'");

            $results = $this->db->resultSet();

            return $results;
        }

        public function getJobAdsAmount() {
            $this->db->query('SELECT * FROM v_posts_jobs WHERE company_id = :id'); // this is a prepared statement
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
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY ups ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY ups DESC LIMIT 10");
                    }                    
                    break;

                case "downs":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY downs ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY downs DESC LIMIT 10");
                    }
                    break;

                case "comments":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY comment_count ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY comment_count DESC LIMIT 10");
                    }
                    break;

                case "reviews":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY review_count ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_jobs ORDER BY review_count DESC LIMIT 10");
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
            $this->db->bind(":title", $data['job_name']);
            $this->db->bind(":user_id", $data['com_id']);
            $this->db->bind(":body", $data['job_content']);
            $this->db->bind(":ups", $data['ups']);
            $this->db->bind(":downs", $data['downs']);
            $this->db->bind(":shares", $data['shares']);
            $this->db->bind(":views", $data['views']);
            $this->db->bind(":type", $data['type']);
            $this->db->bind(":applied", $data['applied']);
            $this->db->bind(":capacity", $data['capacity']);

            $this->db->execute();

            $postId = $this->getPostIdByContent($data['job_name'], $data['com_id'], $data['job_content']);

            $this->db->query('INSERT INTO Jobs(company_id, post_id) VALUES(:company_id, :post_id)');
            // bind values           
            $this->db->bind(":company_id", $data['com_id']); 
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
            $this->db->query('UPDATE Posts SET image = :image, title = :job_name, body = :job_content WHERE id = :id');
            // bind values
            $this->db->bind(":image", $data['image_name']);            
            $this->db->bind(":id", $data['postid']);
            $this->db->bind(":job_name", $data['job_name']);
            $this->db->bind(":job_content", $data['job_content']);
 

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getPostById($id) {
            $this->db->query('SELECT * FROM v_posts_jobs WHERE post_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deletePost($id) {
            $this->db->query('DELETE FROM Posts WHERE id = :id');
            // bind values
            $this->db->bind(":id", $id);

            $this->db->execute();

            $this->db->query('DELETE FROM Jobs WHERE post_id = :id');
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
        
        // LIKES DISLIKES REMOVED
        
        public function getPostIdByImageTitleAndBody($data) {
            $this->db->query('SELECT id FROM Posts WHERE image = :image AND title = :title AND body = :body');
            $this->db->bind(':image', $data['image_name']);
            $this->db->bind(':title', $data['job_name']);
            $this->db->bind(':body', $data['job_content']);

            $row = $this->db->single();

            return $row->id;
        }
    }
?>