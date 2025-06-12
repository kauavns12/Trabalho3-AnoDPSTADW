<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "O The Walking Dead"; 
    $descricao = "Você é o sobrevivente!";

    salvarConquista($conexao, $nome, $descricao);
?>