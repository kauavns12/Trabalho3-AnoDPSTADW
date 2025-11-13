<?php
     require_once "conexao.php";
     require_once "funcoes.php";
     require_once "verificarLogado.php";
     
    
    $comentario = $_POST['comentario'];
    $idpost = $_POST['idpost'];
    $idtopico = $_POST['idtop'];
    $idusuario = $_SESSION['idusuario'];
    $data = $_POST['data'];

    cadastrarComentario($conexao, $comentario, $data, $idpost, $idusuario, $idtopico);
    
    header('Location: ../public/post_individual.php')
?>