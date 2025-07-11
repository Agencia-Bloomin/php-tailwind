// Privacy Popup Component JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('privacy-popup');
    const acceptButton = document.getElementById('accept-privacy');
    
    if (popup && acceptButton) {
        if (!localStorage.getItem('privacyAccepted')) {
            popup.style.display = 'block';
            setTimeout(() => {
                popup.classList.remove('opacity-0');
                popup.classList.add('opacity-100');
            }, 100);
        }
        
        acceptButton.addEventListener('click', function() {
            localStorage.setItem('privacyAccepted', 'true');
            popup.classList.add('opacity-0');
            setTimeout(() => {
                popup.style.display = 'none';
            }, 300);
        });
    }
}); 