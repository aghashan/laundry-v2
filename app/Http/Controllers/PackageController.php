<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    public function index(): View
    {
        $packages = Package::all();
        return view('/content/package/index', compact('packages'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('/content/package/add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'harga' => 'required', 'numeric',
            'durasi' => 'required', 'numeric',
            'min_order' => 'required', 'numeric',
        ]);

        Package::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'harga' => $request->harga,
            'durasi' => $request->durasi,
            'min_order' => $request->min_order,
        ]);

        return response()->json(['success' => 'Package add successfully']);
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

        return response()->json(['success' => 'Package deleted successfully']);
    }
}
