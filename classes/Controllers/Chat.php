<?php


namespace Controllers;

use Models\Messages;

class Chat extends AbstractController
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

    public function messages()
    {
        $recipientId = filter_input(INPUT_POST, 'id');
        $senderId = 5; // TODO get the sender id
        $messages = $this->model->getAllCorrespondence($recipientId, $senderId);
        $json = json_encode($messages);
        header('Content-type: application/json');
        echo $json;
    }
}