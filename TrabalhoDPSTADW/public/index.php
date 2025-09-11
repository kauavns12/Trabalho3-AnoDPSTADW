
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Acesso - Dark Mode</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/estilo_index.css">
    
</head>

<body>
    <button class="theme-switcher" onclick="toggleTheme()" aria-label="Alternar tema">
        <i class="fas fa-moon"></i>
    </button>
    
    <div class="login-container">
        <div class="login-header">
            <h1>Acesso ao Sistema</h1>
        </div>
        
        <form class="login-form" action="../controle/verificarLogin.php" method="post">
            <div class="logo">
                <i class="fas fa-lock"></i>
            </div>
            
            <div class="form-group">
                <label for="gmail"><i class="fas fa-envelope"></i> E-mail:</label>
                <input type="email" id="gmail" name="gmail" required placeholder="seu.email@exemplo.com">
                <span class="input-icon"><i class="fas fa-envelope"></i></span>
            </div>
            
            <div class="form-group">
                <label for="senha"><i class="fas fa-key"></i> Senha:</label>
                <div class="password-container">
                    <input type="password" id="senha" name="senha" required placeholder="Sua senha secreta">
                    <button type="button" class="toggle-password" onclick="togglePassword()" aria-label="Mostrar senha">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Acessar
            </button>
            
            <div class="links">
                <a href="formUsuario.html"><i class="fas fa-user-plus"></i> Primeiro acesso</a>
            </div>
        </form>
    </div>

    <script>
        // Função para mostrar/ocultar senha
        function togglePassword() {
            const passwordInput = document.getElementById('senha');
            const toggleIcon = document.querySelector('.toggle-password i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
                toggleIcon.setAttribute('aria-label', 'Ocultar senha');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
                toggleIcon.setAttribute('aria-label', 'Mostrar senha');
            }
        }
        
        // Efeito de foco nos inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });
            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('focused');
            });
        });
        
        // Melhoria de acessibilidade para inputs
        inputs.forEach(input => {
            input.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    e.target.nextElementSibling?.focus();
                }
            });
        });
    </script>
</body>
</html>