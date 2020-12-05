<?php


namespace Controllers;


class Index extends AbstractController
{

    public function index()
    {
        $this->view->template = 'main';
        $this->view->render();
    }
}