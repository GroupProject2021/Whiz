<?php
    class Post_IntakeNotices {
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

        // at course posts page
        // to admin
        public function filterAndGetPostsToIntakeNotices($criteria, $order) {
            switch($criteria) {
                case "all":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY postCreated DESC");
                    }                    
                    break;

                case "ups":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY ups ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY ups DESC");
                    }                    
                    break;

                case "downs":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY downs ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY downs DESC");
                    }
                    break;

                case "comments":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY comment_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY comment_count DESC");
                    }
                    break;

                case "rate0":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate1":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate2":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate3":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate4":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate5":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices WHERE rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated DESC");
                    }
                    break;

                case "reviews":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY review_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices ORDER BY review_count DESC");
                    }
                    break;
            }

            $results = $this->db->resultSet();

            return $results;
        }
        // to students
        public function filterAndGetPostsToIntakeNoticesAsMyNotices($criteria, $order) {
            switch($criteria) {
                case "all":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY postCreated DESC");
                    }                    
                    break;

                case "ups":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY ups ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY ups DESC");
                    }                    
                    break;

                case "downs":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY downs ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY downs DESC");
                    }
                    break;

                case "comments":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY comment_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY comment_count DESC");
                    }
                    break;

                case "rate0":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate1":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 1 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate2":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 1 AND rate3 = 0 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate3":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 1 AND rate4 = 0 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate4":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 1 AND rate5 = 0 ORDER BY postCreated DESC");
                    }
                    break;

                case "rate5":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id AND rate1 = 0 AND rate2 = 0 AND rate3 = 0 AND rate4 = 0 AND rate5 = 1 ORDER BY postCreated DESC");
                    }
                    break;

                case "reviews":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY review_count ASC");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
                        ON v_posts_notices.private_uni_id = Connections.to_user_id
                        WHERE Connections.from_user_id = :id ORDER BY review_count DESC");
                    }
                    break;
            }

            $this->db->bind(":id", $_SESSION['user_id']);

            $results = $this->db->resultSet();

            return $results;
        }

        // to admin
        public function searchAndGetPostsToIntakeNotices($search) {
            $this->db->query("SELECT * FROM v_posts_notices WHERE noticeName LIKE '".$search."%' 
            OR noticeContent LIKE '".$search."%' 
            OR first_name LIKE '".$search."%'");

            $results = $this->db->resultSet();

            return $results;
        }        
        // to students
        public function searchAndGetPostsToIntakeNoticesAsMyNotices($search) {
            $this->db->query("SELECT * FROM v_posts_notices INNER JOIN Connections
            ON v_posts_notices.private_uni_id = Connections.to_user_id
            WHERE Connections.from_user_id = :id AND noticeName LIKE '".$search."%' 
            OR noticeContent LIKE '".$search."%' 
            OR first_name LIKE '".$search."%'");
            $this->db->bind(":id", $_SESSION['user_id']);

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

            $this->db->execute();

            // Record transactions
            $this->db->query('INSERT INTO Transactions(post_id, user_id, amount) VALUES(:post_id, :user_id, :amount)');
            // bind values           
            $this->db->bind(":post_id", $postId); 
            $this->db->bind(":user_id", $_SESSION['user_id']); 
            $this->db->bind(":amount", INTAKE_NOTICE_PRICE); 

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


        public function getPostIdByImageTitleAndBody($data) {
            $this->db->query('SELECT id FROM Posts WHERE image = :image AND title = :title AND body = :body');
            $this->db->bind(':image', $data['image_name']);
            $this->db->bind(':title', $data['notice_name']);
            $this->db->bind(':body', $data['notice_content']);

            $row = $this->db->single();

            return $row->id;
        }
    }
?>