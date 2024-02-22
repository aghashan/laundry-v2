<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'outlet_id' => ['required'],
            'password' => ['required', 'min:8'],
            'role' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'outlet_id' => $request->outlet_id,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        session()->flash('success', 'User add successfully');
        return redirect()->route('users.add');
    }

    public function edit($id): View
    {
        $user = User::find($id);
        $outlets = Outlet::all();

        return view('/content/user/edit', compact('user', 'outlets'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'outlet_id' => ['required'],
            'password' => ['nullable', 'min:8'],
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'outlet_id' => $request->outlet_id,
            'password' => $request->password,
        ]);

        return response()->json(['success' => 'User updated succesfully']);

    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index');
    }
}
