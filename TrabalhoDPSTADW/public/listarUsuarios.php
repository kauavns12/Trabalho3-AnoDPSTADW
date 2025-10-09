<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<?php include 'cabeçalho.php'; ?>
<body>
    <h1>Lista de Usuário</h1>

    <?php
    $lista_usuario = listarUsuario($conexao);

    if (count($lista_usuario) == 0) {
        echo "Não existem clientes cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>EMAIL</td>
                <td>SENHA</td>
                <td>FOTO</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_usuario as $usuario) {
            $idusuario = $usuario['idusuario'];
            $nome = $usuario['nome'];
            $email = $usuario['gmail'];
            $senha = $usuario['senha'];
            $foto = $usuario['foto'];

            echo "<tr>";
            echo "<td>$idusuario</td>";
            echo "<td>$nome</td>";
            echo "<td>$email</td>";
            echo "<td>$senha</td>";
            echo "<td><img src='fotos/$foto'></td>";
            echo "<td><a href='../controle/deletarUsuario.php?idusuario=$idusuario'>Excluir</a></td>";
            echo "<td><a href='formUsuario.html?id=$idusuario'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
</body>

</html>









