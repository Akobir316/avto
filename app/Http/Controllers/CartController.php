<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart');
        if($cart)
        {
            return view('front.cart', compact('cart'));
        }

        return view('front.cart');
    }

    public function saveOrder(Request $request)
    {

        $data = [
            'user_id'=>auth()->user()->id,
            'note'=>$request->note
        ];

       $order = Order::create($data);
       self::saveProductOreder($order->id);
       return redirect()->back()->with('success', 'Sotildi');

    }

   public static function saveProductOreder($id)
   {
       $cart = session('cart');
        foreach ($cart as $product_id => $product)
        {
            $data=[];
            $data=[
                'order_id'=>$id,
                'product_id'=>$product_id,
                'qty'=>$product['qty'],
                'title'=>$product['name'],
                'price'=>$product['price']
            ];
            $productQty = Product::find($product_id);
            $productQty->qty = $productQty->qty - $product['qty'];
            if($productQty->qty<0){
                $productQty->qty = 0;
            }
            $productQty->update();
            OrderProduct::create($data);
        }
        session()->forget('cart');
        session()->forget('cartSum');
   }

    public function delete($id){

      $cart = session('cart');
        /*if($cart[$id]['qty']>1){
            $price = $cart[$id]['price']/$cart[$id]['qty'];
            $cart[$id]['qty']-=1;
            $cart[$id]['price']=$cart[$id]['qty']*$price;
            session()->put('cart', $cart);
            $cartSum = session('cartSum');
            $cartSum = $cartSum - $price;
            session()->put('cartSum');
            return redirect()->back();
        }*/
        session()->put('cartSum', (session('cartSum')-$cart[$id]['price']));
        unset($cart[$id]);
        session()->put('cart', $cart);
        if(empty(session('cart'))){
            session()->forget('cartSum');
        }
        return redirect()->back();
    }
}
