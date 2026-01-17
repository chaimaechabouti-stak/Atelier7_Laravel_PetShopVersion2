<nav class="navbar-main">
    <div class="container">
        <div class="navbar-content">
            <!-- Menu principal -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i> Accueil
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-shopping-bag me-1"></i> Produits
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('products.index') }}">Tous les produits</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('products.category', 'chiens') }}"><i class="fas fa-dog me-2"></i>Pour Chiens</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.category', 'chats') }}"><i class="fas fa-cat me-2"></i>Pour Chats</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.category', 'rongeurs') }}"><i class="fas fa-paw me-2"></i>Pour Rongeurs</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.category', 'oiseaux') }}"><i class="fas fa-dove me-2"></i>Pour Oiseaux</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.category', 'poissons') }}"><i class="fas fa-fish me-2"></i>Pour Poissons</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-1"></i> À propos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-1"></i> Contact
                    </a>
                </li>
            </ul>
            
            <!-- Recherche et Panier 
            <div class="nav-actions">
                <div class="search-box">
                    <input type="text" placeholder="Rechercher un produit..." class="search-input">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                </div>
                <div class="cart-icon">
                    <a href="#" class="cart-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </div>-->
        </div>
    </div>
</nav>