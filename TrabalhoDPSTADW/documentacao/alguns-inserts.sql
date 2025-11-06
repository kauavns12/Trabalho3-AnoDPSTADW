USE friv;
-- Inserir generos
INSERT INTO `friv`.`genero` (`nome`) VALUES
('Ação'),
('Aventura'),
('Estratégia'),
('Quebra-cabeça'),
('Tiro'),
('Esportes'),
('Corrida'),
('RPG'),
('Simulação'),
('Casual');

-- Inserir jogos
INSERT INTO `friv`.`jogo` (`nome`, `descricao`, `desenvolvedor`, `data_lanca`, `img`) VALUES
('Fireboy and Watergirl', 'Duo de aventura em templo com elementos de fogo e água', 'Oslo Albet', '2009-03-15', 'fireboy_watergirl.jpg'),
('Bloons Tower Defense', 'Jogo de estratégia com macacos e balões', 'Ninja Kiwi', '2007-12-10', 'btd.jpg'),
('Crush the Castle', 'Jogo de física com catapultas e castelos', 'Armor Games', '2009-05-20', 'ctc.jpg'),
('Raze', 'Jogo de tio em arena com soldados', 'Sky9 Games', '2011-08-30', 'raze.jpg'),
('Super Mario Flash', 'Versão web do clássico Mario Bros', 'Anonymous', '2008-11-05', 'mario_flash.jpg');

-- Inserir relação genero_jogo
INSERT INTO `friv`.`genero_jogo` (`genero_idgenero`, `jogo_idjogo`) VALUES
(2, 1), -- Aventura
(3, 2), -- Estratégia
(4, 3), -- Quebra-cabeça
(1, 4), -- Ação
(5, 4), -- Tiro
(2, 5); -- Aventura

