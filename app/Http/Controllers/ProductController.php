<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display the home page with bestseller products.
     */
    public function index()
    {
        $products = Product::where('is_bestseller', true)->take(10)->get(); // Fetch 10 bestseller products
        return view('home', compact('products'));
    }
}
