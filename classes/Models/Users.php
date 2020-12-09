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
        $query = "INSERT INTO users (id, login,avatar) VALUES (NULL, '$login', '1.jpg');";
        $this->db->query($query);
    }

    public function checkUser($login){
        $query = "SELECT * FROM users WHERE login LIKE '$login'";
        $result = $this->db->query($query);
        $tmp = $result->fetch_assoc();
        if (empty($tmp)) {
            return true;
        } else {
            return false;
        }
    }

}