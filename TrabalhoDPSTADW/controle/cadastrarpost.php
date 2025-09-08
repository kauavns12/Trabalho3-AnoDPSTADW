<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";
     
    $conteudo = "Ferramentas do Minecraft";
    $idusuario = 2;
    $idtopico_forun = 1;
   
    
    salvarPostForun($conexao, $conteudo, $idusuario, $idtopico_forun);
?>


