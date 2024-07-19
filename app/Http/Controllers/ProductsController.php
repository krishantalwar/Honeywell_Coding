<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    //

    public function index()
    {
        return view('users/productList');
    }

    public function getProducts()
    {
        $products = Products::all();

        return response()->json($products);
    }

    public function create()
    {
        return view('admin/productAdd');
    }

    public function store(Request $request)
    {
        $product = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        session()->flash('success', 'add  Successfully !');
        return back();
    }
}
