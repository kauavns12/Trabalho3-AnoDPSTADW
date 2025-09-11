<?php
     require_once "./conexao.php";
     require_once "./funcoes.php";
     require_once "./verificarLogado.php";
     require_once "./verificarLogin.php";
    
    $idtopico_forun = $_POST['idtopico_forun'];
    $idusuario = $_SESSION['idusuario'];
    $conteudo = $_POST['conteudo'];
    
    salvarPostForun($conexao, $conteudo, $idusuario, $idtopico_forun);
?>


