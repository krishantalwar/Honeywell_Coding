<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;

class CartController extends Controller
{
    public function checkout(Request $request)
    {
        $products = $request->products;
        $quantity = $request->quantity;

        if (!empty($products) && !empty($quantity)) {


            $orderid = Orders::create([
                'user_id' => auth()->user()->id,
            ]);

            $products = Products::whereIn('id', $products)->get();

            foreach ($products as $product) {
                $total = $quantity[$product->id] * $product->price;
                $Cart = Cart::create([
                    'orders_id' => $orderid->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'name' => $product->name,
                    'quantity' => $quantity[$product->id],
                    'subtotal' => $quantity[$product->id] * $product->price,
                ]);
            }

            $orderid->update(['total' => $total]);

            foreach ($products as $product) {
                Products::where('id', $product->id)->decrement('quantity', $quantity[$product->id]);
            }
        }
        session()->flash('success', 'add  Successfully !');
        return view('users/cart');
    }
}
