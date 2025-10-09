<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id = $_SESSION['idusuario'];
$user = pesquisarUsuario_ID($conexao, $id);
$foto = $user['foto'];
$nome = $user['nome'];

// Buscar informações do jogo
$idjogo = isset($_GET['id']) ? intval($_GET['id']) : 1;
$jogo = pesquisarJogoID($conexao, $idjogo);
if (!$jogo) {
    die("Jogo não encontrado!");
}

// Buscar avaliações do jogo
$sql_avaliacoes = "SELECT a.classificacao, u.nome 
                   FROM avaliacao_jogo a 
                   JOIN usuario u ON a.usuario_idusuario = u.idusuario 
                   WHERE a.jogo_idjogo = $idjogo";
$result_avaliacoes = mysqli_query($conexao, $sql_avaliacoes);
$avaliacoes = [];
if ($result_avaliacoes) {
    while ($avaliacao = mysqli_fetch_assoc($result_avaliacoes)) {
        $avaliacoes[] = $avaliacao;
    }
}

// Calcular média das avaliações
$media_avaliacao = 0;
if (count($avaliacoes) > 0) {
    $soma = 0;
    foreach ($avaliacoes as $avaliacao) {
        $soma += $avaliacao['classificacao'];
    }
    $media_avaliacao = round($soma / count($avaliacoes), 1);
}
// Verificar se categorias padrão existem, se não, criá-las
$categorias_padrao = [
    ['Dúvidas', 'Tire suas dúvidas sobre os jogos'],
    ['Dicas', 'Compartilhe dicas e truques'],
    ['Bugs', 'Reporte problemas técnicos'],
    ['Sugestões', 'Deixe suas sugestões para melhorias'],
    ['Off-topic', 'Conversas não relacionadas a jogos']
];

foreach ($categorias_padrao as $categoria) {
    $sql_check_categoria = "SELECT idcategoria_forun FROM categoria_forun WHERE nome = '{$categoria[0]}'";
    $result_check = mysqli_query($conexao, $sql_check_categoria);
    
    if (mysqli_num_rows($result_check) == 0) {
        salvarCategoriaForun($conexao, $categoria[0], $categoria[1]);
    }
}

// Agora buscar a categoria padrão para comentários (usaremos a primeira)
$sql_categoria = "SELECT idcategoria_forun FROM categoria_forun LIMIT 1";
$result_categoria = mysqli_query($conexao, $sql_categoria);
$categoria_padrao = mysqli_fetch_assoc($result_categoria);
$categoria_id = $categoria_padrao['idcategoria_forun'];

// Buscar comentários do jogo
$sql_comentarios = "SELECT c.*, u.nome as usuario_nome, u.foto as usuario_foto
                   FROM comentario c 
                   JOIN usuario u ON c.post_forun_usuario_idusuario = u.idusuario 
                   JOIN post_forun pf ON c.post_forun_idpost_forun = pf.idpost_forun
                   JOIN topico_forun tf ON pf.topico_forun_idtopico_forun = tf.idtopico_forun
                   WHERE tf.jogo_idjogo1 = $idjogo
                   ORDER BY c.criado DESC";
$result_comentarios = mysqli_query($conexao, $sql_comentarios);
$comentarios = [];
if ($result_comentarios) {
    while ($comentario = mysqli_fetch_assoc($result_comentarios)) {
        $comentarios[] = $comentario;
    }
}

// Processar formulários
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['classificacao'])) {
        $classificacao = intval($_POST['classificacao']);
        
        // Verificar se usuário já avaliou este jogo
        $sql_check = "SELECT idavaliacao_jogo FROM avaliacao_jogo 
                     WHERE usuario_idusuario = $id AND jogo_idjogo = $idjogo";
        $result_check = mysqli_query($conexao, $sql_check);
        
        if (mysqli_num_rows($result_check) > 0) {
            $row = mysqli_fetch_assoc($result_check);
            editarAvaliacaoJogo($conexao, $row['idavaliacao_jogo'], $classificacao, $id, $idjogo);
        } else {
            salvarAvaliacaoJogo($conexao, $classificacao, $id, $idjogo);
        }
        
        header("Location: jogo.php?id=$idjogo");
        exit();
    }
    
    if (isset($_POST['comentario'])) {
        $comentario_texto = mysqli_real_escape_string($conexao, $_POST['comentario']);
        $criado = date('Y-m-d');
        
        // Verificar se já existe um tópico para este jogo
        $sql_topico = "SELECT idtopico_forun FROM topico_forun WHERE jogo_idjogo1 = $idjogo LIMIT 1";
        $result_topico = mysqli_query($conexao, $sql_topico);
        
        if (mysqli_num_rows($result_topico) > 0) {
            $topico = mysqli_fetch_assoc($result_topico);
            $topico_id = $topico['idtopico_forun'];
        } else {
            $nome_topico = "Comentários: " . $jogo['nome'];
            $conteudo_topico = "Tópico para comentários sobre o jogo " . $jogo['nome'];
            $categoria_id = 1;
            
            salvarTopicoForun($conexao, $nome_topico, $conteudo_topico, $categoria_id, $idjogo);
            $topico_id = mysqli_insert_id($conexao);
        }
        
        salvarPostForun($conexao, $comentario_texto, $id, $topico_id);
        $post_id = mysqli_insert_id($conexao);
        
        cadastrarComentario($conexao, $comentario_texto, $criado, $post_id, $id, $topico_id);
        
        header("Location: jogo.php?id=$idjogo");
        exit();
    }
}

