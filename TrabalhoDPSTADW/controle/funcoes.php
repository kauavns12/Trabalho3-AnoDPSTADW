<?php

function cadastrarUsuario($conexao, $nome, $gmail, $senha, $foto, $tipo, $status){
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nome, gmail, senha, foto, tipo, status) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssssss', $nome, $gmail, $senha_hash, $foto, $tipo, $status);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function login($conexao, $nome, $gmail, $senha, $foto, $tipo, $status){
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nome, gmail, senha, foto, tipo, status) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssssss', $nome, $gmail, $senha_hash, $foto, $tipo, $status);
    
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
function editarUsuario($conexao, $nome, $gmail, $senha, $idusuario){
    $sql = "UPDATE usuario SET nome=?, gmail=?, senha=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $gmail, $senha, $idusuario);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
}

function pesquisarUsuario_ID($conexao, $idusuario){
    $sql = "SELECT nome, foto, status FROM usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $user = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $user;
}
function pesquisarUsuario_Nome($conexao, $nome){
    $sql = "SELECT nome, foto, status FROM usuario WHERE nome = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $user = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $user;
}

function salvarJogo($conexao, $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem, $idgenero) {

    $sql = "INSERT INTO jogo (nome, descricao, desenvolvedor, data_lanca, img) VALUES (?,?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem);
    mysqli_stmt_execute($comando);
    

    $idjogo = mysqli_insert_id($conexao);
    

    $sql2 = "INSERT INTO genero_jogo (genero_idgenero, jogo_idjogo) VALUES (?,?)";
    $comando2 = mysqli_prepare($conexao, $sql2);
    
    mysqli_stmt_bind_param($comando2, 'ii', $idgenero, $idjogo);
    $funcionou = mysqli_stmt_execute($comando2);
    

    mysqli_stmt_close($comando);
    mysqli_stmt_close($comando2);
    
    return $funcionou;
}

