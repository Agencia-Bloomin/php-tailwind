import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Registrar o plugin ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

/**
 * Sistema de Animações GSAP
 * Configurações e animações reutilizáveis
 */
class AnimationSystem {
    constructor() {
        this.defaults = {
            duration: 0.8,
            ease: 'power2.out',
            stagger: 0.1,
            y: 50,
            opacity: 0
        };
        
        this.init();
    }

    init() {
        // Verificar se o usuário prefere movimento reduzido
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            this.disableAnimations();
            return;
        }

        // Configurar ScrollTrigger
        ScrollTrigger.config({
            ignoreMobileResize: true,
            autoRefreshEvents: 'visibilitychange,DOMContentLoaded,load'
        });

        // Definir estados iniciais para todos os elementos animados
        this.setInitialStates();

        // Inicializar animações
        this.initFadeInUp();
        this.initFadeInLeft();
        this.initFadeInRight();
        this.initScaleIn();
        this.initStaggeredChildren();
        this.initParallax();
        this.initCounterAnimation();
    }

    /**
     * Desabilita animações para usuários que preferem movimento reduzido
     */
    disableAnimations() {
        // Definir todos os elementos animados como visíveis
        gsap.set('[data-animate], [data-animate-child]', {
            opacity: 1,
            x: 0,
            y: 0,
            scale: 1,
            clearProps: 'all'
        });
    }

    /**
     * Define estados iniciais para todos os elementos animados
     */
    setInitialStates() {
        // Estados iniciais para fade-in-up
        gsap.set('[data-animate="fade-in-up"]', {
            y: this.defaults.y,
            opacity: this.defaults.opacity
        });

        // Estados iniciais para fade-in-left
        gsap.set('[data-animate="fade-in-left"]', {
            x: -this.defaults.y,
            opacity: this.defaults.opacity
        });

        // Estados iniciais para fade-in-right
        gsap.set('[data-animate="fade-in-right"]', {
            x: this.defaults.y,
            opacity: this.defaults.opacity
        });

        // Estados iniciais para scale-in
        gsap.set('[data-animate="scale-in"]', {
            scale: 0.8,
            opacity: this.defaults.opacity
        });

        // Estados iniciais para elementos staggered
        gsap.set('[data-animate-child]', {
            y: 30,
            opacity: 0
        });

        // Estados iniciais para parallax
        gsap.set('[data-animate="parallax"]', {
            yPercent: 0
        });
    }

    /**
     * Animação Fade In Up - Elementos aparecem de baixo para cima
     */
    initFadeInUp() {
        gsap.utils.toArray('[data-animate="fade-in-up"]').forEach(element => {
            gsap.fromTo(element, 
                {
                    y: this.defaults.y,
                    opacity: this.defaults.opacity
                },
                {
                    y: 0,
                    opacity: 1,
                    duration: this.defaults.duration,
                    ease: this.defaults.ease,
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        end: 'bottom 15%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });
    }

    /**
     * Animação Fade In Left - Elementos aparecem da esquerda
     */
    initFadeInLeft() {
        gsap.utils.toArray('[data-animate="fade-in-left"]').forEach(element => {
            gsap.fromTo(element,
                {
                    x: -this.defaults.y,
                    opacity: this.defaults.opacity
                },
                {
                    x: 0,
                    opacity: 1,
                    duration: this.defaults.duration,
                    ease: this.defaults.ease,
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        end: 'bottom 15%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });
    }

    /**
     * Animação Fade In Right - Elementos aparecem da direita
     */
    initFadeInRight() {
        gsap.utils.toArray('[data-animate="fade-in-right"]').forEach(element => {
            gsap.fromTo(element,
                {
                    x: this.defaults.y,
                    opacity: this.defaults.opacity
                },
                {
                    x: 0,
                    opacity: 1,
                    duration: this.defaults.duration,
                    ease: this.defaults.ease,
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        end: 'bottom 15%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });
    }

    /**
     * Animação Scale In - Elementos aparecem com escala
     */
    initScaleIn() {
        gsap.utils.toArray('[data-animate="scale-in"]').forEach(element => {
            gsap.fromTo(element,
                {
                    scale: 0.8,
                    opacity: this.defaults.opacity
                },
                {
                    scale: 1,
                    opacity: 1,
                    duration: this.defaults.duration,
                    ease: this.defaults.ease,
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        end: 'bottom 15%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });
    }

    /**
     * Animação Staggered Children - Anima filhos com delay
     */
    initStaggeredChildren() {
        gsap.utils.toArray('[data-animate="stagger-children"]').forEach(container => {
            const children = container.querySelectorAll('[data-animate-child]');
            
            gsap.fromTo(children,
                {
                    y: 30,
                    opacity: 0
                },
                {
                    y: 0,
                    opacity: 1,
                    duration: this.defaults.duration,
                    ease: this.defaults.ease,
                    stagger: this.defaults.stagger,
                    scrollTrigger: {
                        trigger: container,
                        start: 'top 85%',
                        end: 'bottom 15%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });
    }

    /**
     * Efeito Parallax
     */
    initParallax() {
        gsap.utils.toArray('[data-animate="parallax"]').forEach(element => {
            gsap.to(element, {
                yPercent: -20,
                ease: 'none',
                scrollTrigger: {
                    trigger: element,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: true
                }
            });
        });
    }

    /**
     * Animação de Contador
     */
    initCounterAnimation() {
        gsap.utils.toArray('[data-animate="counter"]').forEach(element => {
            const target = parseInt(element.getAttribute('data-target') || '0');
            const duration = parseFloat(element.getAttribute('data-duration') || '2');
            
            ScrollTrigger.create({
                trigger: element,
                start: 'top 80%',
                onEnter: () => {
                    gsap.to(element, {
                        innerHTML: target,
                        duration: duration,
                        ease: 'power2.out',
                        snap: { innerHTML: 1 },
                        onUpdate: function() {
                            element.innerHTML = Math.ceil(element.innerHTML);
                        }
                    });
                }
            });
        });
    }

    /**
     * Animação customizada
     */
    customAnimation(selector, animation, options = {}) {
        const elements = gsap.utils.toArray(selector);
        const config = { ...this.defaults, ...options };
        
        elements.forEach(element => {
            gsap.fromTo(element, animation.from, {
                ...animation.to,
                duration: config.duration,
                ease: config.ease,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    end: 'bottom 15%',
                    toggleActions: 'play none none reverse',
                    ...config.scrollTrigger
                }
            });
        });
    }

    /**
     * Animação de entrada da página
     */
    pageEnter() {
        const tl = gsap.timeline();
        
        tl.fromTo('body', 
            { opacity: 0 },
            { opacity: 1, duration: 0.3 }
        );
        
        return tl;
    }

    /**
     * Animação de loading
     */
    loadingAnimation() {
        return gsap.to('.loading', {
            opacity: 0,
            duration: 0.5,
            onComplete: () => {
                document.querySelector('.loading')?.remove();
            }
        });
    }
}

// Exportar instância global
const animations = new AnimationSystem();

// Expor para uso global
window.animations = animations;

export default animations; 