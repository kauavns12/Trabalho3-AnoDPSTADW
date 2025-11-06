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
    <title>Menu - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/estilo_comunidade.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
</head>

<body>
    <?php include 'cabeçalho.php'; ?>

    <div class="page-container">
        <h1 class="page-title">Comunidade</h1>
        
        <?php
        $usuarios = listarUsuario($conexao);

        if (count($usuarios) == 0) {
            echo "<div class='empty-state'>Não existem usuários cadastrados</div>";
        } else {
        ?>
            <div class="table-container">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th>FOTO</th>
                            <th>NOME</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($usuarios as $usuario) {
                        $idusuario = $usuario['idusuario'];
                        $nome = $usuario['nome'];
                        $foto = $usuario['foto'];

                        // Verificar se a foto existe
                        $caminhoFoto = "../controle/fotos/$foto";
                        $fotoPadrao = "../controle/fotos/default.png";

                        if (!file_exists($caminhoFoto) || empty($foto)) {
                            $caminhoFoto = $fotoPadrao;
                        }

                        echo "<tr>";
                        echo "<td><div class='user-avatar-container'><img src='$caminhoFoto' alt='$nome' class='user-avatar' onerror=\"this.src='$fotoPadrao'\"></div></td>";
                        echo "<td>$nome</td>";
                        echo "<td><a href='usuario.php?id=$idusuario' class='action-link'><i class='fas fa-user'></i> Visualizar Perfil</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        
        <a href='home.php' class='back-button'>Voltar para Home</a>
    </div>
</body>
</html>