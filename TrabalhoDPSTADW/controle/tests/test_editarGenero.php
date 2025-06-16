<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $idgenero = 1;
    $nome = "Aventura";
  
    editarGenero($conexao, $idgenero, $nome);

?>