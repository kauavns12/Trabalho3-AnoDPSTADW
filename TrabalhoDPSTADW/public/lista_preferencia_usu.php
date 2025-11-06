<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['idusuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Preferências - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_preferenciaUsu.css">
</head>

<body>
    <?php include 'cabeçalho.php'; ?>
    
    <div class="preferencias-container">
        <h1 class="page-title">Suas Preferências</h1>
        
        <div class="content-container">
            <?php
            $lista_preferencia_usu = listarPreferenciaUsu($conexao, $id_usuario);

            if (count($lista_preferencia_usu) == 0) {
                echo '<div class="no-preferencias">Você não possui preferências</div>';
            } else {
                echo '<ul class="preferencias-list">';
                
                foreach ($lista_preferencia_usu as $lista) {
                    $idgenero = $lista['genero_idgenero'];
                    $lista_genero = [];
                    $lista_genero[] = pesquisarGeneroID($conexao, $idgenero);

                    if (count($lista_genero) > 0) {
                        foreach ($lista_genero as $listao) {
                            $nome = $listao['nome'];  
                            echo '<li class="preferencia-item">';
                            echo '<span class="genero-name">' . $nome . '</span>';
                            echo '</li>';
                        }
                    }
                }
                echo '</ul>';
            }
            ?>
            
            <div class="edit-btn-container">
                <a href="editarPreferencia.php?id=<?php echo $id_usuario; ?>" class="edit-btn">Editar Preferências</a>
            </div>
        </div>
    </div>

    <!-- Elementos decorativos -->
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>
</body>
</html>