<?php

namespace App\Http\Controllers;

class TransactionController extends Controller
{
    public function index()
    {
        return view('/content/transaction/index');
    }
}
