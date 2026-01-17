<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PetShopPro - @yield('title', 'Alimentation pour Animaux')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Notre CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- CSS Inline pour éviter les problèmes de chargement -->
    <style>
        /* Variables CSS de base */
        :root {
            --primary-color: #4A6FA5;
            --secondary-color: #FF7E5F;
            --accent-color: #6BBF59;
            --light-color: #F8F9FA;
            --dark-color: #2C3E50;
            --gray-light: #E9ECEF;
            --gray-medium: #6C757D;
            --success-color: #28A745;
            --warning-color: #FFC107;
            --danger-color: #DC3545;
            --info-color: #17A2B8;
        }
        
        /* Styles de base pour éviter le FOUC (Flash of Unstyled Content) */
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
            background-color: #fff;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        /* Header de base */
        .header-main {
            background: linear-gradient(135deg, var(--primary-color), #5D8CC8);
            color: white;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
    <!-- Header/Navbar -->
    @include('components.header')
    @include('components.navbar')

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Notre JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    
    <!-- Script inline pour éviter les problèmes de chargement -->
    <script>
        // Vérifier si le CSS est chargé
        document.addEventListener('DOMContentLoaded', function() {
            // Prévenir le FOUC
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.3s ease';
            
            // S'assurer que le CSS est chargé avant d'afficher
            setTimeout(function() {
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>
</body>
</html>