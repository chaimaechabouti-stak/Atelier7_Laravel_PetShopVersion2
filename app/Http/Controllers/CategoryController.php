<?php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::active()
            ->ordered()
            ->withCount(['products' => function ($query) {
                $query->where('is_active', true);
            }])
            ->get();
        
        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified category.
     */
    public function show($slug)
    {
        $category = Category::active()
            ->where('slug', $slug)
            ->firstOrFail();
        
        $products = Product::active()
            ->where('category_id', $category->id)
            ->orderBy('is_featured', 'desc')
            ->orderBy('rating', 'desc')
            ->paginate(12);
        
        return view('categories.show', compact('category', 'products'));
    }
}