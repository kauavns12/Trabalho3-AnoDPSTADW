<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Koooooooloooooocacaoca";
    $gmail = "Kaio@teste.com";
    $senha = "3840413708";
    $foto = "teste";
    $tipo = "c";
    $status = "Jogando";
    $seguindo = 12;
    $seguidores = "Nenhum";

    cadastrarUsuario($conexao, $nome, $gmail, $senha, $foto, $tipo, $status, $seguindo, $seguidores);
?>