<?php
require_once "../controle/verificarLogado.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_jogos.css">
</head>

<body>
    <?php include 'cabeçalho.php'; 
 
if (isset($_GET["valor"]) && !empty($_GET["valor"])){
     $valor = $_GET["valor"];
     require_once "../controle/conexao.php";
     require_once "../controle/funcoes.php";

     
     $jogos  = pesquisarJogoNome($conexao,$valor);

    if (count($jogos) == 0){
        echo "Nenhum jogo encontrado";
    } else {
        echo "<br> <table border='1'>";
        echo "<tr>";
        echo "<th> Nome </th>";
        echo "<th> Foto </th>";
        echo "<th> Ação </th>";
        echo "<tr>";
        foreach ($jogos as $jogo){
            $idjogo = $jogo['idjogo'];
            $fotoi = $jogo['img'];
            echo "<tr>";
            echo "<td>" . $jogo["nome"]  . "</td>";
            echo "<td><img src='../controle/fotos/$fotoi'></td>";
            echo "<td><a href='jogo.php?id=$idjogo'><i class='fas fa-eye'></i> Visualizar</a></td>";
            echo "<tr>";
        }
    }
}
?>




<?php

if (isset($_GET["valor"]) && !empty($_GET["valor"])){
     $valor = $_GET["valor"];
     require_once "../controle/conexao.php";
     require_once "../controle/funcoes.php";

     
     $usuarios  = pesquisarUsuario_Nome($conexao,$valor);

    if (count($usuarios) == 0){
        echo "Nenhum jogo encontrado";
    } else {
        echo "<br> <table border='1'>";
        echo "<tr>";
        echo "<th> Nome </th>";
        echo "<th> Foto </th>";
        echo "<th> Ação </th>";
        echo "<tr>";
        foreach ($usuarios as $usuario){
            $idusu = $usuario['idjogo'];
            $fotou = $usuario['foto'];
            echo "<tr>";
            echo "<td>" . $jogo["nome"]  . "</td>";
            echo "<td><img src='../controle/fotos/$fotou'></td>";
            echo "<td><a href='usuario.php?id=$idusu'><i class='fas fa-eye'></i> Visualizar</a></td>";
            echo "<tr>";
        }
    }
}

?>

<?php
pesquisarConquistaNome($conexao,$valor);



?>



//pesquisarPostConteudo($conexao,$valor);

</body>