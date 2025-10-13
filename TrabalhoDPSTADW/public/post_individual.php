<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";
$idpost = $_GET['id']
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
    <br><br><br>

    <?php

        echo "<pre>";
        print_r(pesquisarPostID($conexao, $idpost));
        echo "</pre>";

        echo "<pre>";
        print_r(ListarComentarioPost($conexao, $idpost));
        echo "</pre>";


    ?>