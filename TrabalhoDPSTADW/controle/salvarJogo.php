<?php
require_once "conexao.php";
require_once "funcoes.php";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$desenvolvedor = $_POST['desenvolvedor'];
$data_lanca = $_POST['data_lanca'];
$caminho_temporario = $_FILES['foto']['tmp_name'];


// pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

//gera um novo nome para o arquivo
$novo_nome = uniqid() . "." . $extensao;

//criando um novo caminho para o arquivo (usando o endereço da página)
//lembre-se de criar a pasta "fotos/" dentro da pasta "codigo".
//deve ajustar as permissões da pasta "fotos".
$caminho_destino = "fotos/" . $novo_nome;

//movendo o arquivo para o servidor
move_uploaded_file($caminho_temporario, $caminho_destino);


cadastrarUsuario($conexao, $nome, $gmail, $senha, $novo_nome, $tipo);


header("Location: ../public/formJogo.php");
?>
