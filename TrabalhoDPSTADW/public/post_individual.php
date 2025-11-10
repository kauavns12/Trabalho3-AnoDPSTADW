<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";
$idpost = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/estilo_postIndividual.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">


</head>

<body>
    
    <?php include 'cabeçalho.php'; ?>
    <br><br><br>

    <?php

        // echo "<pre>";
        // print_r(pesquisarPostID($conexao, $idpost));
        // echo "</pre>";
        
        // echo "<pre>";
        // print_r(ListarComentarioPost($conexao, $idpost));
        // echo "</pre>";
        $posts = [];
        $posts[] = pesquisarPostID($conexao, $idpost);
        
        if((!$posts)){
            echo "Não foi possível identificar o post. Retorne a página e tente rever o post.";
        } else {

            ?>

        <table border="1">
            <tr>
                <td>Usuário</td>
                <td>Foto</td>
                <td>Tópico</td>
                <td>Conteúdo</td>
            </tr>
        <?php
        foreach ($posts as $post) {

            $idp_forum = $post['idpost_forun'];
            $conteudo = $post['conteudo'];
            $idusu = $post['usuario_idusuario'];
            $idtop = $post['topico_forun_idtopico_forun'];

            $usuarioinfo = pesquisarUsuario_ID($conexao, $idusu);
            $nome = $usuarioinfo['nome'];
            $foto = $usuarioinfo['foto'];
            
            $topico_info = pesquisarTopico_ID($conexao, $idtop);
            $nometopico = $topico_info['nome_topico'];


            echo "<tr>";
            echo "<td>$nome</td>";
            echo "<td><img src='../controle/fotos/$foto'></td>";
            echo "<td>$nometopico</td>";
            echo "<td>$conteudo</td>";
            echo "</tr>";
        }
    }
        ?>
        </table>

        <?php 
        
        $comentarios = ListarComentarioPost($conexao, $idpost);
        
        if(count($comentarios)==0){
            echo "Não foi possível encontrar os comentarios do post. Recarregue a página ou solicite uma manutenção.";
        } else {

            ?>

        <table border="1">
            <tr>
                <td>Comentário</td>
            </tr>
        <?php
        foreach ($comentarios as $comentario) {


            $comen = $comentario['comentario'];


            echo "<tr>";
            echo "<td>$comen</td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
         
        
</body>


    