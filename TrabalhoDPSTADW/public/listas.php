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
    <a href="formLista.php">Criar nova lista</a>
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
        foreach ($lista_lista as $lista) {
            $idlista = $lista['idlista'];
            $nome = $lista['nome'];
            $descricao = $lista['descricao'];
            $situacao = $lista['situacao'];

            echo "<tr>";
            echo "<td>$nome</td>";
            echo "<td>$descricao</td>";
            echo "<td>$situacao</td>";

            echo "<td><a href='../controle/deletarUsuario.php?idlista=$idlista'>Excluir lista</a></td>";
            echo "<td><a href='formUsuario.html?id=$idlista'>Editar lista</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
         <td><a href='home.php'>Voltar</a></td>

</body>

</html>