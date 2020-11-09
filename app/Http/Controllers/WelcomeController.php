<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index($name) {
        return view('user.welcome', ['name' => $name]);
    }
}
