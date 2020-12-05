<?php


class View
{
    public $template;
    public $page;

    public function render()
    {
        $this->page = str_replace('.', DIRECTORY_SEPARATOR, $this->page);
        include_once 'views' . DIRECTORY_SEPARATOR . $this->template . '.php';
    }
}