<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $comentario = " Que jogo lixo!!!!";
    $criado = "2025-08-12";
    $post_forun_idpost_forun = "";
    $post_forun_usuario_idusuario = "";
    $post_forun_topico_forun_idtopico_forun = "";
    

    cadastrarComentario($conexao, $comentario, $criado, $post_forun_idpost_forun, $post_forun_usuario_idusuario, $post_forun_topico_forun_idtopico_forun);
?>

