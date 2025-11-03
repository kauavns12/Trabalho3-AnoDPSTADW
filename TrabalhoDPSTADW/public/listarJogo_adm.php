<?php
require_once "../controle/verificarLogado.php";


if ($_SESSION['tipo'] == 'c') {
    header("Location: home.php");
}
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
    <h1>Lista de Jogos Cadastrados</h1>

    <?php
    require_once "../controle/conexao.php";
    require_once "../controle/funcoes.php";

    $lista_jogos = listarJogo($conexao);

    if (count($lista_jogos) == 0) {
        echo "Não existem jogos cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Descricao</td>
                <td>Desenvolvedor</td>
                <td>Data de lançamento</td>
                <td>Foto</td>
                <td colspan="2">Ações</td>
            </tr>
        <?php
        foreach ($lista_jogos as $jogo) {
            $idjogo = $jogo['idjogo'];
            $nome = $jogo['nome'];
            $descricao = $jogo['descricao'];
            $foto = $jogo['foto'];
            $desenvolvedor = $jogo['desenvolvedor'];
            $data = $jogo['data_lanca'];

            echo "<tr>";
            echo "<td>$idjogo</td>";
            echo "<td>$nome</td>";
            echo "<td>$descricao</td>";
            echo "<td>$desenvolvedor</td>";
            echo "<td>$data</td>";
            echo "<td><img src='../controle/fotos/$foto'></td>";
            echo "<td><a href='../controle/deletarJogo.php?idjogo=$idjogo'>Excluir</a></td>";
            echo "<td><a href='editarJogo.php?id=$idjogo'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>

        <td><a href='configuracoes.php'>Voltar</a></td>
</body>

</html>