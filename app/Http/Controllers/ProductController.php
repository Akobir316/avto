<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request, $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        if ($product)
        {
            $request->validate([
               'price'=>'required',
               'qty'=>"required|numeric|max:{$product->qty}",
            ]);
            $cart = session()->get('cart');
            if(!$cart){
                $cart = [
                    $id=>[
                        'name'=>$product->title,
                        'qty'=>$request->qty,
                        'price'=>$request->price,
                        'img'=>$product->img
                    ]
                ];
                session()->put('cartSum', $request->price);
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Tovar qo`shildi');
            }
            if(isset($cart[$id])){
                $cart[$id]['qty']+=$request->qty;
                $cart[$id]['price']+=$request->price;
                session()->put('cartSum', (session('cartSum')+$request->price));
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Tovar qo`shildi');
            }
        }
        $cart[$id] = [
            'name'=>$product->title,
            'qty'=>$request->qty,
            'price'=>$request->price,
            'img'=>$product->img
        ];
        session()->put('cartSum', (session('cartSum')+$request->price));
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Tovar qo`shildi');
    }
}
