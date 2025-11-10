<?php
// editarUsuario.php
require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

session_start();

// aqui pegue o id do usuário logado da sessão
$id_usuario = $_GET['id'];

// busca dados do usuário
$funcionou = promover($conexao,$id_usuario);

if($funcionou == true){
    header("Location: listarUsuario_adm.php");
}
