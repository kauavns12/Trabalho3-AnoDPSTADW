<?php
require_once "verificarLogado.php";
require_once "conexao.php";
require_once "funcoes.php";

$idjogo = $_GET['idjogo'];

excluirJogo($conexao, $idjogo);
header("Location: ../public/home.php");
?>
