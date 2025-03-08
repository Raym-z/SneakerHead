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
        $products_best = Product::where('is_bestseller', true)->take(10)->get(); // Fetch bestseller products
        $heroImages = [
            "https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cabf66a40ec.jpeg",
            "https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cabf82cf9d6.jpeg",
            "https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cabfa6221a0.jpeg"
        ];

        return view('home', compact('products_best', 'heroImages'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $products = Product::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'LIKE', "%$query%");
        })->paginate(20);
        
        return view('search-results', compact('products', 'query'));
    }
    
}
