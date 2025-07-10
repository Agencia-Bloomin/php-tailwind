import '../css/style.css';
import "@iconify/iconify";

/* Component Scripts */
import './components/_header.js';
import './components/_footer.js';
import './components/_faq.js';
import './components/_hero.js';
import './components/_about.js';
import './components/_detailedServices.js';
import './components/_privacy-popup.js';
import './components/_scroll-to-top.js';
import './components/_banner-carousel.js';

document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('[data-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const menuIcons = document.querySelectorAll('[data-menu-icon]');
    
    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function() {
            const isOpen = mobileMenu.style.display === 'block';
            mobileMenu.style.display = isOpen ? 'none' : 'block';
            
            menuIcons.forEach((icon, index) => {
                icon.style.display = (index === 0 && !isOpen) || (index === 1 && isOpen) ? 'none' : 'block';
            });
        });
        
        document.addEventListener('click', function(event) {
            if (!menuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.style.display = 'none';
                menuIcons[0].style.display = 'block';
                menuIcons[1].style.display = 'none';
            }
        });
        
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.style.display = 'none';
                menuIcons[0].style.display = 'block';
                menuIcons[1].style.display = 'none';
            });
        });
    }
});

export default {};