<?php
     require_once "conexao.php";
     require_once "funcoes.php";
     require_once "verificarLogado.php";
     
    
    $nome = $_POST['nomec'];
    $descricao = $_POST['descrição'];
    
    salvarCategoriaForun($conexao, $nome, $descricao);
    header('Location: ../public/foruns.php')
?>