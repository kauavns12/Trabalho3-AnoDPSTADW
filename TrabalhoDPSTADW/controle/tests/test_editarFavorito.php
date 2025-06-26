<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $idfavorito = 1;
    $idusuario=3;
    $idjogo = 2;
  
    
    editarFavorito($conexao, $idfavorito, $idusuario, $idjogo);
?>
