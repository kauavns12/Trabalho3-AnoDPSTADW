<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $idtopico_forun=1;
    $nome = "Pablo";
    $conteudo = "UHUUUUUUUUUUU";
    $idcategoria_forun= 1;
    $idjogo= 1;
    
    editarTopicoForun($conexao,$idtopico_forun, $nome, $conteudo, $idcategoria_forun,$idjogo);
?>
