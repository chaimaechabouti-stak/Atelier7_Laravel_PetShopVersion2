@extends('layouts.app')

@section('title', isset($currentCategory['name']) ? 'Produits pour ' . $currentCategory['name'] : 'Tous nos produits - Alimentation pour Animaux')

@section('content')
<!-- Header Produits -->
<section class="products-header py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <!--<nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produits</a></li>
                        @if(isset($currentCategory) && $currentCategory)
                            <li class="breadcrumb-item active">{{ $currentCategory['name'] }}</li>
                        @endif
                    </ol>
                </nav>-->
                
                <h1 class="page-title">
                    @if(isset($currentCategory) && $currentCategory)
                        <i class="{{ $currentCategory['icon'] }} me-3" style="color: {{ $currentCategory['color'] }};"></i>
                        Aliments pour {{ $currentCategory['name'] }}
                    @else
                        <i class="fas fa-store me-3"></i>
                        Tous nos produits
                    @endif
                </h1>
                
                <p class="page-subtitle">
                    @if(isset($currentCategory) && $currentCategory)
                        Découvrez notre sélection d'aliments premium spécialement formulés pour vos {{ strtolower($currentCategory['name']) }}
                    @else
                        Notre gamme complète d'aliments et accessoires pour tous vos animaux
                    @endif
                </p>
            </div>
            <div class="col-md-4 text-end">
                <div class="products-count">
                    <span class="count-number">{{ count($products) }}</span>
                    <span class="count-label">produits disponibles</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filtres et Catégories -->
