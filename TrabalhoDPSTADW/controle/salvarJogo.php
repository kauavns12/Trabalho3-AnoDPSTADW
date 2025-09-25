<?php
require_once "conexao.php";
require_once "funcoes.php";

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Erro: Método não permitido.");
}

// Verificar se todos os campos obrigatórios foram enviados
$camposObrigatorios = ['nome', 'descricao', 'desenvolvedor', 'data_lanca'];
foreach ($camposObrigatorios as $campo) {
    if (!isset($_POST[$campo]) || empty(trim($_POST[$campo]))) {
        die("Erro: Campo '$campo' não preenchido.");
    }
}

$nome = trim($_POST['nome']);
$descricao = trim($_POST['descricao']);
$desenvolvedor = trim($_POST['desenvolvedor']);
$data_lanca = $_POST['data_lanca'];
$generos = isset($_POST['genero']) ? $_POST['genero'] : [];

// Validação - máximo 2 gêneros
if (count($generos) > 2) {
    die("Erro: Máximo de 2 gêneros permitido.");
}

// Validação - pelo menos 1 gênero
if (count($generos) === 0) {
    die("Erro: Selecione pelo menos 1 gênero.");
}

// Processar a imagem
$novo_nome = null;
if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $nome_arquivo = $_FILES['img']['name'];
    $caminho_temporario = $_FILES['img']['tmp_name'];
    $tamanho_arquivo = $_FILES['img']['size'];
    
    // Verificar se é um arquivo de imagem válido
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
    
    if (!in_array($extensao, $extensoes_permitidas)) {
        die("Erro: Apenas arquivos JPG, JPEG, PNG, GIF e WEBP são permitidos.");
    }
    
    // Verificar tamanho do arquivo (máximo 5MB)
    if ($tamanho_arquivo > 5 * 1024 * 1024) {
        die("Erro: O arquivo é muito grande. Tamanho máximo: 5MB.");
    }
    
    // Gerar um novo nome para o arquivo
    $novo_nome = uniqid() . "." . $extensao;
    $caminho_destino = "fotos/" . $novo_nome;
    
    // Criar diretório se não existir
    if (!is_dir('fotos')) {
        mkdir('fotos', 0755, true);
    }
    
    // Mover o arquivo para o servidor
    if (!move_uploaded_file($caminho_temporario, $caminho_destino)) {
        die("Erro: Não foi possível salvar a imagem.");
    }
} else {
    die("Erro: Imagem não enviada ou com erro.");
}

// Converter IDs para inteiros
$ids_generos = array_map('intval', $generos);

// Salvar o jogo e suas relações com gêneros
$resultado = salvarJogo($conexao, $nome, $descricao, $desenvolvedor, $data_lanca, $novo_nome, $ids_generos);

if ($resultado) {
    header("Location: ../public/formJogo.php?sucesso=1");
} else {
    header("Location: ../public/formJogo.php?erro=1");
}
exit();
?>