<?php

namespace App\Http\Controllers;

use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::all();
        return view('/content/outlet/index',compact('outlets'));
    }

    public function create()
    {
        return view('/content/outlet/add');
    }
}
