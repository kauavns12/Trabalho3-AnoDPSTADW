<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $id1 = 1;

    $id2 = 2;

    $id3 = 3; 

    $id4 = 4;

    $id5 = 5;

    efetuarRelacionamento($conexao, $id1, $id2);
    efetuarRelacionamento($conexao, $id1, $id4);
    efetuarRelacionamento($conexao, $id4, $id1);
    efetuarRelacionamento($conexao, $id2, $id3);
    efetuarRelacionamento($conexao, $id3, $id2);
    efetuarRelacionamento($conexao, $id2, $id1);
    efetuarRelacionamento($conexao, $id3, $id1);
?>