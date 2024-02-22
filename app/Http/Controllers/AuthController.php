<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('/content/guest/index');
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($login)) {
            request()->session()->regenerate();
            session()->flash('success', 'Login Succesfully!!');
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Username / Password salah');
            return redirect()->back()->withErrors($login)->withInput();
        }
    }

    public function logout()
    {
        auth()->logout();

        Request()->session()->invalidate();

        request()->session()->regenerateToken();

        return response()->json(['success' => 'You Are Logout']);
    }
}
