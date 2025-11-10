<?php
require_once "verificarLogado.php";
require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    $nome = trim($_POST['nome']);
    
    if (empty($nome)) {
        die("Erro: Nome do gênero não pode estar vazio.");
    }
    
    if (strlen($nome) < 3) {
        die("Erro: Nome do gênero deve ter pelo menos 3 caracteres.");
    }
    
    $resultado = salvarGenero($conexao, $nome);
    
    if ($resultado) {
        echo "sucesso";
    } else {
        echo "Erro ao salvar gênero no banco de dados.";
    }
} else {
    echo "Método não permitido.";
}
?>