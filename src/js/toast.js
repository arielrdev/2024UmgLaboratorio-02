document.addEventListener('DOMContentLoaded', function() {
    // Función para mostrar el toast
    function showToast(message) {
        const toast = document.getElementById('toast');
        toast.textContent = message;
        toast.classList.add('show');
        
        // Ocultar el toast después de 3 segundos
        setTimeout(function() {
            toast.classList.remove('show');
        }, 3000);
    }

    // Mostrar el toast si hay un mensaje en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');
    
    if (message) {
        showToast(message);
    }
});
