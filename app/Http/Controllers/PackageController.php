<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PackageController extends Controller
{
    public function index(): View
    {
        $packages = Package::latest()->get();
        return view('/content/package/index', compact('packages'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('/content/package/add', compact('categories'));
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'harga' => 'required|numeric',
            'durasi' => 'required|numeric',
            'min_order' => 'required|numeric',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            Package::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
                'min_order' => $request->min_order,
            ]);
            session()->flash('success', 'Package add successfully');
            return redirect()->route('packages.add');
        }

    }

    public function edit($id): View
    {
        $package = Package::find($id);
        $categories = Category::all();
        return view('/content/package/edit', compact('package', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'harga' => 'required', 'numeric',
            'durasi' => 'required', 'numeric',
            'min_order' => 'required', 'numeric',
        ]);

        $package = Package::find($id);

        $package->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'harga' => $request->harga,
            'durasi' => $request->durasi,
            'min_order' => $request->min_order,
        ]);

        return response()->json(['success' => 'Package updated successfully']);
    }

    public function destroy($id)
    {
        Package::find($id)->delete();

        return redirect()->route('packages.index');
    }
}
