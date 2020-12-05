<?php


class Messages
{
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli();
    }

    public function getAllCorrespondence($recipient, $sender)
    {
        $query = "SELECT message FROM messages WHERE recipient_id = $recipient AND sender_id = $sender;";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addToCorrespondence($recipient, $sender, $mess)
    {
        $query = "INSERT INTO messages (id, message, sender_id, recipient_id) VALUES (NULL, '$mess' , '$sender', '$recipient');";
        $this->db->query($query);
    }


}