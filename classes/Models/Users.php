<?php
namespace Models;

class Users extends AbstractModel
{
    public function getAllUsers()
    {
        $query = "SELECT * FROM users;";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser($login)
    {
        $query = "SELECT * FROM users WHERE login LIKE '$login';";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function addUser($login)
    {
        $avatar = rand(1, 5);
        $avatar .= ($avatar === 2 || $avatar === 3) ? '.png' : '.jpg';
        $query = "INSERT INTO users (id, login, avatar) VALUES (NULL, '$login', '$avatar');";
        $this->db->query($query);
        return $this->getUser($login);
    }
}