<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_GET['id']; // vindo pela URL
$preferencias = listarPreferenciaUsu($conexao, $id_usuario); // suas preferências atuais
$generos = listarGenero($conexao); // função que retorna todos os gêneros cadastrados
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Preferências - FRIV GAMES & WIKI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/cabeçalho.css">
    <link rel="stylesheet" href="./estilo/estilo_editarPreferencia.css">
</head>
<body>
    <?php include 'cabeçalho.php'; ?>
    
    <div class="editar-preferencias-container">
        <h1 class="page-title">Editar Preferências</h1>
        
        <div class="form-container">
            <form action="../controle/salvarPreferenciaEditada.php" method="post">
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                
                <label class="form-label">Selecione seus gêneros favoritos:</label>
                
                <div class="generos-container">
                    <?php foreach ($generos as $genero): 
                        $id = $genero['idgenero'];
                        $nome = $genero['nome'];
                        // verificar se já está selecionado
                        $checked = false;
                        foreach ($preferencias as $pref) {
                            if ($pref['genero_idgenero'] == $id) {
                                $checked = true;
                                break;
                            }
                        }
                    ?>
                        <label class="genero-option">
                            <input type="checkbox" name="generos[]" value="<?php echo $id; ?>" <?php if ($checked) echo "checked"; ?>>
                            <span class="checkbox-custom"></span>
                            <span class="genero-name"><?php echo $nome; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <button type="submit" class="save-btn">Salvar Alterações</button>
            </form>
            
            <a href="configuracoes.php" class="back-btn">Voltar para Configurações</a>
        </div>
    </div>

</body>
</html>