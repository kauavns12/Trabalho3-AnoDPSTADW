<?php
// editarUsuario.php
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

session_start();

// aqui pegue o id do usuário logado da sessão
$id_usuario = $_SESSION['idusuario'];

// busca dados do usuário
$usuario = pesquisarUsuario_ID($conexao, $id_usuario);
?>
<?php include 'cabeçalho.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Dados</title>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_editarUsuario.css">
</head>
<body>

    <form id="formulario" action="atualizar_dados.php" method="post" enctype="multipart/form-data">
    <!-- precisamos mandar o id para saber quem atualizar -->
    <input type="hidden" name="idusuario" value="<?php echo $id_usuario = $_SESSION['idusuario']; ?>">


                <!-- Seção da Foto -->
                <div class="photo-section">
                    <span class="photo-label">Foto de Perfil</span>
                    <div class="current-photo">
                        <img src="../controle/fotos/<?php echo $usuario['foto']; ?>" 
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
                           placeholder="********">
                    <small style="color: #94a3b8; font-size: 0.85rem; margin-top: 5px; display: block;">
                        Deixe este campo em branco se não deseja alterar sua senha
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