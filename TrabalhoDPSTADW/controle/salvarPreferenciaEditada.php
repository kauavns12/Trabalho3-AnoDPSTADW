<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";

// Pega os dados do formulário
$id_usuario = $_POST['id_usuario'];
$generos = isset($_POST['generos']) ? $_POST['generos'] : [];

// Apaga as preferências antigas
$sql_delete = "DELETE FROM preferencia WHERE usuario_idusuario = ?";
$stmt = mysqli_prepare($conexao, $sql_delete);
mysqli_stmt_bind_param($stmt, 'i', $id_usuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Insere as novas preferências
$sql_insert = "INSERT INTO preferencia (usuario_idusuario, genero_idgenero) VALUES (?, ?)";
$stmt = mysqli_prepare($conexao, $sql_insert);
foreach ($generos as $id_genero) {
    mysqli_stmt_bind_param($stmt, 'ii', $id_usuario, $id_genero);
    mysqli_stmt_execute($stmt);
}
mysqli_stmt_close($stmt);

// Redireciona
header("Location: ../public/lista_preferencia_usu.php"); // volta pra página de preferências
exit;
