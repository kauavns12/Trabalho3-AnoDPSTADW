<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Bruna"; 
    echo "<pre>";
    print_r(pesquisarUsuario_Nome($conexao,$nome));
    echo "</pre>";
?>