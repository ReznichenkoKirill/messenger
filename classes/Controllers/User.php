<?php


namespace Controllers;

use Models\Users;

class User extends AbstractController
{

    public function __construct()
    {
        //TODO проверка на пользователя в сессии и редирект(либо статус не авторизован) ниже код не должен работать
        parent::__construct();
        $this->model = new Users();
        if(empty($_COOKIE['login'])){
            http_response_code(419);
        }else{
            $this->userLogin = $_COOKIE['login'];
        }
    }

    public function index()
    {
        $users = $this->model->getAllUsers();
        $json = json_encode($users);
        header('Content-type: application/json');
        echo $json;
    }

    public function login()
    {
        $login = filter_input(INPUT_POST,"login");
        if($this->model->checkUser($login)){
            $user = $this->model->getUser($login);
            $_SESSION['user']= $user;
        }else{
            $this->model->addUser($login);
            $user = $this->model->getUser($login);
            $_SESSION['user']= $user;
        }
    }

}