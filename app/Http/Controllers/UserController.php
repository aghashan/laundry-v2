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

    public function store(Request $request)
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

        return response()->json(['success' => 'User add successfully']);
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
            'password' => ['nullable', 'min:8']
        ]);

        $user = User::find($id);

        if ($request->filled('password')) {
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors(['password' => 'The password is incorrect.'])->withInput();
            }
        }

        $user->update([
            'name' => $request->name,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }
}
