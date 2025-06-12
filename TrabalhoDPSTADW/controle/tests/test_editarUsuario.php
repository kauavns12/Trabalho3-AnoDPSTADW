<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $nome = "Bruna";
    $gmail = "bruna@gmail.com";
    $senha = "123";
    $idusuario = 3;
    editarUsuario($conexao, $nome, $gmail, $senha, $idusuario);

?>



