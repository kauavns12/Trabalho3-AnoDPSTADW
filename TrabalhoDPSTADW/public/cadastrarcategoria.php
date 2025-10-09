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
        <form action="../controle/cadastarcategoriapost.php" method="post">

            <label for="nomec">Qual o nome da categoria?</label> <br>
            <input type="text" name="nomec" id="nomec" placeholder="Digite o nome da categoria..."> <br><br>
            <label for="descrição">Qual o conteúdo da categoria</label> <br>
            <input type="text" name="descrição" id="descrição" placeholder="Descreva a categoria..."> <br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>