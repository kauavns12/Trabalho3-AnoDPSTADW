<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $idpost_forun = 4;
    $conteudo = "O melhor lendário do Pokemon";
    $idusuario = 3;
    $idtopico_forun = 2;
   
    
    editarPostForun($conexao, $idpost_forun, $conteudo, $idusuario, $idtopico_forun);
?>


