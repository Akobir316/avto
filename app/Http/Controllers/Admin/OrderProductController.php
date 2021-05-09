<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function edit($id)
    {
        $product = OrderProduct::find($id);
        return view('admin.orders.orderProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'qty'=>'required',
           'price'=>'required'
        ]);

        $product = OrderProduct::find($id);
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->update();
        return redirect()->route('orders.edit', ['order'=>$product->order_id])->with('success', 'O`zgartirildi');
    }
    public function destroy($id)
    {
        OrderProduct::destroy($id);
        return redirect()->back()->with('success', 'O`chirildi');
    }
}
