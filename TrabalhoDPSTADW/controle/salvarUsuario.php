<?php

    require_once "./conexao.php";
    require_once "./funcoes.php";

    $nome = $_POST['nome'];
    $gmail = $_POST['email'];
    $senha = $_POST['senha'];
    $foto = $_POST['foto'];
    $tipo = 'c';
    $status = $_POST['status'];


    cadastrarUsuario($conexao, $nome, $gmail, $senha, $foto, $tipo, $status);



    header("Location: index.html");
?>