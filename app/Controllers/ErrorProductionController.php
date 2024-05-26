<?php

namespace App\Controllers;

class ErrorProductionController extends BaseController
{
    public function not_found_error(): string
    {
        return view('errors/html/production_page_not_found');
    }
    public function standard_error(): string
    {
        return view('errors/html/production_something_went_wrong');
    }
    public function access_denied_error(): string
    {
        return view('errors/html/production_access_denied');
    }
    public function banned(): string
    {
        return view('errors/html/production_banned');
    }
}
