// Banner Carousel Component
class BannerCarousel {
    constructor() {
        this.swiper = null;
        this.init();
    }

    init() {
        // Aguarda o DOM estar pronto
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.setupSwiper());
        } else {
            this.setupSwiper();
        }
    }

    setupSwiper() {
        const swiperElement = document.querySelector('.banner-swiper');
        if (!swiperElement) return;

        this.swiper = new Swiper('.banner-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 1000,
            navigation: {
                nextEl: '.banner-nav-next',
                prevEl: '.banner-nav-prev',
            },
            pagination: {
                el: '.banner-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                }
            }
        });

        // Adicionar eventos de teclado
        this.setupKeyboardEvents();

        // Adicionar eventos de touch para mobile
        this.setupTouchEvents();
    }

    setupKeyboardEvents() {
        document.addEventListener('keydown', (e) => {
            if (!this.swiper) return;

            switch (e.key) {
                case 'ArrowLeft':
                    this.swiper.slidePrev();
                    break;
                case 'ArrowRight':
                    this.swiper.slideNext();
                    break;
                case ' ':
                    e.preventDefault();
                    this.swiper.autoplay.stop();
                    setTimeout(() => this.swiper.autoplay.start(), 1000);
                    break;
            }
        });
    }

    setupTouchEvents() {
        let touchStartX = 0;
        let touchEndX = 0;

        const handleTouchStart = (e) => {
            touchStartX = e.changedTouches[0].screenX;
        };

        const handleTouchEnd = (e) => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
        };

        const carouselElement = document.querySelector('.banner-carousel');
        if (carouselElement) {
            carouselElement.addEventListener('touchstart', handleTouchStart, { passive: true });
            carouselElement.addEventListener('touchend', handleTouchEnd, { passive: true });
        }
    }

    handleSwipe() {
        if (!this.swiper) return;

        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                this.swiper.slideNext();
            } else {
                this.swiper.slidePrev();
            }
        }
    }

    // Métodos públicos para controle externo
    next() {
        if (this.swiper) this.swiper.slideNext();
    }

    prev() {
        if (this.swiper) this.swiper.slidePrev();
    }

    goToSlide(index) {
        if (this.swiper) this.swiper.slideTo(index);
    }

    startAutoplay() {
        if (this.swiper) this.swiper.autoplay.start();
    }

    stopAutoplay() {
        if (this.swiper) this.swiper.autoplay.stop();
    }
}

// Inicializar quando o script for carregado
let bannerCarousel;

// Verificar se o Swiper está disponível
if (typeof Swiper !== 'undefined') {
    bannerCarousel = new BannerCarousel();
} else {
    // Aguardar o Swiper ser carregado
    window.addEventListener('load', () => {
        if (typeof Swiper !== 'undefined') {
            bannerCarousel = new BannerCarousel();
        }
    });
}

// Exportar para uso global
window.BannerCarousel = BannerCarousel;
window.bannerCarousel = bannerCarousel;
