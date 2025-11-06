<?php

// =============================================
// FUNÇÕES DE USUÁRIO
// =============================================

function cadastrarUsuario($conexao, $nome, $gmail, $senha, $foto, $tipo)
{
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nome, gmail, senha, foto, tipo) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $gmail, $senha_hash, $foto, $tipo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarUsuario($conexao, $nome, $gmail, $senha, $idusuario, $foto)
{
    $sql = "UPDATE usuario SET nome=?, gmail=?, senha=?, foto=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssssi', $nome, $gmail, $senha, $foto ,$idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarUsuarioComSenha($conexao, $nome, $gmail, $senha, $idusuario, $foto)
{
    $sql = "UPDATE usuario SET nome = ?, gmail = ?, senha = ?, foto = ? WHERE idusuario = ?";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssssi', $nome, $gmail, $senha, $foto, $idusuario);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}

function editarUsuarioSemSenha($conexao, $nome, $gmail, $idusuario, $foto)
{
    $sql = "UPDATE usuario SET nome = ?, gmail = ?, foto = ? WHERE idusuario = ?";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $gmail, $foto, $idusuario);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}

function excluirUsuario($conexao, $idusuario)
{
    $sql = "DELETE FROM usuario WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function pesquisarUsuario_ID($conexao, $idusuario)
{
    $sql = "SELECT nome, gmail, senha, foto FROM usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $user = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $user;
}

function pesquisarUsuario_Nome($conexao, $nome)
{
    $sql = "SELECT idusuario, nome, foto FROM usuario WHERE nome LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    $nome_param = $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $nome_param);
    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    $lista_usuarios = [];
    while ($user = mysqli_fetch_assoc($resultado)) {
        $lista_usuarios[] = $user;
    }
    mysqli_stmt_close($comando);
    return $lista_usuarios;
}

function listarUsuario($conexao)
{
    $sql = "SELECT * FROM usuario";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_usuario = [];
    while ($usuario = mysqli_fetch_assoc($resultado)) {
        $lista_usuario[] = $usuario;
    }
    mysqli_stmt_close($comando);
    return $lista_usuario;
}

function listarUsuariosAleatorios($conexao, $limite = 5)
{
    $sql = "SELECT idusuario, nome, gmail, foto FROM usuario 
            WHERE idusuario != ? 
            ORDER BY RAND() 
            LIMIT ?";
    $comando = mysqli_prepare($conexao, $sql);
    $idUsuarioAtual = $_SESSION['idusuario'] ?? 0;
    mysqli_stmt_bind_param($comando, 'ii', $idUsuarioAtual, $limite);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $usuarios = [];
    while ($usuario = mysqli_fetch_assoc($resultado)) {
        $usuarios[] = $usuario;
    }
    mysqli_stmt_close($comando);
    return $usuarios;
}

function promover($conexao, $idusuario){
    $sql = "UPDATE usuario SET tipo = 'A'    WHERE idusuario = ? ";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    return $funcionou;
}

// =============================================
// FUNÇÕES DE JOGO
// =============================================

function salvarJogo($conexao, $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem, $ids_generos)
{
    $sql = "INSERT INTO jogo (nome, descricao, desenvolvedor, data_lanca, img) VALUES (?,?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssss', $nome, $descricao, $desenvolvedor, $data_lancamento, $imagem);
    mysqli_stmt_execute($comando);
    $idjogo = mysqli_insert_id($conexao);

    // Inserir múltiplos gêneros
    $funcionou = true;
    foreach ($ids_generos as $idgenero) {
        $sql2 = "INSERT INTO genero_jogo (genero_idgenero, jogo_idjogo) VALUES (?,?)";
        $comando2 = mysqli_prepare($conexao, $sql2);
        mysqli_stmt_bind_param($comando2, 'ii', $idgenero, $idjogo);
        if (!mysqli_stmt_execute($comando2)) {
            $funcionou = false;
        }
        mysqli_stmt_close($comando2);
    }
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarJogo($conexao, $idjogo, $nome, $descricao, $desenvolvedor, $data_lancamento, $img, $idgenero)
{
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

function excluirJogo($conexao, $idjogo)
{
    $sql = "DELETE FROM jogo WHERE idjogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idjogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function pesquisarJogoID($conexao, $idjogo)
{
    $sql = "SELECT * FROM jogo WHERE idjogo = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idjogo);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $jogo = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $jogo;
}

function pesquisarJogoNome($conexao, $nome)
{
    $sql = "SELECT * FROM jogo WHERE nome LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    $nome_param = $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $nome_param);
    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    $lista_jogos = [];
    while ($jogo = mysqli_fetch_assoc($resultado)) {
        $lista_jogos[] = $jogo;
    }
    mysqli_stmt_close($comando);
    return $lista_jogos;
}

function listarJogo($conexao)
{
    $sql = "SELECT * FROM jogo";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_jogo = [];
    while ($jogo = mysqli_fetch_assoc($resultado)) {
        $lista_jogo[] = $jogo;
    }
    mysqli_stmt_close($comando);
    return $lista_jogo;
}

function buscarJogoPorID($conexao, $idjogo)
{
    $sql = "SELECT * FROM jogo WHERE idjogo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idjogo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function buscarTodosJogos($conexao)
{
    $sql = "SELECT nome, img FROM jogo";
    $result = mysqli_query($conexao, $sql);
    $jogos = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $jogos[] = $row;
        }
    }
    return $jogos;
}

function listarJogosPopulares($conexao, $limite = 3)
{
    $sql = "SELECT j.*, COUNT(f.idfavorito) as total_favoritos 
            FROM jogo j 
            LEFT JOIN favorito f ON j.idjogo = f.jogo_idjogo 
            GROUP BY j.idjogo 
            ORDER BY total_favoritos DESC 
            LIMIT ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $limite);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $jogos = [];
    while ($jogo = mysqli_fetch_assoc($resultado)) {
        $jogos[] = $jogo;
    }
    mysqli_stmt_close($comando);
    return $jogos;
}

// =============================================
// FUNÇÕES DE GÊNERO
// =============================================

function salvarGenero($conexao, $nome)
{
    $sql = "INSERT INTO genero (nome) VALUES (?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 's', $nome);
    mysqli_stmt_execute($comando);
    $funcionou = (mysqli_stmt_affected_rows($comando) > 0);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarGenero($conexao, $idgenero, $nome)
{
    $sql = "UPDATE genero SET nome=? WHERE idgenero=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'si', $nome, $idgenero);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarGenero($conexao)
{
    $sql = "SELECT * FROM genero";
    $resultado = mysqli_query($conexao, $sql);
    $generos = [];
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $generos[] = $linha;
    }
    return $generos;
}

function pesquisarGeneroID($conexao, $idgenero)
{
    $sql = "SELECT * FROM genero WHERE idgenero = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idgenero);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $generos = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $generos;
}


function pesquisarJogoGenero($conexao, $idgenero)
{
    // Versão otimizada com JOIN
    $sql = "SELECT j.* FROM jogo j 
            INNER JOIN genero_jogo gj ON j.idjogo = gj.jogo_idjogo 
            WHERE gj.genero_idgenero = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idgenero);
    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    $jogos = [];
    while ($jogo = mysqli_fetch_assoc($resultado)) {
        $jogos[] = $jogo;
    }
    mysqli_stmt_close($comando);
    return $jogos;
}

// =============================================
// FUNÇÕES DE AVALIAÇÃO DE JOGO
// =============================================

function salvarAvaliacaoJogo($conexao, $classificacao, $idusuario, $idjogo)
{
    $sql = "INSERT INTO avaliacao_jogo (classificacao, usuario_idusuario, jogo_idjogo) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sii', $classificacao, $idusuario, $idjogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarAvaliacaoJogo($conexao, $idavaliacao, $classificacao, $idusuario, $idjogo)
{
    $sql = "UPDATE avaliacao_jogo SET classificacao=?, usuario_idusuario=?, jogo_idjogo=? WHERE idavaliacao_jogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'siii', $classificacao, $idusuario, $idjogo, $idavaliacao);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function excluirAvaliacaoJogo($conexao, $idavaliacao_jogo)
{
    $sql = "DELETE FROM avaliacao_jogo WHERE idavaliacao_jogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idavaliacao_jogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function buscarAvaliacoesJogo($conexao, $idjogo)
{
    $sql = "SELECT a.classificacao, u.nome
            FROM avaliacao_jogo a
            JOIN usuario u ON a.usuario_idusuario = u.idusuario
            WHERE a.jogo_idjogo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idjogo);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    $avaliacoes = [];
    while ($avaliacao = mysqli_fetch_assoc($result)) {
        $avaliacoes[] = $avaliacao;
    }
    mysqli_stmt_close($stmt);
    return $avaliacoes;
}

function calcularMediaAvaliacoes($avaliacoes)
{
    if (count($avaliacoes) === 0) {
        return 0;
    }
    $soma = 0;
    foreach ($avaliacoes as $avaliacao) {
        $soma += $avaliacao['classificacao'];
    }
    return round($soma / count($avaliacoes), 1);
}

function buscarMinhaAvaliacao($conexao, $usuario_id, $jogo_id)
{
    $sql = "SELECT classificacao FROM avaliacao_jogo
            WHERE usuario_idusuario = ? AND jogo_idjogo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $usuario_id, $jogo_id);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $avaliacao = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $avaliacao;
    }
    mysqli_stmt_close($stmt);
    return null;
}

function processarAvaliacao($conexao, $classificacao, $usuario_id, $jogo_id)
{
    $sql_check = "SELECT idavaliacao_jogo FROM avaliacao_jogo 
                 WHERE usuario_idusuario = ? AND jogo_idjogo = ?";
    $stmt = mysqli_prepare($conexao, $sql_check);
    mysqli_stmt_bind_param($stmt, "ii", $usuario_id, $jogo_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        editarAvaliacaoJogo($conexao, $row['idavaliacao_jogo'], $classificacao, $usuario_id, $jogo_id);
    } else {
        salvarAvaliacaoJogo($conexao, $classificacao, $usuario_id, $jogo_id);
    }
}

// =============================================
// FUNÇÕES DE FÓRUM - CATEGORIA
// =============================================

function salvarCategoriaForun($conexao, $nome, $descricao)
{
    $sql = "INSERT INTO categoria_forun (nome, descricao) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ss', $nome, $descricao);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarCategoriaForun($conexao, $idcategoria_forun, $nome, $descricao)
{
    $sql = "UPDATE categoria_forun SET nome=?, descricao=? WHERE idcategoria_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssi', $nome, $descricao, $idcategoria_forun);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarCategoria($conexao)
{
    $sql = "SELECT * FROM categoria_forun";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_categoria = [];
    while ($categoria = mysqli_fetch_assoc($resultado)) {
        $lista_categoria[] = $categoria;
    }
    mysqli_stmt_close($comando);
    return $lista_categoria;
}

function verificarCategoriasPadrao($conexao)
{
    $categorias_padrao = [
        ['Dúvidas', 'Tire suas dúvidas sobre os jogos'],
        ['Dicas', 'Compartilhe dicas e truques'],
        ['Bugs', 'Reporte problemas técnicos'],
        ['Sugestões', 'Deixe suas sugestões para melhorias'],
        ['Off-topic', 'Conversas não relacionadas a jogos']
    ];

    foreach ($categorias_padrao as $categoria) {
        $sql_check = "SELECT idcategoria_forun FROM categoria_forun WHERE nome = ?";
        $stmt = mysqli_prepare($conexao, $sql_check);
        mysqli_stmt_bind_param($stmt, "s", $categoria[0]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) == 0) {
            salvarCategoriaForun($conexao, $categoria[0], $categoria[1]);
        }
    }
}

function buscarCategoriaPadrao($conexao)
{
    $sql = "SELECT idcategoria_forun FROM categoria_forun LIMIT 1";
    $result = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($result);
}

// =============================================
// FUNÇÕES DE FÓRUM - TÓPICO
// =============================================

function salvarTopicoForun($conexao, $nome, $conteudo, $idcategoria_forun, $idjogo)
{
    $sql = "INSERT INTO topico_forun (nome, conteudo, categoria_forun_idcategoria_forun1,jogo_idjogo1) VALUES(?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssii', $nome, $conteudo, $idcategoria_forun, $idjogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarTopicoForun($conexao, $idtopico_forun, $nome, $conteudo, $idcategoria_forun, $idjogo)
{
    $sql = "UPDATE topico_forun SET nome=?, conteudo=?, categoria_forun_idcategoria_forun1=?, jogo_idjogo1=? WHERE idtopico_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssiii', $nome, $conteudo, $idcategoria_forun, $idjogo, $idtopico_forun);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarTopico($conexao)
{
    $sql = "SELECT * FROM topico_forun";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_topico = [];
    while ($topico = mysqli_fetch_assoc($resultado)) {
        $lista_topico[] = $topico;
    }
    mysqli_stmt_close($comando);
    return $lista_topico;
}

function buscarOuCriarTopicoJogo($conexao, $jogo_id)
{
    $sql_topico = "SELECT idtopico_forun FROM topico_forun WHERE jogo_idjogo1 = ? LIMIT 1";
    $stmt = mysqli_prepare($conexao, $sql_topico);
    mysqli_stmt_bind_param($stmt, "i", $jogo_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        $topico = mysqli_fetch_assoc($result);
        return $topico['idtopico_forun'];
    } else {
        $jogo = buscarJogoPorID($conexao, $jogo_id);
        $categoria_padrao = buscarCategoriaPadrao($conexao);
        $nome_topico = "Comentários: " . $jogo['nome'];
        $conteudo_topico = "Tópico para comentários sobre o jogo " . $jogo['nome'];
        salvarTopicoForun($conexao, $nome_topico, $conteudo_topico, $categoria_padrao['idcategoria_forun'], $jogo_id);
        return mysqli_insert_id($conexao);
    }
}

// =============================================
// FUNÇÕES DE FÓRUM - POST
// =============================================

function salvarPostForun($conexao, $conteudo, $idusuario, $idtopico_forun)
{
    $sql = "INSERT INTO post_forun (conteudo, usuario_idusuario, topico_forun_idtopico_forun) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sii', $conteudo, $idusuario, $idtopico_forun);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarPostForun($conexao, $idpost_forun, $conteudo, $idusuario, $idtopico_forun)
{
    $sql = "UPDATE post_forun SET conteudo=?, usuario_idusuario=?, topico_forun_idtopico_forun=? WHERE idpost_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'siii', $conteudo, $idusuario, $idtopico_forun, $idpost_forun);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function excluirPostForun($conexao, $idpost_forun)
{
    $sql = "DELETE FROM post_forun WHERE idpost_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idpost_forun);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarPost($conexao)
{
    $sql = "SELECT * FROM post_forun";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_post = [];
    while ($post = mysqli_fetch_assoc($resultado)) {
        $lista_post[] = $post;
    }
    mysqli_stmt_close($comando);
    return $lista_post;
}

function pesquisarPostID($conexao, $idpost)
{
    $sql = "SELECT * FROM post_forun WHERE idpost_forun=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idpost);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $post = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    return $post;
}

function pesquisarPostConteudo($conexao, $conteudo)
{
    $sql = "SELECT * FROM post_forun WHERE conteudo LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    $conteudo_param = $conteudo . "%";
    mysqli_stmt_bind_param($comando, 's', $conteudo_param);
    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    $lista_posts = [];
    while ($post = mysqli_fetch_assoc($resultado)) {
        $lista_posts[] = $post;
    }
    mysqli_stmt_close($comando);
    return $lista_posts;
}

function listarPostsComUsuarios($conexao)
{
    $sql = "SELECT pf.*, u.nome, u.foto, tf.nome AS topico_nome
            FROM post_forun pf 
            INNER JOIN usuario u ON pf.usuario_idusuario = u.idusuario 
            INNER JOIN topico_forun tf ON pf.topico_forun_idtopico_forun = tf.idtopico_forun
            ORDER BY pf.idpost_forun DESC 
            LIMIT 10";

    $posts = [];

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        while ($post = mysqli_fetch_assoc($result)) {
            $posts[] = $post;
        }
        mysqli_free_result($result); // Libera memória do resultado
    } else {
        // Em ambiente real, troque por log
        echo "Erro ao buscar posts: " . mysqli_error($conexao);
    }

    return $posts;
}

// =============================================
// FUNÇÕES DE FÓRUM - COMENTÁRIO
// =============================================

function cadastrarComentario($conexao, $comentario, $criado, $post_forun_idpost_forun, $post_forun_usuario_idusuario, $post_forun_topico_forun_idtopico_forun)
{
    $sql = "INSERT INTO comentario (comentario, criado, post_forun_idpost_forun, post_forun_usuario_idusuario, post_forun_topico_forun_idtopico_forun) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssiii', $comentario, $criado, $post_forun_idpost_forun, $post_forun_usuario_idusuario, $post_forun_topico_forun_idtopico_forun);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarComentario($conexao, $idcomentario, $comentario, $criado)
{
    $sql = "UPDATE comentario SET comentario = ?, criado = ? WHERE idcomentario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssi', $comentario, $criado, $idcomentario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarComentario($conexao, $idcomentario)
{
    $sql = "DELETE FROM comentario WHERE idcomentario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idcomentario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function ListarComentarioPost($conexao, $idpost)
{
    $sql = "SELECT * FROM comentario WHERE post_forun_idpost_forun = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idpost);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function buscarComentariosJogo($conexao, $idjogo)
{
    $sql = "SELECT c.*, u.nome as usuario_nome, u.foto as usuario_foto
            FROM comentario c 
            JOIN usuario u ON c.post_forun_usuario_idusuario = u.idusuario 
            JOIN post_forun pf ON c.post_forun_idpost_forun = pf.idpost_forun
            JOIN topico_forun tf ON pf.topico_forun_idtopico_forun = tf.idtopico_forun
            WHERE tf.jogo_idjogo1 = ?
            ORDER BY c.criado DESC";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idjogo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $comentarios = [];
    while ($comentario = mysqli_fetch_assoc($result)) {
        $comentarios[] = $comentario;
    }
    return $comentarios;
}

function processarComentario($conexao, $comentario_texto, $usuario_id, $jogo_id)
{
    $comentario_texto = mysqli_real_escape_string($conexao, $comentario_texto);
    $criado = date('Y-m-d');
    $topico_id = buscarOuCriarTopicoJogo($conexao, $jogo_id);
    salvarPostForun($conexao, $comentario_texto, $usuario_id, $topico_id);
    $post_id = mysqli_insert_id($conexao);
    cadastrarComentario($conexao, $comentario_texto, $criado, $post_id, $usuario_id, $topico_id);
}

// =============================================
// FUNÇÕES DE FAVORITO
// =============================================

function adicionarFavorito($conexao, $idusuario, $idjogo)
{
    $sql = "INSERT INTO favorito (usuario_idusuario, jogo_idjogo) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idusuario, $idjogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarFavorito($conexao, $idfavorito, $idusuario, $idjogo)
{
    $sql = "UPDATE favorito SET usuario_idusuario=?, jogo_idjogo=? WHERE idfavorito=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'iii', $idusuario, $idjogo, $idfavorito);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function excluirFavorito($conexao, $idfavorito)
{
    $sql = "DELETE FROM favorito WHERE idfavorito=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idfavorito);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarFavoritoUsuario($conexao, $idusuario)
{
    $sql = "SELECT * FROM favorito WHERE usuario_idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_favorito = [];
    if ($resultado) {
        while ($favorito = mysqli_fetch_assoc($resultado)) {
            $lista_favorito[] = $favorito;
        }
    }

    mysqli_stmt_close($comando);
    return $lista_favorito;
}

function listarFavoritoTodosUsuario($conexao)
{
    $sql = "SELECT * FROM favorito";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_favoritoTodosUsuario = [];
    while ($favorito = mysqli_fetch_assoc($resultado)) {
        $lista_favoritoTodosUsuario[] = $favorito;
    }
    return $lista_favoritoTodosUsuario;
}
function verificarSeEhFavorito($conexao, $idusuario, $idjogo) {
    $sql = "SELECT idfavorito FROM favorito WHERE usuario_idusuario = ? AND jogo_idjogo = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idusuario, $idjogo);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $favorito = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);
    
    // if ($favorito) {
        //     return $favorito['favorito'];
    // } else {
        //return false;
    // }


    return $favorito ? $favorito['idfavorito'] : false;

}

// =============================================
// FUNÇÕES DE LISTA
// =============================================

function salvar_Lista($conexao, $nome, $descricao, $situacao, $idusuario)
{
    $sql = "INSERT INTO lista (nome, descricao, situacao, usuario_idusuario1) VALUES (?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssii', $nome, $descricao, $situacao, $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editar_Lista($conexao, $nome, $descricao, $situacao, $idlista)
{
    $sql = "UPDATE lista SET nome=?, descricao=?, situacao=? WHERE idlista=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssii', $nome, $descricao, $situacao, $idlista);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function excluir_Lista($conexao, $idlista)
{
    $sql = "DELETE FROM lista WHERE idlista=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idlista);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarLista($conexao)
{
    $sql = "SELECT * FROM lista";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_lista = [];
    while ($lista = mysqli_fetch_assoc($resultado)) {
        $lista_lista[] = $lista;
    }
    mysqli_stmt_close($comando);
    return $lista_lista;
}

function listarListaUsu($conexao, $idusuario)
{
    $sql = "SELECT * FROM lista WHERE usuario_idusuario1=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_lista = [];
    while ($lista = mysqli_fetch_assoc($resultado)) {
        $lista_lista[] = $lista;
    }
    mysqli_stmt_close($comando);
    return $lista_lista;
}
function adicionarJogoLista($conexao, $idlista, $idusuario, $idjogo) {
    $sql = "INSERT INTO lista_jogo (lista_idlista, lista_usuario_idusuario, jogo_idjogo) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'iii', $idlista, $idusuario, $idjogo);
    $funcionou = mysqli_stmt_execute($comando);

    if (!$funcionou) {
        $erro = mysqli_errno($conexao);
        if ($erro === 1062) {
            // Código de erro 1062 = entrada duplicada
            return 'duplicado';
        }
        return false;
    }

    mysqli_stmt_close($comando);
    return true;
}

function listarJogosDisponiveisParaLista($conexao, $idlista)
{
    $sql = "SELECT * FROM jogo 
            WHERE idjogo NOT IN (
                SELECT jogo_idjogo FROM lista_jogo WHERE lista_idlista = ?
            )";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idlista);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $jogos = [];
    while ($jogo = mysqli_fetch_assoc($resultado)) {
        $jogos[] = $jogo;
    }
    mysqli_stmt_close($comando);
    return $jogos;
}

function listarJogoLista($conexao)
{
    $sql = "SELECT * FROM lista_jogo";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_lista = [];
    while ($lista = mysqli_fetch_assoc($resultado)) {
        $lista_lista[] = $lista;
    }
    return $lista_lista;
}

function pesquisarListaID ($conexao, $idlista) {
    $sql = "SELECT * FROM lista WHERE idlista = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idlista);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_lista = [];
    while ($lista = mysqli_fetch_assoc($resultado)) {
        $lista_lista[] = $lista;
    }
    mysqli_stmt_close($comando);
    return $lista_lista;
}


function listarJogosDaLista($conexao, $idlista)
{
    $sql = "SELECT 
                j.idjogo,
                j.nome,
                j.descricao,
                j.desenvolvedor,
                j.data_lanca,
                j.img,
                GROUP_CONCAT(g.nome SEPARATOR ', ') AS generos
            FROM 
                lista_jogo lj
            INNER JOIN 
                jogo j ON j.idjogo = lj.jogo_idjogo
            LEFT JOIN 
                genero_jogo gj ON gj.jogo_idjogo = j.idjogo
            LEFT JOIN 
                genero g ON g.idgenero = gj.genero_idgenero
            WHERE 
                lj.lista_idlista = ?
            GROUP BY 
                j.idjogo, j.nome, j.descricao, j.desenvolvedor, j.data_lanca, j.img";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idlista);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $jogos = [];
    while ($jogo = mysqli_fetch_assoc($resultado)) {
        $jogos[] = $jogo;
    }

    mysqli_stmt_close($comando);
    return $jogos;
}


function jogoNaLista($conexao, $idlista, $idjogo) {
    $sql = "SELECT 1 FROM lista_jogo WHERE lista_idlista = ? AND jogo_idjogo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $idlista, $idjogo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $existe = mysqli_stmt_num_rows($stmt) > 0;

    mysqli_stmt_close($stmt);
    return $existe;
}


// =============================================
// FUNÇÕES DE CONQUISTA
// =============================================


function salvarConquista($conexao, $nome, $descricao)
{
    $sql = "INSERT INTO conquista (nome, descricao) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ss', $nome, $descricao);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarConquista($conexao)
{
    $sql = "SELECT * FROM conquista";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_conquista = [];
    while ($conquista = mysqli_fetch_assoc($resultado)) {
        $lista_conquista[] = $conquista;
    };
    mysqli_stmt_close($comando);
    return $lista_conquista;
}

function pesquisarConquistaNome($conexao, $nome)
{
    $sql = "SELECT * FROM conquista WHERE nome LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    $nome_param = $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $nome_param);
    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    $lista_conquistas = [];
    while ($conquista = mysqli_fetch_assoc($resultado)) {
        $lista_conquistas[] = $conquista;
    }
    mysqli_stmt_close($comando);
    return $lista_conquistas;
}

function conquistaUsu($conexao, $idconquista, $idusuario)
{
    $sql = "INSERT INTO conquista_usu (conquista_idconquista, usuario_idusuario) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idconquista, $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarConquistaUsu($conexao, $idusuario)
{
    $sql = "SELECT * FROM conquista_usu WHERE usuario_idusuario = ? ";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    mysqli_stmt_execute($comando);

    




    $resultado = mysqli_stmt_get_result($comando);
    $lista_ConquistaUsuario = [];
    while ($conquistsausu = mysqli_fetch_assoc($resultado)) {
        $lista_ConquistaUsuario[] = $conquistsausu;
    }
    return $lista_ConquistaUsuario;
}

// =============================================
// FUNÇÕES DE HISTÓRICO
// =============================================

function salvarHistoricoJogo($conexao, $tempo_ini, $tempo_fim, $usuario_idusuario)
{
    $sql = "INSERT INTO histo_jogo (tempo_ini, tempo_fim, usuario_idusuario) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssi', $tempo_ini, $tempo_fim, $usuario_idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function excluirHistoricoJogo($conexao, $idhisto_jogo)
{
    $sql = "DELETE FROM histo_jogo WHERE idhisto_jogo=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idhisto_jogo);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

// =============================================
// FUNÇÕES DE PREFERÊNCIA
// =============================================

function salvarPreferencia($conexao, $idusuario, $idgenero)
{
    $sql = "INSERT INTO preferencia (usuario_idusuario, genero_idgenero) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idusuario, $idgenero);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function editarPreferencia($conexao, $idgenero, $idusuario)
{
    $sql = "UPDATE preferencia SET genero_idgenero=? WHERE usuario_idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idgenero, $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function listarPreferencia($conexao)
{
    $sql = "SELECT * FROM preferencia";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_preferencia = [];
    while ($pref = mysqli_fetch_assoc($resultado)) {
        $lista_preferencia[] = $pref;
    }
    mysqli_stmt_close($comando);
    return $lista_preferencia;
}

function listarPreferenciaUsu($conexao, $idusuario)
{
    $sql = "SELECT * FROM preferencia WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_preferencia = [];
    while ($pref = mysqli_fetch_assoc($resultado)) {
        $lista_preferencia[] = $pref;
    }
    mysqli_stmt_close($comando);
    return $lista_preferencia;
}

function listarPreferenciaGen($conexao, $idgenero)
{
    $sql = "SELECT * FROM preferencia WHERE genero_idgenero = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idgenero);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $lista_preferencia = [];
    while ($pref = mysqli_fetch_assoc($resultado)) {
        $lista_preferencia[] = $pref;
    }
    mysqli_stmt_close($comando);
    return $lista_preferencia;
}

// =============================================
// FUNÇÕES DE RELACIONAMENTO
// =============================================

function efetuarRelacionamento($conexao, $idusuario1, $idusuario2)
{
    $sql = "INSERT INTO relacionamento (seguindo, seguidor) VALUES (?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ii', $idusuario1, $idusuario2);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function acabarRelacionamento($conexao, $idrelacionamento)
{
    $sql = "DELETE FROM relacionamento WHERE idrelacionamento = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idrelacionamento);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

// =============================================
// FUNÇÕES DE EXCLUSÃO EM CASCATA
// =============================================

function deletarComentarioUsuario($conexao, $idusuario)
{
    $sql = "DELETE FROM comentario WHERE post_forun_usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarConquistaUsu($conexao, $idusuario)
{
    $sql = "DELETE FROM conquista_usu WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarHistoJogo($conexao, $idusuario)
{
    $sql = "DELETE FROM histo_jogo WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarAvaliacaoJogo($conexao, $idusuario)
{
    $sql = "DELETE FROM avaliacao_jogo WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarFavoritoUsu($conexao, $idusuario)
{
    $sql = "DELETE FROM favorito WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarTopicoUsu($conexao, $idusuario)
{
    $sql = "DELETE FROM topico_usu WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarListaUsu($conexao, $idusuario)
{
    $sql = "DELETE FROM lista WHERE usuario_idusuario1 = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarPreferencia($conexao, $idusuario)
{
    $sql = "DELETE FROM preferencia WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarPostUsu($conexao, $idusuario)
{
    $sql = "DELETE FROM post_forun WHERE usuario_idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    return $funcionou;
}

function deletarRelacionametoUsu($conexao, $idusuario)
{
    $sql1 = "DELETE FROM relacionamento WHERE seguidor = ?";
    $comando1 = mysqli_prepare($conexao, $sql1);
    mysqli_stmt_bind_param($comando1, 'i', $idusuario);
    $funcionou1 = mysqli_stmt_execute($comando1);
    mysqli_stmt_close($comando1);

    $sql2 = "DELETE FROM relacionamento WHERE seguindo = ?";
    $comando2 = mysqli_prepare($conexao, $sql2);
    mysqli_stmt_bind_param($comando2, 'i', $idusuario);
    $funcionou2 = mysqli_stmt_execute($comando2);
    mysqli_stmt_close($comando2);

    return ($funcionou1 && $funcionou2);
}

// =============================================
// FUNÇÕES DE RENDERIZAÇÃO
// =============================================

function renderizarSecaoAvaliacao($media_avaliacao, $total_avaliacoes, $minha_avaliacao) {
    ?>
    <div class="rating-section">
        <div class="section-title">
            <i class="fas fa-star"></i>
            <h2>Avaliação do Jogo</h2>
        </div>
        
        <div class="rating-display">
            <div class="average-rating">
                <?php echo $media_avaliacao; ?> <i class="fas fa-star" style="color: #ffc107;"></i>
            </div>
            <div class="rating-count">
                Baseado em <?php echo $total_avaliacoes; ?> avaliações
            </div>
        </div>
        
        <form method="POST" action="">
            <div class="stars-input">
                <?php for ($i = 5; $i >= 1; $i--): ?>
                    <input type="radio" id="estrela<?php echo $i; ?>" name="classificacao" value="<?php echo $i; ?>" 
                           <?php echo ($minha_avaliacao && $minha_avaliacao['classificacao'] == $i) ? 'checked' : ''; ?>>
                    <label for="estrela<?php echo $i; ?>"><i class="fas fa-star"></i></label>
                <?php endfor; ?>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Avaliar</button>
            </div>
        </form>
        
        <div class="rating-stats">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-value"><?php echo $media_avaliacao >= 3 ? 'Y' : 'N'; ?></div>
                <div class="stat-label">ANALIAÇÃO GERAL</div>
            </div>
            
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value"><?php echo $total_avaliacoes; ?></div>
                <div class="stat-label">TOTAL DE AVALIAÇÕES</div>
            </div>
            
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="stat-value">
                    <?php 
                    if ($minha_avaliacao) {
                        echo $minha_avaliacao['classificacao'] >= 3 ? 'Y' : 'N';
                    } else {
                        echo '-';
                    }
                    ?>
                </div>
                <div class="stat-label">SUA AVALIAÇÃO</div>
            </div>
        </div>
    </div>
    <?php
}

function renderizarSecaoComentarios($comentarios) {
    ?>
    <div class="comments-section">
        <div class="section-title">
            <i class="fas fa-comments"></i>
            <h2>Comentários</h2>
        </div>
        
        <div class="comment-form">
            <form method="POST" action="">
                <textarea name="comentario" required placeholder="Digite seu comentário aqui..."></textarea>
                <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Enviar Comentário</button>
            </form>
        </div>
        
        <?php if (count($comentarios) > 0): ?>
            <?php foreach ($comentarios as $comentario): ?>
                <div class="comment">
                    <div class="comment-avatar">
                        <?php if (!empty($comentario['usuario_foto'])): ?>
                            <img src="<?php echo $comentario['usuario_foto']; ?>" alt="<?php echo $comentario['usuario_nome']; ?>">
                        <?php else: ?>
                            <?php echo strtoupper(substr($comentario['usuario_nome'], 0, 1)); ?>
                        <?php endif; ?>
                    </div>
                    <div class="comment-content">
                        <div class="comment-header">
                            <div class="comment-user"><?php echo $comentario['usuario_nome']; ?></div>
                            <div class="comment-date"><?php echo date('d/m/Y', strtotime($comentario['criado'])); ?></div>
                        </div>
                        <div class="comment-text">
                            <?php echo $comentario['comentario']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-comments">
                <i class="far fa-comment-dots"></i>
                <h3>Nenhum comentário ainda</h3>
                <p>Seja o primeiro a comentar sobre este jogo!</p>
            </div>
        <?php endif; ?>
    </div>
    <?php
}

// =============================================
// FUNÇÕES DE INTERFACE
// =============================================

function exibirMenu($paginaAtiva = '') {
    $menu = '
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-gamepad logo-icon"></i>
            <span class="logo-text">Friv Games & WIKI</span>
        </a>
        
        <ul class="nav-links">
            <li><a href="home.php" class="' . ($paginaAtiva == 'home' ? 'active' : '') . '">INÍCIO</a></li>
            <li><a href="jogos.php" class="' . ($paginaAtiva == 'jogos' ? 'active' : '') . '">JOGOS</a></li>
            <li><a href="comunidade.php" class="' . ($paginaAtiva == 'comunidade' ? 'active' : '') . '">COMUNIDADE</a></li>
            <li><a href="foruns.php" class="' . ($paginaAtiva == 'foruns' ? 'active' : '') . '">FÓRUNS</a></li>
        </ul>
        
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <a href="pesquisar.php" class="' . ($paginaAtiva == 'pesquisar' ? 'active' : '') . '">PESQUISAR</a>
        </div>
        
        <div class="user-menu">
            <div class="user-avatar">
                <img src="../controle/fotos/' . ($_SESSION['foto'] ?? 'default.png') . '" alt="Avatar">
            </div>
            <div class="user-name">' . ($_SESSION['nome'] ?? 'Usuário') . '</div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </div>
        
        <div>
            <div>
                <a href="../controle/deslogar.php" class="nav-button">Deslogar</a>
            </div>
            <div>
                <a href="./configuracoes.php" class="nav-button">Configurações</a>
            </div>
        </div>
    </nav>';
    
    return $menu;
}

?>