<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class OutletController extends Controller
{
    public function index(): View
    {
        $outlets = Outlet::latest()->get();
        return view('/content/outlet/index', compact('outlets'));
    }

    public function create(): View
    {
        return view('/content/outlet/add');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'max:100'],
            'alamat' => ['required', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:13', 'regex:/^[0-9]*$/', Rule::unique('outlets', 'no_tlp')],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            Outlet::create([
                'name' => $request->name,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp,
            ]);

            session()->flash('success', 'Outlet Add Successfully');
            return redirect()->route('outlets.add');
        }
    }

    public function edit($id): View
    {
        $outlet = Outlet::find($id);

        return view('/content/outlet/edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:100'],
            'alamat' => ['required', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:13', 'regex:/^[0-9]*$/'],
        ]);

        $outlet = Outlet::find($id);

        $outlet->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
        ]);

        return response()->json(['success' => 'Outlet updated successfully ']);
    }

    public function destroy($id)
    {
        Outlet::find($id)->delete();

        return redirect()->route('outlets.index');
    }
}
