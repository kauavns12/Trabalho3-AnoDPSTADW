<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id = $_SESSION['id_usuario'];
pesquisarUsuario_ID($conexao, $id);
$foto = $user['foto'];
$nome = $user['nome'];

// Buscar jogos do banco de dados
$sql = "SELECT nome, img FROM friv.jogo";
$result = $conexao->query($sql);
$jogos = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $jogos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos - Friv</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/stilinho.css">
    <style>
        .jogos-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .jogos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        .jogo-card {
            background-color: #2c2f3b;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .jogo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        
        .jogo-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        
        .jogo-info {
            padding: 15px;
            text-align: center;
        }
        
        .jogo-nome {
            color: #fff;
            font-size: 16px;
            margin: 0;
            font-weight: 600;
        }
        
        .page-title {
            color: #fff;
            font-size: 28px;
            margin-bottom: 10px;
            border-bottom: 2px solid #6c5ce7;
            padding-bottom: 10px;
            display: inline-block;
        }
        
        .no-jogos {
            color: #a0a0a0;
            text-align: center;
            margin-top: 50px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <nav class="navbar" class="cabeca">
        <a href="#" class="logo">
            <i class="fas fa-gamepad logo-icon"></i>
            <span class="logo-text">Friv Games & WIKI</span>
        </a>
        
        <ul class="nav-links">
            <li><a href="body.php">Início</a></li>
            <li><a href="jogos.php" class="active">Jogos</a></li>
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

    <div class="jogos-container">
        <h1 class="page-title">Nossos Jogos</h1>
        
        <?php if (!empty($jogos)): ?>
            <div class="jogos-grid">
                <?php foreach ($jogos as $jogo): ?>
                    <div class="jogo-card">
                        <img src="../controle/<?php echo htmlspecialchars($jogo['img']); ?>" alt="<?php echo htmlspecialchars($jogo['nome']); ?>" class="jogo-img">
                        <div class="jogo-info">
                            <h3 class="jogo-nome"><?php echo htmlspecialchars($jogo['nome']); ?></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="no-jogos">Nenhum jogo encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>