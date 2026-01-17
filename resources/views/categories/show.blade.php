@extends('layouts.app')

@section('title', $category->name . ' - PetShopPro')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    
    
    <!-- En-tête de la catégorie -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex align-items-center mb-3">
                <div class="category-icon-lg me-3" style="background-color: {{ $category->color }}20; color: {{ $category->color }};">
                    <i class="{{ $category->icon }} fa-2x"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">{{ $category->name }}</h1>
                    <p class="text-muted mb-0">{{ $category->description }}</p>
                    <small class="text-muted">{{ $products->total() }} produits disponibles</small>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filtres -->
    <!--<div class="row mb-4">
        <div class="col-md-8">
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('categories.show', $category->slug) }}" 
                   class="btn btn-sm btn-outline-primary {{ !request('sort') ? 'active' : '' }}">
                    Tous
                </a>
                <a href="{{ route('categories.show', [$category->slug, 'sort' => 'price', 'order' => 'asc']) }}" 
                   class="btn btn-sm btn-outline-primary {{ request('sort') == 'price' && request('order') == 'asc' ? 'active' : '' }}">
                    Prix croissant
                </a>
                <a href="{{ route('categories.show', [$category->slug, 'sort' => 'price', 'order' => 'desc']) }}" 
                   class="btn btn-sm btn-outline-primary {{ request('sort') == 'price' && request('order') == 'desc' ? 'active' : '' }}">
                    Prix décroissant
                </a>
                <a href="{{ route('categories.show', [$category->slug, 'sort' => 'rating', 'order' => 'desc']) }}" 
                   class="btn btn-sm btn-outline-primary {{ request('sort') == 'rating' ? 'active' : '' }}">
                    Meilleures notes
                </a>
                <a href="{{ route('categories.show', [$category->slug, 'featured' => 1]) }}" 
                   class="btn btn-sm btn-outline-primary {{ request('featured') ? 'active' : '' }}">
                    En vedette
                </a>
            </div>
        </div>
        
        <div class="col-md-4">
            <form class="d-flex" method="GET" action="{{ route('categories.show', $category->slug) }}">
                <input type="text" name="search" class="form-control form-control-sm me-2" 
                       placeholder="Rechercher dans cette catégorie..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>-->
    
    <!-- Liste des produits -->
    @if($products->count() > 0)
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3">
                @include('products.partials.card', ['product' => $product])
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-5">
            {{ $products->withQueryString()->links() }}
        </div>
    @else
        <!-- Aucun produit -->
        <div class="text-center py-5">
            <div class="empty-state-icon mb-3">
                <i class="fas fa-box-open fa-4x text-muted"></i>
            </div>
            <h3 class="h4">Aucun produit dans cette catégorie</h3>
            <p class="text-muted mb-4">Aucun produit n'est disponible dans la catégorie "{{ $category->name }}" pour le moment.</p>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>Voir toutes les catégories
            </a>
        </div>
    @endif
    
    <!-- Description détaillée -->
    @if($category->description)
    <div class="mt-5 pt-5 border-top">
        <h3 class="h4 mb-3">À propos de la catégorie {{ $category->name }}</h3>
        <div class="row">
            <div class="col-lg-8">
                <p class="text-muted">{{ $category->description }}</p>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
.category-icon-lg {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-state-icon {
    opacity: 0.5;
}

.btn-outline-primary.active {
    background-color: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}
</style>
@endsection