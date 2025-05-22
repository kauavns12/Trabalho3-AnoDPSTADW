<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Fulano";
    $gmail = "kuan@teste.com";
    $senha = "2131241324";

    salvarUsuario($conexao, $nome, $gmail, $senha);
?>