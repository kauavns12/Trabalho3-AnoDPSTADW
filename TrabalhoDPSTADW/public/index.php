<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRIV GAMES & WIKI - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            overflow: hidden;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            display: flex;
            width: 900px;
            height: 550px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(to bottom right, #ff0000, #cc0000);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            transform: rotate(30deg);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
            z-index: 1;
        }

        .logo h1 {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 10px;
        }

        .logo p {
            font-size: 18px;
            font-weight: 500;
            opacity: 0.9;
        }

        .pokeball {
            width: 120px;
            height: 120px;
            background: linear-gradient(to bottom, #ff0000 50%, white 50%);
            border-radius: 50%;
            border: 8px solid #333;
            position: relative;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            animation: float 3s ease-in-out infinite;
        }

        .pokeball::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 30px;
            height: 30px;
            background: #333;
            border-radius: 50%;
            border: 8px solid white;
            z-index: 2;
        }

        .pokeball::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: #ff0000;
            border-radius: 60px 60px 0 0;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        .login-right {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h2 {
            font-size: 32px;
            color: #cc0000;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .login-header p {
            color: #666;
            font-size: 16px;
        }

        .login-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: #f9f9f9;
        }

        .form-group input:focus {
            border-color: #cc0000;
            box-shadow: 0 0 0 3px rgba(204, 0, 0, 0.2);
            outline: none;
            background-color: white;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, #cc0000, #ff0000);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            box-shadow: 0 4px 10px rgba(204, 0, 0, 0.3);
        }

        .btn-login:hover {
            background: linear-gradient(to right, #ff0000, #cc0000);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(204, 0, 0, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .links a {
            color: #cc0000;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
            font-size: 14px;
        }

        .links a:hover {
            color: #ff3333;
            text-decoration: underline;
        }

        .user-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        .user-card {
            background: white;
            border-radius: 10px;
            padding: 12px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .user-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 8px;
            border: 2px solid #cc0000;
        }

        .user-card p {
            font-size: 12px;
            font-weight: 600;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 12px;
        }

        @media (max-width: 950px) {
            .login-container {
                width: 95%;
                height: auto;
                flex-direction: column;
            }
            
            .login-left, .login-right {
                padding: 30px;
            }
            
            .user-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <div class="logo">
                <h1>FRIV GAMES & WIKI</h1>
                <p>Junte-se à nossa comunidade de jogadores</p>
            </div>
            <div class="pokeball"></div>
            <p>Descubra novos jogos, faça amigos e divirta-se!</p>
        </div>
        
        <div class="login-right">
            <div class="login-header">
                <h2>LOGIN</h2>
                <p>Entre com suas credenciais</p>
            </div>
            
            <form class="login-form" action="../controle/verificarLogin.php" method="post">
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" id="email" name="email" required placeholder="seu.email@exemplo.com">
                </div>
                
                <div class="form-group">
                    <label for="senha">SENHA</label>
                    <input type="password" id="senha" name="senha" required placeholder="Sua senha">
                </div>
                
                <button type="submit" class="btn-login">ACESSAR</button>
                
                <div class="links">
                    <a href="formUsuario.html">PRIMEIRO ACESSO</a>
                    <a href="#">TRANFERÊNCIA</a>
                </div>
            </form>
            
        
            </div>
            
            <div class="footer">
                <p>© 2025 FRIV GAMES & WIKI. Todos os direitos reservados.</p>
            </div>
        </div>
    </div>

    <script>
        // Adicionando efeitos interativos
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.parentElement.classList.remove('focused');
                    }
                });
            });
            
            // Efeito de digitação no título
            const title = document.querySelector('.login-header h2');
            const originalText = title.textContent;
            title.textContent = '';
            let i = 0;
            
            function typeWriter() {
                if (i < originalText.length) {
                    title.textContent += originalText.charAt(i);
                    i++;
                    setTimeout(typeWriter, 100);
                }
            }
            
            setTimeout(typeWriter, 500);
        });
    </script>
</body>
</html>