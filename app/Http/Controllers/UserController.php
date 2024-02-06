<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('/content/user/index', compact('users'));
    }

    public function create(): View
    {
        $outlets = Outlet::all();
        return view('/content/user/add', compact('outlets'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'outlet_id' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'outlet_id' => $request->outlet_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return redirect()->route('users.index');
    }
}
