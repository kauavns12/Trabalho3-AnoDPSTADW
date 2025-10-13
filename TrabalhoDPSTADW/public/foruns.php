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
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_foruns.css">

</head>

<body>
    <?php include 'cabeçalho.php'; ?>
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