<?php

require_once "conexao.php";
require_once "funcoes.php";

if (isset($_GET['idlista'])) {
    $idlista = intval($_GET['idlista']); // Garante que seja número

    excluir_Lista($conexao, $idlista); // Executa a exclusão, sem se preocupar com o resultado

    header("Location: ../public/listas.php");
    exit();
} else {
    header("Location: ../public/home.php"); // Mesmo se não tiver ID, volta
    exit();
}