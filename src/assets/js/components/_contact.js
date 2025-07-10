// Contact Form Toggle & Submission

document.addEventListener('DOMContentLoaded', function () {
    const toggleContainer = document.getElementById('contact-toggle');
    const toggleBtns = toggleContainer ? toggleContainer.querySelectorAll('.toggle-btn') : [];
    const submitBtn = document.getElementById('contact-submit');
    const form = document.getElementById('contact-form');
    const feedback = document.getElementById('contact-feedback');
    const whatsappNumber = toggleContainer ? toggleContainer.getAttribute('data-whatsapp') : '';
    let method = 'email';

    // Depuração: logar elementos
    console.log('toggleBtns:', toggleBtns);
    console.log('telefone input:', form ? form.querySelector('input[name="telefone"]') : null);

    // Toggle logic
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            toggleBtns.forEach(b => {
                b.classList.remove('active', 'bg-primary', 'text-white');
                b.classList.add('text-primary');
                b.setAttribute('aria-pressed', 'false');
            });
            this.classList.add('active', 'bg-primary', 'text-white');
            this.classList.remove('text-primary');
            this.setAttribute('aria-pressed', 'true');
            method = this.getAttribute('data-method');
            if (method === 'whatsapp') {
                submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:whatsapp"></span> Enviar por WhatsApp';
            } else {
                submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:email-fast-outline"></span> Enviar por E-mail';
            }
        });
    });

    // Telefone mask (corrigida)
    const telInput = form ? form.querySelector('input[name="telefone"]') : null;
    if (telInput) {
        telInput.addEventListener('input', function (e) {
            let v = e.target.value.replace(/\D/g, '');
            if (v.length > 11) v = v.slice(0, 11);
            if (v.length > 2) {
                v = '(' + v.slice(0, 2) + ') ' + v.slice(2);
            }
            if (v.length > 10) {
                v = v.slice(0, 10) + '-' + v.slice(10);
            }
            e.target.value = v;
        });
    }

    // Form submission logic
    if (form) {
        form.addEventListener('submit', function (e) {
            if (method === 'whatsapp') {
                e.preventDefault();
                if (!whatsappNumber) return;
                // Monta mensagem para WhatsApp
                const nome = form.name.value.trim();
                const email = form.email.value.trim();
                const telefone = form.telefone.value.trim();
                const mensagem = form.message.value.trim();
                let text = `Olá! Gostaria de solicitar um orçamento.%0A`;
                text += `*Nome:* ${nome}%0A`;
                text += `*E-mail:* ${email}%0A`;
                text += `*Telefone:* ${telefone}%0A`;
                text += `*Mensagem:* ${mensagem}`;
                const url = `https://wa.me/${whatsappNumber}?text=${text}`;
                window.open(url, '_blank');
                feedback.classList.remove('hidden');
                feedback.classList.add('text-success');
                feedback.textContent = 'Redirecionando para o WhatsApp...';
                setTimeout(() => { feedback.classList.add('hidden'); }, 3000);
            } else {
                // Envio normal por e-mail (backend PHP)
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-60');
                feedback.classList.remove('hidden', 'text-error');
                feedback.classList.add('text-primary');
                feedback.textContent = 'Enviando...';
            }
        });
    }
}); 