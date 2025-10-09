<?php
     require_once "conexao.php";
     require_once "funcoes.php";
     require_once "verificarLogado.php";
     
    
    $nome = $_POST['nome'];
    $descricao = $_POST['descrição'];
    $situacao = $_POST['situação'];
    $idusuario = $_SESSION['idusuario'];
    
    salvar_Lista($conexao, $nome, $descricao, $situacao, $idusuario);
    header('Location: ../public/listas.php')
?>