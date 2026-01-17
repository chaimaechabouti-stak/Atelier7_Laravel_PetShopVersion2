<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Produits en vedette
        $featuredProducts = Product::active()
            ->featured()
            ->inStock()
            ->orderBy('rating', 'desc')
            ->limit(8)
            ->get();

        // Nouvelles arrivées
        $newProducts = Product::active()
            ->inStock()
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        // Catégories actives
        $categories = Category::active()
            ->ordered()
            ->get();

        return view('home', compact('featuredProducts', 'newProducts', 'categories'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}