<?php

namespace App\Http\Controllers;

use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('/content/status/index',compact('statuses'));
    }

    public function create()
    {
        return view('/content/status/add');
    }
}
