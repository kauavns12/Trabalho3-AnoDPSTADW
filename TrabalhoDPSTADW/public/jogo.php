<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

// Verificar se o ID do jogo foi passado
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: jogos.php");
    exit();
}

$idjogo = intval($_GET['id']);
$idusuario = $_SESSION['idusuario'];

// Buscar dados do jogo
$jogo = pesquisarJogoID($conexao, $idjogo);

// Verificar se o jogo existe
if (!$jogo) {
    die("Jogo não encontrado!");
}

// CORREÇÃO: Verificar e corrigir o caminho da imagem
$caminhoImagem = "../controle/fotos/" . $jogo['img'];
$imagemPadrao = "../controle/fotos/default_game.png";

// Verificar se a imagem existe
if (!file_exists($caminhoImagem) || empty($jogo['img'])) {
    $imagem_jogo = $imagemPadrao;
} else {
    $imagem_jogo = $caminhoImagem;
}

// Processar avaliação
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['classificacao'])) {
    $classificacao = intval($_POST['classificacao']);
    processarAvaliacao($conexao, $classificacao, $idusuario, $idjogo);
    header("Location: jogo.php?id=$idjogo");
    exit();
}

// Processar comentário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comentario'])) {
    $comentario = trim($_POST['comentario']);
    
    // CORREÇÃO: Validar e limitar o comentário
    if (!empty($comentario)) {
        // Limitar para 500 caracteres
        $comentario = substr(mysqli_real_escape_string($conexao, $comentario), 0, 500);
        processarComentario($conexao, $comentario, $idusuario, $idjogo);
    }
    
    header("Location: jogo.php?id=$idjogo");
    exit();
}

// Buscar dados adicionais
$avaliacoes = buscarAvaliacoesJogo($conexao, $idjogo);
$media_avaliacao = calcularMediaAvaliacoes($avaliacoes);
$minha_avaliacao = buscarMinhaAvaliacao($conexao, $idusuario, $idjogo);
$comentarios = buscarComentariosJogo($conexao, $idjogo);

// Dados do usuário logado
$user = pesquisarUsuario_ID($conexao, $idusuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($jogo['nome']); ?> - Friv Games</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_jogo.css">
</head>
<body>
    <?php include 'cabeçalho.php'; ?>
    <div class="container">

        <div class="game-header">
            <h1><?php echo htmlspecialchars($jogo['nome']); ?></h1>
            <p>Explore os detalhes deste incrível jogo</p>
        </div>

        <div class="game-content">
            <div class="game-media">
                <img src="<?php echo htmlspecialchars($imagem_jogo); ?>" alt="<?php echo htmlspecialchars($jogo['nome']); ?>" class="jogo-imagem" onerror="this.src='../controle/fotos/default_game.png'">
            </div>

            <div class="game-info">
                <div class="info-item">
                    <h3><i class="fas fa-code"></i> Desenvolvedor</h3>
                    <p><?php echo htmlspecialchars($jogo['desenvolvedor']); ?></p>
                </div>

                <div class="info-item">
                    <h3><i class="far fa-calendar-alt"></i> Data de Lançamento</h3>
                    <p><?php echo date('d/m/Y', strtotime($jogo['data_lanca'])); ?></p>
                </div>

                <div class="info-item">
                    <h3><i class="fas fa-align-left"></i> Descrição</h3>
                    <p><?php echo htmlspecialchars($jogo['descricao']); ?></p>
                </div>

                <div class="info-item">
                    <h3><i class="fas fa-star"></i> Avaliação Média</h3>
                    <p><?php echo $media_avaliacao; ?> / 5.0 (<?php echo count($avaliacoes); ?> avaliações)</p>
                </div>
            </div>
        </div>

        <!-- Seção de Avaliação -->
        <div class="rating-section">
            <div class="section-title">
                <i class="fas fa-star"></i>
                <h2>Avalie este Jogo</h2>
            </div>

            <form method="POST" action="">
                <div class="stars-input">
                    <input type="radio" id="estrela5" name="classificacao" value="5" <?php echo ($minha_avaliacao && $minha_avaliacao['classificacao'] == 5) ? 'checked' : ''; ?>>
                    <label for="estrela5"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela4" name="classificacao" value="4" <?php echo ($minha_avaliacao && $minha_avaliacao['classificacao'] == 4) ? 'checked' : ''; ?>>
                    <label for="estrela4"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela3" name="classificacao" value="3" <?php echo ($minha_avaliacao && $minha_avaliacao['classificacao'] == 3) ? 'checked' : ''; ?>>
                    <label for="estrela3"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela2" name="classificacao" value="2" <?php echo ($minha_avaliacao && $minha_avaliacao['classificacao'] == 2) ? 'checked' : ''; ?>>
                    <label for="estrela2"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="estrela1" name="classificacao" value="1" <?php echo ($minha_avaliacao && $minha_avaliacao['classificacao'] == 1) ? 'checked' : ''; ?>>
                    <label for="estrela1"><i class="fas fa-star"></i></label>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn">
                        <i class="fas fa-paper-plane"></i> 
                        <?php echo $minha_avaliacao ? 'Atualizar Avaliação' : 'Enviar Avaliação'; ?>
                    </button>
                </div>
            </form>
        </div>

        <!-- Seção de Comentários -->
        <div class="comments-section">
            <div class="section-title">
                <i class="fas fa-comments"></i>
                <h2>Comentários</h2>
            </div>

            <div class="comment-form">
                <form method="POST" action="">
                    <textarea name="comentario" id="comentario" required placeholder="Digite seu comentário sobre o jogo..."></textarea>
                    <button type="submit" class="btn">
                        <i class="fas fa-paper-plane"></i> Enviar Comentário
                    </button>
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
                                <div class="comment-user"><?php echo htmlspecialchars($comentario['usuario_nome']); ?></div>
                                <div class="comment-date"><?php echo date('d/m/Y', strtotime($comentario['criado'])); ?></div>
                            </div>
                            <div class="comment-text">
                                <?php echo htmlspecialchars($comentario['comentario']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: #666;">
                    <i class="far fa-comment-dots" style="font-size: 3em; margin-bottom: 15px;"></i>
                    <h3>Nenhum comentário ainda</h3>
                    <p>Seja o primeiro a comentar sobre este jogo!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>