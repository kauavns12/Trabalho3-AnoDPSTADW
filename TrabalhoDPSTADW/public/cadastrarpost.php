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
        <form action="../controle/cadastrarpost.php" method="post">

            <label for="idtopico_forun">Em qual tópico você quer postar?</label> <br>
            <select name='idtopico_forun' id="idtopico_forun">
                <?php
                $topicos = listarTopico($conexao);

                foreach ($topicos as $topico) {
                    $id = $topico['idtopico_forun'];
                    $nome = $topico['nome'];
                    echo "<option value='$id'>$nome</option>";
                }
                ?>
            </select> <br><br>
            <label for="conteudo">Qual o conteúdo do post?</label> <br>
            <input type="text" name="conteudo" id="conteudo" placeholder="Digite o conteúdo da sua postagem..."> <br><br>
            <input type="submit" value="Publicar">
        </form>
    </div>
</body>

