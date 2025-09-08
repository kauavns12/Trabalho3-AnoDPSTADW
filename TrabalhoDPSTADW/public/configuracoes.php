<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id = $_SESSION['id_usuario'];
pesquisarUsuario_ID($conexao, $id);
$foto = $user['foto'];
$nome = $user['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/stilinho.css">

    
</head>

<body>
















</body>