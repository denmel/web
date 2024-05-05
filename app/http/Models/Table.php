<?php

namespace App\http\Models;

abstract class Table
{
    public DB $db;
    public array $headers;

    function __construct()
    {
        $this->db = new DB;
    }
}