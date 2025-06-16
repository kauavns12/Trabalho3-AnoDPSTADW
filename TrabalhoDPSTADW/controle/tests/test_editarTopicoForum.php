<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";


    $nome = "Pablo";
    $conteudo = "UHUUUUUUUUUUU";
    $idcategoria_forun= 2;
    $idjogo= 2;
    
    editarTopicoForun($conexao,$idtopico_forun, $nome, $conteudo, $idcategoria_forun,$idjogo)
?>
