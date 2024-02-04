<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages=Package::all();
        return view('/content/package/index',compact('packages'));
    }

    public function create()
    {
        return view('/content/package/add');
    }
}
