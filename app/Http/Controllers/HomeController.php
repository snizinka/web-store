<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $category = Category::where('name', "Apple iPhone")->first();

        return view('welcome', compact('category'));
    }
}
