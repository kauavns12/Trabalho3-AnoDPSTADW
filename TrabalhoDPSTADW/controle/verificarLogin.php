<?php
    require_once "conexao.php";

    $gmail = $_POST['gmail'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE gmail = '$gmail'";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 0) {
        header("Location: ../public/index.php");
    }
    else {
        $linha = mysqli_fetch_array($resultado);
        $senha_banco = $linha['senha'];
        $tipo = $linha['tipo'];
        $id_usuario = $linha['idusuario']; // Supondo que a coluna do ID seja 'id'

        if (password_verify($senha, $senha_banco)) {
            session_start();
            $_SESSION['logado'] = 'sim';
            $_SESSION['tipo'] = $tipo;
            $_SESSION['nome'] = $nome;
            $_SESSION['id_usuario'] = $id_usuario; // Armazenando o ID na sessão
            header("Location: ../public/home.php");
        }
        else {
            header("Location: ../public/index.php");
        }
    }
?>