<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idconquista = 3;
    $idusuario = 2;

    conquistaUsu($conexao, $idconquista, $idusuario);



    $idconquista1 = 5;
    $idusuario1 = 2;

    conquistaUsu($conexao, $idconquista1, $idusuario1);
?>