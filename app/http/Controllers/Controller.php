<?php

require_once __DIR__."/../../sources/View.php";
abstract class Controller
{
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }
}