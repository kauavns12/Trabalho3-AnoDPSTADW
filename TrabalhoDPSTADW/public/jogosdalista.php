<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$idlista = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/stilinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



</head>


<body>
    <?php include 'cabeçalho.php'; ?>

<?php

$jogoslista = listarJogosDaLista($conexao, $idlista);

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

            echo "<td><a href='/jogosdalista.php?idlista=$idlista'>Visualizar lista</a></td>";
            echo "<td><a href='../controle/deletarLista.php?idlista=$idlista'>Excluir lista</a></td>";
            echo "<td><a href='formJogoLista.php?id=$idlista'>Adicione um novo jogo na lista</a></td>";
            echo "</tr>";
        }
    }
?>

</body>