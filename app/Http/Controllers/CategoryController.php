<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('/content/category/index',compact('categories'));
    }

    public function create()
    {
        return view('/content/category/add');
    }
}
