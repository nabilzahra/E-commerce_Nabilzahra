<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('is_active', true)
            ->latest()
            ->take(12)
            ->get();
            
        $featuredProducts = Product::where('is_active', true)
            ->where('stock', '>', 0)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('front.home', compact('products', 'featuredProducts'));
    }

    public function show($id)
    {
        $product = Product::where('is_active', true)->findOrFail($id);
        $relatedProducts = Product::where('is_active', true)
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('front.product-detail', compact('product', 'relatedProducts'));
    }
}
