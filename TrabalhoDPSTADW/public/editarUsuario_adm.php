<?php
// editarUsuario.php
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

session_start();

// aqui pegue o id do usuário logado da sessão
$id_usuario = $_GET['id'];

// busca dados do usuário
$sql = "    UPDATE usuario SET tipo = 'A'    WHERE idusuario = ? ";
$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, 'i', $id_usuario);
$funcionou = mysqli_stmt_execute($comando);

if($funcionou == true){
    header("Location: listarUsuario_adm.php");
}
