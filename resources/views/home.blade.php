@extends('layouts.app')

@section('title', 'Accueil - PetShopPro')

@section('content')
<!-- Hero Section -->
<!--<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Nourrissez l'amour avec <span class="text-primary">PetShopPro</span></h1>
                <p class="lead mb-4">Des aliments premium pour vos compagnons à quatre pattes. Qualité, sécurité et bien-être garantis.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4">
                    <i class="fas fa-shopping-bag me-2"></i>Voir nos produits
                </a>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1541364983171-a8ba01e95cfc?w=800&h=600&fit=crop" 
                     class="img-fluid rounded shadow" alt="Animaux heureux">
            </div>
        </div>
    </div>
</section>-->

<!-- Catégories -->
<section class="categories-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Nos Catégories</h2>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-md-4 col-lg-2">
                <a href="{{ route('categories.show', $category->slug) }}" class="text-decoration-none">
                    <div class="category-card text-center p-3 bg-white rounded shadow-sm">
                        <div class="category-icon mb-3" style="background-color: {{ $category->color }}20; color: {{ $category->color }};">
                            <i class="{{ $category->icon }} fa-2x"></i>
                        </div>
                        <h5 class="mb-1">{{ $category->name }}</h5>
                        <small class="text-muted">{{ $category->products_count }} produits</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Produits en vedette -->
<section class="featured-products py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Produits en Vedette</h2>
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Voir tout</a>
        </div>
        
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-md-6 col-lg-3">
                @include('products.partials.card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Nouveautés -->

@endsection