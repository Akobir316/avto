<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('title', 'id')->all();
        $categories = array_chunk($categories,10, true);
        return view('front.categories', compact('categories'));
    }

    public function show($id) {
        $category = Category::where('id', $id)->firstOrFail();
        $products = $category->products()->orderBy('id','desc')->paginate(6);
        return view('front.category', compact('products', 'category'));
    }
}
