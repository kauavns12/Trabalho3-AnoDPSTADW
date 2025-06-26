<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "RPG"; 

    salvarGenero($conexao, $nome);

    $nome2 = "Aventura"; 

    salvarGenero($conexao, $nome2);

?>