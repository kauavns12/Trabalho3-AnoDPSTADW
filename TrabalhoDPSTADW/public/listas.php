<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['idusuario'];

if (isset($_GET['error']) && $_GET['error'] === 'jaexiste') {
    echo "<div class='alert-message alert-error'>Este jogo já está na sua lista.</div>";
}

if (isset($_GET['success']) && $_GET['success'] === 'adicionado') {
    echo "<div class='alert-message alert-success'>Jogo adicionado com sucesso!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas</title>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_listas.css">
</head>

<?php include 'cabeçalho.php'; ?>
    
<body>
    <div class="page-container">
        <h1 class="page-title">Minhas Listas</h1>
        
        <div class="create-list-container">
            <a href="formLista.php" class="create-list-btn">Criar nova lista</a>
        </div>

        <?php
        $lista_lista = listarListaUsu($conexao,$id_usuario);

        if (count($lista_lista) == 0) {
            echo "<div class='empty-state'>Não existem listas criadas</div>";
        } else {
        ?>
            <div class="table-container">
                <table class="lists-table">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>DESCRIÇÃO</th>
                            <th>SITUAÇÃO</th>
                            <th colspan="3">AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($lista_lista as $lista) {
                        $idlista = $lista['idlista'];
                        $nome = $lista['nome'];
                        $descricao = $lista['descricao'];
                        $situacao = $lista['situacao'];

                        $sitnome = $situacao == 0 ? 'Privado' : 'Público';
                        $sitclass = $situacao == 0 ? 'situation-private' : 'situation-public';

                        echo "<tr>";
                        echo "<td>$nome</td>";
                        echo "<td>$descricao</td>";
                        echo "<td><span class='situation-badge $sitclass'>$sitnome</span></td>";

                        echo "<td><a href='jogosdalista.php?id=$idlista' class='action-link action-view'>Visualizar</a></td>";
                        echo "<td><a href='../controle/deletarLista.php?idlista=$idlista' class='action-link action-delete'>Excluir</a></td>";
                        echo "<td><a href='formJogoLista.php?id=$idlista' class='action-link action-add'>Adicionar Jogo</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        
        <a href='configuracoes.php' class='back-button'>Voltar</a>
    </div>
</body>
</html>