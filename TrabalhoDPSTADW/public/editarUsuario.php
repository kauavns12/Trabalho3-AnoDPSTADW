<?php
// editarUsuario.php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

// Pega o ID do usuário logado da sessão
$idusuario = $_SESSION['idusuario'];

// Busca dados do usuário no banco
$usuario = pesquisarUsuario_ID($conexao, $idusuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Dados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_editarUsuario.css">
</head>
<body>

    <?php include 'cabeçalho.php'; ?>

    <div class="main-container">
        <div class="page-header">
            <h1>Editar Dados Pessoais</h1>
            <p>Atualize suas informações de perfil</p>
        </div>

        <div class="form-container">
            <form id="formulario" action="../controle/atualizarUsuario.php" method="post" enctype="multipart/form-data">
                <!-- Mandar o ID do usuário logado -->
                <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">

                <!-- Seção da Foto -->
                <div class="photo-section">
                    <span class="photo-label">Foto de Perfil</span>
                    <div class="current-photo">
                        <img src="../controle/fotos/<?php echo htmlspecialchars($usuario['foto']); ?>" 
                             alt="Foto atual" 
                             class="user-photo">
                    </div>
                    <p class="photo-info">Foto atual</p>
                    
                    <div class="form-group">
                        <label class="form-label">Alterar Foto</label>
                        <input type="file" name="foto" class="file-input" accept="image/*">
                    </div>
                </div>

                <!-- Informações Pessoais -->
                <div class="form-group">
                    <label class="form-label">Nome</label>
                    <input type="text" 
                           name="nome" 
                           value="<?php echo htmlspecialchars($usuario['nome']); ?>" 
                           class="form-input" 
                           placeholder="Digite seu nome completo"
                           required>
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail</label>
                    <input type="email" 
                           name="gmail" 
                           value="<?php echo htmlspecialchars($usuario['gmail']); ?>" 
                           class="form-input" 
                           placeholder="seu.email@exemplo.com"
                           required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nova Senha</label>
                    <input type="password" 
                           name="senha" 
                           class="form-input" 
                           placeholder="********"
                           value="">
                    <small class="password-note">
                        Deixe este campo em branco se não deseja alterar sua senha.
                    </small>
                </div>

                <button type="submit" class="submit-btn">
                    Salvar Alterações
                </button>
            </form>
        </div>
        
        <a href='configuracoes.php' class="back-btn">
            <span>←</span>
            <span>Voltar para Configurações</span>
        </a>
    </div>
</body>
</html>