// Buscar jogos para o menu
$sql_jogos = "SELECT nome, img FROM friv.jogo";
$result_jogos = $conexao->query($sql_jogos);
$jogos_menu = [];
if ($result_jogos && $result_jogos->num_rows > 0) {
    while($row = $result_jogos->fetch_assoc()) {
        $jogos_menu[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $jogo['nome']; ?> - Friv</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/estilo_jogo.css">
    
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-gamepad logo-icon"></i>
            <span class="logo-text">Friv Games & WIKI</span>
        </a>
        
        <ul class="nav-links">
                <li><a href="home.php">Início</a></li>
                <li><a href="jogos.php">Jogos</a></li>
                <li><a href="comunidade.php">Comunidade</a></li>
                <li><a href="foruns.php">Fóruns</a></li>
        </ul>
        
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-box" placeholder="Pesquisar jogos, tópicos ou usuários">
        </div>
        
        <div class="user-menu">
            <div class="user-avatar"> <img src="../controle/fotos/<?php echo $_SESSION['foto']?>"></div>
            <div class="user-name"><?php echo $_SESSION['nome'] ?></div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </div>
        
        <div class="button-demo">
            <div>
                <a href="../controle/deslogar.php" class="nav-button signup-btn" target="bodyiframe">Deslogar</a>
            </div>
            
            <div>
                <a href="./configuracoes.php" class="nav-button login-btn" target="bodyiframe">Configurações</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="game-header">
            <h1><?php echo $jogo['nome']; ?></h1>
            <p>Uma experiência de jogo incrível</p>
        </div>
        
        <div class="game-content">
            <div class="game-media">
                <img src="<?php echo $jogo['img']; ?>" alt="<?php echo $jogo['nome']; ?>" class="game-image">
            </div>
            
            <div class="game-info">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="info-text">
                        <h3>Desenvolvedor</h3>
                        <p><?php echo $jogo['desenvolvedor']; ?></p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="info-text">
                        <h3>Data de Lançamento</h3>
                        <p><?php echo date('d/m/Y', strtotime($jogo['data_lanca'])); ?></p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-align-left"></i>
                    </div>
                    <div class="info-text">
                        <h3>Descrição</h3>
                        <p><?php echo $jogo['descricao']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rating-section">
            <div class="section-title">
                <i class="fas fa-star"></i>
                <h2>Avaliação do Jogo</h2>
            </div>
            
            <div class="rating-display">
                <div class="average-rating">
                    <?php echo $media_avaliacao; ?> <i class="fas fa-star" style="color: #ffc107;"></i>
                </div>
                <div class="rating-count">
                    Baseado em <?php echo count($avaliacoes); ?> avaliações
                </div>
            </div>
            
            <form method="POST" action="">
                <div class="stars-input">
                    <input type="radio" id="estrela5" name="classificacao" value="5">
                    <label for="estrela5"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela4" name="classificacao" value="4">
                    <label for="estrela4"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela3" name="classificacao" value="3">
                    <label for="estrela3"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela2" name="classificacao" value="2">
                    <label for="estrela2"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela1" name="classificacao" value="1">
                    <label for="estrela1"><i class="fas fa-star"></i></label>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Avaliar</button>
                </div>
            </form>
            
            <div class="rating-stats">
                <div class="stat-box">
                    <div class="stat-icon">

                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-value"><?php echo $media_avaliacao >= 3 ? 'Y' : 'N'; ?></div>
                    <div class="stat-label">ANALIAÇÃO GERAL</div>
                </div>
                
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-value"><?php echo count($avaliacoes); ?></div>
                    <div class="stat-label">TOTAL DE AVALIAÇÕES</div>
                </div>
                
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stat-value">
                        <?php 
                        $sql_minha_avaliacao = "SELECT classificacao FROM avaliacao_jogo 
                                               WHERE usuario_idusuario = $id AND jogo_idjogo = $idjogo";
                        $result_minha_avaliacao = mysqli_query($conexao, $sql_minha_avaliacao);
                        
                        if (mysqli_num_rows($result_minha_avaliacao) > 0) {
                            $minha_avaliacao = mysqli_fetch_assoc($result_minha_avaliacao);
                            echo $minha_avaliacao['classificacao'] >= 3 ? 'Y' : 'N';
                        } else {
                            echo '-';
                        }
                        ?>
                    </div>
                    <div class="stat-label">SUA AVALIAÇÃO</div>
                </div>
            </div>
        </div>
        
        <div class="comments-section">
            <div class="section-title">
                <i class="fas fa-comments"></i>
                <h2>Comentários</h2>
            </div>
            
            <div class="comment-form">
                <form method="POST" action="">
                    <textarea name="comentario" required placeholder="Digite seu comentário aqui..."></textarea>
                    <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Enviar Comentário</button>
                </form>
            </div>
            
            <?php if (count($comentarios) > 0): ?>
                <?php foreach ($comentarios as $comentario): ?>
                    <div class="comment">
                        <div class="comment-avatar">
                            <?php if (!empty($comentario['usuario_foto'])): ?>
                                <img src="<?php echo $comentario['usuario_foto']; ?>" alt="<?php echo $comentario['usuario_nome']; ?>">
                            <?php else: ?>
                                <?php echo strtoupper(substr($comentario['usuario_nome'], 0, 1)); ?>
                            <?php endif; ?>
                        </div>
                        <div class="comment-content">
                            <div class="comment-header">
                                <div class="comment-user"><?php echo $comentario['usuario_nome']; ?></div>
                                <div class="comment-date"><?php echo date('d/m/Y', strtotime($comentario['criado'])); ?></div>
                            </div>
                            <div class="comment-text">
                                <?php echo $comentario['comentario']; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-comments">
                    <i class="far fa-comment-dots"></i>
                    <h3>Nenhum comentário ainda</h3>
                    <p>Seja o primeiro a comentar sobre este jogo!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

