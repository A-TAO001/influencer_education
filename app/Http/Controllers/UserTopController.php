<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTopController extends Controller
{
    public function index()
    {
        return view('user_top');
    }
}
