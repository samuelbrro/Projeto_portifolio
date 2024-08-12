document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const usernameError = document.getElementById('usernameError');
    const passwordError = document.getElementById('passwordError');

    form.addEventListener('submit', function(event) {
        let valid = true;

        // Reset error messages
        usernameError.textContent = '';
        passwordError.textContent = '';

        // Validate username
        if (usernameInput.value.trim() === '') {
            usernameError.textContent = 'O usuário é obrigatório.';
            valid = false;
        }

        // Validate password
        if (passwordInput.value.trim() === '') {
            passwordError.textContent = 'A senha é obrigatória.';
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});
