<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/stilinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



</head>


<body>
    <nav class="navbar" class="cabeca">
        <a href="#" class="logo">
            <i class="fas fa-gamepad logo-icon"></i>
            <span class="logo-text">Friv Games & WIKI</span>
        </a>

        <ul class="nav-links">
            <li><a href="home.php" class="active">Início</a></li>
            <li><a href="jogos.php">Jogos</a></li>
            <li><a href="comunidade.php">Comunidade</a></li>
            <li><a href="foruns.php">Fóruns</a></li>
        </ul>

        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-box" placeholder="Pesquisar jogos, tópicos ou usuários">
        </div>

        <div class="user-menu">
            <div class="user-avatar"> <img src="../controle/fotos/<?= $_SESSION['foto'] ?>"></div>
            <div class="user-name"><?php echo $_SESSION['nome'] ?></div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </div>

        <div class="button-demo">
            <div>
                <a href="../controle/deslogar.php" class="nav-button signup-btn" target="bodyiframe">Deslogar</a>
            </div> <br> <br>

            <div>
                <a href="./configuracoes.php" class="nav-button login-btn" target="bodyiframe">Configurações</a>
            </div>
        </div>
    </nav>
    <br><br><br>
            <div>
                <a href="./cadastrarcategoria.php" class="nav-button login-btn" target="bodyiframe">Insira uma Nova Categoria</a>
            </div>
    
            <div>
                <a href="./cadastrartopico.php" class="nav-button login-btn" target="bodyiframe">Insira um Novo Tópico</a>
            </div>
            <div>
                <a href="./cadastrarpost.php" class="nav-button login-btn" target="bodyiframe">Insira um novo Post</a>
            </div>
    <br>
    
    <br>
    
    <h2 class="page-title">Algumas Postagens</h2>
    <div class="post-list">
        <?php
        $posts = listarPost($conexao);
        foreach ($posts as $post) {
            $post_id = $post['idpost_forun'];

            echo "<a href='post_individual.php?id=$post_id' class='post-link'>Visitar Post</a>";
            echo "<div class='post-card'>";
            echo "<div class='post-header'>";
            echo "<span class='post-topic'>r/" . htmlspecialchars($post['topico_forun_idtopico_forun']) . "</span>";
            echo "<div class='post-content'>" . htmlspecialchars($post['conteudo']) . "</div>";
            echo "<div class='post-footer'>";
            echo "</div>";
        }
        ?>
    </div>

    </div>
</body>