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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/estilo_jogo.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .navbar {
            background-color: #2c3e50;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .logo-icon {
            margin-right: 10px;
            font-size: 20px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 25px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav-links a.active,
        .nav-links a:hover {
            background-color: #34495e;
        }

        .search-container {
            position: relative;
            width: 300px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
        }

        .search-box {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: none;
            border-radius: 20px;
            background-color: #34495e;
            color: white;
            outline: none;
        }

        .search-box::placeholder {
            color: #bdc3c7;
        }

        .user-menu {
            display: flex;
            align-items: center;
            color: white;
            cursor: pointer;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
            background-color: #ecf0f1;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dropdown-icon {
            margin-left: 8px;
            font-size: 12px;
        }

        .button-demo {
            position: absolute;
            top: 60px;
            right: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 10px;
            display: none;
            z-index: 1000;
        }

        .user-menu:hover + .button-demo,
        .button-demo:hover {
            display: block;
        }

        .nav-button {
            display: block;
            padding: 8px 15px;
            text-decoration: none;
            color: #2c3e50;
            border-radius: 3px;
            transition: background-color 0.3s;
            text-align: center;
            margin: 5px 0;
        }

        .nav-button:hover {
            background-color: #ecf0f1;
        }

        .main-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            display: flex;
            gap: 30px;
        }

        .posts-container {
            flex: 1;
            max-width: 800px;
        }

        .users-sidebar {
            width: 300px;
        }

        .post {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .post-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            background-color: #ecf0f1;
            overflow: hidden;
        }

        .post-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .post-username {
            font-weight: bold;
            color: #2c3e50;
        }

        .post-content {
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .post-time {
            color: #7f8c8d;
            font-size: 12px;
            text-align: right;
        }

        .users-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .users-card h3 {
            margin-bottom: 15px;
            color: #2c3e50;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
        }

        .user-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ecf0f1;
        }

        .user-item:last-child {
            border-bottom: none;
        }

        .user-item-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 12px;
            overflow: hidden;
            background-color: #ecf0f1;
        }

        .user-item-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-item-info {
            flex: 1;
        }

        .user-item-name {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .user-item-email {
            color: #7f8c8d;
            font-size: 12px;
        }

        .follow-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .follow-btn:hover {
            background-color: #2980b9;
        }

        hr {
            border: none;
            border-top: 1px solid #ecf0f1;
            margin: 15px 0;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-gamepad logo-icon"></i>
            <span class="logo-text">Friv Games & WIKI</span>
        </a>
        
        <ul class="nav-links">
            <li><a href="home.php" class="active">INÍCIO</a></li>
            <li><a href="jogos.php">JOGOS</a></li>
            <li><a href="comunidade.php">COMUNIDADE</a></li>
            <li><a href="foruns.php">FÓRUNS</a></li>
        </ul>
        
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-box" placeholder="Pesquisar jogos, tópicos ou usuários">
        </div>
        
        <div class="user-menu">
            <div class="user-avatar">
                <img src="../controle/fotos/<?=$_SESSION['foto']?>" alt="Avatar">
            </div>
            <div class="user-name"><?php echo $_SESSION['nome'] ?></div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </div>
        
        <div>
            <div>
                <a href="../controle/deslogar.php" class="nav-button">Deslogar</a>
            </div>
            <div>
                <a href="./configuracoes.php" class="nav-button">Configurações</a>
            </div>
        </div>
    </nav>

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
                    echo '<p>Nenhum usuário encontrado.</p>';
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
                        echo '<img src="../controle/fotos/'.$jogo['img'].'" alt="'.$jogo['nome'].'" style="background-color: #bdc3c7;">';
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