<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarLogado.php";


$idjogo = $_GET['idjogo'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$desenvolvedor = $_POST['desenvolvedor'];
$data_lanca = $_POST['data_lanca'];
$nome_arquivo = $_FILES['img']['name'];
$caminho_temporario = $_FILES['img']['tmp_name'];
$generos = $_POST['genero'];



// Validação - máximo 2 gêneros
if (count($generos) > 2) {
    die("Erro: Máximo de 2 gêneros permitido.");
}

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

// Converter IDs para inteiros
$ids_generos = array_map('intval', $generos);

editarJogo($conexao, $idjogo, $nome, $descricao, $desenvolvedor, $data_lanca, $novo_nome, $ids_generos);

header("Location: ../public/jogos.php");
?>