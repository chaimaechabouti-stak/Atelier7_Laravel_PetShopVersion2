<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages statiques
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Produits
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Catégories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Recherche
Route::get('/search', [ProductController::class, 'index'])->name('search');

// Dans routes/web.php, ajoutez :
Route::get('/products/category/{category:slug}', [ProductController::class, 'byCategory'])->name('products.category');