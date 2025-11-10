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
    <title>Fórum - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_foruns.css">

</head>
<?php include 'cabeçalho.php'; ?>

<body>

    <div class="forum-container">

        <div class="forum-header">
            <h1 class="page-title">
                <i class="fas fa-comments"></i>
                Fórum da Comunidade
            </h1>
            <p class="forum-subtitle">Compartilhe ideias, faça perguntas e interaja com outros jogadores</p>
        </div>

        <div class="forum-actions">
            <a href="./cadastrarcategoria.php" class="nav-button">
                <i class="fas fa-folder-plus"></i>
                Nova Categoria
            </a>
            <a href="./cadastrartopico.php" class="nav-button">
                <i class="fas fa-plus-circle"></i>
                Novo Tópico
            </a>
            <a href="./cadastrarpost.php" class="nav-button">
                <i class="fas fa-edit"></i>
                Novo Post
            </a>
        </div>

        <div class="posts-section">
            <div class="section-header">
                <h2>
                    <i class="fas fa-stream"></i>
                    Postagens Recentes
                </h2>
                <span class="posts-count"><?php echo count(listarPost($conexao)); ?> posts</span>
            </div>

            <div class="posts-list">
                <?php
                $posts = listarPost($conexao);

                if (empty($posts)) {
                    echo '
                    <div class="no-posts">
                        <i class="far fa-comment-dots"></i>
                        <h3>Nenhuma postagem ainda</h3>
                        <p>Seja o primeiro a compartilhar algo na comunidade!</p>
                        <a href="./cadastrarpost.php" class="nav-button">
                            <i class="fas fa-edit"></i>
                            Criar Primeiro Post
                        </a>
                    </div>';
                } else {
                    foreach ($posts as $post) {
                        $post_id = $post['idpost_forun'];
                        $topico_nome = htmlspecialchars($post['topico_forun_idtopico_forun']);
                        $conteudo = htmlspecialchars($post['conteudo']);
                        $conteudo_preview = strlen($conteudo) > 150 ? substr($conteudo, 0, 150) . '...' : $conteudo;

                        echo '
                        <div class="post-item">
                            <div class="post-main">
                                <div class="post-topic-badge">
                                    <i class="fas fa-hashtag"></i>
                                    ' . $topico_nome . '
                                </div>
                                <div class="post-content-preview">
                                    ' . $conteudo_preview . '
                                </div>
                                <div class="post-actions">
                                    <a href="post_individual.php?id=' . $post_id . '" class="post-link">
                                        <i class="fas fa-external-link-alt"></i>
                                        Ver Post Completo
                                    </a>
                                </div>
                            </div>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="forum-stats">
            <div class="stat-card">
                <i class="fas fa-comments"></i>
                <div class="stat-info">
                    <span class="stat-number"><?php echo count(listarPost($conexao)); ?></span>
                    <span class="stat-label">Posts</span>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-folder"></i>
                <div class="stat-info">
                    <span class="stat-number"><?php echo count(listarCategoria($conexao)); ?></span>
                    <span class="stat-label">Categorias</span>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-hashtag"></i>
                <div class="stat-info">
                    <span class="stat-number"><?php echo count(listarTopico($conexao)); ?></span>
                    <span class="stat-label">Tópicos</span>
                </div>
            </div>
        </div>

    </div>
    
</body>

</html>