<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ExampleController extends Controller
{
    private $http;

    public function __construct()
    {
        $this->http = new Http;
    }

    public function get()
    {

    }

    public function post()
    {

    }
}
