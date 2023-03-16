<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request, $id) {
        $product = Product::where('id', $id)->first();

        return view('product', compact('product'));
    }
}
