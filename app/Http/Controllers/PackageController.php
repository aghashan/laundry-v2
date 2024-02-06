<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
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

        return redirect()->route('packages.index');
    }

    public function destroy($id): RedirectResponse
    {
        Package::find($id)->delete();

        return redirect()->route('packages.index');
    }
}
