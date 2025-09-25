<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['id_usuario'];

excluirUsuario($conexao, $id_usuario);
header("Location: ../public/home.php");
?>
