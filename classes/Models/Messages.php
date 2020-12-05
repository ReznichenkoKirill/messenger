<?php

namespace Models;

class Messages extends AbstractModel
{
    public function getAllCorrespondence($recipient, $sender)
    {
        $query = "SELECT content.id, content.content, messages.sender_id, messages.recipient_id FROM messages INNER JOIN content ON messages.content_id = content.id AND recipient_id = '$recipient' AND sender_id = '$sender';";
        $result = $this->db->query($query);
        $myMessages = $result->fetch_all(MYSQLI_ASSOC);
        $query = "SELECT content.id, content.content, messages.sender_id, messages.recipient_id FROM messages INNER JOIN content ON messages.content_id = content.id AND recipient_id = '$sender' AND sender_id = '$recipient';";
        $result = $this->db->query($query);
        $yourMessages = $result->fetch_all(MYSQLI_ASSOC);
        return array_merge($myMessages, $yourMessages);
    }

    public function addToCorrespondence($recipient, $sender, $mess)
    {
        $queryMessage = "INSERT INTO messages (id, content_id , sender_id, recipient_id) VALUES (NULL, NULL , '$sender', '$recipient');";
        $queryContent = "INSERT INTO content (id, content) VALUES (NULL, '$mess');";
        $this->db->query($queryMessage, $queryContent);
    }
}