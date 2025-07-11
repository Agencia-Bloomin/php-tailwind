// Detailed Services Component JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.group');
    
    serviceCards.forEach(card => {
        const image = card.querySelector('img');
        
        if (image) {
            card.addEventListener('mouseenter', function() {
                image.style.transform = 'scale(1.05)';
            });
            
            card.addEventListener('mouseleave', function() {
                image.style.transform = 'scale(1)';
            });
        }
    });
}); 