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
}