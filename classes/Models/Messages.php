<?php

namespace Models;

class Messages extends AbstractModel
{
    public function getAllCorrespondence($recipient, $sender)
    {
        $query = "SELECT content.id, content.content, users.login FROM content INNER JOIN messages ON content.id = messages.content_id INNER JOIN users ON messages.sender_id = users.id WHERE messages.sender_id = '$sender' AND messages.recipient_id = '$recipient' UNION SELECT content.id, content.content, users.login FROM content INNER JOIN messages ON content.id = messages.content_id INNER JOIN users ON messages.sender_id = users.id WHERE messages.sender_id = '$recipient' AND messages.recipient_id = '$sender';";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addToCorrespondence($sender, $recipient, $message)
    {
        $message = addslashes($message);
        $query = "INSERT INTO content (id, content) VALUES (NULL, '$message');";
        if ($this->db->query($query)) {
            $query = "SELECT id FROM content WHERE id = (SELECT MAX(id) FROM content);";
            $result = $this->db->query($query);
            if (isset($result)) {
                $id = (int)$result->fetch_row()[0];
                $query = "INSERT INTO messages (id, content_id, sender_id, recipient_id) VALUES (NULL, $id, '$sender', '$recipient');";
                $this->db->query($query);
            }
        }
    }
}