function excluirJogo($conexao, $idjogo){
    $sql = "DELETE FROM jogo WHERE idjogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idjogo);
    
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
    $sql = "UPDATE genero SET nome=? WHERE idgenero=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'si', $nome, $idgenero);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}

function pesquisarJogoGenero($conexao, $idgenero){

    $sql = "SELECT jogo_idjogo FROM genero_jogo WHERE genero_idgenero=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idgenero);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    
    $jogos = array(); 
    

    while ($linha = mysqli_fetch_assoc($resultado)) {
        $idjogo = $linha['jogo_idjogo'];
        
        $sql2 = "SELECT * FROM jogo WHERE idjogo = ?";
        $comando2 = mysqli_prepare($conexao, $sql2);
        
        mysqli_stmt_bind_param($comando2, 'i', $idjogo);
        mysqli_stmt_execute($comando2);
        $resultado2 = mysqli_stmt_get_result($comando2);
        
        if ($jogo = mysqli_fetch_assoc($resultado2)) {
            $jogos[] = $jogo;
        }
        
        mysqli_stmt_close($comando2);
    }
    
    mysqli_stmt_close($comando);
    return $jogos;
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
    $lista_conquista=[];
    while($conquista = mysqli_fetch_assoc($resultado)){
        $lista_conquista[]=$conquista;
    };

    mysqli_stmt_close($comando);
    return $lista_conquista;
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
    $sql = "UPDATE categoria_forun SET nome=?, descricao=? WHERE idcategoria_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $nome, $descricao, $idcategoria_forun);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}

function salvarTopicoForun($conexao, $nome, $conteudo,$idcategoria_forun, $idjogo){
    $sql = "INSERT INTO topico_forun (nome, conteudo, categoria_forun_idcategoria_forun1,jogo_idjogo1) VALUES(?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssii', $nome, $conteudo, $idcategoria_forun, $idjogo);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}
function editarTopicoForun($conexao, $idtopico_forun ,$nome, $conteudo,$idcategoria_forun, $idjogo){
    $sql = "UPDATE topico_forun SET nome=?, conteudo=?, categoria_forun_idcategoria_forun1=?, jogo_idjogo1=? WHERE idtopico_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssiii', $nome, $conteudo, $idcategoria_forun, $idjogo, $idtopico_forun);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}

function salvarPostForun($conexao, $conteudo, $idusuario, $idtopico_forun){
    $sql = "INSERT INTO post_forun (conteudo, usuario_idusuario, topico_forun_idtopico_forun) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sii', $conteudo, $idusuario, $idtopico_forun);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;


}

function editarPostForun($conexao, $idpost_forun, $conteudo, $idusuario, $idtopico_forun){
      $sql = "UPDATE post_forun SET conteudo=?, usuario_idusuario=?, topico_forun_idtopico_forun=? WHERE idpost_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'siii', $conteudo, $idusuario, $idtopico_forun, $idpost_forun);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

    
}

function excluirPostForun($conexao, $idpost_forun){
     $sql = "DELETE FROM post_forun WHERE idpost_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idpost_forun);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

}

function salvarAvaliacaoJogo($conexao, $classificacao, $idusuario, $idjogo){
    $sql = "INSERT INTO avaliacao_jogo (classificacao, usuario_idusuario, jogo_idjogo) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sii', $classificacao, $idusuario, $idjogo);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}



function editarAvaliacaoJogo($conexao, $idavaliacao, $classificacao, $idusuario, $idjogo){
    $sql = "UPDATE avaliacao_jogo SET classificacao=?, usuario_idusuario=?, jogo_idjogo=? WHERE idavaliacao_jogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'siii', $classificacao, $idusuario, $idjogo, $idavaliacao);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;

}

function excluirAvaliacaoJogo($conexao, $idavaliacao_jogo){
    $sql = "DELETE FROM avaliacao_jogo  WHERE idavaliacao_jogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idavaliacao_jogo);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

}

function adicionarFavorito($conexao, $idusuario, $idjogo){
    $sql = "INSERT INTO favorito (usuario_idusuario, jogo_idjogo) VALUES (?,?)"; 
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idusuario, $idjogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
    
}

function editarFavorito($conexao, $idfavorito, $idusuario, $idjogo){
    $sql = "UPDATE favorito SET usuario_idusuario=?, jogo_idjogo=?  WHERE idfavorito=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'iii', $idusuario, $idjogo, $idfavorito);
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
    $sql = "SELECT * FROM favorito WHERE usuario_idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

}
function listarFavoritoTodosUsuario($conexao){
    $sql = "SELECT * FROM favorito ";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_favoritoTodosUsuario= [];

    while ($favorito = mysqli_fetch_assoc($resultado)){
        $lista_favoritoTodosUsuario[] = $favorito;
    }

    return $lista_favoritoTodosUsuario;
}

function salvar_Lista($conexao, $nome, $descricao, $situacao, $idusuario){
    $sql = "INSERT INTO lista (nome, descricao, situacao, usuario_idusuario1) VALUES (?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $descricao, $situacao, $idusuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function excluir_Lista($conexao, $idlista){
    $sql = "DELETE FROM lista WHERE idlista=?";
    $comando =  mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idlista);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function editar_Lista($conexao, $nome, $descricao, $situacao, $idlista){
     $sql = "UPDATE lista SET nome=?, descricao=?, situacao=?  WHERE idlista=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssii', $nome, $descricao, $situacao, $idlista);
     $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
    mysqli_stmt_close($comando);
    return $funcionou;
}

function salvarHistoricoJogo($conexao, $tempo_ini, $tempo_fim, $usuario_idusuario){
$sql = "INSERT INTO histo_jogo (tempo_ini, tempo_fim, usuario_idusuario) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $tempo_ini, $tempo_fim, $usuario_idusuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function excluirHistoricoJogo($conexao, $idhisto_jogo){
    $sql = "DELETE FROM histo_jogo WHERE idhisto_jogo=?";
    $comando =  mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idhisto_jogo);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function salvarPreferencia($conexao, $idusuario, $idgenero){
    $sql = "INSERT INTO preferencia (usuario_idusuario, genero_idgenero) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ii', $idusuario, $idgenero);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function editarPreferencia($conexao, $idgenero, $idusuario){
    $sql = "UPDATE preferencia SET genero_idgenero=?  WHERE usuario_idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ii', $nome, $idgenero,$idusuario);
     $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function editarJogo($conexao, $idjogo, $nome, $descricao, $desenvolvedor, $data_lancamento, $img, $idgenero) {
    
    $sql = "UPDATE jogo SET nome=?, descricao=?, desenvolvedor=?, data_lanca=?, img=? WHERE idjogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssssi', $nome, $descricao, $desenvolvedor, $data_lancamento, $img, $idjogo);
    $funcionou1 = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    
    $sql2 = "UPDATE genero_jogo SET genero_idgenero=? WHERE jogo_idjogo=?";
    $comando2 = mysqli_prepare($conexao, $sql2);
    
    mysqli_stmt_bind_param($comando2, 'ii', $idgenero, $idjogo);
    $funcionou2 = mysqli_stmt_execute($comando2);
    mysqli_stmt_close($comando2);
    
    
    return ($funcionou1 && $funcionou2);
}

function listarUsuario($conexao){
    $sql = "SELECT * FROM usuario";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_usuario= [];

    while ($usuario = mysqli_fetch_assoc($resultado)){
        $lista_usuario[] = $usuario;
    }

    mysqli_stmt_close($comando);
    return $lista_usuario;
}

function listarJogo($conexao){
    $sql = "SELECT * FROM jogo";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_jogo= [];

    while ($jogo = mysqli_fetch_assoc($resultado)){
        $lista_jogo[] = $jogo;
    }

    mysqli_stmt_close($comando);
    return $lista_jogo;
}

function conquistaUsu($conexao, $idconquista, $idusuario){
    $sql = "INSERT INTO conquista_usu (conquista_idconquista, usuario_idusuario) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ii', $idconquista, $idusuario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

}
function listarConquistaUsu($conexao){
    $sql = "SELECT * FROM conquista_usu ";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_ConquistaUsuario= [];

    while ($conquistsausu = mysqli_fetch_assoc($resultado)){
        $lista_ConquistaUsuario[] = $conquistsausu;
    }

    return $lista_ConquistaUsuario;
}



function cadastrarComentario($conexao, $comentario, $criado, $post_forun_idpost_forun, $post_forun_usuario_idusuario, $post_forun_topico_forun_idtopico_forun){
    $sql = "INSERT INTO comentario (comentario, criado, post_forun_idpost_forun, post_forun_usuario_idusuario, post_forun_topico_forun_idtopico_forun) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssiii', $comentario, $criado, $post_forun_idpost_forun, $post_forun_usuario_idusuario, $post_forun_topico_forun_idtopico_forun);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

  
}

function efetuarRelacionamento($conexao, $idusuario1, $idusario2){

    $sql = "INSERT INTO seguidor (seguindo, seguidor) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ii',$idusuario1, $idusario2 );
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

}

function acabarRelacionamento($conexao, $idrelacionamento){
    $sql = "DELETE * FROM relacionamento WHERE idrelacionamento = ?";
    $comando =  mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idrelacionamento);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}



















?>

