/* PAGINA DIPENDENTI */

document.addEventListener("DOMContentLoaded", function() {
    let toggleButton = document.getElementById("toggleSidebar");
    toggleButton.style.right = "-10px";
    toggleButton.innerHTML = "&#9664;";

    toggleButton.addEventListener("click", function() {
        let sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("open");
        if (sidebar.classList.contains("open")) {
            this.style.right = "330px";
            this.innerHTML = "&#9654;";
        } else {
            this.style.right = "-10px";
            this.innerHTML = "&#9664;";
        }
    });
});
    function submitProfileForm() {
        document.getElementById('redirectForm').submit();
    }
document.getElementById('burger').addEventListener('click', function() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active');
});


/*  PROFILO */

document.getElementById("editBtn").addEventListener("click", function() {
    document.getElementById("profileCard").classList.add("hidden");
    document.getElementById("editCard").classList.remove("hidden");
});

document.getElementById("cancelBtn").addEventListener("click", function() {
    document.getElementById("profileCard").classList.remove("hidden");
    document.getElementById("editCard").classList.add("hidden");
});

document.getElementById("newPassword").addEventListener("input", function() {
    let password = this.value;

    const reqLength = document.getElementById("req-length");
    const reqUppercase = document.getElementById("req-uppercase");
    const reqLowercase = document.getElementById("req-lowercase");
    const reqNumber = document.getElementById("req-number");
    const reqSpecial = document.getElementById("req-special");

    
    // Nascondi i requisiti soddisfatti
    reqLength.classList.toggle("hidden", password.length >= 8);
    reqUppercase.classList.toggle("hidden", /[A-Z]/.test(password));
    reqLowercase.classList.toggle("hidden", /[a-z]/.test(password));
    reqNumber.classList.toggle("hidden", /\d/.test(password));
    reqSpecial.classList.toggle("hidden", /[!@#$%^&*]/.test(password));
});

document.addEventListener("DOMContentLoaded", function () {
    const oldPasswordInput = document.getElementById("oldPassword");
    const storedPassword = document.getElementById("passwordDisplay").value;
    const passwordErrata = document.getElementById("password_errata");
    const passwordCorretta = document.getElementById("password_corretta");

    oldPasswordInput.addEventListener("input", function () {
        if (oldPasswordInput.value === storedPassword) {
            passwordCorretta.style.display = "block";
            passwordErrata.style.display = "none";
            setTimeout(() => {
                passwordCorretta.style.display = "none";
            }, 1000);
        } else {
            passwordErrata.style.display = "block";
            passwordCorretta.style.display = "none";
        }
    });

    document.getElementById("confirmPassword").addEventListener("input", function() {
        let newPassword = document.getElementById("newPassword").value;
        let confirmPassword = this.value;
        document.getElementById("confirmPasswordError").innerText = newPassword === confirmPassword ? "" : "Le password non coincidono";
    });

    // Funzione per bloccare l'invio del form se i requisiti non sono soddisfatti
    document.getElementById("editCard").parentElement.addEventListener("submit", function(event) {
        let password = document.getElementById("newPassword").value;
        let confirmPassword = document.getElementById("confirmPassword").value;
        let isValid = true;

        // Controlla tutti i requisiti della password
        if (password.length < 8) isValid = false;
        if (!/[A-Z]/.test(password)) isValid = false;
        if (!/[a-z]/.test(password)) isValid = false;
        if (!/\d/.test(password)) isValid = false;
        if (!/[!@#$%^&*]/.test(password)) isValid = false;
        if (password !== confirmPassword) isValid = false;

        if (!isValid) {
            event.preventDefault(); // Blocca l'invio del form
            alert("Correggi gli errori nella password prima di inviare il form.");
        }
    });
});


function togglePassword(fieldId, icon) {
    let field = document.getElementById(fieldId);
    if (field.type === "password") {
        field.type = "text";
        icon.innerHTML = "&#128064;";
    } else {
        field.type = "password";
        icon.innerHTML = "&#128065;";
    }
}

/* PLANIMETRIA  */


document.querySelectorAll('.asset').forEach(asset => {
    asset.addEventListener('click', function() {
        const assetName = this.getAttribute('data-asset');
        document.getElementById('selected-asset').innerText = assetName;
        document.querySelector('.booking-form').style.display = 'block';
        document.querySelector('.overlay').style.display = 'block';
    });
});

document.querySelector('.overlay').addEventListener('click', function() {
    document.querySelector('.booking-form').style.display = 'none';
    this.style.display = 'none';
});

document.getElementById('confirm-booking').addEventListener('click', function() {
    const date = document.getElementById('booking-date').value;
    const time = document.getElementById('booking-time').value;
    if (date && time) {
        alert(`Prenotazione confermata per il ${date} alle ${time}`);
        document.querySelector('.booking-form').style.display = 'none';
        document.querySelector('.overlay').style.display = 'none';
    } else {
        alert('Seleziona una data e un orario validi.');
    }
});


/* document.getElementById('toggle-btn').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar2');
    sidebar.classList.toggle('open');
    if (sidebar.classList.contains('open')) {
        this.innerHTML = '&#9654;'; // Change to right arrow
    } else {
        this.innerHTML = '&#9664;'; // Change to left arrow
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector(".sidebar2");
    const toggleButton = document.getElementById("toggleSidebar");

    toggleButton.addEventListener("click", function() {
        sidebar.classList.toggle("open");

        // Cambia la posizione e l'icona del pulsante in base allo stato della sidebar
        if (sidebar.classList.contains("open")) {
            toggleButton.style.right = "300px";
            toggleButton.innerHTML = "◀";
        } else {
            toggleButton.style.right = "0";
            toggleButton.innerHTML = "▶";
        }
    });
}); */



