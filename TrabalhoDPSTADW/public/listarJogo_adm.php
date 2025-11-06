<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

if ($_SESSION['tipo'] == 'c') {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogos - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_listaJogoDM.css">
</head>

<body>
    <?php include 'cabeçalho.php'; ?>

    <div class="page-container">
        <div class="page-header">
            <h1 class="page-title">Lista de Jogos Cadastrados</h1>
            <a href="formJogo.php" class="add-button">
                <i class="fas fa-plus"></i> Cadastrar Jogo
            </a>
        </div>
        
        <div class="table-container">
            <?php
            $lista_jogos = listarJogo($conexao);

            if (count($lista_jogos) == 0) {
                echo "<div class='no-results'>Não existem jogos cadastrados</div>";
            } else {
            ?>
                <table class="games-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Desenvolvedor</th>
                            <th>Data de lançamento</th>
                            <th>Foto</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($lista_jogos as $jogo) {
                        $idjogo = $jogo['idjogo'];
                        $nome = $jogo['nome'];
                        $descricao = $jogo['descricao'];
                        $foto = $jogo['img'];
                        $desenvolvedor = $jogo['desenvolvedor'];
                        $data = $jogo['data_lanca'];
                    ?>
                        <tr>
                            <td><?php echo $idjogo; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td class="game-description"><?php echo $descricao; ?></td>
                            <td><?php echo $desenvolvedor; ?></td>
                            <td><?php echo $data; ?></td>
                            <td><img src="../controle/fotos/<?php echo $foto; ?>" class="game-image"></td>
                            <td class="action-cell">
                                <a href="../controle/deletarJogo.php?idjogo=<?php echo $idjogo; ?>" class="delete-button">
                                    <i class="fas fa-trash"></i> Excluir
                                </a>
                            </td>
                            <td class="action-cell">
                                <a href="editarJogo.php?idjogo=<?php echo $idjogo; ?>" class="edit-button">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
        
        <a href="configuracoes.php" class="back-button">Voltar</a>
    </div>

</body>

</html>