<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "O The Walking Dead"; 
    $descricao = "Você é o sobrevivente!";

    salvarConquista($conexao, $nome, $descricao);

    $nome1 = "Elite Four"; 
    $descricao1 = "Você é o campeão";

    salvarConquista($conexao, $nome1, $descricao1);


    $nome2 = "O Fim"; 
    $descricao2 = "Você adentrou ao The End";

    salvarConquista($conexao, $nome2, $descricao2);


    $nome3 = "God Of War"; 
    $descricao3 = "Elimine todos do olimpo";

    salvarConquista($conexao, $nome3, $descricao3);



    $nome4 = "Mestre da Mesa"; 
    $descricao4 = "Mestre sua primeira mesa";

    salvarConquista($conexao, $nome4, $descricao4);



    $nome6 = "Sortudo"; 
    $descricao6 = "Ganhe 10 50/50 seguidos";

    salvarConquista($conexao, $nome6, $descricao6);
?>