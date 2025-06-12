<?php

function salvarUsuario($conexao, $nome, $gmail, $senha){
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nome, gmail, senha, tipo) VALUES (?, ?, ?, 'c')";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $gmail, $senha_hash);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function excluirUsuario($conexao, $idusuario){
    $sql = "DELETE FROM usuario WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

}
function editarUsuario($conexao, $nome, $gmail, $senha){
    $sql = "UPDATE usuario SET nome=?, gmail=?, senha=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $gmail, $senha, $idusuario);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
}

function pesquisarUsuario_ID($conexao, $idusuario){
    $sql = "SELECT * FROM tb_usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $usuario = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $usuario;
}


function salvarJogo($conexao, $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem){
    $sql = "INSERT INTO jogo (nome, descricao, desenvolvedor, data_lanca, img) VALUES (?,?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
    
}

function editarJogo($conexao, $idjogo, $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem, $idgenero){
    $sql = "UPDATE jogo SET nome=?, descricao=?, desenvolvedor=?, data_laca=?, imagem=?, idgenero=? WHERE idjogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssssii', $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem, $idgenero, $idjogo);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}

function pesquisarJogoID($conexao, $idjogo){
    $sql = "SELECT * FROM jogo WHERE idjogo = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idjogo);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $jogo = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $jogo;
}

function pesquisarJogoNome($conexao, $nome){
    $sql = "SELECT * FROM jogo WHERE nome = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $jogo = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $jogo;
}

function salvarGenero($conexao, $nome){
    $sql = "INSERT INTO genero (nome) VALUES (?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 's', $nome);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function editarGenero($conexao, $idgenero, $nome){
    $sql = "UPDATE genero SET nome=? WHERE idjogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'si', $nome, $idgenero);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}

function pesquisarJogoGenero($conexao, $idgenero){
    $sql = "SELECT * FROM jogo WHERE idgenero = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idgenero);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $jogo = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $jogo;
}

function salvarConquista($conexao, $nome, $descricao){
    $sql = "INSERT INTO conquista (nome, descricao) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ss', $nome, $descricao);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function listarConquista($conexao){
    $sql = "SELECT * FROM conquista";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $conquista = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $conquista;
}

function pesquisarConquistaNome($conexao, $nome){
    $sql = "SELECT * FROM conquista WHERE nome=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $conquista = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $conquista;
}

function salvarCategoriaForun($conexao, $nome, $descricao){
    $sql = "INSERT INTO categoria_forun (nome, descricao) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ss', $nome, $descricao);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function editarCategoriaForun($conexao, $idcategoria_forun, $nome, $descricao){
    $sql = "UPDATE categoria_forun SET nome=?, descrição WHERE idjogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'si', $nome, $idgenero);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}

function salvarTopicoForun($conexao, $nome, $conteudo, $idjogo, $idcategoria_forun, $idusuario){

}
function editarTopicoForum($conexao, $idtopico_forun ,$nome, $conteudo,$idjogo,$idcategoria_forun, $idusuario){

}

function salvarPostForun($conexao, $conteudo, $idusuario, $idtopico_forun, $idjogo, $idcategoria_forun){

}

function editarPostForun($conexao, $idpost_forun,  $conteudo, $idusuario, $idtopico_forun, $idjogo, $idcategoria_forun){

}

function excluirPostForun($conexao, $idpost_forun){

}

function salvarAvaliacaoJogo($conexao, $classificacao, $idjogo, $idusuario){

}

function editarAvaliacaoJogo($conexao, $idavaliacao, $classificacao, $idjogo, $idusuario){

}

function excluirAvaliacaoJogo($conexao, $idavaliacao){

}

function adicionarFavorito($conexao, $idusuario, $idjogo){
    $sql = "INSERT INTO favorito (idusuario, idjogo) VALUES (?,?)"; 
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idusuario, $idjogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
    
}

function excluirFavorito($conexao, $idfavorito){
    $sql = "DELETE FROM favorito WHERE idfavorito=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idfavorito);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

}

function listarFavoritoUsuario($conexao, $idusuario) {
    $sql = "SELECT * FROM favorito WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;



}
function realizarLogin($conexao, $nome, $gmail, $senha){

}


function salvarHistoricoJogo($conexao, $tempo_ini, $tempo_fim, $idusuario, $idjogo, $idavaliacao){

}

function salvar_Lista($conexao, $nome, $descricao, $situacao, $idusuario, $idjogo){
    $sql = "INSERT INTO lista (nome, descricao, situacao, idusuario, idjogo) VALUES (?,?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssii', $nome, $descricao, $situacao, $idusuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function excluir_Lista($conexao, $idlista){

}

function editar_Lista($conexao, $nome, $descricao, $situacao, $idusuario){

}

function excluirHistoricoJogo($conexao, $idhisto_jogo){

}

function pesquisarUsuarioNome($conexao, $nome){

}

function salvarPreferencia($conexao, $idusuario, $idjogo, $idgenero){

}

function editarPreferencia($conexao, $idusuario, $idjogo, $idgenero){

}



?>
