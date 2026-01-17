@extends('layouts.app')

@section('title', $product->name . ' - PetShopPro')

@section('styles')
<style>
.product-gallery img {
    cursor: pointer;
    transition: transform 0.3s ease;
}

.product-gallery img:hover {
    transform: scale(1.05);
}
</style>
@endsection

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produits</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.show', $product->category->slug) }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($product->name, 30) }}</li>
        </ol>
    </nav>
    
    <!-- Product Details -->
    <div class="row">
        <!-- Images -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-0">
                    <!-- Main Image -->
                    <div class="text-center p-4 border-bottom">
                        <img src="{{ $product->main_image }}" 
                             id="mainImage"
                             class="img-fluid rounded" 
                             style="max-height: 400px; object-fit: contain;"
                             alt="{{ $product->name }}">
                    </div>
                    
                    <!-- Thumbnails -->
                    @if(count($product->additional_images) > 0)
                    <div class="row g-2 p-3 product-gallery">
                        <div class="col-3">
                            <img src="{{ $product->main_image }}" 
                                 class="img-fluid rounded border"
                                 onclick="changeMainImage(this.src)"
                                 style="height: 80px; object-fit: cover; cursor: pointer;"
                                 alt="Miniature">
                        </div>
                        @foreach($product->additional_images as $image)
                        <div class="col-3">
                            <img src="{{ $image }}" 
                                 class="img-fluid rounded border"
                                 onclick="changeMainImage(this.src)"
                                 style="height: 80px; object-fit: cover; cursor: pointer;"
                                 alt="Miniature">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Product Info -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <!-- Category -->
                    <div class="mb-3">
                        <a href="{{ route('categories.show', $product->category->slug) }}" 
                           class="text-decoration-none">
                            <span class="badge" style="background-color: {{ $product->category->color }}20; color: {{ $product->category->color }};">
                                <i class="{{ $product->category->icon }} me-1"></i>
                                {{ $product->category->name }}
                            </span>
                        </a>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="h2 mb-3">{{ $product->name }}</h1>
                    
                    <!-- Rating -->
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product->rating))
                                    <i class="fas fa-star text-warning"></i>
                                @elseif($i == ceil($product->rating) && $product->rating != floor($product->rating))
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                @else
                                    <i class="far fa-star text-warning"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-muted">({{ $product->review_count }} avis)</span>
                    </div>
                    
                    <!-- Price -->
                    <div class="mb-4">
                        <div class="d-flex align-items-center">
                            <span class="h2 text-primary me-3">{{ $product->formatted_price }}</span>
                            @if($product->compare_price)
                            <del class="text-muted h5">{{ $product->formatted_compare_price }}</del>
                            @if($product->discount_percentage)
                            <span class="badge bg-success ms-2">-{{ $product->discount_percentage }}%</span>
                            @endif
                            @endif
                        </div>
                    </div>
                    
                    <!-- Stock Status -->
                    <div class="alert {{ $product->in_stock ? 'alert-success' : 'alert-danger' }} mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas {{ $product->in_stock ? 'fa-check-circle' : 'fa-times-circle' }} me-2"></i>
                            <div>
                                <strong>{{ $product->in_stock ? 'En stock' : 'Rupture de stock' }}</strong>
                                @if($product->in_stock)
                                <div class="small">Livraison sous 24-48h</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Details -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong><i class="fas fa-weight me-2 text-muted"></i>Poids:</strong>
                                <span class="ms-2">{{ $product->weight }}</span>
                            </div>
                            <div class="mb-3">
                                <strong><i class="fas fa-tag me-2 text-muted"></i>Marque:</strong>
                                <span class="ms-2">{{ $product->brand ?? 'Non spécifié' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong><i class="fas fa-paw me-2 text-muted"></i>Animal:</strong>
                                <span class="ms-2">{{ $product->animal_type }}</span>
                            </div>
                            <div class="mb-3">
                                <strong><i class="fas fa-barcode me-2 text-muted"></i>Référence:</strong>
                                <span class="ms-2">{{ $product->sku ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-4">
                        <h5 class="mb-3">Description</h5>
                        <p class="text-muted">{{ $product->description }}</p>
                    </div>
                    
                    <!-- Features -->
                    @if($product->features && count($product->features) > 0)
                    <div class="mb-4">
                        <h5 class="mb-3">Caractéristiques</h5>
                        <ul class="list-unstyled">
                            @foreach($product->features as $feature)
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="mt-5">
        <h3 class="mb-4">Produits similaires</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $product)
            <div class="col-md-6 col-lg-3">
                @include('products.partials.card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
function changeMainImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>
@endsection