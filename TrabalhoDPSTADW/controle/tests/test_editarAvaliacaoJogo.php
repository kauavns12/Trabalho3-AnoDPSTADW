<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $idavaliacao_jogo = 2;
    $classificacao = 1;
    $idusuario = 3;
    $idjogo = 1;
    editarAvaliacaoJogo($conexao, $idavaliacao_jogo, $classificacao, $idusuario, $idjogo);

?>

