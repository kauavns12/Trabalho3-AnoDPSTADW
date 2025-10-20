<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['idusuario'];

if (isset($_GET['error']) && $_GET['error'] === 'jaexiste') {
    echo "<p style='color: red;'>Este jogo já está na sua lista.</p>";
}

if (isset($_GET['success']) && $_GET['success'] === 'adicionado') {
    echo "<p style='color: green;'>Jogo adicionado com sucesso!</p>";
}
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
    $lista_lista = listarListaUsu($conexao,$id_usuario);

    if (count($lista_lista) == 0) {
        echo "Não existem listas criadas";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Nome</td>
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

            if ($situacao == 0) {
                $sitnome = 'Privado';
            } else {
                $sitnome = 'Público';
            }

            echo "<tr>";
            echo "<td>$nome</td>";
            echo "<td>$descricao</td>";
            echo "<td>$sitnome</td>";

            echo "<td><a href='../controle/deletarLista.php?idlista=$idlista'>Excluir lista</a></td>";
            echo "<td><a href='formJogoLista.php?id=$idlista'>Adicione um novo jogo na lista</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
         <td><a href='home.php'>Voltar</a></td>

</body>

</html>