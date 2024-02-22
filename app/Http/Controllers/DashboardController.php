<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $member = Member::all()->count();
        $user = User::all()->count();
        $outlet = Outlet::all()->count();

        return view('/content/dashboard', compact('member','user','outlet'));
    }
}
