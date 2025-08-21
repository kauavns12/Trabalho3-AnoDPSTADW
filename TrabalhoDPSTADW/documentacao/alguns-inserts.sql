-- Inserindo dados na tabela jogo
INSERT INTO friv.jogo (nome, descricao, desenvolvedor, data_lanca, img) VALUES
('Candy Crush Saga', 'Jogo de puzzle com doces', 'King', '2012-04-12', 'candy_crush.jpg'),
('Among Us', 'Jogo de investigação multijogador', 'InnerSloth', '2018-06-15', 'among_us.jpg'),
('Subway Surfers', 'Jogo de corrida infinita', 'Kiloo', '2012-05-24', 'subway_surfers.jpg'),
('Clash of Clans', 'Jogo de estratégia em tempo real', 'Supercell', '2012-08-02', 'coc.jpg'),
('Pokémon GO', 'Jogo de realidade aumentada', 'Niantic', '2016-07-06', 'pogo.jpg');

-- Inserindo dados na tabela usuario
INSERT INTO friv.usuario (nome, gmail, senha, foto, tipo, status) VALUES
('João Silva', 'joao.silva@gmail.com', SHA2('senha123', 256), 'joao.jpg', 'U', 'Ativo'),
('Maria Santos', 'maria.santos@gmail.com', SHA2('abc456', 256), 'maria.jpg', 'U', 'Ativo'),
('Pedro Costa', 'pedro.costa@gmail.com', SHA2('pedro789', 256), 'pedro.jpg', 'A', 'Ativo'),
('Ana Oliveira', 'ana.oliveira@gmail.com', SHA2('ana1011', 256), 'ana.jpg', 'U', 'Inativo'),
('Carlos Pereira', 'carlos.pereira@gmail.com', SHA2('carlos1213', 256), 'carlos.jpg', 'U', 'Ativo');

-- Inserindo dados na tabela genero
INSERT INTO friv.genero (nome) VALUES
('Puzzle'),
('Ação'),
('Estratégia'),
('Aventura'),
('Esporte');

-- Inserindo dados na tabela categoria_forun
INSERT INTO friv.categoria_forun (nome, descricao) VALUES
('Dúvidas', 'Tire suas dúvidas sobre os jogos'),
('Dicas', 'Compartilhe dicas e truques'),
('Bugs', 'Reporte problemas técnicos'),
('Sugestões', 'Deixe suas sugestões para melhorias'),
('Off-topic', 'Conversas não relacionadas a jogos');

-- Inserindo dados na tabela topico_forun (depende de jogo e categoria_forun)
INSERT INTO friv.topico_forun (nome, conteudo, categoria_forun_idcategoria_forun1, jogo_idjogo1) VALUES
('Como passar da fase 50?', 'Estou travado na fase 50 do Candy Crush', 2, 1),
('Melhores estratégias', 'Quais as melhores estratégias para vencer?', 2, 4),
('Problema de conexão', 'Não consigo me conectar ao jogo', 3, 2),
('Novos personagens', 'Sugestão para novos personagens', 4, 3),
('Eventos especiais', 'Discussão sobre eventos futuros', 5, 5);

-- Inserindo dados na tabela post_forun (depende de usuario e topico_forun)
INSERT INTO friv.post_forun (conteudo, usuario_idusuario, topico_forun_idtopico_forun) VALUES
('Também estou com dificuldade nessa fase', 2, 1),
('Use boosters no início da fase', 3, 1),
('Upgrade suas defesas primeiro', 1, 2),
('Reinicie o aplicativo', 4, 3),
('Concordo com a sugestão', 5, 4);

-- Inserindo dados na tabela avaliacao_jogo (depende de usuario e jogo)
INSERT INTO friv.avaliacao_jogo (classificacao, usuario_idusuario, jogo_idjogo) VALUES
(5, 1, 1),
(4, 2, 2),
(3, 3, 3),
(5, 4, 4),
(4, 5, 5);

