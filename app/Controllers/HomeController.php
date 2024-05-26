<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        helper('auth');
        echo(auth()->id());
        return view('welcome_view');
    }
}
