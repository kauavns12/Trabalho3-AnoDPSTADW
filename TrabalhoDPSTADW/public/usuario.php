<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

// Verifica se o ID do usuario visto veio
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: comunidade.php");
    exit();
}

$idusuvisto = intval($_GET['id']);

// Busca os dados do usuario visto
$usuariovisto = pesquisarUsuario_ID($conexao, $idusuvisto);
            $nomeusuv = $usuariovisto['nome'];
            $fotousuv = $usuariovisto['foto'];
        
// Verifica se o usuário !VISTOOOO! existe
if (!$usuariovisto) {
    die("Jogo não encontrado!");
}

// Buscar dados adicionais
$listas = listarListaUsu($conexao, $idusuvisto);
$preferencias = listarPreferenciaUsu($conexao, $idusuvisto);
$generos = [];
foreach ($preferencias as $preferencia) {
            $idgenero = $preferencia['genero_idgenero'];
            $generos[] = pesquisarGeneroID($conexao, $idgenero);
            
        }
$jogos = [];
$favoritos = listarFavoritoUsuario($conexao, $idusuvisto);
foreach ($favoritos as $favorito) {
            $idjogo = $favorito['jogo_idjogo'];

            $jogos[] = pesquisarJogoID($conexao, $idjogo);
        }
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <?php include 'cabeçalho.php'; ?>

    <div>
        <h1><?php echo $nomeusuv; ?></h1>
    </div>

    <div>
        <div>
            <img src="../controle/fotos/ <?php $foto ?>">
        </div>
    </div>
    <div>
        <div>
            <?php
            if (count($listas) == 0) {
                echo "Esse usuário não possui listas criadas";
            } else {
                ?>
                <table border="1">
                    <tr>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td colspan="2">Ação</td>
                    </tr>
                    <?php
                    foreach ($listas as $lista) {
                        $idlista = $lista['idlista'];
                        $nome = $lista['nome'];
                        $descricao = $lista['descricao'];

                        echo "<tr>";
                        echo "<td>$nome</td>";
                        echo "<td>$descricao</td>";
                        ;
                        echo "<td><a href='.php?id=$idlista'>Visualizar</a></td>";
                        echo "</tr>";
                    }
            }
            ?>
        </div>

        <div>
            <?php
            if (count($generos) == 0) {
                echo "Esse usuário não possui preferencias";
            } else {
                ?>
                <table border="1">
                    <tr>
                        <td>Nome</td>
                        <td colspan="2">Ação</td>
                    </tr>
                    <?php
                    foreach ($generos as $genero) {
                        $idgenero = $genero['idgenero'];
                        $nome = $genero['nome'];

                        echo "<tr>";
                        echo "<td>$nome</td>";
                        echo "<td><a href='.php?id=$idlista'>Visualizar</a></td>";
                        echo "</tr>";
                    }
            }
            ?>
        </div>
        <div>
            <?php
            if (count($jogos) == 0) {
                echo "Esse usuário não possui favoritos";
            } else {
                ?>
                <table border="1">
            <tr>
                <td>FOTO</td>
                <td>NOME</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($jogos as $jogo) {
            $idjogo = $jogo['idjogo'];
            $nome = $jogo['nome'];
            $foto = $jogo['img'];

            echo "<tr>";
            echo "<td><img src='../controle/fotos/$foto'></td>";
            echo "<td>$nome</td>";
            echo "<td><a href='jogo.php?id=$idjogo'>Visualizar</a></td>";
            echo "</tr>";
        }
            }
            ?>
        </div>
    </div>
</body>

</html>