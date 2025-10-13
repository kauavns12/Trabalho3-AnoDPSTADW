<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['idusuario'];

excluirUsuario($conexao, $id_usuario);
header("Location: ../public/listarUsuario_adm.php");
?>
