// About Component JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const companyImage = document.querySelector('img[alt="Template PHP Bloomin - Empresa de Soldagem a Laser"]');

    if (companyImage) {
        companyImage.addEventListener('error', function() {
            this.src = '/assets/images/placeholder-company.jpg';
            this.alt = 'Imagem não disponível';
        });
    }
}); 