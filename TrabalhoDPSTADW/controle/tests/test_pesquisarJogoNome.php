<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "Pokemon Fire Red";

echo "<pre>";
print_r(pesquisarJogoNome($conexao, $nome));
echo "</pre>";
?>