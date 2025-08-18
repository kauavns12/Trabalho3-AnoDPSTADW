<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Lunna";
    $gmail = "Lunna@teste.com";
    $senha = "3840413770";
    $foto = "teste";
    $tipo = "c";
    $status = "Ativo";

    cadastrarUsuario($conexao, $nome, $gmail, $senha, $foto, $tipo, $status);
?>