<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

$id_usuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Preferâncias</title>
</head>

<body>
    
<?php
$lista_preferencia_usu = listarPreferenciaUsu($conexao, $id_usuario);

if (count($lista_preferencia_usu) == 0) {
    echo "Você não possui preferências";
} else {
    // Começar a tabela uma única vez
    echo '<table border="1">
            <tr>
                <td>Gênero</td>
                <td colspan="2">Ação</td>
            </tr>';

    // Loop para percorrer as preferências do usuário
    foreach ($lista_preferencia_usu as $lista) {
        $idgenero = $lista['genero_idgenero'];

        // Buscar gêneros correspondentes
        $lista_genero = pesquisarGeneroID($conexao, $idgenero);

        if (count($lista_genero) == 0) {
            // Se não encontrar gêneros, exibir mensagem dentro da tabela
            echo "<tr><td colspan='2'>Gêneros não identificados</td></tr>";
        } else {
            // Loop para exibir os gêneros encontrados
            foreach ($lista_genero as $lista1) {
                $nome = $lista1['nome'];  
                echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td><a href='editarPreferencia.php?id=$id_usuario'>Editar preferencia</a></td>";
                echo "</tr>";
            }
        }
    }

    // Fechar a tabela após o loop
    echo '</table>';
}
?>

</body>
</html>