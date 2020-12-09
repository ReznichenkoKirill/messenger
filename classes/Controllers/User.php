<?php


namespace Controllers;

use Models\Users;

class User extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Users();
//        $this->logIn();
    }

    public function index()
    {
        $users = $this->model->getAllUsers();
        $json = json_encode($users);
        header('Content-type: application/json');
        echo $json;
    }
    public function logIn() {
        $user = filter_input(INPUT_POST,'login');
        if($tmp = $this->model->getUser($user)) {
            $_SESSION['login'] = $tmp['login'];
            $_SESSION['id'] = $tmp['id'];
            http_response_code(200);
            return;
        } else {
            $this->model->addUser($user, $this->getRandomImg());
            $tmp = $this->model->getUser($user);
            $_SESSION['login'] = $tmp['login'];
            $_SESSION['id'] = $tmp['id'];
            var_dump($tmp);
            http_response_code(200);
            return;
        }
        http_response_code(400);
    }
    public function logOut() {
        $user = filter_input(INPUT_POST,'logout');
        if($user) {
            session_destroy();
        }
    }
    private function getRandomImg() {
        return rand(1 , count(AVATARS));
    }
}