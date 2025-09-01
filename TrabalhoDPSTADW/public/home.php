<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id = $_SESSION['id_usuario'];
pesquisarUsuario_ID($conexao, $id);
$foto = $user['foto'];
$nome = $user['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/stilinho.css">

    
</head>

<body>

<body>
    <nav class="navbar" class ="cabeca">
            <a href="#" class="logo">
                <i class="fas fa-gamepad logo-icon"></i>
                <span class="logo-text">Friv Games & WIKI</span>
            </a>
            
            <ul class="nav-links">
                <li><a href="body.php" class="active">Início</a></li>
                <li><a href="jogos.php">Jogos</a></li>
                <li><a href="comunidade.php">Comunidade</a></li>
                <li><a href="foruns.php">Fóruns</a></li>
            </ul>
            
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" placeholder="Pesquisar jogos, tópicos ou usuários">
            </div>
            
            <div class="user-menu">
                <div class="user-avatar"> <img src="../controle/fotos/<?php echo $_SESSION['foto']?>"></div>
                <div class="user-name"><?php echo $_SESSION['nome'] ?></div>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
            
            <div class="button-demo">
                    <div>
                        <a href="../controle/deslogar.php" class="nav-button signup-btn" target="bodyiframe">Deslogar</a>
                    </div>
                    
                    <div>
                        <a href="./configuracoes.php" class="nav-button login-btn" target="bodyiframe">Configurações</a>
                    </div>
                </div>

</body>

</html>