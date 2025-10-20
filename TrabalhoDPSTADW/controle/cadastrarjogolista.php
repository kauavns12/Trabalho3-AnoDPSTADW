<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarLogado.php";

$idusuario = $_SESSION['idusuario'];
$idjogo = $_POST['jogo'];

// Primeiro pegar a lista do usuário (suponho que o usuário tenha só uma lista)
$resultado = listarListaUsu($conexao, $idusuario);
$idlista = $resultado[0]['idlista'];
// var_dump($idusuario, $idjogo, $resultado);
// Verificar se o jogo já está na lista
if (jogoNaLista($conexao, $idlista, $idjogo)) {
    // Jogo já existe, mostrar mensagem
    // echo "Esse jogo já está na sua lista!";
    // Aqui você pode redirecionar ou exibir a mensagem na tela, por exemplo:
    header('Location: ../public/listas.php?error=jaexiste');
    exit;
} else {
    // Jogo não está na lista, pode adicionar
    adicionarJogoLista($conexao, $idlista, $idusuario, $idjogo);
    header('Location: ../public/listas.php?success=adicionado');
    exit;
}
?>
