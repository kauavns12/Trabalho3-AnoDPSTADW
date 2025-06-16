<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";




    $nome = "lunna";
    $conteudo = "Tatakae";
    $idcategoria_forun= 1;
    $idjogo= 1;
    
    salvarTopicoForun($conexao, $nome, $conteudo, $idcategoria_forun,$idjogo)
?>
