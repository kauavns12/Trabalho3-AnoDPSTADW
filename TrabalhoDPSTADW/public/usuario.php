<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: comunidade.php");
    exit();
}

$idusuvisto = intval($_GET['id']);
$usuariovisto = pesquisarUsuario_ID($conexao, $idusuvisto);
$nomeusuv = $usuariovisto['nome'];
$fotousuv = $usuariovisto['foto'];

if (!$usuariovisto) {
    die("Usuário não encontrado!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo $nomeusuv; ?> - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include 'cabeçalho.php'; ?>
    
    <div class="profile-container">
        <div class="profile-header">
            <h1 class="profile-title"><?php echo $nomeusuv; ?></h1>
            <img src="../controle/fotos/<?php echo $fotousuv; ?>" alt="<?php echo $nomeusuv; ?>" class="profile-avatar">

        </div>
        
        <div class="profile-sections">
            <div class="profile-section">
                <h2 class="section-title">📋 LISTAS</h2>
                <?php
                $listas = listarListaUsu($conexao, $idusuvisto);
                if (count($listas) == 0) {
                    echo '<div class="empty-message">Esse usuário não possui listas criadas</div>';
                } else {
                    echo '<table class="profile-table">';
                    echo '<tr>';
                    echo '<th>Lista</th>';
                    echo '<th>Descrição</th>';
                    echo '<th>Ação</th>';
                    echo '</tr>';
                    
                    foreach ($listas as $lista) {
                        $idlista = $lista['idlista'];
                        $nome = $lista['nome'];
                        $descricao = $lista['descricao'];
                        
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($nome) . '</td>';
                        echo '<td>' . htmlspecialchars($descricao) . '</td>';
                        echo '<td><a href="jogosdalista.php?id=' . $idlista . '" class="view-link"><i class="fas fa-eye"></i> Visualizar</a></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>
            </div>

            <div class="profile-section">
                <h2 class="section-title">⭐ GÊNEROS FAVORITOS</h2>
                <?php
                $preferencias = listarPreferenciaUsu($conexao, $idusuvisto);
                $generos = [];
                
                foreach ($preferencias as $preferencia) {
                    $idgenero = $preferencia['genero_idgenero'];
                    $generos[] = pesquisarGeneroID($conexao, $idgenero);
                }
                
                if (count($generos) == 0) {
                    echo '<div class="empty-message">Esse usuário não possui preferências</div>';
                } else {
                    echo '<table class="profile-table">';
                    echo '<tr>';
                    echo '<th>Gênero</th>';
                    echo '</tr>';
                    
                    foreach ($generos as $genero) {
                        $nome = $genero['nome'];
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($nome) . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>
            </div>

            <div class="profile-section">
                <h2 class="section-title">🎮 JOGOS FAVORITOS</h2>
                <?php
                $jogos = [];
                $favoritos = listarFavoritoUsuario($conexao, $idusuvisto);
                foreach ($favoritos as $favorito) {
                    $idjogo = $favorito['jogo_idjogo'];
                    $jogos[] = pesquisarJogoID($conexao, $idjogo);
                }
                
                if (count($jogos) == 0) {
                    echo '<div class="empty-message">Esse usuário não possui favoritos</div>';
                } else {
                    echo '<table class="profile-table">';
                    echo '<tr>';
                    echo '<th>Foto</th>';
                    echo '<th>Nome</th>';
                    echo '<th>Ação</th>';
                    echo '</tr>';
                    
                    foreach ($jogos as $jogo) {
                        $idjogo = $jogo['idjogo'];
                        $nome = $jogo['nome'];
                        $foto = $jogo['img'];

                        echo '<tr>';
                        echo '<td><img src="../controle/fotos/' . $foto . '" alt="' . htmlspecialchars($nome) . '" class="game-image"></td>';
                        echo '<td>' . htmlspecialchars($nome) . '</td>';
                        echo '<td><a href="jogo.php?id=' . $idjogo . '" class="view-link"><i class="fas fa-eye"></i> Visualizar</a></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>
            </div>
        </div>
        
        <a href="comunidade.php" class="back-button">Voltar para Comunidade</a>
    </div>

</body>
</html>