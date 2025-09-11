<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

$idpost = 1;


echo "<pre>";
print_r(ListarComentarioPost($conexao, $idpost));
echo "</pre>";
?>