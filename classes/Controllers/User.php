<?php


namespace Controllers;

use Models\Users;

class User extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Users();
    }

    public function index()
    {
        $users = $this->model->getAllUsers();
        $json = json_encode($users);
        header('Content-type: application/json');
        echo $json;
    }

    public function auth()
    {
        $login = filter_input(INPUT_POST, 'login');
        $login = mb_strtolower(trim($login));
        $user = $this->model->getUser($login);
        if (empty($user)) {
            if ($this->model->addUser($login)) {
                $this->auth();
            }
        }
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
    }

    public function getAuthUser()
    {
        $json = json_encode($_SESSION);
        header('Content-type: application/json');
        echo $json;
    }
}