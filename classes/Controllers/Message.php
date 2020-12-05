<?php


namespace Controllers;

use Messages;

class Message extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Messages();
    }

    public function index()
    {
        // TODO: Implement index() method.
    }
}