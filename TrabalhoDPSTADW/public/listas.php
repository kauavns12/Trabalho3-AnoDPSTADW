<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas</title>
</head>

<body>
    <div>
    <a href="criarlista.php">Criar nova lista</a>
    </div> <br> <br>

    <?php
    $lista_lista = listarLista($conexao);

    if (count($lista_lista) == 0) {
        echo "Não existem listas criadas";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Nome</td>
                <td>Usuario</td>
                <td>Descrição</td>
                <td>Situação</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_usuario as $usuario) {
            $idlista = $usuario['idusuario'];
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