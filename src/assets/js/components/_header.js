// Header Component JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    // Toggle do menu mobile
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');

            if (!mobileMenu.classList.contains('hidden')) {
                function outsideClickListener(event) {
                    if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                        document.removeEventListener('click', outsideClickListener);
                    }
                }

                setTimeout(() => {
                    document.addEventListener('click', outsideClickListener);
                }, 0);
            }
        });
    }

    // Toggle dos dropdowns mobile
    const dropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const dropdown = this.nextElementSibling;
            const icon = this.querySelector('.iconify');

            if (dropdown && icon) {
                dropdown.classList.toggle('hidden');
                icon.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
            }
        });
    });
});
