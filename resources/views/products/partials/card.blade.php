<div class="product-card card h-100 border-0 shadow-sm">
    <!-- Badge En vedette -->
    @if($product->is_featured)
    <div class="position-absolute top-0 start-0 m-2">
        <span class="badge bg-danger">En vedette</span>
    </div>
    @endif
    
    <!-- Badge Promotion -->
    @if($product->compare_price && $product->compare_price > $product->price)
        @php
            $discountPercentage = round((($product->compare_price - $product->price) / $product->compare_price) * 100);
        @endphp
        <div class="position-absolute top-0 end-0 m-2">
            <span class="badge bg-success">-{{ $discountPercentage }}%</span>
        </div>
    @endif
    
    <!-- Image du produit -->
    <div class="product-image position-relative overflow-hidden" style="height: 200px;">
        <img src="{{ $product->image_url }}" 
             class="card-img-top h-100 object-fit-cover"
             alt="{{ $product->name }}"
             onerror="this.src='https://via.placeholder.com/300x200?text=Produit'">
        <div class="product-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25 d-flex align-items-center justify-content-center opacity-0">
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">
                <i class="fas fa-eye me-2"></i>Voir le produit
            </a>
        </div>
    </div>
    
    <!-- Corps de la carte -->
    <div class="card-body d-flex flex-column">
        <!-- Catégorie -->
        <div class="mb-2">
            @if($product->category)
                <span class="badge" style="background-color: {{ $product->category->color }}20; color: {{ $product->category->color }};">
                    {{ $product->category->name }}
                </span>
            @else
                <span class="badge bg-secondary">
                    Non catégorisé
                </span>
            @endif
        </div>
        
        <!-- Titre -->
        <h5 class="card-title mb-2">
            <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">
                {{ Str::limit($product->name, 50) }}
            </a>
        </h5>
        
        <!-- Description -->
        <p class="card-text text-muted small flex-grow-1">
            {{ Str::limit($product->description, 80) }}
        </p>
        
        <!-- Note -->
       
        
        <!-- Prix et Stock -->
        <div class="d-flex justify-content-between align-items-center mt-auto">
            <!-- Prix -->
            <div>
                <span class="h5 text-primary mb-0">
                    {{ number_format($product->price, 2, ',', ' ') }} DH
                </span>
                
            </div>
            
            <!-- Stock -->
            <div>
                @if($product->stock > 0)
                <span class="badge bg-success">
                    <i class="fas fa-check-circle me-1"></i>En stock
                </span>
                @else
                <span class="badge bg-danger">
                    <i class="fas fa-times-circle me-1"></i>Rupture
                </span>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Pied de carte -->
    <div class="card-footer bg-white border-top-0 pt-0">
        <div class="d-grid">
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-primary">
                <i class="fas fa-info-circle me-2"></i>Détails
            </a>
        </div>
    </div>
</div>

<!-- Styles spécifiques pour la carte -->
<style>
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.product-image img {
    transition: transform 0.5s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.object-fit-cover {
    object-fit: cover;
}
</style>