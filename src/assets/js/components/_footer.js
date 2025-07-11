// Footer Component JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const socialLinks = document.querySelectorAll('footer a[href="#"]');
    socialLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            alert('Link de rede social em construção. Em breve disponível!');
        });
    });
}); 