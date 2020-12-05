<?php


abstract class AbstractModel
{
    /**
     * @var mysqli
     */
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli(); // TODO Create config and fill the parameters
    }
}