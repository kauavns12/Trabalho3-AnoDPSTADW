<?php
require_once "conexao.php"; // Arquivo de conexão com o banco de dados

// Verificar se os dados foram enviados pelo formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idusuario = $_POST['idusuario'];
    $nome = $_POST['nome'];
    $gmail = $_POST['gmail'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];
    
    // Verificar se a senha foi alterada
    if ($senha && $senha === $senha2) {
        $senha = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha
    } else {
        // Caso não tenha alterado a senha, mantenha a anterior
        // (Aqui você poderia buscar a senha antiga no banco de dados, se necessário)
        $senha = ""; 
    }

    // Atualizar os dados no banco
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        // Processar a foto
        $nome_arquivo = $_FILES['foto']['name'];
        $caminho_temporario = $_FILES['foto']['tmp_name'];
        $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
        $novo_nome = uniqid() . "." . $extensao;
        $caminho_destino = "fotos/" . $novo_nome;
        move_uploaded_file($caminho_temporario, $caminho_destino);

        // Atualizar o caminho da foto
        $foto = $novo_nome;
    } else {
        // Caso o usuário não envie uma nova foto, mantenha a foto antiga
        // Aqui você deve buscar o nome da foto atual do banco de dados, se necessário
        $foto = ""; 
    }

    // Atualizar no banco de dados
    $query = "UPDATE usuario SET nome = ?, gmail = ?, senha = ?, foto = ? WHERE idusuario = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ssssi", $nome, $gmail, $senha, $foto, $id);
    $stmt->execute();

    // Redirecionar para a página de perfil ou outra página
    header("Location: ../public/home.php");
}
?>