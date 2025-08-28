<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Estilo Reddit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
    <link rel="stylesheet" href="stilinho.css">
    
    
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-gamepad logo-icon"></i>
            <span class="logo-text">Friv</span>
        </a>
        
        <ul class="nav-links">
            <li><a href="menu.php" class="active">Início</a></li>
            <li><a href="#">Jogos</a></li>
            <li><a href="#">Comunidade</a></li>
            <li><a href="#">Fóruns</a></li>
            <li><a href="#">Lançamentos</a></li>
        </ul>
        
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-box" placeholder="Pesquisar jogos, tópicos ou usuários">
        </div>
        
        <div class="nav-buttons">
            <button class="nav-button login-btn">Entrar</button>
            <button class="nav-button signup-btn">Registrar-se</button>
        </div>
        
        <div class="user-menu">
            <div class="user-avatar">J</div>
            <div class="user-name">JoãoSilva</div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </div>
        
        <button class="mobile-menu-btn" style="display: none;">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
    
    <div class="container">
        <div class="main-content">
            <h2 class="section-title">Jogos em Destaque</h2>
            
            <div class="game-card">
                <img src="https://via.placeholder.com/120x120/ff4500/ffffff?text=Among+Us" alt="Among Us" class="game-image">
                <div class="game-info">
                    <h3 class="game-title">Among Us</h3>
                    <p class="game-description">Jogo de investigação multijogador onde você precisa descobrir quem é o impostor.</p>
                    <div class="game-meta">
                        <div class="game-rating">
                            <i class="fas fa-star"></i>
                            <span>4.7</span>
                        </div>
                        <div class="game-genre">Ação • Multijogador</div>
                    </div>
                    <button class="btn-play">Jogar Agora</button>
                </div>
            </div>
            
            <div class="game-card">
                <img src="https://via.placeholder.com/120x120/5a75cc/ffffff?text=Candy+Crush" alt="Candy Crush" class="game-image">
                <div class="game-info">
                    <h3 class="game-title">Candy Crush Saga</h3>
                    <p class="game-description">Jogo de puzzle com doces que já conquistou milhões de jogadores.</p>
                    <div class="game-meta">
                        <div class="game-rating">
                            <i class="fas fa-star"></i>
                            <span>4.5</span>
                        </div>
                        <div class="game-genre">Puzzle • Casual</div>
                    </div>
                    <button class="btn-play">Jogar Agora</button>
                </div>
            </div>
            
            <h2 class="section-title">Discussões Recentes</h2>
            
            <div class="post">
                <div class="post-header">
                    <span class="post-subreddit">r/AmongUs</span>
                    <span class="post-user">Postado por u/MariaSantos • 5 horas atrás</span>
                </div>
                <h3 class="post-title">Dicas para identificar o impostor</h3>
                <div class="post-content">
                    <p>Estou compartilhando algumas estratégias que uso para descobrir quem é o impostor nas partidas. Quem mais tem dicas?</p>
                </div>
                <div class="post-actions">
                    <div class="post-action upvote">
                        <i class="fas fa-arrow-up"></i>
                        <span>2.1k</span>
                    </div>
                    <div class="post-action downvote">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="post-action">
                        <i class="far fa-comment"></i>
                        <span>423 Comentários</span>
                    </div>
                    <div class="post-action">
                        <i class="fas fa-share"></i>
                        <span>Compartilhar</span>
                    </div>
                </div>
            </div>
            
            <div class="post">
                <div class="post-header">
                    <span class="post-subreddit">r/CandyCrush</span>
                    <span class="post-user">Postado por u/PedroCosta • 12 horas atrás</span>
                </div>
                <h3 class="post-title">Como passar da fase 350?</h3>
                <div class="post-content">
                    <p>Estou travado na fase 350 há uma semana. Alguém tem alguma dica específica para esta fase?</p>
                </div>
                <div class="post-actions">
                    <div class="post-action upvote">
                        <i class="fas fa-arrow-up"></i>
                        <span>1.8k</span>
                    </div>
                    <div class="post-action downvote">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="post-action">
                        <i class="far fa-comment"></i>
                        <span>217 Comentários</span>
                    </div>
                    <div class="post-action">
                        <i class="fas fa-share"></i>
                        <span>Compartilhar</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="sidebar">
            <div class="sidebar-box">
                <div class="sidebar-header">Comunidades Populares</div>
                <div class="sidebar-content">
                    <div class="community-item">
                        <div class="community-icon">A</div>
                        <div>
                            <div class="community-name">r/AmongUs</div>
                            <div class="community-members">1.2M membros</div>
                        </div>
                    </div>
                    <div class="community-item">
                        <div class="community-icon">C</div>
                        <div>
                            <div class="community-name">r/CandyCrush</div>
                            <div class="community-members">850k membros</div>
                        </div>
                    </div>
                    <div class="community-item">
                        <div class="community-icon">S</div>
                        <div>
                            <div class="community-name">r/SubwaySurfers</div>
                            <div class="community-members">720k membros</div>
                        </div>
                    </div>
                    <div class="community-item">
                        <div class="community-icon">P</div>
                        <div>
                            <div class="community-name">r/PokemonGO</div>
                            <div class="community-members">2.4M membros</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sidebar-box">
                <div class="sidebar-header">Seus Jogos Favoritos</div>
                <div class="sidebar-content">
                    <div class="community-item">
                        <div class="community-icon" style="background-color: #5a75cc;">C</div>
                        <div>
                            <div class="community-name">Candy Crush Saga</div>
                            <div class="community-members">Jogado 12h esta semana</div>
                        </div>
                    </div>
                    <div class="community-item">
                        <div class="community-icon" style="background-color: #ff4500;">A</div>
                        <div>
                            <div class="community-name">Among Us</div>
                            <div class="community-members">Jogado 8h esta semana</div>
                        </div>
                    </div>
                    <div class="community-item">
                        <div class="community-icon" style="background-color: #46d160;">P</div>
                        <div>
                            <div class="community-name">Pokémon GO</div>
                            <div class="community-members">Jogado 5h esta semana</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sidebar-box">
                <div class="sidebar-header">Eventos em Destaque</div>
                <div class="sidebar-content">
                    <div class="community-item">
                        <div class="community-icon" style="background-color: #ff4500;">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div>
                            <div class="community-name">Torneio de Among Us</div>
                            <div class="community-members">25-27 de Ago • Prêmio: R$ 5.000</div>
                        </div>
                    </div>
                    <div class="community-item">
                        <div class="community-icon" style="background-color: #5a75cc;">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div>
                            <div class="community-name">Evento de Aniversário</div>
                            <div class="community-members">Candy Crush • 30 de Ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simular funcionalidade de votos
        document.querySelectorAll('.upvote, .downvote').forEach(action => {
            action.addEventListener('click', function() {
                const post = this.closest('.post');
                const countElement = post.querySelector('.upvote span');
                
                if (this.classList.contains('upvote')) {
                    countElement.textContent = (parseInt(countElement.textContent) + 1).toString();
                    this.style.color = '#ff4500';
                    post.querySelector('.downvote').style.color = '#818384';
                } else {
                    countElement.textContent = (parseInt(countElement.textContent) - 1).toString();
                    this.style.color = '#5a75cc';
                    post.querySelector('.upvote').style.color = '#818384';
                }
            });
        });
        
        // Simular login/logout
        document.querySelector('.user-menu').addEventListener('click', function() {
            alert('Menu de usuário clicado! Aqui apareceriam opções de perfil, configurações e logout.');
        });
        
        document.querySelector('.login-btn').addEventListener('click', function() {
            alert('Funcionalidade de login acionada!');
        });
        
        document.querySelector('.signup-btn').addEventListener('click', function() {
            alert('Funcionalidade de registro acionada!');
        });
        
        // Botões de jogar
        document.querySelectorAll('.btn-play').forEach(button => {
            button.addEventListener('click', function() {
                const game = this.closest('.game-card');
                const title = game.querySelector('.game-title').textContent;
                alert(`Iniciando jogo: ${title}`);
            });
        });
    </script>
</body>
</html>