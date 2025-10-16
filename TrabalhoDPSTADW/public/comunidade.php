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

     <style>
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    
 <?php include 'cabeçalho.php'; ?>
    <br><br><br>

    <?php

        $usuarios = listarUsuario($conexao);

    if (count($usuarios) == 0) {
        echo "Não existem usuários cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>FOTO</td>
                <td>NOME</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($usuarios as $usuario) {
            $idusuario = $usuario['idusuario'];
            $nome = $usuario['nome'];
            $foto = $usuario['foto'];

            echo "<tr>";
            echo "<td><img src='../controle/fotos/$foto'></td>";
            echo "<td>$nome</td>";
            echo "<td><a href='usuario.php?id=$idusuario'>Visualizar perfil</a></td>";
            echo "</tr>";
        }
    }

    ?>


