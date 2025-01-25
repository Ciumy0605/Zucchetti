

// CAPTCHA
function generateCaptcha() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let captchaText = '';
    for (let i = 0; i < 6; i++) {
        captchaText += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    document.getElementById('captchaText').textContent = captchaText;
}

// Genera un nuovo CAPTCHA quando la pagina viene caricata
window.onload = function() {
    generateCaptcha();
}

// Verifica la risposta del CAPTCHA
document.getElementById('loginForm').onsubmit = function(e) {
    e.preventDefault();
    const captchaInput = document.getElementById('captchaInput').value;
    const captchaText = document.getElementById('captchaText').textContent;

    if (captchaInput === captchaText) {
        alert('Accesso riuscito!');
        // Aggiungi il codice per effettuare l'accesso qui
    } else {
        alert('CAPTCHA errato! Riprova.');
        generateCaptcha(); // Rigenera il CAPTCHA
    }
}