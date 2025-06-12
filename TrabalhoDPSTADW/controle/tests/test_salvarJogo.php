<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Minecraft";
    $descricao = "Um jogo quadrado";
    $desenvolvedor = "Mojang";
    $data_lancamento = "2011-04-03";
    $imagem = "oi";
    $idgenero = 1;

    salvarJogo($conexao, $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem, $idgenero);

?>