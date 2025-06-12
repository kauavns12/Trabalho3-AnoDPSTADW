<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "O The Walking Dead";

echo "<pre>";
print_r(pesquisarConquistaNome($conexao, $nome));
echo "</pre>";
?>