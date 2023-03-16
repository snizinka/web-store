<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $products = Product::where('amount', ">", 0)->get();

        return view('welcome', compact('products'));
    }
}
