

<nav class="navbar">
    <a href="home.php" class="logo">
        <i class="fas fa-gamepad logo-icon"></i>
        <span class="logo-text">FRIV GAMES & WIKI</span>
    </a>
    
    <ul class="nav-links">
        <li><a href="home.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : ''; ?>">INÍCIO</a></li>
        <li><a href="jogo.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'jogo.php' ? 'active' : ''; ?>">JOGOS</a></li>
        <li><a href="comunidade.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'comunidade.php' ? 'active' : ''; ?>">COMUNIDADE</a></li>
        <li><a href="foruns.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'foruns.php' ? 'active' : ''; ?>">FÓRUNS</a></li>
    </ul>
    
    <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <form action="pesquisar.php">
            <input type="text" name='valor' class="search-box" placeholder="Pesquisar jogos, tópicos ou usuários">
        </form>
    </div>
    
    <div class="user-menu">
        <div class="user-avatar">
            <img src="../controle/fotos/<?=$_SESSION['foto']?>" alt="Avatar">
        </div>
        <div class="user-name"><?php echo $_SESSION['nome'] ?></div>
        <i class="fas fa-chevron-down dropdown-icon"></i>
        
        <div class="user-dropdown">
            <a href="./configuracoes.php" class="nav-button">Configurações</a>
            <a href="../controle/deslogar.php" class="nav-button">Deslogar</a>
        </div>
    </div>
</nav>