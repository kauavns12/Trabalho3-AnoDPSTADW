<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $classificacao = 3;
    $idusuario = 2;
    $idjogo= 1;
    salvarAvaliacaoJogo($conexao, $classificacao, $idjogo, $idusuario);
?>
