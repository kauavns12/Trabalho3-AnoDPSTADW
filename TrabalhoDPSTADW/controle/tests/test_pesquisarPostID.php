<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$id = 1;
echo "<pre>";
print_r(pesquisarPostID($conexao,$id));
echo "</pre>";
?>