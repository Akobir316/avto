<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            's'=>'required'
        ]);
        $s = $request->s;
        $products = Product::where('title','LIKE',"%{$s}%")->with('category')->paginate(6);
        return view('front.search', compact('s', 'products'));
    }
}
