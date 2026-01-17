@extends('layouts.app')

@section('title', 'À propos - Ecom_V1')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="text-center mb-4">
            <h1 class="text-primary">À Propos de Ecom_V1 Randonnée</h1>
            <p class="lead">Notre histoire, notre mission, nos valeurs</p>
        </div>

        <!-- Notre Histoire -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="card-title text-primary">
                    <i class="fas fa-history me-2"></i>Notre Histoire
                </h3>
                <p>
                    Fondée en 2024, Ecom_V1 Randonnée est née de la passion commune de ses fondateurs 
                    pour les grands espaces et les aventures en plein air. Constatant le manque de 
                    plateformes spécialisées proposant à la fois qualité et expertise dans le domaine 
                    de la randonnée, nous avons décidé de créer une boutique en ligne dédiée 
                    exclusivement aux amoureux de la nature.
                </p>
                <p>
                    Depuis nos débuts, nous nous engageons à sélectionner les meilleurs équipements, 
                    en collaborant avec des marques reconnues pour leur durabilité et leur innovation.
                </p>
            </div>
        </div>

        <!-- Notre Mission -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="card-title text-success">
                    <i class="fas fa-bullseye me-2"></i>Notre Mission
                </h3>
                <p>
                    <strong>Notre mission est double :</strong>
                </p>
                <ul>
                    <li>
                        <strong>Fournir des produits de randonnée de qualité supérieure</strong> 
                        qui allient confort, sécurité et durabilité, permettant à nos clients 
                        de profiter pleinement de leurs aventures en toute sérénité.
                    </li>
                    <li>
                        <strong>Créer une communauté de passionnés</strong> en partageant conseils, 
                        itinéraires et bonnes pratiques pour promouvoir un tourisme responsable 
                        et respectueux de l'environnement.
                    </li>
                </ul>
                <blockquote class="blockquote mt-3 p-3 bg-light border-start border-4 border-primary">
                    <p class="mb-0">
                        "Chez Ecom_V1 Randonnée, nous croyons que chaque pas en nature est une 
                        aventure qui mérite d'être vécue avec le meilleur équipement."
                    </p>
                    <footer class="blockquote-footer mt-2">L'équipe Ecom_V1</footer>
                </blockquote>
            </div>
        </div>

        <!-- Nos Valeurs -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-warning">
                    <i class="fas fa-heart me-2"></i>Nos Valeurs
                </h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="text-success">
                                <i class="fas fa-leaf me-1"></i> Durabilité
                            </h5>
                            <p class="mb-0 small">
                                Nous privilégions les produits écoconçus et les marques engagées 
                                dans une démarche environnementale responsable.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="text-primary">
                                <i class="fas fa-award me-1"></i> Qualité
                            </h5>
                            <p class="mb-0 small">
                                Chaque produit est testé et sélectionné pour sa fiabilité et sa 
                                longévité, garantissant une expérience utilisateur optimale.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="text-info">
                                <i class="fas fa-users me-1"></i> Expertise
                            </h5>
                            <p class="mb-0 small">
                                Notre équipe est composée de randonneurs expérimentés qui partagent 
                                leurs connaissances pour vous guider dans vos choix.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="text-danger">
                                <i class="fas fa-handshake me-1"></i> Service
                            </h5>
                            <p class="mb-0 small">
                                Nous offrons un accompagnement personnalisé avant, pendant et après 
                                votre achat pour assurer votre pleine satisfaction.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center mt-4">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-envelope me-2"></i>Contactez-nous
            </a>
        </div>
    </div>
</div>
@endsection