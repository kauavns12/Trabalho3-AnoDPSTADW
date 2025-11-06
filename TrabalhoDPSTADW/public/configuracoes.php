<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";



$id_usuario = $_SESSION['idusuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_configuracoes.css">
</head>

<body>

    <?php include 'cabeçalho.php'; ?>

    <div class="settings-container">
        <div class="settings-header">
            <h1 class="settings-title">Configurações</h1>
            <p class="settings-subtitle">Gerencie suas preferências e configurações da conta</p>
        </div>

        <div class="settings-card">
            <h2 class="settings-section-title">📋 Gerenciamento de Conta</h2>

            <a href="editarUsuario.php?id" class="settings-btn" target="bodyiframe">
                <div class="settings-btn-content">
                    <span class="settings-btn-icon">✏️</span>
                    <span>Editar Dados Pessoais</span>
                </div>
                <span class="settings-btn-arrow">→</span>
            </a>

            <?php if ($_SESSION['tipo'] === 'A'): ?>
                <a href="listarUsuario_adm.php?id" class="settings-btn" target="bodyiframe">
                    <div class="settings-btn-content">
                        <span class="settings-btn-icon">👥</span>
                        <span>Usuários Cadastrados</span>
                    </div>
                    <span class="settings-btn-arrow">→</span>
                </a>
            <?php endif; ?>

            <?php if ($_SESSION['tipo'] === 'A'): ?>
                <a href="listarJogo_adm.php?id" class="settings-btn" target="bodyiframe">
                    <div class="settings-btn-content">
                        <span class="settings-btn-icon">👥</span>
                        <span>Jogos cadastrados</span>
                    </div>
                    <span class="settings-btn-arrow">→</span>
                </a>
            <?php endif; ?>

            <a href="listas.php?id" class="settings-btn" target="bodyiframe">
                <div class="settings-btn-content">
                    <span class="settings-btn-icon">📚</span>
                    <span>Acessar as Listas</span>
                </div>
                <span class="settings-btn-arrow">→</span>
            </a>
        </div>

        <div class="settings-card">
            <h2 class="settings-section-title">⚙️ Preferências</h2>

            <a href="lista_preferencia_usu.php" class="settings-btn" target="bodyiframe">
                <div class="settings-btn-content">
                    <span class="settings-btn-icon">⭐</span>
                    <span>Listar Preferências do Usuário</span>
                </div>
                <span class="settings-btn-arrow">→</span>
            </a>
        </div>

        <div class="settings-card">
            <h2 class="settings-section-title">⚠️ Zona de Perigo</h2>

            <a href="../controle/deletarconta.php?id" class="settings-btn danger-btn" target="bodyiframe">
                <div class="settings-btn-content">
                    <span class="settings-btn-icon">🗑️</span>
                    <span>Deletar Conta</span>
                </div>
                <span class="settings-btn-arrow">→</span>
            </a>
        </div>

        <a href='home.php' class="back-btn">
            <span>←</span>
            <span>Voltar para Home</span>
        </a>
    </div>
</body>

</html>