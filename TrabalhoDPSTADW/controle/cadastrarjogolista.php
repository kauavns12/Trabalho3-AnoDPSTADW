<?php
     require_once "conexao.php";
     require_once "funcoes.php";
     require_once "verificarLogado.php";
     
    
    $idlista = $_GET['id']; //Chega aqui?
    $idusuario = $_SESSION['idusuario'];
    $idjogo = $_POST['jogo'];

        var_dump($_GET);
        var_dump($_POST);
        var_dump($_SESSION);
        die;
    
    adicionarJogoLista($conexao, $idlista, $idusuario, $idjogo);
    header('Location: ../public/listas.php')
?>