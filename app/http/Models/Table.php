<?php

require_once __DIR__."/DB.php";
abstract class Table
{
    public DB $db;
    public array $headers;

    function __construct()
    {
        $this->db = new DB;
    }
}