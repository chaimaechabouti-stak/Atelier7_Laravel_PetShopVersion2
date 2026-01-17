// Application principale
document.addEventListener('DOMContentLoaded', function() {
    // Initialisation des tooltips Bootstrap
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Gestion des filtres
    const filterForms = document.querySelectorAll('.filter-form');
    filterForms.forEach(form => {
        form.addEventListener('change', function() {
            this.submit();
        });
    });
    
    // Recherche en temps réel (optionnel)
    const searchInput = document.querySelector('input[name="q"]');
    if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                if (this.value.length > 2 || this.value.length === 0) {
                    this.form.submit();
                }
            }, 500);
        });
    }
    
    // Galerie d'images produit
    const galleryImages = document.querySelectorAll('.product-gallery img');
    galleryImages.forEach(img => {
        img.addEventListener('click', function() {
            const mainImage = document.getElementById('mainImage');
            if (mainImage) {
                mainImage.src = this.src;
            }
        });
    });
});