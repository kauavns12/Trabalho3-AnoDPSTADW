<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['idusuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'cabeçalho.php'; ?>
<body>
    <div>
        <a href="editarUsuario.php?id" class="nav-button signup-btn" target="bodyiframe">Editar Dados Pessoais</a>
    </div> <br> <br>

     <div>
        <a href="listarUsuario_adm.php?id" class="nav-button signup-btn" target="bodyiframe">Usuários Cadastrados</a>
    </div> <br> <br>
    <div>
        <a href="listas.php?id" class="nav-button signup-btn" target="bodyiframe">Acessar as listas</a>
    </div> <br> <br>

    <div>
        <a href="../controle/deletarconta.php?id" class="nav-button signup-btn" target="bodyiframe">Deletar Conta</a>
    </div> <br> <br>

    <div>
        <a href="lista_preferencia_usu.php" class="nav-button signup-btn" target="bodyiframe">Listar Preferências do Usuário</a>
    </div> <br> <br>
    <div>
        
    <br><br>
    <div>
        <td><a href='home.php'>Voltar</a></td>
    </div>
    <br><br>
</body>

</html>