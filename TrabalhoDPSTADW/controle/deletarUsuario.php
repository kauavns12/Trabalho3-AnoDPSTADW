<?php

require_once "./conexao.php";
require_once "./funcoes.php";

if (isset($_GET['idusuario'])) {
    $idusuario = intval($_GET['idusuario']); // Garante que seja número

    excluirUsuario($conexao, $idusuario); // Executa a exclusão, sem se preocupar com o resultado

    header("Location: ../public/configuracoes.php");
    exit();
} else {
    header("Location: ../public/configuracoes.php"); // Mesmo se não tiver ID, volta
    exit();
}