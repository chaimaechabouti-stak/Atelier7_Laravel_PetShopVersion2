@extends('layouts.app')

@section('title', 'Tous nos produits - PetShopPro')

@section('content')

        
        <!-- Products Grid -->
        <div class="col-lg-9">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0">Nos Produits</h1>
                    <p class="text-muted mb-0">{{ $products->total() }} produits trouvés</p>
                </div>
                
                <!-- Sort -->
                
            </div>
            
            <!-- Products -->
            @if($products->count() > 0)
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                    @include('products.partials.card', ['product' => $product])
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-5">
                {{ $products->withQueryString()->links() }}
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4>Aucun produit trouvé</h4>
                <p class="text-muted">Aucun produit ne correspond à vos critères de recherche.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Réinitialiser les filtres</a>
            </div>
            @endif
        </div>
    </div>
</div>

@section('scripts')
<script>
function applyFilters() {
    const params = new URLSearchParams(window.location.search);
    
    // Récupérer les valeurs des filtres
    const minPrice = document.querySelector('[name="min_price"]').value;
    const maxPrice = document.querySelector('[name="max_price"]').value;
    
    // Mettre à jour les paramètres
    if (minPrice) params.set('min_price', minPrice);
    else params.delete('min_price');
    
    if (maxPrice) params.set('max_price', maxPrice);
    else params.delete('max_price');
    
    // Rediriger avec les nouveaux paramètres
    window.location.href = `${window.location.pathname}?${params.toString()}`;
}
</script>
@endsection
@endsection