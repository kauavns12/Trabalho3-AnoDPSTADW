<?php
require_once "../controle/conexao.php";

// Carregar gêneros do banco diretamente
$sql = "SELECT idgenero, nome FROM genero ORDER BY nome";
$resultado = mysqli_query($conexao, $sql);
$generos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogo</title>
    <link rel="stylesheet" href="./estilo/estilo_formJogo.css">
    <script src="../controle/jquery-3.7.1.min.js"></script>
    <script src="../controle/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#formulario').validate({
                rules: {
                    nome: {
                        required: true,
                        minlength: 3,
                    },
                    descricao: {
                        required: true,
                        minlength: 20,
                    },
                    desenvolvedor: {
                        required: true,
                        minlength: 3,
                    },
                    data_lanca: {
                        required: true,
                        date: true
                    },
                    'genero[]': {
                        required: true
                    },
                    img: {
                        required: true,
                        accept: "image/*"
                    }
                },
                messages: {
                    nome: {
                        required: "Esse campo não pode ser vazio",
                        minlength: "Tamanho mínimo de 3 símbolos"
                    },
                    descricao: {
                        required: "Esse campo não pode ser vazio",
                        minlength: "Insira uma descrição mais detalhada (mínimo 20 símbolos)"
                    },
                    desenvolvedor: {
                        required: "Esse campo não pode ser vazio",
                        minlength: "Tamanho mínimo de 3 símbolos"
                    },
                    data_lanca: {
                        required: "Esse campo não pode ser vazio",
                        date: "Data inválida"
                    },
                    'genero[]': {
                        required: "Selecione pelo menos um gênero"
                    },
                    img: {
                        required: "Selecione uma imagem",
                        accept: "Apenas arquivos de imagem são permitidos"
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "genero[]") {
                        error.insertAfter("#generos-container");
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });
    </script>
</head>
<body>
    <form action="../controle/salvarJogo.php" method="post" enctype="multipart/form-data" class="form-container" id="formulario">
        <div class="form-header">
            <h1>Cadastro de Jogo</h1>
        </div>
        
        <div class="form-body">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </div>
            
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" id="descricao">
            </div>
            
            <div class="form-group">
                <label for="desenvolvedor">Desenvolvedor:</label>
                <input type="text" name="desenvolvedor" id="desenvolvedor">
            </div>
            
            <div class="form-group">
                <label for="data_lanca">Lançamento:</label>
                <input type="date" name="data_lanca" id="data_lanca" placeholder="DD/MM/AAAA">
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
            
            <div class="form-group">
                <label for="img">Foto:</label>
                <input type="file" name="img" id="img" accept="image/*">
            </div>
            
            <button type="submit" class="btn-submit">Cadastrar Jogo</button>
        </div>
    </form>

    <script>
        let selectedGeneros = [];
        
        // Função para controlar a seleção de gêneros
        function toggleGenero(checkbox, generoId) {
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
                }
            } else {
                // Remover da lista de selecionados
                if (index !== -1) {
                    selectedGeneros.splice(index, 1);
                }
            }
            
            // Atualizar a aparência visual
            updateGenerosAppearance();
        }
        
        // Atualizar a aparência visual dos gêneros selecionados
        function updateGenerosAppearance() {
            const allOptions = document.querySelectorAll('.genero-option');
            
            allOptions.forEach(option => {
                const checkbox = option.querySelector('input');
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
    </script>
</body>
</html>