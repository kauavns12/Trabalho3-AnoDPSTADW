<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRIV GAMES & WIKI - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #0a0a1a;
            color: #e0e0e0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(28, 12, 66, 0.4) 0%, transparent 30%),
                radial-gradient(circle at 90% 70%, rgba(40, 15, 90, 0.4) 0%, transparent 30%);
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .header h1 {
            font-size: 2.8rem;
            color: #7e3ff2;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
            text-shadow: 0 0 10px rgba(126, 63, 242, 0.5);
        }
        
        .header h2 {
            font-size: 1.8rem;
            color: #d4c2ff;
            font-weight: 400;
            letter-spacing: 2px;
        }
        
        .login-container {
            background-color: rgba(20, 15, 35, 0.8);
            border: 1px solid #44337a;
            border-radius: 8px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(68, 51, 122, 0.3);
            margin-bottom: 40px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1rem;
            color: #d4c2ff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            background-color: rgba(15, 10, 30, 0.7);
            border: 1px solid #553c9a;
            border-radius: 4px;
            color: #e0e0e0;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #7e3ff2;
            box-shadow: 0 0 0 2px rgba(126, 63, 242, 0.3);
        }
        
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #553c9a, transparent);
            margin: 25px 0;
        }
        
        .access-section {
            text-align: center;
            margin: 20px 0;
        }
        
        .access-section p {
            font-size: 1rem;
            color: #d4c2ff;
            margin-bottom: 15px;
        }
        
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #553c9a, #7e3ff2);
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background: linear-gradient(to right, #7e3ff2, #553c9a);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(126, 63, 242, 0.4);
        }
        
        .register-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #7e3ff2;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .register-link:hover {
            color: #d4c2ff;
            text-decoration: underline;
        }
        
        .sections-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 100%;
        }
        
        .section {
            background-color: rgba(20, 15, 35, 0.8);
            border: 1px solid #44337a;
            border-radius: 8px;
            padding: 20px;
            flex: 1;
            min-width: 200px;
            max-width: 250px;
            box-shadow: 0 0 15px rgba(68, 51, 122, 0.2);
        }
        
        .section h3 {
            color: #7e3ff2;
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #44337a;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .section ul {
            list-style-type: none;
        }
        
        .section li {
            padding: 8px 0;
            color: #d4c2ff;
            border-bottom: 1px solid rgba(68, 51, 122, 0.3);
            font-size: 0.9rem;
        }
        
        .section li:last-child {
            border-bottom: none;
        }
        
        @media (max-width: 768px) {
            .sections-container {
                flex-direction: column;
                align-items: center;
            }
            
            .section {
                width: 100%;
                max-width: 400px;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }
            
            .header h2 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FRIV GAMES & WIKI</h1>
            <h2>LOGIN</h2>
        </div>
        
        <div class="login-container">
            <form id="loginForm">
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">SENHA</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="btn-login">Entrar</button>
                
                <div class="divider"></div>
                
                <div class="access-section">
                    <p><strong>ACCESS</strong></p>
                    <p>NÃO TEM CONTA? <a href="#" class="register-link">CADASTRAR-SE</a></p>
                </div>
            </form>
        </div>
        
        <div class="sections-container">
            <div class="section">
                <h3>PRIME</h3>
                <ul>
                    <li>LOCAL</li>
                    <li>DISCUSSIONAL</li>
                    <li>CORREÇÃO</li>
                    <li>POLÍTICA</li>
                    <li>FUTURA</li>
                    <li>RECONHECIMENTO</li>
                </ul>
            </div>
            
            <div class="section">
                <h3>PASSIONAL</h3>
                <ul>
                    <li>LEGADO</li>
                    <li>BRAÇO</li>
                    <li>NÚMERO</li>
                    <li>FUTURA</li>
                </ul>
            </div>
            
            <div class="section">
                <h3>MARTYERS</h3>
                <ul>
                    <li>POLÍTICA</li>
                    <li>BRAÇO</li>
                    <li>NÚMERO</li>
                    <li>FUTURA</li>
                </ul>
            </div>
            
            <div class="section">
                <h3>VOLUME DIVERSO</h3>
                <ul>
                    <li>LICENSERAS</li>
                    <li>CORREÇÃO</li>
                    <li>POLÍTICA</li>
                </ul>
            </div>
            
            <div class="section">
                <h3>QUALIFICACIONAL</h3>
                <ul>
                    <li>LICENSERAS</li>
                    <li>CORREÇÃO</li>
                    <li>POLÍTICA</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Validação básica
            if (!email || !password) {
                alert('Por favor, preencha todos os campos.');
                return;
            }
            
            // Simulação de login bem-sucedido
            alert('Login realizado com sucesso!');
            
            // Aqui você normalmente faria uma requisição para um servidor
            // para autenticar o usuário
        });
    </script>
</body>
</html>