<?php
    class Notification {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function sendNotification($senderId, $receiverID, $notification) {
            $this->db->query('INSERT INTO Notifications(sender_id, receiver_id, notification) VALUES(:sender_id, :receiver_id, :notification)');
            // bind values
            $this->db->bind(":sender_id", $senderId);
            $this->db->bind(":receiver_id", $receiverID);
            $this->db->bind(":notification", $notification);

            // Execute
            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getNotifications($receiverID) {
            $this->db->query('SELECT * FROM Notifications INNER JOIN Users ON Notifications.sender_id = Users.id WHERE receiver_id = :receiver_id ORDER BY send_at DESC');
             // bind values
            $this->db->bind(':receiver_id', $receiverID);

            $results = $this->db->resultSet();

            return $results;
        }

        public function getNotificationAmount($receiverID) {
            $this->db->query('SELECT * FROM Notifications WHERE receiver_id = :receiver_id'); // this is a prepared statement
            // bind value
            $this->db->bind(':receiver_id', $receiverID);

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

        public function deleteNotification($notificaitonID) {
            $this->db->query('DELETE FROM Notifications WHERE notification_id = :notification_id');
            // bind values
            
            $this->db->bind(":notification_id", $notificaitonID);

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