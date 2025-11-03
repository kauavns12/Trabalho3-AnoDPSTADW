<?php

require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";

$idjogo = $_GET['idjogo'];
$generos = listarGenero($conexao);
$jogos = pesquisarJogoID($conexao, $idjogo);

if (count($jogos) == 0) {
        echo "Não existem jogos cadastrados";
        header('Location: home.php');
    } else {
    
        foreach ($jogos as $jogo) {
            $id = $jogo['idjogo'];
            $nome = $jogo['nome'];
            $descricao = $jogo['descricao'];
            $foto = $jogo['foto'];
            $desenvolvedor = $jogo['desenvolvedor'];
            $data = $jogo['data_lanca'];
        }}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
    <link rel="stylesheet" href="./estilo/estilo_formJogo.css">
    <script src="../controle/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="../controle/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">

</head>
<?php include 'cabeçalho.php'; ?>
<body> 
    
    <form action="../controle/editarJogo.php?idjogo=<?php $id ?>" method="post" enctype="multipart/form-data" class="form-container" id="formulario">
        <div class="form-header">
            <h1>Cadastro de Jogo</h1>
        </div>
        
        <div class="form-body">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="<?php echo $nome ?>">
            </div>
            
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" id="descricao" placeholder="<?php echo $descricao ?>">
            </div>
            
            <div class="form-group">
                <label for="desenvolvedor">Desenvolvedor:</label>
                <input type="text" name="desenvolvedor" id="desenvolvedor" placeholder="<?php echo $desenvolvedor ?>">
            </div>
            
            <div class="form-group">
                <label for="data_lanca">Lançamento:</label>
                <input type="date" name="data_lanca" id="data_lanca" placeholder="<?php echo $data ?>">
            </div>
            
            <div class="form-group">
                <label for="img">Foto:</label>
                <input type="file" name="img" id="img" placeholder="<?php echo $foto ?>" accept="image/*">
            </div>
            
            <div class="form-group">
                <label>Gênero: <span class="selected-limit">(Selecione até 2 opções)</span></label>
                <div class="generos-container" id="generos-container">
                    <?php foreach ($generos as $genero): ?>
                    <div class="genero-option">
                        <input type="checkbox" name="genero[]" value="<?php echo $genero['idgenero']; ?>" id="genero-<?php echo $genero['idgenero']; ?>">
                        <label for="genero-<?php echo $genero['idgenero']; ?>"><?php echo htmlspecialchars($genero['nome']); ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="submit" class="btn-submit">Editar Jogo</button>
        </div>
    </form>

    
</body>
</html>