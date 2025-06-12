<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";
    $idjogo = 1;
    $nome = "Pokemon Fire Red";
    $descricao = "Inicie sua jornada na região de Kanto";
    $desenvolvedor = "Pokemon Company";
    $data_lancamento = "1990-04-03";
    $img = "teste de imagem";
    editarJogo($conexao, $idjogo, $nome, $descricao, $desenvolvedor, $data_lancamento, $img);

?>



