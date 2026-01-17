<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                       href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i> Accueil
                    </a>
                </li>
                
                <!-- Categories Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('categories.*') ? 'active' : '' }}" 
                       href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-list me-1"></i> Catégories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(App\Models\Category::active()->ordered()->get() as $category)
                        <li>
                            <a class="dropdown-item" href="{{ route('categories.show', $category->slug) }}">
                                <i class="{{ $category->icon }} me-2" style="color: {{ $category->color }}"></i>
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">
                                <i class="fas fa-th me-2"></i> Toutes les catégories
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" 
                       href="{{ route('products.index') }}">
                        <i class="fas fa-store me-1"></i> Tous les produits
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" 
                       href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-1"></i> À propos
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" 
                       href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-1"></i> Contact
                    </a>
                </li>
            </ul>
            
            <!-- Search Form -->
            <form action="{{ route('search') }}" method="GET" class="d-flex">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Rechercher un produit..." 
                           value="{{ request('q') }}">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>