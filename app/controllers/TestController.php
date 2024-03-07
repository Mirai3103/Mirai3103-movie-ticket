<?php

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller(path: "/test")]
class TestController
{
    #[Route("", "GET")]
    public function index()
    {
        echo "Hello, World!";
    }
    #[Route("/{id}", "GET")]
    public function product($prams)
    {
        print_r($prams[1]);
    }
}
