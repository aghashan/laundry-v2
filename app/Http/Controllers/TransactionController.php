<?php

namespace App\Http\Controllers;

use App\Models\Package;

class TransactionController extends Controller
{
    public function index()
    {
        return view('/content/transaction/index');
    }

    public function create(){
        $package = Package::all();
        return view('/content/transaction/add',['availablePackages' => $package]);
    }
}
