<?php
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

session_start(); // importante para poder mexer na sessão

// pegar dados do form
$id = $_POST['idusuario'];
$nome = $_POST['nome'];
$gmail = $_POST['gmail'];
$senha = $_POST['senha']; // pode estar vazio

// buscar foto atual
$sqlFoto = "SELECT foto FROM usuario WHERE idusuario=$id";
$resFoto = mysqli_query($conexao, $sqlFoto);
$dadosFoto = mysqli_fetch_assoc($resFoto);
$foto = $dadosFoto['foto'];

// se usuário enviou nova foto
if(!empty($_FILES['foto']['name'])){
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novo_nome = uniqid() . "." . $extensao;
    $caminho_destino = "fotos/" . $novo_nome;
    move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_destino);
    $foto = $novo_nome; // substitui a foto atual
}

// se usuário digitou nova senha, criptografa e atualiza
if(!empty($senha)){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    editarUsuario($conexao, $nome, $gmail, $senha, $id, $foto);
}else{
    editarUsuario($conexao, $nome, $gmail, $senha, $id, $foto);
}


// --- ATUALIZA A SESSÃO ---
$_SESSION['nome'] = $nome;
$_SESSION['gmail'] = $gmail;
if (!empty($_FILES['foto']['name'])) {
    $_SESSION['foto'] = $foto;
}


// redireciona para home
header("Location: ../public/configuracoes.php");
exit;
?>