<section class="products-filters py-4 bg-light">
    <div class="container">
        <div class="row g-3">
            <!-- Catégories -->
            <div class="col-md-8">
                <div class="filter-categories">
                    <a href="{{ route('products.index') }}" 
                       class="filter-category {{ !isset($currentCategory) || !$currentCategory ? 'active' : '' }}">
                        <i class="fas fa-store"></i>
                        <span>Tous</span>
                    </a>
                    
                    @foreach($categories as $key => $category)
                        <a href="{{ route('products.category', $key) }}" 
                           class="filter-category {{ isset($currentCategory) && $currentCategory && $currentCategory['name'] == $category['name'] ? 'active' : '' }}"
                           style="{{ isset($currentCategory) && $currentCategory && $currentCategory['name'] == $category['name'] ? 'border-color: ' . $category['color'] . '; color: ' . $category['color'] : '' }}">
                            <i class="{{ $category['icon'] }}"></i>
                            <span>{{ $category['name'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Filtres -->
           <!-- <div class="col-md-4">
                <div class="filter-actions">
                    <div class="dropdown">
                        <button class="btn-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-filter me-2"></i>Filtrer
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" data-sort="price-asc"><i class="fas fa-sort-amount-up me-2"></i>Prix croissant</a></li>
                            <li><a class="dropdown-item" href="#" data-sort="price-desc"><i class="fas fa-sort-amount-down me-2"></i>Prix décroissant</a></li>
                            <li><a class="dropdown-item" href="#" data-sort="rating"><i class="fas fa-star me-2"></i>Meilleures notes</a></li>
                            <li><a class="dropdown-item" href="#" data-sort="popular"><i class="fas fa-fire me-2"></i>Populaires</a></li>
                        </ul>
                    </div>
                    
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher..." class="search-input" id="productSearch">
                        <button class="search-btn" id="searchButton"><i class="fas fa-search"></i></button>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</section>

<!-- Liste des Produits -->
<section class="products-list py-5">
    <div class="container">
        @if(count($products) > 0)
            <div class="row g-4" id="productsContainer">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 product-item">
                        @include('components.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="pagination-wrapper mt-5">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @else
            <!-- Aucun produit -->
            <div class="no-products text-center py-5">
                <div class="no-products-icon">
                    <i class="fas fa-search fa-4x"></i>
                </div>
                <h3 class="mt-4">Aucun produit trouvé</h3>
                <p class="text-muted">Aucun produit n'est disponible dans cette catégorie pour le moment.</p>
                <a href="{{ route('products.index') }}" class="btn-primary mt-3">
                    <i class="fas fa-store me-2"></i>
                    Voir tous les produits
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Guide d'Achat -->
<section class="buying-guide py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Comment choisir ?</h2>
            <p class="section-subtitle">Nos conseils pour sélectionner le bon aliment</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="guide-step">
                    <div class="step-number">1</div>
                    <h5>Identifiez l'animal</h5>
                    <p>Choisissez la catégorie correspondant à votre animal : chien, chat, rongeur, etc.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="guide-step">
                    <div class="step-number">2</div>
                    <h5>Considérez l'âge</h5>
                    <p>Les besoins nutritionnels varient selon l'âge : junior, adulte ou senior.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="guide-step">
                    <div class="step-number">3</div>
                    <h5>Évaluez l'activité</h5>
                    <p>Un animal actif a besoin de plus d'énergie qu'un animal casanier.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script pour la recherche et tri -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Éléments DOM
    const searchInput = document.getElementById('productSearch');
    const searchButton = document.getElementById('searchButton');
    const productsContainer = document.getElementById('productsContainer');
    const productItems = document.querySelectorAll('.product-item');
    const sortItems = document.querySelectorAll('.dropdown-item[data-sort]');
    
    // Recherche en temps réel
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            if (productItems.length > 0) {
                productItems.forEach(item => {
                    const productText = item.textContent.toLowerCase();
                    if (productText.includes(searchTerm) || searchTerm === '') {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
        });
        
        searchButton.addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            
            if (productItems.length > 0) {
                productItems.forEach(item => {
                    const productText = item.textContent.toLowerCase();
                    if (productText.includes(searchTerm) || searchTerm === '') {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
        });
    }
    
    // Tri des produits
    if (sortItems.length > 0) {
        sortItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const sortType = this.dataset.sort;
                
                // Mettre à jour le texte du bouton dropdown
                const dropdownButton = document.querySelector('.btn-filter');
                if (dropdownButton) {
                    const icon = this.querySelector('i').cloneNode(true);
                    const text = this.textContent.trim();
                    dropdownButton.innerHTML = '';
                    dropdownButton.appendChild(icon);
                    dropdownButton.appendChild(document.createTextNode(' ' + text));
                }
                
                // Implémentation basique du tri côté client
                if (productItems.length > 0) {
                    const productsArray = Array.from(productItems);
                    
                    switch(sortType) {
                        case 'price-asc':
                            // Tri par prix croissant
                            productsArray.sort((a, b) => {
                                const priceA = parseFloat(a.querySelector('.price-main')?.textContent.replace(',', '.') || 0);
                                const priceB = parseFloat(b.querySelector('.price-main')?.textContent.replace(',', '.') || 0);
                                return priceA - priceB;
                            });
                            break;
                            
                        case 'price-desc':
                            // Tri par prix décroissant
                            productsArray.sort((a, b) => {
                                const priceA = parseFloat(a.querySelector('.price-main')?.textContent.replace(',', '.') || 0);
                                const priceB = parseFloat(b.querySelector('.price-main')?.textContent.replace(',', '.') || 0);
                                return priceB - priceA;
                            });
                            break;
                            
                        case 'rating':
                            // Tri par note
                            productsArray.sort((a, b) => {
                                const ratingA = parseFloat(a.querySelector('.rating-value')?.textContent || 0);
                                const ratingB = parseFloat(b.querySelector('.rating-value')?.textContent || 0);
                                return ratingB - ratingA;
                            });
                            break;
                    }
                    
                    // Réorganiser les produits dans le conteneur
                    if (productsContainer) {
                        productsContainer.innerHTML = '';
                        productsArray.forEach(product => {
                            productsContainer.appendChild(product);
                        });
                    }
                }
            });
        });
    }
});
</script>
@endsection