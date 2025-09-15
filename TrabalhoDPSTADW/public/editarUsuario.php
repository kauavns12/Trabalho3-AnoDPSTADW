<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

// Verificar se o ID do usuário foi passado pela URL
if (isset($_GET['idusuario'])) {
    $idusuario = $_GET['idusuario'];
     // Consultar os dados do usuário no banco de dados
    $query = "SELECT * FROM usuario WHERE idusuario = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $idusuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    // Verificar se o usuário foi encontrado
    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID do usuário não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados Pessoais</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form id="formulario" action="atualizar_dados.php" method="post" enctype="multipart/form-data">
        <h1>Editar Dados Pessoais</h1>

        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        Nome: <br>
        <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br><br>

        E-mail: <br>
        <input type="email" name="gmail" value="<?= $usuario['gmail'] ?>" required><br><br>

        Confirmar e-mail: <br>
        <input type="email" name="gmail2" value="<?= $usuario['gmail'] ?>" required><br><br>

        Senha: <br>
        <input type="password" name="senha" id="senha" required><br><br>

        Confirmar senha: <br>
        <input type="password" name="senha2" id="senha2" required><br><br>

        Foto: <br>
        <input type="file" name="foto" id="foto"><br><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>

?>

