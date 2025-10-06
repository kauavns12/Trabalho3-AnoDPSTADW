<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRIV GAMES & WIKI - Teyvat Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Noto Sans JP', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a1f37 0%, #2d1b33 50%, #1a2f3a 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #e0e0e0;
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 180, 162, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 220, 255, 0.15) 0%, transparent 50%);
            animation: float 6s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-element {
            position: absolute;
            opacity: 0.7;
            animation: floatElement 15s infinite linear;
        }

        .floating-element:nth-child(1) {
            top: 15%;
            left: 10%;
            font-size: 24px;
            color: #ff9999;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 70%;
            left: 85%;
            font-size: 28px;
            color: #99ccff;
            animation-delay: -5s;
        }

        .floating-element:nth-child(3) {
            top: 40%;
            left: 90%;
            font-size: 22px;
            color: #ffcc66;
            animation-delay: -10s;
        }

        .floating-element:nth-child(4) {
            top: 80%;
            left: 15%;
            font-size: 26px;
            color: #99ff99;
            animation-delay: -7s;
        }

        @keyframes floatElement {
            0% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(90deg); }
            50% { transform: translateY(0px) rotate(180deg); }
            75% { transform: translateY(20px) rotate(270deg); }
            100% { transform: translateY(0px) rotate(360deg); }
        }

        .login-container {
            width: 900px;
            height: 550px;
            background: rgba(30, 35, 65, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            display: flex;
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(120, 119, 198, 0.1) 0%, transparent 50%, rgba(255, 180, 162, 0.1) 100%);
            pointer-events: none;
        }

        .login-left {
            flex: 1;
            background: 
                radial-gradient(circle at 30% 40%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                linear-gradient(to bottom, rgba(45, 50, 90, 0.8), rgba(30, 35, 65, 0.9));
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
            z-index: 2;
        }

        .logo h1 {
            font-size: 36px;
            font-weight: 700;
            background: linear-gradient(135deg, #ffcc99, #ff9999, #99ccff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .logo p {
            font-size: 16px;
            color: #ccd0d9;
            letter-spacing: 1px;
        }

        .teyvat-symbol {
            width: 150px;
            height: 150px;
            background: 
                radial-gradient(circle at center, rgba(255, 204, 153, 0.8) 0%, rgba(255, 153, 153, 0.6) 50%, rgba(153, 204, 255, 0.4) 100%);
            border-radius: 50%;
            position: relative;
            margin: 20px 0;
            box-shadow: 
                0 0 30px rgba(255, 204, 153, 0.5),
                inset 0 0 20px rgba(255, 255, 255, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            animation: rotate 20s linear infinite;
        }

        .teyvat-symbol::before {
            content: "";
            position: absolute;
            width: 80%;
            height: 80%;
            background: 
                radial-gradient(circle at center, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 70%, transparent 100%);
            border-radius: 50%;
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .teyvat-symbol::after {
            content: "✦";
            position: absolute;
            font-size: 60px;
            color: rgba(120, 119, 198, 0.8);
            font-weight: bold;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-right {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 2;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .login-header::before, .login-header::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255, 204, 153, 0.5), transparent);
        }

        .login-header::before {
            left: 0;
        }

        .login-header::after {
            right: 0;
        }

        .login-header h2 {
            font-size: 32px;
            background: linear-gradient(135deg, #ffcc99, #ff9999);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .login-header p {
            color: #ccd0d9;
            font-size: 14px;
            letter-spacing: 1px;
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
            font-weight: 500;
            color: #ccd0d9;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: rgba(40, 45, 75, 0.5);
            color: #e0e0e0;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group input:focus {
            border-color: rgba(255, 204, 153, 0.8);
            box-shadow: 
                inset 0 0 10px rgba(0, 0, 0, 0.2),
                0 0 15px rgba(255, 204, 153, 0.3);
            outline: none;
            background-color: rgba(50, 55, 85, 0.7);
        }

        .form-group input::placeholder {
            color: #8890a5;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff9966, #ff5e62);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            box-shadow: 
                0 4px 15px rgba(255, 94, 98, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #ff5e62, #ff9966);
            box-shadow: 
                0 6px 20px rgba(255, 94, 98, 0.6);
            transform: translateY(-2px);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }

        .links a {
            color: #ccd0d9;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            font-size: 14px;
            position: relative;
        }

        .links a::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 1px;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            transition: width 0.3s;
        }

        .links a:hover {
            color: #ffcc99;
        }

        .links a:hover::after {
            width: 100%;
        }

        .user-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        .user-card {
            background: rgba(40, 45, 75, 0.5);
            border-radius: 10px;
            padding: 12px;
            text-align: center;
            box-shadow: 
                inset 0 0 10px rgba(0, 0, 0, 0.2),
                0 3px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .user-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                inset 0 0 10px rgba(0, 0, 0, 0.2),
                0 5px 15px rgba(255, 153, 102, 0.3);
            border-color: rgba(255, 153, 102, 0.3);
        }

        .user-card:hover::before {
            transform: scaleX(1);
        }

        .user-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 8px;
            border: 2px solid rgba(255, 204, 153, 0.5);
            filter: brightness(1.1);
        }

        .user-card p {
            font-size: 12px;
            font-weight: 600;
            color: #ccd0d9;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #8890a5;
            font-size: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
        }

        .pulse {
            animation: pulse 3s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 153, 102, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(255, 153, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 153, 102, 0); }
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
    <div class="floating-elements">
        <div class="floating-element">❀</div>
        <div class="floating-element">✦</div>
        <div class="floating-element">❁</div>
        <div class="floating-element">✧</div>
    </div>
    
    <div class="login-container">
        <div class="login-left">
            <div class="logo">
                <h1>FRIV GAMES & WIKI</h1>
                <p>Welcome to Teyvat</p>
            </div>
            <div class="teyvat-symbol pulse"></div>
            <p>Adventure Awaits Beyond the Horizon</p>
        </div>
        
        <div class="login-right">
            <div class="login-header">
                <h2>LOGIN</h2>
                <p>Enter Your Credentials</p>
            </div>
            
            <form class="login-form" action="../controle/verificarLogin.php" method="post">
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="gmail" id="gmail" name="gmail" required placeholder="traveler@teyvat.org">
                </div>
                
                <div class="form-group">
                    <label for="senha">PASSWORD</label>
                    <input type="password" id="senha" name="senha" required placeholder="••••••••••">
                </div>
                
                <button type="submit" class="btn-login">BEGIN JOURNEY</button>
                
                <div class="links">
                    <a href="formUsuario.html">FIRST ADVENTURE</a>
                    <a href="#">TRANSFER ACCOUNT</a>
                </div>
            </form>
            
            <div class="user-grid">
 
            <div class="footer">
                <p>May the Anemo Archon guide your journey</p>
            </div>
        </div>
    </div>

    <script>
        // Adicionando efeitos interativos no estilo Genshin
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            const button = document.querySelector('.btn-login');
            
            // Efeito de foco nos inputs
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.parentElement.classList.remove('focused');
                    }
                });
                
                // Efeito de digitação
                input.addEventListener('keydown', function(e) {
                    if (e.key.length === 1) {
                        this.style.boxShadow = 'inset 0 0 10px rgba(0, 0, 0, 0.2), 0 0 15px rgba(255, 204, 153, 0.5)';
                        setTimeout(() => {
                            this.style.boxShadow = 'inset 0 0 10px rgba(0, 0, 0, 0.2)';
                        }, 100);
                    }
                });
            });
            
            // Efeito no botão
            button.addEventListener('mouseenter', function() {
                // Efeito visual adicional
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
            
            // Adicionar mais elementos flutuantes dinamicamente
            setInterval(() => {
                const symbols = ['❀', '✦', '❁', '✧', '♡', '★'];
                const randomSymbol = symbols[Math.floor(Math.random() * symbols.length)];
                
                const newElement = document.createElement('div');
                newElement.className = 'floating-element';
                newElement.textContent = randomSymbol;
                newElement.style.top = Math.random() * 80 + 10 + '%';
                newElement.style.left = Math.random() * 80 + 10 + '%';
                newElement.style.fontSize = (Math.random() * 10 + 20) + 'px';
                newElement.style.color = `hsl(${Math.random() * 360}, 70%, 70%)`;
                newElement.style.animationDuration = (Math.random() * 10 + 10) + 's';
                newElement.style.animationDelay = '-' + (Math.random() * 15) + 's';
                
                document.querySelector('.floating-elements').appendChild(newElement);
                
                // Remover após um tempo para não sobrecarregar
                setTimeout(() => {
                    if (newElement.parentNode) {
                        newElement.parentNode.removeChild(newElement);
                    }
                }, 30000);
            }, 3000);
        });
    </script>
</body>
</html>