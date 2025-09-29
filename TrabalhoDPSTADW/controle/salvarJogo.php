<?php
require_once "conexao.php";
require_once "funcoes.php";

// Verificar se o diretório fotos existe, se não, criar
$diretorioFotos = "fotos/";
if (!is_dir($diretorioFotos)) {
    mkdir($diretorioFotos, 0755, true);
}

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$desenvolvedor = $_POST['desenvolvedor'];
$data_lanca = $_POST['data_lanca'];
$nome_arquivo = $_FILES['img']['name'];
$caminho_temporario = $_FILES['img']['tmp_name'];
$generos = isset($_POST['genero']) ? $_POST['genero'] : [];

// Validação - máximo 2 gêneros
if (count($generos) > 2) {
    die("Erro: Máximo de 2 gêneros permitido.");
}

// Validação - pelo menos 1 gênero
if (count($generos) == 0) {
    die("Erro: Selecione pelo menos um gênero.");
}

// Verificar se o arquivo foi enviado
if ($_FILES['img']['error'] !== UPLOAD_ERR_OK) {
    die("Erro no upload da imagem: " . $_FILES['img']['error']);
}

// pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

// gera um novo nome para o arquivo
$novo_nome = uniqid() . "." . $extensao;

// criando um novo caminho para o arquivo
$caminho_destino = $diretorioFotos . $novo_nome;

// movendo o arquivo para o servidor
if (!move_uploaded_file($caminho_temporario, $caminho_destino)) {
    die("Erro ao mover o arquivo. Verifique as permissões do diretório.");
}

// Converter IDs para inteiros
$ids_generos = array_map('intval', $generos);

$sucesso = salvarJogo($conexao, $nome, $descricao, $desenvolvedor, $data_lanca, $novo_nome, $ids_generos);

if ($sucesso) {
    header("Location: ../public/formJogo.php?sucesso=1");
} else {
    header("Location: ../public/formJogo.php?erro=1");
}
exit();
?>