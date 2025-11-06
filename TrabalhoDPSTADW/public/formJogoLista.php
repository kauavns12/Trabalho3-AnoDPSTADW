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
    <link rel="stylesheet" href="./estilo/estilo_formJogoLista.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<?php include 'cabeçalho.php'; ?>

<body>
    <div class="page-container">
        <h1 class="page-title">Adicionar Jogo à Lista</h1>
        
        <div class="form-container">
            <form action="../controle/cadastrarjogolista.php?id=<?php echo $idlista; ?>" method="POST">
                <input type="hidden" name="lista" value="<?php echo $idlista?>">

                <label for="jogo" class="form-label">Qual jogo você quer adicionar?</label>
                <select name='jogo' id="jogo" class="form-select">
                    <?php 
                    $jogos = listarJogo($conexao);

                    if (count($jogos) == 0) {
                        echo "<option value=''>Nenhum jogo disponível</option>";
                    } else {
                        foreach ($jogos as $jogo) {
                            $idjogo = $jogo['idjogo'];
                            $nome = $jogo['nome'];
                            echo "<option value='$idjogo'>$nome</option>";
                        }
                    }
                    ?>
                </select>

                <input type="submit" value="Adicionar à Lista" class="submit-btn">
            </form>
        </div>
        
        <?php if (count($jogos) == 0): ?>
            <div class="empty-message">
                Não existem jogos disponíveis para adicionar à lista
            </div>
        <?php endif; ?>
    </div>
</body>
</html>