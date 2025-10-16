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
</head>

<body>
    
 <?php include 'cabeçalho.php'; ?>
    <br><br><br>

    <?php

        $jogos = listarJogo($conexao);

    if (count($jogos) == 0) {
        echo "Não existem jogos cadastrados";
    } else {
    ?>
        <table border="1">
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

            echo "<tr>";
            echo "<td><img src='fotos/$foto'></td>";
            echo "<td>$nome</td>";
            echo "<td>$desenvolvedor</td>";
            echo "<td>$data</td>";
            echo "<td><a href='jogo.php?id=$idjogo'>Visualizar</a></td>";
            echo "</tr>";
        }
    }

    ?>


