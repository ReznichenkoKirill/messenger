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
        $query = "SELECT * FROM users WHERE login = $login;";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function addUser($login)
    {
        $query = "INSERT INTO users (id, login) VALUES (NULL, '$login');";
        $this->db->query($query);
    }
}