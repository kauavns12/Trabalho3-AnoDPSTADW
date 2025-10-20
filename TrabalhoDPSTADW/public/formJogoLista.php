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
    <link rel="stylesheet" href="./estilo/stilinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



</head>

<?php include 'cabeçalho.php'; ?>

<body>
<div>
        <form action="../controle/cadastrarjogolista.php?id=<?php echo $idlista; ?>" method="POST">

            <label for="jogo">Qual jogo você quer adicionar?</label> <br>
            <select name='jogo' id="jogo">
                <?php 
                $jogos = listarJogo($conexao);

                if (count($jogos) == 0) {
                echo "Esse usuário não possui listas criadas";
            } else {
                
                    foreach ($jogos as $jogo) {
                        $idjogo = $jogo['idjogo'];
                        $nome = $jogo['nome'];

                      echo "<option value=$idjogo >$nome</option>";
                    }
                }
                
                ?>
            </select> <br><br>
            <label> <br>

            <input type="submit" value="Publicar">
        </form>
    </div>
    

</body>