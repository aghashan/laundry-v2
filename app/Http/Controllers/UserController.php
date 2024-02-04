<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('/content/user/index', compact('users'));
    }

    public function create()
    {
        return view('/content/user/add');
    }
}
