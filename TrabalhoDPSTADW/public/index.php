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
                linear-gradient(135deg, #1a0b2e 0%, #16213e 50%, #0f3460 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200"><defs><radialGradient id="a" cx=".2" cy=".2"><stop offset="0%" stop-color="%237c3aed" stop-opacity=".1"/><stop offset="100%" stop-color="%231a0b2e" stop-opacity="0"/></radialGradient><radialGradient id="b" cx=".8" cy=".8"><stop offset="0%" stop-color="%234f46e5" stop-opacity=".1"/><stop offset="100%" stop-color="%2316213e" stop-opacity="0"/></radialGradient><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="%2325366d" stroke-width="0.5"/></pattern></defs><rect width="200" height="200" fill="%231a0b2e"/><rect width="200" height="200" fill="url(%23a)"/><rect width="200" height="200" fill="url(%23b)"/><rect width="200" height="200" fill="url(%23grid)"/></svg>');
            background-size: cover;
            background-blend-mode: overlay;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #e0e0ff;
            overflow: hidden;
            position: relative;
        }

        /* Efeitos de partículas animadas */
        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(124, 58, 237, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(79, 70, 229, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(167, 139, 250, 0.1) 0%, transparent 50%);
            animation: pulse 15s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }

        /* Overlay escuro para melhor contraste */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 5, 25, 0.7);
            z-index: 0;
        }

        .login-container {
            width: 420px;
            background: rgba(26, 11, 46, 0.9);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 40px 35px;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(101, 78, 163, 0.4);
            backdrop-filter: blur(10px);
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
            position: relative;
        }

        .logo::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #7c3aed, transparent);
        }

        .logo h1 {
            font-size: 32px;
            font-weight: 800;
            color: #a78bfa;
            margin-bottom: 8px;
            text-shadow: 0 0 10px rgba(167, 139, 250, 0.5);
            letter-spacing: 1px;
        }

        .logo p {
            font-size: 16px;
            color: #c7d2fe;
            font-weight: 500;
        }

        .login-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #c7d2fe;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 15px 18px;
            border: 2px solid rgba(101, 78, 163, 0.5);
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: rgba(15, 23, 42, 0.7);
            color: #e0e0ff;
        }

        .form-group input:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.3);
            outline: none;
            background-color: rgba(30, 41, 59, 0.8);
        }

        .form-group input::placeholder {
            color: #94a3b8;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 15px;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.4);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #6d28d9 0%, #4338ca 100%);
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(124, 58, 237, 0.6);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            font-size: 14px;
        }

        .links a {
            color: #a78bfa;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 500;
            padding: 5px 0;
            position: relative;
        }

        .links a::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: #a78bfa;
            transition: width 0.3s;
        }

        .links a:hover {
            color: #c4b5fd;
        }

        .links a:hover::after {
            width: 100%;
        }

        .background-control {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(26, 11, 46, 0.9);
            padding: 12px 15px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
            z-index: 2;
            border: 1px solid rgba(101, 78, 163, 0.3);
            width: 250px;
        }

        .background-control label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #c7d2fe;
            font-weight: 500;
        }

        .background-control input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid rgba(101, 78, 163, 0.5);
            border-radius: 4px;
            font-size: 14px;
            background-color: rgba(15, 23, 42, 0.7);
            color: #e0e0ff;
        }

        .background-control button {
            width: 100%;
            padding: 8px;
            background: linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.3s;
            font-weight: 500;
        }

        .background-control button:hover {
            background: linear-gradient(135deg, #6d28d9 0%, #4338ca 100%);
        }

        .image-credit {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: rgba(199, 210, 254, 0.7);
            font-size: 12px;
            z-index: 2;
        }

        .decoration {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.2) 0%, transparent 70%);
            z-index: 0;
            animation: float 20s infinite ease-in-out;
        }

        .decoration:nth-child(1) {
            top: 10%;
            left: 10%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
        }

        .decoration:nth-child(2) {
            bottom: 10%;
            right: 10%;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.15) 0%, transparent 70%);
            animation-delay: -5s;
        }

        .decoration:nth-child(3) {
            top: 20%;
            right: 15%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(167, 139, 250, 0.1) 0%, transparent 70%);
            animation-delay: -10s;
        }

        .decoration:nth-child(4) {
            bottom: 25%;
            left: 15%;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(199, 210, 254, 0.1) 0%, transparent 70%);
            animation-delay: -15s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(10px, 15px) scale(1.05); }
            50% { transform: translate(-5px, 20px) scale(0.95); }
            75% { transform: translate(-10px, -5px) scale(1.02); }
        }

        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 30px 20px;
            }
            
            .links {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .background-control {
                width: 90%;
                right: 5%;
                bottom: 80px;
            }
            
            .decoration {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Elementos decorativos de fundo -->
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>
    
    <div class="login-container">
        <div class="logo">
            <h1>FRIV GAMES & WIKI</h1>
            <p>Loguin</p>
        </div>
        
        <form class="login-form" action="../controle/verificarLogin.php" method="post">
            <div class="form-group">
                <input type="text" id="gmail" name="gmail" required placeholder="Gmail">
            </div>
            
            <div class="form-group">
                <input type="password" id="senha" name="senha" required placeholder="Senha">
            </div>
            
            <button type="submit" class="btn-login">Acessar</button>
            
            <div class="links">
                <a href="formUsuario.html">Primeiro Acesso</a>
            </div>
        </form>
    </div>

    
    <div class="image-credit">
        FRIV GAMES & WIKI © 2023
    </div>

</body>
</html>