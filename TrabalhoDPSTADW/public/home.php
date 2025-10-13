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
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_home.css">
</head>

<body>
    <!-- Elementos decorativos de fundo -->
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>
    
    <?php include 'cabeçalho.php'; ?>

    <div class="main-container">
        <!-- Coluna dos Posts -->
        <div class="posts-container">
            <?php
            // Buscar posts
            $posts = listarPostsComUsuarios($conexao);
            
            if (count($posts) > 0) {
                foreach($posts as $post) {
                    echo '<div class="post">';
                    echo '<div class="post-header">';
                    echo '<div class="post-avatar">';
                    echo '<img src="../controle/fotos/'.$post['foto'].'" alt="'.$post['nome'].'">';
                    echo '</div>';
                    echo '<div class="post-username">'.$post['nome'].'</div>';
                    echo '</div>';
                    echo '<div class="post-content">'.$post['conteudo'].'</div>';
                    echo '<div class="post-time">Em: '.$post['topico_nome'].'</div>';
                    echo '</div>';
                    echo '<hr>';
                }
            } else {
                // Se não houver posts no banco, mostrar o exemplo estático
                echo '<div class="post">';
                echo '<div class="post-header">';
                echo '<div class="post-avatar">';
                echo '<img src="../controle/fotos/default_avatar.png" alt="SEGNINIO">';
                echo '</div>';
                echo '<div class="post-username">SEGNINIO</div>';
                echo '</div>';
                echo '<div class="post-content">';
                echo 'Minecraft é bom demais cara... mas não tenho ngm pra jogar cmg :(';
                echo '</div>';
                echo '<div class="post-time">21:23</div>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Sidebar de Usuários -->
        <div class="users-sidebar">
            <div class="users-card">
                <h3>Usuários para Seguir</h3>
                <?php
                // Buscar usuários aleatórios
                $usuarios = listarUsuariosAleatorios($conexao, 5);
                
                if (count($usuarios) > 0) {
                    foreach($usuarios as $usuario) {
                        echo '<div class="user-item">';
                        echo '<div class="user-item-avatar">';
                        echo '<img src="../controle/fotos/'.$usuario['foto'].'" alt="'.$usuario['nome'].'">';
                        echo '</div>';
                        echo '<div class="user-item-info">';
                        echo '<div class="user-item-name">'.$usuario['nome'].'</div>';
                        echo '<div class="user-item-email">'.substr($usuario['gmail'], 0, 20).'...</div>';
                        echo '</div>';
                        echo '<button class="follow-btn">Seguir</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="color: #94a3b8; text-align: center;">Nenhum usuário encontrado.</p>';
                }
                ?>
            </div>

            <div class="users-card">
                <h3>Jogos Populares</h3>
                <?php
                $jogos = listarJogosPopulares($conexao, 3);
                
                if (count($jogos) > 0) {
                    foreach($jogos as $jogo) {
                        echo '<div class="user-item">';
                        echo '<div class="user-item-avatar">';
                        echo '<img src="../controle/fotos/'.$jogo['img'].'" alt="'.$jogo['nome'].'" style="background-color: rgba(15, 23, 42, 0.7);">';
                        echo '</div>';
                        echo '<div class="user-item-info">';
                        echo '<div class="user-item-name">'.$jogo['nome'].'</div>';
                        echo '<div class="user-item-email">'.$jogo['desenvolvedor'].'</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>