<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "Pokemon FireRed";

echo "<pre>";
print_r(pesquisarJogoNome($conexao, $nome));
echo "</pre>";
?>