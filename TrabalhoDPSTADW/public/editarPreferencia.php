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
    <title>Editar Preferências</title>
</head>
<body>
    <h2>Editar Preferências</h2>
    <form action="../controle/salvarPreferenciaEditada.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
        
        <label>Selecione seus gêneros favoritos:</label><br>
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
            <input type="checkbox" name="generos[]" value="<?php echo $id; ?>" <?php if ($checked) echo "checked"; ?>>
            <?php echo $nome; ?><br>
        <?php endforeach; ?>

        <br><input type="submit" value="Salvar Alterações">
    </form>

    <br><a href="home.php">Voltar</a>
</body>
</html>
