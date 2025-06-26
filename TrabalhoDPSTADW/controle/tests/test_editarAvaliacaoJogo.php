<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $idavaliacao = 2;
    $classificacao = 1;
    $idusuario = 3;
    $idjogo = 1;
    editarAvaliacaoJogo($conexao, $idavaliacao, $classificacao, $idusuario, $idjogo);

?>

