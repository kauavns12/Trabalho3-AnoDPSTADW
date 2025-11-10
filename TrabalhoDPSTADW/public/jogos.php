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
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_jogos.css">
</head>

<body>

    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>

    <?php include 'cabeçalho.php'; ?>
    <br><br><br>

    <div class="jogos-container">
        <?php
        $jogos = listarJogo($conexao);
        if (count($jogos) == 0) {
            echo "<div class='no-jogos'>Não existem jogos cadastrados</div>";
        } else {
        ?>
            <div class="table-container">
                <table class="jogos-table">
                    <thead>
                        <tr>
                            <th>FOTO</th>
                            <th>NOME</th>
                            <th>DESENVOLVEDOR</th>
                            <th>DATA DE LANÇAMENTO</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jogos as $jogo) {
                            $idjogo = $jogo['idjogo'];
                            $nome = $jogo['nome'];
                            $desenvolvedor = $jogo['desenvolvedor'];
                            $data = $jogo['data_lanca'];
                            $foto = $jogo['img'];

                            // Verificar se a imagem existe
                            $caminhoImagem = "../controle/fotos/$foto";
                            $imagemPadrao = "../controle/fotos/default_game.png";

                            if (!file_exists($caminhoImagem) || empty($foto)) {
                                $caminhoImagem = $imagemPadrao;
                            }

                            echo "<tr>";
                            echo "<td><div class='jogo-imagem-container'><img src='$caminhoImagem' alt='$nome' class='jogo-imagem' onerror=\"this.src='$imagemPadrao'\"></div></td>";
                            echo "<td>$nome</td>";
                            echo "<td>$desenvolvedor</td>";
                            echo "<td>$data</td>";
                            echo "<td><div class='actions-container'>";
                            echo "<a href='jogo.php?id=$idjogo' class='action-link view-btn'><i class='fas fa-eye'></i> Visualizar</a>";
                            echo "<a href='../controle/adicionarFavorito.php?id=$idjogo' class='action-link favorito-btn'><i class='far fa-star'></i> Favoritar</a>";

                            // BOTÃO DE EXCLUIR E EDITAR - VISÍVEL APENAS PARA ADMINISTRADORES
                            if ($_SESSION['tipo'] === 'A') {
                                echo "<a href='../controle/deletarJogo.php?idjogo=$idjogo' class='action-link delete-btn' onclick='return confirm(\"Tem certeza que deseja excluir este jogo?\");'><i class='fas fa-trash'></i> Excluir</a>";
                                echo "<a href='editarJogo.php?idjogo=$idjogo' class='action-link edit-btn'><i class='fas fa-edit'></i> Editar</a>";
                            }
                            echo "</div></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

    </div>
</body>

</html>