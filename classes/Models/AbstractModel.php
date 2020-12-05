<?php
namespace Models;

use mysqli;

abstract class AbstractModel
{
    /**
     * @var mysqli
     */
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
}