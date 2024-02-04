<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('/content/member/index',compact('members'));
    }

    public function create(){
        return view('/content/member/add');
    }
}
