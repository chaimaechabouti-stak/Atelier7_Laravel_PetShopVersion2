<div class="product-card">
    <div class="product-badge {{ $product['animal_type'] == 'Chien' ? 'badge-dog' : ($product['animal_type'] == 'Chat' ? 'badge-cat' : 'badge-other') }}">
        {{ $product['animal_type'] }}
    </div>
    
    <div class="product-image">
        <img src="{{ $product['image_url'] ?: 'https://via.placeholder.com/300x200?text=Produit' }}" 
             alt="{{ $product['name'] }}" 
             class="img-fluid">
        <div class="product-overlay">
            <button class="btn-quick-view" data-product-id="{{ $product['id'] }}">
                <i class="fas fa-eye"></i> Voir détails
            </button>
        </div>
    </div>
    
    <div class="product-info">
        <div class="product-category">
            <span class="category-badge">{{ $product['category'] }}</span>
            <span class="product-brand">{{ $product['brand'] }}</span>
        </div>
        
        <h3 class="product-title">{{ $product['name'] }}</h3>
        
        <p class="product-description">{{ Str::limit($product['description'], 80) }}</p>
        
       
        
        <div class="product-footer">
            <div class="product-price">
                
            </div>
            
            <div class="product-actions">
                <button class="btn-add-cart" data-product-id="{{ $product['id'] }}">
                    <i class="fas fa-cart-plus"></i> Ajouter
                </button>
            </div>
        </div>
        
        <!--<div class="stock-status {{ $product['stock'] > 10 ? 'in-stock' : ($product['stock'] > 0 ? 'low-stock' : 'out-stock') }}">
            @if($product['stock'] > 10)
                <i class="fas fa-check-circle"></i> En stock ({{ $product['stock'] }})
            @elseif($product['stock'] > 0)
                <i class="fas fa-exclamation-circle"></i> Stock faible ({{ $product['stock'] }})
            @else
                <i class="fas fa-times-circle"></i> Rupture de stock
            @endif
        </div>-->
    </div>
</div>