<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AutoCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $auto_categories = AutoCategory::pluck('title', 'id')->all();
        return view('admin.products.create', compact('categories', 'auto_categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'title'=>'required',
            'category_id'=>'required|integer',
            'qty'=>'required',
            'img' => 'nullable|image'
        ]);
        $data = $request->all();
        $data['img'] = Product::uploadImage($request);
        $product = Product::create($data);
        $product->auto_categories()->sync($request->auto_categories);
        return redirect()->route('products.index')->with('success', 'Yangi tovar qo`shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $auto_categories = AutoCategory::pluck('title', 'id')->all();
        return view('admin.products.edit', compact('product', 'categories', 'auto_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'category_id'=>'required|integer',
            'qty'=>'required',
            'img' => 'nullable|image'
        ]);
        $product = Product::find($id);
        $data = $request->all();
        if ($file = Product::uploadImage($request, $product->img)) {
            $data['img'] = $file;
        }
        $product->update($data);
        $product->auto_categories()->sync($request->auto_categories);
        return redirect()->route('products.index')->with('success', 'O`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->auto_categories()->sync([]);
        Storage::delete($product->img);
        $product->delete();
        return redirect()->route('products.index')->with('success','Tovar o`chirildi');
    }
}
