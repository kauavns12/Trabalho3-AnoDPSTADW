<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Koooooooloooooocacaoca";
    $gmail = "Kaio@teste.com";
    $senha = "3840413708";
    $foto = "teste";
    $tipo = "c";
    $status = "Ativo";
    $seguindo = 0;
    $seguidores = "0";

    cadastrarUsuario($conexao, $nome, $gmail, $senha, $foto, $tipo, $status, $seguindo, $seguidores);
?>