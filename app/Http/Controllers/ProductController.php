<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request, $id) {
        $product = Product::where('id', $id)->first();

        $colors = Product::where('model', $product->model)->where('storage_gb', $product->storage_gb)->get();
        $storage_gb = Product::where('color', '=', $product->color)->where('model', $product->model)->get();

        return view('product', compact(['product', 'colors', 'storage_gb']));
    }
}
