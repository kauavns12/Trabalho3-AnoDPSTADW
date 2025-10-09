<?php
    require_once "../controle/verificarLogado.php";


    //if ($_SESSION['tipo'] == 'c') {
   //     header("Location: home.php");
   // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<?php include 'cabeçalho.php'; ?>
<body>
    <h1>Lista de Usuários Cadastrados</h1>

    <?php
    require_once "../controle/conexao.php";
    require_once "../controle/funcoes.php";

    $lista_usuario = listarUsuario($conexao);

    if (count($lista_usuario) == 0) {
        echo "Não existem usuários cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Foto</td>
                <td colspan="2">Ações</td>
            </tr>
        <?php
        foreach ($lista_usuario as $usuario) {
            $idusuario = $usuario['idusuario'];
            $nome = $usuario['nome'];
            $gmail = $usuario['gmail'];
            $foto = $usuario['foto'];

            echo "<tr>";
            echo "<td>$idusuario</td>";
            echo "<td>$nome</td>";
            echo "<td>$gmail</td>";
            echo "<td><img src='../controle/fotos/$foto'></td>";
            echo "<td><a href='../controle/deletarconta.php?id=$idusuario'>Banir</a></td>";
            echo "<td><a href='editarUsuario_adm.php?id=$idusuario'>Promover ADM</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>

         <td><a href='configuracoes.php'>Voltar</a></td>
</body>

</html>