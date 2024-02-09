<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class OutletController extends Controller
{
    public function index(): View
    {
        $outlets = Outlet::all();
        return view('/content/outlet/index', compact('outlets'));
    }

    public function create(): View
    {
        return view('/content/outlet/add');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => ['required', 'max:100'],
            'alamat' => ['required', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:13', 'regex:/^[0-9]*$/', Rule::unique('outlets', 'no_tlp')],
        ]);

        Outlet::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
        ]);

        return redirect()->route('outlets.index');
    }

    public function edit($id): View
    {
        $outlet = Outlet::find($id);

        return view('/content/outlet/edit', compact('outlet'));
    }

    public function update(Request $request, $id): RedirectResponse
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

        return redirect()->route('outlets.index');
    }

    public function destroy($id)
    {
        Outlet::find($id)->delete();

        return response()->json(['success' => 'Outlet deleted successfully']);
    }
}
