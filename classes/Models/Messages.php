<?php


class Messages extends AbstractModel
{
    public function getAllCorrespondence($recipient, $sender)
    {
        $query = "SELECT content.content, messages.sender_id, messages.recepient_id FROM messages INNER JOIN content ON messages.content_id = content.id AND recipient_id = $recipient AND sender_id = $sender;";;
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addToCorrespondence($recipient, $sender, $mess)
    {
        $queryMessage = "INSERT INTO messages (id, content_id , sender_id, recipient_id) VALUES (NULL, NULL , '$sender', '$recipient');";
        $queryContent = "INSERT INTO content (id, content) VALUES (NULL, '$mess');";
        $this->db->query($queryMessage);
        $this->db->query($queryContent);
    }
}