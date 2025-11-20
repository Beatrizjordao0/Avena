<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{

     public function index() {
        return view('index');
    }

    public function login() { 
        return view("login");
    }

    public function email() {
        return view('email');
    }

    public function password() {
        return view('password');
    }

    public function schedule() {
        return view('schedule');
    }

}

