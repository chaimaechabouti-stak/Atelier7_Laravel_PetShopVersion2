@extends('layouts.app')

@section('title', 'Accueil - Alimentation Premium pour Animaux')

@section('content')
<!-- Hero Section 
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Nourrissez l'amour avec la meilleure qualité</h1>
                <p class="hero-subtitle">
                    Des aliments premium spécialement formulés pour la santé et le bien-être de vos animaux de compagnie
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('products.index') }}" class="btn-primary">
                        <i class="fas fa-shopping-basket me-2"></i>
                        Découvrir nos produits
                    </a>
                    <a href="{{ route('about') }}" class="btn-secondary">
                        <i class="fas fa-play-circle me-2"></i>
                        Notre histoire
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Produits</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">15K+</span>
                        <span class="stat-label">Clients satisfaits</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">98%</span>
                        <span class="stat-label">Satisfaction</span>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="image-container">
                    <img src="https://images.unsplash.com/photo-1541364983171-a8ba01e95cfc?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Animaux heureux" class="hero-img">
                    <div class="image-badge badge-primary">
                        <i class="fas fa-star"></i>
                        <span>Certifié Qualité Premium</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->

<!-- Catégories Section -->
<section class="categories-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Nos Catégories d'Animaux</h2>
            <p class="section-subtitle">Découvrez notre sélection par type d'animal</p>
        </div>
        
        <div class="row g-4">
            @php
                $categories = App\Models\Product::getCategories();
            @endphp
            
            @foreach($categories as $key => $category)
                <div class="col-md-4 col-lg-2">
                    <a href="{{ route('products.category', $key) }}" class="category-card">
                        <div class="category-icon" style="background-color: {{ $category['color'] }}20; border-color: {{ $category['color'] }};">
                            <i class="{{ $category['icon'] }}" style="color: {{ $category['color'] }};"></i>
                        </div>
                        <h5 class="category-title">{{ $category['name'] }}</h5>
                        <p class="category-count">{{ count(App\Models\Product::getProductsByCategory($key)) }} produits</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Produits en Vedette -->
<section class="featured-products py-5 bg-light">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title">Produits en Vedette</h2>
                <p class="section-subtitle">Nos best-sellers du moment</p>
            </div>
            <a href="{{ route('products.index') }}" class="btn-view-all">
                Voir tous les produits <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="row g-4">
            @php
                $featuredProducts = array_slice(App\Models\Product::getAllProducts(), 0, 4);
            @endphp
            
            @foreach($featuredProducts as $product)
                <div class="col-md-6 col-lg-3">
                    @include('components.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pourquoi Nous Choisir 
<section class="why-us py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Pourquoi Choisir PetShopPro ?</h2>
            <p class="section-subtitle">Notre engagement pour vos animaux</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon bg-primary">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h5>Ingrédients Naturels</h5>
                    <p>Des recettes sans colorants artificiels ni conservateurs chimiques</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon bg-success">
                        <i class="fas fa-award"></i>
                    </div>
                    <h5>Qualité Certifiée</h5>
                    <p>Tous nos produits respectent les normes européennes de qualité</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon bg-warning">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h5>Livraison Rapide</h5>
                    <p>Livraison en 24-48h partout en France, offerte dès 49€</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon bg-info">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>Support Expert</h5>
                    <p>Notre équipe de vétérinaires est là pour vous conseiller</p>
                </div>
            </div>
        </div>
    </div>
</section>-->

<!-- Témoignages 
<section class="testimonials py-5 bg-primary text-white">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Ce que disent nos clients</h2>
            <p class="section-subtitle">La satisfaction de vos animaux, notre priorité</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Mon chat Luna adore ses nouvelles croquettes ! Son poil est plus brillant et elle a retrouvé son énergie."
                    </p>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sophie Martin">
                        <div>
                            <h6>Sophie Martin</h6>
                            <small>Propriétaire de Luna (chat)</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-text">
                        "Excellent service client et produits de qualité pour mon golden retriever. Je recommande !"
                    </p>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Thomas Dubois">
                        <div>
                            <h6>Thomas Dubois</h6>
                            <small>Propriétaire de Max (chien)</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Mes lapins adorent le foin et les granulés. La livraison est toujours rapide et soignée."
                    </p>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/67.jpg" alt="Emma Laurent">
                        <div>
                            <h6>Emma Laurent</h6>
                            <small>Propriétaire de Caramel & Chocolat (lapins)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
@endsection