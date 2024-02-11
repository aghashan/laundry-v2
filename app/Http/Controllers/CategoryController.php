<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return response()->json(['success' => 'Category add successfully']);

    }

    public function edit($id): View
    {
        $category = Category::find($id);
        return view('/content/category/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = Category::find($id);

        $category->update([
            'name' => $request->name,
        ]);

        return response()->json(['success' => 'Category updated successfully']);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return response()->json(['success' => 'Category deleted successfully']);

    }
}
