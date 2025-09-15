<?php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="editarUsuario.php?id=<?= $idusuario?>" class="nav-button signup-btn" target="bodyiframe">Editar Dados Pessoais</a>
    </div> <br> <br>
</body>

</html>