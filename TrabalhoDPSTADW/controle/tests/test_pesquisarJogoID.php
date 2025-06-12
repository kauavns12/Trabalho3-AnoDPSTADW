<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idjogo = 1;

echo "<pre>";
print_r(pesquisarJogoID($conexao, $idjogo));
echo "</pre>";
?>