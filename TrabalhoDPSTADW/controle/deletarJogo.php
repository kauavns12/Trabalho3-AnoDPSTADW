<?php
require_once "verificarLogado.php";
require_once "conexao.php";
require_once "funcoes.php";

$idjogo = $_SESSION['idjogo'];

excluirJogo($conexao, $idjogo);
header("Location: ../public/index.php");
?>
