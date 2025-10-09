<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRIV GAMES & WIKI - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/estilo_index.css">
</head>

<body>
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>
    
    <div class="login-container">
        <div class="logo">
            <h1>FRIV GAMES & WIKI</h1>
            <h3>LOGUIN</h3>
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
                <a href="formUsuario.php">Primeiro Acesso</a>
            </div>
        </form>
    </div>

    
    <div class="image-credit">
        FRIV GAMES & WIKI © 2023
    </div>

</body>
</html>