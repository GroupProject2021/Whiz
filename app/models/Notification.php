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
    }
?>