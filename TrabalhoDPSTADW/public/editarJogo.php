<?php

require_once "../controle/verificarLogado.php";
require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";

if ($_SESSION['tipo'] == 'c') {
    header("Location: home.php");
}

$idjogo = $_GET['idjogo'];

$generos = [];
$generos = listarGenero($conexao);


$jogos = pesquisarJogoID($conexao, $idjogo);

if (count($jogos) == 0) {
        echo "Não existem jogos cadastrados";
        header('Location: home.php');
    } else {
            $id = $jogos['idjogo'];
            $nome = $jogos['nome'];
            $descricao = $jogos['descricao'];
            $foto = $jogos['img'];
            $desenvolvedor = $jogos['desenvolvedor'];
            $data = $jogos['data_lanca'];
        }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
    <link rel="stylesheet" href="./estilo/estilo_formJogo.css">
    <script src="../controle/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="../controle/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="./estilo/cabeçalho.css">

</head>

<body> 

    <?php include 'cabeçalho.php'; ?>

    <form action="../controle/editarJogo.php?idjogo=<?php echo $id ?>" method="post" enctype="multipart/form-data" class="form-container" id="formulario">
        <div class="form-header">
            <h1>Editar Jogo</h1>
        </div>
        
        <div class="form-body">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="<?php echo $nome ?>">
            </div>
            
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" id="descricao" placeholder="<?php echo $descricao ?>">
            </div>
            
            <div class="form-group">
                <label for="desenvolvedor">Desenvolvedor:</label>
                <input type="text" name="desenvolvedor" id="desenvolvedor" placeholder="<?php echo $desenvolvedor ?>">
            </div>
            
            <div class="form-group">
                <label for="data_lanca">Lançamento:</label>
                <input type="date" name="data_lanca" id="data_lanca" placeholder="<?php echo $data ?>">
            </div>
            
            <div class="form-group">
                <label for="img">Foto:</label>
                <input type="file" name="img" id="img" placeholder="<?php echo $foto ?>" accept="image/*">
            </div>
            
            <div class="form-group">
                <label>Gênero: <span class="selected-limit">(Selecione até 2 opções)</span></label>
                <div class="generos-container" id="generos-container">
                    <?php foreach ($generos as $genero): ?>
                    <div class="genero-option">
                        <input type="checkbox" name="genero[]" value="<?php echo $genero['idgenero']; ?>" id="genero-<?php echo $genero['idgenero']; ?>">
                        <label for="genero-<?php echo $genero['idgenero']; ?>"><?php echo htmlspecialchars($genero['nome']); ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="submit" class="btn-submit">Editar Jogo</button>
        </div>
    </form>

    
</body>
<script>
        let selectedGeneros = [];
        
        // Função para controlar a seleção de gêneros
        function toggleGenero(checkbox, generoId) {
            const generoOption = checkbox.parentElement;
            const index = selectedGeneros.indexOf(generoId);
            
            if (checkbox.checked) {
                // Verificar se já selecionou o máximo permitido
                if (selectedGeneros.length >= 2) {
                    checkbox.checked = false;
                    alert('Você pode selecionar no máximo 2 gêneros.');
                    return;
                }
                
                // Adicionar à lista de selecionados
                if (index === -1) {
                    selectedGeneros.push(generoId);
                    generoOption.classList.add('selected');
                }
            } else {
                // Remover da lista de selecionados
                if (index !== -1) {
                    selectedGeneros.splice(index, 1);
                    generoOption.classList.remove('selected');
                }
            }
            
            // Atualizar a aparência visual
            updateGenerosAppearance();
        }
        
        // Atualizar a aparência visual dos gêneros selecionados
        function updateGenerosAppearance() {
            const allOptions = document.querySelectorAll('.genero-option');
            
            allOptions.forEach(option => {
                const checkbox = option.querySelector('input[type="checkbox"]');
                const generoId = checkbox.value;
                
                // Verificar se este gênero está selecionado
                const isSelected = selectedGeneros.includes(generoId.toString());
                
                if (isSelected) {
                    option.classList.add('selected');
                } else {
                    option.classList.remove('selected');
                }
            });
        }
        
        // Adicionar eventos aos checkboxes após o carregamento
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="genero[]"]');
            
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    toggleGenero(this, this.value);
                });
                
                // Inicializar estado dos checkboxes já selecionados (se houver)
                if (checkbox.checked) {
                    selectedGeneros.push(checkbox.value);
                    checkbox.parentElement.classList.add('selected');
                }
            });
        });

        // Validação do formulário
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            if (selectedGeneros.length === 0) {
                e.preventDefault();
                alert('Por favor, selecione pelo menos um gênero.');
            }
        });

        // Permitir pressionar Enter para adicionar gênero
        document.getElementById('novo_genero').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                salvarGenero();
            }
        });
    </script>
</html>