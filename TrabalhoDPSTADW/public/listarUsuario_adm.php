<?php
require_once "../controle/verificarLogado.php";

if ($_SESSION['tipo'] == 'c') {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_listarUsuDM.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <?php include 'cabeçalho.php'; ?>

    <div class="page-container">
        <h1 class="page-title">Lista de Usuários Cadastrados</h1>
        
        <div class="main-card">
            <div class="table-container">
                <?php
                require_once "../controle/conexao.php";
                require_once "../controle/funcoes.php";

                $lista_usuario = listarUsuario($conexao);

                if (count($lista_usuario) == 0) {
                    echo "<div class='no-results'>Não existem usuários cadastrados</div>";
                } else {
                ?>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Tipo</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lista_usuario as $usuario) {
                                $idusuario = $usuario['idusuario'];
                                $nome = $usuario['nome'];
                                $gmail = $usuario['gmail'];
                                $foto = $usuario['foto'];
                                $tipo = $usuario['tipo'];
                                
                                $tipo_class = ($tipo == 'a') ? 'adm' : 'user';
                                $tipo_text = ($tipo == 'a') ? 'ADM' : 'Usuário';
                            ?>
                                <tr>
                                    <td><?php echo $idusuario; ?></td>
                                    <td><img src='../controle/fotos/<?php echo $foto; ?>' alt='<?php echo $nome; ?>'></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $gmail; ?></td>
                                    <td><span class="user-type <?php echo $tipo_class; ?>"><?php echo $tipo_text; ?></span></td>
                                    <td><a href='../controle/deletarUsuario.php?idusuario=<?php echo $idusuario; ?>' class='action-link ban-link' onclick="return confirm('Tem certeza que deseja banir este usuário?')"><i class='fas fa-ban'></i> Banir</a></td>
                                    <td><a href='editarUsuario_adm.php?id=<?php echo $idusuario; ?>' class='action-link promote-link'><i class='fas fa-star'></i> Promover ADM</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }
                ?>
            </div>
        </div>
        
        <a href='configuracoes.php' class='back-button'>Voltar para Configurações</a>
    </div>

</body>

</html>