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
            <i class="fab fa-reddit-alien logo-icon"></i>
            <span class="logo-text">reddit</span>
        </a>
        
        <ul class="nav-links">
            <li><a href="#">Popular</a></li>
            <li><a href="#">Tudo</a></li>
            <li><a href="#">Jogos</a></li>
            <li><a href="#">Usuario</a></li>
        </ul>
        
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-box" placeholder="Pesquisar no Reddit">
        </div>
        
        
        <div class="user-menu">
            <div class="user-avatar">U</div>
            <div class="user-name">usuário</div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </div>
        
        <button class="mobile-menu-btn" style="display: none;">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
    
    <div class="content">
        <div class="post">
            <div class="post-header">
                <span class="post-subreddit">r/AskReddit</span>
                <span class="post-user">Postado por u/exemplo_user • 5 horas atrás</span>
            </div>
            <h3 class="post-title">Qual é a coisa mais estranha que você já viu em casa de um amigo?</h3>
            <div class="post-content">
                <p>Estava na casa de um amigo e vi algo realmente incomum. Alguém mais já passou por algo assim?</p>
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
                <span class="post-subreddit">r/javascript</span>
                <span class="post-user">Postado por u/dev_example • 12 horas atrás</span>
            </div>
            <h3 class="post-title">Dica de JavaScript: Usando Optional Chaining</h3>
            <div class="post-content">
                <p>O optional chaining (?.) permite ler o valor de uma propriedade localizada internamente em uma cadeia de objetos conectados sem ter que validar cada referência na cadeia.</p>
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
    </script>
</body>
</html>