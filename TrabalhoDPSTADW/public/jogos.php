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
    <link rel="stylesheet" href="./estilo/estilo_home.css">
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
                <td>NOME</td>
                <td>DESCRICAO</td>
                <td>DESENVOLVEDOR</td>
                <td>DATA_LANCA</td>
                <td>FOTO</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($jogos as $jogo) {
            $idusuario = $usuario['idusuario'];
            $nome = $usuario['nome'];
            $email = $usuario['gmail'];
            $senha = $usuario['senha'];
            $foto = $usuario['foto'];

            echo "<tr>";
            echo "<td>$idusuario</td>";
            echo "<td>$nome</td>";
            echo "<td>$email</td>";
            echo "<td>$senha</td>";
            echo "<td><img src='fotos/$foto'></td>";
            echo "<td><a href='../controle/deletarUsuario.php?idusuario=$idusuario'>Excluir</a></td>";
            echo "<td><a href='formUsuario.html?id=$idusuario'>Editar</a></td>";
            echo "</tr>";
        }
    }




    ?>


