<?php
require_once "../conexao.php";
require_once "../funcoes.php";

    
    $idlista = 2;
    $nome = "Jogos de Casar";
    $descricao = "Melhores jogos de sobrevivência pós-romance";
    $situacao = 1;

    $resultado = editar_Lista($conexao,$idlista, $nome, $descricao, $situacao);
?>