-- Inserindo dados na tabela histo_jogo (depende de usuario)
INSERT INTO friv.histo_jogo (tempo_ini, tempo_fim, usuario_idusuario) VALUES
('2024-01-15 10:00:00', '2024-01-15 11:30:00', 1),
('2024-01-16 14:00:00', '2024-01-16 15:45:00', 2),
('2024-01-17 09:00:00', '2024-01-17 10:15:00', 3),
('2024-01-18 16:00:00', '2024-01-18 17:20:00', 4),
('2024-01-19 13:00:00', '2024-01-19 14:30:00', 5);

-- Inserindo dados na tabela conquista
INSERT INTO friv.conquista (nome, descricao) VALUES
('Primeiros Passos', 'Complete o tutorial'),
('Veterano', 'Jogue por 100 horas'),
('Colecionador', 'Desbloqueie todos os itens'),
('Mestre', 'Complete todas as fases'),
('Social', 'Adicione 10 amigos');

-- Inserindo dados na tabela favorito (depende de usuario e jogo)
INSERT INTO friv.favorito (usuario_idusuario, jogo_idjogo) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 1);

-- Inserindo dados na tabela lista (depende de usuario)
INSERT INTO friv.lista (nome, descricao, situacao, usuario_idusuario1) VALUES
('Para jogar', 'Jogos que quero experimentar', 1, 1),
('Favoritos', 'Meus jogos preferidos', 1, 2),
('Completos', 'Jogos que finalizei', 0, 3),
('Multiplayer', 'Jogos para jogar com amigos', 1, 4),
('Casual', 'Jogos para momentos rápidos', 1, 5);

-- Inserindo dados na tabela genero_jogo (depende de genero e jogo)
INSERT INTO friv.genero_jogo (genero_idgenero, jogo_idjogo) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 4),
(4, 5);

-- Inserindo dados na tabela topico_usu (depende de topico_forun e usuario)
INSERT INTO friv.topico_usu (topico_forun_idtopico_forun, topico_forun_jogo_idjogo, usuario_idusuario) VALUES
(1, 1, 1),
(2, 4, 2),
(3, 2, 3),
(4, 3, 4),
(5, 5, 5);

-- Inserindo dados na tabela relhisto_jogo (depende de histo_jogo e jogo)
INSERT INTO friv.relhisto_jogo (histo_jogo_idhisto_jogo, jogo_idjogo) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- Inserindo dados na tabela conquista_usu (depende de conquista e usuario)
INSERT INTO friv.conquista_usu (conquista_idconquista, usuario_idusuario) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- Inserindo dados na tabela lista_jogo (depende de lista e jogo)
INSERT INTO friv.lista_jogo (lista_idlista, lista_usuario_idusuario, jogo_idjogo) VALUES
(1, 1, 3),
(2, 2, 4),
(3, 3, 5),
(4, 4, 1),
(5, 5, 2);

-- Inserindo dados na tabela preferencia (depende de usuario e genero)
INSERT INTO friv.preferencia (usuario_idusuario, genero_idgenero) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- Inserindo dados na tabela comentario (depende de post_forun)
INSERT INTO friv.comentario (idcomentario, comentario, criado, post_forun_idpost_forun, post_forun_usuario_idusuario, post_forun_topico_forun_idtopico_forun) VALUES
(1, 'Boa dica!', '2024-01-15', 2, 3, 1),
(2, 'Funcionou aqui também', '2024-01-16', 4, 4, 3),
(3, 'Vou tentar isso', '2024-01-17', 1, 2, 1),
(4, 'Ótima sugestão', '2024-01-18', 5, 5, 4),
(5, 'Concordo plenamente', '2024-01-19', 3, 1, 2);

-- Inserindo dados na tabela relacionamento (depende de usuario para seguidor e seguindo)
INSERT INTO friv.relacionamento (idrelacionamento, seguindo, seguidor) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 4, 5),
(5, 5, 1);