<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idusuario = 2; 
    //
    deletarComentarioUsuario($conexao, $idusuario);
    deletarConquistaUsu($conexao, $idusuario);
    deletarHistoJogo($conexao, $idusuario);
    deletarAvaliacaoJogo($conexao, $idusuario);
    deletarFavoritoUsu($conexao, $idusuario);
    deletarTopicoUsu($conexao, $idusuario);
    deletarListaUsu($conexao, $idusuario);
    deletarPreferencia($conexao, $idusuario);
    deletarPostUsu($conexao, $idusuario);
    deletarRelacionametoUsu($conexao, $idusuario);
    //
    excluirUsuario($conexao, $idusuario);


echo "<pre>";
print_r(listarConquistaUsu($conexao));
echo "</pre>";

echo "<pre>";
print_r(listarFavoritoTodosUsuario($conexao));
echo "</pre>";

echo "<pre>";
print_r(listarPost($conexao));
echo "</pre>";

echo "<pre>";
print_r(listarTopico($conexao));
echo "</pre>";

echo "<pre>";
print_r(listarUsuario($conexao));
echo "</pre>";

?>