<?php
require_once "../controle/verificarLogado.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_pesquisar.css">
</head>

<body>
    <?php include 'cabeçalho.php'; ?>

    <div class="page-container">
        <h1 class="page-title">Resultados da Pesquisa</h1>
        
        <div class="search-results-horizontal">
            
            <div class="search-card">
                <div class="card-header">
                    <div class="card-icon">🎮</div>
                    <h2 class="card-title">Jogos</h2>
                </div>
                <div class="table-container">
                    <?php
                    if (isset($_GET["valor"]) && !empty($_GET["valor"])){
                        $valor = $_GET["valor"];
                        require_once "../controle/conexao.php";
                        require_once "../controle/funcoes.php";

                        $jogos = pesquisarJogoNome($conexao,$valor);

                        if (count($jogos) == 0){
                            echo "<div class='no-results'>Nenhum jogo encontrado</div>";
                        } else {
                            echo "<table class='search-table'>";
                            echo "<tr>";
                            echo "<th>Foto</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Ação</th>";
                            echo "</tr>";
                            foreach ($jogos as $jogo){
                                $idjogo = $jogo['idjogo'];
                                $fotoi = $jogo['img'];
                                echo "<tr>";
                                echo "<td><img src='../controle/fotos/$fotoi' alt='" . $jogo["nome"] . "'></td>";
                                echo "<td>" . $jogo["nome"] . "</td>";
                                echo "<td><a href='jogo.php?id=$idjogo' class='view-link'><i class='fas fa-eye'></i> Visualizar</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Card de Usuários -->
            <div class="search-card">
                <div class="card-header">
                    <div class="card-icon">👥</div>
                    <h2 class="card-title">Usuários</h2>
                </div>
                <div class="table-container">
                    <?php
                    if (isset($_GET["valor"]) && !empty($_GET["valor"])){
                        $valor = $_GET["valor"];
                        require_once "../controle/conexao.php";
                        require_once "../controle/funcoes.php";

                        $usuarios = pesquisarUsuario_Nome($conexao,$valor);

                        if (count($usuarios) == 0){
                            echo "<div class='no-results'>Nenhum usuário encontrado</div>";
                        } else {
                            echo "<table class='search-table'>";
                            echo "<tr>";
                            echo "<th>Foto</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Ação</th>";
                            echo "</tr>";
                            foreach ($usuarios as $usuario){
                                $idusu = $usuario['idusuario'];
                                $fotou = $usuario['foto'];
                                echo "<tr>";
                                echo "<td><img src='../controle/fotos/$fotou' alt='" . $usuario['nome'] . "'></td>";
                                echo "<td>" . $usuario['nome'] . "</td>";
                                echo "<td><a href='usuario.php?id=$idusu' class='view-link'><i class='fas fa-eye'></i> Visualizar</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Card de Posts -->
            <div class="search-card">
                <div class="card-header">
                    <div class="card-icon">💬</div>
                    <h2 class="card-title">Posts</h2>
                </div>
                <div class="table-container">
                    <?php
                    if (isset($_GET["valor"]) && !empty($_GET["valor"])){
                        $valor = $_GET["valor"];
                        require_once "../controle/conexao.php";
                        require_once "../controle/funcoes.php";

                        $posts = pesquisarPostConteudo($conexao,$valor);

                        if (count($posts) == 0){
                            echo "<div class='no-results'>Nenhum post encontrado</div>";
                        } else {
                            echo "<table class='search-table'>";
                            echo "<tr>";
                            echo "<th>Conteúdo</th>";
                            echo "<th>Ação</th>";
                            echo "</tr>";
                            foreach ($posts as $post){
                                $idpost = $post['idpost_forun'];
                                echo "<tr>";
                                echo "<td>" . $post["conteudo"] . "</td>";
                                echo "<td><a href='post_individual.php?id=$idpost' class='view-link'><i class='fas fa-eye'></i> Visualizar</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <a href='home.php' class='back-button'>Voltar para Home</a>
    </div>

    <!-- Elementos decorativos -->
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>
</body>
</html>