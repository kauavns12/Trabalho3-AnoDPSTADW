<?php
require_once "../conexao.php";
require_once "../funcoes.php";

    
    $idusuario = 2;
    $nome = "Zeldinha";
    $descricao = "Rpg de mundo aberto";
    $situacao = 1;

    salvar_Lista($conexao, $nome, $descricao, $situacao, $idusuario);
?>