<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Construire la requête de base
            $query = Product::query()->with('category');
            
            // Appliquer le filtre actif si disponible
            if (method_exists(Product::class, 'scopeActive')) {
                $query->active();
            } else {
                // Fallback si la scope n'existe pas
                $query->where('is_active', true);
            }
            
            // Filtrage par catégorie
            if ($request->has('category') && $request->category) {
                $query->whereHas('category', function ($q) use ($request) {
                    $q->where('slug', $request->category);
                });
            }
            
            // Filtrage par animal
            if ($request->has('animal') && $request->animal) {
                $query->where('animal_type', $request->animal);
            }
            
            // Filtrage par prix
            if ($request->has('min_price') && $request->min_price) {
                $query->where('price', '>=', $request->min_price);
            }
            
            if ($request->has('max_price') && $request->max_price) {
                $query->where('price', '<=', $request->max_price);
            }
            
            // Recherche
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Tri
            $sort = $request->get('sort', 'created_at');
            $order = $request->get('order', 'desc');
            
            $validSorts = ['price', 'rating', 'created_at', 'name'];
            $validOrders = ['asc', 'desc'];
            
            if (in_array($sort, $validSorts) && in_array($order, $validOrders)) {
                $query->orderBy($sort, $order);
            } else {
                $query->orderBy('created_at', 'desc');
            }
            
            // Pagination
            $products = $query->paginate(12);
            
            // Récupérer les catégories
            $categories = Category::query()->get();
            
            // Types d'animaux uniques
            $animalTypes = Product::select('animal_type')
                ->distinct()
                ->pluck('animal_type')
                ->filter()
                ->values();
            
            return view('products.index', compact('products', 'categories', 'animalTypes'));
            
        } catch (\Exception $e) {
            // Mode débug - retourner les erreurs
            if (config('app.debug')) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ], 500);
            }
            
            // En production, retourner une vue d'erreur
            return view('errors.500', ['message' => 'Une erreur est survenue lors du chargement des produits.']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Non implémenté pour la V2
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Non implémenté pour la V2
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        try {
            // Trouver le produit par slug
            $product = Product::where('slug', $slug)
                ->with('category')
                ->first();
            
            if (!$product) {
                abort(404);
            }
            
            // Produits similaires
            $relatedProducts = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->limit(4)
                ->get();
            
            return view('products.show', compact('product', 'relatedProducts'));
            
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ], 500);
            }
            
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Non implémenté pour la V2
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Non implémenté pour la V2
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Non implémenté pour la V2
        abort(404);
    }
    
    /**
     * Display products by category.
     */
    public function byCategory($categorySlug, Request $request)
    {
        // Rediriger vers l'index avec le filtre de catégorie
        return $this->index($request->merge(['category' => $categorySlug]));
    }
}