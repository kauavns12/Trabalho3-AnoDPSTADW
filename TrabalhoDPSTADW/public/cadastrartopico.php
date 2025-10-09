<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

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
<?php include 'cabeçalho.php'; ?>
<body>
<div class="espacinho">
        <form action="../controle/cadastrartopicopost.php" method="post">

            <label for="categoria_forun">Selecione a categoria do tópico</label> <br>
            <select name='categoria_forun' id="categoria_forun">
                <?php
                $categoria = listarCategoria($conexao);

                foreach ($categoria as $categoria) {
                    $idc = $categoria['idcategoria_forun'];
                    $nomec = $categoria['nome'];
                    echo "<option value='$idc'>$nomec</option>";
                }
                ?> </select> <br>

            <label for="jogo_forun">Selecione o jogo do tópico</label> <br>
            <select name='jogo_forun' id="jogo_forun">
                <?php
                $joogo = listarJogo($conexao);

                foreach ($joogo as $joogo) {
                    $idj = $joogo['idjogo'];
                    $nomej = $joogo['nome'];
                    echo "<option value='$idj'>$nomej</option>";
                }
                ?>
            </select> <br><br>
            <label for="nome">Qual o nome do tópico?</label> <br>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome do tópico..."> <br><br>
            <label for="conteudo">Qual o conteúdo do Tópico</label> <br>
            <input type="text" name="conteudo" id="conteudo" placeholder="Digite o conbteúdo do seu Tópico..."> <br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>