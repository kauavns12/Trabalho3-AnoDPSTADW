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
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/stilinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



</head>


<body>
    <?php include 'cabeçalho.php'; ?>

    <?php

    $jogoslista = listarJogosDaLista($conexao, $idlista);

    if (count($lista_lista) == 0) {
        echo "Não existem listas criadas";
    } else {
    ?>
        <table class="jogos-table">
            <tr>
                <td>FOTO</td>
                <td>NOME</td>
                <td>DESENVOLVEDOR</td>
                <td>DATA_LANCA</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($jogos as $jogo) {
            $idjogo = $jogo['idjogo'];
            $nome = $jogo['nome'];
            $desenvolvedor = $jogo['desenvolvedor'];
            $data = $jogo['data_lanca'];
            $foto = $jogo['img'];



            // Verificar se a imagem existe
            $caminhoImagem = "../controle/fotos/$foto";
            $imagemPadrao = "../controle/fotos/default_game.png"; // Crie uma imagem padrão

            if (!file_exists($caminhoImagem) || empty($foto)) {
                $caminhoImagem = $imagemPadrao;
            }

            echo "<tr>";
            echo "<td><div class='imagem-container'><img src='$caminhoImagem' alt='$nome' class='jogo-imagem' onerror=\"this.src='$imagemPadrao'\"></div></td>";
            echo "<td>$nome</td>";
            echo "<td>$desenvolvedor</td>";
            echo "<td>$data</td>";
            echo "<td><a href='jogo.php?id=$idjogo'><i class='fas fa-eye'></i> Visualizar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
        ?>

</body>