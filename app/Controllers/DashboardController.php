<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function __construct(){
        helper('auth');
    }
    public function index()
    {
        $current_user=auth()->user();
        $arr = [
            'page_title'=>'Dashboard',
            'page_heading'=>'Dashboard',
            'current_user'=>$current_user
        ];
        return view('admin/dashboard_view',$arr);
    }
}
