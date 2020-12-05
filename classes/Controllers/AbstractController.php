<?php


namespace Controllers;

use View;

abstract class AbstractController implements Controllerable
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}