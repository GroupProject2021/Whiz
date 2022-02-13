<?php
    class Post_CoursePosts {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {

            $this->db->query("SELECT * FROM v_posts_courses ORDER BY post_id DESC;");
            

            $results = $this->db->resultSet();

            return $results;
        }

        public function getUniversityCoursesAmount() {
            $this->db->query('SELECT * FROM v_posts_courses WHERE private_uni_id = :id'); // this is a prepared statement
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
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY ups ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY ups DESC LIMIT 10");
                    }                    
                    break;

                case "downs":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY downs ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY downs DESC LIMIT 10");
                    }
                    break;

                case "comments":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY comment_count ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY comment_count DESC LIMIT 10");
                    }
                    break;

                case "reviews":
                    if($order == "asc"){
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY review_count ASC LIMIT 10");
                    }
                    else {
                        $this->db->query("SELECT * FROM v_posts_courses ORDER BY review_count DESC LIMIT 10");
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
            $this->db->bind(":title", $data['course_name']);
            $this->db->bind(":user_id", $data['private_uni_id']);
            $this->db->bind(":body", $data['course_content']);
            $this->db->bind(":ups", $data['ups']);
            $this->db->bind(":downs", $data['downs']);
            $this->db->bind(":shares", $data['shares']);
            $this->db->bind(":views", $data['views']);
            $this->db->bind(":type", $data['type']);
            $this->db->bind(":applied", NULL);
            $this->db->bind(":capacity", NULL);

            $this->db->execute();

            $postId = $this->getPostIdByContent($data['course_name'], $data['private_uni_id'], $data['course_content']);

            $this->db->query('INSERT INTO Privatecourses(provide_degree, course_fee, private_uni_id, post_id) VALUES(:provide_degree, :course_fee, :private_uni_id, :post_id)');
            // bind values
            $this->db->bind(":provide_degree", $data['provide_degree']);
            $this->db->bind(":course_fee", $data['course_fee']);            
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
            $this->db->query('UPDATE Posts SET image = :image, title = :course_name, body = :course_content WHERE id = :id');
            // bind values
            $this->db->bind(":image", $data['image_name']);            
            $this->db->bind(":id", $data['postid']);
            $this->db->bind(":course_name", $data['course_name']);
            $this->db->bind(":course_content", $data['course_content']);

            $this->db->execute();

            $this->db->query('UPDATE Privatecourses SET provide_degree = :provide_degree, course_fee = :course_fee WHERE post_id = :id');
            // bind values    
            $this->db->bind(":id", $data['postid']);
            $this->db->bind(":provide_degree", $data['provide_degree']);
            $this->db->bind(":course_fee", $data['course_fee']); 

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getPostById($id) {
            $this->db->query('SELECT * FROM v_posts_courses WHERE post_id = :id');
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

        /// LIKES DISLIKES REMOVED

        public function getPostIdByImageTitleAndBody($data) {
            $this->db->query('SELECT id FROM Posts WHERE image = :image AND title = :title AND body = :body');
            $this->db->bind(':image', $data['image_name']);
            $this->db->bind(':title', $data['course_name']);
            $this->db->bind(':body', $data['course_content']);

            $row = $this->db->single();

            return $row->id;
        }
    }
?>