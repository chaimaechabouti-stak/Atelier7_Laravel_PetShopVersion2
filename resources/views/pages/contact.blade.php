@extends('layouts.app')

@section('title', 'Contact - Ecom_V1')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="text-center mb-4">
            <h1 class="text-primary">Contactez PetShop Randonnée</h1>
            <p class="lead">Nous sommes à votre écoute pour toutes vos questions</p>
        </div>

        <!-- Message d'accueil -->
        <div class="card shadow-sm mb-4">
            <div class="card-body text-center">
                <i class="fas fa-comments fa-3x text-primary mb-3"></i>
                <h4 class="card-title">N'hésitez pas à nous contacter</h4>
                <p class="card-text">
                    Que vous ayez une question sur nos produits futurs, besoin d'un conseil 
                    pour votre équipement, ou simplement envie d'échanger sur la randonnée, 
                    notre équipe est là pour vous répondre dans les plus brefs délais.
                </p>
                <p class="card-text">
                    <strong>Notre promesse :</strong> Une réponse sous 24 heures ouvrées.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Coordonnées -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-primary mb-4">
                            <i class="fas fa-address-card me-2"></i>Nos Coordonnées
                        </h3>
                        
                        <div class="mb-3">
                            <h5 class="text-success">
                                <i class="fas fa-map-marker-alt me-2"></i>Adresse
                            </h5>
                            <address class="ps-4">
                               PetShop Randonnée<br>
                                123 Rue des animeaux<br>
                                90000 Tanger, Maroc
                            </address>
                        </div>

                        <div class="mb-3">
                            <h5 class="text-primary">
                                <i class="fas fa-phone me-2"></i>Téléphone
                            </h5>
                            <p class="ps-4 mb-0">
                                <a href="tel:+33123456789" class="text-decoration-none">
                                    05 23 45 67 89
                                </a>
                            </p>
                            <small class="ps-4 text-muted">Lundi au vendredi, 9h-18h</small>
                        </div>

                        <div class="mb-3">
                            <h5 class="text-warning">
                                <i class="fas fa-envelope me-2"></i>Email
                            </h5>
                            <p class="ps-4 mb-0">
                                <a href="mailto:contact@ecomv1-rando.com" class="text-decoration-none">
                                    contact@petshop.com
                                </a>
                            </p>
                            <small class="ps-4 text-muted">Pour les questions générales</small>
                        </div>

                        <div>
                            <h5 class="text-info">
                                <i class="fas fa-clock me-2"></i>Horaires
                            </h5>
                            <ul class="ps-4">
                                <li>Lundi - Vendredi : 9h00 - 18h00</li>
                                <li>Samedi : 10h00 - 16h00</li>
                                <li>Dimanche : Fermé</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire de contact -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-primary mb-4">
                            <i class="fas fa-paper-plane me-2"></i>Formulaire de Contact
                        </h3>
                        
                        <form id="contactForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="name" required 
                                       placeholder="Votre nom et prénom">
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse email *</label>
                                <input type="email" class="form-control" id="email" required 
                                       placeholder="votre@email.com">
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Sujet *</label>
                                <select class="form-select" id="subject" required>
                                    <option value="" selected disabled>Choisissez un sujet</option>
                                    <option value="question">Question sur les produits</option>
                                    <option value="advice">Conseil d'équipement</option>
                                    <option value="partnership">Partenariat</option>
                                    <option value="other">Autre demande</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" rows="5" required 
                                          placeholder="Votre message..."></textarea>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Je souhaite m'abonner à la newsletter Ecom_V1
                                </label>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                </button>
                            </div>
                        </form>

                        <!-- Note après soumission -->
                        <div id="formSuccess" class="alert alert-success mt-3 d-none">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>Message envoyé !</strong> Nous vous répondrons dans les plus brefs délais.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h3 class="card-title text-primary mb-3">
                    <i class="fas fa-question-circle me-2"></i>Questions Fréquentes
                </h3>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapseOne">
                                Quand la boutique sera-t-elle opérationnelle ?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                Notre boutique en ligne sera lancée dans les prochaines semaines. 
                                Vous pouvez déjà nous contacter pour des pré-commandes ou des conseils.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Proposez-vous la livraison internationale ?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Oui, nous livrerons dans toute l'Europe dès notre lancement, 
                                avec des frais de port adaptés.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript pour le formulaire -->
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Simulation d'envoi
    document.getElementById('formSuccess').classList.remove('d-none');
    this.reset();
    
    setTimeout(() => {
        document.getElementById('formSuccess').classList.add('d-none');
    }, 5000);
});
</script>
@endsection