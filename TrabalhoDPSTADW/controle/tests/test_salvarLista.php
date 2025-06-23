<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Dead island";
    $descricao = "Um jogo de sobrevivencia...";
    $situacao = 1;
    $usuario_id = 1;

    salvar_Lista($conexao, $nome, $descricao, $situacao, $usuario_id);
?>