-- Inserir usuarios (senhas são hashes de "senha123")
INSERT INTO `friv`.`usuario` (`nome`, `gmail`, `senha`, `foto`, `tipo`) VALUES
('Yuta Okkotsu', 'Yuta.Okkotsu@gmail.com', '$2y$10$Fp35ITV/u9vfPRHA.7EhSO/RRyMmF4.c.uVu7WnmD/DP/YbNhSVX', '68d52563a4b5d.png', 'c'),
('Maria Santos', 'maria.santos@gmail.com', '$2y$10$rQF3rE/QYlbvs37y4k5K8OZ1p3mmwQyhdI7frnZe57YSfFX41JeG.', '68d5360e867da.jpeg', 'c'),
('Admin System', 'admin@friv.com', '$2y$10$4/pxrXDjBbpqWucBs46FMuuApXTexc8BU0cenBWNcXHq05IRUJnui', '68d5375cae2fa.jpg', 'A'),
('Pedro Costa', 'pedro.costa@gmail.com', '$2y$10$92IXUNpkjO0rOS5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '68d5375cae2fa.jpg', 'c'),
('Italo', 'italoanimal17@gmail.com', '$2y$10$TFQN0Ur.Vbeu3g7MCe4HEeZ1OZ6h3widDE6N43eSZLmBrPHEcxM7i', '68dab251ddaae.jpeg', 'A');

-- Inserir preferencias de usuarios
INSERT INTO `friv`.`preferencia` (`usuario_idusuario`, `genero_idgenero`) VALUES
(1, 1), -- João gosta de Ação
(1, 2), -- João gosta de Aventura
(2, 4), -- Maria gosta de Quebra-cabeça
(2, 9), -- Maria gosta de Simulação
(4, 5), -- Pedro gosta de Tiro
(4, 3); -- Pedro gosta de Estratégia

-- Inserir conquistas
INSERT INTO `friv`.`conquista` (`nome`, `descricao`) VALUES
('Primeiros Passos', 'Complete o primeiro nível de qualquer jogo'),
('Viciado', 'Jogue por mais de 10 horas no total'),
('Mestre dos Puzzles', 'Complete 50 quebra-cabeças'),
('Estrategista', 'Vença 20 jogos de estratégia'),
('Social', 'Comente em 10 tópicos diferentes');

-- Inserir conquistas de usuarios
INSERT INTO `friv`.`conquista_usu` (`conquista_idconquista`, `usuario_idusuario`) VALUES
(1, 1),
(1, 2),
(1, 4),
(3, 2),
(4, 4);

-- Inserir favoritos
INSERT INTO `friv`.`favorito` (`usuario_idusuario`, `jogo_idjogo`) VALUES
(1, 4), -- João gosta de Raze
(1, 5), -- João gosta de Super Mario Flash
(2, 1), -- Maria gosta de Fireboy and Watergirl
(2, 3), -- Maria gosta de Crush the Castle
(4, 2), -- Pedro gosta de Bloons Tower Defense
(4, 4); -- Pedro gosta de Raze

-- Inserir listas
INSERT INTO `friv`.`lista` (`nome`, `descricao`, `situacao`, `usuario_idusuario1`) VALUES
('Para jogar depois', 'Jogos que quero experimentar', 1, 1),
('Melhores jogos', 'Meus favoritos de todos os tempos', 1, 2),
('Desafios difíceis', 'Jogos que preciso terminar', 0, 4);

-- Inserir jogos nas listas
INSERT INTO `friv`.`lista_jogo` (`lista_idlista`, `lista_usuario_idusuario`, `jogo_idjogo`) VALUES
(1, 1, 2), -- João lista Bloons
(1, 1, 3), -- João lista Crush the Castle
(2, 2, 1), -- Maria lista Fireboy
(3, 4, 4), -- Pedro lista Raze
(3, 4, 5); -- Pedro lista Mario

-- Inserir histórico de jogos
INSERT INTO `friv`.`histo_jogo` (`tempo_ini`, `tempo_fim`, `usuario_idusuario`) VALUES
('2024-08-01 14:30:00', '2024-08-01 15:45:00', 1),
('2024-08-02 10:15:00', '2024-08-02 11:30:00', 2),
('2024-08-03 16:00:00', '2024-08-03 18:20:00', 4),
('2024-08-04 09:00:00', '2024-08-04 10:30:00', 1);

-- Inserir relação historico_jogo
INSERT INTO `friv`.`relhisto_jogo` (`histo_jogo_idhisto_jogo`, `jogo_idjogo`) VALUES
(1, 4), -- João jogou Raze
(2, 1), -- Maria jogou Fireboy
(3, 2), -- Pedro jogou Bloons
(4, 5); -- João jogou Mario

-- Inserir avaliações
INSERT INTO `friv`.`avaliacao_jogo` (`classificacao`, `usuario_idusuario`, `jogo_idjogo`) VALUES
(5, 1, 4), -- João dá 5 para Raze
(4, 1, 5), -- João dá 4 para Mario
(5, 2, 1), -- Maria dá 5 para Fireboy
(3, 2, 3), -- Maria dá 3 para Crush the Castle
(4, 4, 2), -- Pedro dá 4 para Bloons
(5, 4, 4); -- Pedro dá 5 para Raze

-- Inserir categorias do forum
INSERT INTO `friv`.`categoria_forun` (`nome`, `descricao`) VALUES
('Geral', 'Discussões gerais sobre jogos'),
('Dúvidas', 'Tire suas dúvidas sobre os jogos'),
('Dicas', 'Compartilhe dicas e estratégias'),
('Bugs e Problemas', 'Reporte problemas técnicos');

-- Inserir tópicos no forum
INSERT INTO `friv`.`topico_forun` (`nome`, `conteudo`, `categoria_forun_idcategoria_forun1`, `jogo_idjogo1`) VALUES
('Como passar do nível 5?', 'Estou travado no nível 5 do Fireboy, alguém tem alguma dica?', 3, 1),
('Melhor estratégia BTD', 'Qual a melhor torre para rounds avançados?', 3, 2),
('Problema com gráficos', 'O jogo está ficando muito lento no meu PC', 4, 4),
('Novo jogo anunciado!', 'Acabei de ver que sairá uma sequência!', 1, 3);

-- Inserir posts no forum
INSERT INTO `friv`.`post_forun` (`conteudo`, `usuario_idusuario`, `topico_forun_idtopico_forun`) VALUES
('Tenta usar mais o Watergirl nessa parte, ela é melhor para os obstáculos de água', 4, 1),
('O macaco super é o melhor, mas custa caro. Vá acumulando dinheiro!', 1, 2),
('Tenta diminuir a qualidade gráfica nas configurações', 2, 3),
('Que bom! Mal posso esperar para jogar!', 1, 4);

-- Inserir comentarios nos posts
INSERT INTO `friv`.`comentario` (`comentario`, `criado`, `post_forun_idpost_forun`, `post_forun_usuario_idusuario`, `post_forun_topico_forun_idtopico_forun`) VALUES
('Vou tentar isso, obrigado!', '2024-08-05', 1, 4, 1),
('Funcionou perfeitamente!', '2024-08-06', 1, 4, 1),
('Valeu pela dica!', '2024-08-05', 2, 1, 2);

-- Inserir relacionamentos (seguidores)
INSERT INTO `friv`.`relacionamento` (`seguindo`, `seguidor`) VALUES
(2, 1), -- João segue Maria
(4, 1), -- João segue Pedro
(1, 2), -- Maria segue João
(4, 2), -- Maria segue Pedro
(1, 4); -- Pedro segue João