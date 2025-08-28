<?php

$nome = $_POST['nome'];
$gmail = $_POST['gmail'];
$senha = $_POST['senha'];
$foto = $_POST['foto'];
$tipo = 'c';
$status = $_POST['status'];


require_once "conexao.php";
require_once "funcoes.php";


cadastrarUsuario($conexao, $nome, $gmail, $senha, $foto, $tipo, $status);



header("Location: ../public/index.php");
?>