<?php
require_once "verificarLogado.php";
require_once "conexao.php";
require_once "funcoes.php";

$idusuario = $_SESSION['idusuario'];

excluirUsuario($conexao, $idusuario);
header("Location: ../public/index.php");
?>
