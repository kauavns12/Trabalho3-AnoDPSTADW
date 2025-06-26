<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idgenero = 1;

echo "<pre>";
print_r(pesquisarJogoGenero($conexao, $idgenero));
echo "</pre>";
?>