<?php
$conexao = new mysqli("host", "usuario", "senha", "mydb");

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$resultado = salvarUsuario($conexao, "João Silva", "joao@example.com", "senha123");

if ($resultado['status'] === 'sucesso') {
    echo $resultado['mensagem'];
} else {
    echo "Erro: " . $resultado['mensagem'];
}

$conexao->close();
?>