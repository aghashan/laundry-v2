<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('/content/category/index', compact('categories'));
    }

    public function create(): View
    {
        return view('/content/category/add');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id): RedirectResponse
    {
        Category::find($id)->delete();

        return redirect()->route('categories.index');
    }
}
