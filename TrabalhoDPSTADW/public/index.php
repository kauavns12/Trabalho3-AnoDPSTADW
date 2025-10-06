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
            background: 
                /* Substitua a URL abaixo pela sua imagem de fundo */
                url('./estilo/honkai-star-rail-login-screen-wallpaper-v0-zf4z6utfezua1.webp') 
                no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            overflow: hidden;
            position: relative;
        }

        /* Overlay escuro para melhor contraste */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .login-container {
            width: 400px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 40px 30px;
            position: relative;
            z-index: 1;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 14px;
            color: #7f8c8d;
        }

        .login-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ecf0f1;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: #f9f9f9;
            color: #333;
        }

        .form-group input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
            background-color: white;
        }

        .form-group input::placeholder {
            color: #95a5a6;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
        }

        .links a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }

        .links a:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        .background-control {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .background-control label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #2c3e50;
            font-weight: 500;
        }

        .background-control input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .background-control button {
            width: 100%;
            padding: 8px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.3s;
        }

        .background-control button:hover {
            background: #2980b9;
        }

        .image-credit {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            z-index: 2;
        }

        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 30px 20px;
            }
            
            .links {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <h1>FRIV GAMES & WIKI</h1>
            <p>Enter your credentials to continue</p>
        </div>
        
        <form class="login-form" action="../controle/verificarLogin.php" method="post">
            <div class="form-group">
                <input type="text" id="gmail" name="gmail" required placeholder="Enter email/username">
            </div>
            
            <div class="form-group">
                <input type="password" id="senha" name="senha" required placeholder="Enter password">
            </div>
            
            <button type="submit" class="btn-login">Start game</button>
            
            <div class="links">
                <a href="formUsuario.html">Register now</a>
                <a href="#">Forgot password?</a>
            </div>
        </form>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bgUrlInput = document.getElementById('bg-image-url');
            const changeBgBtn = document.getElementById('change-bg');
            
            // Função para alterar o background
            function changeBackground() {
                const url = bgUrlInput.value.trim();
                if (url) {
                    document.body.style.backgroundImage = `url('${url}')`;
                    bgUrlInput.value = '';
                }
            }
            
            // Event listeners
            changeBgBtn.addEventListener('click', changeBackground);
            
            bgUrlInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    changeBackground();
                }
            });
            
            // Efeitos de foco nos inputs
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.style.transform = 'scale(1)';
                });
            });
            

        });
    </script>
</body>
</html>