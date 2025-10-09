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
        <form action="../controle/cadastrarlista.php" method="post">

            <label for="nome">Qual o nome da sua lista?</label> <br>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome da sua lista"> <br><br>


            <label for="descrição">Descrição?</label> <br>
            <input type="text" name="descrição" id="descrição" placeholder="Descreva"> <br><br>


            <label for="situação">Qual a situação da sua lista?</label> <br>
            <select name='situação' id="situação">
                    <option value='0'>Privado</option>;
                    <option value='1'>Público</option>;
            </select> <br><br>



            <input type="submit" value="Publicar">
        </form>
    </div>
</body>