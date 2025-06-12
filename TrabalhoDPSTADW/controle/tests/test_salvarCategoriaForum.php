<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "O Jogo é muito ruim"; 
    $descricao = "O Jogo é tão ruim que passa 3 anos e as recompensas continuam as mesmas";
    salvarCategoriaForun($conexao, $nome, $descricao);
?>