import '../css/style.css';
import "@iconify/iconify";
import Glide from '@glidejs/glide';

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.glide')) {
        new Glide('.glide', {
            type: 'carousel',
            perView: 3,
            gap: 32,
            autoplay: 5000,
            hoverpause: true,
            breakpoints: {
                1024: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            }
        }).mount();
    }

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