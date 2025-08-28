<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Estilo Reddit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="stilinho.css">


</head>

<body>
    <nav class="navbar">
            <a href="#" class="logo">
                <i class="fas fa-gamepad logo-icon"></i>
                <span class="logo-text">Friv</span>
            </a>
            
            <ul class="nav-links">
                <li><a href="body.php" target="bodyiframe" class="active">Início</a></li>
                <li><a href="jogos.php" target="bodyiframe">Jogos</a></li>
                <li><a href="comunidade.php" target="bodyiframe">Comunidade</a></li>
                <li><a href="foruns.php" target="bodyiframe">Fóruns</a></li>
                <li><a href="#" target="bodyiframe">Lançamentos</a></li>
            </ul>
            
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" placeholder="Pesquisar jogos, tópicos ou usuários">
            </div>
            
            <div class="nav-buttons">
                <button class="nav-button login-btn">Entrar</button>
                <button class="nav-button signup-btn">Registrar-se</button>
            </div>
            
            <div class="user-menu">
                <div class="user-avatar">J</div>
                <div class="user-name">JoãoSilva</div>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
            <button class="mobile-menu-btn" style="display: none;">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</body>