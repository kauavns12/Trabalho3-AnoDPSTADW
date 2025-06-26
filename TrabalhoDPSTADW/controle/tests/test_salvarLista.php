<?php
require_once "../conexao.php";
require_once "../funcoes.php";

    
    $idusuario = 2;
    $nome = "Jogos de Sobrevivência";
    $descricao = "Melhores jogos de sobrevivência pós-apocalíptico";
    $situacao = 1;

    $resultado = salvar_Lista($conexao, $nome, $descricao, $situacao, $idusuario);
?>