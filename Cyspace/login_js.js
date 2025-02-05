// CAPTCHA
function generateCaptcha() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let captchaText = '';
    for (let i = 0; i < 6; i++) {
        captchaText += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    const captchaTextElement = document.getElementById('captchaText');
    captchaTextElement.textContent = captchaText;
    captchaTextElement.style.userSelect = 'none'; // Prevent text selection
    captchaTextElement.style.webkitUserSelect = 'none'; // Prevent text selection in Safari
    captchaTextElement.style.mozUserSelect = 'none'; // Prevent text selection in Firefox
    captchaTextElement.style.msUserSelect = 'none'; // Prevent text selection in IE/Edge
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
        this.submit();
    } else {
        alert('CAPTCHA errato! Riprova.');
        generateCaptcha(); // Rigenera il CAPTCHA
    }
}