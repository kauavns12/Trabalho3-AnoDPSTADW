<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$idlista = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAS - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/estilo_jogosLista.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include 'cabeçalho.php'; ?>

    <div class="page-container">
        <h1 class="page-title">Jogos da Lista</h1>
        
        <?php
        $jogos = listarJogosDaLista($conexao, $idlista);

        if (count($jogos) == 0) {
            echo "<div class='empty-state'>Não foi possível encontrar jogos nesta lista</div>";
        } else {
        ?>
            <div class="table-container">
                <table class="jogos-table">
                    <thead>
                        <tr>
                            <th>FOTO</th>
                            <th>NOME</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($jogos as $jogo) {
                        $idjogo = $jogo['idjogo'];
                        $nome = $jogo['nome'];
                        $foto = $jogo['img'];

                        // Verificar se a imagem existe
                        $caminhoImagem = "../controle/fotos/$foto";
                        $imagemPadrao = "../controle/fotos/default_game.png";

                        if (!file_exists($caminhoImagem) || empty($foto)) {
                            $caminhoImagem = $imagemPadrao;
                        }

                        echo "<tr>";
                        echo "<td><div class='imagem-container'><img src='$caminhoImagem' alt='$nome' class='jogo-imagem' onerror=\"this.src='$imagemPadrao'\"></div></td>";
                        echo "<td>$nome</td>";
                        echo "<td><a href='jogo.php?id=$idjogo' class='action-link'><i class='fas fa-eye'></i> Visualizar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        
        <a href='listas.php' class='back-button'>Voltar para Listas</a>
    </div>
</body>
</html>