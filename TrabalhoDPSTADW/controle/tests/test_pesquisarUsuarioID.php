<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idusuario = 2;

echo "<pre>";
print_r(pesquisarUsuario_ID($conexao, $idusuario));
echo "</pre>";
?>