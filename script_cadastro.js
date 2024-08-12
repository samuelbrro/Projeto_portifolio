document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');

    registerForm.addEventListener('submit', function(event) {
        let valid = true;

        // Limpa mensagens de erro
        document.getElementById('usernameError').innerText = '';
        document.getElementById('emailError').innerText = '';
        document.getElementById('passwordError').innerText = '';
        document.getElementById('confirmPasswordError').innerText = '';

        // Valida usuário
        const username = document.getElementById('username').value;
        if (username.length < 3) {
            valid = false;
            document.getElementById('usernameError').innerText = 'Usuário deve ter pelo menos 3 caracteres';
        }

        // Valida email
        const email = document.getElementById('email').value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            valid = false;
            document.getElementById('emailError').innerText = 'Email inválido';
        }

        // Valida senha
        const password = document.getElementById('password').value;
        if (password.length < 6) {
            valid = false;
            document.getElementById('passwordError').innerText = 'Senha deve ter pelo menos 6 caracteres';
        }

        // Valida confirmação de senha
        const confirmPassword = document.getElementById('confirm_password').value;
        if (password !== confirmPassword) {
            valid = false;
            document.getElementById('confirmPasswordError').innerText = 'As senhas não coincidem';
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
