<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Dead island";
    $descricao = "Um jogo de sobrevivencia...";
    $situacao = "tgrshzdfsg";

    salvar_Lista($conexao, $nome, $descricao, $situacao);

?>