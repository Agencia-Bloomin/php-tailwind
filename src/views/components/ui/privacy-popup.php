<div id="privacy-popup" class="fixed bottom-4 left-4 z-50 bg-white p-6 rounded-lg shadow-2xl border-2 border-primary/20 max-w-xs w-full opacity-0 transition-opacity duration-300 ease-in-out before:absolute before:inset-0 before:bg-primary/5 before:rounded-lg before:-z-10" style="display: none;">
    <h2 class="text-lg font-semibold mb-2 text-black relative">
        <span class="absolute -left-2 top-0 bottom-0 w-1 bg-primary rounded"></span>
        Política de Privacidade
    </h2>
    <p class="text-sm mb-4 text-black">Utilizamos cookies para melhorar sua experiência. Ao continuar navegando, você concorda com nossa política de privacidade. Para mais detalhes, <a href="/politica-de-privacidade" class="text-primary hover:underline">clique aqui</a>.</p>
    <button id="accept-privacy" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition-colors w-full">Aceitar</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('privacy-popup');
        const acceptButton = document.getElementById('accept-privacy');
        
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
    });
</script> 