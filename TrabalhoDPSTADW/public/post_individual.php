<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";
$idpost = $_GET['id'];

$idusuario = $_SESSION['idusuario']
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/estilo_postIndividual.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
</head>

<body>
    
    <?php include 'cabeçalho.php'; ?>

    <div class="post-container">
        <div class="post-header">
            <h1 class="post-title">Post da Comunidade</h1>
        </div>

        <?php
        $posts = [];
        $posts[] = pesquisarPostID($conexao, $idpost);
        
        if((!$posts)){
            echo "<div class='empty-message'>Não foi possível identificar o post. Retorne a página e tente rever o post.</div>";
        } else {
        ?>
        
        <div class="post-content">
            <table class="post-table">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Foto</th>
                        <th>Tópico</th>
                        <th>Conteúdo</th>
                    </tr>
                </thead>
                <tbody>
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
                    echo "<td><strong>$nome</strong></td>";
                    echo "<td><img src='../controle/fotos/$foto' alt='$nome' class='user-avatar'></td>";
                    echo "<td><span class='topic-badge'>$nometopico</span></td>";
                    echo "<td class='post-text'>$conteudo</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <?php 
        $comentarios = ListarComentarioPost($conexao, $idpost);
        ?>
        
        <div class="comments-section">
            <h2 class="comments-title">Comentários</h2>
            
            <?php
            if(count($comentarios)==0){
                echo "<div class='empty-message'>Não há comentários neste post ainda.</div>";
            } else {
            ?>
            
            <table class="comments-table">
                <thead>
                    <tr>
                        <th>Comentário</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($comentarios as $comentario) {
                    $comen = $comentario['comentario'];
                    echo "<tr>";
                    echo "<td>$comen</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
        
        <?php } ?>
        
        <a href="comunidade.php" class="back-button">Voltar para Comunidade</a>
    </div>
         



    <div>

                <form action="../controle/comentar.php" method="post">
                <input type="hidden" name="idpost" value='<?php echo $idpost; ?>> '>
                <?php //<input type="hidden" name="idusuario" value='<?php echo $idusuario; ?>
                <input type="hidden" name="idtop" value='<?php echo $idtop; ?>> '>
            

                <label for="comentario">Comente aqui!</label>
                <input type="text" name="comentario" id="comentario">

                <label for="comentario">Qual a data do seu comentário?</label>
                <input type="date" name="data" id="data">

                </form>

    </div>
</body>
</html>