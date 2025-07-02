// FAQ Component JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const faqContainer = document.getElementById('faq-container');

    if (faqContainer) {
        faqContainer.addEventListener('click', function(event) {
            const faqQuestion = event.target.closest('.faq-question');
            if (!faqQuestion) return;

            const faqItem = faqQuestion.closest('.faq-item');
            const faqAnswer = faqItem.querySelector('.faq-answer');
            const faqToggle = faqQuestion.querySelector('.faq-toggle');

            // Fecha outros itens abertos
            document.querySelectorAll('#faq-container .faq-item').forEach(function(item) {
                const answer = item.querySelector('.faq-answer');
                const toggle = item.querySelector('.faq-toggle');
                if (item !== faqItem) {
                    answer.classList.add('hidden');
                    toggle.classList.remove('rotate-180');
                }
            });

            // Toggle do item atual
            const isOpen = !faqAnswer.classList.contains('hidden');
            if (isOpen) {
                faqAnswer.classList.add('hidden');
                faqToggle.classList.remove('rotate-180');
            } else {
                faqAnswer.classList.remove('hidden');
                faqToggle.classList.add('rotate-180');
            }
        });
    }
});
