<footer class="footer-main">
    <div class="container">
        <div class="footer-content">
            <!-- Colonne 1 : Logo et description -->
            <div class="footer-col">
                <div class="footer-logo">
                    <i class="fas fa-paw footer-logo-icon"></i>
                    <h3>PetShop</h3>
                </div>
                <p class="footer-description">
                    Votre boutique en ligne d'alimentation premium pour animaux. 
                    Qualité, sécurité et bien-être animal garantis.
                </p>
                <div class="footer-social">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
            
            <!-- Colonne 2 : Liens rapides -->
            <div class="footer-col">
                <h4 class="footer-title">Nos Catégories</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('products.category', 'chiens') }}"><i class="fas fa-dog me-2"></i>Aliments Chiens</a></li>
                    <li><a href="{{ route('products.category', 'chats') }}"><i class="fas fa-cat me-2"></i>Aliments Chats</a></li>
                    <li><a href="{{ route('products.category', 'rongeurs') }}"><i class="fas fa-paw me-2"></i>Aliments Rongeurs</a></li>
                    <li><a href="{{ route('products.category', 'oiseaux') }}"><i class="fas fa-dove me-2"></i>Aliments Oiseaux</a></li>
                    <li><a href="{{ route('products.category', 'poissons') }}"><i class="fas fa-fish me-2"></i>Aliments Poissons</a></li>
                </ul>
            </div>
            
            <!-- Colonne 3 : Informations -->
            <div class="footer-col">
                <h4 class="footer-title">Informations</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('about') }}">À propos de nous</a></li>
                    <li><a href="{{ route('contact') }}">Contactez-nous</a></li>
                    <li><a href="#">Livraison & Retours</a></li>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>
            
            <!-- Colonne 4 : Contact -->
            <div class="footer-col">
                <h4 class="footer-title">Contactez-nous</h4>
                <div class="footer-contact">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Adresse</strong>
                            <p>123 Avenue des Animaux<br>90000 tanger, Maroc</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Téléphone</strong>
                            <p>05 23 45 67 89</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <p>contact@petshop.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Newsletter 
        <div class="footer-newsletter">
            <div class="newsletter-content">
                <h4>Abonnez-vous à notre newsletter</h4>
                <p>Recevez nos offres spéciales et conseils pour vos animaux</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Votre adresse email" required>
                    <button type="submit">S'abonner</button>
                </form>
            </div>
        </div>-->
        
        <!-- Copyright -->
        <div class="footer-bottom">
            <p>&copy; 2026 PetShop - Alimentation pour Animaux. Tous droits réservés.</p>
            <div class="payment-methods">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
                <i class="fab fa-cc-apple-pay"></i>
            </div>
        </div>
    </div>
</footer>