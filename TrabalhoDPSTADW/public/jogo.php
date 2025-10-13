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

// Processar avaliação
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['classificacao'])) {
    $classificacao = intval($_POST['classificacao']);
    processarAvaliacao($conexao, $classificacao, $idusuario, $idjogo);
    header("Location: jogo.php?id=$idjogo");
    exit();
}

// Processar comentário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comentario'])) {
    $comentario = mysqli_real_escape_string($conexao, $_POST['comentario']);
    processarComentario($conexao, $comentario, $idusuario, $idjogo);
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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .game-header {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }

        .game-header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .game-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .game-media img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .game-info {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .info-item {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .info-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .info-item h3 {
            color: #667eea;
            margin-bottom: 5px;
            font-size: 1.1em;
        }

        .rating-section, .comments-section {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .section-title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: #667eea;
        }

        .section-title i {
            margin-right: 10px;
            font-size: 1.5em;
        }

        .stars-input {
            display: flex;
            justify-content: center;
            flex-direction: row-reverse;
            margin: 20px 0;
        }

        .stars-input input {
            display: none;
        }

        .stars-input label {
            font-size: 2em;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
            margin: 0 5px;
        }

        .stars-input input:checked ~ label,
        .stars-input label:hover,
        .stars-input label:hover ~ label {
            color: #ffc107;
        }

        .btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1em;
            transition: transform 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .comment {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #667eea;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
        }

        .comment-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            justify-content: between;
            margin-bottom: 5px;
        }

        .comment-user {
            font-weight: bold;
            color: #667eea;
        }

        .comment-date {
            color: #888;
            font-size: 0.9em;
        }

        textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            resize: vertical;
            min-height: 100px;
            margin-bottom: 15px;
            font-family: inherit;
        }

        .back-button {
            display: inline-block;
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background 0.2s;
        }

        .back-button:hover {
            background: #5a6268;
        }

        @media (max-width: 768px) {
            .game-content {
                grid-template-columns: 1fr;
            }
            
            .game-header h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="jogos.php" class="back-button">
            <i class="fas fa-arrow-left"></i> Voltar para Jogos
        </a>

        <div class="game-header">
            <h1><?php echo htmlspecialchars($jogo['nome']); ?></h1>
            <p>Explore os detalhes deste incrível jogo</p>
        </div>

        <div class="game-content">
            <div class="game-media">
                <img src="<?php echo htmlspecialchars($jogo['img']); ?>" alt="<?php echo htmlspecialchars($jogo['nome']); ?>">
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
                    <textarea name="comentario" required placeholder="Digite seu comentário sobre o jogo..."></textarea>
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