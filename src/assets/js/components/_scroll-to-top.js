/**
 * Scroll to Top Component
 * Gerencia o botão de voltar ao topo com efeito de borda progressiva
 */
class ScrollToTop {
    constructor() {
        this.scrollToTopBtn = document.getElementById('scroll-to-top-btn');
        this.scrollToTopContainer = document.getElementById('scroll-to-top');
        this.progressCircle = document.getElementById('scroll-progress-circle');
        this.scrollThreshold = 300; // Pixels para mostrar o botão
        this.isVisible = false;
        this.circumference = 2 * Math.PI * 21; // r=21 do SVG
        this.init();
    }
    
    init() {
        if (!this.scrollToTopBtn || !this.scrollToTopContainer || !this.progressCircle) {
            console.warn('Scroll to Top: Elementos não encontrados');
            return;
        }
        this.progressCircle.setAttribute('stroke-dasharray', this.circumference);
        this.progressCircle.setAttribute('stroke-dashoffset', this.circumference);
        this.bindEvents();
        this.updateScrollProgress();
    }
    
    bindEvents() {
        window.addEventListener('scroll', () => {
            this.handleScroll();
        }, { passive: true });
        this.scrollToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            this.scrollToTop();
        });
        window.addEventListener('resize', () => {
            this.updateScrollProgress();
        }, { passive: true });
        this.scrollToTopBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.scrollToTop();
            }
        });
    }
    
    handleScroll() {
        const scrollY = window.scrollY;
        // Mostrar/ocultar botão
        if (scrollY > this.scrollThreshold && !this.isVisible) {
            this.show();
        } else if (scrollY <= this.scrollThreshold && this.isVisible) {
            this.hide();
        }
        this.updateScrollProgress();
    }
    
    updateScrollProgress() {
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;
        const maxScroll = documentHeight - windowHeight;
        const progress = maxScroll > 0 ? Math.min(scrollY / maxScroll, 1) : 0;
        // stroke-dashoffset: 132 (vazio) -> 0 (cheio)
        const offset = this.circumference * (1 - progress);
        this.progressCircle.setAttribute('stroke-dashoffset', offset);
    }
    
    show() {
        this.scrollToTopContainer.classList.add('visible');
        this.isVisible = true;
        this.scrollToTopContainer.style.transform = 'translateY(0) scale(1)';
    }
    hide() {
        this.scrollToTopContainer.classList.remove('visible');
        this.isVisible = false;
        this.scrollToTopContainer.style.transform = 'translateY(20px) scale(0.8)';
    }
    scrollToTop() {
        this.scrollToTopBtn.style.transform = 'scale(0.97)';
        setTimeout(() => {
            this.scrollToTopBtn.style.transform = '';
        }, 150);
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        setTimeout(() => {
            this.scrollToTopBtn.focus();
        }, 1000);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ScrollToTop();
});
window.ScrollToTop = ScrollToTop; 