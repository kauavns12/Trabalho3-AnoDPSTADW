<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarLogado.php";

$idusuario = $_SESSION['idusuario'];
$idjogo = $_GET['id'];


// Verifica se já é favorito
$idfavorito = verificarSeEhFavorito($conexao, $idusuario, $idjogo);

if ($idfavorito) {
    // Remove dos favoritos
    excluirFavorito($conexao, $idfavorito);
} else {
    // Adiciona aos favoritos
    adicionarFavorito($conexao, $idusuario, $idjogo);
}

header('Location: ../public/jogos.php');
exit();