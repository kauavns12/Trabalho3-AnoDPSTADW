<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "João";
    $gmail = "Kaio@teste.com";
    $senha = "3840413708";

    salvarUsuario($conexao, $nome, $gmail, $senha);
?>