<?php
// editarUsuario.php
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

session_start();

// aqui pegue o id do usuário logado da sessão
$id_usuario = $_SESSION['idusuario'];

// busca dados do usuário
$sql = "SELECT * FROM usuario WHERE idusuario = $id_usuario";
$resultado = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Dados</title>
</head>
<body>
<form action="../controle/atualizarUsuario.php" method="post" enctype="multipart/form-data">
    <!-- precisamos mandar o id para saber quem atualizar -->
    <input type="hidden" name="idusuario" value="<?php echo $usuario['idusuario']; ?>">

    Nome:<br>
    <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"><br><br>

    E-mail:<br>
    <input type="text" name="gmail" value="<?php echo $usuario['gmail']; ?>"><br><br>

    Nova Senha (deixe em branco se não quiser mudar):<br>
    <input type="password" name="senha"><br><br>

    Foto:<br>
    <input type="file" name="foto"><br>
    (Foto atual: <img src="../controle/fotos/<?php echo $usuario['foto']; ?>" width="50">)<br><br>

    <input type="submit" value="Salvar alterações">
</form>
</body>
</html>