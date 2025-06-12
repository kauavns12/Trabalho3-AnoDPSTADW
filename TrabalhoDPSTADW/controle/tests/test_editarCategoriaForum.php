<?php
     require_once "../conexao.php";
     require_once "../funcoes.php";

    $nome = "Vitorioso";
    $descricao = "Eu ganhei um açaí de 10 Litros";
    $idcategoria_forun = 1;
    editarCategoriaForun($conexao, $idcategoria_forun, $nome, $descricao);

?>



