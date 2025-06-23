<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";
     
    $conteudo = "Ferramentas do Minecraft";
    $idusuario = 3;
    $idtopico_forun = 2;
   
    
    salvarPostForun($conexao, $conteudo, $idusuario, $idtopico_forun);
?>



