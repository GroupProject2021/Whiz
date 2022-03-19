<?php
    class Post_JobAds {
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

            $this->db->query("SELECT * FROM v_posts_jobs ORDER BY post_id DESC;");
            

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
            $this->db->query('UPDATE Posts SET image = :image, title = :job_name, body = :job_content, capacity = :capacity WHERE id = :id');
            // bind values
            $this->db->bind(":image", $data['image_name']);            
            $this->db->bind(":id", $data['postid']);
            $this->db->bind(":job_name", $data['job_name']);
            $this->db->bind(":job_content", $data['job_content']);
            $this->db->bind(":capacity", $data['capacity']);
 

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