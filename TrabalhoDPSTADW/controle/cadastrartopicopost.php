<?php
     require_once "conexao.php";
     require_once "funcoes.php";
     require_once "verificarLogado.php";
     
    
    $nome = $_POST['nome'];
    $conteudo = $_POST['conteudo'];
    $idcategoria_forun = $_POST['categoria_forun'];
    $idjogo = $_POST['jogo_forun'];
    
    salvarTopicoForun($conexao, $nome, $conteudo, $idcategoria_forun, $idjogo);
    header('Location: ../public/foruns.php')
?>