<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $idpost_forun = 1;
    $conteudo = "O melhor lendário do Pokemon";
    $idusuario = 2;
    $idtopico_forun = 1;
   
    
    editarPostForun($conexao, $idpost_forun, $conteudo, $idusuario, $idtopico_forun);
?>


