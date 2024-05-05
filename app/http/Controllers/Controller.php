<?php

namespace App\http\Controllers;

use App\sources\View;

abstract class Controller
{
    protected View $view;

    function __construct()
    {
        $this->view = new View();
    }
}