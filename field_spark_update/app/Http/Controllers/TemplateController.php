<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function index1()
    {
        return view('auth.register');
    }
    public function index2()
    {
        return view('pages.dashboard');
    }
   
}
