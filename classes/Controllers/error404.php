<?php

namespace Controllers;

class error404 implements Controllerable
{
    public function index()
    {
        echo 'Page not found';
    }
}